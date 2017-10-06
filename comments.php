 <?php 
/*     This is comment.phps by Christian Montoya, http://www.christianmontoya.com

    Available to you under the do-whatever-you-want license. If you like it, 
    you are totally welcome to link back to me. 
    
    Use of this code does not grant you the right to use the design or any of the 
    other files on my site. Beyond this file, all rights are reserved, unless otherwise noted. 
    
    Enjoy!
*/
?>

<!-- Comments code provided by christianmontoya.com -->

<?php if (!empty($post->post_password) && $_COOKIE['wp-postpass_'.COOKIEHASH]!=$post->post_password) : ?>
    <p id="comments-locked">Enter your password to view comments.</p>
<?php return; endif; ?>
	<?php comment_form(); ?>

<!--
<div class="replies">
<?php if ($comments) : ?>

<?php 

    /* Author values for author highlighting */
    /* Enter your email and name as they appear in the admin options */
    $author = array(
            "highlight" => "highlight",
            "email" => "ahmed.abouzaid.eg@gmail.com",
            "name" => "admin"
    ); 

    /* Count the totals */
    $numPingBacks = 0;
    $numComments  = 0;

    /* Loop throught comments to count these totals */
    foreach ($comments as $comment) {
        if (get_comment_type() != "comment") { $numPingBacks++; }
        else { $numComments++; }
    }
    
    /* Used to stripe comments */
    $thiscomment = 'odd'; 
?>
<?php
    /* This is a loop for printing comments */
    if ($numComments != 0) : ?>

    <h2 class="comments-header"><?php _e($numComments); ?> تعليقات</h2>
    <ul id="comments">
    
    <?php foreach ($comments as $comment) : ?>
    <?php if (get_comment_type()=="comment") : ?>
    
        <li id="comment-<?php comment_ID(); ?>" class="<?php 
        
        /* Highlighting class for author or regular striping class for others */
        
        /* Get current author name/e-mail */
        $this_name = $comment->comment_author;
        $this_email = $comment->comment_author_email;
        
        /* Compare to $author array values */
        if (strcasecmp($this_name, $author["name"])==0 && strcasecmp($this_email, $author["email"])==0)
            _e($author["highlight"]); 
        else 
            _e($thiscomment); 
        
        ?>">
            <div class="comment-meta">
<?php /* If you want to use gravatars, they go somewhere around here */ ?>
                <p class="comment-author"><?php comment_author_link() ?></span> 
                
            </div>
	
            <div class="comment-text">
<?php /* Or maybe put gravatars here. The typical thing is to float them in the CSS */ 
    /* Typical gravatar call: 
        <img src="<?php gravatar("R", 80, "YOUR DEFAULT GRAVATAR URL"); ?>" 
        alt="" class="gravatar" width="80" height="80">
    */ ?>
                <?php comment_text(); ?>
            </div>
	    <div class="comment-spacer">
	  <div class="mask"></div>
	</div>
	   <p class="comment-date"><?php comment_date() ?></span>
        </li>
        
    <?php if('odd'==$thiscomment) { $thiscomment = 'even'; } else { $thiscomment = 'odd'; } ?>
    
    <?php endif; endforeach; ?>
    
    </ul>
    
    <?php endif; ?>
    
<?php else : 

    /* No comments at all means a simple message instead */ 
?>

    <h2 class="comments-header">ليست هناك تعليقات بعد.</h2>
    
<?php endif; ?>
</div>-->