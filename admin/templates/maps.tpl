{include file="header.tpl" activeItem="maps" title="{settings:title} "}
<div class="page-content-wrap">
    {if isset($messages.saved)}<span id="savedMessage" onclick="noty({ text: '{settings:messages:0}', layout: 'topRight', type: 'success', timeout: 1500 });"></span>{/if}
    <script>
        $(document).ready(function() {
            {if isset($messages.saved)} $('#savedMessage').click(); {/if}
        }); 
    </script>

    <div class="content-frame" style="margin-bottom:10px;"><div class="content-frame-top"><div class="col-md-12 nopadding"><h2>{settings:map:settingMap}</h2></div></div></div>

    <div class="col-md-12">
        <form action="maps.php" method="post" id="map" autocomplete="off">
            <div class="panel panel-default tabs ">
                <ul class="nav nav-tabs nav-justified">
                    <li class="active"><a href="#contactInfo" data-toggle="tab" aria-expanded="true">{settings:map:settingMap}</a></li>
                </ul>

                <div class="panel-body tab-content nopadding">
                    <div class="tab-pane active" id="contactInfo">
                        <div class="panel panel-default" style="margin-bottom: 0px;">
                            <div class="panel-body">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="field_name">{if isset($maps.isMaps) and $maps.isMaps eq 1}{settings:map:mapOff}{else}{settings:map:mapOn}{/if}</label>
                                        <div class="checkbox-material">
                                            <input type="checkbox" id="maps_down" name="maps[isMaps]" value="1" {if $maps.isMaps|default:0 eq 1}checked{/if}/>
                                            <label for="maps_down" id="visible_maps" style="top: 7px;">
                                                <span class="chk-span"></span>
                                                <i>{if $maps.isMaps eq 1}{settings:map:mapOff}{else}{settings:map:mapOn}{/if}</i>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="field_name">{settings:map:mapApi} <i data-toggle="tooltip" data-placement="top" data-original-title="{settings:map:mapApiInfo}" class="fa fa-question-circle"></i></label>
                                        <input class="form-control" type="text" name="maps[api_key]" value="{if isset($maps.api_key)}{$maps.api_key}{/if}">
                                    </div>
                                    <div class="col-md-6 nopadding_left">
                                        <div class="form-group">
                                            <label class="field_name">{settings:map:lat} <i data-toggle="tooltip" data-placement="top" data-original-title="Latitude" class="fa fa-question-circle"></i></label>
                                            <input class="form-control" type="text" name="maps[lat]" value="{if isset($maps.lat)}{$maps.lat}{/if}">
                                        </div>
                                    </div>
                                    <div class="col-md-6 nopadding_right">
                                        <div class="form-group">
                                            <label class="field_name">{settings:map:lng} <i data-toggle="tooltip" data-placement="top" data-original-title="Longitude" class="fa fa-question-circle"></i></label>
                                            <input class="form-control" type="text" name="maps[lng]" value="{if isset($maps.lng)}{$maps.lng}{/if}">
                                        </div>
                                    </div>
                                    <div class="col-md-6 nopadding_left">
                                        <div class="form-group">
                                            <label class="field_name">{settings:map:zoomMap} <i data-toggle="tooltip" data-placement="top" data-original-title="{settings:map:zoomMapInfo}" class="fa fa-question-circle"></i></label>
                                            <input class="mask_zoom form-control" type="text" name="maps[zoom]" value="{if isset($maps.zoom)}{$maps.zoom}{/if}">
                                        </div>
                                    </div>
                                    <div class="col-md-6 nopadding_right">
                                        <div class="form-group">
                                            <label class="field_name">{settings:map:scale} </label>
                                            <input class="form-control" type="text" name="maps[scale]" value="{if isset($maps.scale)}{$maps.scale}{/if}">
                                        </div>
                                    </div>
                                    <div class="col-md-6 nopadding_left">
                                        <div class="form-group">
                                            <label class="field_name">{settings:map:wightMap} <i data-toggle="tooltip" data-placement="top" data-original-title="{settings:map:wightMapInfo}" class="fa fa-question-circle"></i></label>
                                            <input class="form-control" type="text" name="maps[maps_wight]" value="{if isset($maps.maps_wight)}{$maps.maps_wight}{/if}">
                                        </div>
                                    </div>
                                    <div class="col-md-6 nopadding_right">
                                        <div class="form-group">
                                            <label class="field_name">{settings:map:heightMap} <i data-toggle="tooltip" data-placement="top" data-original-title="{settings:map:heightMapInfo}" class="fa fa-question-circle"></i></label>
                                            <input class="mask_maps_height form-control" type="text" name="maps[maps_height]" value="{if isset($maps.maps_height)}{$maps.maps_height}{/if}">
                                        </div>
                                    </div>
                                    <div class="col-md-6 nopadding_left">
                                        <div class="form-group">
                                            <label class="field_name">{settings:map:fillColor}</label>
                                            <input class="form-control" type="text" name="maps[fillColor]" value="{if isset($maps.fillColor)}{$maps.fillColor}{/if}">
                                        </div>
                                    </div>
                                    <div class="col-md-6 nopadding_right">
                                        <div class="form-group">
                                            <label class="field_name">{settings:map:fillOpacity} </label>
                                            <input class="form-control" type="text" name="maps[fillOpacity]" value="{if isset($maps.fillOpacity)}{$maps.fillOpacity}{/if}">
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        {if isset($maps.isMaps) and $maps.isMaps eq 1}
                                        <div class="block_maps"><div id="map"></div></div>
                                        {/if}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div align="center" class="col-md-12 main main_buttons">
                <button class="btn btn-primary" type="submit" name="action[save]" value="save">&nbsp; {general:save} &nbsp;</button>
            </div>
        </form>
    </div>
</div>

{maps} 
{include file="footer.tpl"}
