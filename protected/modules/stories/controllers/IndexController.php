<?php
/**
 * Created by Jacobs.
 * Auth: jacobs@anviz.com
 * Copyright: Anviz Global Inc.
 * Date: 2017/9/13
 * Time: 11:16
 * FileName: IndexController.php
 */

class IndexController extends Controller
{
    public function actionIndex()
    {
        $this->layout = '//layouts/layout_index';

        $this->render('index');
    }

    public function actionSave()
    {
        $title = Yii::app()->request->getParam('title');
        $publictime = Yii::app()->request->getParam('date');
        $content = Yii::app()->request->getParam('description');

        if (empty($title)) {
            $this->response(false, 'title', 'Please enter the title');
        }
        if (empty($content)) {
            $this->response(false, 'description', 'Please enter the content');
        }

        if (empty($publictime)) {
            $publictime = date('Y-m-d H:i:s');
        }

        $crmid = CRMHelper::addCrmentity('News', '', 1);
        $newsModel = new VtigerNews();
        $newsModel->setIsNewRecord(true);
        $newsModel->newsid = $crmid;
        $newsModel->newstitle = $title;
        $newsModel->contents = $content;
        $newsModel->publictime = $publictime;
        $newsModel->news_type = 'Success Stories';
        $newsModel->news_status = 'Pending';
        $newsModel->relate_id = $this->memberInfo['crmid'];
        $newsModel->save();

        $connection = Yii::app()->db;

        $sql = 'INSERT INTO vtiger_newscf VALUES (' . $crmid . ')';
        $command = $connection->createCommand($sql);
        $command->execute();

        $this->response(true);
    }
}