<?php
/* Smarty version 3.1.33, created on 2024-01-06 16:17:54
  from '/home/soskduz/public_html/admin/templates/maps.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_659936e2cfca91_36163622',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'dc6dcc447f69b908e46056c079dd1b1c18b7215d' => 
    array (
      0 => '/home/soskduz/public_html/admin/templates/maps.tpl',
      1 => 1571729384,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_659936e2cfca91_36163622 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/home/soskduz/public_html/includes/smarty_plugins/function.maps.php','function'=>'smarty_function_maps',),));
$_smarty_tpl->compiled->nocache_hash = '992344118659936e2cc6b56_11429769';
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array('activeItem'=>"maps",'title'=>"Настройки "), 0, false);
?>
<div class="page-content-wrap">
    <?php if (isset($_smarty_tpl->tpl_vars['messages']->value['saved'])) {?><span id="savedMessage" onclick="noty({ text: 'Настройки сохранены.', layout: 'topRight', type: 'success', timeout: 1500 });"></span><?php }?>
    <?php echo '<script'; ?>
>
        $(document).ready(function() {
            <?php if (isset($_smarty_tpl->tpl_vars['messages']->value['saved'])) {?> $('#savedMessage').click(); <?php }?>
        }); 
    <?php echo '</script'; ?>
>

    <div class="content-frame" style="margin-bottom:10px;"><div class="content-frame-top"><div class="col-md-12 nopadding"><h2>Настройки карты</h2></div></div></div>

    <div class="col-md-12">
        <form action="maps.php" method="post" id="map" autocomplete="off">
            <div class="panel panel-default tabs ">
                <ul class="nav nav-tabs nav-justified">
                    <li class="active"><a href="#contactInfo" data-toggle="tab" aria-expanded="true">Настройки карты</a></li>
                </ul>

                <div class="panel-body tab-content nopadding">
                    <div class="tab-pane active" id="contactInfo">
                        <div class="panel panel-default" style="margin-bottom: 0px;">
                            <div class="panel-body">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="field_name"><?php if (isset($_smarty_tpl->tpl_vars['maps']->value['isMaps']) && $_smarty_tpl->tpl_vars['maps']->value['isMaps'] == 1) {?>Отключить карту<?php } else { ?>Включить карту<?php }?></label>
                                        <div class="checkbox-material">
                                            <input type="checkbox" id="maps_down" name="maps[isMaps]" value="1" <?php if ((($tmp = @$_smarty_tpl->tpl_vars['maps']->value['isMaps'])===null||$tmp==='' ? 0 : $tmp) == 1) {?>checked<?php }?>/>
                                            <label for="maps_down" id="visible_maps" style="top: 7px;">
                                                <span class="chk-span"></span>
                                                <i><?php if ($_smarty_tpl->tpl_vars['maps']->value['isMaps'] == 1) {?>Отключить карту<?php } else { ?>Включить карту<?php }?></i>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="field_name">API ключ карты <i data-toggle="tooltip" data-placement="top" data-original-title="Удалять не рекомендуется (если Вам уже настроили карту)" class="fa fa-question-circle"></i></label>
                                        <input class="form-control" type="text" name="maps[api_key]" value="<?php if (isset($_smarty_tpl->tpl_vars['maps']->value['api_key'])) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['maps']->value['api_key'], ENT_QUOTES, 'UTF-8', true);
}?>">
                                    </div>
                                    <div class="col-md-6 nopadding_left">
                                        <div class="form-group">
                                            <label class="field_name">Широта <i data-toggle="tooltip" data-placement="top" data-original-title="Latitude" class="fa fa-question-circle"></i></label>
                                            <input class="form-control" type="text" name="maps[lat]" value="<?php if (isset($_smarty_tpl->tpl_vars['maps']->value['lat'])) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['maps']->value['lat'], ENT_QUOTES, 'UTF-8', true);
}?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6 nopadding_right">
                                        <div class="form-group">
                                            <label class="field_name">Долгота <i data-toggle="tooltip" data-placement="top" data-original-title="Longitude" class="fa fa-question-circle"></i></label>
                                            <input class="form-control" type="text" name="maps[lng]" value="<?php if (isset($_smarty_tpl->tpl_vars['maps']->value['lng'])) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['maps']->value['lng'], ENT_QUOTES, 'UTF-8', true);
}?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6 nopadding_left">
                                        <div class="form-group">
                                            <label class="field_name">Масштаб карты <i data-toggle="tooltip" data-placement="top" data-original-title="Рекомендуемы параметры масштабирования карты (от 12 до 20)" class="fa fa-question-circle"></i></label>
                                            <input class="mask_zoom form-control" type="text" name="maps[zoom]" value="<?php if (isset($_smarty_tpl->tpl_vars['maps']->value['zoom'])) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['maps']->value['zoom'], ENT_QUOTES, 'UTF-8', true);
}?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6 nopadding_right">
                                        <div class="form-group">
                                            <label class="field_name">Размер маркера </label>
                                            <input class="form-control" type="text" name="maps[scale]" value="<?php if (isset($_smarty_tpl->tpl_vars['maps']->value['scale'])) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['maps']->value['scale'], ENT_QUOTES, 'UTF-8', true);
}?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6 nopadding_left">
                                        <div class="form-group">
                                            <label class="field_name">Ширина карты <i data-toggle="tooltip" data-placement="top" data-original-title="Параметры карты по ширине ( для отображения на сайте ) указывать в процентах ( % )" class="fa fa-question-circle"></i></label>
                                            <input class="form-control" type="text" name="maps[maps_wight]" value="<?php if (isset($_smarty_tpl->tpl_vars['maps']->value['maps_wight'])) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['maps']->value['maps_wight'], ENT_QUOTES, 'UTF-8', true);
}?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6 nopadding_right">
                                        <div class="form-group">
                                            <label class="field_name">Высота карты <i data-toggle="tooltip" data-placement="top" data-original-title="Параметры карты по высоте ( для отображения на сайте ) указывать в пикселях ( px )" class="fa fa-question-circle"></i></label>
                                            <input class="mask_maps_height form-control" type="text" name="maps[maps_height]" value="<?php if (isset($_smarty_tpl->tpl_vars['maps']->value['maps_height'])) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['maps']->value['maps_height'], ENT_QUOTES, 'UTF-8', true);
}?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6 nopadding_left">
                                        <div class="form-group">
                                            <label class="field_name">Цвет маркера</label>
                                            <input class="form-control" type="text" name="maps[fillColor]" value="<?php if (isset($_smarty_tpl->tpl_vars['maps']->value['fillColor'])) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['maps']->value['fillColor'], ENT_QUOTES, 'UTF-8', true);
}?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6 nopadding_right">
                                        <div class="form-group">
                                            <label class="field_name">Прозрачность маркера </label>
                                            <input class="form-control" type="text" name="maps[fillOpacity]" value="<?php if (isset($_smarty_tpl->tpl_vars['maps']->value['fillOpacity'])) {
echo htmlspecialchars($_smarty_tpl->tpl_vars['maps']->value['fillOpacity'], ENT_QUOTES, 'UTF-8', true);
}?>">
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <?php if (isset($_smarty_tpl->tpl_vars['maps']->value['isMaps']) && $_smarty_tpl->tpl_vars['maps']->value['isMaps'] == 1) {?>
                                        <div class="block_maps"><div id="map"></div></div>
                                        <?php }?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div align="center" class="col-md-12 main main_buttons">
                <button class="btn btn-primary" type="submit" name="action[save]" value="save">&nbsp; Сохранить &nbsp;</button>
            </div>
        </form>
    </div>
</div>

<?php echo smarty_function_maps(array(),$_smarty_tpl);?>
 
<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
