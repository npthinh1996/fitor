<?php get_header() ?>

<div class="container-fluid">
    <div class="row">
        <!-- Blog post -->
        <div class="col-md-9">
            <h1 class="my-2 mb-4 page-header">Tìm kiếm: <small><?php the_search_query() ?></small></h1>
            <?php 
            if (have_posts()): 
                while (have_posts()):
                    the_post();
                    get_template_part('includes/content', get_post_format());
                endwhile;
            else: ?>
                <p>Không có bài viết nào phù hợp với từ khóa: <strong><?php the_search_query(); ?></strong></p>
                <form class="form-inline my-2 my-lg-0" action="http://localhost/wordpress">
                    <input name="s" class="form-control mr-sm-2" type="search" placeholder="Nhập từ khóa" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Tìm kiếm</button>
                </form>
            <?php
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
