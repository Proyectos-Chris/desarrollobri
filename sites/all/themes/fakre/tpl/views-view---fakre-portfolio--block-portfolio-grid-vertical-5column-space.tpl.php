<?php print render($title_prefix); ?>
<?php
	$name = 'portfolio_categories';
	$portfolio_voc = taxonomy_vocabulary_machine_name_load($name);
    $tree = taxonomy_get_tree($portfolio_voc->vid);
?>	
<?php if ($rows): ?>
<div class="container-fluid">
	<div class="row">
		<div class="col-xs-12">
			<!-- isotop-nav -->
			<ul id="work-filter" class="list-inline isotop-controls3 leftalign">
				<li class="active"><a href="#"><?php print t('All'); ?></a></li>
				<?php foreach ($tree as $term) { ?>
				<li><a data-filter=".<?php print $term->tid; ?>" href="#"><?php print $term->name; ?></a></li>
				<?php } ?>
			</ul>
			<div class="icotop-holder margin-bottom-60" id="work">
				<?php print $rows; ?>
			</div>
		<?php if($pager): ?>
			<?php
				$old1 = '/<li class="pager-previous first"\>(.*?)<\/li\>/';
				$new1 = '&nbsp;';
				$old3 = '/<li class="pager-current">(.*?)<\/li\>/';
				$new3 = '&nbsp;';
				$pager = preg_replace($old1, $new1, $pager);
				$pager = preg_replace($old3, $new3, $pager);
				//$pager = str_replace($old2, $new2, $pager);
			?>
			<div class="text-center">
				<?php print $pager; ?>
			</div>
		<?php endif; ?>
		</div>
	</div>
</div>
<?php endif; ?>