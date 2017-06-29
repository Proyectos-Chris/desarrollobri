<?php print render($title_prefix); ?>
<?php
	global $base_url;
	$name = 'portfolio_categories';
    $portfolio_voc = taxonomy_vocabulary_machine_name_load($name);
    $tree = taxonomy_get_tree($portfolio_voc->vid);
?>
<div class="container">
	<div class="row">
		<div class="col-xs-12">
		<?php if ($header): ?>
			<header class="page-heading">
				<?php print $header; ?>
			</header>
		<?php endif; ?>
		<!-- isotop-nav -->
			<ul id="work-filter" class="list-inline isotop-controls">
				<li class="active"><a href="#"><?php print t('All'); ?></a></li>
				<?php foreach ($tree as $term) { ?>
				<li><a data-filter=".<?php print $term->tid; ?>" href="#"><?php print $term->name; ?></a></li>
				<?php } ?>
			</ul>
		</div>
	</div>
</div>
<?php if ($rows): ?>
<div class="icotop-holder padding-bottom-60" id="work">
<?php print $rows; ?>
</div>
<div class="container text-center">
	<a class="btn btn-dark" href="<?php print $base_url; ?>/portfolio"><?php print t('VIEW OUR PORTFOLIO'); ?></a>
</div>
<?php endif; ?>
