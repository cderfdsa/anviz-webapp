<?php
/**
 * Created by Jacobs.
 * Auth: jacobs@anviz.com
 * Copyright: Anviz Global Inc.
 * Date: 2017/8/17
 * Time: 16:53
 * FileName: BlockWidget.php
 */

class BlockWidget extends Widget
{
    public $block;
    public $module;
    public $controller;

    public function run()
    {
        if (empty($this->block))
            return false;

        $method = '_' . ucfirst(strtolower($this->block));
        if (method_exists($this, $method)) {
            $this->$method();
        } else {
            return false;
        }
    }

    private function _Bottom()
    {
        $this->render('bottom', array(
            'controller' => $this->controller,
            'module' => $this->module
        ));
    }
}