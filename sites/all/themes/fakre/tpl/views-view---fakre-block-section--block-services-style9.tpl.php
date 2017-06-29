<?php if($header): ?>
	<?php print $header; ?>
<?php endif; ?>
<?php
	if($rows):
		$rows = str_replace('<div class="col-xs-12 col-sm-4 coll first">', '</div><div class="row"><div class="col-xs-12 col-sm-4 coll first">', $rows);
		$rows = trim($rows);
		$rows = substr($rows, 6);
		print $rows;
	endif;

?>