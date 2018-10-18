<?php
/**
 * Created by Jacobs.
 * Auth: jacobs@anviz.com
 * Copyright: Anviz Global Inc.
 * Date: 2017/8/28
 * Time: 14:03
 * FileName: FaqModule.php
 */

class FaqModule extends CWebModule
{
    public function init()
    {
        // this method is called when the module is being created
        // you may place code here to customize the module or the application

        // import the module-level models and components
        $this->setImport(array());

        $this->defaultController = 'index';
    }

    public function beforeControllerAction($controller, $action)
    {
        if (parent::beforeControllerAction($controller, $action)) {
            // this method is called before any module controller action is performed
            // you may place customized code here
            return true;
        } else
            return false;
    }
}