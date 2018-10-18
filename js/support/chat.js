mui.ready(function(){
	search('#chatPage');
	
	var chattingClass = getUrlParam('pageClass');
	var contentClass = jQuery('#chattingPage .anviz-animation .anviz-chatting');
	contentClass.addClass(chattingClass);
});

