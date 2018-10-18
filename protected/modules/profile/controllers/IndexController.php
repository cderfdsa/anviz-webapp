<?php
/**
 * Created by Jacobs.
 * Auth: jacobs@anviz.com
 * Copyright: Anviz Global Inc.
 * Date: 2017/8/21
 * Time: 10:52
 * FileName: IndexController.php
 */

class IndexController extends Controller
{
    public function actionIndex()
    {
        $this->layout = '//layouts/layout_index';

        $this->render('index');
    }

    public function actionEdit()
    {
        $this->layout = '//layouts/layout_index';

        $this->render('edit');
    }

    public function actionSave()
    {
        $firstname = Yii::app()->request->getPost('firstname');
        $lastname = Yii::app()->request->getPost('lastname');
        $job_title = Yii::app()->request->getPost('job_title');
        $salutation = Yii::app()->request->getPost('salutation');
        $phone = Yii::app()->request->getPost('phone');
        $crmid = $this->memberInfo['crmid'];

        if(empty($lastname)){
            $this->response(false, 'lastname', 'Please enter the last name');
        }

        $connection = Yii::app()->db;
        if($this->memberInfo['setype'] == 'Leads'){
            $leadModel = VtigerLeaddetails::model()->findByPk($crmid);
            $leadModel->firstname = $firstname;
            $leadModel->lastname = $lastname;
            $leadModel->salutation = $salutation;
            $leadModel->save();

            $leadcfModel = VtigerLeadscf::model()->findByPk($crmid);
            $leadcfModel->cf_789 = $job_title;
            $leadcfModel->save();

            $sql = 'UPDATE vtiger_leadaddress SET phone="'.$phone.'" WHERE leadaddressid='.$crmid;
            $command = $connection->createCommand($sql);
            $command->execute();
        }else{
            $contactModel = VtigerContactdetails::model()->findByPk($crmid);
            $contactModel->firstname = $firstname;
            $contactModel->lastname = $lastname;
            $contactModel->salutation = $salutation;
            $contactModel->phone = $phone;
            $contactModel->save();

            $contactcfModel = VtigerContactscf::model()->findByPk($crmid);
            $contactcfModel->cf_747 = $job_title;
            $contactcfModel->save();
        }

        $this->response(true);
    }
}