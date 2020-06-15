  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid py-2">

<!-- esay -->
      <?php if($tugasDetail['type']!=1) : ?>
  <div class="row">
    <div class="col">
        <div class="card card-default color-palette-box">
          <div class="card-header border-0 py-2 d-flex justify-content-between bg-dark">
            <h3 class="card-title">
              <i class="fas fa-tag"></i>
              Esay
            </h3>
            <div class="d-flex bg-dark ml-auto">
              <button class="btn btn-dark btn-sm ml-auto mr-2 tambahEsay" data-toggle="modal" data-target="#modal-input"><i class="fa fa-plus mr-1"></i>Tambah</button>
              <button class="btn btn-dark btn-sm ml-auto importEsay" data-toggle="modal" data-target="#modal-input"><i class="fa fa-plus mr-1"></i>Import</button>
            </div>
          </div>
              <!-- table -->
            <div class="esay" id="esay"></div>
              
        </div>
    </div>
  </div>
      <?php endif; ?>
<!-- end esay -->
  <!-- pilihan ganda -->
  <?php if($tugasDetail['type']!=0) : ?>
  <div class="row">
    <div class="col">
        <div class="card card-default color-palette-box">
        <div class="card-header border-0 py-2 d-flex align-items-center bg-dark">
            <h3 class="card-title">
              <i class="fas fa-tag"></i>
              Pilihan Ganda
            </h3>
            <div class="d-flex ml-auto">
              <button class="btn btn-dark btn-sm ml-auto mr-2 tambahPg" data-toggle="modal" data-target="#modal-pg"><i class="fa fa-plus mr-1"></i>Tambah</button>
              <button class="btn btn-dark btn-sm ml-auto importPg" data-toggle="modal" data-target="#modal-pg"><i class="fa fa-plus mr-1"></i>Import</button>
            </div>
          </div>
                    <!-- table -->
        
                    <div class="pg" id="pg"></div>
        </div>
    </div>
  </div>
  <?php endif; ?>
  <!-- end pilihan ganda -->
  <div class="row d-flex justify-content-end">
  <a href="<?= base_url("tugas") ?>" class="btn btn-dark mr-2"><i class="fa fa-reply mr-1"></i>Batal</a>
  <a href="<?= base_url("tugas/editStatus/").$_GET['tugasid'] ?>" class="btn btn-dark" id="tugasPublish"><i class="fa fa-plus mr-1"></i>Publish</a>
  </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <div class="modal fade" id="modal-input">
        <div class="modal-dialog modal-lg">
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
                        <label>Soal</label>
                        <textarea class="form-control" name="soal" id="soal" rows="3" placeholder="..?"></textarea>
                  </div>


            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
              <button type="button" id="simpanEsay" class="btn btn-primary">Simpan</button>
              <button type="button" id="editEsay" class="btn btn-warning">Simpan</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->


      <!-- pilihan ganda -->

      <div class="modal fade" id="modal-pg">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <form class="form-horizontal">
              <input type="hidden" name="id" id="idpg">

             
              <div class="form-group row">
                      <label for="soalpg" class="col-sm-2 col-form-label">Soal</label>
                      <div class="col-lg-10">
                        <textarea class="form-control" name="soal" id="soalpg" rows="2"></textarea>
                        </div>
                </div>
                <div class="form-group row">
                    <label for="a" class="col-sm-2 col-form-label">A</label>
                    <div class="col-lg-10">
                    <textarea class="form-control" name="a" id="a" rows="1"></textarea>
                    </div>
                  </div>
                <div class="form-group row">
                    <label for="b" class="col-sm-2 col-form-label">B</label>
                    <div class="col-lg-10">
                    <textarea class="form-control" name="b" id="b" rows="1"></textarea>
                    </div>
                  </div>
                <div class="form-group row">
                    <label for="c" class="col-sm-2 col-form-label">C</label>
                    <div class="col-lg-10">
                    <textarea class="form-control" name="c" id="c" rows="1"></textarea>
                    </div>
                  </div>
                <div class="form-group row">
                    <label for="d" class="col-sm-2 col-form-label">D</label>
                    <div class="col-lg-10">
                    <textarea class="form-control" name="d" id="d" rows="1"></textarea>
                    </div>
                  </div>
                <div class="form-group row">
                    <label for="e" class="col-sm-2 col-form-label">E</label>
                    <div class="col-lg-10">
                    <textarea class="form-control" name="e" id="e" rows="1"></textarea>
                    </div>
                  </div>
                  <div class="form-group row">
                  <label for="benar" class="col-lg-2 col-form-label">Kunci Jawaban</label>
                    <div class="col-lg-10">
                  <select name="benar" id='benar' class="form-control">
                  <option value="A">A</option>
                  <option value="B">B</option>
                  <option value="C">C</option>
                  <option value="D">D</option>
                  <option value="E">E</option>
                  </select>
                  </div>
                </div>


            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
              <button type="button" id="simpanPg" class="btn btn-primary">Simpan</button>
              <button type="button" id="editPg" class="btn btn-warning">Simpan</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
