<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0 text-dark">Tra cứu thành viên</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?=site_url('cms')?>">Trang chủ</a></li>
                <li class="breadcrumb-item active">Tra cứu thành viên</li>
            </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Tra cứu</h3>
                        </div>

                        <form action='' role="form" method="GET">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="hoten">Tên thành viên</label>
                                            <input type="text" class="form-control" id="hoten" name="hoten">
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-success float-right">Tìm</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- /.content -->

    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3>Kết quả tìm kiếm</h3>

                <div class="card-tools">
                    <!-- pagination -->
                </div>
            </div>
            <?php if(isset($thanhvien) && $thanhvien):?>
            <div class="card-body p-0">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="width: 140px">Mã thành viên</td>
                            <th>Họ tên</th>
                            <th>Ngày sinh</th>
                            <th style="width: 200px">Ngày tham gia</th>
                            <th style="width: 200px">Tình trạng</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($thanhvien as $tv):?>
                            <tr>
                                <td><?=$tv['id']?></td>
                                <td><a href="<?=site_url('cms/thanhvien/chitiet_thanhvien/'.$tv['id'])?>"><?=$tv['hoten']?></a></td>
                                <td><?=DateTime::createFromFormat('Y-m-d H:i:s', $tv['ngaysinh'])->format('d-m-Y')?></td>
                                <td><?=DateTime::createFromFormat('Y-m-d H:i:s', $tv['ngaygianhap'])->format('d-m-Y')?></td>
                                <td>
                                    <?php
                                        if ($tv['tinhtrang'] == 0)
                                        {
                                            echo 'Chưa kích hoạt';
                                        }
                                        elseif ($tv['tinhtrang'] == 1)
                                        {
                                            echo 'Đã kích hoạt';
                                        }
                                        elseif ($tv['tinhtrang'] == 2)
                                        {
                                            echo 'Bị cấm';
                                        }
                                        elseif ($tv['tinhtrang'] == 3)
                                        {
                                            echo 'Bị xóa';
                                        }
                                    ?>
                                </td>
                                <td>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <a href="<?=site_url('cms/thanhvien/chitiet_thanhvien/'.$tv['id'])?>" type="button" class="btn btn-block btn-success btn-sm">Chỉnh sửa</a>
                                        </div>
                                        <div class="col-md-3">
                                        <form action="<?=site_url('cms/thanhvien/xoathanhvien')?>" method="post" id="form_delete_user_<?=$tv['id']?>">
                                            <input onclick="delete_data(this, <?=$tv['id']?>)" name="delete" value="Xóa" type="button" class="btn btn-danger btn-sm" data-loading-text="Doing...">
                                            <input type="hidden" name="id" value="<?=$tv['id']?>">
                                            <input type="hidden" name="url_back" value="<?=site_url('cms/thanhvien/tracuu?hoten='.$hoten)?>">
                                        </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach?>
                    </tbody>
                </table>
            </div>
            <?php endif?>
        </div>
    </section>
</div>

<script>
    function delete_data(param, id)
    {
        var sb_form = confirm('Bạn xác nhận xóa dữ liệu này?');

        if (!sb_form)
        {
            return false;
        }
        else
        {
            $(param).button('loading');
            $('#form_delete_user_'+id).submit();
        }
    }
</script>