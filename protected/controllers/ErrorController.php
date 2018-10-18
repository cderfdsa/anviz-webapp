<?php

/**
 * Created by PhpStorm.
 * User: jacobs
 * Date: 2017/7/5
 * Time: 13:56
 */
class ErrorController extends Controller
{
    public function actionIndex()
    {
        $error = Yii::app()->errorHandler->error;
        echo '<pre>';
        print_r($error);
        echo '</pre>';
    }
}