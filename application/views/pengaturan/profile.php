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
              Profile
            </h3>
          </div>
              <!-- form -->
              <form role="form" id="formProfile">
                <div class="card-body">
                  <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" readonly id="nama" name="nama" value="<?= $user['nama'] ?>">
                  </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?= $user['email'] ?>">
                  </div>
                  <div class="form-group">
                    <label for="password">Konfirmasi Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                  </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" id="ubahProfile" class="btn btn-primary">Simpan</button>
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