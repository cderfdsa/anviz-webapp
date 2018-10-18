var list = 
[
	{
	"productCategoryName":"Fingerprint",
	"productCategoryId":"5",
	"subProduct":
		[{
			"subProductId":"5-0",
			"subProductName":"All"
		},{
			"subProductId":"6",
			"subProductName":"Standalone Access Control"
		},{
			"subProductId":"8",
			"subProductName":"Standalone Time Attendance"
		},{
			"subProductId":"9",
			"subProductName":"Smart Lock"
		},{
			"subProductId":"10",
			"subProductName":"Modules"
		},{
			"subProductId":"7",
			"subProductName":"SDK"
		}]
	},
	{
	"productCategoryName":"Facial",
	"productCategoryId":"11",
	"subProduct":
		[{
			"subProductId":"11-0",
			"subProductName":"All"
		},{
			"subProductId":"12",
			"subProductName":"USB Scanner"
		},{
			"subProductId":"13",
			"subProductName":"USB Identification Device"
		},{
			"subProductId":"14",
			"subProductName":"Standalone Modules"
		},{
			"subProductId":"15",
			"subProductName":"Standalone Terminal"
		},{
			"subProductId":"16",
			"subProductName":"SDK"
		}]
	},
	{
	"productCategoryName":"Iris",
	"productCategoryId":"17",
	"subProduct":
		[{
			"subProductId":"17-0",
			"subProductName":"All"
		},{
			"subProductId":"18",
			"subProductName":"USB Scanner"
		},{
			"subProductId":"19",
			"subProductName":"Standalone Terminal"
		},{
			"subProductId":"20",
			"subProductName":"Server Identification Engine"
		},{
			"subProductId":"21",
			"subProductName":"SDK"
		}]
}]


mui.ready(function() {
	searchProductor();
	
	jQuery('#productList').on('tap', 'li', function(e) {
		e.stopPropagation();
        var id = jQuery(this).attr('data-id');
        var title = jQuery(this).find('.js-media-body')[0].firstChild.data;
        
        mui.openWindow({
            url: MyAnviz.baseUrl+'/product/index/list.html?id='+id + '&title=' + title,
            id: '#proPage'+id
        });
	});
	
	jQuery('#cropper-sheet mui-table-view').on('tap','li',function(e){
		e.stopPropagation();
		jQuery(this).slideToggle();
	})
	
	jQuery('#solutionList').on('tap','#SecurityONE',function(e){
		e.stopPropagation();
		var title = jQuery(this).find('.js-media-body')[0].firstChild.data;
		var url =  MyAnviz.baseUrl+'/product/securityone.html?title=' + title;
		mui.openWindow({
			url:url
		});
	});
	
	jQuery('#solutionList').on('tap','#CrossChex',function(e){
		e.stopPropagation();
		var title = jQuery(this).find('.js-media-body')[0].firstChild.data;
		var url =  MyAnviz.baseUrl+'/product/crosschex.html?title=' + title;
		mui.openWindow({
			url:url
		});
	});
	
	jQuery('#solutionList').on('tap','#IntelliSight',function(e){
		e.stopPropagation();
		var title = jQuery(this).find('.js-media-body')[0].firstChild.data;
		var url =  MyAnviz.baseUrl+'/product/intellisight.html?title=' + title;
		mui.openWindow({
			url:url
		});
	});
	
	/*jQuery('#filtrateNav').on('tap',function(){
		handleInit();
	});*/
	
	
	
});

/*function addSubButton(){
		var mainMenuWarp = jQuery('#productList').find('#newSubProduct>.scroll-nav');
		var allMenu = mainMenuWarp.find('.anviz-item-all');
    	var subMenuWarp = jQuery('#cropper-sheet').find('.anviz-collapse-content');
    	var arr = "<?php echo $this->assetsUrl; ?>/js/productor/subProductMenu.json?<?php echo time();?>";
    	
    	for(var i = 0; i < list.length; i++){
    		var subItem = list[i];
    		var productCategoryName = subItem.productCategoryName;
    		var productCategoryId = subItem.productCategoryId;
    		var subProduct = subItem.subProduct;
    		
    		var mainMenu = jQuery(
    			
    		);
    	}
    }*/

function changeBtn(){
	var curBtn = jQuery('#cropper-sheet').find('.anviz-sub-product-btn');
	var title = jQuery('#cropper-sheet').find('a');
	
	curBtn.on('tap','button',function(e){
		var index = $(this).index();
		$(this).parent().children("li").attr("class", "anviz-sub-product-btn");
		 $(this).attr("class", "mui-btn-danger");
	})
}


var active = null;
function handleInit(){
	active = jQuery(".js-anviz-tab:not(#filtrateNav):has(.mui-active)");
	mui('#cropper-sheet').popover('toggle');
}

function loadingProductor(){
	var loading = 
	'<div class="anviz-loading">' +
	    '<div class="spinner">' + 
	        '<div class="spinner-container container1">' + 
	            '<div class="circle1"></div>' + 
	            '<div class="circle2"></div>' + 
	            '<div class="circle3"></div>' + 
	            '<div class="circle4"></div>' + 
	        '</div>' +
	        '<div class="spinner-container container2">' + 
	            '<div class="circle1"></div>' + 
	            '<div class="circle2"></div>' + 
	            '<div class="circle3"></div>' + 
	            '<div class="circle4"></div>' + 
	        '</div>' + 
	        '<div class="spinner-container container3">' +
	            '<div class="circle1"></div>' + 
	            '<div class="circle2"></div>' + 
	            '<div class="circle3"></div>' +
	            '<div class="circle4"></div>' +
	        '</div>' +
	    '</div>' +
	'</div>';
	
	jQuery('body').append(loading);
		document.onreadystatechange = function () {     
	          console.log(document.readyState);
	          var status = document.readyState
	          if(status == 'complete'){
	               $('.anviz-loading').fadeOut();
	          }
	     }
}

function searchProductor() {
	merge();
}

function merge() {
	productorData();
	solutionData();
}

function productorData() {

	var jsPro = $('.js-productor');
	var liObj = jsPro.find('li').remove();

	var url = MyAnviz.baseUrl+'/product/ajax/category.html';
	mui.ajax({
		type: 'GET',
		url: url,
		data: '',
		dataType: 'json',
		beforeSend: function(data) {
			if(data.success == true){
				/*mui.toast('loading...');*/
				jQuery('.anviz-loading').show();
			}
		},
		success: function(data) {
			for(var i = 0; i < data.length; i++) {
				var liContent = liObj.clone();
				var proContent = liContent.find('a');

				var item = data[i];
				var id = item.id;
				/*liContent.attr('id', id);*/
				// liContent.attr('id', id);
				liContent.attr('data-id', id);

				var subData = data[i].data;
				var proName = subData.productorName;
				var proDes = subData.productorDescribe;
				var proImg = subData.productorImg;

				var proImgShow = liContent.find('.js-pro-img').attr('src', proImg);;
				
				var proFontShow = liContent.find('.js-pro-font span'); 
				switch(proName){
					case 'Biometric':
						proFontShow.addClass('anviz-update-icon update-biometric_larger');
						break;
					case 'Surveillance':
						proFontShow.addClass('anviz-update-icon update-surveillance_larger');
						break;
					case 'RFID':
						proFontShow.addClass('anviz-update-icon update-rfid_larger');
						break;
				}

				var divCon = liContent.find('.js-media-body');
				var pCon = divCon.find('.js-des').text(proDes);
				divCon.text(proName);
				divCon.append(pCon);

				proContent.append(proFontShow);
				proContent.append(divCon);

				liContent.append(proContent);
				jsPro.append(liContent);
			}
		},
		complete: function(data) {
			if(data.success == true){
				/*mui.toast('loading...');*/
				jQuery('.anviz-loading').hide();
			}
		},
		error: function(data) {
			if(data.success == false){
				mui.toast(data.message)
			}
		}
	});
}

function solutionData() {
	var jsSolution = $('.js-solution');
	var liObj = jsSolution.find('li').remove();

	var url = MyAnviz.baseUrl+'/product/ajax/solution.html';
	mui.ajax({
		type: 'GET',
		url: url,
		data: '',
		dataType: 'json',
		beforeSend: function(data) {
			if(data.success == true){
				/*mui.toast('loading...');*/
				jQuery('.anviz-loading').show();
			}
		},
		success: function(data) {

			for(var i = 0; i < data.length; i++) {
				var liContent = liObj.clone();
				var soluContent = liContent.find('a');

				var item = data[i];
				var id = item.id;

				var dataShow = data[i].data;
				var souName = dataShow.solutionName;
				var souDes = dataShow.solutionDescribe;
				var souImg = dataShow.solutionImg;

				liContent.attr('id', id);
				var soluImg = liContent.find('.js-soul-img').attr('src', souImg);
				
				var proFontDiv = liContent.find('.js-pro-font');
				var proFontShow = liContent.find('.js-pro-font span'); 
				switch(souName){
					case 'SecurityONE':
						proFontShow.addClass('anviz-update-icon update-sercurityone update-sercurityone-color');
						break;
					case 'IntelliSight':
						proFontShow.addClass('anviz-update-icon update-intellisight update-intellisight-color');
						break;
					case 'CrossChex':
						proFontShow.addClass('anviz-update-icon update-crosschex update-crosschex-color');
						break;
				}

				var divCon = liContent.find('.js-media-body');
				var pCon = divCon.find('.js-solu-des').text(souDes);

				divCon.text(souName);
				divCon.append(pCon);

				proFontDiv.append(proFontShow);
				soluContent.append(proFontDiv);
				soluContent.append(divCon);

				liContent.append(soluContent);
				jsSolution.append(liContent);
			}
			jsSolution.last().addClass('anviz-media');

		},
		complete: function(data) {
			if(data.success == true){
				/*mui.toast('loading...');*/
				jQuery('.anviz-loading').hide();
			}
		},
		error: function(data) {
			if(data.success == false){
				mui.toast(data.message)
			}
		}
	})

}