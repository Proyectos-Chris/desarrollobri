<?php

	global $base_url;

	$rows = trim ($rows);

	$rows = str_replace(' ', '', $rows);

	$rows = explode ( ',' , $rows);

	$i = 0;

	$l = count($rows) - 1;

	$img_style1 = 'image_1170x200';

?>

<?php if($rows): ?>

<ul class="blog-accordion list-unstyled">

	<?php

		for ($i=0; $i < $l; $i++) {

			$nid = $rows[$i];

			$node = node_load($nid);

			$title = $node->title;

			$summary = $node->body['und'][0]['summary'];

			$create_day = format_date($node->created, 'custom', 'd');

			$create_month = format_date($node->created, 'custom', 'M');

			$comment_count = $node->comment_count;

			$author = $node->name;

			$options = array('absolute' => TRUE);

			if(!empty($node->field_tags)) {

				$tags = '';
				$count = count($node->field_tags['und']) - 1;
				$t = 0;
				foreach ($node->field_tags['und'] as $key => $value) {
					$tag_id = $node->field_tags['und'][$key]['tid'];

					$term = taxonomy_term_load($tag_id);

					$tag_name = $term->name;
					if($t<$count) {
						$tags .= '<a href="'.url('taxonomy/term/' . $tag_id, $options).'">'.$tag_name.'</a>, ';
					} else {
						$tags .= '<a href="'.url('taxonomy/term/' . $tag_id, $options).'">'.$tag_name.'</a>';
					}
					$t++;
				}

			}

			

			//print_r($node);break;

			$n = count($node->field_images['und']);

			$post_format = $node->field_post_format['und'][0]['value'];

			$node_url = url('node/' . $node->nid, $options);

		?>

			<li class="blog-m-post accordion">

			<?php if (($post_format == 'fa-file-image-o' || $post_format == 'fa-picture-o') && $n >= 1): ?>

				<?php $image_url = image_style_url($img_style1, $node->field_images['und'][0]['uri']); ?>

				<a href="<?php print $node_url; ?>" class="opener"><img src="<?php print $image_url; ?>" alt="<?php print $title; ?>" class="img-responsive"></a>

			<?php elseif ($post_format == 'fa-video-camera'): ?>

				<?php

				if(!empty($node->field_media_upload)) {

					$video_url = file_create_url($node->field_media_upload['und'][0]['uri']);

					$video_name = $node->field_media_upload['und'][0]['filename'];

					$arr = explode('.', $video_name);

					$k = count($arr) - 1;

					$file_type = $arr[$k];

				?>

				<div class="video-area">

					<video width="100%" height="100%">

						<source src="<?php print $video_url; ?>" type="video/<?php print $file_type; ?>">

					</video>

				</div>

				<?php

				} elseif (!empty($node->field_embedded_video)) { ?>

				<div class="video-area">

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

				<div class="audio-area">

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

					echo str_replace('height="400"', 'height="200"', $jsonObj->html);

				?>

				</div>

			<?php else: ?>

			<?php endif; ?>

				<!-- blog-txt -->

				<div class="blog-txt">

					<h2><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>

					<ul class="meta list-inline">

						<li>

							<i class="fa fa-user"></i>

							By <?php print $author; ?>

						</li>

						<li>

							<i class="fa fa-tags"></i>

							<?php print $tags; ?>

						</li>

						<li>

							<i class="fa fa-comments"></i>

							<a href="<?php print $node_url; ?>"><?php print $comment_count; ?></a>

						</li>

					</ul>

					<div class="blog-slide">

						<p><?php print $summary; ?></p>

						<a href="<?php print $node_url; ?>" class="btn btn-dark"><?php print 'DETAILS'; ?></a>

					</div>

					<!-- box-holder -->

					<div class="box-holder">

						<span class="icon"><i class="fa <?php print $post_format; ?>"></i></span>

						<time>

						<span class="add"><?php print $create_day; ?></span><?php print $create_month; ?>

						</time>

					</div>

				</div>

			</li>

		<?php

	 	}

	 	?>

</ul>

<?php endif; ?>

<?php if ($pager): ?>

<nav class="blog-footer style2 text-center">

	<?php print $pager; ?>

</nav>

<?php endif; ?>