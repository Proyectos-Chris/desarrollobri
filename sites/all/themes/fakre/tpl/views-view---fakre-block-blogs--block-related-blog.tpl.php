<?php
	global $base_url;
	$rows = trim ($rows);
	$rows = str_replace(' ', '', $rows);
	$rows = explode ( ',' , $rows);
	$i = 0;
	$l = count($rows) - 1;
	$img_style1 = 'image_638x240';
	$noimage = base_path().drupal_get_path('theme', 'fakre').'/images/noimage2.jpg';
?>
<?php if($rows): ?>
<div class="row">
	<div class="col-xs-12">
		<div class="row">
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
				$count = count($node->field_tags['und']);
				$tag_id = $node->field_tags['und'][0]['tid'];
				$term = taxonomy_term_load($tag_id);
				$tag_name = $term->name;
				$tags = '<a href="'.url('taxonomy/term/' . $tag_id, $options).'">'.$tag_name.'</a>';
			}
			
			//print_r($node);break;
			$n = count($node->field_images['und']);
			$post_format = $node->field_post_format['und'][0]['value'];
			$node_url = url('node/' . $node->nid, $options);
		?>
			<article class="blog-post-v2">
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
					echo str_replace('height="400"', 'height="160"', $jsonObj->html);
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
					<p><?php print trim_text($summary, 120); ?></p>
					<!-- box-holder -->
					<div class="box">
						<span class="icon"><i class="fa <?php print $post_format; ?>"></i></span>
						<time>
						<span class="add"><?php print $create_day; ?></span><?php print $create_month; ?>
						</time>
					</div>
				</div>
			</article>
		<?php
	 	}
	 	?>
		</div>
	</div>
</div>
<?php endif; ?>