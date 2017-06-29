<?php print render($title_prefix); ?>
<?php
	global $base_url;
	$name = 'portfolio_categories';
    $portfolio_voc = taxonomy_vocabulary_machine_name_load($name);
    $tree = taxonomy_get_tree($portfolio_voc->vid);
?>
<div class="container">	
	<?php if ($header): ?>
	<header class="page-heading">
		<?php print $header; ?>
	</header>
	<?php endif; ?>
	 <!-- isotop controls4 -->
	<nav class="isotop-controls4 margin-bottom-60">
		<ul id="work-filter" class="list-inline">
			<li class="active"><a href="#"><?php print t('All'); ?></a></li>
				<?php foreach ($tree as $term) { ?>
				<li><a data-filter=".<?php print $term->tid; ?>" href="#"><?php print $term->name; ?></a></li>
				<?php } ?>
		</ul>
		<a href="<?php print $base_url; ?>/portfolio" class="view-all"><?php  print t('VIEW ALL'); ?></a>
	</nav>
</div>	
<?php if ($rows): ?>
<div class="icotop-holder" id="work">
<?php print $rows; ?>
</div>
<?php endif; ?>
