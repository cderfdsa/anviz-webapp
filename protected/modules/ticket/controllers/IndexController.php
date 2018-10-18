<?php
/**
 * Created by Jacobs.
 * Auth: jacobs@anviz.com
 * Copyright: Anviz Global Inc.
 * Date: 2017/8/24
 * Time: 12:29
 * FileName: IndexController.php
 */

class IndexController extends Controller
{
    public function actionIndex()
    {
        $this->layout = '//layouts/layout_index';

        $this->render('index', array(
            'productCategories' => CRMHelper::getProductCategoryChildrenTree(0),
        ));
    }

    public function actionAdd()
    {
        $this->layout = '//layouts/layout_index';

        $ticketCategories = array();
        $ticketCategoryModel = VtigerTicketcategories::model()->findAll();
        if (!empty($ticketCategoryModel)) {
            foreach ($ticketCategoryModel as $row) {
                $ticketCategories[] = array(
                    'id' => $row->ticketcategories_id,
                    'name' => $row->ticketcategories
                );
            }
        }

        $this->render('add', array(
            'productCategories' => CRMHelper::getProductCategoryChildrenTree(0),
            'ticketCategories' => $ticketCategories
        ));
    }

    public function actionSave()
    {
        $ticket_title = Yii::app()->request->getPost('title');
        $product_id = Yii::app()->request->getPost('product_id');
        $ticketcategories = Yii::app()->request->getPost('ticketcategories');
        $content = Yii::app()->request->getPost('content');
exit;
        if (empty($ticket_title)) {
            $this->response(false, 'title', 'Please enter the ticket title');
        }
        if (empty($ticketcategories)) {
            $this->response(false, 'ticketcategories', 'Please select the ticket category');
        }
        if (empty($content)) {
            $this->response(false, 'content', 'Please enter the content');
        }

        $smcreatorid = empty($this->memberInfo['smownerid']) ? 29554 : $this->memberInfo['smownerid'];
        if (empty($this->memberInfo['technicalrep'])) {
            $smownerid = 29821; //Bright
        } else {
            $smownerid = $this->memberInfo['technicalrep'];
        }
        $crmid = CRMHelper::addCrmentity('HelpDesk', nl2br($content), $smownerid, $smcreatorid);

        $ticket_no = CRMHelper::getModentityNum('HelpDesk');
        $status = 'New';
        $ticketModel = new VtigerTroubletickets();
        $ticketModel->setIsNewRecord(true);
        $ticketModel->ticketid = $crmid;
        $ticketModel->ticket_no = $ticket_no;
        $ticketModel->parent_id = $this->memberInfo['crmid'];
        $ticketModel->product_id = $product_id;
        $ticketModel->priority = 'High';
        $ticketModel->status = $status;
        $ticketModel->category = $ticketcategories;
        $ticketModel->title = $ticket_title;
        $ticketModel->save();

        $connection = Yii::app()->db;

        $sql = 'INSERT INTO vtiger_ticketcf(ticketid, cf_814) VALUES (' . $crmid . ', "Partner Portal")';
        $command = $connection->createCommand($sql);
        $command->execute();

        $this->response(true);
    }

    public function actionView()
    {
        $id = Yii::app()->request->getParam('id');
        if (empty($id)) {
            throw new CHttpException(500);
        }

        $connection = Yii::app()->db;

        $sql = 'SELECT ticket.ticketid, ticket.ticket_no, ticket.title, ticket.category, ticket.parent_id, ticket.status, crmentity.createdtime, crmentity.modifiedtime, crmentity.description';
        $sql .= ' FROM vtiger_troubletickets ticket';
        $sql .= ' INNER JOIN vtiger_crmentity crmentity ON crmentity.crmid=ticket.ticketid';
        $sql .= ' INNER JOIN vtiger_ticketcf ticketcf ON ticketcf.ticketid=ticket.ticketid';
        $sql .= ' WHERE crmentity.deleted=0 AND ticket.ticketid=' . $id . ' AND ticket.parent_id=' . $this->memberInfo['crmid'];

        $command = $connection->createCommand($sql);
        $ticketModel = $command->queryRow();
        if (empty($ticketModel)) {
            throw new CHttpException(500);
        }

        $ticket = array(
            'id' => $id,
            'ticketid' => $ticketModel['ticketid'],
            'ticket_no' => $ticketModel['ticket_no'],
            'title' => $ticketModel['title'],
            'category' => $ticketModel['category'],
            'modifiedtime' => date("m/d/Y", strtotime($ticketModel['modifiedtime'])),
            'createdtime' => date("m/d/Y H:i:s", strtotime($ticketModel['createdtime']))
        );
        $parent_id = $ticketModel['parent_id'];
        $memberInfo = CacheHelper::getCacheMemberInfo($parent_id);
        $ticket['createdby'] = ToolHelper::contactName($memberInfo['firstname'], $memberInfo['lastname']);

        $description = $ticketModel['description'];
        preg_match_all("/.*<img([^^]*?)>.*/i", $description, $match);
        foreach ($match[1] as $img) {
            $description = str_replace('<img' . $img . '>', '<div class="mui-card-content anviz-card-content"><div class="mui-content-padded"><img data-preview-src="" data-preview-group="1"' . $img . '></div></div>', $description);
        }
        preg_match_all("/.*src=\"([^^]*?)\".*/i", $description, $match);
        foreach ($match[1] as $image_name) {
            $description = str_replace($image_name, AttachmentHelper::getCRMImagePath($image_name), $description);
        }
        $ticket['content'] = $description;

        switch ($ticketModel['status']) {
            case 'New':
            case 'In Progress':
            case 'Questioned':
                $ticket['status'] = 'Wait for service';
                break;
            case 'Answered':
                $ticket['status'] = 'Wait for client';
                break;
            case 'Solutioning':
            case 'Finished':
                $ticket['status'] = 'Finished';
                break;
            case 'Closed':
                $ticket['status'] = 'Closed and locked';
                break;
            default:
                $ticket['status'] = 'Pending';
                break;
        }

        $sql = 'SELECT ticketid, commentid, comment_qa, comments, ownerid, ownertype, createdtime';
        $sql .= ' FROM vtiger_ticketcomments';
        $sql .= ' WHERE ticketid=' . $id;
        $sql .= ' ORDER BY createdtime DESC';
        $command = $connection->createCommand($sql);
        $rows = $command->queryAll();
        $commentlist = array();
        if (!empty($rows)) {
            foreach ($rows as $i => $row) {
                $commentlist[$i] = array(
                    'createdtime' => date("m/d/Y H:i:s", strtotime($row["createdtime"])),
                    'comment_qa' => $row['comment_qa']
                );

                $content = htmlspecialchars_decode($row['comments']);
                preg_match_all("/.*<img([^^]*?)>.*/i", $content, $match);
                foreach ($match[1] as $img) {
                    $content = str_replace('<img' . $img . '>', '<div class="mui-card-content anviz-card-content"><div class="mui-content-padded"><img data-preview-src="" data-preview-group="1"' . $img . '></div></div>', $content);
                }
                preg_match_all("/.*src=\"([^^]*?)\".*/i", $content, $match);
                foreach ($match[1] as $image_name) {
                    $content = str_replace($image_name, AttachmentHelper::getCRMImagePath($image_name), $content);
                }
                $commentlist[$i]['content'] = $content;

                if ($row['ownertype'] == 'customer') {
                    $memberInfo = CacheHelper::getCacheMemberInfo($row['ownerid']);
                    $commentlist[$i]['createdby'] = ToolHelper::contactName($memberInfo['firstname'], $memberInfo['lastname']);
                }else{
                    $userInfo = CRMHelper::getUserinfo($row['ownerid']);
                    $commentlist[$i]['createdby'] = ToolHelper::contactName($userInfo['first_name'], $userInfo['last_name']);
                }
            }
        }

        $this->layout = '//layouts/layout_index';

        $this->render('view', array(
            'ticket' => $ticket,
            'commentlist' => $commentlist
        ));
    }
}