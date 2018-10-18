mui.ready(function() {
	getUrlParams();

	mui('.mui-scroll-wrapper').scroll({
		deceleration: 0.0006 //flick 减速系数，系数越大，滚动速度越慢，滚动距离越小，默认值0.0006  
	});
})

function getUrlParams() {
	var pageId = getUrlParam('pageId');
	jQuery('body div.mui-content').attr('id', pageId);
}