<?php get_header() ?>

<div class="container-fluid">
    <div class="row">
        <!-- Blog post -->
        <div class="col-md-9">
            <!-- Slider -->
            <?php
            $args = [
                'posts_per_page' => 1,
                'post__in'  => get_option('sticky_posts')
            ];
            $the_query = new WP_Query($args);
            ?>
            <div id="demo" class="carousel slide my-4" data-ride="carousel">
                <div class="carousel-inner">
                    <?php
                    if($the_query->have_posts()):
                        while($the_query->have_posts()):
                            $the_query->the_post();
                    ?>
                        <div class="carousel-item<?php echo $the_query->current_post == 0 ? ' active' : '' ?>">
                            <?php the_post_thumbnail('blog-thumbnail', ['class' => 'fuild-img', 'alt' => 'post-image']) ?>
                            <div class="carousel-caption d-none d-md-block">
                                <h3><a href="<?php the_permalink() ?>"><?php echo wp_trim_words(get_the_title(), 12) ?></a></h3>
                            </div>   
                        </div>
                        <?php endwhile;
                    endif ?>
                </div>
                <a class="carousel-control-prev" href="#demo" data-slide="prev"><span class="carousel-control-prev-icon"></span></a>
                <a class="carousel-control-next" href="#demo" data-slide="next"><span class="carousel-control-next-icon"></span></a>
            </div>
            <?php wp_reset_postdata() ?>

            <!-- Category -->
            <?php 
            $args = [
                'category_name' => 'chieu-rap',
                'posts_per_page' => 2,
            ];
            $the_query = new WP_Query($args);
            ?>
            <div class="card my-4">
                <h5 class="card-header">Chiếu rạp</h5>
                <div class="card-body">
                    <div class="row">
                        <?php
                        if($the_query->have_posts()):
                            while($the_query->have_posts()):
                                $the_query->the_post();
                                get_template_part('includes/content-home', get_post_format());
                            endwhile;
                        endif;
                        ?>
                    </div>
                </div>
            </div>
            <?php wp_reset_postdata() ?>
            <?php 
            $args = [
                'category_name' => 'hanh-dong',
                'posts_per_page' => 2,
            ];
            $the_query = new WP_Query($args);
            ?>
            <div class="card my-4">
                <h5 class="card-header">Hành động</h5>
                <div class="card-body">
                    <div class="row">
                        <?php
                        if($the_query->have_posts()):
                            while($the_query->have_posts()):
                                $the_query->the_post();
                                get_template_part('includes/content-home', get_post_format());
                            endwhile;
                        endif;
                        ?>
                    </div>
                </div>
            </div>
            <?php wp_reset_postdata() ?>
        </div>

        <!-- Siderbar -->
        <div class="col-md-3">
            <?php get_sidebar() ?>
        </div>
    </div>
</div>

<?php get_footer() ?>
