<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/cms" class="brand-link">
      <span class="brand-text font-weight-light ml-3">CMS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?=base_url()?>dist/img/avatar.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Admin</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          <li class="nav-item has-treeview <?=($slug_1 == 'sach')?'menu-open':''?>">
            <a class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Quản lý sách
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=site_url('cms/sach/tracuu_tuasach')?>" class="nav-link <?=($slug_1 == 'sach' && $slug_2 == 'tracuu_tuasach')?'active':''?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tra cứu tựa sách</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="<?=site_url('cms/sach/chitiet_tuasach')?>" class="nav-link <?=($slug_1 == 'sach' && $slug_2 == 'chitiet_tuasach')?'active':''?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tạo mới tựa sách</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview <?=($slug_1 == 'thanhvien')?'menu-open':''?>">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fas fa-users"></i>
              <p>
                Quản lý thành viên
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=site_url('cms/thanhvien/tracuu')?>" class="nav-link <?=($slug_1 == 'thanhvien' && $slug_2 == 'tracuu')?'active':''?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tra cứu thành viên</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=site_url('cms/thanhvien/chitiet_thanhvien')?>" class="nav-link <?=($slug_1 == 'thanhvien' && $slug_2 == 'chitiet_thanhvien')?'active':''?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tạo mới thành viên</p>
                </a>
              </li>
            </ul>
          </li>
          
          <li class="nav-item has-treeview <?=($slug_1 == 'phieumuonsach')?'menu-open':''?>">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Quản lý PMS
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=site_url('cms/phieumuonsach/tracuu')?>" class="nav-link <?=($slug_1 == 'phieumuonsach' && $slug_2 == 'tracuu')?'active':''?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tra cứu PMS</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=site_url('cms/phieumuonsach/chitiet_pms')?>" class="nav-link <?=($slug_1 == 'phieumuonsach' && $slug_2 == 'chitiet_pms')?'active':''?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tạo mới PMS</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="<?=site_url('cms/thongke/index')?>" class="nav-link <?=($slug_1 == 'thongke' && $slug_2 == 'index')?'active':''?>">
              <i class="far fa-file nav-icon"></i>
              <p>Thống kê</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>