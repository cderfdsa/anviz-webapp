<?php
/**
 * Created by Jacobs.
 * Auth: jacobs@anviz.com
 * Copyright: Anviz Global Inc.
 * Date: 2017/8/21
 * Time: 12:21
 * FileName: PasswordController.php
 */

class PasswordController extends Controller
{
    public function actionIndex()
    {
        $this->layout = '//layouts/layout_index';

        $this->render('index');
    }

    public function actionSave()
    {
        $old_password = Yii::app()->request->getPost('old_password');
        $password = Yii::app()->request->getPost('password');
        $confirmpassword = Yii::app()->request->getPost('confirmpassword');
        $crmid = $this->memberInfo['crmid'];

        if (empty($old_password)) {
            $this->response(false, 'old_password', 'Please enter the password');
        }
        if (empty($password)) {
            $this->response(false, 'password', 'Please enter the new password');
        }
        if ($password != $confirmpassword) {
            $this->response(false, 'confirmpassword', 'The two password is not same');
        }

        $memberModel = VtigerWebsiteMember::model()->findByPk($crmid);
        if (empty($memberModel)) {
            $this->response(false);
        }
        if ($memberModel->password != $old_password) {
            $this->response('false', 'old_password', 'The old password is error!');
        }

        VtigerWebsiteMember::model()->updateByPk($crmid, array('password' => $password));
        VtigerPortalinfo::model()->updateByPk($crmid, array('password' => $password));

        $this->response(true);
    }
}