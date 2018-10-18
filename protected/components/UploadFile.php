<?php

/**
 * File Name: UploadFile.php
 * Created by Junzhu <junzhu@188.com>.
 * Website: http://www.256th.com
 * Date: 2017/2/24
 * Time: 11:59
 */
class UploadFile extends CUploadedFile{

    public static function getInstanceByName($name)
    {
        if(null===parent::$_files)
            parent::prefetchFiles();

        if(isset(parent::$_files[$name]) && parent::$_files[$name]->getError()!=UPLOAD_ERR_NO_FILE)
            return array(parent::$_files[$name]);
        elseif(isset(parent::$_files[$name.'[0]']) && parent::$_files[$name.'[0]']->getError()!=UPLOAD_ERR_NO_FILE){
            $_tmp = array();
            foreach(parent::$_files as $_k=>$_f){
                if(substr($_k, 0, strlen($name)) == $name){
                    $_tmp[] = $_f;
                }
            }
            return $_tmp;
        }

        return isset(parent::$_files[$name]) && parent::$_files[$name]->getError()!=UPLOAD_ERR_NO_FILE ? parent::$_files[$name] : null;
    }
}