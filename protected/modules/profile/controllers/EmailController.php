<?php
/**
 * Created by Jacobs.
 * Auth: jacobs@anviz.com
 * Copyright: Anviz Global Inc.
 * Date: 2017/8/21
 * Time: 12:38
 * FileName: EmailController.php
 */

class EmailController extends Controller
{
    public function actionIndex()
    {
        $this->layout = '//layouts/layout_index';

        $this->render('index');
    }

    public function actionSave()
    {
        $email = Yii::app()->request->getPost('email');
        $crmid = $this->memberInfo['crmid'];

        if (empty($email)) {
            $this->response(false, 'email', 'Please enter the email!');
        }

        if (!ToolHelper::validateEmail($email)) {
            $this->response(false, 'email', 'The email format is fail');
        }

        if (CRMHelper::isRegisterByEmail($email, $crmid)) {
            $this->response(false, 'email', 'Sorry, this email address has already been registered. Please choose another.');
        }

        if ($email == $this->memberInfo['email']) {
            $this->response(true);
        }

        $t = ToolHelper::uuid('-');
        VtigerWebsiteMemberEmailvalid::model()->updateAll(array('active' => 0), 'crmid=' . $crmid . ' and validtype="changeemail"');
        $emailValidModel = new VtigerWebsiteMemberEmailvalid();
        $emailValidModel->setIsNewRecord(true);
        $emailValidModel->crmid = $crmid;
        $emailValidModel->t = $t;
        $emailValidModel->validtype = 'changeemail';
        $emailValidModel->sendtime = date('Y-m-d H:i:s');
        $emailValidModel->active = 1;
        $emailValidModel->save();

        $setype = $this->memberInfo['setype'];
        if ($setype == 'Leads') {
            CRMHelper::insertMemberInfoTemp($crmid, 'vtiger_leadsdetails', 'email', $email);
        } else {
            CRMHelper::insertMemberInfoTemp($crmid, 'vtiger_contactdetails', 'email', $email);
        }

        $config = Yii::app()->params['website'];
        EmailHelper::sendChangeEmailValid($email, array(
            'lastname' => $this->memberInfo['lastname'],
            't' => $t,
            'website_baseUrl' => $config['baseUrl']
        ));

        $this->response(true);
    }
}