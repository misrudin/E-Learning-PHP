  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid py-2">

      <div class="card card-default color-palette-box position-relative">
          <div class="card-header bg-dark">
            <h3 class="card-title text-light text-capitalize">
              <i class="fas fa-tag"></i>
              <?= $materi['nama_mapel'] ?>
            </h3>
          </div>
          <div class="card-body belajar p-0">
            <div class="viewpdf" id="view">
            <iframe src="<?= base_url("assets/files/pdf/").$materi['file'] ?>" class="frame"></iframe>
            </div>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->