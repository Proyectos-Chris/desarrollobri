<?php require_once(drupal_get_path('theme','fakre').'/tpl/header.tpl.php');?>
<?php if($header_layout != 'header15'): ?>
	<?php if ($page['slider']): ?>
		<?php print render($page['slider']); ?>
	<?php endif; ?>
<?php endif; ?>
<!-- contain main informative part of the site -->
<main id="main" role="main">
<?php if ($page['content']): ?>
	<?php
		if (!empty($tabs['#primary']) || !empty($tabs['#secondary'])):
		print render($tabs);
		endif;
		print $messages;
		unset($page['content']['system_main']['default_message']);
	?>
	<?php print render($page['content']); ?>
<?php endif; ?>
<?php if ($page['section']): ?>
	<?php print render($page['section']); ?>
<?php endif; ?>
</main>
<!-- footer of the page -->
<?php require_once(drupal_get_path('theme','fakre').'/tpl/footer.tpl.php');?>