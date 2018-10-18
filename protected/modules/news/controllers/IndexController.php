<?php
/**
 * Created by Jacobs.
 * Auth: jacobs@anviz.com
 * Copyright: Anviz Global Inc.
 * Date: 2017/10/16
 * Time: 17:24
 * FileName: IndexController.php
 */

class IndexController extends Controller
{
    public function actionView()
    {
        $id = Yii::app()->request->getParam('id');
        if (empty($id)) {
            throw new CHttpException(500);
        }

        $sql = 'SELECT news.newsid, news.newstitle, news.contents, news.news_type, news.publictime';
        $sql .= ' FROM vtiger_news news';
        $sql .= ' INNER JOIN vtiger_crmentity crmentity ON crmentity.crmid=news.newsid';
        $sql .= ' WHERE news.newsid=' . $id . ' AND crmentity.deleted=0 AND news.push=1 AND news.news_status="Active"';

        $connection = Yii::app()->db;
        $command = $connection->createCommand($sql);
        $row = $command->queryRow();
        if (empty($row)) {
            throw new CHttpException(500);
        }
        $content = $row['contents'];
        preg_match_all("/.*<img([^^]*?)>.*/i", $content, $match);
        foreach ($match[1] as $img) {
            $content = str_replace('<img' . $img . '>', '<div class="mui-card-content anviz-card-content"><div class="mui-content-padded"><img data-preview-src="" data-preview-group="1"' . $img . '></div></div>', $content);
        }
        preg_match_all("/.*src=\"([^^]*?)\".*/i", $content, $match);
        foreach ($match[1] as $image_name) {
            $content = str_replace($image_name, AttachmentHelper::getCRMImagePath($image_name), $content);
        }

        $news = array(
            'id' => $row['newsid'],
            'title' => $row['newstitle'],
            'content' => $content,
            'type' => $row['news_type'],
            'publictime' => date("m/d/Y", strtotime($row["publictime"])),
        );

        $this->layout = '//layouts/layout_index';

        $this->render('view', array(
            'news' => $news
        ));
    }
}