<?php
/* Smarty version 3.1.33, created on 2025-07-17 12:33:36
  from '/home/soskduz/public_html/themes/app/templates/section-contacts.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_6878a7508071c1_07951875',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f631dfeed58bcc8eb9afcd414450ee751ebf91a0' => 
    array (
      0 => '/home/soskduz/public_html/themes/app/templates/section-contacts.tpl',
      1 => 1684230560,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:modules/you-are-here.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_6878a7508071c1_07951875 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/home/soskduz/public_html/includes/smarty_plugins/function.fetch_articles.php','function'=>'smarty_function_fetch_articles',),1=>array('file'=>'/home/soskduz/public_html/includes/Smarty/plugins/modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
$_smarty_tpl->compiled->nocache_hash = '4418647336878a75079bf67_97231722';
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array('title'=>$_smarty_tpl->tpl_vars['section']->value['meta_title'],'keywords'=>$_smarty_tpl->tpl_vars['section']->value['keywords'],'description'=>$_smarty_tpl->tpl_vars['section']->value['description']), 0, false);
?>
<!-- Хлебные крошки -->
<?php $_smarty_tpl->_subTemplateRender("file:modules/you-are-here.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array('class'=>"breadcrumb-container"), 0, false);
?>

<div class="contacts-wrapper">
	<div class="container">
		<div class="page-name"><h1><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['section']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
</h1></div>
		<?php echo smarty_function_fetch_articles(array('assign'=>'sectionContacts','isFeatured'=>1,'limit'=>1,'type_content'=>"contacts"),$_smarty_tpl);?>

        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['sectionContacts']->value, 'contact', false, NULL, 'sectionContacts', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['contact']->value) {
?>
    		<div class="main-address flex-adaptive align-center">
    			<div class="place-name"><h2><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['contact']->value['title'], ENT_QUOTES, 'UTF-8', true);?>
</h2></div>
    			<div class="address">
    				<div class="desc-content">
    					<?php echo $_smarty_tpl->tpl_vars['contact']->value['summary'];?>

    				</div>
    			</div>
    		</div>
		<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

		<div class="other-addresses">
			<div class="row">
				<?php echo smarty_function_fetch_articles(array('assign'=>'sectionContactLists','isFeatured'=>0,'limit'=>10,'type_content'=>"contacts",'order'=>"publishedOn DESC"),$_smarty_tpl);?>

                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['sectionContactLists']->value, 'contactList', false, NULL, 'sectionContactLists', array (
  'iteration' => true,
  'last' => true,
  'total' => true,
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['contactList']->value) {
$_smarty_tpl->tpl_vars['__smarty_foreach_sectionContactLists']->value['iteration']++;
$_smarty_tpl->tpl_vars['__smarty_foreach_sectionContactLists']->value['last'] = $_smarty_tpl->tpl_vars['__smarty_foreach_sectionContactLists']->value['iteration'] === $_smarty_tpl->tpl_vars['__smarty_foreach_sectionContactLists']->value['total'];
?>
				<div class=" col-md-4">
					<div class="other-address">
    					<h2><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['contactList']->value['title'], ENT_QUOTES, 'UTF-8', true);?>
</h2>
						<?php echo $_smarty_tpl->tpl_vars['contactList']->value['summary'];?>

					</div>
				</div>
				<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
			</div>
		</div>
		<div class="contacts-main">
			<div class="row">
				<div class="map-content col-md-8"><div id="map-canvas" class="map-container"></div></div>
				<div class="col-md-4">
					<div class="form-content">
						<div class="success-send"><h2><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['LANG']->value['successfully'], ENT_QUOTES, 'UTF-8', true);?>
</h2></div>
                        
                        <div class="" style="margin-bottom: 20px;">
            
            <div class="success-send"><h2><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['LANG']->value['successfully'], ENT_QUOTES, 'UTF-8', true);?>
</h2></div>
            <div class="message-send-wait"><h2><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['LANG']->value['message_send_loading'], ENT_QUOTES, 'UTF-8', true);?>
</h2></div>
            <form id="send_question" action="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['GLOBAL_URL']->value, ENT_QUOTES, 'UTF-8', true);?>
/public/send_questions.php" method="POST" enctype="multipart/form-data">

                <?php echo $_smarty_tpl->tpl_vars['csrf_input']->value;?>

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
                                    <label><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['LANG']->value['message_fio'], ENT_QUOTES, 'UTF-8', true);?>

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
                                    <label><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['LANG']->value['message_phone'], ENT_QUOTES, 'UTF-8', true);?>
</label>
                                    <input type="text" class="input-control" name="phone" value="" size="0">
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td style="border-image: initial;">
                                <div class="input">
                                    <label><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['LANG']->value['message_city'], ENT_QUOTES, 'UTF-8', true);?>

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
                                    <label><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['LANG']->value['message_your_message'], ENT_QUOTES, 'UTF-8', true);?>
</label>
                                    <textarea name="message" cols="20" rows="5" class="input-control"></textarea>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td style="border-image: initial;">
                                <div id="send-anti-bot">
                                    <strong>Текущий <span style="display:inline;">ye@r</span> <span style="display:none;">month</span> <span style="display:none;">day</span></strong>
                                    <span class="required">*</span>
                                    <input type="hidden" name="anti-bot-a" id="feedback-anti-bot-a" value="<?php echo htmlspecialchars(smarty_modifier_date_format(time(),'%Y'), ENT_QUOTES, 'UTF-8', true);?>
"/>
                                    <input type="text" name="anti-bot-q" id="feedback-anti-bot-q" value="19"/>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td style="border-image: initial;">
                                <p><span class="red">*</span> - <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['LANG']->value['message_required'], ENT_QUOTES, 'UTF-8', true);?>
 </p>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <?php if ($_smarty_tpl->tpl_vars['config']->value['allow_recaptcha'] == 1) {?>
                                    <input type="hidden" id="g-recaptcha-response" name="g-recaptcha-response" />
                                <?php }?>
                            </td>
                        </tr>

                        <tr>
                            <td style="border-image: initial;">
                                <div class="button"><input type="submit" name="web_form_submit" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['LANG']->value['send'], ENT_QUOTES, 'UTF-8', true);?>
"></div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <?php if ($_smarty_tpl->tpl_vars['config']->value['allow_recaptcha'] == 1) {?>
                    <?php echo '<script'; ?>
 src="https://www.google.com/recaptcha/api.js?render=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['config']->value['recaptcha_public_key'], ENT_QUOTES, 'UTF-8', true);?>
"><?php echo '</script'; ?>
>
                    <?php echo '<script'; ?>
 type="text/javascript">
                        grecaptcha.ready(function() {
                            grecaptcha.execute(
                                        '<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['config']->value['recaptcha_public_key'], ENT_QUOTES, 'UTF-8', true);?>
',
                                        {action: 'homepage'}
                            ).then(function(token) {
                                console.log('token: ', token);
                                document.getElementById('g-recaptcha-response').value=token;
                            });
                        });
                    <?php echo '</script'; ?>
>
                <?php }?>
            </form>
            <div id="bxdynamic_4enrz3_end" style="display:none"></div>
        </div>
                        
                        
						
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php echo '<script'; ?>
 src="https://maps.googleapis.com/maps/api/js?key=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['maps']->value['api_key'], ENT_QUOTES, 'UTF-8', true);?>
"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript">

    var locations = [
        <?php echo smarty_function_fetch_articles(array('assign'=>'sectionContactLists','limit'=>10,'type_content'=>"contacts",'order'=>"publishedOn DESC"),$_smarty_tpl);?>

        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['sectionContactLists']->value, 'contactList', false, NULL, 'sectionContactLists', array (
  'iteration' => true,
  'last' => true,
  'total' => true,
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['contactList']->value) {
$_smarty_tpl->tpl_vars['__smarty_foreach_sectionContactLists']->value['iteration']++;
$_smarty_tpl->tpl_vars['__smarty_foreach_sectionContactLists']->value['last'] = $_smarty_tpl->tpl_vars['__smarty_foreach_sectionContactLists']->value['iteration'] === $_smarty_tpl->tpl_vars['__smarty_foreach_sectionContactLists']->value['total'];
if ($_smarty_tpl->tpl_vars['contactList']->value['alias'] != '') {?>
        ["<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['contactList']->value['title'], ENT_QUOTES, 'UTF-8', true);?>
", <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['contactList']->value['alias'], ENT_QUOTES, 'UTF-8', true);?>
, <?php echo htmlspecialchars((isset($_smarty_tpl->tpl_vars['__smarty_foreach_sectionContactLists']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_sectionContactLists']->value['iteration'] : null), ENT_QUOTES, 'UTF-8', true);?>
]<?php if (!(isset($_smarty_tpl->tpl_vars['__smarty_foreach_sectionContactLists']->value['last']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_sectionContactLists']->value['last'] : null)) {?>,<?php }?>
        <?php }
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    ];


    if (document.getElementById("map-canvas")) {
        var map;

        function initialize() {

            var mapOptions = {
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                mapTypeControl: false,
                zoom: <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['maps']->value['zoom'], ENT_QUOTES, 'UTF-8', true);?>
,
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
                center: new google.maps.LatLng(<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['maps']->value['lat'], ENT_QUOTES, 'UTF-8', true);?>
, <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['maps']->value['lng'], ENT_QUOTES, 'UTF-8', true);?>
)
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
                fillColor: '<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['maps']->value['fillColor'], ENT_QUOTES, 'UTF-8', true);?>
',
                fillOpacity: <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['maps']->value['fillOpacity'], ENT_QUOTES, 'UTF-8', true);?>
,
                strokeWeight: 0,
                scale: <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['maps']->value['scale'], ENT_QUOTES, 'UTF-8', true);?>

            };

            /*
                      var marker = new google.maps.Marker({
                        position: new google.maps.LatLng(<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['maps']->value['lat'], ENT_QUOTES, 'UTF-8', true);?>
, <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['maps']->value['lng'], ENT_QUOTES, 'UTF-8', true);?>
),
			map: map,
			icon: "<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['THEME_URL']->value, ENT_QUOTES, 'UTF-8', true);?>
/img/marker.png",
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
                    icon: "<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['THEME_URL']->value, ENT_QUOTES, 'UTF-8', true);?>
/img/marker.png",
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
<?php echo '</script'; ?>
>

<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
