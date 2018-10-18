<?php

/**
 * File Name: WebUser.php
 * Created by Junzhu <junzhu@188.com>.
 * Website: http://www.256th.com
 * Date: 2017/3/15
 * Time: 13:52
 */
class WebUser extends CWebUser
{
    public function __construct()
    {
        $this->setStateKeyPrefix('MyAnviz_');
    }

    public function afterLogin($fromCookie)
    {
        CacheHelper::cacheMemberInfo($this->getId());
    }

    public function getMemberInfo($id = 0)
    {
        if (empty($id)) {
            $id = $this->getId();
        }

        if (empty($id)) {
            return false;
        }

        return CacheHelper::getCacheMemberInfo($id);
    }

    public function getLeadInfo($id = 0)
    {
        if (empty($id)) {
            $id = $this->getId();
        }

        if (empty($id)) {
            return false;
        }

        return CacheHelper::getCacheLeadInfo($id);
    }

    public function getContactInfo($id = 0)
    {
        if (empty($id)) {
            $id = $this->getId();
        }

        if (empty($id)) {
            return false;
        }

        return CacheHelper::getCacheContactInfo($id);
    }

    public function getAccountInfo($id = 0)
    {
        if (empty($id)) {
            $id = $this->getId();
            $contactInfo = $this->getContactInfo($id);
            if (empty($contactInfo) || empty($contactInfo['accountid']))
                return false;
            $id = $contactInfo['accountid'];
        }

        if (empty($id)) {
            return false;
        }

        return CacheHelper::getCacheContactInfo($id);
    }
}