<?php

/**
 * File Name: Widget.php
 * Created by Junzhu <junzhu@188.com>.
 * Website: http://www.256th.com
 * Date: 2017/2/21
 * Time: 9:51
 */
class Widget extends CWidget
{
    public $assetsUrl = "";

    public function init()
    {
        $this->assetsUrl = Yii::app()->baseUrl;
    }

    public function render($view, $data = null, $return = false)
    {
        $data['assetsUrl'] = $this->assetsUrl;
        $data['isLogin'] = Yii::app()->user->isGuest ? false : true;

        return parent::render($view, $data, $return);
    }
}