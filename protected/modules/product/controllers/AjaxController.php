<?php
/**
 * Created by Jacobs.
 * Auth: jacobs@anviz.com
 * Copyright: Anviz Global Inc.
 * Date: 2017/8/11
 * Time: 9:15
 * FileName: AjaxController.php
 */

class AjaxController extends Controller
{
    public function actionHomenew()
    {
        $criteria = new CDbCriteria();
        $criteria->alias = 'pro';
        $criteria->join = 'INNER JOIN vtiger_crmentity crmentity ON crmentity.crmid=pro.website_productsid INNER JOIN vtiger_website_productscf procf ON procf.website_productsid=pro.website_productsid';
        $criteria->addCondition('crmentity.deleted=0');
        $criteria->addCondition('pro.website_product_status="Active"');
        $criteria->addCondition('procf.cf_1325>0');
        $criteria->limit = 12;
        $criteria->order = 'procf.cf_1325 ASC';
        $productsModel = VtigerWebsiteProducts::model()->findAll($criteria);
        $productList = array();
        foreach ($productsModel as $i => $row) {
            $productList[$i] = array(
                'contentId' => $row->website_productsid,
                'productorName' => $row->product_model,
                'productorImg' => AttachmentHelper::getImageUrl($row->website_productsid, 'website_products Image'),
                'productorDes' => $row->product_name,
                'productorUrl' => Yii::app()->createUrl('product/' . $row->website_productsid),
            );
        }

        echo CJSON::encode($productList);
    }

    public function actionHomeupgrade()
    {
        $criteria = new CDbCriteria();
        $criteria->alias = 'pro';
        $criteria->join = 'INNER JOIN vtiger_crmentity crmentity ON crmentity.crmid=pro.website_productsid INNER JOIN vtiger_website_productscf procf ON procf.website_productsid=pro.website_productsid';
        $criteria->addCondition('crmentity.deleted=0');
        $criteria->addCondition('pro.website_product_status="Active"');
        $criteria->addCondition('procf.cf_1326>0');
        $criteria->limit = 12;
        $criteria->order = 'procf.cf_1326 ASC';
        $productsModel = VtigerWebsiteProducts::model()->findAll($criteria);
        $productList = array();
        foreach ($productsModel as $i => $row) {
            $productList[$i] = array(
                'contentId' => $row->website_productsid,
                'productorName' => $row->product_model,
                'productorImg' => AttachmentHelper::getImageUrl($row->website_productsid, 'website_products Image'),
                'productorDes' => $row->product_name,
                'productorUrl' => Yii::app()->createUrl('product/' . $row->website_productsid),
            );
        }

        echo CJSON::encode($productList);
    }

    public function actionCategory()
    {
        $id = Yii::app()->request->getParam('id');
        if (empty($id)) {
            $result = array(
                array(
                    'id' => 1,
                    'data' => array(
                        'productorName' => 'Biometric',
                        'productorDescribe' => 'We know biometric, and we know you.',
                        'productorImg' => 'http://www.beta.anviz.com/Style/crmtmp/storage/2016/October/week2/537549_S-L100K_LowVoltage03.png'
                    )
                ),
                array(
                    'id' => 3,
                    'data' => array(
                        'productorName' => 'Surveillance',
                        'productorDescribe' => 'See the world clear, do the action right.',
                        'productorImg' => 'http://www.beta.anviz.com/Style/crmtmp/storage/2015/August/week4/399163_A1A2-W.png'
                    )
                ),
                array(
                    'id' => 2,
                    'data' => array(
                        'productorName' => 'RFID',
                        'productorDescribe' => 'Informationize what you care, and solve the problem.',
                        'productorImg' => 'http://www.beta.anviz.com/Style/crmtmp/storage/2013/November/week3/223062_DSC_0731s.png'
                    )
                )
            );
        } else {
            $result = array();
            $categories = CRMHelper::getProductCategoryChildren($id);
            if (!empty($categories)) {
                foreach ($categories as $row) {
                    $result[] = array(
                        'id' => $row['id'],
                        'data' => array(
                            'productName' => $row['name'],
                            'productDescribe' => '',
                            'productorImg' => ''
                        )
                    );
                }
            }
        }

        echo CJSON::encode($result);
    }

    public function actionSolution()
    {
        $result = array(
            array(
                'id' => 'SecurityONE',
                'data' => array(
                    'solutionName' => 'SecurityONE',
                    'solutionDescribe' => 'We know biometric, and we know you.',
                    'solutionImg' => 'http://www.beta.anviz.com/Style/Default/images/AIM/SecurityONE_UI.png'
                )
            ),
            array(
                'id' => 'CrossChex',
                'data' => array(
                    'solutionName' => 'CrossChex',
                    'solutionDescribe' => 'Time Attendance and Access Control Management System.',
                    'solutionImg' => 'http://www.beta.anviz.com/Style/Default/images/Cross/themb_crosschex_main.png'
                )
            ),
            array(
                'id' => 'IntelliSight',
                'data' => array(
                    'solutionName' => 'IntelliSight',
                    'solutionDescribe' => 'Intelligent Video Surveillance System Solution.',
                    'solutionImg' => 'http://www.beta.anviz.com/Style/Default/images/AIM/IntelliSight_UI.png'
                )
            )
        );

        echo CJSON::encode($result);
    }

    public function actionProductlist()
    {
        $id = Yii::app()->request->getParam('id');
        $page = Yii::app()->request->getParam('page');
        $size = Yii::app()->request->getParam('size');

        $id = empty($id) ? 1 : $id;
        $page = empty($page) ? 1 : $page;
        $size = empty($size) ? 10 : $size;
        $start = ($page - 1) * $size;

        $idArr = CRMHelper::getProductCategoryChildrenId($id);

        $criteria = new CDbCriteria();
        $criteria->alias = 'pro';
        $criteria->join = 'INNER JOIN vtiger_crmentity crmentity ON crmentity.crmid=pro.website_productsid 
                            INNER JOIN vtiger_website_productscf procf ON procf.website_productsid=pro.website_productsid 
                            INNER JOIN vtiger_website_products_rel_category prorelcate ON prorelcate.website_productsid=pro.website_productsid';
        $criteria->addCondition('crmentity.deleted=0');
        $criteria->addCondition('pro.website_product_status="Active"');
        $criteria->addInCondition('prorelcate.category_id', $idArr);

        $count = VtigerWebsiteProducts::model()->count($criteria);
        $pageCount = ceil($count / $size);

        $criteria->limit = $size;
        $criteria->offset = $start;
        $criteria->order = 'pro.publictime DESC';
        $productsModel = VtigerWebsiteProducts::model()->findAll($criteria);
        $productList = array();
        foreach ($productsModel as $i => $row) {
            $productList[$i] = array(
                'contentId' => $row->website_productsid,
                'productorName' => $row->product_model,
                'productorImg' => AttachmentHelper::getImageUrl($row->website_productsid, 'website_products Image'),
                'productorDes' => $row->product_name,
                'productorUrl' => Yii::app()->createUrl('product/' . $row->website_productsid),
            );
        }

        echo CJSON::encode(array(
            'page' => $page,
            'pageCount' => $pageCount,
            'data' => $productList
        ));
    }

    public function actionSelect()
    {
        $category_id = Yii::app()->request->getParam('category_id');

        $criteria = new CDbCriteria();
        $criteria->alias = 'pro';
        $criteria->join = 'INNER JOIN vtiger_crmentity crmentity ON crmentity.crmid=pro.website_productsid 
                            INNER JOIN vtiger_website_productscf procf ON procf.website_productsid=pro.website_productsid 
                            INNER JOIN vtiger_website_products_rel_category prorelcate ON prorelcate.website_productsid=pro.website_productsid';
        $criteria->addCondition('crmentity.deleted=0');
        $criteria->addCondition('pro.website_product_status="Active"');
        if (!empty($category_id)) {
            $idArr = CRMHelper::getProductCategoryChildrenId($category_id);
            $criteria->addInCondition('prorelcate.category_id', $idArr);
        }
        $criteria->order = 'pro.publictime DESC';
        $productsModel = VtigerWebsiteProducts::model()->findAll($criteria);
        $productList = array();
        foreach ($productsModel as $i => $row) {
            $productList[$i] = array(
                'contentId' => $row->website_productsid,
                'productorName' => $row->product_model,
                'productorImg' => AttachmentHelper::getImageUrl($row->website_productsid, 'website_products Image'),
                'productorDes' => $row->product_name,
                'productorUrl' => Yii::app()->createUrl('product/' . $row->website_productsid),
            );
        }

        echo CJSON::encode($productList);
    }
}