<?php print render($title_prefix); ?>

<?php if ($header): ?>

<header class="page-heading small">

    <div class="heading">

		<?php print $header; ?>

	</div>

</header>

<?php endif; ?>

<?php if ($rows): ?>

<?php

	$old1 = '<div class="col-xs-12 col-sm-6 right">';

	$new1 = '</div><div class="row"><div class="col-xs-12 col-sm-6 right">';

	$rows = str_replace($old1, $new1, $rows);

	$rows = trim($rows);

	$rows = substr($rows, 6).'</div>';

?>

	<?php print $rows; ?>

<?php endif; ?>

