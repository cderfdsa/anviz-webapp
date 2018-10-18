<?php

/**
 * Created by PhpStorm.
 * User: jacobs
 * Date: 2017/7/5
 * Time: 13:28
 */
class IndexController extends Controller
{
    public function actionIndex()
    {
        $this->layout = '//layouts/layout_index';

        $this->render('index');
    }
}