<?php

/**
 * Created by PhpStorm.
 * User: jacobs
 * Date: 2017/7/5
 * Time: 17:35
 */
class RegisterController extends Controller
{
    public function actionIndex()
    {
        $this->layout = '//layouts/layout_login';

        $this->render('index');
    }

    public function actionForgot()
    {
        $this->layout = '//layouts/layout_login';

        $this->render('forgot');
    }

    public function actionForgotsave()
    {
        $email = Yii::app()->request->getPost('email');
        if (empty($email)) {
            $this->response(false, 'email', 'Please enter the email');
        }
        if (!ToolHelper::validateEmail($email)) {
            $this->response(false, 'email', 'Please enter the true email');
        }
        $sql = 'SELECT 
				crmentity.crmid,
				CASE crmentity.setype
					WHEN "Leads" THEN (SELECT email FROM vtiger_leaddetails leaddetails WHERE leaddetails.leadid=member.crmid)
					WHEN "Contacts" THEN (SELECT email FROM vtiger_contactdetails contactdetails WHERE contactdetails.contactid=member.crmid)
				END as email,
				member.password
			FROM vtiger_website_member member 
			INNER JOIN vtiger_crmentity crmentity ON member.crmid=crmentity.crmid
			WHERE crmentity.deleted=0 
			HAVING email="' . $email . '"';
        $connection = Yii::app()->db;
        $command = $connection->createCommand($sql);
        $row = $command->queryRow();
        if(empty($row)){
            $this->response(false, 'email', 'Please enter the true email');
        }

        $crmid = $row['crmid'];
        $memberInfo = CacheHelper::getCacheMemberInfo($crmid);

        $t = ToolHelper::uuid('-');
        VtigerWebsiteMemberEmailvalid::model()->updateAll(array('active' => 0), 'crmid=' . $crmid . ' and validtype="forgotpassword"');
        $emailValidModel = new VtigerWebsiteMemberEmailvalid();
        $emailValidModel->setIsNewRecord(true);
        $emailValidModel->crmid = $crmid;
        $emailValidModel->t = $t;
        $emailValidModel->validtype = 'forgotpassword';
        $emailValidModel->sendtime = date('Y-m-d H:i:s');
        $emailValidModel->active = 1;
        $emailValidModel->save();

        $config = Yii::app()->params['website'];
        EmailHelper::sendForgotPasswordValid($email, array(
            'lastname' => $memberInfo['lastname'],
            't' => $t,
            'website_baseUrl' => $config['baseUrl']
        ));

        $this->response(true);
    }

    public function actionSave()
    {
        $email = Yii::app()->request->getPost('email');
        $password = Yii::app()->request->getPost('password');
        $confirmpassword = Yii::app()->request->getPost('confirmpassword');
        $lastname = Yii::app()->request->getPost('lastname');

        if (empty($email)) {
            $this->response(false, 'email', 'Please enter the email');
        }
        if (!ToolHelper::validateEmail($email)) {
            $this->response(false, 'email', 'Please enter the true email');
        }
        if (empty($password)) {
            $this->response(false, 'password', 'Please enter the password');
        }
        if ($password != $confirmpassword) {
            $this->response(false, 'confirmpassword', 'The two password is not same');
        }

        if (CRMHelper::isRegisterByEmail($email)) {
            $this->response(false, 'email', 'Sorry, this email address has already been registered. Please choose another.');
        }

        $memberTempModel = new VtigerWebsiteMemberInfotmp();
        $memberTempModel->setIsNewRecord(true);

        $criteria = new CDbCriteria();
        $criteria->alias = 'contact';
        $criteria->join = 'INNER JOIN vtiger_crmentity crmentity ON crmentity.crmid=contact.contactid';
        $criteria->addCondition('crmentity.deleted=0');
        $criteria->addCondition('contact.email="' . $email . '"');
        $contactModel = VtigerContactdetails::model()->find($criteria);
        if (empty($contactModel)) {
            $criteria = new CDbCriteria();
            $criteria->alias = 'lead';
            $criteria->join = 'INNER JOIN vtiger_crmentity crmentity ON crmentity.crmid=lead.leadid';
            $criteria->addCondition('crmentity.deleted=0');
            $criteria->addCondition('lead.email="' . $email . '"');
            $leadModel = VtigerLeaddetails::model()->find($criteria);
            if (!empty($leadModel)) {
                $crmid = $leadModel->leadid;
                $memberTempModel->crmid = $crmid;
                if ($leadModel->lastname != $lastname) {
                    $memberTempModel->tablename = 'vtiger_leadsdetails';
                    $memberTempModel->field = 'lastname';
                    $memberTempModel->key = 'leadid';
                    $memberTempModel->val = $lastname;
                    $memberTempModel->save();
                }
            } else {
                $crmid = CRMHelper::addCrmentity('Leads');
                $memberTempModel->crmid = $crmid;

                $leadModel = new VtigerLeaddetails();
                $leadModel->setIsNewRecord(true);
                $leadModel->leadid = $crmid;
                $leadModel->lead_no = CRMHelper::getModentityNum('Leads');
                $leadModel->email = $email;
                $leadModel->lastname = $lastname;
                $leadModel->company = null;
                $leadModel->save();

                $connection = Yii::app()->db;

                $sql = 'INSERT INTO vtiger_leadscf(leadid, cf_632) VALUES(' . $crmid . ', "My Anviz")';
                $command = $connection->createCommand($sql);
                $command->execute();

                $sql = 'INSERT INTO vtiger_leadsubdetails(leadsubscriptionid) VALUES(' . $crmid . ')';
                $command = $connection->createCommand($sql);
                $command->execute();

                $sql = 'INSERT INTO vtiger_leadaddress(leadaddressid) VALUES(' . $crmid . ')';
                $command = $connection->createCommand($sql);
                $command->execute();
            }
        } else {
            $crmid = $contactModel->contactid;
            $memberTempModel->crmid = $crmid;
            if ($contactModel->lastname != $lastname) {
                $memberTempModel->tablename = 'vtiger_contactdetails';
                $memberTempModel->field = 'lastname';
                $memberTempModel->key = 'contactid';
                $memberTempModel->val = $lastname;
                $memberTempModel->save();
            }
        }

        $memberModel = new VtigerWebsiteMember();
        $memberModel->setIsNewRecord(true);
        $memberModel->crmid = $crmid;
        $memberModel->password = $password;
        $memberModel->islogin = 0;
        $memberModel->isadmin = 0;
        $memberModel->registertime = date('Y-m-d H:i:s');
        $memberModel->registerip = Yii::app()->request->getUserHostAddress();
        $memberModel->isvalid = 0;
        $memberModel->deleted = 0;
        $memberModel->registerfrom = 'My Anviz';
        $memberModel->registerby = 0;
        $memberModel->save();

        $t = ToolHelper::uuid('-');
        VtigerWebsiteMemberEmailvalid::model()->updateAll(array('active' => 0), 'crmid=' . $crmid . ' and validtype="Register"');
        $emailValidModel = new VtigerWebsiteMemberEmailvalid();
        $emailValidModel->setIsNewRecord(true);
        $emailValidModel->crmid = $crmid;
        $emailValidModel->t = $t;
        $emailValidModel->validtype = 'Register';
        $emailValidModel->sendtime = date('Y-m-d H:i:s');
        $emailValidModel->active = 1;
        $emailValidModel->save();

        $config = Yii::app()->params['website'];
        EmailHelper::sendRegisterValid($email, array(
            'lastname' => $lastname,
            't' => $t,
            'website_baseUrl' => $config['baseUrl']
        ));

        $this->response(true);
    }
}