{include file="header.tpl" title=$section.meta_title keywords=$section.keywords description=$section.description}
<!-- Хлебные крошки -->
{include file="modules/you-are-here.tpl" class="breadcrumb-container"}

<div class="contacts-wrapper">
	<div class="container">
		<div class="page-name"><h1>{$section.name}</h1></div>
		{fetch_articles assign=sectionContacts isFeatured=1 limit=1 type_content="contacts"}
        {foreach item=contact from=$sectionContacts name=sectionContacts}
    		<div class="main-address flex-adaptive align-center">
    			<div class="place-name"><h2>{$contact.title}</h2></div>
    			<div class="address">
    				<div class="desc-content">
    					{$contact.summary nofilter}
    				</div>
    			</div>
    		</div>
		{/foreach}

		<div class="other-addresses">
			<div class="row">
				{fetch_articles assign=sectionContactLists isFeatured=0 limit=10 type_content="contacts" order="publishedOn DESC"}
                {foreach item=contactList from=$sectionContactLists name=sectionContactLists}
				<div class=" col-md-4">
					<div class="other-address">
    					<h2>{$contactList.title}</h2>
						{$contactList.summary nofilter}
					</div>
				</div>
				{/foreach}
			</div>
		</div>
		<div class="contacts-main">
			<div class="row">
				<div class="map-content col-md-8"><div id="map-canvas" class="map-container"></div></div>
				<div class="col-md-4">
					<div class="form-content">
						<div class="success-send"><h2>{$LANG.successfully}</h2></div>
                        
                        <div class="" style="margin-bottom: 20px;">
            
            <div class="success-send"><h2>{$LANG.successfully}</h2></div>
            <div class="message-send-wait"><h2>{$LANG.message_send_loading}</h2></div>
            <form id="send_question" action="{$GLOBAL_URL}/public/send_questions.php" method="POST" enctype="multipart/form-data">

                {$csrf_input nofilter}
                <div class=" ppl-list">
                    <div class="name"></div>
                    <table width="100%" style="border-collapse: collapse;">
                        <tbody>
                        <tr>
                            <td style="border-image: initial;"></td>
                        </tr>
                        <tr>
                            <td style="border-image: initial;">
                                <div class="input">
                                    <label>{$LANG.message_fio}
                                        <font color="red">
                                            <span class="form-required starrequired">*</span>
                                        </font>
                                    </label>
                                    <input type="text" class="input-control" name="name" value="" size="0">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td style="border-image: initial;">
                                <div class="input">
                                    <label>Email
                                        <font color="red">
                                            <span class="form-required starrequired">*</span>
                                        </font>
                                    </label>
                                    <input type="text" class="input-control" name="email" value="" size="0">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td style="border-image: initial;">
                                <div class="input">
                                    <label>{$LANG.message_phone}</label>
                                    <input type="text" class="input-control" name="phone" value="" size="0">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td style="border-image: initial;">
                                <div class="input">
                                    <label>{$LANG.message_city}
                                        <font color="red">
                                            <span class="form-required starrequired">*</span>
                                        </font>
                                    </label>
                                    <input type="text" class="input-control" name="city" value="" size="0"></div>
                            </td>
                        </tr>

                        <tr>
                            <td style="border-image: initial;">
                                <div class="textarea">
                                    <label>{$LANG.message_your_message}</label>
                                    <textarea name="message" cols="20" rows="5" class="input-control"></textarea>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td style="border-image: initial;">
                                <div id="send-anti-bot">
                                    <strong>Текущий <span style="display:inline;">ye@r</span> <span style="display:none;">month</span> <span style="display:none;">day</span></strong>
                                    <span class="required">*</span>
                                    <input type="hidden" name="anti-bot-a" id="feedback-anti-bot-a" value="{$smarty.now|date_format:'%Y'}"/>
                                    <input type="text" name="anti-bot-q" id="feedback-anti-bot-q" value="19"/>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td style="border-image: initial;">
                                <p><span class="red">*</span> - {$LANG.message_required} </p>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                {if $config.allow_recaptcha eq 1}
                                    <input type="hidden" id="g-recaptcha-response" name="g-recaptcha-response" />
                                {/if}
                            </td>
                        </tr>

                        <tr>
                            <td style="border-image: initial;">
                                <div class="button"><input type="submit" name="web_form_submit" value="{$LANG.send}"></div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                {if $config.allow_recaptcha eq 1}
                    <script src="https://www.google.com/recaptcha/api.js?render={$config.recaptcha_public_key}"></script>
                    <script type="text/javascript">
                        grecaptcha.ready(function() {
                            grecaptcha.execute(
                                        '{$config.recaptcha_public_key}',
                                        {literal}{action: 'homepage'}{/literal}
                            ).then(function(token) {
                                console.log('token: ', token);
                                document.getElementById('g-recaptcha-response').value=token;
                            });
                        });
                    </script>
                {/if}
            </form>
            <div id="bxdynamic_4enrz3_end" style="display:none"></div>
        </div>
                        
                        
						
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script src="https://maps.googleapis.com/maps/api/js?key={$maps.api_key}"></script>
<script type="text/javascript">

    var locations = [
        {fetch_articles assign=sectionContactLists limit=10 type_content="contacts" order="publishedOn DESC"}
        {foreach item=contactList from=$sectionContactLists name=sectionContactLists}{if $contactList.alias ne ''}
        ["{$contactList.title}", {$contactList.alias}, {$smarty.foreach.sectionContactLists.iteration}]{if !$smarty.foreach.sectionContactLists.last},{/if}
        {/if}{/foreach}
    ];


    if (document.getElementById("map-canvas")) {
        var map;

        function initialize() {

            var mapOptions = {
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                mapTypeControl: false,
                zoom: {$maps.zoom},
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
                center: new google.maps.LatLng({$maps.lat}, {$maps.lng})
            };

            map = new google.maps.Map(document.getElementById('map-canvas'),
                mapOptions);

            map.setOptions({
                disableDefaultUI: true
            });

            var transitLayer = new google.maps.TransitLayer();
            transitLayer.setMap(map);

            var bicyclingLayer = new google.maps.BicyclingLayer();
            bicyclingLayer.setMap(map);

            var infoContent = '<div class="window-content align-center"><p></p></div>';

            var infowindow = new google.maps.InfoWindow({
                content: infoContent
            });

            var icon = {
                path: 'M16.5,51s-16.5-25.119-16.5-34.327c0-9.2082,7.3873-16.673,16.5-16.673,9.113,0,16.5,7.4648,16.5,16.673,0,9.208-16.5,34.327-16.5,34.327zm0-27.462c3.7523,0,6.7941-3.0737,6.7941-6.8654,0-3.7916-3.0418-6.8654-6.7941-6.8654s-6.7941,3.0737-6.7941,6.8654c0,3.7916,3.0418,6.8654,6.7941,6.8654z',
                anchor: new google.maps.Point(16.5, 51),
                fillColor: '{$maps.fillColor}',
                fillOpacity: {$maps.fillOpacity},
                strokeWeight: 0,
                scale: {$maps.scale}
            };

            /*
                      var marker = new google.maps.Marker({
                        position: new google.maps.LatLng({$maps.lat}, {$maps.lng}),
			map: map,
			icon: "{$THEME_URL}/img/marker.png",
			title: 'marker'
		  });

		  google.maps.event.addListener(marker, 'click', function() {
			infowindow.open(map, marker);
		  });
*/

            var marker, i;

            for (i = 0; i < locations.length; i++) {
                marker = new google.maps.Marker({
                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                    map: map,
                    icon: "{$THEME_URL}/img/marker.png",
                    title: 'marker'
                });

                google.maps.event.addListener(marker, 'click', (function(marker, i) {
                    return function() {
                        infowindow.setContent('<h6>'+locations[i][0]+'</h6>');
                        infowindow.open(map, marker);
                    }
                })(marker, i));
            };

        }




        google.maps.event.addDomListener(window, 'load', initialize);

        function checkResize() {
            var center = map.getCenter();
            google.maps.event.trigger(map, 'resize');
            map.setCenter(center);
        }

        window.onresize = checkResize;
    }
</script>

{include file="footer.tpl"}
