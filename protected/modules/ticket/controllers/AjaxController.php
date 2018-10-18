<?php
/**
 * Created by Jacobs.
 * Auth: jacobs@anviz.com
 * Copyright: Anviz Global Inc.
 * Date: 2017/8/24
 * Time: 13:41
 * FileName: AjaxController.php
 */

class AjaxController extends Controller
{
    public function actionTicketlist()
    {
        $parent_id = $this->memberInfo['crmid'];
        $page = Yii::app()->request->getParam('page');
        $size = Yii::app()->request->getParam('size');

        $page = empty($page) ? 1 : $page;
        $size = empty($size) ? 10 : $size;
        $start = ($page - 1) * $size;

        $criteria = new CDbCriteria();
        $criteria->select = 'ticket.ticketid, ticket.ticket_no, ticket.status, ticket.title, crmentity.description as update_log, crmentity.createdtime as groupname';
        $criteria->alias = 'ticket';
        $criteria->join = 'INNER JOIN vtiger_crmentity crmentity ON crmentity.crmid=ticket.ticketid';
        if (!empty($parent_id)) {
            $criteria->addCondition('ticket.parent_id=' . Yii::app()->user->getId());
        }
        $criteria->addCondition('crmentity.deleted=0');

        $count = VtigerTroubletickets::model()->count($criteria);
        $pageCount = ceil($count / $size);

        $criteria->limit = $size;
        $criteria->offset = $start;
        $criteria->order = 'crmentity.modifiedtime DESC';
        $numbers = CRMHelper::getTicketCount($parent_id);
        $ticketList = array(
            'userId' => $parent_id,
            'times' => $numbers['times'],
            'complete' => $numbers['complete'],
            'processing' => $numbers['processing'],
            'isTicket' => true,
            'page' => $page,
            'size' => $size,
            'total' => $count,
            'pageCount' => $pageCount,
            'ticketList' => array()
        );
        $ticketModel = VtigerTroubletickets::model()->findAll($criteria);
        if (!empty($ticketModel)) {
            foreach ($ticketModel as $i=>$row) {
                $ticketList['ticketList'][$i] = array(
                    'id' => $row->ticketid,
                    'ticketNum' => str_replace('TT', '', $row->ticket_no),
                    'ticketName' => $row->title,
                    'ticketDes' => $row->update_log,
                    'ticketDate' => $row->groupname,
                    'ticketStatus' => "2"
                );
                switch ($row->status){
                    case 'Finished':
                    case 'Solutioning':
                        $ticketList['ticketList'][$i]['ticketStatus'] = "2";
                        break;
                    case 'Closed':
                        $ticketList['ticketList'][$i]['ticketStatus'] = "3";
                        break;
                    case 'answered':
                        $ticketList['ticketList'][$i]['ticketStatus'] = "1";
                    default:
                        $ticketList['ticketList'][$i]['ticketStatus'] = "0";
                        break;
                }
            }
        }
        echo CJSON::encode($ticketList);
    }
}