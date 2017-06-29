<?php

/**

 * @file

 * Default theme implementation to display a node.

 */

	

	global $base_root, $base_url;

	$user = user_load($uid); // Make sure the user object is fully loaded

	$display_name = field_get_items('user', $user, 'field_display_name');

	$job = field_get_items('user', $user, 'field_job');

	$about = field_get_items('user', $user, 'field_about');

	$tags_link = '';
	$tags = '';
	$options = array('absolute' => TRUE);

	if(!empty($node->field_tags)) {

		$count = count($node->field_tags['und']) - 1;
		$t = 0;
		foreach ($node->field_tags['und'] as $key => $value) {
			$tag_id = $node->field_tags['und'][$key]['tid'];
			$term = taxonomy_term_load($tag_id);
			$tag_name = $term->name;
			if($t<$count) {
				$tags_link .= '<a href="'.url('taxonomy/term/' . $tag_id, $options).'">'.$tag_name.'</a>, ';
			} else {
				$tags_link .= '<a href="'.url('taxonomy/term/' . $tag_id, $options).'">'.$tag_name.'</a>';
			}
			$t++;
		}

	}

	$img_style1 = 'image_563x383';

	$img_style2 = 'image_1170x480';

	$img_style3 = 'image_416x416';

	if (isset($_GET['style'])) {

		$layout_style = $_GET['style'];

	} else $layout_style = theme_get_setting('blog_layout_style', 'fakre');

	if(empty($layout_style)) $layout_style = 'alt_default';

	if(arg(0) == 'taxonomy') $layout_style = 'alt_default';

	if(!empty($node->field_post_format)) {

		$post_format = $node->field_post_format['und'][0]['value'];

	} else $post_format = 'fa-file-text-o';

	if(isset($node->field_post_layout) && !empty($node->field_post_layout)) {

		$post_layout = $node->field_post_layout['und'][0]['value'];

	} else $post_layout = 'default';

	$create_day = format_date($node->created, 'custom', 'd');

	$create_month = format_date($node->created, 'custom', 'M');

	$summary = $node->body['und'][0]['summary'];

	if(!empty($node->field_images)) {

		$n = count($node->field_images['und']);

		$full_img = file_create_url($node->field_images['und'][0]['uri']);

	} else $n = 0;

	if($layout_style == 'grid2colsspace') {

		$class_article = 'blog-post-v1 style5 item';

	} elseif($layout_style == 'grid2colsnospace') {

		$class_article = 'blog-post-v1 style5 item nospace';

	} elseif ($layout_style == 'grid3colsspace' || $layout_style == 'gridfullwidthspace' || $layout_style == 'gridfullwidthnospace') {

		$class_article = 'blog-post-v1 style3 item';

	} elseif ($layout_style == 'grid3colsnospace') {

		$class_article = 'blog-post-v1 style3 item nospace';

	} elseif ($layout_style == 'grid4colsspace') {

		$class_article = 'blog-post-v1 style6 item';

	} elseif ($layout_style == 'grid4colsnospace') {

		$class_article = 'blog-post-v1 style6 item nospace';

	} elseif ($layout_style == 'masonry2colsspace') {

		$class_article = 'blog-post-v1 style5';

	} elseif ($layout_style == 'alt_default' || $layout_style == 'alt_default_leftsidebar' || $layout_style == 'alt_default_rightsidebar') {

		$class_article = 'blog-post-v1 style2';

		$img_style1 = 'image_570x420';

		$tags = '<li><i class="fa fa-tags"></i>'.$tags_link.'</li>';

	} elseif ($layout_style == 'alt2_default' || $layout_style == 'alt2_default_leftsidebar' || $layout_style == 'alt2_default_rightsidebar') {

		$class_article = 'blog-post-v1 style2 alt2';

		$img_style1 = 'image_570x420';

		$tags = '<li><i class="fa fa-tags"></i>'.$tags_link.'</li>';

	}



	$noimage = base_path().drupal_get_path('theme', 'fakre').'/images/noimage3.jpg';

	

?>

<?php if(!$page){ ?>

	<?php if($layout_style == 'grid2colsspace' || $layout_style == 'grid2colsnospace' || $layout_style == 'grid3colsspace' || $layout_style == 'grid3colsnospace' || $layout_style == 'grid4colsspace' || $layout_style == 'grid4colsnospace' || $layout_style == 'gridfullwidthspace' || $layout_style == 'gridfullwidthnospace' || $layout_style == 'alt_default' || $layout_style == 'alt_default_leftsidebar' || $layout_style == 'alt_default_rightsidebar' || $layout_style == 'alt2_default' || $layout_style == 'alt2_default_leftsidebar' || $layout_style == 'alt2_default_rightsidebar'): ?>

	<article class="<?php print $class_article; ?>">

	<?php if ($post_format == 'fa-file-image-o'): ?>

		<div class="img-box">

			<!-- beans-slider -->

			<div class="beans-slider" data-rotate="true">

				<div class="beans-mask">

					<div class="beans-slideset">

						<?php foreach ($node->field_images['und'] as $key => $value) {

							$image_url = image_style_url($img_style1, $node->field_images['und'][$key]['uri']);

						?>

						<div class="beans-slide">

							<a href="<?php print $node_url; ?>"><img src="<?php print $image_url; ?>" alt="<?php print $title; ?>" class="img-responsive"></a>

						</div>

						<?php } ?>

					</div>

				</div>

				<?php if ($n > 1): ?>

				<div class="beans-pagination"></div>

				<?php endif; ?>

			</div>

		</div>

	<?php elseif ($post_format == 'fa-picture-o' && $n >= 1): ?>

		<?php $image_url = image_style_url($img_style1, $node->field_images['und'][0]['uri']); ?>

		<!-- img-box -->

		<div class="img-box">

			<a href="<?php print $node_url; ?>"><img src="<?php print $image_url; ?>" alt="<?php print $title; ?>" class="img-responsive"></a>

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

		<div class="img-box video-area">

			<video width="100%" height="100%">

				<source src="<?php print $video_url; ?>" type="video/<?php print $file_type; ?>">

			</video>

		</div>

		<?php

		} elseif (!empty($node->field_embedded_video)) { ?>

		<div class="img-box video-area">

		<?php

			$video = $node->field_embedded_video['und'][0]['video_url'];

			if (strpos($video, 'youtube')) {

			$video_url = str_replace('watch?v=', 'embed/', $video);

			print '<embed src="'.$video_url.'">';

			} elseif (strpos($video, 'vimeo')) {

			$arr = explode('/', $video);

			$k = count($arr) - 1;

			$video_id = $arr[$k];

			print '<iframe src="//player.vimeo.com/video/'.$video_id.'" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>';

			} else print 'Video not support. Provide the URL of the video you"d like to embed from a supported provider (i.e Vimeo or Youtube )';

		?>

		</div>

		<?php } ?>

	<?php elseif ($post_format == 'fa-file-audio-o' && !empty($node->field_media_upload)): ?>

		<?php $audio_url = file_create_url($node->field_media_upload['und'][0]['uri']) ;?>

		<div class="img-box audio-area">

			<a href="<?php print $node_url; ?>"><img src="<?php print $noimage; ?>" alt="<?php print $title; ?>" class="img-responsive"></a>

			<audio controls>

				<source src="<?php print $audio_url; ?>" type="audio/mpeg">

				<?php print t('Your browser does not support the audio element.'); ?>

			</audio>

		</div>

	<?php elseif ($post_format == 'fa-file-audio-o' && !empty($node->field_soundcloud_url)): ?>

		<div class="img-box audio-area">

			<?php

				$url = $node->field_soundcloud_url['und'][0]['url'];

				//Get the JSON data of song details with embed code from SoundCloud oEmbed

				$getValues=file_get_contents('http://soundcloud.com/oembed?format=js&url='.$url.'&iframe=true');

				//Clean the Json to decode

				$decodeiFrame=substr($getValues, 1, -2);

				//json decode to convert it as an array

				$jsonObj = json_decode($decodeiFrame);

				//Change the height of the embed player if you want else uncomment below line

				// echo $jsonObj->html;

				//Print the embed player to the page

				echo str_replace('height="420"', 'height="383"', $jsonObj->html);

			?>

		</div>



	<?php else: ?>

		<!-- img-box -->

		<div class="img-box">

			<a href="<?php print $node_url; ?>"><img src="<?php print $noimage; ?>" alt="<?php print $title; ?>" class="img-responsive"></a>

		</div>

	<?php endif; ?>

		<!-- blog-txt -->

		<div class="blog-txt">

			<h2><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>

			

			<?php if($layout_style == 'grid3colsspace' || $layout_style == 'grid3colsnospace' || $layout_style == 'gridfullwidthnospace' || $layout_style == 'alt2_default_rightsidebar' || $layout_style == 'alt2_default_leftsidebar'): ?>

				<p><?php print trim_text($summary, 120); ?></p>

			<?php elseif ($layout_style == 'grid4colsspace' || $layout_style == 'grid4colsnospace'): ?>

				<p><?php print trim_text($summary, 100); ?></p>

			<?php else: ?>

				<p><?php print $summary; ?></p>

			<?php endif; ?>

			<?php if($layout_style == 'alt_default_leftsidebar' || $layout_style == 'alt_default_rightsidebar'): ?>

			<?php else: ?>

			<a href="<?php print $node_url; ?>" class="more">[ <?php print 'LEER MÁS'; ?> ]</a>

			<?php endif; ?>

			<!-- box-holder -->

			<div class="box-holder">

				

				<time>

				<span class="add"><?php print $create_day; ?></span><?php print $create_month; ?>

				</time>

			</div>

		</div>

	</article>

	<?php endif; ?>

<?php } else { ?>

	<article class="blog-post-v1 style-full single">

	<?php if ($post_format == 'fa-file-image-o' && $post_layout != 'fullwidth'): ?>

		<div class="img-box">

			<!-- beans-slider -->

			<div class="beans-slider" data-rotate="true">

				<div class="beans-mask">

					<div class="beans-slideset">

						<?php foreach ($node->field_images['und'] as $key => $value) {

							$image_url = image_style_url($img_style2, $node->field_images['und'][$key]['uri']);

						?>

						<div class="beans-slide">

							<a href="<?php print $node_url; ?>"><img src="<?php print $image_url; ?>" alt="<?php print $title; ?>" class="img-responsive"></a>

						</div>

						<?php } ?>

					</div>

				</div>

				<?php if ($n > 1): ?>

				<div class="beans-pagination"></div>

				<?php endif; ?>

			</div>

		</div>

	<?php elseif ($post_format == 'fa-picture-o' && $n == 1 && $post_layout != 'fullwidth'): ?>

		<?php $image_url = file_create_url($node->field_images['und'][0]['uri']); ?>

		<!-- img-box -->

		<div class="img-box">

			<a href="<?php print $node_url; ?>"><img src="<?php print $image_url; ?>" alt="<?php print $title; ?>" class="img-responsive"></a>

		</div>

	<?php elseif ($post_format == 'fa-picture-o' && $n > 1 && $post_layout != 'fullwidth'): ?>

		<!-- img-box -->

		<div class="img-box">

			<?php $i = 0; ?>

			<?php foreach ($node->field_images['und'] as $key => $value) {

				if ($i > 2) break;

				$image_url = image_style_url($img_style3, $node->field_images['und'][$key]['uri']);

			?>

			<div class="box">

				<a href="<?php print $node_url; ?>"><img src="<?php print $image_url; ?>" alt="<?php print $title; ?>" class="img-responsive"></a>

			</div>

			<?php $i++; ?>

			<?php } ?>

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

		<div class="img-box video-area">

			<video width="100%" height="100%">

				<source src="<?php print $video_url; ?>" type="video/<?php print $file_type; ?>">

			</video>

		</div>

		<?php

		} elseif (!empty($node->field_embedded_video)) { ?>

		<div class="img-box video-area">

		<?php

			$video = $node->field_embedded_video['und'][0]['video_url'];

			if (strpos($video, 'youtube')) {

			$video_url = str_replace('watch?v=', 'embed/', $video);

			print '<embed src="'.$video_url.'">';

			} elseif (strpos($video, 'vimeo')) {

			$arr = explode('/', $video);

			$k = count($arr) - 1;

			$video_id = $arr[$k];

			print '<iframe src="//player.vimeo.com/video/'.$video_id.'" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>';

			} else print 'Video not support. Provide the URL of the video you"d like to embed from a supported provider (i.e Vimeo or Youtube )';

		?>

		</div>

		<?php } ?>

	<?php elseif ($post_format == 'fa-file-audio-o' && !empty($node->field_media_upload) && $post_layout != 'fullwidth'): ?>

		<?php $audio_url = file_create_url($node->field_media_upload['und'][0]['uri']) ;?>

		<div class="img-box audio-area">

			<audio controls>

				<source src="<?php print $audio_url; ?>" type="audio/mpeg">

				<?php print t('Your browser does not support the audio element.'); ?>

			</audio>

		</div>

	<?php elseif ($post_format == 'fa-file-audio-o' && !empty($node->field_soundcloud_url) && $post_layout != 'fullwidth'): ?>

		<div class="img-box audio-area">

			<?php

				$url = $node->field_soundcloud_url['und'][0]['url'];

				//Get the JSON data of song details with embed code from SoundCloud oEmbed

				$getValues=file_get_contents('http://soundcloud.com/oembed?format=js&url='.$url.'&iframe=true');

				//Clean the Json to decode

				$decodeiFrame=substr($getValues, 1, -2);

				//json decode to convert it as an array

				$jsonObj = json_decode($decodeiFrame);

				//Change the height of the embed player if you want else uncomment below line

				// echo $jsonObj->html;

				//Print the embed player to the page

				echo str_replace('height="420"', 'height="383"', $jsonObj->html);

			?>

		</div>

	<?php endif; ?>

		<div class="blog-txt">

			<h2><?php print $title; ?></h2>

			

			<p><?php print $summary; ?></p>

			<div class="box-holder">

				

				<time datetime="<?php print format_date($created, 'custom', 'Y-m-d'); ?>">

				<span class="add"><?php print $create_day; ?></span><?php print $create_month; ?>

				</time>

			</div>

		</div>

		<div class="txt">

			<?php

				hide($content['links']);

				hide($content['field_tags']);

				hide($content['comments']);

				hide($content['field_category']);

				hide($content['field_images']);

				hide($content['field_soundcloud_url']);

				hide($content['field_embedded_video']);

				hide($content['field_post_layout']);

				hide($content['field_post_format']);

				hide($content['field_topic']);

				hide($content['field_media_upload']);

				print render($content);

			?>

		</div>

	</article>

	<!-- post-footer -->

	<footer class="post-footer">

		<div class="post-tags">

			<strong class="title"><?php print t('Tagged by'); ?></strong>

			<?php

				if(!empty($node->field_tags)) {

			?>

			<ul class="list-unstyled">

			<?php

				foreach ($node->field_tags['und'] as $key => $value) {

					$tag_id = $node->field_tags['und'][$key]['tid'];

					$term = taxonomy_term_load($tag_id);

					$tag_name = $term->name;

					print '<li><a href="'.url('taxonomy/term/' . $tag_id, $options).'">'.$tag_name.'</a></li>';

				}

			?>

			</ul>

			<?php

			}

			?>

		</div>

		<ul class="post-social list-unstyled">

			<li><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php print $base_root.$node_url; ?>"><i class="fa fa-facebook"></i> <?php print t('SHARE') ?></a></li>

			<li><a target="_blank" href="https://twitter.com/intent/tweet?source=webclient&amp;text=<?php print $title; ?>+<?php print $base_root.$node_url; ?>"><i class="fa fa-twitter"></i> <?php print t('TWEET') ?></a></li>

			<?php if(isset($full_img)): ?>

			<li><a target="_blank" href="https://pinterest.com/pin/create/button/?url=<?php print $base_root.$node_url; ?>&amp;media=<?php print $full_img; ?>&amp;description=<?php print $title; ?>"><i class="fa fa-pinterest"></i> <?php print t('PIN') ?></a></li>

			<?php endif; ?>

		</ul>

	</footer>

	<div class="post-author-box">

		<div class="img-box">

			<?php print $user_picture; ?>

		</div>

		<div class="holder">

			<strong class="title">- <?php if(!empty($display_name)) {print $display_name[0]['value']; } else print $name; ?><?php if(!empty($job)) print ', '.$job[0]['value']; ?></strong>

			<span class="aut-text"><?php print getCountPost($uid); ?> <?php print t('POST'); ?></span>

			<?php if (!empty($about)): ?>

			<p><?php print $about[0]['value']; ?></p>

			<?php endif; ?>

		</div>

	</div>

	<?php print render($content['comments']); ?>

<?php } ?>