  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid py-2" id="container-tugas">
        
      <?php if ($this->session->userdata['rule']!= "siswa") : ?>
      <div class="d-flex mb-2">
          <button class="btn btn-primary px-3 mr-1 tambahTugas" data-toggle="modal" data-target="#modal-input"><i class="fa fa-plus mr-1"></i>Tambah</button>
      </div>
      <?php endif; ?>

      <div class="card card-default color-palette-box">
        <div class="card-header bg-dark">
            <h3 class="card-title text-light">
              <i class="fas fa-tag"></i>
              Tugas
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
            <form>
              <input type="hidden" name="id" id="id">

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
                  <label>Type</label>
                  <select name="type" id='type' class="form-control">
                  <option value="">Pilih type</option>
                  <option value="0">Esay</option>
                  <option value="1">Pilihan Ganda</option>
                  <option value="2">Esay & Pilihan Ganda</option>
                  </select>
                </div>
              <div class="form-group">
                    <label for="batas" class="text-capitalize">Batas Waktu</label>
                    <input type="number" class="form-control" id="batas" maxlength="5" name="batas">
              </div>


            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
              <button type="button" id="simpanTugas" class="btn btn-primary">Simpan</button>
              <button type="button" id="editTugas" class="btn btn-warning">Simpan</button>
              <a href="#" id="isi" class="btn btn-dark">Edit Isi</a>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
