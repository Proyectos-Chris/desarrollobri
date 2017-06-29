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
	<div class="container-fluid padding-top-30 padding-bottom-60">
		<div class="row">
			<div class="col-xs-12 padding-right-zero">
				<div class="icotop-holder" id="work">
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
					if($i == 0 || ($i%3 == 0)) {
						$img_url = image_style_url($img_style1, $img_uri);
					} elseif ($i%3 == 1) {
						$img_url = image_style_url($img_style2, $img_uri);
					} else {
						$img_url = image_style_url($img_style3, $img_uri);
					}
				?>
					<div class="portfolio-block coll-5 style6">
						<!-- box -->
						<div class="box">
							<div class="img-box">
								<img src="<?php print $img_url; ?>" alt="<?php print $title; ?>" class="img-responsive">
								<div class="over">
									<a class="search lightbox" href="<?php print $img; ?>"><i class="fa fa-search"></i></a>
									<a class="link" href="<?php print $node_url; ?>"><i class="fa fa-link"></i></a>
								</div>
							</div>
							<div class="text-box">
								<h2 class="title text-left no-bg padding-zero margin-zero"><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
								<p class="text-left text-uppercase"><?php print $category; ?></p>
							</div>
						</div>
					</div>
				<?php } ?>	
				</div>
			</div>
		</div>
	</div>
	<div class="container text-center">
		<a class="btn btn-dark" href="<?php print $base_url; ?>/portfolio"><?php print t('VIEW ALL PORTFOLIO'); ?></a>
	</div>
<?php endif; ?>