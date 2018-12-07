<?php get_header() ?>

<div class="container-fluid">
    <div class="row">
        <!-- Blog post -->
        <div class="col-md-9">
            <?php 
            if (have_posts()): 
                while (have_posts()):
                    the_post();
                    get_template_part('includes/content', get_post_format());
                endwhile;
            endif;
            ?>
            <!-- Pagination -->
            <?php fitor_pagination() ?>
        </div>

        <!-- Siderbar -->
        <div class="col-md-3">
            <?php get_sidebar() ?>
        </div>
    </div>
</div>

<?php get_footer() ?>
