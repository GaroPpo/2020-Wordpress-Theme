<?php
	if(!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME'])):
		die('You can not access this page directly!');
	endif;

	if(!empty($post->post_password)):
		if($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password):
		endif;
	endif; ?>

	<div class="Comment-Section">
		<h3>Comments</h3>
		<?php if($comments): ?>
		<ul>
  	<?php foreach($comments as $comment):
			$i++; ?>
			<li<?php alternate_rows($i); ?> id="comment-<?php comment_ID(); ?>">
				<?php if ($comment->comment_approved == '0'): ?>
					<p>Your comment is awaiting approval</p>
				<?php endif;
				comment_text(); ?>
				<cite>By <?php comment_author_link(); ?> on <?php comment_date('D, j M Y');?> at <?php comment_time();?></cite>
			</li>
			<?php endforeach; ?>
		</ul>
		<?php else : ?>
			<p>No comments yet</p>
	</div>
	<?php endif;

	if(comments_open()):
		if(get_option('comment_registration') && !$user_ID):
			else:
				if($user_ID):
					else:
				endif;
		endif;
		else:
	endif;

	if(comments_open()):
		if(get_option('comment_registration') && !$user_ID): ?>
		<p>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">logged in</a> to post a comment.</p>
	<?php else: ?>
		<div class="Comment-Form">
			<h3>Post Your Comment</h3>
			<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
				<?php if($user_ID): ?>
					<p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Log out of this account">Log out &raquo;</a></p>
					<?php else: ?>
						<p><input type="text" name="author" placeholder="Your Name" id="author" value="<?php echo $comment_author; ?>" tabindex="1" autocomplete="nope" />
							<label for="author"><small>Name <?php if($req) echo "(required)"; ?></small></label></p>
						<p><input type="text" name="email" placeholder="Your Email" id="email" value="<?php echo $comment_author_email; ?>" tabindex="2" autocomplete="nope" />
							<label for="email"><small>Mail (will not be published) <?php if($req) echo "(required)"; ?></small></label></p>
						<p><input type="text" name="url" placeholder="Your Website" id="url" value="<?php echo $comment_author_url; ?>" tabindex="3" autocomplete="nope" />
							<label for="url"><small>Website</small></label></p>
						<?php endif; ?>
						<p><textarea name="comment" placeholder="Your Message" id="comment" cols="100%" rows="10" tabindex="4"></textarea></p>
						<p><input name="submit" type="submit" id="submit" tabindex="5" value="Submit Comment" />
							<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" /></p>
							<?php do_action('comment_form', $post->ID); ?>
			</form>
			</div>
			</div>
	<?php endif; else: ?>
	<p>The comments are closed.</p>
<?php endif; ?>
