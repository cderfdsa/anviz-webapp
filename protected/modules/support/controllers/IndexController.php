<?php
/**
 * Created by Jacobs.
 * Auth: jacobs@anviz.com
 * Copyright: Anviz Global Inc.
 * Date: 2017/8/24
 * Time: 11:06
 * FileName: IndexController.php
 */

class IndexController extends Controller
{
    public function actionIndex()
    {
        $this->layout = '//layouts/layout_index';

        $this->render('index');
    }
}