mui.ready(function() {
	uploadFile();
})

function uploadFile() {
	//options 是首次加载显示的默认的图片样式
	var options = {
		thumbBox: '.img-preview',
		imgSrc: ''
	}　　　　　　　　　　　　
	var cropper = jQuery('.img-list-box').cropbox(options);
	$('#upload-file').on('change', function() {
		var reader = new FileReader();
		reader.onload = function(e) {
			options.imgSrc = e.target.result;
			cropper = jQuery('.img-list-box').cropbox(options);
		}
		var img = cropper.getDataURL();
		if(img != ''){
			jQuery('.img-list-box').slideDown(500);
		}
		
		reader.readAsDataURL(this.files[0]);
		/*this.files = [];*/
		
		jQuery('.img-list-box').html('');
		jQuery('.img-list-box').append('<img  src="' + img).addClass('img-preview');
	})
	/*jQuery('#btnCrop').on('tap', function() {
		var img = cropper.getDataURL();
		if(img != ''){
			jQuery('.cropped').slideToggle(500);
		}
		jQuery('.cropped').html('');
		jQuery('.cropped').append('<img src="' + img + '" align="absmiddle" style="width:180px;margin-top:4px;border-radius:180px;box-shadow:0px 0px 12px #7E7E7E;"><p>180px*180px</p>');
	})
	jQuery('#btnZoomIn').bind('tap','touchmove', function() {　
		cropper.zoomOut();　　　　　　　　　　　　　 //鼠标滚轮放大
	})
	jQuery('#btnZoomOut').bind('tap','touchmove', function() {　　　　　　　　　　　　　　 //鼠标滚轮缩小
		cropper.zoomIn();
	})*/
}