<?php
	global $base_url;
	$rows = trim ($rows);
	$rows = str_replace(' ', '', $rows);
	$rows = explode ( ',' , $rows);
	$i = 0;
	$l = count($rows) - 1;
	$img_style1 = 'image_960x960';
	$img_style2 = 'image_960x480';
	$name = 'portfolio_categories';
    $portfolio_voc = taxonomy_vocabulary_machine_name_load($name);
    $tree = taxonomy_get_tree($portfolio_voc->vid);
    $slider = '<div class="beans-slider coll-2 work-design"><div class="beans-mask"><div class="beans-slideset">';
    $noslider = '';
?>
<!-- isotop-nav -->
<ul id="work-filter" class="list-inline isotop-controls">
	<li class="active"><a href="#"><?php print t('All'); ?></a></li>
	<?php foreach ($tree as $term) { ?>
	<li><a data-filter=".<?php print $term->tid; ?>" href="#"><?php print $term->name; ?></a></li>
	<?php } ?>
</ul>
<?php if($rows): ?>
<div class="icotop-holder margin-bottom-60" id="work">
<?php
	for ($i=0; $i < $l; $i++) {
		$nid = $rows[$i];
		$node = node_load($nid);
		$title = $node->title;
		$term = taxonomy_term_load($node->field_portfolio_category['und'][0]['tid']);
		$category = $term->name;
		$options = array('absolute' => TRUE);
		$node_url = url('node/' . $node->nid, $options);
		if(isset($node->field_images) && !empty($node->field_images)) {
			$img_uri = $node->field_images['und'][0]['uri'];
			$img = file_create_url($img_uri);
		} else $img_uri = '';
		if($i < 3) {
			$img_url = image_style_url($img_style1, $img_uri);
			$slider .= '<div class="beans-slide"><div class="portfolio-block nospace"><div class="box"><div class="box-holder"><a href="'.$node_url.'" class="over"><div class="holder"><div class="frame"><div class="over-frame"><span class="plus">+</span><strong class="title">'.$title.'</strong><p>'.$category.'</p></div></div></div></a></div>';
			$slider .= '<div class="stretch"><img src="'.$img_url.'" alt="'.$title.'"></div></div></div></div>';
		} else {
			$img_url = image_style_url($img_style2, $img_uri);
			$noslider .= '<div class="portfolio-block coll-2 nospace '.$term->tid.'"><div class="box"><div class="box-holder half"><a href="'.$node_url.'" class="over"><div class="holder"><div class="frame"><div class="over-frame"><span class="plus">+</span><strong class="title">'.$title.'</strong><p>'.$category.'</p></div></div></div></a></div>';
			$noslider .= '<div class="stretch"><img src="'.$img_url.'" alt="'.$title.'"></div></div></div>';
		}
	}
	$slider .= '</div></div><div class="work-pagination beans-pagination"></div></div>';
	print $slider.$noslider.'</div>';
?>
</div>
<?php endif; ?>
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
