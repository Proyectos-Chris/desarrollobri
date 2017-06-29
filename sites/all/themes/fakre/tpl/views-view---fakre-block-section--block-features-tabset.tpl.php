<?php
	global $base_url;
	$rows = trim ($rows);
	$rows = str_replace(' ', '', $rows);
	$rows = explode ( ',' , $rows);
	$i = 0;
	$l = count($rows) - 1;
	$img_style1 = 'image_348x345';
	$img_style2 = 'image_348x255';
	$img_style3 = 'image_348x455';
?>
<?php if($rows): ?>
<div class="onepage-tabset container">
	<div class="row">
		<div class="col-xs-12">
			<ul class="tabset-onepage list-inline">
			<?php for ($i=0; $i < $l; $i++) { 
				$nid = $rows[$i];
				$node = node_load($nid);
				$title = $node->title;
				$icon_class = $node->field_icon_class['und'][0]['value'];
				$k = $i + 1;
				if($i != 0) {
					print '<li><a href="#tab'.$k.'"><i class="fa '.$icon_class.'"></i>'.$title.'</a></li>';
				} else {
					print '<li class="active"><a href="#tab'.$k.'"><i class="fa '.$icon_class.'"></i>'.$title.'</a></li>';
				}
				
			} ?>
			</ul>
			<div class="tab-content onepage">
			<?php
				for ($i=0; $i < $l; $i++) {
				$nid = $rows[$i];
				$node = node_load($nid);
				$title = $node->title; 
				$options = array('absolute' => TRUE);
				$node_url = url('node/' . $node->nid, $options);
				if(isset($node->field_image) && !empty($node->field_image)) {
				$img_uri = $node->field_image['und'][0]['uri'];
				$img = file_create_url($img_uri);
				} else $img_uri = '';
				if($i%2 == 0) {
					$class_img = 'alignright';
				} else {
					$class_img = 'alignleft';
				}
				$k = $i + 1;
			?>
				<div id="tab<?php print $k; ?>">
					<div class="<?php print $class_img; ?>">
						<img src="<?php print $img; ?>" class="img-responsive" alt="<?php print $title; ?>" data-animate="fadeInUp" data-delay="300">
					</div>
					<!-- txt box -->
					<div class="txt-box">
						<h2>Things we offer</h2>
						<p>Suspendisse et metus eu massa lobortis condimentum sed ut orci. Nullam viverra dapibus risus, eu tristique nisl sollicitudin at. Etiam iaculis blandit libero. licitudin at. Etiam iaculis blandit libero. licitudin at. Etiam iaculis blandit libero. Fusce id lobortis orci. Proin tristique laoreet tempus.</p>
						<p>Suspendisse et metus eu massa lobortis condimentum sed ut orci. Nullam viverra dapibus risus, eu tristique nisl sollicitudin at. Etiam iaculis blandit libero. licitudin at. Etiam iaculis blandit libero</p>
						<a href="<?php print $node_url; ?>" class="btn btn-slider"><?php print t('READ MORE'); ?></a>
					</div>
				</div>
			<?php
			}
			?>
			</div>
		</div>
	</div>
</div>
<?php endif; ?>