<?php
/**
 * Created by Jacobs.
 * Auth: jacobs@anviz.com
 * Copyright: Anviz Global Inc.
 * Date: 2017/8/18
 * Time: 16:53
 * FileName: EmailHelper.php
 */

class EmailHelper
{
    public static function sendRegisterValid($email, $data = array())
    {
        if (!isset($data['email']))
            $data['email'] = $email;

        $subject = 'Welcome to MyAnviz Registration';

        $controller = clone(Yii::app()->controller);
        $controller->layout = false;
        $content = $controller->render('//emailTemplate/register_valid', $data, true);

        self::sendMail($email, $subject, $content);
    }

    public static function sendChangeEmailValid($email, $data = array())
    {

        if (!isset($data['email']))
            $data['email'] = $email;

        $subject = 'Change your email address';

        $controller = clone(Yii::app()->controller);
        $controller->layout = false;
        $content = $controller->render('//emailTemplate/changeemail_valid', $data, true);

        self::sendMail($email, $subject, $content);
    }

    public static function sendForgotPasswordValid($email, $data = array()){
        if (!isset($data['email']))
            $data['email'] = $email;

        $subject = 'Reset your password';
        $controller = clone(Yii::app()->controller);
        $controller->layout = false;
        $content = $controller->render('//emailTemplate/forgotpassword_valid', $data, true);

        self::sendMail($email, $subject, $content);
    }

    public static function sendMail($email = '', $subject = '', $content = '')
    {
        if (empty($email) || empty($subject) || empty($content))
            return false;

        $mail = Yii::createComponent('application.extensions.emailer.EMailer');
        if (is_string($email)) {
            $email = explode(',', $email);
        }

        foreach ($email as $m) {
            $mail->AddAddress($m);
        }

        $mail->Subject = $subject;
        $mail->Body = $content;

        return $mail->send();
    }
}