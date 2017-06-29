<?php

	$field = field_info_field('field_categories');

	$allowed_values = list_allowed_values($field);

	$i = 0;

	$query = new EntityFieldQuery();

	$result = $query->entityCondition('entity_type', 'node')

	->entityCondition('bundle', 'real_estate')

	->propertyCondition('status', 1)

	->propertyOrderBy('created', 'DESC')

	->execute();

	$nodes = node_load_multiple(array_keys($result['node']));

	$tabs = array();

	$j = array();

	foreach ($allowed_values as $key => $value) {

		$j[$key]= 0;

		$tabs[$key] = '';

	}

	foreach ($nodes as $key => $value) {

		$title = $nodes[$key]->title;

		$nodeurl = url('node/'. $nodes[$key]->nid);

		if($nodes[$key]->field_district['und']) {

			$district = $nodes[$key]->field_district['und'][0]['value'];

		} else {

			$district = '';

		}

		$price = $nodes[$key]->field_price['und'][0]['value'];		

		$imguri = $nodes[$key]->field_image['und'][0]['uri'];

		$full_img = file_create_url($imguri);

		$thumb_img = image_style_url('image_270x270', $imguri);

		$cat = $nodes[$key]->field_categories['und'][0]['value'];

		if ($j[$cat]%4 == 0) {

			$class = 'first';

		} elseif ($j[$cat] !=0 && $j[$cat]%3 == 0) {

			$class = 'last';

		} else {

			$class = '';

		}

		$tabs[$cat] .= '<div class="box '.$class.'">';

		$tabs[$cat] .= '<div class="img-box"><div class="over"><div class="frame">';

		$tabs[$cat] .= '<div class="block"><a href="'.$nodeurl.'" class="view"><i class="fa fa-eye"></i></a>';

		$tabs[$cat] .= '<a href="'.$full_img.'" class="expand lightbox"><i class="fa fa-expand"></i></a></div></div></div>';

		$tabs[$cat] .= '<img src="'.$thumb_img.'" alt="'.$nodes[$key]->field_image['und'][0]['alt'].'"></div>';

		$tabs[$cat] .= '<div class="text-box"><div class="txt">';

		$tabs[$cat] .= '<h2>'.$title.'</h2><p>'.$district.'</p></div><div class="txt2"><h2>'.$title.'</h2><p>'.$district.'</p></div></div><span class="price"><span class="add">$</span>'.$price.'</span></div>';

		$j[$cat]++;

	}

	foreach ($allowed_values as $key => $value) {

		$old = '<div class="box first">';

		$new = '<div class="beans-slide"><div class="box first">';

		$old1 = '<div class="beans-slide"><div class="box first">';

		$new1 = '</div><div class="beans-slide"><div class="box first">';

		$tabs[$key] = str_replace($old, $new, $tabs[$key]);

		$tabs[$key] = str_replace($old1, $new1, $tabs[$key]);

		$tabs[$key] = trim($tabs[$key]);

		$tabs[$key] = substr($tabs[$key], 6).'</div>';

		

	}

?>

<?php print render($title_prefix); ?>

<div class="container">

	<?php if ($header): ?>

	<header class="page-heading color-stack style2">

		<?php print $header; ?>

	</header>

	<?php endif; ?>

	<?php if ($rows): ?>

	<div class="row">

		<div class="col-xs-12">

			<!-- isotop controls4 -->

			<nav class="isotop-controls4 no-bg margin-bottom-30">

				<ul class="list-inline tabset margin-bottom-10">

				<?php foreach ($allowed_values as $key => $value) {

					$slide = '<div id="'.$key.'"><div class="beans-slider">';

					$slide .= '<a href="#" class="btn-prev"><i class="fa fa-angle-left"></i></a>';

					$slide .= '<a href="#" class="btn-next"><i class="fa fa-angle-right"></i></a>';

					$slide .= '<div class="beans-mask"><div class="beans-slideset">';

					$tabs[$key] = $slide.$tabs[$key].'</div></div></div></div>';

					if ($i == 0) {

						print '<li class="active"><a href="#'.$key.'">'.$allowed_values[$key].'</a></li>';

					} else {

						print '<li><a href="#'.$key.'">'.$allowed_values[$key].'</a></li>';

					}

					$i++;

				} ?>

				</ul>

			</nav>

			<div class="tab-content">

			<?php

			foreach ($allowed_values as $key => $value) {

				print $tabs[$key];

			}

			?>

			</div>

		</div>

	</div>

	<?php endif; ?>

</div>