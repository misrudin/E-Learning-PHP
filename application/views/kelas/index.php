  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

<div class="row">
    <div class="col-md-9">
      <div class="card-body">
      <div class="d-flex justify-content-between align-items-center">
              <div class="d-flex">
               <button class="btn btn-primary mr-2 px-3 tambahKelas mb-2" data-toggle="modal" data-target="#modal-input"><i class="fas fa-fw fa-plus mr-1"></i>Tambah</button>
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
              <div class="view" id="view">
              </div>
            <!-- /.card-body -->
          </div>
    </div>
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
                    <label for="kelas" class="text-capitalize">Kelas</label>
                    <input type="text" class="form-control" id="kelas" name="kelas" placeholder="Kelas.." required>
              </div>
              

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
              <button type="button" id="simpanKelas" class="btn btn-primary">Simpan</button>
              <button type="button" id="editKelas" class="btn btn-warning">Simpan</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
