<?php
/**
 * Created by Jacobs.
 * Auth: jacobs@anviz.com
 * Copyright: Anviz Global Inc.
 * Date: 2017/8/11
 * Time: 13:27
 * FileName: IndexController.php
 */

class IndexController extends Controller
{
    public function actionIndex()
    {
        $this->layout = '//layouts/layout_index';

        $this->render('index');
    }

    public function actionList()
    {
        $this->layout = '//layouts/layout_index';

        $id = Yii::app()->request->getParam('id');

        $id = empty($id) ? 1 : $id;

        $this->render('list', array(
            'id' => $id,
        ));
    }

    public function actionView()
    {
        $id = Yii::app()->request->getParam('id');
        if (empty($id)) {
            throw new CHttpException(500);
        }

        $sql = 'SELECT product.product_model, product.product_name, crmentity.description, product.product_modules, product_application, product_feature, product_parameter';
        $sql .= ' FROM vtiger_website_products product';
        $sql .= ' INNER JOIN vtiger_crmentity crmentity ON crmentity.crmid=product.website_productsid';
        $sql .= ' WHERE product.website_productsid=' . $id . ' and product.website_product_status="Active" and crmentity.deleted=0';

        $connection = Yii::app()->db;
        $command = $connection->createCommand($sql);
        $row = $command->queryRow();
        if (empty($row)) {
            throw new CHttpException(500);
        }
        $product = array(
            'productorId' => $id,
            'productModel' => $row['product_model'],
            'productName' => $row['product_name'],
            'productorDesc' => nl2br($row['description']),
            'productorModule' => array(),
            'productorModuleIcon' => array(),
        );
        if (!empty($row['product_modules'])) {
            $product_modules = explode(" |##| ", $row['product_modules']);
            $product['productorModule'] = $product_modules;
            foreach ($product_modules as $m) {
                $product['productorModuleIcon'][] = CRMHelper::getProductModulesIcon($m);
            }
        }

        $product_application = $row['product_application'];
        preg_match_all("/.*<img([^^]*?)>.*/i", $product_application, $match);
        foreach($match[1] as $img){
            $product_application = str_replace('<img'.$img.'>', '<div class="mui-card-content anviz-card-content"><div class="mui-content-padded"><img data-preview-src="" data-preview-group="1"'.$img.'></div></div>', $product_application);
        }
        preg_match_all("/.*src=\"([^^]*?)\".*/i", $product_application, $match);
        foreach ($match[1] as $image_name) {
            $product_application = str_replace($image_name, AttachmentHelper::getCRMImagePath($image_name), $product_application);
        }
        $product['productorApplication'] = $product_application;

        $product_feature = $row['product_feature'];
        preg_match_all("/.*<img([^^]*?)>.*/i", $product_feature, $match);
        foreach($match[1] as $img){
            $product_feature = str_replace('<img'.$img.'>', '<div class="mui-card-content anviz-card-content"><div class="mui-content-padded"><img data-preview-src="" data-preview-group="1"'.$img.'></div></div>', $product_feature);
        }
        preg_match_all("/.*src=\"([^^]*?)\".*/i", $product_feature, $match);
        foreach ($match[1] as $image_name) {
            $product_feature = str_replace($image_name, AttachmentHelper::getCRMImagePath($image_name), $product_feature);
        }
        $product['productorFeature'] = $product_feature;

        $product_parameter = explode("\r\n", $row['product_parameter']);
        if (strpos($row['product_parameter'], '<td>') !== false) {
            $last_p = '';
            foreach ($product_parameter as $parameter) {
                $parameter = explode(' |##| ', $parameter);
                $parameter[0] = strip_tags(str_replace('&nbsp;', '', $parameter[0]));
                $_parameter = explode('<td>', $parameter[1]);
                $_parameter[1] = str_replace('</td>', '', $_parameter[1]);
                if (!empty($parameter[0])) {
                    $product['productorParameter'][$parameter[0]][] = $_parameter;
                    $last_p = $parameter[0];
                } else {
                    $product['productorParameter'][$last_p][] = $_parameter;
                }
            }
        } else {
            foreach ($product_parameter as $parameter) {
                $parameter = explode(' |##| ', $parameter);
                $product['productorParameter']['Parameter'][] = $parameter;
            }
        }

        $pictures = array();
        $_pictures = CRMHelper::getProductPicture($id);
        if (!empty($_pictures)) {
            foreach ($_pictures as $i => $_p) {
                $pictures[] = array(
                    'bannerId' => $i,
                    'imgUrl' => $_p['thumb'],
                    'bannerUrl' => $_p['image']
                );
            }
        }

        $downloads = CRMHelper::getProductDownloadList($id, '10,13,2,15');

        $this->layout = '//layouts/layout_index';

        $this->render('view', array(
            'product' => $product,
            'pictures' => $pictures,
            'downloads' => $downloads
        ));
    }

    public function actionDownload()
    {
        $id = Yii::app()->request->getParam('id');
        if (empty($id)) {
            throw new CHttpException(500);
        }

        $data = array();
        $downloads = CRMHelper::getProductDownloadList($id, '10,13,2,15');
        if (!empty($downloads)) {
            foreach ($downloads as $row) {
                $data[] = array(
                    'fileType' => $row['folderid'],
                    'fileName' => $row['title'],
                    'fileSize' => $row['filesize'],
                    'uploadTime' => $row['updatetime'],
                    'downloadUrl' => $row['fileurl'],
                );
            }
        }

        echo CJSON::encode($data);
    }
}