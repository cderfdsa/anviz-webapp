<?php
/**
 * Created by Jacobs.
 * Auth: jacobs@anviz.com
 * Copyright: Anviz Global Inc.
 * Date: 2017/8/28
 * Time: 15:23
 * FileName: AjaxController.php
 */

class AjaxController extends Controller
{
    public function actionIndex()
    {
        $page = Yii::app()->request->getParam('page');
        $size = Yii::app()->request->getParam('size');

        $page = empty($page) ? 1 : $page;
        $size = empty($size) ? 10 : $size;
        $start = ($page - 1) * $size;

        $product_category = Yii::app()->request->getParam('product_category_id');
        $product_id = Yii::app()->request->getParam('product_id');
        $keyword = Yii::app()->request->getParam('keyword');
        $category_id = Yii::app()->request->getParam('category_id');

        $criteria = new CDbCriteria();
        $criteria->alias = 'faq';
        $criteria->join = 'INNER JOIN vtiger_crmentity crmentity ON crmentity.crmid=faq.id';
        $criteria->addCondition('crmentity.deleted=0');
        $criteria->addCondition('faq.pushed=1');
        //$criteria->addCondition('faq.status="Published"');
        if (!empty($category_id)) {
            $faqCategoryModel = VtigerFaqcategories::model()->findByPk($category_id);
            if (!empty($faqCategoryModel)) {
                $category = $faqCategoryModel->faqcategories;
                $criteria->addCondition('faq.category="' . $category . '"');
            }
        }

        if (!empty($product_id)) {
            $faqid = CRMHelper::getRelationId($product_id, 'Faq');
            $criteria->addInCondition('id', $faqid);
        } elseif (!empty($product_category)) {

        }

        if(!empty($keyword)){
            $criteria->addSearchCondition('faq.question', $keyword);
        }

        $count = VtigerFaq::model()->count($criteria);
        $pageCount = ceil($count / $size);

        $criteria->limit = $size;
        $criteria->offset = $start;
        $criteria->order = 'crmentity.createdtime DESC';
        $faqModel = VtigerFaq::model()->findAll($criteria);
        $faqList = array();
        foreach ($faqModel as $i => $row) {
            $faqList[$i] = array(
                'faqId' => $row->id,
                'faqName' => $row->question
            );
        }

        echo CJSON::encode(array(
            'page' => $page,
            'pageCount' => $pageCount,
            'data' => $faqList
        ));
    }
}