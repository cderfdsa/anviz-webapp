<?php
/**
 * Created by Jacobs.
 * Auth: jacobs@anviz.com
 * Copyright: Anviz Global Inc.
 * Date: 2017/8/11
 * Time: 11:27
 * FileName: CRMHelper.php
 */

class CRMHelper
{
    public static function chklogin($email = '', $password = '')
    {
        if (empty($email) || empty($password)) {
            return false;
        }

        $sql = 'SELECT 
				crmentity.crmid,
				CASE crmentity.setype
					WHEN "Leads" THEN (SELECT email FROM vtiger_leaddetails leaddetails WHERE leaddetails.leadid=member.crmid)
					WHEN "Contacts" THEN (SELECT email FROM vtiger_contactdetails contactdetails WHERE contactdetails.contactid=member.crmid)
				END as email,
				member.password
			FROM vtiger_website_member member 
			INNER JOIN vtiger_crmentity crmentity ON member.crmid=crmentity.crmid
			WHERE crmentity.deleted=0 
			HAVING email="' . $email . '"';

        $connection = Yii::app()->db;
        $command = $connection->createCommand($sql);
        $result = $command->queryRow();
        if (!empty($result)) {
            if ($result["password"] != $password AND $result["password"] != md5($password))
                return false;

            if (strlen($result["password"]) == 32) {
                $_sql = 'UPDATE vtiger_website_member SET password="' . $password . '" WHERE crmid=' . $result['crmid'];
                $_command = $connection->createCommand($_sql);
                $_command->execute();
            }

            return $result;
        } else {
            $portal = self::portalInfoByEmail($email);
            if (!$portal)
                return false;
            self::copyPortalToMember($email);
            return self::chklogin($email, $password);
        }

        return false;
    }

    public static function getMemberInfo($crmid = 0)
    {
        if (empty($crmid))
            return false;

        $data = array();
        $connection = Yii::app()->db;

        $sql = 'SELECT member.crmid, crmentity.setype, member.islogin, member.isadmin, member.registertime, member.registerip, member.lastlogintime, member.lastloginip';
        $sql .= ' FROM vtiger_website_member member ';
        $sql .= ' INNER JOIN vtiger_crmentity crmentity ON member.crmid=crmentity.crmid';
        $sql .= ' WHERE crmentity.deleted=0 and member.crmid=' . $crmid;

        $command = $connection->createCommand($sql);
        $row = $command->queryRow();
        if (empty($row))
            return false;

        $data = array(
            'crmid' => $row['crmid'],
            'setype' => $row['setype'],
            'islogin' => $row['islogin'],
            'isadmin' => $row['isadmin'],
            'registertime' => $row['registertime'],
            'registerip' => $row['registerip'],
            'lastlogintime' => $row['lastlogintime'],
            'lastloginip' => $row['lastloginip'],
            'smownerid' => false,
            'technicalrep' => false,
        );

        switch ($data['setype']) {
            case 'Leads':
                $leadinfo = CacheHelper::getCacheLeadInfo($data['crmid']);
                if ($leadinfo) {
                    $data['email'] = $leadinfo['email'];
                    $data['firstname'] = $leadinfo['firstname'];
                    $data['lastname'] = $leadinfo['lastname'];
                    $data['salutation'] = $leadinfo['salutation'];
                    $data['smownerid'] = $leadinfo['smownerid'];
                }
                break;
            case 'Contacts':
                $contactinfo = CacheHelper::getCacheContactInfo($data['crmid']);
                if ($contactinfo) {
                    $data['email'] = $contactinfo['email'];
                    $data['firstname'] = $contactinfo['firstname'];
                    $data['lastname'] = $contactinfo['lastname'];
                    $data['salutation'] = $contactinfo['salutation'];
                    $data['smownerid'] = $contactinfo['smownerid'];
                    if (!empty($contactinfo['accountid'])) {
                        $accountinfo = CacheHelper::getCacheAccountInfo($contactinfo['accountid']);
                        if ($accountinfo) {
                            $data['smownerid'] = $accountinfo['smownerid'];
                            $data['technicalrep'] = $accountinfo['technicalrep'];
                        }
                    }
                }
                break;
        }

        return $data;
    }

    public static function getContactInfo($crmid = 0)
    {
        if (empty($crmid))
            return false;

        $data = array();
        $connection = Yii::app()->db;

        $sql = 'SELECT  crmentity.crmid, crmentity.smownerid, .contact.contactid, contact.accountid, contact.contact_no, contact.email, contact.firstname, contact.salutation, contact.lastname, contact.phone';
        $sql .= ', contactcf.cf_747 as job_title ';
        $sql .= ' FROM vtiger_contactdetails contact';
        $sql .= ' INNER JOIN vtiger_crmentity crmentity ON crmentity.crmid=contact.contactid';
        $sql .= ' LEFT JOIN vtiger_contactaddress address ON address.contactaddressid=contact.contactid';
        $sql .= ' INNER JOIN vtiger_contactscf contactcf ON contactcf.contactid=contact.contactid';
        $sql .= ' LEFT JOIN vtiger_contactsubdetails contactsub ON contactsub.contactsubscriptionid=contact.contactid';
        $sql .= ' WHERE crmentity.deleted=0 and contact.contactid=' . $crmid;

        $command = $connection->createCommand($sql);
        $row = $command->queryRow();
        if (empty($row))
            return false;

        $data = array(
            'crmid' => $row['crmid'],
            'contactid' => $row['contactid'],
            'accountid' => $row['accountid'],
            'contact_no' => $row['contact_no'],
            'email' => $row['email'],
            'firstname' => $row['firstname'],
            'lastname' => $row['lastname'],
            'salutation' => $row['salutation'],
            'job_title' => $row['job_title'],
            'phone' => $row['phone'],
            'smownerid' => $row['smownerid']
        );

        $criteria = new CDbCriteria();
        $criteria->addCondition('crmid=' . $data['crmid']);
        $criteria->addCondition('tablename="vtiger_contactdetails"');
        $rows = VtigerWebsiteMemberInfotmp::model()->findAll($criteria);
        if (!empty($rows)) {
            foreach ($rows as $row) {
                $key = $row->key;
                $val = $row->val;
                if (isset($data[$key]))
                    $data[$key] = $val;
            }
        }

        return $data;
    }

    public static function getAccountInfo($crmid = 0)
    {
        if (empty($crmid))
            return false;

        $data = array();
        $connection = Yii::app()->db;

        $sql = 'SELECT crmentity.crmid, crmentity.smownerid,account.accountid, account.account_no, account.accountname, account.account_type, account.industry, account.phone, account.website, account.technicalrep,';
        $sql .= ' accountcf.cf_618, accountcf.cf_620, accountcf.cf_623';
        $sql .= ' FROM vtiger_account account';
        $sql .= ' INNER JOIN vtiger_crmentity crmentity ON crmentity.crmid=account.accountid';
        $sql .= ' INNER JOIN vtiger_accountscf accountcf ON accountcf.accountid=account.accountid';
        $sql .= ' WHERE crmentity.deleted=0 AND account.accountid=' . $crmid;

        $command = $connection->createCommand($sql);
        $row = $command->queryRow();
        if (empty($row))
            return false;

        $data = array(
            'crmid' => $row['crmid'],
            'accountid' => $row['accountid'],
            'smownerid' => $row['smownerid'],
            'account_no' => $row['account_no'],
            'accountname' => $row['accountname'],
            'account_type' => $row['account_type'],
            'industry' => $row['industry'],
            'phone' => $row['phone'],
            'website' => $row['website'],
            'technicalrep' => $row['technicalrep'],
            'source' => $row['cf_618'],
            'country' => $row['cf_620'],
            'area' => $row['cf_623']
        );

        return $data;
    }

    public static function getLeadInfo($crmid = 0)
    {
        if (empty($crmid))
            return false;

        $data = array();
        $connection = Yii::app()->db;

        $sql = 'SELECT crmentity.crmid, crmentity.smownerid, lead.leadid, lead.lead_no, lead.email, lead.firstname, lead.salutation, lead.lastname, lead.company, lead.leadstatus, address.phone';
        $sql .= ', leadcf.cf_789 as job_title';
        $sql .= ' FROM vtiger_leaddetails lead';
        $sql .= ' INNER JOIN vtiger_crmentity crmentity ON crmentity.crmid=lead.leadid';
        $sql .= ' LEFT JOIN vtiger_leadaddress address ON address.leadaddressid=lead.leadid';
        $sql .= ' INNER JOIN vtiger_leadscf leadcf ON leadcf.leadid=lead.leadid';
        $sql .= ' LEFT JOIN vtiger_leadsubdetails leadsub ON leadsub.leadsubscriptionid=lead.leadid';
        $sql .= ' WHERE crmentity.deleted=0 and lead.leadid=' . $crmid;

        $command = $connection->createCommand($sql);
        $row = $command->queryRow();
        if (empty($row))
            return false;

        $data = array(
            'crmid' => $row['crmid'],
            'leadid' => $row['leadid'],
            'lead_no' => $row['lead_no'],
            'email' => $row['email'],
            'firstname' => $row['firstname'],
            'lastname' => $row['lastname'],
            'salutation' => $row['salutation'],
            'job_title' => $row['job_title'],
            'phone' => $row['phone'],
            'smownerid' => $row['smownerid']
        );

        $criteria = new CDbCriteria();
        $criteria->addCondition('crmid=' . $data['crmid']);
        $criteria->addCondition('tablename="vtiger_leadsdetails"');
        $rows = VtigerWebsiteMemberInfotmp::model()->findAll($criteria);
        if (!empty($rows)) {
            foreach ($rows as $row) {
                $key = $row->key;
                $val = $row->val;
                if (isset($data[$key]))
                    $data[$key] = $val;
            }
        }

        return $data;
    }

    public static function portalInfo($crmid = 0)
    {
        if (empty($crmid))
            return false;

        $sql = 'SELECT *
			FROM vtiger_customerdetails customer 
			INNER JOIN vtiger_portalinfo portal ON portal.id=customer.customerid 
			WHERE customer.customerid=' . $crmid . '
				AND customer.portal=1 
				AND isactive=1';

        $connection = Yii::app()->db;
        $command = $connection->createCommand($sql);
        $result = $command->queryRow();
        if (empty($result))
            return false;

        return true;
    }

    public static function portalInfoByEmail($email = '')
    {
        if (empty($email))
            return false;

        $sql = 'SELECT *
			FROM vtiger_customerdetails customer 
			INNER JOIN vtiger_portalinfo portal ON portal.id=customer.customerid 
			WHERE portal.user_name="' . $email . '" 
				AND customer.portal=1 				
				AND isactive=1';

        $connection = Yii::app()->db;
        $command = $connection->createCommand($sql);
        $result = $command->queryRow();

        if (empty($result))
            return false;

        return true;
    }

    public static function getagppinfo($crmid = 0)
    {
        if (empty($crmid))
            return false;

        $sql = 'SELECT crmentity.setype,
						 accountcf.cf_739 as agpp_type,
						 accountcf.cf_752 as agpp_grade,
						 accountcf.cf_749 as agpp_start_date,
						 accountcf.cf_750 as agpp_end_date,
						 accountcf.cf_751 as contract_amount,
						 accountcf.cf_735 as country
				FROM vtiger_accountscf accountcf 
				INNER JOIN vtiger_account account ON account.accountid = accountcf.accountid 
				INNER JOIN vtiger_crmentity crmentity ON crmentity.crmid = accountcf.accountid 
				WHERE accountcf.accountid = ' . $crmid . ' AND crmentity.deleted=0';

        $connection = Yii::app()->db;
        $command = $connection->createCommand($sql);
        $result = $command->queryRow();
        if (empty($result))
            return false;

        return $result;
    }

    public static function getRep($crmid = 0)
    {
        if (empty($crmid))
            return false;

        $model = VtigerCrmentity::model()->find('crmid=:crmid and deleted=:deleted', array(
            ':crmid' => $crmid,
            ':deleted' => 0
        ));
        if (empty($model) || empty($model->setype) || $model->setype == 'Leads')
            return false;
        $setype = $model->setype;

        if ($setype == 'Accounts') {
            $sql = 'SELECT account.technicalrep, crmentity.smownerid 
				FROM vtiger_account account 
				INNER JOIN vtiger_crmentity crmentity ON crmentity.crmid=account.accountid 
				WHERE account.accountid=' . $crmid . ' AND crmentity.deleted=0';
            $connection = Yii::app()->db;
            $command = $connection->createCommand($sql);
            $result = $command->queryRow();
            if (empty($result))
                return false;
        } elseif ($setype == 'Contacts') {
            $sql = 'SELECT account.technicalrep, crmentity.smownerid 
				FROM vtiger_account account 
				INNER JOIN vtiger_crmentity crmentity ON crmentity.crmid=account.accountid 
				INNER JOIN vtiger_contactdetails contact ON contact.accountid=account.accountid 
				WHERE contact.contactid=' . $crmid . ' AND crmentity.deleted=0';
            $connection = Yii::app()->db;
            $command = $connection->createCommand($sql);
            $result = $command->queryRow();
            if (empty($result))
                return false;
        }

        if (empty($result))
            return false;

        $smowerid = $result['smownerid'];
        $technicalid = $result['technicalrep'];

        $salesRep = self::getRep($smowerid);
        $technicalRel = self::getRep($technicalid);

        return array(
            'salesRep' => $salesRep,
            'technicalRel' => $technicalRel
        );
    }

    public static function getUserinfo($userid = 0)
    {
        if (empty($userid))
            return false;

        $model = VtigerUsers::model()->findByPk($userid);
        if (empty($model))
            return false;

        $userinfo = array(
            'id' => $model->id,
            'first_name' => $model->first_name,
            'last_name' => $model->last_name,
            'emp_no' => $model->emp_no,
            'title' => $model->title,
            'department' => $model->department,
            'phone_home' => $model->phone_home,
            'phone_work' => $model->phone_work,
            'phone_mobile' => $model->phone_mobile,
            'phone_other' => $model->phone_other,
            'email1' => $model->email1,
            'email2' => $model->email2,
            'secondaryemail' => $model->secondaryemail,
            'imagename' => $model->imagename
        );

        $sql = 'SELECT vtiger_attachments.attachmentsid, vtiger_attachments.name, vtiger_attachments.path 
        	FROM vtiger_attachments 
        	INNER JOIN vtiger_salesmanattachmentsrel ON vtiger_salesmanattachmentsrel.attachmentsid=vtiger_attachments.attachmentsid 
        	INNER JOIN vtiger_crmentity ON vtiger_crmentity.crmid=vtiger_attachments.attachmentsid 
        	WHERE vtiger_crmentity.deleted=0 AND vtiger_salesmanattachmentsrel.smid=' . $userid;

        $connection = Yii::app()->db;
        $command = $connection->createCommand($sql);
        $result = $command->queryRow();
        if (empty($result)) {
            $userinfo['imagename'] = '';
        } else {
            $userinfo['imagename'] = $result['name'];
            $userinfo['imagepath'] = $result['path'] . $result['attachmentsid'] . '_';
            if (!empty($userinfo['imagename'])) {
                $userinfo['imagefull'] = AttachmentHelper::getCRMImagePath($userinfo['imagepath'] . $userinfo['imagename'], '60,60');
            }
        }

        return $userinfo;
    }

    public static function copyPortalToMember($email = '')
    {
        if (empty($email))
            return false;

        $sql = 'SELECT *
			FROM vtiger_customerdetails customer 
			INNER JOIN vtiger_portalinfo portal ON portal.id=customer.customerid 
			WHERE portal.user_name="' . $email . '" 
				AND customer.portal=1 				
				AND isactive=1';

        $connection = Yii::app()->db;
        $command = $connection->createCommand($sql);
        $result = $command->queryRow();
        if (empty($result))
            return false;

        $memberModel = new VtigerWebsiteMember();
        $memberModel->setIsNewRecord(true);
        $memberModel->crmid = $result['customerid'];
        $memberModel->password = $result['user_password'];
        $memberModel->islogin = 1;
        $memberModel->isadmin = $result['is_admin'];
        $memberModel->isvalid = 1;
        $memberModel->lastlogintime = $result['last_login_time'];
        $memberModel->deleted = 0;
        $memberModel->save();

        return $memberModel->crmid;
    }

    public static function getProductCategoryChildren($id = 0)
    {
        $id = empty($id) ? 0 : $id;

        $data = array();

        $criteria = new CDbCriteria();
        $criteria->addCondition('parent_id=' . $id);
        $criteria->order = 'presence ASC';
        $productCategoryModel = VtigerWebsiteProductCategory::model()->findAll($criteria);
        if (empty($productCategoryModel))
            return $data;

        foreach ($productCategoryModel as $i => $row) {
            $data[$i] = array(
                'id' => $row->id,
                'parent_id' => $row->parent_id,
                'name' => $row->product_category
            );
        }

        return $data;
    }

    public static function getProductCategoryChildrenTree($id = 0)
    {
        $id = empty($id) ? 0 : $id;

        $data = array();

        $criteria = new CDbCriteria();
        $criteria->addCondition('parent_id=' . $id);
        $criteria->order = 'presence ASC';
        $productCategoryModel = VtigerWebsiteProductCategory::model()->findAll($criteria);
        if (empty($productCategoryModel))
            return $data;

        foreach ($productCategoryModel as $i => $row) {
            $data[$i] = array(
                'id' => $row->id,
                'parent_id' => $row->parent_id,
                'name' => $row->product_category
            );
            $_data = self::getProductCategoryChildrenTree($row->id);
            if (!empty($_data))
                $data[$i]['children'] = $_data;
        }

        return $data;
    }

    public static function getProductCategoryChildrenId($id = 0)
    {
        $ChildrenIdArr = array();

        $criteria = new CDbCriteria();
        if (!empty($id)) {
            $criteria->addCondition('parent_id=' . $id);
        }
        $productCategoryModel = VtigerWebsiteProductCategory::model()->findAll($criteria);
        if (!empty($productCategoryModel)) {
            foreach ($productCategoryModel as $row) {
                $_ChildrenIdArr = self::getProductCategoryChildrenId($row->id);
                $ChildrenIdArr = array_merge($ChildrenIdArr, $_ChildrenIdArr);
            }
        }
        if (!empty($id)) {
            $ChildrenIdArr[] = $id;
        }

        return $ChildrenIdArr;
    }

    public static function getProductPicture($id = 0)
    {
        if (empty($id))
            return false;

        $sql = 'SELECT att.path, att.attachmentsid, att.name';
        $sql .= ' FROM vtiger_website_product_picture picture';
        $sql .= ' INNER JOIN vtiger_attachments att ON att.attachmentsid=picture.attachmentsid';
        $sql .= ' INNER JOIN vtiger_seattachmentsrel attrel ON attrel.attachmentsid=att.attachmentsid';
        $sql .= ' INNER JOIN vtiger_crmentity crmentity ON crmentity.crmid=att.attachmentsid';
        $sql .= ' WHERE crmentity.deleted=0 and attrel.crmid=' . $id . ' and crmentity.setype="website_products Picture"';
        $sql .= ' ORDER BY picture.seat ASC';

        $connection = Yii::app()->db;
        $command = $connection->createCommand($sql);
        $result = $command->queryAll();
        if (empty($result))
            return false;

        $images = array();
        foreach ($result as $row) {
            $_image = AttachmentHelper::getCRMImagePath($row['path'] . $row['attachmentsid'] . '_' . $row['name'], '550,550');
            $images[] = array(
                'image' => $_image['image'],
                'thumb' => $_image['thumb']

            );
        }

        return $images;
    }

    public static function getProductModulesIcon($product_module = '')
    {
        $icon = '';
        switch ($product_module) {
            case '3.5 inch TFT Color LCD':
                $icon = 'PFI_TFTColorLCD';
                break;
            case 'Anviz Fingerprint Sensor':
                $icon = 'PFI_FingerprintSensor';
                break;
            case 'Bluetooth':
                $icon = 'PFI_Bluetooth';
                break;
            case 'Camera':
                $icon = 'PFI_Camera';
                break;
            case 'Daylight Saving':
                $icon = 'PFI_DaylightSaving';
                break;
            case 'Dual Cameras':
                $icon = 'PFI_DualCameras';
                break;
            case 'GPRS':
                $icon = 'PFI_GPRS';
                break;
            case 'Inbuilt Proximity Card Reader':
                $icon = 'PFI_InbuiltProximityCardReader';
                break;
            case 'Iris Recognition':
                $icon = 'PFI_IrisRecognition';
                break;
            case 'Multiple Language Display':
                $icon = 'PFI_MultipleLanguageDisplay';
                break;
            case 'Remote Door Control':
                $icon = 'PFI_RemoteDoorControl';
                break;
            case 'RS232/RS485':
                $icon = 'PFI_RS232RS485';
                break;
            case 'Self-Service Record Inquirty':
                $icon = 'PFI_Record';
                break;
            case 'TCP/IP':
                $icon = 'PFI_TCPIP';
                break;
            case 'TextMessage':
                $icon = 'PFI_TextMessage';
                break;
            case 'Touch Screen':
                $icon = 'PFI_TouchScreen';
                break;
            case 'USB':
                $icon = 'PFI_USB';
                break;
            case 'USB Host':
                $icon = 'PFI_USBHost';
                break;
            case 'Voice Prompt':
                $icon = 'PFI_VoicePrompt';
                break;
            case 'Webserver':
                $icon = 'PFI_Webserver';
                break;
            case 'Wifi':
                $icon = 'PFI_Wifi';
                break;
            case 'ZigBee':
                $icon = 'PFI_ZigBee';
                break;
            case 'Battery':
                $icon = 'Battery';
                break;
            case 'Password':
                $icon = 'Password';
                break;
            case 'IP65':
                $icon = 'IP65';
                break;
            case 'IK10':
                $icon = 'IK10';
                break;
            default:
                $icon = '';
                break;
        }

        return $icon;
    }

    public static function getRelationId($crmid = 0, $relmodule = '', $logic = true)
    {
        if (empty($crmid) || empty($relmodule)) {
            return false;
        }

        $connection = Yii::app()->db;
        $data = array();

        $sql = 'SELECT rel.relcrmid';
        $sql .= ' FROM vtiger_crmentityrel rel';
        $sql .= ' INNER JOIN vtiger_crmentity crmentity ON crmentity.crmid=rel.relcrmid';
        $sql .= ' WHERE crmentity.deleted=0 and rel.relmodule="' . $relmodule . '" and rel.crmid=' . $crmid;
        $sql .= ' GROUP BY relcrmid';
        $command = $connection->createCommand($sql);
        $result = $command->queryAll();
        if (!empty($result)) {
            foreach ($result as $row) {
                $data[] = $row['relcrmid'];
            }
        }

        $sql = 'SELECT rel.crmid';
        $sql .= ' FROM vtiger_crmentityrel rel';
        $sql .= ' INNER JOIN vtiger_crmentity crmentity ON crmentity.crmid=rel.crmid';
        $sql .= ' WHERE crmentity.deleted=0 and rel.module="' . $relmodule . '" and rel.relcrmid=' . $crmid;
        $sql .= ' GROUP BY crmid';
        $command = $connection->createCommand($sql);
        $result = $command->queryAll();
        if (!empty($result)) {
            foreach ($result as $row) {
                $data[] = $row['crmid'];
            }
        }

        return $data;
    }

    public static function getProductDownloadList($id = 0, $folderid = 0)
    {
        if (empty($id))
            return false;

        $relid = self::getRelationId($id, 'Documents');
        if (empty($relid))
            return false;

        $data = array();

        $sql = 'SELECT notes.notesid, notes.title, notes.folderid, notes.updatetime, notes.filesize, notes.filename, notes.filelocationtype';
        $sql .= ' FROM vtiger_notes notes';
        $sql .= ' INNER JOIN vtiger_crmentity crmentity ON crmentity.crmid=notes.notesid';
        $sql .= ' WHERE crmentity.deleted=0 and notes.push=1 and notes.filestatus=1 and notes.notesid in (' . join(',', $relid) . ')';
        if (!empty($folderid)) {
            if (is_string($folderid)) {
                $folderid = explode(',', $folderid);
            }
            $sql .= ' AND notes.folderid in (' . join(',', $folderid) . ')';
        }
        $sql .= ' ORDER BY notes.updatetime DESC';

        $connection = Yii::app()->db;
        $command = $connection->createCommand($sql);
        $result = $command->queryAll();
        if (!empty($result)) {
            foreach ($result as $i => $row) {
                $data[$i]['folderid'] = $row['folderid'];
                $data[$i]['title'] = $row['title'];
                $data[$i]['updatetime'] = date('m/d/Y', strtotime($row['updatetime']));
                $data[$i]['filesize'] = empty($row['filesize']) ? '' : ToolHelper::byte_format($row['filesize'], 2);
                if ($row['filelocationtype'] == 'E') {
                    $data[$i]['fileurl'] = $row['filename'];
                } else {
                    $data[$i]['fileurl'] = AttachmentHelper::getDownload($row['notesid']);
                }
            }
        }

        return $data;
    }

    public static function isRegisterByEmail($email = '', $crmid = 0)
    {
        if (empty($email))
            return true;

        $sql = 'SELECT COUNT(*) as count';
        $sql .= ' FROM vtiger_website_member member';
        $sql .= ' LEFT JOIN vtiger_leaddetails lead ON lead.leadid=member.crmid and lead.converted=0';
        $sql .= ' LEFT JOIN vtiger_contactdetails contact ON contact.contactid=member.crmid';
        $sql .= ' INNER JOIN vtiger_crmentity crmentity ON crmentity.crmid=member.crmid';
        $sql .= ' WHERE (lead.email="' . $email . '" OR contact.email="' . $email . '") AND crmentity.deleted=0';
        if (!empty($crmid)) {
            $sql .= ' AND member.crmid !=' . $crmid;
        }

        $connection = Yii::app()->db;
        $command = $connection->createCommand($sql);
        $row = $command->queryRow();
        if (empty($row) || $row['count'] <= 0)
            return false;

        return true;
    }

    public static function addCrmentity($module = '', $description = '', $smownerid = 0, $smcreatorid = 0)
    {
        if (empty($module))
            return false;

        $smownerid = empty($smownerid) ? 1 : $smownerid;
        $smcreatorid = empty($smcreatorid) ? 1 : $smcreatorid;
        $crmid = self::getMaxCrmid();

        $crmentityModel = new VtigerCrmentity();
        $crmentityModel->setIsNewRecord(true);
        $crmentityModel->crmid = $crmid;
        $crmentityModel->smcreatorid = $smcreatorid;
        $crmentityModel->smcreatedip = Yii::app()->request->getUserHostAddress();
        $crmentityModel->smownerid = $smcreatorid;
        $crmentityModel->modifiedby = $smownerid;
        $crmentityModel->setype = $module;
        $crmentityModel->description = $description;
        $crmentityModel->createdtime = date('Y-m-d H:i:s');
        $crmentityModel->modifiedtime = date('Y-m-d H:i:s');
        $crmentityModel->presence = 1;
        $crmentityModel->deleted = 0;
        $crmentityModel->save();

        return $crmid;
    }

    public static function getMaxCrmid($flag = true)
    {
        $model = VtigerCrmentitySeq::model()->find();

        $crmid = $model->id;
        while (true) {
            $crmid++;
            $exists = VtigerCrmentity::model()->exists('crmid=' . $crmid);
            if (!$exists)
                break;
        }

        if ($flag) {
            $model->id = $crmid;
            VtigerCrmentitySeq::model()->updateAll(array('id' => $crmid));
        }

        return $crmid;
    }

    public static function getModentityNum($module = '', $flag = true)
    {
        if (empty($module))
            return false;

        $criteria = new CDbCriteria();
        $criteria->addCondition('semodule="' . $module . '"');
        $criteria->addCondition('active=1');
        $row = VtigerModentityNum::model()->find($criteria);
        if (empty($row))
            return false;

        $prefix = $row->prefix;
        $cur_id = $row->cur_id;
        if ($flag) {
            $row->cur_id = $cur_id + 1;
            $row->save();
        }

        return $prefix . $cur_id;
    }

    public static function getValidInfo($t = '', $validtype = 'register')
    {
        if (empty($t))
            return false;

        $validtype = empty($validtype) ? 'register' : $validtype;

        $criteria = new CDbCriteria();
        $criteria->addCondition('t="' . $t . '"');
        $criteria->addCondition('validtype="' . $validtype . '"');
        $row = VtigerWebsiteMemberEmailvalid::model()->find($criteria);
        if (empty($row))
            return false;

        $data = array(
            'id' => $row->id,
            'crmid' => $row->crmid,
            't' => $row->t,
            'sendtime' => $row->sendtime,
            'validtype' => $row->validtype,
            'validtime' => $row->validtime,
            'active' => $row->active
        );
        return $data;
    }

    public static function insertMemberInfoTemp($crmid, $tablename, $field, $val)
    {
        if (empty($crmid) || empty($tablename) || empty($field))
            return false;

        switch ($tablename) {
            case 'vtiger_contactdetails':
                $key = 'contactid';
                break;
            case 'vtiger_leadsdetails':
                $key = 'leadid';
                break;
            default:
                return false;
                break;
        }

        VtigerWebsiteMemberInfotmp::model()->deleteAll('crmid=' . $crmid . ' and tablename="' . $tablename . '" and field="' . $field . '"');

        $sql = 'INSERT INTO vtiger_website_member_infotmp(`crmid`, `tablename`, `field`, `key`, `val`) VALUES(' . $crmid . ', "' . $tablename . '", "' . $field . '", "' . $key . '", "' . $val . '")';
        $connection = Yii::app()->db;
        $command = $connection->createCommand($sql);
        $command->execute();
    }

    public static function getTicketCount($parent_id = 0)
    {
        $count = array(
            'times' => 0,
            'complete' => 0,
            'processing' => 0,
            'answered' => 0
        );

        $criteria = new CDbCriteria();
        $criteria->select = 'count(*) as groupname, ticket.status';
        $criteria->alias = 'ticket';
        $criteria->join = 'INNER JOIN vtiger_crmentity crmentity ON crmentity.crmid=ticket.ticketid';
        if (!empty($parent_id)) {
            $criteria->addCondition('ticket.parent_id=' . Yii::app()->user->getId());
        }
        $criteria->addCondition('crmentity.deleted=0');
        $criteria->group = 'ticket.status';

        $ticketModel = VtigerTroubletickets::model()->findAll($criteria);
        foreach ($ticketModel as $row) {
            $count['times'] += $row->groupname;
            switch ($row->status) {
                case 'Finished':
                case 'Closed':
                case 'Solutioning':
                    $count['complete'] += $row->groupname;
                    break;
                case 'New':
                case 'In Progress':
                case 'Questioned':
                    $count['processing'] += $row->groupname;
                    break;
                case 'Answered':
                    $count['answered'] += $row->groupname;
                    $count['processing'] += $row->groupname;
                    break;
                default:
                    break;
            }
        }

        return $count;
    }

    public static function getCountries()
    {
        $criteria = new CDbCriteria();
        $criteria->order = 'country ASC';
        $countryModel = VtigerCountry::model()->findAll($criteria);

        $countries = array();
        if (!empty($countryModel)) {
            foreach ($countryModel as $row) {
                if (empty($row->country))
                    continue;
                $countries[] = array(
                    'id' => $row->countryid,
                    'name' => $row->country
                );
            }
        }
        return $countries;
    }

    public static function addCrmentityRel($crmid, $module, $relcrmid, $relmodule)
    {
        if (empty($crmid) || empty($module) || empty($relcrmid) || empty($relmodule))
            return false;

        $connection = Yii::app()->db;

        $sql = 'SELECT count(*) as count FROM vtiger_crmentityrel WHERE (crmid=' . $crmid . ' AND module="' . $module . '" AND relcrmid=' . $relcrmid . ' AND relmodule="' . $relmodule . '") OR (crmid=' . $relcrmid . ' AND module="' . $relmodule . '" AND relcrmid=' . $crmid . ' AND relmodule="' . $module . '")';
        $command = $connection->createCommand($sql);
        $row = $command->queryRow();
        if ($row['count'] > 0)
            return true;

        $sql = 'INSERT INTO vtiger_crmentityrel(crmid, module, relcrmid, relmodule) VALUES (' . $crmid . ', "' . $module . '", ' . $relcrmid . ', "' . $relmodule . '")';
        $command = $connection->createCommand($sql);
        $command->execute();

        return true;
    }

    public static function getTechnicalRepByArea($area = '')
    {
        if (empty($area))
            return false;

        $connection = Yii::app()->db;

        $sql = 'select userid from vtiger_ticket_area_technical where area="' . $area . '"';
        $command = $connection->createCommand($sql);
        $row = $command->queryRow();
        if (empty($row))
            return false;

        return $row['userid'];
    }
}