<?php
/**
 * Created by Jacobs.
 * Auth: jacobs@anviz.com
 * Copyright: Anviz Global Inc.
 * Date: 2017/9/6
 * Time: 11:57
 * FileName: IndexController.php
 */

class IndexController extends Controller
{
    public function actionIndex()
    {
        $this->layout = '//layouts/layout_index';

        $productCategories = CRMHelper::getProductCategoryChildren(0);
        $products = array();
        foreach ($productCategories as $category) {
            $idArr = CRMHelper::getProductCategoryChildrenId($category['id']);

            $criteria = new CDbCriteria();
            $criteria->alias = 'pro';
            $criteria->join = 'INNER JOIN vtiger_crmentity crmentity ON crmentity.crmid=pro.website_productsid 
                            INNER JOIN vtiger_website_productscf procf ON procf.website_productsid=pro.website_productsid 
                            INNER JOIN vtiger_website_products_rel_category prorelcate ON prorelcate.website_productsid=pro.website_productsid';
            $criteria->addCondition('crmentity.deleted=0');
            $criteria->addCondition('pro.website_product_status="Active"');
            $criteria->addInCondition('prorelcate.category_id', $idArr);
            $criteria->order = 'pro.publictime DESC';
            $productsModel = VtigerWebsiteProducts::model()->findAll($criteria);
            foreach ($productsModel as $row) {
                $products[$category['id']][] = array(
                    'id' => $row->website_productsid,
                    'model' => $row->product_model
                );
            }
        }

        $this->render('index', array(
            'countries' => CRMHelper::getCountries(),
            'productCategories' => $productCategories,
            'products' => $products
        ));
    }

    public function actionSave()
    {
        $title = Yii::app()->request->getParam('title');
        $country = Yii::app()->request->getParam('country');
        $product_id = Yii::app()->request->getParam('model');
        $publictime = Yii::app()->request->getParam('studiesDate');
        $content = Yii::app()->request->getParam('description');

        if (empty($title)) {
            $this->response(false, 'title', 'Please enter the title');
        }
        if (empty($country)) {
            $this->response(false, 'country', 'Please select the country');
        }
        if (empty($content)) {
            $this->response(false, 'description', 'Please enter the content');
        }

        if (empty($publictime)) {
            $publictime = date('Y-m-d H:i:s');
        }

        $crmid = CRMHelper::addCrmentity('Website_casestudy', '', 26929);
        $casestudyModel = new VtigerWebsiteCasestudy();
        $casestudyModel->setIsNewRecord(true);
        $casestudyModel->website_casestudyid = $crmid;
        $casestudyModel->title = $title;
        $casestudyModel->publictime = $publictime;
        $casestudyModel->country = $country;
        $casestudyModel->website_casestudy_status = 'Active';
        $casestudyModel->content = $content;
        $casestudyModel->relate_id = $this->memberInfo['crmid'];
        $casestudyModel->save();

        $connection = Yii::app()->db;

        $sql = 'INSERT INTO vtiger_website_casestudycf VALUES (' . $crmid . ')';
        $command = $connection->createCommand($sql);
        $command->execute();

        CRMHelper::addCrmentityRel($product_id, 'Website_products', $crmid, 'Website_casestudy');

        $this->response(true);
    }
}