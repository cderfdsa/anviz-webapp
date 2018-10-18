mui.ready(function(){
	getParameter();
});

function getParameter(){
	var paramsBox = jQuery('.product-parameter');
	var li = paramsBox.find('.js-param-warp').remove();
	
	var url = "../../js/productor/parameter.json";
	//查询参数
	var searchParams = {
		'productorId':'0001',
		'productorName':'W1'
	}
	
	mui.ajax({
		type: 'GET',
		url: url,
		dataType: 'json',
		beforeSend: function(data) {
			if(data.success == true){
				mui.toast('loading...');
			}
		},
		success: function(data){
			console.log('data:' + data);
			
			
			var list = data.parameterList;
			for(var i = 0; i < list.length; i++){
				var liObj = li.clone();
				var item = list[i];
				var categoryName = item.categoryName;
				
				var labelBox = liObj.find('.js-label');
				var label = liObj.find('.js-label>.anviz-padded').text(categoryName);
				
				labelBox.append(label);
				liObj.append(labelBox);
				
				var contentWarp = liObj.find('.js-params');
				var contentLi = contentWarp.find('li').remove();
				
				var content = item.content;
				for(var z = 0; z < content.length; z++){
					var subLi = contentLi.clone();
					
					var params = content[z];
					var paramName = params.name;
					var paramInfo = params.instructions;
					
					var paramName = subLi.find('.js-param-name').text(paramName);
					var paramInfo = subLi.find('.js-param-info').text(paramInfo);
					subLi.append(paramName);
					subLi.append(paramInfo);
					
					contentWarp.append(subLi);
				}
				labelBox.after(contentWarp);
				paramsBox.append(liObj);
			}
		},
		complete: function(data) {
			if(data.success == true){
				mui.toast('loading...');
			}
		},
		error: function(data) {
			if(data.success == false){
				 mui.toast(data.message);
			}	
		}
	});
}
