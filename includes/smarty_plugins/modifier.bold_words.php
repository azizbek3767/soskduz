<?php

function smarty_modifier_bold_words($string, $words = '', $limit = -1)
{
	print_r($words);
	if(preg_match_all("/\w+/", $words, $matches)){
		foreach($matches[0] as $word) $string = preg_replace("/\b($word)\b/i", "<b>$1</b>", $string, $limit);
	}
	
	return $string;
}

/* vim: set expandtab: */

?>
