mui.ready(function(){
	fontNum();
})

//即时搜索
function fontNum() {
	jQuery('.anviz-textarea').delegate('#advieText', 'input propertychange', function(e) {
		e.stopPropagation();
		var fontNum = jQuery(this).val().length;
		if(fontNum > 200) {
			var curChart = jQuery(this).value;
			curChart = curChart.substr(0, 200);

			jQuery(this).val(curChart);
			fontNum = 200;
			mui.toast('输入字数不能超过200');
		}
		jQuery(this).parent().find('.font-num').text(fontNum);
	})
}