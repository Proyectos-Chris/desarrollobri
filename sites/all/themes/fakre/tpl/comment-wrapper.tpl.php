<?php if ($content['#node']->comment and !($content['#node']->comment == 1 and $content['#node']->comment_count)) { ?>
<div class="comment-box">
	<h4><?php print t('Comments'); ?> (<?php print $content['#node']->comment_count; ?>)</h4>
	<ul class="list-unstyled list">
		<?php print render($content['comments']); ?>
	</ul>
		<h4><?php print t('Leave Comment') ?></h4>
		<?php print str_replace('resizable', '', render($content['comment_form'])); ?>
</div>

<!-- End Comments -->
<?php } ?>
