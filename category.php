<?php get_header() ?>

<div class="container-fluid">
    <div class="row">
        <!-- Blog post -->
        <div class="col-md-9">
            <h1 class="my-2 mb-4 page-header">Danh mục: <small><?php single_cat_title() ?></small></h1>
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
