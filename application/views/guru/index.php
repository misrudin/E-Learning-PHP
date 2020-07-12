  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid py-0">

          <div class="card-body">
            <div class="d-flex justify-content-between align-items-center">
              <div class="d-flex">
              <button class="btn btn-primary px-3 mb-2 mb-2 mr-2 tambah" data-toggle="modal" data-target="#modal-input"><i class="fas fa-fw fa-plus mr-1"></i>Tambah</button>
              <button class="btn btn-warning px-3 mb-2 mb-2 mr-2 import"><i class="fas fa-fw fa-download mr-1"></i>Import</button>
              </div>
              <div class=" d-flex align-content-center">
              <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-search"></i></span>
                  </div>
                  <input type="text" class="form-control" name="keyword" id="keyword" autofocus placeholder="Cari">
                </div>
              </div>
            </div>
              <div class="guru" id="guru"></div>
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
              <form>
              <input type="hidden" name="id" id="id">

              <div class="form-group">
                    <label for="nip" class="text-capitalize">Nip</label>
                    <input type="text" class="form-control" id="nip" name="nip" placeholder="Nip.." required>
              </div>
              <div class="form-group">
                    <label for="nama" class="text-capitalize">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama.." required>
              </div>
              <div class="form-group">
                    <label for="alamat" class="text-capitalize">Alamat</label>
                    <textarea class="form-control" rows="2" id="alamat" name="alamat"></textarea>
              </div>
              <div class="form-group">
                    <label for="email" class="text-capitalize">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email.." required>
              </div>
              <div class="form-group">
                    <label for="phone" class="text-capitalize">Phone</label>
                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone.." required>
              </div>
              <div class="form-group">
                    <label for="tempatLahir" class="text-capitalize">Tempat Lahir</label>
                    <input type="text" class="form-control" id="tempatLahir" name="tempatLahir" placeholder="Tempat Lahir.." required>
              </div>
              <div class="form-group">
                    <label for="tanggalLahir" class="text-capitalize">Tanggal Lahir</label>
                    <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                    </div>
                    <input type="text" id="tanggalLahir" name="tanggalLahir" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
                  </div>
              </div>
              <div class="form-group">
                  <label>Gender (L/P)</label>
                  <select name="kelamin" id='kelamin' class="form-control">
                  <option value="L">L (Laki-Laki)</option>
                  <option value="P">P (Perempuan)</option>
                  </select>
                </div>


            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
              <button type="button" id="simpanGuru" class="btn btn-primary">Simpan</button>
              <button type="button" id="editGuru" class="btn btn-warning">Simpan</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
