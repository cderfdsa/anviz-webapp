<?php
/**
 * Created by PhpStorm.
 * User: jacobs
 * Date: 2017/7/27
 * Time: 12:23
 */

class LogHelper
{
    public static function write($file, $content)
    {
        $log_path = Yii::app()->getRuntimePath() . DIRECTORY_SEPARATOR . 'log' . DIRECTORY_SEPARATOR;
        if (!is_dir($log_path)) {
            ToolHelper::createDir($log_path);
        }

        $fp = fopen($log_path . $file, 'a+');
        fwrite($fp, date("m/d/Y H:i:s"));
        fwrite($fp, "\t");
        fwrite($fp, $content);
        fwrite($fp, "\r\n");
        fclose($fp);
    }
}