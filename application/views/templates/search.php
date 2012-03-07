<?php

/*
Basic validation to check if empty field was searched for, so we can return results, or homepage accordingly
*/ 

if ( $this->input->post('tag') !== false )
{
$tag = $this->input->post('tag'); 
return $tag;
}

return false;


?>
