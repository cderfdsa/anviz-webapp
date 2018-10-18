<?php

/**
 * Created by Jacobs.
 * Auth: jacobs@anviz.com
 * Copyright: Anviz Global Inc.
 * Date: 2017/9/5
 * Time: 15:57
 * FileName: IndexController.php
 */
class IndexController extends Controller
{
    public function actionIndex()
    {
        $this->layout = '//layouts/layout_index';

        $this->render('index', array(
            'productCategories' => CRMHelper::getProductCategoryChildrenTree(0),
        ));
    }
}