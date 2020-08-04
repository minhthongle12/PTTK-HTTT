<?php
$required	= ' <span style="color:#FF0000"><i class="fa fa-star"></i></span>'; 
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Tạo/chỉnh sửa thông tin thành viên</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?=site_url('cms')?>">Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="<?=site_url('cms/user/search')?>">Tra cứu thành viên</a></li>
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
                    <h3 class="card-title">Thông tin thành viên</h3>
                </div>
                <?=form_open('', NULL, NULL)?>
                <div class="card-body">
                    <div class="form-group">
                        <label>Họ tên <?=$required?></label>
                        <?=form_input($attributes['hoten'])?>
                        <?=form_error('hoten', '<div class="error text-danger">', '</div>')?>
                    </div>
                    
                    <div class="form-group">
                        <label>Tên đăng nhập <?=$required?></label>
                        <?=form_input($attributes['tendangnhap'])?>
                        <?=form_error('tendangnhap', '<div class="error text-danger">', '</div>')?>
                    </div>

                    <div class="form-group">
                        <label>Mật khẩu <?=$required?></label>
                        <?=form_input($attributes['matkhau'])?>
                        <?=form_error('matkhau', '<div class="error text-danger">', '</div>')?>
                    </div>

                    <div class="form-group">
                        <label>Ngày sinh <?=$required?></label>
                        <?=form_input($attributes['ngaysinh'])?>
                        <?=form_error('ngaysinh', '<div class="error text-danger">', '</div>')?>
                    </div>

                    <div class="form-group icheck">
                        <label>Tình trạng tài khoản</label>
                        <?php foreach($attributes['tinhtrang'] as $stt):?>
                            <div class="form-check">
                                <?=form_radio($stt)?>
                                <label class="form-check-label"><?=$stt['label']?></label>
                            </div>
                        <?php endforeach?>
                    </div>

                    <div class="form-group">
                        <label>Lần phạm lỗi</label>
                        <?=form_input($attributes['phamloi'])?>
                        <?=form_error('phamloi', '<div class="error text-danger">', '</div>')?>
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

<script>
    $(function(){
        $('[data-mask]').inputmask();
    });
</script>