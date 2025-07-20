<?php
	error_reporting(0);

	if(!isset($_GET['path']) || !isset($_GET['rewrite'])){
		header( "HTTP/1.1 400 Bad Request" );
		die('<html><body><h1>HTTP 400 - Bad Request (parameters)</h1></body></html>');
	}

	require_once('includes/settings-array.inc.php');

	$path    = $_GET['path'];
	$rewrite = $_GET['rewrite'];

	$path   = realpath($path);
	$myPath = realpath(dirname(__FILE__));

	if($rewrite !== $config['rewrite']){
		header( "HTTP/1.1 400 Bad Request" );
		die('<html><body><h1>HTTP 400 - Bad Request (rewrite)</h1></body></html>');
	}
	if($path === false){
		header('HTTP/1.0 404 Not Found');
		die('<html><body><h1>HTTP 404 - Not Found (path)</h1></body></html>');
	}
	if(strpos($path, $myPath) === false){
		header( "HTTP/1.1 400 Bad Request" );
		die('<html><body><h1>HTTP 400 - Bad Request (path)</h1></body></html>');
	}
	if(preg_match('~\.js$~', $path)){
		$contentType = 'application/x-javascript';
	} elseif(preg_match('~\.css$~', $path)) {
		$contentType = 'text/css';
	} else {
		header( "HTTP/1.1 400 Bad Request" );
		die('<html><body><h1>HTTP 400 - Bad Request (file type)</h1></body></html>');
	}

	if(is_file($path)){
		$fileLastModified = filemtime($path);
		$fileLastModifiedGMTDate = gmdate('D, d M Y H:i:s \G\M\T', $fileLastModified);
		$etag = md5($fileLastModified);
		header('ETag: "'.$etag.'"');

		if(httpMatchModified($fileLastModifiedGMTDate) || httpMatchEtag($etag)){
			header("HTTP/1.0 304 Not Modified");
			exit;
		}

		header('Content-Type: '.$contentType);
		header('Last-Modified: '.$fileLastModifiedGMTDate);
		header('Expires: '.gmdate('D, d M Y H:i:s \G\M\T', $fileLastModified + 300 * 24 * 60 * 60)); // 300 days
		header('Cache-Control: must-revalidate, proxy-revalidate');

		if(strpos($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip' ) !== false){
			$gzPath = 'temp/compress/'.md5($path).'.gz';
			if(!file_exists($gzPath) || (filemtime($gzPath) < $fileLastModified)){
				$inFileSize = filesize($path);
				$inFile = fopen($path, 'rb');
				$outFile = gzopen($gzPath, 'wb');
				$readSize = 0;
				while ($readSize < $inFileSize) {
					$block = fread($inFile, 8192);
					gzwrite($outFile, $block, 8192);
					$readSize += 8192;
				}
				fclose($inFile);
				gzclose($outFile);
			}
			header('Content-Encoding: gzip');
			header('Content-Length: '.filesize($gzPath));
			readfile($gzPath);
			exit;
		} else {
			header('Content-Length: '.filesize($path));
			readfile($path);
			exit;
		}

  echo $path;
	} else {
		header('HTTP/1.0 404 Not Found');
		die('<html><body><h1>HTTP 404 - Not Found</h1></body></html>');
	}

	function httpMatchModified($fileLastModified){
		if(isset($_SERVER['HTTP_IF_MODIFIED_SINCE']) && (strtotime($fileLastModified) <= strtotime($_SERVER['HTTP_IF_MODIFIED_SINCE']))) return true;
		return false;
	}

	function httpMatchEtag($etag){
		if(isset($_SERVER['HTTP_IF_NONE_MATCH']) && ($etag == $_SERVER['HTTP_IF_NONE_MATCH'])) return true;
		return false;
	}
?>
