  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid py-2">
      <?php if ($this->session->userdata['rule']!= "siswa") : ?>
      <div class="d-flex mb-2">
          <button class="btn btn-primary px-3 mr-1 tambahMateri" data-toggle="modal" data-target="#modal-input"><i class="fa fa-plus mr-1"></i>Materi</button>
          <button class="btn btn-primary px-3 mx-1 tambahSoal" data-toggle="modal" data-target="#modal-input"><i class="fa fa-plus mr-1"></i>Soal</button>
      </div>
      <?php endif; ?>

      <div class="card card-default color-palette-box">
          <div class="card-header bg-dark">
            <h3 class="card-title text-light">
              <i class="fas fa-tag"></i>
              Materi
            </h3>
          </div>
          <div class="view" id="view"></div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- page script -->


  <div class="modal fade" id="modal-input">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <form enctype="multipart/form-data" id="formMateri">
              <input type="hidden" name="id" id="id">
              <input type="hidden" name="type" id="type">

              <div class="form-group">
                  <label>Kelas</label>
                  <select name="kelas" id='kelas' class="form-control">
                  <option value="">Pilih kelas</option>
                   <?php foreach ($dataKelas as $kelas) : ?>
                            <option value="<?= $kelas['id']; ?>"><?= $kelas['nama_kelas']; ?></option>
                   <?php endforeach; ?>
                  </select>
                </div>
                <div class="form-group">
                  <label>Mapel</label>
                  <select name="mapel" id='mapel' class="form-control">
                  <option value="">Pilih mapel</option>
                   <?php foreach ($dataMapel as $mapel) : ?>
                            <option value="<?= $mapel['id']; ?>"><?= $mapel['nama_mapel']; ?></option>
                   <?php endforeach; ?>
                  </select>
                </div>
                <div class="form-group">
                    <label for="pdf">File (.pdf)</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="pdf" name="pdf">
                        <label class="custom-file-label" for="pdf">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" id="upload">Upload</span>
                      </div>
                    </div>
                  </div>
              <div class="form-group">
                    <label for="description" class="text-capitalize">Desckripsi</label>
                    <input type="text" class="form-control" id="description" maxlength="70" name="description" placeholder="Deskripsi pendek.." required>
              </div>


            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
              <button type="submit" class="btn btn-primary">Simpan</button>
              <!-- <button type="button" id="editMateri" class="btn btn-warning">Simpan</button> -->
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->


      <!-- modal kawin -->

      <div class="modal fade" id="modal-open">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-body p-0">
              <div class="viewpdf">
                <iframe src="<?= base_url("assets/files/pdf/800Kb.pdf") ?>" frameborder="0" width="100%" height="100%"></iframe>
              </div>
            </div>
            <div class="modal-footer p-0">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->