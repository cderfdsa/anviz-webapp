<?php
/**
 * Created by Jacobs.
 * Auth: jacobs@anviz.com
 * Copyright: Anviz Global Inc.
 * Date: 2017/9/13
 * Time: 13:29
 * FileName: view.php
 */
?>
<?php $this->beginClip('jsHeader');?>
<link rel="stylesheet" type="text/css" href="<?php echo $this->assetsUrl; ?>/fonts/icon-anviz/icon-anviz.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo $this->assetsUrl; ?>/css/feedback-page.css" />
<script src="https://cdn.bootcss.com/jquery.form/3.09/jquery.form.min.js"></script>
<?php $this->endClip(); ?>
<style>
	.anviz-upload-file .image-item{
		width: 30px;
	    height: 30px;
	    background-image: url(../../img/icon/add.png);
	    background-size: 100% 100%;
	    display: inline-block;
	    position: relative;
	    border-radius: 5px;
	    margin-right: 10px;
	    margin-bottom: 10px;
	    border: solid 1px #e8e8e8;
	    margin-left: 20px;
	}
	.anviz-upload-file .image-item .image-close
	{
		position: absolute;
	    display: inline-block;
	    right: -6px;
	    top: -6px;
	    width: 20px;
	    height: 20px;
	    text-align: center;
	    line-height: 20px;
	    border-radius: 12px;
	    background-color: #FF5053;
	    color: #f3f3f3;
	    border: solid 1px #FF5053;
	    font-size: 9px;
	    font-weight: 200;
	    z-index: 1;
	}
	.anviz-upload-file .image-item input[type="file"]{
		position: absolute;
	    left: 0px;
	    top: 0px;
	    width: 100%;
	    height: 100%;
	    opacity: 0;
	    cursor: pointer;
	    z-index: 0;
	}
	.img-list{
		width: 100%;
		height: 105px;
	    padding: 10px 10px;
	    overflow: hidden;
	    border-top: 1px solid #c8c7cc;
	    border-bottom: 1px solid #c8c7cc;
	    background: #fff;
	    margin: 0;
	    display: -webkit-box;
	    display: -ms-flexbox;
	    display: flex;
	    justify-content: flex-start;
	    overflow: scroll;
	    
	}
	.img-list li{
		position: relative;
		margin-right: 15px;
	}
	.img-list li img{
		width: 85px;
		height: 85px;
	}
	.img-list li span{
		position: absolute;
	    top: -5px;
		left: 73px;
	    background: #00a0e8;
	    width: 20px;
	    height: 20px;
	    border-radius: 20px;
	    text-align: center;
	    line-height: 18px;
	    color: #fff;
	}
</style>
<form method="post" enctype="multipart/form-data" class="mui-content">
    <header class="mui-bar mui-bar-nav">
        <a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left icon-color"></a>
        <button id="addTicketDetails" class="icon-color mui-btn mui-btn-blue mui-btn-link mui-pull-right">Resolve Ticket</button>
        <h1 class="mui-title icon-color"></h1>
    </header>

<div id="troubleDetails" class="mui-content mui-scroll-wrapper">
    <div class="mui-scroll">
        <ul class="mui-table-view anviz-pro-des">
            <li class="mui-table-view-cell">
                <div class="anviz-pro-title">
                    <div class="anviz-pro-number mui-pull-left"><?php echo $ticket['ticket_no'];?></div>
                    <!--删除update-be-solved -->
                    <span class="anviz-update-icon update-solved-size"></span>
                    <div class="anviz-pro-date mui-pull-right"><?php echo $ticket['createdtime'];?></div>
                </div>
                <div class="mui-media-body anviz-pro-body">
                    <div class="anviz-pro-body-info">
                        <span class="customer-name"><?php echo $ticket['createdby'];?></span>
                        <span class="problem-category"><?php echo $ticket['category'];?></span>
                        <span class="problem-state"><?php echo $ticket['status'];?></span>
                    </div>
                    <?php echo $ticket['content'];?>
                </div>
                <div class="anviz-pro-recovery-info">
                    <div class="anviz-recovery-time"><?php echo $ticket['modifiedtime'];?></div>
                </div>
            </li>
        </ul>
        <?php if(!empty($commentlist)):?>
        <div id="showMenu" class="anviz-pulldown-menu">
            <h5 class="replies-list">Replies</h5>
            <span class="mui-icon mui-icon-arrowdown"></span>
        </div>
        <div id="pullDownList" style="display: none;">
            <?php foreach($commentlist as $comment):?>
                <?php if($comment['comment_qa'] == 1):?>
                    <!--answer-->
                    <div class="anviz-pro-li anviz-answer-warp">
                        <div class="anviz-answer-menu">
                            <h5 class="replies-list">Answer</h5>
                        </div>
                        <ul class="mui-table-view anviz-pro-des">
                            <li class="mui-table-view-cell">
                                <div class="anviz-recovery-title">
                                    <div class="anviz-recovery-user">
                                        <span class="anviz-update-icon update-new-news update-sale-size"></span>
                                        <div class="anviz-pro-number"><?php echo $comment['createdby'];?></div>
                                    </div>
                                    <div class="anviz-recovery-date"><?php echo $comment['createdtime'];?></div>
                                </div>
                                <div class="mui-media-body anviz-pro-body">
                                    <?php echo $comment['content'];?>
                                </div>
                            </li>
                        </ul>
                    </div>
                <?php else:?>
                    <!--recovery-->
                    <div class="anviz-pro-li anviz-recovery-warp">
                        <div class="anviz-recovery-menu anviz-pull-right">
                            <h5 class="replies-list">Replies</h5>
                        </div>
                        <ul class="mui-table-view anviz-pro-des">
                            <li class="mui-table-view-cell">
                                <div class="anviz-recovery-title">
                                    <div class="anviz-recovery-date"><?php echo $comment['createdtime'];?></div>
                                    <div class="anviz-recovery-user">
                                        <span class="anviz-update-icon update-email update-user-size"></span>
                                        <div class="anviz-pro-number"><?php echo $comment['createdby'];?></div>
                                    </div>

                                </div>
                                <div class="mui-media-body anviz-pro-body">
                                    <?php echo $comment['content'];?>
                                </div>
                            </li>
                        </ul>
                    </div>
                <?php endif;?>
            <?php endforeach;?>
        </div>
        <?php endif;?>
        <div id="addCommponts" style="display: none;">
            <ul class="mui-table-view mui-grid-view mui-grid-9">
                <li class="mui-table-view-cell mui-media mui-col-xs-6 mui-col-sm-6">
                    <h5 class="anviz-padded">Contents</h5>
                </li>
            </ul>
            <div class="mui-content" style="padding-top: 0;">
                <div class="mui-input-row anviz-textarea js-textarea">
                    <textarea name="content" id="revertTicket" rows="5" placeholder="Please describe your question or answer accurately."></textarea>
                     <div class="font-box"><span class="font-num">0</span>/200</div>
                </div>
            </div>
            <!--<ul class="mui-table-view mui-grid-view mui-grid-9">
                <li class="mui-table-view-cell mui-media mui-col-xs-6 mui-col-sm-6">
                    <h5 class="anviz-padded">Upload</h5>
                </li>
            </ul>-->
            <!--upload-->
            <!--<div id="feedback" class="mui-page feedback">
                <div class="mui-page-content">
                    <div id="image-list" class="row image-list"></div>
                </div>
            </div>-->
            <ul class="mui-table-view mui-grid-view mui-grid-9">
			<li class="mui-table-view-cell mui-media mui-col-xs-12 mui-col-sm-12 anviz-upload-warp" style="display: flex;padding: 0;">
				<h5 class="anviz-padded">Attachments<span style="">,Can choose more</span></h5>
				<div class="anviz-upload-file">
					<div class="image-item">
						<div id="upload-file">
							<input id="file" name="file_data[]" type="file" multiple />
						</div>
					</div>
				</div>
			</li>
		</ul>
		<ul id="imgList" class="img-list" style="display: none;"></ul>
        </div>
        <div class="anviz-post-warp">
            <button id="addTicketComments" class="icon-color mui-btn mui-btn-blue mui-btn-link anviz-post-reply">Post Reply</button>
            <button id="Submit" class="icon-color mui-btn mui-btn-blue mui-btn-link anviz-post-reply" style="display: none;">Submit</button>
        </div>
    </div>
</form>
<!--像获取数据的方法，在 js->pub->public.js中-->
<!--<script src="<?php echo $this->assetsUrl; ?>/js/support/ticketDetails.js"></script>-->
<script src="<?php echo $this->assetsUrl; ?>/js/pub/mui.previewimage.js"></script>
<script type="text/javascript" charset="utf-8">
    mui.init({});
    mui.previewImage();
    mui('.mui-scroll-wrapper').scroll();
    mui.ready(function(){
	    	cwf.fontNum();
	    	cwf.loadingProductor();
	    	cwf.removeStyle();
	    	cwf.getImgList();
//	    	newPlaceholder();
	    	jQuery('#revertTicket').focus();
	    	
	    	
	    jQuery('#showMenu').on('tap',function(){
	        jQuery('#pullDownList').slideToggle(200);
	        var lastLi = jQuery('#pullDownList').children().last();
	        lastLi.show();
	        var firstLi = jQuery('#pullDownList').children().first();
	        firstLi.find('.anviz-recovery-menu').remove();
	    });
	
	    jQuery('#addTicketComments').on('tap',function(){
	        jQuery(this).hide();
	        jQuery('#addCommponts').slideDown(200);
//	        jQuery('#Submit').show();
	    });
	    
	    jQuery('#addTicketDetails').on('tap',function(){
		    	if(type == '1'){
		    		mui.toast('The problem has been closed!');
		    	}
	    });
	    
	    //保存
	    var url = MyAnviz.baseUrl + '/ticket/index/save.html';
		var form = jQuery('#addCommponts');
		form.ajaxForm({
			dataType: "json",
			url: url,
			beforeSend: function(data){
				if(jQuery('#revertTicket').val() == ''){
					mui.toast('Please enter the question or answer');
					return false;
				};
				if(data.readyState == 0) {
	                jQuery('.anviz-loading').show();
	           };
				return true;
			},
			success: function(data){
				if(data.readyState == 4){
					setTimeout(function(){
	              	 	mui.toast('Your trouble ticket is submited successfully!');
				     	mui.openWindow({
							url: MyAnviz.baseUrl + '/ticket.html'
					 	});
	              	},500);
				} else {
					mui.toast('fail!');
				}
			},
			complete: function(data) {
	              if(data.status == 200) {
	                   jQuery('.anviz-loading').hide();
	              }
	        },
			error: function(data) {
				if(data.success == false) {
					mui.toast(data.message);
				}
			}
		})
	});

		//因要使用 jQuery.form 上传表单数据，因此要注释掉 ajax 方法
//      jQuery('#Submit').on('tap',function(){
//      		var ss = cwf.buildJson();//这里的图片数组为base64
//	        	var imgList = ss.imgList;
//	        	var ticketDes = ss.ticketDes;
//	        	var formData = new FormData(); 
//	        	var dataEntiry = {};
//	        	var dtaArr = [];
//	        	for(var a = 0; a < imgList.length; a++){
//	        		var item = imgList[a];
//	        		var dataurl = item.fileUrl;
//	        		var fileBlob = cwf.dataURLtoBlob(dataurl);//base64转为blob对象
//	        		 //将blob对象传到formData中
//	        		formData.append("images[]", fileBlob);
//	        	}
//	        	formData.append('text',ticketDes);
//	        	var url = MyAnviz.baseUrl + '/ticket/index/save.html';			
//	        	mui.ajax({
//					type: "post",
//					url: url,
//					data: formData,
//					cache: false,
//			        processData: false,
//			        contentType: 'enctype="multipart/form-data',
//					/*dataType: 'json',*/
//					beforeSend: function(data) {
//		                  if(data.readyState == 0) {
//		                       jQuery('.anviz-loading').show();
//		                  }
//		            },
//					success: function(data) {
//						console.log(data);
//						if(data.success == true) {
//							setTimeout(function(){
//								jQuery(this).hide();
//								jQuery('#addTicketComments').show();
//	            				jQuery('#addCommponts').slideUp(200);
//							},500);
//						} else {
//							mui.toast(data.message);
//							mui.toast("It's not debugged!");
//						}
//					},
//					complete: function(data) {
//		                  if(data.status == 200) {
//		                       jQuery('.anviz-loading').hide();
//		                  }
//		            },
//					error: function(data) {
//						if(data.success == false) {
//							mui.toast(data.message);
//						}
//					}
//				})
//	        });
//  });
    
    var cwf = {
    	//去除图片样式
    	removeStyle:function(){
    		var imgDiv = jQuery('#pullDownList .mui-content-padded img');
    		
    		if(imgDiv.attr('style')) {
    			imgDiv.removeAttr('style').addClass('anviz-img-card');
    		}
    		if(!imgDiv.attr('data-preview-src')){
    			imgDiv.attr('data-preview-src','');
	    		imgDiv.attr('data-preview-group','1');
    		}
    	},
    	//预览图片
    	getImgList:function(){
    		var myfile = document.getElementById('file');	
		var List = document.getElementsByClassName('img-list')[0];
		var fileArr =  [];
		var fileEntity = {};
		var form = jQuery('#upload-file');
		
		myfile.addEventListener('change', function(event) {
			var files = this.files;
			
			if(!files)return;
			if(files.length > 0){
				jQuery('#imgList').show();		
			}else{
				jQuery('#imgList').hide();		
			}
			
			if(files){
				for(var i = 0;i<files.length;i++){	
					fileArr.push(files[i]);
					//预览
					var oLi = '<li><img src="'+URL.createObjectURL(files[i])+'" data-preview-src="" data-preview-group="1"><span class="close" onclick="closeli(this)" >&times;</span></li>';	
					List.innerHTML+=oLi; 
				}
			}
		});
    	},
    	//即时搜索
		fontNum:function() {
			jQuery('.anviz-textarea').delegate('#revertTicket', 'input propertychange', function(e) {
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
		},
		// 获取url中的参数
		getUrlParam:function(name) {
			var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)");
			var r = window.location.search.substr(1).match(reg);
			if(r != null) {
				return unescape(r[2]);
			} else {
				return null;
			}
		},
		//loading
		loadingProductor:function(){
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
		          var status = document.readyState
		          if(status == 'complete'){
		               $('.anviz-loading').fadeOut();
		          }
		    }
		},
		//组织参数
		buildJson:function(){
			var revertTicket = jQuery('#revertTicket').val() ? jQuery('#revertTicket').val() : '';
			var imgList = JSON.parse(sessionStorage.getItem('arr'));
			
			if(revertTicket == ''){
				mui.toast('The problem description cannot be empty!');
				return false;
			}
			
			var jsonObj = {
				'ticketDes':revertTicket,
				'imgList':imgList
			};
			
			return jsonObj;
		},
		//dataURL转换为Blob对象
		dataURLtoBlob:function(dataURI){
			var byteString = atob(dataURI.split(',')[1]);  
			var mimeString = dataURI.split(',')[0].split(':')[1].split(';')[0];  
			var ab = new ArrayBuffer(byteString.length);  
			var ia = new Uint8Array(ab);  
			for (var i = 0; i < byteString.length; i++) {  
			   ia[i] = byteString.charCodeAt(i);  
			}  
			return new Blob([ab], {type: mimeString});  
		}
  };
   
   
	
	/**
	 * 获取图片
	 * 初始化图片占位
	 * 删除图片
	 * 预览图片
	 * 使用 form.js 上传图片，因此需要注释掉 如下的方法
	 */
//	var fileArr = [];
//	var imageList = get('image-list');
//	var imgHtml = imageList.innerHTML = '';
//	
//	function get(id) {
//		return document.getElementById(id);
//	};
//	
//	function getFileInputArray() {
//		return [].slice.call(imageList.querySelectorAll('input[type="file"]'));
//	};
//	
//	function getFileInputIdArray() {
//		var fileInputArray = getFileInputArray();
//		var idArray = [];
//		fileInputArray.forEach(function(fileInput) {
//			if (fileInput.value != '') {
//				idArray.push(fileInput.getAttribute('id'));
//			}
//		});
//		return idArray;
//	};
	
	/**
	 * 初始化图片域占位
	 */
//	var imageIndexIdNum = 0;
//	function newPlaceholder() {
//		
//		var data;
//		var fileInputArray = getFileInputArray();
//		
//		if (fileInputArray &&
//			fileInputArray.length > 0 &&
//			fileInputArray[fileInputArray.length - 1].parentNode.classList.contains('space')) {
//			return;
//		}
//		imageIndexIdNum++;
//		var placeholder = document.createElement('div');
//		placeholder.setAttribute('class', 'image-item space');
//		placeholder.setAttribute('data-preview-src','');
//		placeholder.setAttribute('data-preview-group','1');
//		//删除图片
//		var closeButton = document.createElement('div');
//		closeButton.setAttribute('class', 'image-close');
//		closeButton.innerHTML = 'X';
//		//小X的点击事件
//		closeButton.addEventListener('tap', function(event) {
//			event.stopPropagation();
//			event.cancelBubble = true;
//			setTimeout(function() {
//				imageList.removeChild(placeholder);
//			}, 100);
//			return false;
//		}, false);
//		
//		
//		var fileInput = document.createElement('input');
//		fileInput.setAttribute('type', 'file');
//		fileInput.setAttribute('accept', 'image/*');
//		fileInput.setAttribute('id', 'image-' + imageIndexIdNum);
//		fileInput.addEventListener('change', function(event) {
//			var file = fileInput.files[0];
//			var fileEntity = {};
//			
//			if (file) {
//				var reader = new FileReader();
//				reader.onload = function() {
//					
//					//处理 android 4.1 兼容问题
//					var base64 = reader.result.split(',')[1];
//					var dataUrl = 'data:image/png;base64,' + base64;
//					var fileName = file.name;
//					var fileType = file.type;
//					
//					fileEntity.fileName = fileName;
//					fileEntity.fileType = fileType;
//					fileEntity.fileUrl = dataUrl;
//					fileArr.push(fileEntity);
//					var data = JSON.stringify(fileArr);
//					sessionStorage.setItem('arr',data);
//					
//					placeholder.style.backgroundImage = 'url(' + dataUrl + ')';
//				}
//				
//				reader.readAsDataURL(file);
//				placeholder.classList.remove('space');
//				/*如果不运行，只能上传一张图片就隐藏上传按钮*/
//				newPlaceholder();
//			}
//		});
//		
//		placeholder.appendChild(closeButton);
//		placeholder.appendChild(fileInput);
//		imageList.appendChild(placeholder);	
//	}
</script>
