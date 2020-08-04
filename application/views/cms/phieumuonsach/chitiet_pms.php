<?php
$required	= ' <span style="color:#FF0000"><i class="fa fa-star"></i></span>'; 
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Phiếu mượn sách</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?=site_url('cms')?>">Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="<?=site_url('cms/borrows/search')?>">Quản lý PMS</a></li>
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
                    <h3 class="card-title">Thông tin PMS</h3>
                </div>
                <?=form_open('', NULL, NULL)?>
                <div class="card-body">
                    <div class="form-group">
                        <label>Tên sách <?=$required?></label>
                        <?=form_dropdown($attributes['cuonsach'], $attributes['cuonsach']['options'], $attributes['cuonsach']['selected'], "multiple='multiple'")?>
                        <?=form_error('sach_duoc_chon[]', '<div class="error text-danger">', '</div>')?>
                    </div>

                    <div class="form-group">
                        <label>Tên người mượn <?=$required?></label>
                        <?=form_dropdown($attributes['ma_thanhvien'], $attributes['ma_thanhvien']['options'], $attributes['ma_thanhvien']['selected'])?>
                        <?=form_error('ma_thanhvien', '<div class="error text-danger">', '</div>')?>
                    </div>

                    <div class="form-group">
                        <label>Ngày phải trả sách <?=$required?></label>
                        <?=form_input($attributes['ngayphaitra'])?>
                        <?=form_error('ngayphaitra', '<div class="error text-danger">', '</div>')?>
                    </div>

                    <div class="form-group">
                        <label>Ngày nhận sách</label>
                        <?=form_input($attributes['ngaynhansach'])?>
                        <?=form_error('ngaynhansach', '<div class="error text-danger">', '</div>')?>
                    </div>

                    <div class="form-group">
                        <label>Ngày đem trả sách</label>
                        <?=form_input($attributes['ngaydemtra'])?>
                        <?=form_error('ngaydemtra', '<div class="error text-danger">', '</div>')?>
                    </div>

                    <div class="form-group icheck">
                        <label>Tình trạng phiếu mượn sách</label>
                        <?php foreach($attributes['tinhtrang'] as $stt):?>
                            <div class="form-check">
                                <?=form_radio($stt)?>
                                <label class="form-check-label"><?=$stt['label']?></label>
                            </div>
                        <?php endforeach?>
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
        $('#sach_duoc_chon').select2({
            placeholder: 'Chọn sách',
            theme: "classic"
        });

        $('[data-mask]').inputmask();
    });
</script>