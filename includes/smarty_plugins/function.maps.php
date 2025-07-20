<?php
/******************************************************************************/
//                                                                            //
//                             Smarty plugin                                  //
//                            @package Smarty                                 //
//							 @subpackage plugins                              //
//                        http://life-style.uz/                               //
//                   produced by Life Style, life-style.uz                    //
//                                                                            //
/******************************************************************************/

function smarty_function_maps($params, &$smarty)
{
	global $config, $maps;
	
	$result = '';
	    
	
	if ($maps['isMaps'] == '1') {

        $result = '
        <!-- Maps -->
        <style>#map-canvas {width: ' . $maps['maps_wight'] . ';height: ' . $maps['maps_height'] . ';}</style>
        <script src="https://maps.googleapis.com/maps/api/js?key=' . $maps['api_key'] . '"></script>
        <script type="text/javascript">
        	var map;
        	function initialize() {
        	
        		var mapOptions = {
        			mapTypeId: google.maps.MapTypeId.ROADMAP,
        			mapTypeControl: false,
        			zoom: ' . $maps['zoom'] . ',
        			zoomControl: true,
        			zoomControlOptions: {
        				style: google.maps.ZoomControlStyle.DEFAULT,
        				position: google.maps.ControlPosition.DEFAULT
        			},
        			panControl: true,
        			panControlOptions: {
        				position: google.maps.ControlPosition.LEFT_TOP
        			},
        			streetViewControl: false,
        			scaleControl: false,
        			overviewMapControl: false,
        			center: new google.maps.LatLng(' . $maps['lat'] . ', ' . $maps['lng'] . ')
        		};
        		
        		map = new google.maps.Map(document.getElementById("map-canvas"),
        			mapOptions);
        		
        		var mapStyles = [{"featureType": "landscape","stylers": [{ "visibility": "on" },{ "hue": "#0033ff" },{ "saturation": -100 },{ "lightness": 77 },{ "gamma": 0.34 }]},{"featureType": "water","stylers": [{ "visibility": "on" },{ "hue": "#ff0000" },{ "saturation": -100 },{ "lightness": 23 },{ "gamma": 1 }]},{"featureType": "water","elementType": "labels","stylers": [{ "visibility": "on" }]},{"featureType": "administrative","stylers": [{ "visibility": "on" }]},{"featureType": "administrative","elementType": "labels","stylers": [{ "visibility": "on" }]},{"featureType": "poi","stylers": [{ "visibility": "on" },{ "hue": "#ff0000" },{ "saturation": -100 },{ "lightness": 0 },{ "gamma": 1 }]},{"featureType": "road","stylers": [{ "visibility": "on" },{ "hue": "#ff0000" },{ "saturation": -100 },{ "lightness": 0 },{ "gamma": 1 }]},{"featureType": "transit","stylers": [{ "visibility": "on" },{ "hue": "#ff0000" },{ "saturation": -100 },{ "lightness": 0 },{ "gamma": 1 }]}
        		];
        		
        		map.setOptions({styles: mapStyles});
        		
        		var transitLayer = new google.maps.TransitLayer();
        		transitLayer.setMap(map);
        		
        		var bicyclingLayer = new google.maps.BicyclingLayer();
        		bicyclingLayer.setMap(map);
        		
        		var infoContent = "<div><h4>' . $config['website_name'] . '</h4><p>' . $config['address'] . '</p></div>";
        		
        		var infowindow = new google.maps.InfoWindow({
        			content: infoContent
        		});
        		
        		var icon = {
        			path: "M16.5,51s-16.5-25.119-16.5-34.327c0-9.2082,7.3873-16.673,16.5-16.673,9.113,0,16.5,7.4648,16.5,16.673,0,9.208-16.5,34.327-16.5,34.327zm0-27.462c3.7523,0,6.7941-3.0737,6.7941-6.8654,0-3.7916-3.0418-6.8654-6.7941-6.8654s-6.7941,3.0737-6.7941,6.8654c0,3.7916,3.0418,6.8654,6.7941,6.8654z",
        			anchor: new google.maps.Point(16.5, 51),
        			fillColor: "' . $maps['fillColor'] . '",
        			fillOpacity: ' . $maps['fillOpacity'] . ',
        			strokeWeight: 0,
        			scale: ' . $maps['scale'] . '
        		};
        		
        		var marker = new google.maps.Marker({
        			position: new google.maps.LatLng(' . $maps['lat'] . ', ' . $maps['lng'] . '),
        			map: map,
        			icon: icon,
        			title: marker
        		});
        		
        		google.maps.event.addListener(marker, "click", function() {
        			infowindow.open(map,marker);
        		});
        	}
        	
        	google.maps.event.addDomListener(window, "load", initialize);
        	
        	function checkResize(){
        	
        		var center = map.getCenter();
        		google.maps.event.trigger(map, "resize");
        		map.setCenter(center);
        	}
        	
        	window.onresize = checkResize;			
        </script>  
        <!-- / Maps -->
        ';
	}

	return $result;
}



?>