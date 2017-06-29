<?php print render($title_prefix); ?>
<?php if ($rows): ?>
<div class="work-section">
	<div class="beans-slider coll-2 pull-left">
		<div class="beans-mask">
			<div class="beans-slideset">
				<?php print $rows; ?>
			</div>
		</div>
		<div class="beans-pagination work-pagination"></div>
	</div>
<?php if($attachment_before): ?>
	<?php
	$attachment_before = trim ($attachment_before);
	$attachment_before = str_replace(' ', '', $attachment_before);
	$att_before = explode ( ',' , $attachment_before);
	$i = 0;
	$l = count($att_before) - 1;
	$img_style1 = 'image_480x480';
	$img_style2 = 'image_960x480';
	for ($i; $i < $l; $i++) {
		$nid = $att_before[$i];
		$node = node_load($nid);
		$title = $node->title;
		$term = taxonomy_term_load($node->field_portfolio_category['und'][0]['tid']);
		$category = $term->name;
		$options = array('absolute' => TRUE);
		$node_url = url('node/' . $node->nid, $options);
		if(isset($node->field_images) && !empty($node->field_images)) {
			$img_uri = $node->field_images['und'][0]['uri'];
		} else $img_uri = '';
		if($i == 0) {
			$img_url = image_style_url($img_style1, $img_uri);
			$class = 'coll-4 nospace';
		} elseif ($i == 1) {
			$img_url = image_style_url($img_style1, $img_uri);
			$class = 'coll-4 hidden-sm nospace';
		} else {
			$img_url = image_style_url($img_style2, $img_uri);
			$class = 'coll-2 hidden-sm nospace';
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
							<strong class="title"><?php print $title; ?></strong>
							<p><?php print $category; ?></p>
						</div>
					</div>
				</div>
			</a>
			<img src="<?php print $img_url; ?>" alt="<?php print $title; ?>" class="img-responsive">
		</div>
	</div>
	<?php
		if ($i > 2) break;
	}
	?>
<?php endif; ?>
</div>
<?php endif; ?>
<?php if($attachment_after): ?>
<div class="work-section">
	<?php
	$attachment_after = trim ($attachment_after);
	$attachment_after = str_replace(' ', '', $attachment_after);
	$att_after = explode ( ',' , $attachment_after);
	$i = 0;
	$l = count($att_after) - 1;
	$img_style1 = 'image_480x480';
	$img_style2 = 'image_960x480';
	for ($i; $i < $l; $i++) {
		$nid = $att_after[$i];
		$node = node_load($nid);
		$title = $node->title;
		$term = taxonomy_term_load($node->field_portfolio_category['und'][0]['tid']);
		$category = $term->name;
		$options = array('absolute' => TRUE);
		$node_url = url('node/' . $node->nid, $options);
		if(isset($node->field_images) && !empty($node->field_images)) {
			$img_uri = $node->field_images['und'][0]['uri'];
		} else $img_uri = '';
		if($i == 0) {
			$img_url = image_style_url($img_style2, $img_uri);
			$class = 'coll-2 hidden-sm nospace';
		} else {
			$img_url = image_style_url($img_style1, $img_uri);
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
							<strong class="title"><?php print $title; ?></strong>
							<p><?php print $category; ?></p>
						</div>
					</div>
				</div>
			</a>
			<img src="<?php print $img_url; ?>" alt="<?php print $title; ?>" class="img-responsive">
		</div>
	</div>
	<?php
		if ($i > 2) break;
	}
	?>
</div>
<?php endif; ?>