  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid py-2">


  <div class="row">
    <div class="col-md-6">
        <div class="card card-default color-palette-box">
          <div class="card-header bg-dark">
            <h3 class="card-title text-light">
              <i class="fas fa-cog"></i>
              Data Sekolah
            </h3>
          </div>
              <!-- form -->
              <form role="form" id="form-sekolah">
                <div class="card-body">
                  <div class="form-group">
                    <label for="npsn" >NPSN</label>
                    <input type="text" class="form-control" id="npsn" name="npsn" value="<?= $sekolah['npsn'] ?>">
                  </div>
                  <div class="form-group">
                    <label for="nama">Nama Sekolah</label>
                    <input type="text" class="form-control" id="sekolah" name="sekolah" value="<?= $sekolah['nama_sekolah'] ?>">
                  </div>
              
                      <div class="form-group">
                        <label>Alamat</label>
                        <textarea class="form-control" rows="2" id="alamat" name="alamat"><?= $sekolah['alamat'] ?></textarea>
                      </div>
                    
                  <div class="form-group">
                    <label for="logo">Logo</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="logo" name="logo">
                        <label class="custom-file-label overflow-hidden" for="logo"><?= $sekolah['logo'] ?></label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="button" id="simpanSekolah" class="btn btn-primary">Submit</button>
                </div>
              </form>
              <!-- form end -->
        </div>
    </div>
  </div>

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->