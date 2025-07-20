<?php
{foreach item=serialization key=variable from=$serializations}
${$variable} = {$serialization};
$smarty->assignByRef('{$variable}', ${$variable});
{/foreach}
?>