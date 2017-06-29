<?php
	global $base_url;
	$image_style1 = 'image_1920x440';
	$image_style2 = 'image_1170x600';
	$image_style3 = 'image_570x470';
	$image_style4 = 'image_675x675';
	$image_style5 = 'image_480x480';
	$image_style6 = 'image_675x337';
	$i = 0;
	if(isset($node->field_portfolio_layout) && !empty($node->field_portfolio_layout)) {
		$portfolio_layout = $node->field_portfolio_layout['und'][0]['value'];
	} else $portfolio_layout ='default';
	if(!empty($node->field_post_format)) {
		$post_format = $node->field_post_format['und'][0]['value'];
	} else $post_format = 'fa-file-text-o';
	if(!empty($node->field_images)) {
		$n = count($node->field_images['und']);
		$full_img = file_create_url($node->field_images['und'][0]['uri']);
	} else $n = 0;
?>
<?php if(!$page){ ?>
	<div class="col-xs-12 col-sm-4 portfolio">
		<!-- portfolio block nospace -->
		<div class="portfolio-block nospace">
			<!-- box -->
			<div class="box">
				<div class="over">
					<div class="holder">
						<div class="frame">
							<div class="over-frame">
								<strong class="title upper"><?php print $title; ?></strong>
								<p><?php print $node->field_portfolio_category['und'][0]['taxonomy_term']->name; ?></p>
							</div>
						</div>
					</div>
					<a href="<?php print $full_img; ?>" class="search lightbox"><i class="fa fa-search"></i></a>
					<a href="<?php print $node_url; ?>" class="link"><i class="fa fa-link"></i></a>
				</div>
				<img src="<?php print image_style_url($image_style5, $node->field_images['und'][0]['uri']) ?>" alt="<?php print $title; ?>">
			</div>
		</div>
	</div>
<?php } else { ?>
	<?php if ($post_format == 'fa-file-image-o'): ?>
		<div class="beans-slider" data-rotate="true">
			<div class="beans-mask">
				<div class="beans-slideset">
				<?php foreach ($node->field_images['und'] as $key => $value) {
				if ($portfolio_layout == 'default'){
					$image_url = image_style_url($image_style2, $node->field_images['und'][$key]['uri']);
				} else $image_url = image_style_url($image_style1, $node->field_images['und'][$key]['uri']);
				?>
				<div class="beans-slide">
					<div class="stretch">
						<img src="<?php print $image_url; ?>" alt="<?php print $title; ?>" >
					</div>
				</div>
				<?php } ?>
				</div>
			</div>
			<div class="arrow-holder">
				<div class="col-xs-12">
					<a href="#" class="btn-prev"><i class="fa fa-angle-left"></i></a>
					<a href="#" class="btn-next"><i class="fa fa-angle-right"></i></a>
				</div>
			</div>
		</div>
	<?php elseif ($post_format == 'fa-picture-o' && $n == 1): ?>
		<div class="beans-slider" data-rotate="true">
			<div class="beans-mask">
				<div class="beans-slideset">
					<div class="beans-slide">
						<div class="stretch">
						<?php
							$image_url = file_create_url($node->field_images['und'][0]['uri']);
						?>
							<img src="<?php print $image_url; ?>" alt="<?php print $title; ?>">
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php elseif ($post_format == 'fa-picture-o' && $n > 1 && $portfolio_layout == 'default'): ?>
	<div class="container padding-bottom-60">
		<div class="row">
		<?php foreach ($node->field_images['und'] as $key => $value) {
			if ($i > 3) break;
			$image_url = image_style_url($image_style3, $node->field_images['und'][$key]['uri']);
			$full_img = file_create_url($node->field_images['und'][$key]['uri']);
		?>
			<div class="portfolio-block coll-4 nospace">
				<!-- box -->
				<div class="box">
					<a href="<?php print $full_img; ?>" class="over lightbox">
						<div class="holder">
							<div class="frame">
								<div class="over-frame">
									<i class="fa fa-search"></i>
								</div>
							</div>
						</div>
					</a>
					<img src="<?php print $image_url; ?>" alt="<?php print $title; ?>" class="img-responsive">
				</div>
			</div>
		<?php
			$i++;
		}
		?>
		</div>
	</div>
	<?php elseif ($post_format == 'fa-picture-o' && $n > 1 && $portfolio_layout == 'fullwidth'): ?>
	<div class="margin-bottom-60 work-section">
	<?php foreach ($node->field_images['und'] as $key => $value) {
			if ($i > 3) break;
			if($i == 0){
				$image_url = image_style_url($image_style4, $node->field_images['und'][$key]['uri']);
				$class_box = 'coll-2';
			} elseif($i == 1 || $i == 2) {
				$image_url = image_style_url($image_style5, $node->field_images['und'][$key]['uri']);
				$class_box = 'coll-4';
			} else {
				$image_url = image_style_url($image_style6, $node->field_images['und'][$key]['uri']);
				$class_box = 'coll-2';
			}
			$full_img = file_create_url($node->field_images['und'][$key]['uri']);
		?>
		<div class="portfolio-block <?php print $class_box; ?> nospace">
			<!-- box -->
			<div class="box">
				<a href="<?php print $full_img; ?>" class="over lightbox">
					<div class="holder">
						<div class="frame">
							<div class="over-frame">
								<i class="fa fa-search"></i>
							</div>
						</div>
					</div>
				</a>
				<img src="<?php print $image_url; ?>" alt="<?php print $title; ?>" class="img-responsive">
			</div>
		</div>
	<?php
		$i++;
	}
	?>
	</div>
	<?php elseif ($post_format == 'fa-video-camera'): ?>
		<?php
		if(!empty($node->field_media_upload)) {
		$video_url = file_create_url($node->field_media_upload['und'][0]['uri']);
		$video_name = $node->field_media_upload['und'][0]['filename'];
		$arr = explode('.', $video_name);
		$k = count($arr) - 1;
		$file_type = $arr[$k];
		?>
		<div class="row">
			<div class="col-xs-12 video-area">
				<video width="100%" height="100%">
					<source src="<?php print $video_url; ?>" type="video/<?php print $file_type; ?>">
				</video>
			</div>
		</div>
		<?php
		} elseif (!empty($node->field_embedded_video)) { ?>
		<div class="row">
			<div class="col-xs-12 video-area">
			<?php
				print render($content['field_embedded_video']);
			?>
			</div>
		</div>
		<?php } ?>
	<?php elseif ($post_format == 'fa-file-audio-o' && !empty($node->field_media_upload)): ?>
		<?php $audio_url = file_create_url($node->field_media_upload['und'][0]['uri']) ;?>
		<div class="row padding-bottom-60">
			<div class="col-xs-12 audio-area">
				<audio controls>
					<source src="<?php print $audio_url; ?>" type="audio/mpeg">
					<?php print t('Your browser does not support the audio element.'); ?>
				</audio>
			</div>
		</div>
	<?php elseif ($post_format == 'fa-file-audio-o' && !empty($node->field_soundcloud_url)): ?>
		<div class="row padding-bottom-60">
			<div class="col-xs-12 audio-area">
				<?php print render($content['field_soundcloud_url']); ?>
			</div>
		</div>
	<?php else: ?>
	<?php endif; ?>
	<?php if ($portfolio_layout == 'default'): ?>
	<div class="row">
		<div class="col-xs-12 col-sm-6 col-md-8">
			<h3><?php print t('About the project'); ?></h3>
			<?php
				hide($content['links']);
				hide($content['field_tags']);
				hide($content['comments']);
				hide($content['field_portfolio_category']);
				hide($content['field_images']);
				hide($content['field_soundcloud_url']);
				hide($content['field_embedded_video']);
				hide($content['field_portfolio_layout']);
				hide($content['field_post_format']);
				hide($content['field_topic']);
				hide($content['field_style']);
				hide($content['field_social_network']);
				hide($content['field_client']);
				hide($content['field_media_upload']);
				print render($content);
			?>
		</div>
		<div class="col-xs-12 col-sm-6 col-md-4">
			<h3><?php print t('PROJECT INFO'); ?></h3>
			<ul>
				<li>
					<i class="fa fa-user"></i> <strong><?php print t('Client Name'); ?>:</strong> <?php if(!empty($node->field_client)) print $node->field_client['und'][0]['value']; ?>
				</li>
				<li>
					<i class="fa fa-calendar"></i> <strong><?php print t('Published Date'); ?>: </strong> <?php print format_date($created, 'custom', 'd M, Y') ?>
				</li>
				<li>
					<i class="fa fa-tags"></i> <strong><?php print t('Category'); ?>:</strong> <?php print render($content['field_portfolio_category']); ?>
				</li>
			</ul>
			<footer>
				<a href="#" class="btn btn-f-info"><?php print t('LAUNCH'); ?></a>
				<?php print render($content['field_social_network']); ?>
			</footer>
		</div>
	</div>
	<?php else: ?>
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-6 col-md-8">
				<h3><?php print t('About the project'); ?></h3>
				<?php
					hide($content['links']);
					hide($content['field_tags']);
					hide($content['comments']);
					hide($content['field_portfolio_category']);
					hide($content['field_images']);
					hide($content['field_soundcloud_url']);
					hide($content['field_embedded_video']);
					hide($content['field_portfolio_layout']);
					hide($content['field_post_format']);
					hide($content['field_topic']);
					hide($content['field_style']);
					hide($content['field_social_network']);
					hide($content['field_client']);
					hide($content['field_media_upload']);
					print render($content);
				?>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-4">
				<h3><?php print t('PROJECT INFO'); ?></h3>
				<ul>
					<li>
						<i class="fa fa-user"></i> <strong><?php print t('Client Name'); ?>:</strong> <?php if(!empty($node->field_client)) print $node->field_client['und'][0]['value']; ?>
					</li>
					<li>
						<i class="fa fa-calendar"></i> <strong><?php print t('Published Date'); ?>: </strong> <?php print format_date($created, 'custom', 'd M, Y') ?>
					</li>
					<li>
						<i class="fa fa-tags"></i> <strong><?php print t('Category'); ?>:</strong> <?php print render($content['field_portfolio_category']); ?>
					</li>
				</ul>
				<footer>
					<a href="#" class="btn btn-f-info"><?php print t('LAUNCH'); ?></a>
					<?php print render($content['field_social_network']); ?>
				</footer>
			</div>
		</div>
	</div>
	<?php endif; ?>
<?php } ?>