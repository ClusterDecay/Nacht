<?php
/*
** @package Dag
*/
?>

<?php
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
    die('Please do not load this page directly. Thanks!');

if (!empty($post->post_password)) { // if there's a password
    if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) { // and it doesn't match the cookie
        ?>

        <p>This post is protected. Enter your password to read the notes.</p>

        <?php
        return;
    }
} 
?>

<div class="comments">

<?php if ($comments): ?>

<h2><?php comments_number( '0 note', '1 note', '% notes' ); ?></h2>

		<ol id="commentlist"><?php

	    foreach ($comments as $comment):
		?>

		<li id="comment-<?php comment_ID(); ?>" >

                    
                        
				<?php echo get_avatar($comment); ?><div class="com_meta"><div class="auth"><?php comment_author_link(); ?></div><div class="date"><?php comment_time('j F Y @ H:i'); ?></div></div>	
                    
                    	

			<?php comment_text(); ?>

                </li>

            <?php endforeach; /* end for each comment */ ?>

        </ol>

    <?php else: // this is displayed if there are no comments so far  ?>

	<p>No note yet.</p>

        <?php if ('open' == $post->comment_status): ?> <!-- If comments are open, but there are no comments. -->

        <?php else: // comments are closed ?>

            <p>Notes are closed.</p>

        <?php endif; ?>

    <?php endif; ?>

    <?php if ('open' == $post->comment_status): ?>

        <?php if (get_option('comment_registration') && !$user_ID): ?>

            <p>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">logged in</a> to leave a comment.</p>

        <?php else: ?>
<h2>Leave a note</h2>
<script>$(function() {<br> $('input, textarea').placeholder();<br>});</script>
            <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="respond">                

                <?php if ($user_ID): ?>

			<p>Connected as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Log out of this account">Log out &raquo;</a></p>

                <?php else: ?>

			<div class="input_author"><p><label for="author">Name:</label></p><input id="author" name="author" type="text" value="<?php echo $comment_author; ?>" tabindex="1" /></div>

			<div><p><label for="email">E-mail:</label></p><input id="email" name="email" type="text" value="<?php echo $comment_author_email; ?>" tabindex="2" /></div>
                    
			<div><p><label for="url">Website:</label></p><input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" tabindex="3" /></div>
                
                <?php endif; ?>

                	<div><p><label for="comment">Note:</label></p><textarea name="comment" id="comment" tabindex="4"></textarea></div>

                	<input name="submit" type="submit" id="submit" tabindex="5" value="Submit" />

                    <input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />

                <?php do_action('comment_form', $post->ID); ?>

            </form>

        </div><!-- #comments -->

    <?php endif; // If registration required and not logged in ?>

<?php endif; ?>