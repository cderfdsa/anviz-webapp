var onlineList = {
	"onLineTotalNum": "18",
	"list": [{
			"onLineId": "01",
			"onLineHeader": "http://img1.imgtn.bdimg.com/it/u=1049244330,4215297443&fm=26&gp=0.jpg",
			"onLineName": "Aaron",
			"onLineTitel": "Sales Rep",
			"onLineNum": "5"
		},
		{
			"onLineId": "02",
			"onLineHeader": "http://img4.imgtn.bdimg.com/it/u=2984732951,2088380913&fm=26&gp=0.jpg",
			"onLineName": "Abraham ",
			"onLineTitel": "Sales Rep",
			"onLineNum": "13"
		}
	]
}

mui.ready(function() {
	//support
	jQuery('#onLineOther #ticket a').on('tap', function() {
		var ticketVal = jQuery(this).find('.js-anviz-body')[0].firstChild.data;
		console.log("当前的li标签的内容为：" + ticketVal);
		
		mui.openWindow({
			url: "page/trouble_ticket.html?title=" + ticketVal,
			id: "#troubleTicket"
		});
	});
	
	jQuery('#onLineOther #faq a').on('tap', function() {
		var faqVal = jQuery(this).find('.js-anviz-body')[0].firstChild.data;
		console.log("当前的li标签的内容为：" + faqVal);
		
		mui.openWindow({
			url: MyAnviz.baseUrl+"/faq.html",
			id: "#faqPage"
		});
	});
	
	jQuery('#onLineOther #download a').on('tap', function() {
		var downloadVal = jQuery(this).find('.js-anviz-body')[0].firstChild.data;
		console.log("当前的li标签的内容为：" + downloadVal);
		
		mui.openWindow({
			url: "page/download_center.html?title=" + downloadVal,
			id: "#pageDownload"
		});
	});
	
	//products
	jQuery('#productList #Biometric').on('tap', function() {
		/*var biometricVal = jQuery(this).find('.js-media-body')[0].firstChild.data;*/
		var biometricVal = jQuery(this).find('.js-media-body')[0].firstChild.data;
		console.log("当前的li标签的内容为：" + biometricVal);
		
		mui.openWindow({
			url: "page/biometric.html?title=" + biometricVal,
			id: "#biometricPage"
		});
	});
	
	jQuery('#productList #Surveillance').on('tap', function() {
		var surveillanceVal = jQuery(this).find('.js-media-body')[0].firstChild.data;
		console.log("当前的li标签的内容为：" + surveillanceVal);
		mui.toast("不好意思，只做了第一个list");
		/*mui.openWindow({
			url: "page/surveillance.html?title=" + surveillanceVal,
			id: "#surveillancePage"
		});*/
	});
	
	jQuery('#productList #RFID').on('tap', function() {
		var RFIDVal = jQuery(this).find('.js-media-body')[0].firstChild.data;
		console.log("当前的li标签的内容为：" + RFIDVal);
		mui.toast("不好意思，只做了第一个list");
		/*mui.openWindow({
			url: "page/RFID.html?title=" + RFIDVal,
			id: "#RFIDPage"
		});*/
	});
	
	//Solution
	jQuery('#solutionList #SecurityONE').on('tap', function() {
		var solutionVal = jQuery(this).find('.js-media-body')[0].firstChild.data;
		console.log("当前的li标签的内容为：" + solutionVal);
		mui.toast("不好意思，只做了第一个list");
		/*mui.openWindow({
			url: "page/securityONE.html?title=" + solutionVal,
			id: "#securityONEPage"
		});*/
	});
	
	jQuery('#solutionList #CrossChex').on('tap', function() {
		var crossChexVal = jQuery(this).find('.js-media-body')[0].firstChild.data;
		console.log("当前的li标签的内容为：" + crossChexVal);
		mui.toast("不好意思，只做了第一个list");
		/*mui.openWindow({
			url: "page/crossChex.html?title=" + crossChexVal,
			id: "#crossChexPage"
		});*/
	});
	
	jQuery('#solutionList #IntelliSight').on('tap', function() {
		var intelliSightVal = jQuery(this).find('.js-media-body')[0].firstChild.data;
		console.log("当前的li标签的内容为：" + intelliSightVal);
		mui.toast("不好意思，只做了第一个list");
		/*mui.openWindow({
			url: "page/intelliSight.html?title=" + intelliSightVal,
			id: "#intelliSightPage"
		});*/
	});
	
	jQuery('#onLineReps li:first').on('tap',function(){
		mui.openWindow({
			url: "page/chat/chatting.html?title=Chating"
		});
	});
	
	jQuery('#onLineReps li:last').on('tap',function(){
		mui.toast('只做了一个子页面的效果')
	});
	
	
});
