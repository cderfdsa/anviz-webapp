<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
    public $_id;

    /**
     * Authenticates a user.
     * The example implementation makes sure if the username and password
     * are both 'demo'.
     * In practical applications, this should be changed to authenticate
     * against some persistent user identity storage (e.g. database).
     * @return boolean whether authentication succeeds.
     */
    public function __construct($username, $password)
    {
        parent::__construct($username, $password);
    }

    public function authenticate()
    {
        $result = array('success' => false, 'data'=>array(), 'message' => Yii::t('Common', 'The system is fail!'));
        if (empty($this->username)) {
            $result['message'] = Yii::t("Login", "Please enter the email");
            $result['data'] = 'email';
        } elseif (!ToolHelper::validateEmail($this->username)) {
            $result['message'] = Yii::t('Register', 'The email is fail');
            $result['data'] = 'email';
        } elseif (empty($this->password)) {
            $result['message'] = Yii::t("Login", "Please enter the password");
            $result['data'] = 'password';
        } else {
            $userinfo = CRMHelper::chklogin($this->username, $this->password);
            if (empty($userinfo)) {
                $result['message'] = Yii::t("Login", "The email or password is error!");
                $result['data'] = 'password';
            } else {
                $this->_id = $userinfo['crmid'];

                $result['success'] = true;
                $result['message'] = '';
            }
        }

        return $result;
    }

    public function getId()
    {
        return $this->_id;
    }
}