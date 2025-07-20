{include file="header.tpl" activeItem="logo" title="{logo:logo}"}
<script>
{literal}
$(document).ready(function () {
  function readImage ( input ) {
    if (input.files && input.files[0]) {	
      var reader = new FileReader();
			reader.onload = function (e) {$('#preview').attr('src', e.target.result);}
	  	reader.readAsDataURL(input.files[0]);
    }
  }
 
  $('#image').change(function(){ readImage(this); });
 
  $('#upload-image').on('submit',(function(e) {
    e.preventDefault();
		var formData = new FormData(this);
		var form = $(this);

    $.ajax({
      type:$(form).attr('method'), 
	  	url: $(form).attr('action'), 
	  	cache:false, 
	  	contentType: false,
	  	processData: false,
	  	data: formData, 
	  	dataType: 'json',
	  	success: function(data) {
		  	if(data['success']) {
          $('#result').removeClass('alert alert-danger').addClass('alert alert-success').text(data['message']).fadeIn(500);
          setTimeout(function() { $('#result').fadeOut(500);}, 3000);
          setTimeout(function() {location.reload()},3500);
        }else{
          $('#result').removeClass('alert alert-success').addClass('alert alert-danger').text(data['message']).fadeIn(500);
          setTimeout(function() { $('#result').fadeOut(500); }, 5000);
        }
      },
	  });
  }));
});
{/literal}
</script>
<div class="page-content-wrap">
	<div class="content-frame" style="margin-bottom:10px;">
    <div class="content-frame-top">                        
      <div class="col-md-4 "><h2>{logo:logo}</h2></div>
      <div class="col-md-4 content-frame-body-left"><div id="result" class="result"> </div></div>
      <div class="col-md-4"></div>                      
    </div>
	</div>
	
	<div class="col-md-12">			
    <div class="panel panel-default">
      <div class="panel-body panel-body-table">
        <div class="table-responsive">
          <table class="table table-striped table-actions table-hover" id="logos">
            <thead>
              <tr>
                <th class="text-center">Логотип</th>
                <th class="text-center">Имя файла</th>
                <th class="text-center">Путь</th>
                <th class="text-center">Формат файла</th>
                <th class="text-center">Выберите файл</th>
              </tr>
            </thead>
            <tbody>   
              {if $allLogos}{foreach  item=logo from=$allLogos}
              <tr class="logo_{$logo.logoId}">
                <td><img id="preview" src="{$logo.logoUrl}" alt="" style="max-width: 200px;max-height: 100px;"></td>
                <td class="text-center">{$logo.logoName}</td>
                <td nowrap="nowrap">{$logo.logoUrl}</td>
                <td class="text-center">{$logo.logoType}</td>
                <td class="text-center" width="100%">
                  <form id="upload-image" action="logo.php" method="post" enctype="multipart/form-data">
                    <div class="col-md-6">
						  				<div class="form-group">
						  					<input class="fileinput btn-danger" type="file" name="image" id="image" title="{logo:add}">
						  					{foreach item=language from=$LANGUAGES}
						  					{if ($SITE_LANG eq $language.codename) || (!$SITE_LANG && $language.isDefault)}
						  					<input type="hidden" name="logo[lang]" value="{$language.codename}">
						  					{/if}{/foreach}
						  				</div>
						  		  </div>
                    <div class="col-md-6">
                      <input type="hidden" name="logo[logoId]" value="{$logo.logoId}">
                      <input type="submit" class="btn btn-primary" value="{logo:edit}">
                    </div>
                  </form>
                </td>
              </tr>
              {/foreach}
              {else}
              <tr class="odd">
                <td class="data none" colspan="6" align="center">
                  <form id="upload-image" action="logo.php" method="post" enctype="multipart/form-data">
		                <div class="col-md-6">
  		                <div class="form-group">
                        <input class="fileinput btn-danger" type="file" name="image" id="image" title="{logo:add}">
                        {foreach item=language from=$LANGUAGES}
                        {if ($SITE_LANG eq $language.codename) || (!$SITE_LANG && $language.isDefault)}
                        <input type="hidden" name="logo[lang]" value="{$language.codename}">
                        {/if}{/foreach}
                      </div>
                    </div>
                    <div class="col-md-6">
                      <input type="hidden" name="logo[logoId]" value="{$logo.logoId}">
											<input type="submit" class="btn btn-primary" value="{logo:upload}">
										</div>
								  </form>
								</td>
						  </tr>
              {/if}   
            </tbody>
          </table>
        </div>                                
      </div>
    </div>							
	</div>	
		
</div>

{include file="footer.tpl"}