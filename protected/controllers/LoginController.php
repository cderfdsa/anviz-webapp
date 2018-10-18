<?php

/**
 * Created by PhpStorm.
 * User: jacobs
 * Date: 2017/7/5
 * Time: 13:59
 */
class LoginController extends Controller
{
    public function actionIndex()
    {
        $this->layout = '//layouts/layout_login';

        $this->render('index');
    }

    public function actionChklogin()
    {
        $email = Yii::app()->request->getParam('email');
        $password = Yii::app()->request->getParam('password');

        $identity = new UserIdentity($email, $password);
        $result = $identity->authenticate();

        if ($result['success']) {
            Yii::app()->user->login($identity);
        }

        $this->response($result['success'], $result['data'], $result['message']);
    }

    public function actionLogoff()
    {
        Yii::app()->user->logout(false);
        $this->redirect(array('index'));
    }
}