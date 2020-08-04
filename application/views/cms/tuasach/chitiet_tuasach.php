<?php
$required	= ' <span style="color:#FF0000"><i class="fa fa-star"></i></span>'; 
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Tạo/chỉnh sửa thông tin sách</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?=site_url('cms')?>">Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="<?=site_url('cms/book/search')?>">Tra cứu sách</a></li>
                <li class="breadcrumb-item active">Chỉnh sửa</li>
            </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <div class="content">
        <div class="content-fluid">
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Thông tin sách</h3>
                </div>
                <?=form_open('', NULL, NULL)?>
                <div class="card-body">
                    <div class="form-group">
                        <label>Tên tựa sách <?=$required?></label>
                        <?=form_input($attributes['ten'])?>
                        <?=form_error('ten', '<div class="error text-danger">', '</div>')?>
                    </div>

                    <div class="form-group">
                        <label>Tên tác giả <?=$required?></label>
                        <?=form_input($attributes['tacgia'])?>
                        <?=form_error('tacgia', '<div class="error text-danger">', '</div>')?>
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-success">Lưu</button>
                </div>
                <?=form_close()?>
            </div>
        </div>
    </div>
</div>