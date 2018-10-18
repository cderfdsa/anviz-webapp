<?php

/**
 * Created by PhpStorm.
 * User: jacobs
 * Date: 2017/7/6
 * Time: 8:47
 */
class AttachmentHelper
{
    public static function getImageUrl($crmid = 0, $setype = '', $thumb = '')
    {
        if (empty($crmid))
            return '';

        $criteria = new CDbCriteria();
        $criteria->select = 'att.path, att.attachmentsid, att.name';
        $criteria->alias = 'att';
        $criteria->join = 'INNER JOIN vtiger_crmentity crmentity ON crmentity.crmid=att.attachmentsid INNER JOIN vtiger_seattachmentsrel seatt ON seatt.attachmentsid=att.attachmentsid';
        $criteria->addCondition('seatt.crmid=' . $crmid);
        if (!empty($setype)) {
            $criteria->addCondition('crmentity.setype="' . $setype . '"');
        }

        $row = VtigerAttachments::model()->find($criteria);
        if (empty($row))
            return '';

        $file_path = $row->path . $row->attachmentsid . '_' . $row->name;

        return self::getCRMImagePath($file_path, $thumb);
    }

    public static function getCRMImagePath($filepath = '', $thumb = '')
    {
        if (empty($filepath))
            return false;

        $filepath = ltrim(str_replace('+', '_', urldecode($filepath)), '/');

        if (substr($filepath, 0, 7) == "http://" || substr($filepath, 0, 6) == "ftp://" || substr($filepath, 0, 8) == "https://")
            return $filepath;

        if (strpos($filepath, "/test/") !== false) {
            $filepath = substr($filepath, strpos($filepath, "/test/"));
        } elseif (strpos($filepath, "/storage/") !== false) {
            $filepath = substr($filepath, strpos($filepath, "/storage/"));
        }

        $pDir = realpath(Yii::app()->basePath . DIRECTORY_SEPARATOR . '..') . DIRECTORY_SEPARATOR . 'img' . DIRECTORY_SEPARATOR . 'tmp' . DIRECTORY_SEPARATOR;
        $pPath = Yii::app()->baseUrl . '/img/tmp/';

        if (file_exists($pDir . $filepath) && empty($thumb))
            return $pPath . $filepath;

        if (!file_exists($pDir . $filepath)) {
            $crmConfig = Yii::app()->params['crm'];
            $crmDir = $crmConfig['dir'] . ltrim($filepath, '/');
            ToolHelper::createDir($pDir . $filepath);
            copy($crmDir, $pDir . $filepath);
        }

        if (!empty($thumb)) {
            if (is_array($thumb)) {

            } elseif (strpos($thumb, ',') != false) {
                $thumb = explode(',', $thumb);
            } else {
                $thumb = array(0, $thumb);
            }

            $pathinfo = pathinfo($filepath);
            $thumbName = $pathinfo['filename'] . '_thumb_' . $thumb[0] . '_' . $thumb[1] . '.' . $pathinfo['extension'];

            if (!file_exists($pDir . $thumbName)) {
                Yii::import('application.extensions.CThumb', false);
                CThumb::createThumb($pDir . $filepath, $pDir . $thumbName, $thumb[0], $thumb[1]);
            }
            return array(
                'image' => $pPath . $filepath,
                'thumb' => $pPath . $thumbName
            );
        }

        return $pPath . $filepath;
    }

    public static function getDownload($crmid = 0, $setype = '')
    {
        if (empty($crmid))
            return false;

        $criteria = new CDbCriteria();
        $criteria->select = 'att.path, att.attachmentsid, att.name';
        $criteria->alias = 'att';
        $criteria->join = 'INNER JOIN vtiger_crmentity crmentity ON crmentity.crmid=att.attachmentsid INNER JOIN vtiger_seattachmentsrel seatt ON seatt.attachmentsid=att.attachmentsid';
        $criteria->addCondition('seatt.crmid=' . $crmid);
        if (!empty($setype)) {
            $criteria->addCondition('crmentity.setype="' . $setype . '"');
        }

        $row = VtigerAttachments::model()->find($criteria);
        if (empty($row))
            return '';

        $file_path = $row->path . $row->attachmentsid . '_' . $row->name;

        return self::getCRMDownloadPath($file_path);
    }

    public static function getCRMDownloadPath($filepath = '')
    {
        if (empty($filepath))
            return false;


        $filepath = ltrim($filepath, '/');
        if (substr($filepath, 0, 7) == "http://" || substr($filepath, 0, 6) == "ftp://" || substr($filepath, 0, 8) == "https://")
            return $filepath;

        if (strpos($filepath, "/test/") !== false) {
            $filepath = substr($filepath, strpos($filepath, "/test/"));
        } elseif (strpos($filepath, "/storage/") !== false) {
            $filepath = substr($filepath, strpos($filepath, "/storage/"));
        }

        $pDir = realpath(Yii::app()->basePath . DIRECTORY_SEPARATOR . '..') . DIRECTORY_SEPARATOR . 'download' . DIRECTORY_SEPARATOR;
        $pPath = Yii::app()->baseUrl . '/download/';

        if (file_exists($pDir . $filepath))
            return $pPath . $filepath;

        $crmConfig = Yii::app()->params['crm'];
        $crmDir = $crmConfig['dir'] . ltrim($filepath, '/');
        ToolHelper::createDir($pDir . $filepath);

        copy($crmDir, $pDir . $filepath);

        return $pPath . $filepath;
    }

    public static function getFolderList()
    {
        $sql = 'SELECT folder.folderid, folder.foldername, folder.description';
        $sql .= ' FROM vtiger_attachmentsfolder folder';
        $sql .= ' WHERE folder.folderid>1 AND folder.foldername NOT LIKE "modules_%" AND folder.parent_id=0';
        $sql .= ' ORDER BY folder.sequence ASC';

        $connection = Yii::app()->db;
        $command = $connection->createCommand($sql);
        $result = $command->queryAll();
        $data = array();
        if (empty($result))
            return $data;

        foreach ($result as $row) {
            $data[] = array(
                'id' => $row['folderid'],
                'name' => $row['foldername'],
                'description' => $row['description']
            );
        }

        return $data;
    }
}