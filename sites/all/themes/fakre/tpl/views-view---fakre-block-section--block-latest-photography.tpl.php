<?php

	$rows = trim ($rows);

	$rows = str_replace(' ', '', $rows);

	$rows = explode ( ',' , $rows);

	$i = 0;

	$l = count($rows) - 1;

	$img_style1 = 'image_830x832';

	$img_style2 = 'image_416x416';

	$img_style3 = 'image_830x416';

?>

<div class="<?php print $classes; ?>">

<?php if ($header): ?>

	<?php print $header; ?>

<?php endif; ?>

<?php if($rows): ?>

	<div class="row">

        <div class="col-xs-12">

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

				$class = 'coll-2 style3 nospace';

			} elseif ($i == 3) {

				$img_url = image_style_url($img_style3, $img_uri);

				$class = 'coll-2 style3 nospace hidden-sm hidden-md';

			} else {

				$img_url = image_style_url($img_style2, $img_uri);

				$class = 'coll-4 style3 nospace';

			}

		?>

			<div class="portfolio-block <?php print $class; ?>">

				<!-- box -->

				<div class="box">

					<div class="over">

						<div class="holder">

							<div class="frame">

								<div class="over-frame no-animate">

									<h2 class="heading"><?php print $title; ?></h2>

									<a href="<?php print $node_url; ?>" class="portfolio-view"><span><?php print t('VIEW ALL'); ?></span></a>

								</div>

							</div>

						</div>

					</div>

					<img src="<?php print $img_url; ?>" alt="<?php print $title; ?>" class="img-responsive">

				</div>

			</div>

		<?php } ?>

		</div>

	</div>

<?php endif; ?>

<?php if($pager): ?>

	<?php

		$old1 = '/<li class="pager-previous first"\>(.*?)<\/li\>/';

		$new1 = '';

		$old2 = 'next ›';

		$new2 = 'Load more';

		$old3 = '/<li class="pager-current">(.*?)<\/li\>/';

		$new3 = '';

		$pager = preg_replace($old1, $new1, $pager);

		$pager = preg_replace($old3, $new3, $pager);

		//$pager = str_replace($old2, $new2, $pager);

	?>

	<nav class="style2 text-center loadmore">

		<?php print $pager; ?>

	</nav>

<?php endif; ?>

</div>