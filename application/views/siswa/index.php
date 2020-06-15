  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
          <div class="card-body">
          <div class="d-flex justify-content-between align-items-center">
              <div class="d-flex">
                <button class="btn btn-primary px-3 mb-2 mr-2 tambahSiswa" data-toggle="modal" data-target="#modal-input"><i class="fas fa-fw fa-plus mr-1"></i>Tambah</button>
               <button class="btn btn-warning px-3 mb-2 mb-2 mr-2 import"><i class="fas fa-fw fa-download mr-1"></i>Import</button>
              </div>
              <div class=" d-flex align-content-center">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-search"></i></span>
                  </div>
                  <input type="text" class="form-control" name="keyword" autofocus id="keyword" placeholder="Cari">
                </div>
              </div>
            </div>
              <div class="siswa" id="siswa"></div>

            <!-- /.card-body -->
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
              <form action="<?= base_url('siswa'); ?>" method="post">
              <input type="hidden" name="id" id="id">
              <div class="form-group">
                    <label for="nis" class="text-capitalize">Nis</label>
                    <input type="text" class="form-control" id="nis" name="nis" placeholder="Nis.." required>
              </div>
              <div class="form-group">
                    <label for="nama" class="text-capitalize">nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama.." required>
              </div>
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
                    <label for="email" class="text-capitalize">email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email.." required>
              </div>


            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
              <button type="button" id="simpanSiswa" class="btn btn-primary">Simpan</button>
              <button type="button" id="editSiswa" class="btn btn-warning">Simpan</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
