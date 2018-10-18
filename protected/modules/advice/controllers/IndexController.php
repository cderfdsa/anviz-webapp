<?php
/**
 * Created by Jacobs.
 * Auth: jacobs@anviz.com
 * Copyright: Anviz Global Inc.
 * Date: 2017/8/21
 * Time: 14:51
 * FileName: IndexController.php
 */

class IndexController extends Controller
{
    public function actionIndex()
    {
        $this->layout = '//layouts/layout_index';

        $adviceTypes = array();
        $criteria = new CDbCriteria();
        $criteria->order = "presence ASC";
        $rows = VtigerAdvicesType::model()->findAll($criteria);
        if (!empty($rows)) {
            foreach ($rows as $row) {
                $adviceTypes[] = $row->advices_type;
            }
        }

        $this->render('index', array(
            'adviceTypes' => $adviceTypes
        ));
    }

    public function actionSave()
    {
        $title = Yii::app()->request->getParam('title');
        $advices_type = Yii::app()->request->getParam('advices_type');
        $contents = Yii::app()->request->getParam('contents');

        if(empty($title)){
            $this->response(false, 'title', 'Please enter the title');
        }
        if(empty($advices_type)){
            $this->response(false, 'advices_type', 'Please select the advice type');
        }
        if(empty($contents)){
            $this->response(false, 'contents', 'Please enter the contents');
        }

        $crmid = CRMHelper::addCrmentity('Advices');

        $advicesModel = new VtigerAdvices();
        $advicesModel->setIsNewRecord(true);
        $advicesModel->advicesid = $crmid;
        $advicesModel->title = $title;
        $advicesModel->contents = $contents;
        $advicesModel->advices_type = $advices_type;
        $advicesModel->related_id = $this->memberInfo['crmid'];
        $advicesModel->save();

        $advicescfModel = new VtigerAdvicescf();
        $advicescfModel->setIsNewRecord(true);
        $advicescfModel->advicesid = $crmid;
        $advicescfModel->save();

        $this->response(true);
    }
}