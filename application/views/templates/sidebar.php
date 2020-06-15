<?php

$id=$this->session->userdata['user_id'];
$rule=$this->session->userdata['rule'];

if($rule=='admin'){
  $query="select * from admin where id ='$id'";

  $user=$this->db->query($query)->row_array();
}
if($rule=='guru'){
  $query="select guru.nama_guru as nama, guru.* from guru where id ='$id'";

  $user=$this->db->query($query)->row_array();
}
if($rule=='siswa'){
  $query="select * from siswa where id ='$id'";

  $user=$this->db->query($query)->row_array();
}

?>

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url('dashboard'); ?>" class="brand-link">
      <img src="<?= base_url('assets/Admin/'); ?>dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-wight-leight">E Learning</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?= base_url('assets/images/'); ?>none.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="<?= base_url('pengaturan/profile?user=').$this->session->userdata['user_id'] ?>" class="d-block text-capitalize"><?= $user['nama'] ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?= base_url("dashboard") ?>" class="<?php if($title == "Dashboard"){echo "nav-link active";}else{echo "nav-link";} ?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          
       
          <li class="nav-item has-treeview <?php if($title == "Sekolah" || $title == "Profile" || $title == "Password"){echo "menu-open";} ?>">
          <a href="javascript:void(0)" class="<?php if($title == "Sekolah" || $title == "Profile" || $title == "Password"){echo "nav-link active";}else{echo "nav-link";} ?>">
              <i class="nav-icon fa fa-cog"></i>
              <p>
                Pengaturan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
              <a href="<?= base_url("pengaturan/profile") ?>" class="<?php if($title == "Profile"){echo "nav-link active";}else{echo "nav-link";} ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Profile</p>
                </a>
              </li>
              <li class="nav-item">
              <a href="<?= base_url("pengaturan/password") ?>" class="<?php if($title == "Password"){echo "nav-link active";}else{echo "nav-link";} ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ubah Password</p>
                </a>
              </li>
              <?php if ($this->session->userdata['rule']== "admin") : ?>
              <li class="nav-item">
              <a href="<?= base_url("pengaturan/sekolah") ?>" class="<?php if($title == "Sekolah"){echo "nav-link active";}else{echo "nav-link";} ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sekolah</p>
                </a>
              </li>
              <?php endif; ?>
            </ul>
          </li>
          
          <?php if ($this->session->userdata['rule']== "admin") : ?>
          <li class="nav-header">ADMIN</li>
          <li class="nav-item has-treeview <?php if($title == "Data Guru" || $title == "Data Siswa"){echo "menu-open";} ?>">
            <a href="javascript:void(0)" class="<?php if($title == "Data Guru" || $title == "Data Siswa"){echo "nav-link active";}else{echo "nav-link";} ?>">
              <i class="nav-icon fa fa-users"></i>
              <p>
                Data User
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url("guru") ?>" class="<?php if($title == "Data Guru"){echo "nav-link active";}else{echo "nav-link";} ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Guru</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url("siswa") ?>" class="<?php if($title == "Data Siswa"){echo "nav-link active";}else{echo "nav-link";} ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Siswa</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview <?php if($title == "Data Kelas" || $title == "Data Mapel"){echo "menu-open";} ?>">
            <a href="javascript:void(0)" class="<?php if($title == "Data Kelas" || $title == "Data Mapel"){echo "nav-link active";}else{echo "nav-link";} ?>">
              <i class="nav-icon fa fa-list"></i>
              <p>
                Lainnya
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="<?= base_url("kelas") ?>" class="<?php if($title == "Data Kelas"){echo "nav-link active";}else{echo "nav-link";} ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kelas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url("mapel") ?>" class="<?php if($title == "Data Mapel"){echo "nav-link active";}else{echo "nav-link";} ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Mata Pelajaran</p>
                </a>
              </li>
            </ul>
          </li>
          <?php endif; ?>

          <li class="nav-header">E LEARNING</li>
          <li class="nav-item has-treeview <?php if($title == "Materi" || $title == "Tugas" || $title == "Tambah Isi" || $title == "Hasil" || $title == "Kerjakan"){echo "menu-open";} ?>">
            <a href="javascript:void(0)" class="<?php if($title == "Materi" || $title == "Tugas" || $title == "Tambah Isi" || $title == "Hasil" || $title == "Kerjakan"){echo "nav-link active";}else{echo "nav-link";} ?>">
              <i class="nav-icon fa fa-book-open"></i>
              <p>
                Materi dan Tugas
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url("materi") ?>" class="<?php if($title == "Materi"){echo "nav-link active";}else{echo "nav-link";} ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Materi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url("tugas") ?>" class="<?php if($title == "Tugas" || $title == "Tambah Isi" || $title == "Hasil" || $title == "Kerjakan"){echo "nav-link active";}else{echo "nav-link";} ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tugas</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item mt-3">
            <a href="<?= base_url("auth/logout") ?>" class="nav-link">
              <i class="text-danger nav-icon fa fa-power-off"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>