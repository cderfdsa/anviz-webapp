<?php
/**
 * Created by PhpStorm.
 * User: jacobs
 * Date: 2017/7/5
 * Time: 13:58
 */
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <meta name="format-detection" content="telphone=no, email=no" />
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="description" content="Anviz Biometric manufactures a complete range of biometric products including fingerprint time attendance, fingerprint access control, fingerprint lock, USB fingerprint reader, OEM fingerprint module etc.">
    <meta name="keywords" content="Fingerprint Time attendance, Fingerprint Access Control, Time attendance,Access Control, Smart Lock,Software &amp; SDK, OEM Moudle,Surveillance">
    <!--20180129 添加 iphone X的适配方案-->
    	<meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover">
    <title>My Anviz</title>
    <link rel="shortcut icon" href="<?php echo $this->assetsUrl; ?>/img/logo/favicon.ico" type="image/x-icon"/>
    <link rel="icon" href="<?php echo $this->assetsUrl; ?>/img/logo/favicon.ico" type="image/x-icon"/>
    <link href="<?php echo $this->assetsUrl; ?>/css/mui.css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="<?php echo $this->assetsUrl; ?>/css/my_anviz.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo $this->assetsUrl; ?>/css/login.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo $this->assetsUrl; ?>/fonts/iconfont.css"/>
    <script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.bootcss.com/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
    <script src="<?php echo $this->assetsUrl; ?>/js/pub/mui.min.js"></script>
    <script type="text/javascript">
        //<![CDATA[
        var MyAnviz = MyAnviz || {};
        MyAnviz.baseUrl = '<?php echo Yii::app()->baseUrl;?>';
        MyAnviz.assetsUrl = '<?php echo $this->assetsUrl;?>';
        //]]>
    </script>
    <?php echo $this->clips['jsHeader'] ?>
    <script src="<?php echo $this->assetsUrl; ?>/js/pub/tab_bar.js?<?php echo time();?>"></script>
</head>

<body>
<?php echo $content; ?>
</body>

</html>