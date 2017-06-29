<?php
	$i = 1;
	$n = count($items);
	foreach ($items as $delta => $item) :
		if($i < $n){
			print render($item).', ';
		} else	print render($item);   	
	    $i++;
	endforeach;
?>