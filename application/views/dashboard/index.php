  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid py-2">


  <div class="row">
    <div class="col">
        <div class="card card-default color-palette-box">
              <div class="card-body py-5">
                    <h3 class="text-capitalize text-center">Selamat datang, <?= $user['nama'] ?></h3>
                    <h3 class="text-capitalize text-center">Anda login sebagai, <?= $user['rule'] ?></h3>
              </div>              
        </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-6 col-sm-12">
        <div class="row">
        <?php if($user['rule'] !== 'admin') : ?>
              <div class="col-6 menu-cepat">
              <a href="<?= base_url('pengaturan/profile') ?>" class="menu-dashboard bg-dark">
                  <i class="fa fa-user mb-1"></i>
                  <p>Profile</p>
              </a>
              </div>
              <?php else : ?>
              <div class="col-6 menu-cepat">
              <a href="<?= base_url('pengaturan/sekolah') ?>" class="menu-dashboard bg-dark">
                  <i class="fa fa-user mb-1"></i>
                  <p>Sekolah</p>
              </a>
              </div>
              <?php endif ?>
              <div class="col-6 menu-cepat">
                  <a href="<?= base_url('materi') ?>" class="menu-dashboard bg-warning">
                  <i class="fa fa-book-open mb-1"></i>
                  <p>Materi</p>
              </a>
              </div>
        </div>
    </div>
    <div class="col-md-6 col-sm-12">
        <div class="row">
              <div class="col-6 menu-cepat">
                  <a href="<?= base_url('tugas') ?>" class="menu-dashboard bg-success">
                  <i class="fa fa-book mb-1"></i>
                  <p>Tugas</p>
              </a>
              </div>
              <div class="col-6 menu-cepat">
                  <a href="<?= base_url('auth/logout') ?>" class="menu-dashboard bg-danger">
                  <i class="fa fa-power-off mb-1"></i>
                  <p>Logout</p>
              </a>
              </div>
        </div>
    </div>
  </div>

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->