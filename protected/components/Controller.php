<?php

/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
    /**
     * @var string the default layout for the controller view. Defaults to '//layouts/column1',
     * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
     */
    public $layout = false;
    /**
     * @var array context menu items. This property will be assigned to {@link CMenu::items}.
     */
    public $menu = array();
    /**
     * @var array the breadcrumbs of the current page. The value of this property will
     * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
     * for more details on how to specify this property.
     */
    public $breadcrumbs = array();

    public $assetsUrl = "";
    public $isLogin = false;

    public $memberInfo = array();
    public $leadInfo = array();
    public $contactInfo = array();
    public $accountInfo = array();

    public $controller = '';
    public $module = '';

    public function init()
    {
        $this->assetsUrl = Yii::app()->baseUrl;

        if (!Yii::app()->user->isGuest) {
            $this->isLogin = true;
        }
    }

    public function render($view, $data = null, $return = false)
    {

        $data['isLogin'] = $this->isLogin;
        if (!Yii::app()->user->isGuest) {
            $data['thisMember'] = $this->memberInfo;
            $data['thisLead'] = $this->leadInfo;
            $data['thisContact'] = $this->contactInfo;
            $data['thisAccount'] = $this->accountInfo;
        }
        $data['assetsUrl'] = $this->assetsUrl;

        return parent::render($view, $data, $return);
    }

    protected function beforeAction($action)
    {
        if (parent::beforeAction($action)) {
            $controller = Yii::app()->controller->id;
            $module = $this->getModule();
            $this->controller = $controller;
            $this->module = empty($module) ? '' : $module->getId();
            if (Yii::app()->user->isGuest) {
                if (!empty($module) && ($module->id == 'profile' || $module->id == 'advice' || $module->id == 'ticket')) {
                    $this->redirect(array('/login'));
                }
            } else {
                $this->memberInfo = Yii::app()->user->getMemberInfo();
                if ($this->memberInfo['setype'] == 'Leads') {
                    $this->leadInfo = Yii::app()->user->getLeadInfo();
                    $this->contactInfo = false;
                    $this->accountInfo = false;
                } else {
                    $this->leadInfo = false;
                    $this->contactInfo = Yii::app()->user->getContactInfo();
                    $this->accountInfo = false;
                    if (!empty($this->contactInfo['accountid'])) {
                        $this->accountInfo = Yii::app()->user->getAccountInfo($this->contactInfo['accountid']);
                    }
                }
            }
            return true;
        } else {
            return false;
        }
    }

    public function response($success = false, $data = array(), $message = '')
    {
        if (is_array($success)) {
            echo CJSON::encode($success);
            exit;
        }

        if (!$success && empty($message))
            $message = Yii::t('Common', 'The system is fail!');

        $result = array(
            'success' => $success,
            'data' => $data,
            'message' => $message
        );

        echo CJSON::encode($result);
        exit;
    }
}