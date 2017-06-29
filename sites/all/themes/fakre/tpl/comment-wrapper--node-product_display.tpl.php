<?php if ($content['#node']->comment and !($content['#node']->comment == 1 and $content['#node']->comment_count)) { ?>
<div class="comment-box">
	<h2 class="margin-bottom-10"><?php print t('Reviews'); ?> (<?php print $content['#node']->comment_count; ?>)</h2>
	<ul class="list-unstyled list">
		<?php print render($content['comments']); ?>
	</ul>
		<h4><?php print t('Add Review') ?></h4>
		<?php print str_replace('resizable', '', render($content['comment_form'])); ?>
</div>

<!-- End Comments -->
<?php } ?>
