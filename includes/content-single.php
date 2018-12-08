<h1 class="mt-4"><?php the_title() ?></h1>
<p class="lead">by <?php the_author_posts_link() ?> in <?php the_category(' | ') ?></p>
<hr>
<p>Posted on <?php echo get_the_date() ?></p>
<hr>
<?php the_post_thumbnail('blog-thumbnail', ['class'=> 'img-fluid rounded', 'alt' => 'post-image']) ?>
<hr>
<strong>Nội dung:</strong>
<?php the_content() ?>
<hr>
<div class="mt-3">
    <?php 
    if(comments_open() || get_comments_number()){
        comments_template();
    }
    ?>
</div>
<?php echo fitor_related_post('Bài viết liên quan', 4) ?>
