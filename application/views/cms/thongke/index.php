<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Thống kê</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?=site_url('cms')?>">Trang chủ</a></li>
                <li class="breadcrumb-item active">Thống kê</li>
                </ol>
            </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <?php 
                                $ti_le_dang_muon = round(count($pms_dang_muon) / count($tat_ca_pms)* 100);
                            ?>
                            <h3><?=$ti_le_dang_muon?><sup style="font-size: 20px">%</sup></h3>

                            <p>Tỉ lệ sách đang mượn</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="#" class="small-box-footer">Chi tiết <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <?php 
                                $ti_le_chua_tra = round(count($pms_chua_tra) / count($tat_ca_pms)* 100);
                            ?>
                            <h3><?=$ti_le_chua_tra?><sup style="font-size: 20px">%</sup></h3>

                            <p>Tỉ lệ sách chưa trả</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="#" class="small-box-footer">Chi tiết <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <?php 
                                $ti_le_tra_qua_han = round(count($pms_qua_han) / count($tat_ca_pms)* 100);
                            ?>
                            <h3><?=$ti_le_tra_qua_han?><sup style="font-size: 20px">%</sup></h3>

                            <p>Tỉ lệ sách trả quá hạn</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="#" class="small-box-footer">Chi tiết <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header border-0">
                            <h3>Từ khoá được tìm kiếm gần đây</h3>
                        </div>

                        <div class="card-body table-responsive p-0">
                            <table class="table table-striped table-valign-middle">
                                <thead>
                                <tr>
                                    <th>
                                        Từ khoá
                                    </th>

                                    <th>
                                        Số lần tìm kiếm
                                    </th>
                                </tr>
                                </thead>

                                <tbody>
                                    <?php foreach($search_keywords as $sk):?>
                                        <tr>
                                            <td><?=$sk['tukhoa']?></td>
                                            <td><?=$sk['dem']?></td>
                                        </tr>
                                    <?php endforeach?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header border-0">
                            <h3>Sách mượn nhiều nhất</h3>
                        </div>

                        <div class="card-body table-responsive p-0">
                            <table class="table table-striped table-valign-middle">
                                <thead>
                                <tr>
                                    <th>
                                        Tên sách
                                    </th>

                                    <th>
                                        Số lần mượn
                                    </th>
                                </tr>
                                </thead>

                                <tbody>
                                    <?php foreach($sach_muon_gan_day as $sach):?>
                                        <tr>
                                            <td><?=$sach['chitiet']['ten_sach'] . " ({$sach['chitiet']['ngon_ngu']})"?></td>
                                            <td><?=$sach['dem']?></td>
                                        </tr>
                                    <?php endforeach?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>