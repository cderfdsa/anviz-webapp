<?php
/**
 * Created by Jacobs.
 * Auth: jacobs@anviz.com
 * Copyright: Anviz Global Inc.
 * Date: 2017/12/1
 * Time: 16:00
 * FileName: ChatWidget.php
 */

class ChatWidget extends Widget
{
    private $ip;
    private $country;

    public function run()
    {
        $this->ip = Yii::app()->request->userHostAddress;
        $this->ip = $this->ip == '::1' ? '127.0.0.1' : $this->ip;

        $ip2location = Yii::app()->ip2location;
        $this->country = $ip2location->getCountryLong($this->ip);

        $this->displayChat();
    }

    private function displayChat()
    {
        $country = $this->country;
        $country = ucwords(strtolower($country));
        if ($country == 'United States') {
            $country = 'USA';
        } elseif ($country == 'Venezuela, Bolivarian Republic Of') {
            $country = 'Venezuela';
        }

        $criteria = new CDbCriteria();
        $criteria->addCondition('sourcefield="country"');
        $criteria->addCondition('targetfield="area"');
        $criteria->addCondition('sourcevalue="' . $country . '"');
        $picklistModel = VtigerPicklistDependency::model()->find($criteria);
        if (empty($picklistModel)) {
            $chatfile = "asia_pacific";
        } else {
            $targetvalues = $picklistModel->targetvalues;
            $targetvalues = substr($targetvalues, 2, strlen($targetvalues) - 4);
            $targetvalues = str_replace('","', ',', $targetvalues);
            $targetvalues = explode(',', $targetvalues);
            $area = $targetvalues[0];
            switch ($area) {
                case 'Africa':
                    $chatfile = 'africa';
                    break;
                case 'Northern Europe':
                    $chatfile = 'northern_europe';
                    break;
                case 'Southern Europe':
                    $chatfile = 'southern_europe';
                    break;
                case 'Middle East':
                    $chatfile = 'middle_east';
                    break;
                case 'North America':
                    $chatfile = 'north_america';
                    break;
                case 'South America B':
                case 'South America A':
                case 'Central America':
                    $chatfile = 'south_america';
                    break;
                case 'East Asia':
                case 'China':
                case 'South Asia':
                case 'Southeast Asia':
                    $chatfile = 'asia_pacific';
                    break;
                default:
                    $chatfile = 'asia_pacific';
                    break;
            }
        }

        $this->render($chatfile);
    }
}