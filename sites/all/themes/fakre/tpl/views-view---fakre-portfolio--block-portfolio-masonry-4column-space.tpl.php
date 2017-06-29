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
	$name = 'portfolio_categories';
    $portfolio_voc = taxonomy_vocabulary_machine_name_load($name);
    $tree = taxonomy_get_tree($portfolio_voc->vid);
?>
<!-- isotop-nav -->
<ul id="work-filter" class="list-inline isotop-controls">
	<li class="active"><a href="#"><?php print t('All'); ?></a></li>
	<?php foreach ($tree as $term) { ?>
	<li><a data-filter=".<?php print $term->tid; ?>" href="#"><?php print $term->name; ?></a></li>
	<?php } ?>
</ul>
<?php if($rows): ?>
<div class="container padding-bottom-60">
	<div class="row">
		<div class="col-xs-12">
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
				<div class="portfolio-block coll-4 style6 <?php print $term->tid; ?>">
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
			<?php
				}
			?>
			</div>
		</div>
	</div>
</div>
<div class="container text-center">
	<a class="btn btn-dark" href="<?php print $base_url; ?>/portfolio?layout=default&style=grid6colsspace"><?php print t('VIEW ALL PORTFOLIO'); ?></a>
</div>
<?php endif; ?>