<?php
  include('../includes/admin.inc.php');
	if($adminUser['accessLevel'] != 'developer') die(lang('general:accessIsDenied'));
  
  $action = getRequestVar('action');

  $allowed_extensions = array ("tpl", "css", "js");
  
  function clear_url_dir($var) {
  	if ( is_array($var) ) return "";

  	$var = str_replace(chr(0), '', $var);
  	$var = str_ireplace( ".php", "", $var );
  	$var = str_ireplace( ".php", ".ppp", $var );
  	$var = trim( strip_tags( $var ) );
  	$var = str_replace( "\\", "/", $var );
  	$var = preg_replace( "/[^a-z0-9\/\_\-]+/mi", "", $var );
  	return $var;
  
  }

if(!empty($_POST['action']) && $_POST['action'] == "save") {

	$_POST['file'] = trim(str_replace( "..", "", urldecode($_POST['file']) ));
	
	if(!$_POST['file']) { die ("error"); }
	
	$url = @parse_url ( $_POST['file'] );

	$root = GLOBAL_ROOT . "/themes/".$config['theme'];
	$file_path = dirname (clear_url_dir($url['path']));
	$file_name = pathinfo($url['path']);
	$file_name = totranslit($file_name['basename'], false, true);

	$type = explode( ".", $file_name );
	$type = totranslit( end( $type ) );
	
	if(!in_array( $type, $allowed_extensions ) ) die ("error");

	if(!file_exists($root.$file_path."/".$file_name) ) die ("error");

	if(!is_writable($root.$file_path."/".$file_name)) { echo lang('templates:error:7'); die (); }

	if( function_exists( "get_magic_quotes_gpc" ) && get_magic_quotes_gpc() ) $_POST['content'] = stripslashes( $_POST['content'] );

	$handle = fopen( $root.$file_path."/".$file_name, "w" );
	fwrite( $handle, $_POST['content'] );
	fclose( $handle );

	if ($type == "css" OR $type == "js") {

		$fdir = opendir( GLOBAL_ROOT . '/temp/compress/' );
		while ( $file = readdir( $fdir ) ) {
			if( $file != '.' and $file != '..' and $file != '.htaccess' ) {
				@unlink( GLOBAL_ROOT . '/temp/compress/' . $file );
			
			}
		}
	}

	print($messages['saved'] = true);

} elseif(!empty($_POST['load']) && $_POST['load'] == "load"){

	$_POST['file'] = trim(str_replace( "..", "", urldecode($_POST['file']) ));
	
	if(!$_POST['file']) { die ("Ошибка"); }
	
	$url = @parse_url ( $_POST['file'] );

	$root = GLOBAL_ROOT . "/themes/".$config['theme'];
	$file_path = dirname (clear_url_dir($url['path']));
	$file_name = pathinfo($url['path']);
	$file_name = totranslit($file_name['basename'], false, true);

	$type = explode( ".", $file_name );
	
	$type = totranslit( end( $type ) );
	
	if ( !in_array( $type, $allowed_extensions ) ) die ("error");

	if( !file_exists($root.$file_path."/".$file_name) ) die ("error");

	$content = @htmlspecialchars( file_get_contents( $root.$file_path."/".$file_name ), ENT_QUOTES, $config['charset'] );

	echo "<h5>".lang('templates:fileEditing').": ".$file_path."/".$file_name . "</h5>";

	if(!is_writable($root.$file_path."/".$file_name)) echo " <span style=\"color:red;\">".lang('templates:error:7')."</span>";

  $script= "";

	if ($type == "tpl") {
		$script= <<<HTML
      <script>
        var editor = CodeMirror.fromTextArea(document.getElementById('file_text'), {
          mode: "htmlmixed",
          lineNumbers: true,
          dragDrop: false,
          indentUnit: 4,
          indentWithTabs: false,
          extraKeys: {
            "Tab": function(cm){
              cm.replaceSelection("  " , "end");
            }
           }
        });
      </script>
HTML;
  }

	if ($type == "css") {
		$script= <<<HTML
<script>
  var editor = CodeMirror.fromTextArea(document.getElementById('file_text'), {
    indentUnit: 4,
    lineNumbers: true,
    dragDrop: false,
    mode: "css"
  });
</script>
HTML;

	}

	if ($type == "js") {
		$script= <<<HTML
    <script>
      var editor = CodeMirror.fromTextArea(document.getElementById('file_text'), {
        lineNumbers: true,
        matchBrackets: true,
        indentUnit: 4,
        dragDrop: false,
        mode: "javascript"
        });
</script>
HTML;

	}
		echo <<<HTML
<div style="border: solid 1px #BBB;width:100%;height:475px;"><textarea style="width:100%;height:475px;" name="file_text" id="file_text" wrap="off">{$content}</textarea></div>
<div style="padding:5px;">
<button type="button" class="btn btn-primary" onclick="savefile('{$file_path}/{$file_name}')"><i class="fa fa-floppy-o position-left"></i> &nbsp; Сохранить</button></div>
{$script}
HTML;
  
} else {


  $root = GLOBAL_ROOT . "/themes/".$config['theme'];
  $_POST['dir'] = clear_url_dir(urldecode($_POST['dir']));	
  $postDir = rawurldecode($root.(isset($_POST['dir']) ? $_POST['dir'] : null ));


  if( file_exists($postDir) ) {
    $files		= scandir($postDir);
    $returnDir	= substr($postDir, strlen($root));

    natcasesort($files);

    if( count($files) > 2 ) {
      echo "<ul class='jqueryFileTree'>";
      foreach( $files as $file ) {
        if( file_exists($postDir . $file) && $file != '.' && $file != '..' && is_dir($postDir . $file) && $file != 'img' && $file != 'fonts' ) {
					echo "<li class=\"directory collapsed\"><a rel=\"" . htmlentities($_POST['dir'] . $file) . "/\">" . htmlentities($file) . "</a></li>";
				}
		  }
		
      foreach( $files as $file ) {
			  $htmlRel	= htmlentities($returnDir . $file,ENT_QUOTES);
        $htmlName	= htmlentities($file);
        $ext		  = preg_replace('/^.*\./', '', $file);

        if( file_exists($postDir . $file) && $file != '.' && $file != '..' && !is_dir($postDir. $file) ) {
				  if ( in_array( $ext, $allowed_extensions ) ){
						echo "<li class='file ext_$ext'><a rel='" . htmlentities($_POST['dir'] . $file) . "'>" . htmlentities($file) . "</a></li>";
				  }
				}
      }

      echo "</ul>";
	  }
	}
}


	if(!empty($errors)) $smarty->assign('errors', $errors);
	if(!empty($messages)) $smarty->assign('messages', $messages);


