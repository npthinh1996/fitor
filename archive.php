<?php
// Template Name: Archives
?>
<?php get_header() ?>

<div class="container-fluid">
    <div class="row">
        <!-- Blog post -->
        <div class="col-md-9">
            <h1 class="my-2 mb-4 page-header"><?php the_title() ?></h1>
            <form class="form-inline my-2 my-lg-0" action="http://localhost/wordpress">
                <input name="s" class="form-control mr-sm-2" type="search" placeholder="Nhập từ khóa" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Tìm kiếm</button>
            </form>
            <div id="custom_html-4" class="widget_text card my-4 widget_custom_html">
                <h5 class="card-header">Theo tháng:</h5>
                <div class="card-body"><?php wp_get_archives('type=monthly') ?></div>
            </div>
            <div id="custom_html-4" class="widget_text card my-4 widget_custom_html">
                <h5 class="card-header">Theo chuyên mục:</h5>
                <div class="card-body"><?php wp_list_categories() ?></div>
            </div>
        </div>

        <!-- Siderbar -->
        <div class="col-md-3">
            <?php get_sidebar() ?>
        </div>
    </div>
</div>

<?php get_footer() ?>
