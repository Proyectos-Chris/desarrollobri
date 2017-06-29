<?php

	global $base_url;

	if (isset($_GET['style'])) {

		$layout_style = $_GET['style'];

	} else $layout_style = theme_get_setting('blog_layout_style', 'fakre');

	if(empty($layout_style)) $layout_style = 'alt_default';

	$header_layout = theme_get_setting('blog_header_layout', 'fakre');

	$class_header = theme_get_setting('blog_header_class', 'fakre');

	$footer_layout = theme_get_setting('blog_footer_layout', 'fakre');

	$footer_class = theme_get_setting('blog_footer_class', 'fakre');

	$footer_bg = theme_get_setting('blog_footer_background','fakre');

	if(!empty($footer_bg)) {

		$footer_bg = file_create_url(file_load($footer_bg)->uri);

	} else $footer_bg = '';

	if(isset($node->field_page_tite_size) && !empty($node->field_page_tite_size)) {

		$page_title_size = $node->field_page_tite_size['und'][0]['value'];

	} else $page_title_size = theme_get_setting('blog_page_title_size', 'fakre');

	if(empty($page_title_size)) $page_title_size = '';

	if(isset($node->field_page_title_style) && !empty($node->field_page_title_style)) {

		$page_title_style = $node->field_page_title_style['und'][0]['value'];

	} else $page_title_style = theme_get_setting('blog_page_title_style','fakre');

	if(empty($page_title_style)) $page_title_style = 'greybg';

	$page_slogan = variable_get('site_slogan');

	if (isset($node->field_background_image) && !empty($node->field_background_image)) {

		$bg_uri = $node->field_background_image['und'][0]['uri'];

		$page_title_background = file_create_url($bg_uri);

	} else {

		$page_title_bg = theme_get_setting('blog_background_page_title', 'fakre');

		if (!empty($page_title_bg)) {

			$page_title_background = file_create_url(file_load($page_title_bg)->uri);

		}

	}

	if($page_title_size =='default') {

		$page_banner_class = '';

	} elseif(!empty($page_slogan)) {

		$page_banner_class = 'style2';

	} else $page_banner_class = '';

	if ($page_title_style == 'rightalign') {

		$page_banner_class .= ' grey rightalign';

	} elseif ($page_title_style == 'centeralign') {

		$page_banner_class .= ' grey center';

	} elseif ($page_title_style == 'pattern') {

		$page_banner_class .= ' pattern';

		$bg_pattern = 'style="background: url('.$page_title_background.');"';

	} elseif ($page_title_style == 'greybg' || $page_title_style == 'leftalign') {

		$page_banner_class .= ' grey';

	} elseif ($page_title_style == 'darkbg') {

		$page_banner_class .= ' dark dark-bottom-border';

	}

	

	if(isset($node->field_post_layout) && !empty($node->field_post_layout)) {

		$post_layout = $node->field_post_layout['und'][0]['value'];

	} else $post_layout = 'default';

	if ($layout_style == 'gridfullwidthspace' || $layout_style == 'gridfullwidthnospace' || $layout_style == 'masonryfullwidthnospace'

		|| $layout_style == 'masonryfullwidthspace' || $layout_style == 'fullwidth_list') {

		$class_container = 'container-fluid';

	} else {

		$class_container = 'container';

	}

	if ($layout_style == 'fullwidth_accordion') {

		$class_col = 'blog-section padding-zero';

	} elseif ($layout_style == 'fullwidth_leftsidebar' || $layout_style == 'alt_default_leftsidebar' || $layout_style == 'alt2_default_leftsidebar' || $post_layout == 'sidebarleft') {

		$class_col = 'col-sm-8 col-md-9 col-sm-push-4 col-md-push-3';

	} elseif ($layout_style == 'fullwidth_rightsidebar' || $layout_style == 'alt_default_rightsidebar' || $layout_style == 'alt2_default_rightsidebar' || $post_layout == 'sidebarright') {

		$class_col = 'col-sm-8 col-md-9';

	} elseif ($layout_style == 'fullwidth_bothsidebar' || $post_layout == 'sidebarboth') {

		$class_col = 'col-md-6 col-md-push-3';

	} elseif ($layout_style == 'fullwidth_accordion_leftsidebar') {

		$class_col = 'col-sm-8 col-md-9 col-sm-push-4 col-md-push-3 blog-section padding-zero';

	} elseif ($layout_style == 'fullwidth_accordion_rightsidebar') {

		$class_col = 'col-sm-8 col-md-9 blog-section padding-zero';

	} elseif ($layout_style == 'fullwidth_accordion_bothsidebar') {

		$class_col = 'col-md-6 col-md-push-3 blog-section padding-zero';

	} else $class_col = '';

	$name = 'categories';

    $categories_voc = taxonomy_vocabulary_machine_name_load($name);

    $tree = taxonomy_get_tree($categories_voc->vid);

?>

<?php require_once(drupal_get_path('theme','fakre').'/tpl/header.tpl.php');?>

<!-- contain main informative part of the site -->

<main id="main" role="main" <?php if(strpos($layout_style, 'alt') !== FALSE) print 'class="bg-grey dark-bottom-border"'; ?>>

	<!-- page banner  -->

	<header class="page-banner <?php print $page_banner_class; ?>" <?php if(isset($bg_pattern)) print $bg_pattern; ?>>

	<?php if(isset($page_title_background) && ($page_title_style != 'greybg' && $page_title_style != 'darkbg' && $page_title_style != 'videobg' && $page_title_style != 'pattern' && $page_title_style == 'imagebg')): ?>

		<div class="stretch">

			<img alt="<?php print drupal_get_title(); ?>" src="<?php print $page_title_background; ?>">

		</div>

	<?php endif; ?>

		<div class="container">

			<div class="row">

				<div class="col-xs-12">

					<div class="holder">

						<h1 class="heading text-capitalize"><?php print drupal_get_title(); ?></h1>

						<?php if(!empty($page_slogan)): ?>

						<p><?php print $page_slogan; ?></p>

						<?php endif; ?>

					</div>

					<?php if($breadcrumb): ?>

						<?php print $breadcrumb; ?>

					<?php endif; ?>

				</div>

			</div>

		</div>

	</header>

	<?php if($post_layout != 'fullwidth') { ?>

	<div class="<?php print $class_container; ?> padding-top-100">

		<div class="row">

			<div class="col-xs-12 <?php print $class_col; ?>">

			<?php if (($layout_style == 'grid2colsspace' || $layout_style == 'grid2colsnospace' || $layout_style == 'gridfullwidthspace') && arg(0) == 'blog'): ?>

				<div class="col-xs-12">

				<?php if ($page['content']): ?>

					<div class="blog-masonry-holder full-width" id="masonry-container">

						<?php

							if (!empty($tabs['#primary']) || !empty($tabs['#secondary'])):

							print render($tabs);

							endif;

							print $messages;

						?>

						<?php unset($page['content']['system_main']['pager']); ?>

						<?php print render($page['content']); ?>

					</div>

					<div class="blog-footer style2 text-center">

					<?php print theme('pager', array('quantity', 8)); ?>

					</div>

					<?php endif; ?>

				</div>

			<?php elseif (($layout_style == 'grid3colsspace' || $layout_style == 'grid3colsnospace' || $layout_style == 'grid4colsspace') && arg(0) == 'blog'): ?>

				<div class="col-xs-12">

				<?php if ($page['content']): ?>

					<div class="blog-masonry-holder" id="masonry-container">

						<?php

							if (!empty($tabs['#primary']) || !empty($tabs['#secondary'])):

							print render($tabs);

							endif;

							print $messages;

						?>

						<?php unset($page['content']['system_main']['pager']); ?>

						<?php print render($page['content']); ?>

					</div>

					<div class="blog-footer style2 text-center">

					<?php print theme('pager', array('quantity', 8)); ?>

					</div>

					<?php endif; ?>

				</div>

			<?php elseif ($layout_style == 'grid4colsnospace' && arg(0) == 'blog'): ?>

				<?php if ($page['content']): ?>

				<div class="blog-masonry-holder" id="masonry-container">

					<?php

						if (!empty($tabs['#primary']) || !empty($tabs['#secondary'])):

						print render($tabs);

						endif;

						print $messages;

					?>

					<?php unset($page['content']['system_main']['pager']); ?>

					<?php print render($page['content']); ?>

				</div>

				<div class="blog-footer style2 text-center">

					<?php print theme('pager', array('quantity', 8)); ?>

				</div>

				<?php endif; ?>

			<?php elseif ($layout_style == 'gridfullwidthnospace' && arg(0) == 'blog'): ?>

				<?php if ($page['content']): ?>

				<div class="blog-masonry-holder full-width add-style" id="masonry-container">

					<?php

						if (!empty($tabs['#primary']) || !empty($tabs['#secondary'])):

						print render($tabs);

						endif;

						print $messages;

					?>

					<?php unset($page['content']['system_main']['pager']); ?>

					<?php print render($page['content']); ?>

				</div>

				<div class="blog-footer style2 text-center">

					<?php print theme('pager', array('quantity', 8)); ?>

				</div>

				<?php endif; ?>

			<?php elseif (($layout_style == 'masonry2colsspace' || $layout_style == 'masonry2colsnospace' || $layout_style == 'masonry3colsnospace' || $layout_style == 'masonry3colsspace' || $layout_style == 'masonry4colsspace' || $layout_style == 'masonry4colsnospace' || $layout_style == 'masonryfullwidthspace' || $layout_style == 'masonryfullwidthnospace') && arg(0) == 'blog'): ?>

				<div class="col-xs-12">

					<ul id="work-filter" class="list-inline isotop-controls">

						<li class="active"><a href="#"><?php print t('All'); ?></a></li>

						<?php foreach ($tree as $term) { ?>

						<li><a data-filter=".<?php print $term->tid; ?>" href="#"><?php print $term->name; ?></a></li>

						<?php } ?>

					</ul>

					<?php if($layout_style == 'masonry2colsspace') { ?>	

						<?php print views_embed_view('_fakre_block_blogs','block_masonry_2cols_with_space'); ?>

					<?php } elseif ($layout_style == 'masonry2colsnospace') {?>

						<?php print views_embed_view('_fakre_block_blogs','block_masonry_2cols_without_space'); ?>

					<?php } elseif ($layout_style == 'masonry3colsspace' || $layout_style == 'masonryfullwidthspace' || $layout_style == 'masonryfullwidthnospace') {?>

						<?php print views_embed_view('_fakre_block_blogs','block_masonry_3cols_with_space'); ?>

					<?php } elseif ($layout_style == 'masonry3colsnospace') {?>

						<?php print views_embed_view('_fakre_block_blogs','block_masonry_3cols_without_space'); ?>

					<?php } elseif ($layout_style == 'masonry4colsspace') {?>

						<?php print views_embed_view('_fakre_block_blogs','block_masonry_4cols_with_space'); ?>

					<?php } elseif ($layout_style == 'masonry4colsnospace') {?>

						<?php print views_embed_view('_fakre_block_blogs','block_masonry_4cols_without_space'); ?>

					<?php } elseif ($layout_style == 'masonryfullwidthspace') {?>

						<?php print views_embed_view('_fakre_block_blogs','block_masonry_fullwidth_with_space'); ?>

					<?php } elseif ($layout_style == 'masonryfullwidthnospace') {?>

						<?php print views_embed_view('_fakre_block_blogs','block_masonry_fullwidth_without_space'); ?>

					<?php } ?>

				</div>

			<?php elseif (($layout_style == 'fullwidth' || $layout_style == 'fullwidth_accordion' || $layout_style == 'fullwidth_list' || $layout_style == 'fullwidth_leftsidebar' || $layout_style == 'fullwidth_rightsidebar' || $layout_style == 'fullwidth_bothsidebar' || $layout_style == 'fullwidth_accordion_leftsidebar' || $layout_style == 'fullwidth_accordion_rightsidebar' || $layout_style == 'fullwidth_accordion_bothsidebar') && arg(0) == 'blog'): ?>

				<?php if($layout_style == 'fullwidth' || $layout_style == 'fullwidth_leftsidebar' || $layout_style == 'fullwidth_rightsidebar' || $layout_style == 'fullwidth_bothsidebar'): ?>

					<?php print views_embed_view('_fakre_block_blogs','block_blog_fullwidth'); ?>

				<?php elseif($layout_style == 'fullwidth_accordion' || $layout_style == 'fullwidth_accordion_leftsidebar' || $layout_style == 'fullwidth_accordion_rightsidebar' || $layout_style == 'fullwidth_accordion_bothsidebar'): ?>

					<?php print views_embed_view('_fakre_block_blogs','block_blog_fullwidth_accordion'); ?>

				<?php elseif($layout_style == 'fullwidth_list'): ?>

					<?php print views_embed_view('_fakre_block_blogs','block_blog_fullwidth_list'); ?>

				<?php endif; ?>

			<?php else: ?>

				<?php if ($page['content']): ?>

					<?php

						if (!empty($tabs['#primary']) || !empty($tabs['#secondary'])):

						print render($tabs);

						endif;

						print $messages;

					?>

					<?php unset($page['content']['system_main']['pager']); ?>

					<?php print render($page['content']); ?>

				<?php if (arg(0) == 'blog') { ?>

				<div class="blog-footer style2 text-center">

					<?php print theme('pager', array('quantity', 8)); ?>

				</div>

				<?php } ?>

				<?php endif; ?>

			<?php endif; ?>

			</div>

			<?php if($page['sidebar_first'] && ($layout_style == 'fullwidth_leftsidebar' || $layout_style == 'fullwidth_accordion_leftsidebar' || $layout_style == 'alt_default_leftsidebar' || $layout_style == 'alt2_default_leftsidebar' || $post_layout == 'sidebarleft')): ?>

			<aside class="col-xs-12 col-sm-4 col-md-3 col-sm-pull-8 col-md-pull-9">

				<?php print render($page['sidebar_first']); ?>

			</aside>

			<?php elseif($page['sidebar_first'] && ($layout_style == 'fullwidth_bothsidebar' || $layout_style == 'fullwidth_accordion_bothsidebar' || $post_layout == 'sidebarleft' || $post_layout == 'sidebarboth')): ?>

			<aside class="col-xs-12 col-sm-6 col-md-3 col-md-pull-6">

				<?php print render($page['sidebar_first']); ?>

			</aside>	

			<?php endif; ?>

			<?php if($page['sidebar_second'] && ($layout_style == 'fullwidth_rightsidebar' || $layout_style == 'fullwidth_accordion_rightsidebar' || $post_layout == 'sidebarright')): ?>

			<aside class="col-xs-12 col-sm-4 col-md-3">

				<?php print render($page['sidebar_second']); ?>

			</aside>

		<?php elseif($page['sidebar_second'] && ($layout_style == 'fullwidth_bothsidebar' || $layout_style == 'fullwidth_accordion_bothsidebar' || $layout_style == 'alt_default_rightsidebar' || $layout_style == 'alt2_default_rightsidebar' || $post_layout == 'sidebarright' || $post_layout == 'sidebarboth')): ?>

			<aside class="col-xs-12 col-sm-6 col-md-3">

				<?php print render($page['sidebar_second']); ?>

			</aside>	

			<?php endif; ?>

		</div>

	</div>

	<?php } else { ?>

	<div class="container-fluid padding-top-100">

		<div class="row">

		<?php if(arg(0) == 'node'): ?>

		<?php

			if(!empty($node->field_post_format)) {

				$post_format = $node->field_post_format['und'][0]['value'];

			} else $post_format = 'fa-file-text-o';

			$img_style1 = 'image_1170x480';

			if(!empty($node->field_images)) {

				$n = count($node->field_images['und']);

				$full_img = file_create_url($node->field_images['und'][0]['uri']);

			} else $n = 0;

		?>

			<!-- blog-post-v1 -->

			<?php if($post_format != 'fa-file-text-o'){ ?>

			<article class="blog-post-v1 margin-b-zero border-zero">

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

				<?php $image_url = file_create_url($node->field_images['und'][0]['uri']); ?>

				<!-- img-box -->

				<div class="img-box">

					<a href="<?php print @$node_url; ?>"><img src="<?php print $image_url; ?>" alt="<?php print $title; ?>" class="img-responsive"></a>

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

			<?php endif; ?>

			</article>

			<?php } ?>

		<?php endif; ?>

		</div>

	</div>

	<?php if ($page['content']): ?>

	<div class="container">

		<div class="row">

			<div class="col-xs-12">

			<?php

				if (!empty($tabs['#primary']) || !empty($tabs['#secondary'])):

				print render($tabs);

				endif;

				print $messages;

			?>

				<?php unset($page['content']['system_main']['pager']); ?>

				<?php print render($page['content']); ?>

			</div>

		</div>

	</div>	

	<?php endif; ?>

	<?php } ?>

	<?php if($page['related_post']): ?>

		<?php print render($page['related_post']); ?>

	<?php endif; ?>

</main>

<?php require_once(drupal_get_path('theme','fakre').'/tpl/footer.tpl.php');?>