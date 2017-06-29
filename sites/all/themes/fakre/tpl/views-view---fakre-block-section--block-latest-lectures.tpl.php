<?php print render($title_prefix); ?>
<?php global $base_url; ?>
<?php if ($header): ?>

	<header class="page-heading">

        <div class="heading">

			<?php print $header; ?>

		</div>

	</header>

<?php endif; ?>

<?php if ($rows): ?>

<?php

	$old1 = '<div class="col-xs-12 col-sm-6 first">';

	$new1 = '<div class="row"><div class="col-xs-12 col-sm-6 first">';

	$old2 = '<div class="row"><div class="col-xs-12 col-sm-6 first">';

	$new2 = '</div><div class="row"><div class="col-xs-12 col-sm-6 first">';

	$rows = str_replace($old1, $new1, $rows);

	$rows = trim(str_replace($old2, $new2, $rows));

	$rows = substr($rows, 6).'</div>';

?>

	<?php print $rows; ?>

<?php endif; ?>

<div class="row text-center padding-top-30">

	<a href="<?php print $base_url; ?>/services" class="btn btn-dark"><?php print t('VIEW ALL LECTURES') ?></a>

</div>