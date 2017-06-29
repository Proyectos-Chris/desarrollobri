<?php
	global $base_url;
	$rows = trim ($rows);
	$rows = str_replace(' ', '', $rows);
	$rows = explode ( ',' , $rows);
	$i = 0;
	$l = count($rows) - 1;
	$img_style1 = 'image_960x960';
	$img_style2 = 'image_480x480';
	$img_style3 = 'image_960x480';
?>
<?php if($rows): ?>
	<div class="work-section padding-bottom-60">
	    <?php
		for ($i=0; $i < $l; $i++) {
			$nid = $rows[$i];
			$node = node_load($nid);
			$title = $node->title;
			$options = array('absolute' => TRUE);
			$node_url = url('node/' . $node->nid, $options);
			if(isset($node->field_images) && !empty($node->field_images)) {
				$img_uri = $node->field_images['und'][0]['uri'];
			} else $img_uri = '';
			if($i == 0) {
				$img_url = image_style_url($img_style1, $img_uri);
				$class = 'nospace coll-2';
			} elseif ($i == 3) {
				$img_url = image_style_url($img_style3, $img_uri);
				$class = 'nospace coll-2';
			} else {
				$img_url = image_style_url($img_style2, $img_uri);
				$class = 'coll-4 nospace';
			}
		?>
			<div class="portfolio-block <?php print $class; ?>">
				<!-- box -->
				<div class="box">
					<a href="<?php print $node_url; ?>" class="over">
						<div class="holder">
							<div class="frame">
								<div class="over-frame">
									<span class="plus">+</span>
									<strong class="title upper no-bg"><?php print $title; ?></strong>
								</div>
							</div>
						</div>
					</a>
					<img src="<?php print $img_url; ?>" alt="<?php print $title; ?>" class="img-responsive">
				</div>
			</div>
		<?php } ?>
	</div>
	<div class="text-center padding-bottom-60">
		<a class="btn btn-dark" href="<?php print $base_url; ?>/portfolio"><?php print t('VIEW OUR PORTFOLIO'); ?></a>
	</div>
<?php endif; ?>
