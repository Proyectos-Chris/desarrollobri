<!-- Comment Item -->
<?php
	$user = user_load($comment->uid);
	$display_name = field_get_items('user', $user, 'field_display_name');
    if($user->picture) {
        $pic_uri = $user->picture->uri;
    } else $pic_uri = '';   
    if(!empty($pic_uri)) {
        $pic = image_style_url('image_80x80', $pic_uri);
    } elseif(variable_get('user_picture_default', '')) {
        $pic = variable_get('user_picture_default', '');
        $pic = image_style_url('image_80x80', $pic);
    } 
?>
<li id="comment-<?php print $comment->cid ?>">
    <div class="box">
        <div class="img-box">
    	   <img src="<?php print $pic; ?>" alt="<?php if(!empty($display_name)) {print $display_name[0]['value']; } ?>"/>
           <?php $a = str_replace('<a', '<a class="reply"', strip_tags(render($content['links']),'<a>')) ?>
           <?php print  str_replace('reply</a>', '<i class="fa fa-reply"></i> <span class="txt-over">Reply</span></a>', $a); ?>
        </div>
        <div class="holder">
            <strong class="title"><?php if(!empty($display_name)) {print $display_name[0]['value']; } else print theme('username', array('account' => $content['comment_body']['#object'], 'attributes' => array('class' => 'url'))); ?></strong>
            <time datetime="<?php print format_date($node->created, 'custom', 'Y-m-d'); ?>"><?php print format_date($comment->created, 'custom', 'M d, Y'); ?> at <?php print format_date($comment->created, 'custom', 'G:i a'); ?></time>
            <p><?php hide($content['links']); print render($content); ?></p>
        </div>
    </div>
</li>

