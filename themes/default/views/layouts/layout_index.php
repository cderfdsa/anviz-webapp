<?php
/**
 * Created by PhpStorm.
 * User: jacobs
 * Date: 2017/7/5
 * Time: 13:26
 */
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="format-detection" content="telphone=no, email=no" />
    <meta name="msapplication-tap-highlight" content="no">
    <meta name="x5-page-mode" content="app">
    <meta name="HandheldFriendly" content="true">
    <meta name="renderer" content="webkit">
	<meta content="yes" name="apple-mobile-web-app-capable">
    <meta content="black" name="apple-mobile-web-app-status-bar-style">
    <meta content="telephone=no" name="format-detection">
    <meta content="email=no" name="format-detection">
    <!-- 可隐藏地址栏，仅针对IOS的Safari -->
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta name="apple-mobile-web-app-status-bar-style" content="black" />
	<meta name="msapplication-tap-highlight" content="no">
    <!--浏览器内核控制-->
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta name="description" content="Anviz Biometric manufactures a complete range of biometric products including fingerprint time attendance, fingerprint access control, fingerprint lock, USB fingerprint reader, OEM fingerprint module etc.">
    <meta name="keywords" content="Fingerprint Time attendance, Fingerprint Access Control, Time attendance,Access Control, Smart Lock,Software &amp; SDK, OEM Moudle,Surveillance">
    <!--20180129 添加 iphone X的适配方案-->
    	<meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover">
    <title>My Anviz</title>
    <!--20170817 添加-->
   <!-- <link rel="stylesheet" type="text/css" href="<?php echo $this->assetsUrl;?>/css/mui.css"/>-->
   <link href="https://cdn.bootcss.com/mui/3.4.0/css/mui.min.css" rel="stylesheet">
    <!--20170901 添加-->
    <link rel="stylesheet" type="text/css" href="<?php echo $this->assetsUrl;?>/fonts/icon-anviz/icon-anviz.css"/>
    <!--20170905 添加-->
     <link rel="stylesheet" type="text/css" href="<?php echo $this->assetsUrl;?>/fonts/icon-securityone/security_iconfont.css"/>
    <link rel="shortcut icon" href="<?php echo $this->assetsUrl;?>/img/logo/favicon.ico" type="image/x-icon"/>
    <link rel="icon" href="<?php echo $this->assetsUrl;?>/img/logo/favicon.ico" type="image/x-icon"/>
    <link href="<?php echo $this->assetsUrl;?>/css/mui.css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="<?php echo $this->assetsUrl;?>/css/my_anviz.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo $this->assetsUrl;?>/fonts/iconfont.css"/>
    
    <!--20170816 添加-->
    <link rel="stylesheet" type="text/css" href="<?php echo $this->assetsUrl;?>/css/productFeatuerIcon.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo $this->assetsUrl;?>/css/imageview.css"/>
    <script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
    <!--20170815 添加-->
    <script src="https://cdn.bootcss.com/Swiper/3.4.2/js/swiper.jquery.min.js"></script>
    <script src="<?php echo $this->assetsUrl;?>/js/pub/mui.min.js"></script>
    <script src="<?php echo $this->assetsUrl;?>/js/pub/mui.pullToRefresh.js"></script>
    <!--20170816 添加-->
     <script src="<?php echo $this->assetsUrl;?>/js/pub/mui.previewimage.js"></script>
     <script src="<?php echo $this->assetsUrl;?>/js/pub/mui.zoom.js"></script>
    <script type="text/javascript">
        //<![CDATA[
        var MyAnviz = MyAnviz || {};
        MyAnviz.baseUrl = '<?php echo Yii::app()->baseUrl;?>';
        MyAnviz.assetsUrl = '<?php echo $this->assetsUrl;?>';
        //]]>
    </script>
    <?php echo $this->clips['jsHeader'] ?>
    <?php echo $this->clips['cssHeader'] ?>
</head>
<body>
<?php echo $content;?>
</body>

</html>