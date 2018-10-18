<?php
/**
 * EMailer class file.
 *
 * @author MetaYii
 * @version 2.2
 * @link http://www.yiiframework.com/
 * @copyright Copyright &copy; 2009 MetaYii
 *
 * Copyright (C) 2009 MetaYii.
 *
 *    This program is free software: you can redistribute it and/or modify
 *    it under the terms of the GNU Lesser General Public License as published by
 *    the Free Software Foundation, either version 2.1 of the License, or
 *    (at your option) any later version.
 *
 *    This program is distributed in the hope that it will be useful,
 *    but WITHOUT ANY WARRANTY; without even the implied warranty of
 *    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *    GNU Lesser General Public License for more details.
 *
 *    You should have received a copy of the GNU Lesser General Public License
 *    along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 * For third party licenses and copyrights, please see phpmailer/LICENSE
 *
 */

/**
 * Include the the PHPMailer class.
 */
require_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'phpmailer' . DIRECTORY_SEPARATOR . 'class.phpmailer.php');

/**
 * EMailer is a simple wrapper for the PHPMailer library.
 * @see http://phpmailer.codeworxtech.com/index.php?pg=phpmailer
 *
 * @author MetaYii
 * @package application.extensions.emailer
 * @since 1.0
 */
class EMailer
{
    //***************************************************************************
    // Configuration
    //***************************************************************************

    /**
     * The path to the directory where the view for getView is stored. Must not
     * have ending dot.
     *
     * @var string
     */
    protected $pathViews = 'application.views.email';

    /**
     * The path to the directory where the layout for getView is stored. Must
     * not have ending dot.
     *
     * @var string
     */
    protected $pathLayouts = 'application.views.email.layouts';

    //***************************************************************************
    // Private properties
    //***************************************************************************

    /**
     * The internal PHPMailer object.
     *
     * @var object PHPMailer
     */
    private $_myMailer;

    //***************************************************************************
    // Initialization
    //***************************************************************************

    /**
     * Init method for the application component mode.
     */
    public function init()
    {
    }

    /**
     * Constructor. Here the instance of PHPMailer is created.
     */
    public function __construct()
    {
        $config = Yii::app()->params['email'];

        $this->_myMailer = new PHPMailer();

        if (isset($config['CharSet'])) {
            $this->_myMailer->CharSet = $config['CharSet'];
        }
        if (isset($config['IsSMTP']) and $config['IsSMTP']) {
            $this->_myMailer->IsSMTP();
        }
        if (isset($config['IsHTML'])) {
            $this->_myMailer->IsHTML($config['IsHTML']);
        }
        if (isset($config['SMTPDebug'])) {
            $this->_myMailer->SMTPDebug = $config['SMTPDebug'];
        }

        if (isset($config['SMTPAuth'])) {
            $this->_myMailer->SMTPAuth = $config['SMTPAuth'];
        }

        $this->_myMailer->Host = $config['Host'];
        $this->_myMailer->Port = $config['Port'];
        $this->_myMailer->Username = $config['Username'];
        $this->_myMailer->Password = $config['Password'];
        $this->_myMailer->From = $config['From_email'];
        $this->_myMailer->FromName = $config['From_name'];
    }

    public function __call($method, $params)
    {
        if (is_object($this->_myMailer) && get_class($this->_myMailer) === 'PHPMailer') {
            return call_user_func_array(array(
                $this->_myMailer,
                $method
            ), $params);
        } else throw new CException(Yii::t('EMailer', 'Can not call a method of a non existent object'));
    }

    public function __set($name, $value)
    {
        if (is_object($this->_myMailer) && get_class($this->_myMailer) === 'PHPMailer') {
            $this->_myMailer->$name = $value;
        } else throw new CException(Yii::t('EMailer', 'Can not set a property of a non existent object'));
    }

    public function __get($name)
    {
        if (is_object($this->_myMailer) && get_class($this->_myMailer) === 'PHPMailer') {
            return $this->_myMailer->$name;
        } else throw new CException(Yii::t('EMailer', 'Can not access a property of a non existent object'));
    }
}