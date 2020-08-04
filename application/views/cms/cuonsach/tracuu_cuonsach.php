<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-8">
            <h1 class="m-0 text-dark">Tra cứu các cuốn sách của "<?=$tuasach['ten']?>" (<?=$dausach['ngonngu']?>)</h1>
            </div><!-- /.col -->
            <div class="col-sm-4">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?=site_url('cms')?>">Trang chủ</a></li>
                <li class="breadcrumb-item active"><a href="<?=site_url('cms/tuasach/tracuu')?>">Tra cứu tựa sách</a></li>
                <li class="breadcrumb-item active"><a href="<?=site_url('cms/dausach/tracuu/'.$tuasach['id'])?>">Tra cứu đẩu sách</a></li>
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
                <!-- <div class="col-md-12">
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Tra cứu</h3>
                        </div>

                        <form action='' role="form" method="GET">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="ten_tuasach">Tên sách</label>
                                            <input type="text" class="form-control" id="ten_tuasach" name="ten_tuasach">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="ten_tacgia">Tên tác giả</label>
                                            <input type="text" class="form-control" id="ten_tacgia" name="ten_tacgia">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-success float-right">Tìm</button>
                            </div>
                        </form>
                    </div>
                </div> -->
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
                    <div class="">
                        <a href="<?=site_url("cms/sach/chitiet_cuonsach/".$dausach['id'].'/0')?>" class="btn btn-block btn-primary">Thêm cuốn sách</a> 
                    </div>
                </div>
            </div>
            <?php if(isset($cuonsach) && $cuonsach):?>
            <div class="card-body p-0">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="width: 140px">Mã cuốn sách</td>
                            <th>Năm XB</th>
                            <th>Trạng thái</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($cuonsach as $cs):?>
                            <tr>
                                <td><?=$cs['id']?></td>
                                <td><?=$cs['namxuatban']?></td>
                                <td><?php
                                if ($cs['trangthai'] == 1)
                                {
                                    echo 'Trong kho';
                                }
                                if ($cs['trangthai'] == 0)
                                {
                                    echo 'Đang được mượn';
                                }
                                
                                ?></td>
                                <td>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <a href="<?=site_url('cms/sach/chitiet_cuonsach/'.$dausach['id'].'/'.$cs['id'])?>" type="button" class="btn btn-block btn-success btn-sm">Chỉnh sửa</a>
                                        </div>
                                        <div class="col-md-3">
                                        <form action="<?=site_url('cms/cuonsach/delete_book')?>" method="post" id="form_delete_book_<?=$cs['id']?>">
                                            <input onclick="delete_data(this, <?=$cs['id']?>)" name="delete" value="Xóa" type="button" class="btn btn-danger btn-sm" data-loading-text="Đang xử lý...">
                                            <input type="hidden" name="id" value="<?=$cs['id']?>">
                                            <input type="hidden" name="url_back" value="<?=site_url('cms/cuonsach/tracuu/'.$dausach['id'])?>">
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
            $('#form_delete_book_'+id).submit();
        }
    }
</script>