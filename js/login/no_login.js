mui.ready(function(){
	jQuery('.anviz-me-basic li').on('tap', function() {
				var btnArray = ['Cancel', 'Login'];
				mui.confirm('', 'Please login!', btnArray, function(e) {
					if(e.index == 1) {
						mui.openWindow({
							url: '../../login.html'
						});
					} else {
						mui.back();
					}
				});
			})
			
			jQuery('.anviz-me-senior li').on('tap',function(){
				var btnArray = ['Cancel', 'Login'];
				mui.confirm('', 'Please login!', btnArray, function(e) {
					if(e.index == 1) {
						mui.openWindow({
							url: '../../login.html'
						});
					} else {
						mui.back();
					}
				});
			})
})