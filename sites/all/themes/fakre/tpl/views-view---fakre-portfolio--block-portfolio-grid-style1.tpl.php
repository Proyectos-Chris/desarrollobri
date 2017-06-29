<?php
	global $base_url;
	$rows = trim ($rows);
	$rows = str_replace(' ', '', $rows);
	$rows = explode ( ',' , $rows);
	$i = 0;
	$l = count($rows) - 1;
?>
<?php if($rows): ?>
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
			$img_url = image_style_url('image_480x480', $img_uri);
		} else $img_uri = '';
		if($i == 10 || $i == 11) {
			$class = 'hidden-sm hidden-md';
		} else {
			$class = '';
		}

		if ($i > 9) break;
		if ($i == 2 && $header){
	?>
		<div class="portfolio-text coll-3 hidden-sm hidden-md">
			<div class="box-holder">
				<div class="holder">
					<div class="frame">
						<div class="block">
							<?php print $header; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php } ?>
		<div class="portfolio-block coll-6 nospace <?php print $class; ?>">
			<!-- box -->
			<div class="box">
				<a href="<?php print $node_url; ?>" class="over">
					<div class="holder">
						<div class="frame">
							<div class="over-frame">
								<strong class="title"><?php print $title; ?></strong>
								<p><?php print $category; ?></p>
							</div>
						</div>
					</div>
				</a>
				<img src="<?php print $img_url; ?>" alt="<?php print $title; ?>" >
			</div>
		</div>
<?php } ?>
<?php endif; ?>