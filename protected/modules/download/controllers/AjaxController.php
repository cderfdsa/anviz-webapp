<?php
/**
 * Created by Jacobs.
 * Auth: jacobs@anviz.com
 * Copyright: Anviz Global Inc.
 * Date: 2017/9/5
 * Time: 16:11
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
        $criteria->alias = 'notes';
        $criteria->join = 'INNER JOIN vtiger_crmentity crmentity ON crmentity.crmid=notes.notesid';
        $criteria->addCondition('crmentity.deleted=0');
        $criteria->addCondition('notes.push=1');
        $criteria->addCondition('notes.filestatus=1');
        if (empty($category_id)) {
            $folders = AttachmentHelper::getFolderList();
            if (!empty($folders)) {
                $_folderid = array();
                foreach ($folders as $_folder) {
                    $_folderid[] = $_folder['id'];
                }
                $criteria->addInCondition('notes.folderid', $_folderid);
            }else{
                $criteria->addCondition('1=0');
            }
        }else{
            $criteria->addCondition('notes.folderid='.$category_id);
        }

        if(!empty($keyword)){
            $criteria->addSearchCondition('notes.title', $keyword);
        }

        if (!empty($product_id)) {
            $notesid = CRMHelper::getRelationId($product_id, 'Documents');
            $criteria->addInCondition('notes.notesid', $notesid);
        } elseif (!empty($product_category)) {

        }

        $count = VtigerNotes::model()->count($criteria);
        $pageCount = ceil($count / $size);

        $criteria->limit = $size;
        $criteria->offset = $start;
        $criteria->order = 'crmentity.createdtime DESC';
        $notesModel = VtigerNotes::model()->findAll($criteria);
        $downloadList = array();
        foreach ($notesModel as $i => $row) {
            $downloadList[$i] = array(
                'fileType' => $row->folderid,
                'fileName' => $row->title,
                'fileSize' => empty($row->filesize) ? '' : ToolHelper::byte_format($row->filesize, 2),
                'uploadTime' => date('m/d/Y', strtotime($row->updatetime)),
                'downloadUrl' => ''
            );
            if ($row->filelocationtype == 'E') {
                $downloadList[$i]['downloadUrl'] = $row->filename;
            } else {
                $downloadList[$i]['downloadUrl'] = AttachmentHelper::getDownload($row->notesid);
            }
        }

        echo CJSON::encode(array(
            'page' => $page,
            'pageCount' => $pageCount,
            'data' => $downloadList
        ));
    }
}