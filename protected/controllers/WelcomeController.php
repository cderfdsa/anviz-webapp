<?php
/**
 * Created by Jacobs.
 * Auth: jacobs@anviz.com
 * Copyright: Anviz Global Inc.
 * Date: 2017/9/18
 * Time: 16:57
 * FileName: WelcomeController.php
 */

class WelcomeController extends Controller
{
    public function actionIndex(){

        $this->layout = '//layouts/layout_login';

        $this->render('index');
    }
}