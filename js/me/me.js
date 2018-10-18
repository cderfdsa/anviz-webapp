mui.ready(function(){
	loadingProductor();
	//me
	jQuery('.anviz-me-basic').on('tap','#password',function(){
		mui.openWindow({
			url:MyAnviz.baseUrl+'/profile/password.html'
		})
	});
	
	jQuery('.anviz-me-basic').on('tap','#changeEmail',function(){
		mui.openWindow({
			url:MyAnviz.baseUrl+'/profile/email.html'
		})
	});
	
	jQuery('.anviz-me-senior').on('tap','#advice',function(){
		mui.openWindow({
			url:MyAnviz.baseUrl+'/advice.html',
			id:"#advicePage"
		});
	});
	
	jQuery('.anviz-me-senior').on('tap','#caseStudies',function(){
		var caseStudiesVal = jQuery(this)[0].firstChild.data;
		console.log("me的list：" + caseStudiesVal);
		mui.openWindow({
			url: MyAnviz.baseUrl+'/casestudy.html',
			/*url:"page/me/case_studies.html?title=" + caseStudiesVal,*/
			id:"#caseStudiesPage"
		})
	});
	
	jQuery('.anviz-me-senior').on('tap','#successStories',function(){
		var successStoriesVal = jQuery(this)[0].firstChild.data;
		console.log("me的list：" + successStoriesVal);
		mui.openWindow({
			url:MyAnviz.baseUrl+'/stories.html',
			/*url:"page/me/success_storiesl.html?title=" + successStoriesVal,*/
			id:"#successStorieslPage"
		})
	});
	
	jQuery('.anviz-user-info #changeInfoBtn').on('tap',function(){
		mui.openWindow({
			url:MyAnviz.baseUrl+'/profile/index/edit.html'
		})
	});
	
	jQuery('.anviz-content>ul:last-child').addClass('anviz-share-bottom');

});

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