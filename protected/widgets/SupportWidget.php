<?php
/**
 * Created by Jacobs.
 * Auth: jacobs@anviz.com
 * Copyright: Anviz Global Inc.
 * Date: 2017/8/24
 * Time: 11:27
 * FileName: SupportWidget.php
 */

class SupportWidget extends Widget
{
    public $block;

    public function run()
    {
        if (empty($this->block))
            return false;

        $method = '_' . ucfirst(strtolower($this->block));
        if (method_exists($this, $method)) {
            $this->$method();
        } else {
            return false;
        }
    }

    private function _header()
    {
        if (Yii::app()->user->isGuest) {
            $this->render('header_no_login');
        } else {
            $this->render('header', array(
                'count' => CRMHelper::getTicketCount(Yii::app()->user->getId())
            ));
        }
    }

    private function _ticket()
    {
        if (Yii::app()->user->isGuest) {
            $this->render('ticket_no_login');
        } else {
            $this->render('ticket', array(
                'count' => CRMHelper::getTicketCount(Yii::app()->user->getId())
            ));
        }
    }

    private function _faq()
    {
        $criteria = new CDbCriteria();
        $criteria->alias = 'faq';
        $criteria->join = 'INNER JOIN vtiger_crmentity crmentity ON crmentity.crmid=faq.id';
        $criteria->addCondition('crmentity.deleted=0');
        $criteria->addCondition('faq.pushed=1');
        $count = VtigerFaq::model()->count($criteria);

        $this->render('faq', array(
            'count' => $count
        ));
    }

    private function _download(){
        $this->render('download', array(
            'count' => 0
        ));
    }
}