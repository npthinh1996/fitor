<?php get_header() ?>

<div class="container-fluid">
    <div class="row">
        <!-- Blog post -->
        <div class="col-md-9">
            <h1 class="my-2 mb-4 page-header">Không tìm thấy trang: <small>Error 404</small></h1>
            <p>Xin lỗi vì sự cố này! Trang bạn đang tìm kiếm không tồn tại. Vui lòng tìm kiếm lại ở khung bên dưới.</p>
            <form class="form-inline my-2 my-lg-0" action="http://localhost/wordpress">
                <input name="s" class="form-control mr-sm-2" type="search" placeholder="Nhập từ khóa" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Tìm kiếm</button>
            </form>
        </div>

        <!-- Siderbar -->
        <div class="col-md-3">
            <?php get_sidebar() ?>
        </div>
    </div>
</div>

<?php get_footer() ?>
