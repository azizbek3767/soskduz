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

function smarty_modifier_make_snippet($string, $query = '', $maxLength = 400)
{
	if(preg_match_all("/\w+/", $query, $matches)) $query = implode(' ', $matches[0]);

	$reQuery = str_replace(' ', '\b|\b', preg_replace("/[^A-Za-z0-9]+/", ' ', $query));
	if(preg_match_all('/(.+?[\.\!\?]\s)/', $string, $matches)){
		$snippet = '';
		$sentences = array_map('trim', $matches[1]);
		$maxLength1 = ceil($maxLength / 2);
		$maxLength2 = ceil($maxLength / 2);
		$minLength1 = ceil($maxLength1 / 1.5);
		$minLength2 = ceil($maxLength2 / 1.5);

		/* first sentence */
		foreach($sentences as $sentence){
			$snippet = $snippet.' '.$sentence;
			$usedSentences[$sentence] = true;
			if(strlen($snippet) > (($minLength1 + $maxLength1) / 2)){
				if(strlen($snippet) > $maxLength1){
					$dotsAtTheEnd = true;
					$snippet = stringTruncate($snippet, $maxLength1);
				}
				break;
			}
		}
		
		/* the most query-filled sentence */
		foreach($sentences as $i=>$sentence){
			$popSentences[$sentence] = preg_match_all("/(\b$reQuery\b)/i", $sentence, $matches);
		}
		arsort($popSentences);
		foreach($popSentences as $sentence=>$pop){
			if(!empty($usedSentences[$sentence])) continue;
			$usedSentences[$sentence] = true;
			if(!empty($dotsAtTheEnd)){
 					$snippet = $snippet.' '.$sentence;
				$dotsAtTheEnd = false;
			}else{
 					$snippet = $snippet.' ... '.$sentence;
			}
			if(strlen($snippet) > (($minLength1 + $minLength2 + $maxLength1 + $maxLength2) / 2)){
				if(strlen($snippet) > ($maxLength1 + $maxLength2)) $snippet = stringTruncate($snippet, ($maxLength1 + $maxLength2));
				break;
			}
		}

		foreach($sentences as $i=>$sentence) $sentencePop[$sentence] = preg_match_all("/($reQuery)/i", $sentence, $matches);
		$string = $snippet;
	}
	return $string;
}

/* vim: set expandtab: */

?>