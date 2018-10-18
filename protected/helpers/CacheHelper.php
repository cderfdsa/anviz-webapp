<?php
/**
 * Created by Jacobs.
 * Auth: jacobs@anviz.com
 * Copyright: Anviz Global Inc.
 * Date: 2017/8/21
 * Time: 10:58
 * FileName: CacheHelper.php
 */

class CacheHelper
{
    private static $cacheTime = 3600;
    private static $memberKey = 'user-';
    private static $leadKey = 'lead-';
    private static $contactKey = 'contact-';
    private static $accountKey = 'account-';

    public static function cacheLeadInfo($id = '')
    {
        if (empty($id)) {
            return false;
        }

        $leadInfo = CRMHelper::getLeadInfo($id);
        if (empty($leadInfo))
            return false;

        $key = self::$leadKey . $id;
        Yii::app()->cache->set($key, $leadInfo, self::$cacheTime);
    }

    public static function cacheContactInfo($id)
    {
        if (empty($id)) {
            return false;
        }

        $contactInfo = CRMHelper::getContactInfo($id);
        if (empty($contactInfo))
            return false;

        $key = self::$contactKey . $id;
        Yii::app()->cache->set($key, $contactInfo, self::$cacheTime);

        if(!empty($contactInfo['accountid'])){
            self::cacheAccountInfo($contactInfo['accountid']);
        }
    }

    public static function cacheMemberInfo($id = '')
    {
        if (empty($id)) {
            return false;
        }

        $memberInfo = CRMHelper::getMemberInfo($id);
        if (empty($memberInfo))
            return false;

        $key = self::$memberKey . $id;
        Yii::app()->cache->set($key, $memberInfo, self::$cacheTime);

        switch ($memberInfo['setype']) {
            case 'Leads':
                self::cacheLeadInfo($id);
                break;
            case 'Contacts':
                self::cacheContactInfo($id);
                break;
        }
    }

    public static function cacheAccountInfo($id = '')
    {
        if (empty($id)) {
            return false;
        }

        $accountInfo = CRMHelper::getAccountInfo($id);
        if (empty($accountInfo))
            return false;

        $key = self::$accountKey . $id;
        Yii::app()->cache->set($key, $accountInfo, self::$cacheTime);
    }

    public static function getCacheMemberInfo($id = '')
    {
        if (empty($id) && Yii::app()->user->isGuest)
            return false;

        if (empty($id)) {
            $id = Yii::app()->user->id;
        }

        $key = self::$memberKey . $id;

        $memberinfo = Yii::app()->cache->get($key);
        if(empty($memberinfo)){
            self::cacheMemberInfo($id);
            $memberinfo = Yii::app()->cache->get($key);
        }

        return $memberinfo;
    }

    public static function getCacheLeadInfo($id = '')
    {
        if (empty($id) && Yii::app()->user->isGuest)
            return false;

        if (empty($id)) {
            $id = Yii::app()->user->id;
        }

        $key = self::$leadKey . $id;

        $leadinfo = Yii::app()->cache->get($key);
        if(empty($leadinfo)){
            self::cacheLeadInfo($id);
            $leadinfo = Yii::app()->cache->get($key);
        }

        return $leadinfo;
    }

    public static function getCacheContactInfo($id = '')
    {
        if (empty($id) && Yii::app()->user->isGuest)
            return false;

        if (empty($id)) {
            $id = Yii::app()->user->id;
        }

        $key = self::$contactKey . $id;

        $contactinfo = Yii::app()->cache->get($key);
        if(empty($contactinfo)){
            self::cacheContactInfo($id);
            $contactinfo = Yii::app()->cache->get($key);
        }

        return $contactinfo;
    }

    public static function getCacheAccountInfo($id = '')
    {
        if (empty($id) && Yii::app()->user->isGuest)
            return false;

        if (empty($id)) {
            $id = Yii::app()->user->id;
        }

        $key = self::$accountKey . $id;

        $accountinfo = Yii::app()->cache->get($key);
        if(empty($accountinfo)){
            self::cacheAccountInfo($id);
            $accountinfo = Yii::app()->cache->get($key);
        }

        return $accountinfo;
    }
}