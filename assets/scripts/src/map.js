maps = function() {
	var init, render;

	render = function() {
		var map, marker, myOptions, style;
		style = [
		{
			"stylers": [
			{
				"saturation": -100
			}, {
				"gamma": 0.8
			}, {
				"lightness": 4
			}, {
				"visibility": "on"
			}
			]
		}, {
			"featureType": "landscape.natural",
			"stylers": [
			{
				"visibility": "on"
			}, {
				"color": "#5dff00"
			}, {
				"gamma": 4.97
			}, {
				"lightness": -5
			}, {
				"saturation": 100
			}
			]
		}
		];
		myOptions = {
			zoom: 17,
			center: new google.maps.LatLng(-5.803316,-35.20184),
			mapTypeId: google.maps.MapTypeId.ROADMAP,
			styles: style,
			mapTypeControl: false,
			streetViewControl: false,
			scrollwheel: false,
			navigationControl: false,
			scaleControl: false,
			overviewMapControl: false,
			panControl: true,
			zoomControl: true,
			zoomControlOptions: {
				style: google.maps.ZoomControlStyle.LARGE
			}
		};
		if (document.getElementById('map')) {
			map = new google.maps.Map(document.getElementById('map'), myOptions);

			marker1 = new google.maps.Marker({
				position: new google.maps.LatLng(-5.803316,-35.20184),
				map: map,
				icon: ''
			});

			// var infowindow1 = new google.maps.InfoWindow({
			// 	content: '<div id="content" class="map__info">'+
			// 	'<h4 class="map__title">Cinema da Fundaj</h4>'+
			// 	'<div id="bodyContent">'+
			// 	'<p class="map__address"><b>Rua Henrique Dias, 609 - Derby - Recife/PE</b></p>' +
			// 	'</div>'+
			// 	'</div>'
			// });

			// google.maps.event.addListener(marker1, 'mouseover', function() {
			// 	infowindow1.open(map, marker1);
			// });
		}
	};
	init = function() {
		if (document.getElementById('map')) {
			return render();
		}
	};
	return {
		init: init
	};
};

$(document).ready(function(){
	var map = maps();
	map.init();
});
