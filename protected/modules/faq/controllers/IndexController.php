<?php
/**
 * Created by Jacobs.
 * Auth: jacobs@anviz.com
 * Copyright: Anviz Global Inc.
 * Date: 2017/8/28
 * Time: 14:19
 * FileName: IndexController.php
 */

class IndexController extends Controller
{
    public function actionIndex()
    {
        $this->layout = '//layouts/layout_index';

        $faqCategories = array();
        $faqCategoryModel = VtigerFaqcategories::model()->findAll();
        if (!empty($faqCategoryModel)) {
            foreach ($faqCategoryModel as $row) {
                $faqCategories[] = array(
                    'id' => $row->faqcategories_id,
                    'name' => $row->faqcategories
                );
            }
        }

        $this->render('index', array(
            'productCategories' => CRMHelper::getProductCategoryChildrenTree(0),
            'faqCategories' => $faqCategories
        ));
    }

    public function actionView()
    {
        $id = Yii::app()->request->getParam('id');
        if (empty($id)) {
            throw new CHttpException(500);
        }

        $sql = 'SELECT faq.question, faq.answer, crmentity.createdtime';
        $sql .= ' FROM vtiger_faq faq';
        $sql .= ' INNER JOIN vtiger_crmentity crmentity ON crmentity.crmid=faq.id';
        $sql .= ' WHERE crmentity.deleted=0 AND faq.pushed=1 AND faq.id='.$id;

        $connection = Yii::app()->db;
        $command = $connection->createCommand($sql);
        $row = $command->queryRow();
        if (empty($row)) {
            throw new CHttpException(500);
        }
        $faq['question'] = $row['question'];

        $answer = $row['answer'];
        preg_match_all("/.*src=\"([^^]*?)\".*/i", $answer, $match);
        foreach ($match[1] as $image_name) {
            $answer = str_replace($image_name, AttachmentHelper::getCRMImagePath($image_name), $answer);
        }
        $faq['answer'] = $answer;

        $this->layout = '//layouts/layout_index';

        $this->render('view', array(
            'faq' => $faq
        ));
    }
}