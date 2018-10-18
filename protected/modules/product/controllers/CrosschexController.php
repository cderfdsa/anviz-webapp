<?php
/**
 * Created by Jacobs.
 * Auth: jacobs@anviz.com
 * Copyright: Anviz Global Inc.
 * Date: 2017/9/5
 * Time: 15:06
 * FileName: CrosschexController.php
 */

class CrosschexController extends Controller
{
    public function actionIndex()
    {
        $this->layout = '//layouts/layout_index';

        $this->render('index');
    }
}