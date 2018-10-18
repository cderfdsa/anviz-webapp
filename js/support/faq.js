mui.ready(function() {
	search('#faqPage');

	//第一次调查询
	var data = {
		'page': '1',
		'size': '10'
	}
	searchFaq(data);
	//第二次调查询，有条件的查询
	screenList('#faqPage');


})

function getMgEAStatus() {
	var ulObj = jQuery('#pullrefresh .mui-table-view');
	var liObj = ulObj.find('.mui-table-view-cell').remove();

	for(var i = liObj.length, len = i + 2; i < len; i++) {
		var liContent = liObj.clone();

		var body = liContent.find('.mui-media-body').text('FAQ');
		ulObj.append(liContent);
	}
}

//根据查询条件查询
function screenList(id) {
	var id = jQuery(id);
	var searchBtn = id.find('#searchFaqBtn');
	var inputSearch = id.find('.anviz-slider-select');
	var content = id.find('#pullrefresh');

	searchBtn.on('tap', function() {
		var proValue = jQuery('#proSelected option:selected').val() == '-1' ? '' : jQuery('#proSelected option:selected').val();
		var modelValue = jQuery('#modeSelected option:selected').val() == '-1' ? '' : jQuery('#modeSelected option:selected').val();

		if(proValue && modelValue) {
			var data = {
				"proSelectedName": proValue,
				"modelSelectedName": modelValue
			};

			querySearchFag(data);
			content.slideDown(500);
		} else {
			mui.alert('Please select the following options!')
		}

	})
}

function searchFaq(dataEntity) {
	var faqTitle = jQuery('.js-faq-title');
	var pullrefresh = jQuery('#pullrefresh');

	//查询参数
	var searchEntity = dataEntity;
	var _productSearchUrl = "../../js/support/faq.json";
	var _latestUrl = "";

	mui.ajax({
		type: "GET",
		data: '',
		url: _productSearchUrl,
		dataType: "json",
		beforeSend: function(data) {
			if(data.readyState == 0) {
				/*mui.toast('loading...');*/
				jQuery('.anviz-loading').show();
			}
		},
		success: function(data) {
			console.log("data:" + data);

			var isFaq = data.isFaq;
			var faqList = data.faqList;
			if(isFaq) {

				//faq titel
				var titleWarp = pullrefresh.find('ul.js-title-warp').find('li');
				var title = titleWarp.find('h5').text(data.proName);
				titleWarp.append(title);
				pullrefresh.append(titleWarp);

				//faq panel
				var panelWarp = pullrefresh.find('ul.js-panel-warp');
				var collapseLi = panelWarp.find('li').remove();

				for(var i = 0; i < faqList.length; i++) {
					var liObj = collapseLi.clone();
					var item = faqList[i];

					var listName = item.listName;
					var problem = item.problem;
					var problemDate = item.problemDate;
					var detailed = item.detailed;

					liObj.find('.js-faq-classify').text(listName);

					var cardContent = liObj.find('.js-card-content').find('.anviz-faq-card');

					var cardFooter = cardContent.find('.anviz-card-footer');
					var cardHeader = cardContent.find('.anviz-card-header');
					var cardContent = cardContent.find('.anviz-card-content');

					var contentItem = cardContent.find('.content-item').remove();
					for(var z = 0; z < detailed.length; z++) {
						var conLi = contentItem.clone();
						var detailedItem = detailed[z];

						var problemImg = detailedItem.problemImg != null ? detailedItem.problemImg : '';
						var ProblemDescription = detailedItem.ProblemDescription;

						if(problemImg == '') {
							conLi.find('img').hide();
						}
						var _proImg = conLi.find('img').attr('src', problemImg);
						var _proP = conLi.find('p').text(ProblemDescription);

						conLi.append(_proImg);
						conLi.find('img').after(_proP);

						cardContent.append(conLi);
					}

					cardHeader.find('.js-card-pro-title').text(problem);
					cardFooter.find('.js-pro-date').text(problemDate);

					panelWarp.append(liObj);
				}
				pullrefresh.append(panelWarp);
			}
		},
		complete: function(data) {
			if(data.status == 200) {
				jQuery('.anviz-loading').hide();
			}
		},
		error: function(data) {
			mui.alert('Error 500--Internal Server Error!');
		}
	})
}

