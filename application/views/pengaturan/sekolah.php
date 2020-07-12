  <?php 

$tingkat=$sekolah['tingkat'];

function CekTingkat($value,$tingkat)
  {
      if($value === $tingkat){
        return true;
      }else{
        return false;
      }
    }

    // echo(CekTingkat("SD",$tingkat));
    // die();

  ?>
  
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
              <i class="fas fa-cog mr-1"></i>
              Data Sekolah
            </h3>
          </div>
              <!-- form -->
              <form role="form" id="form-sekolah">
                <div class="card-body">
                  <div class="form-group">
                    <label for="npsn" >NPSN<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="npsn" name="npsn" value="<?= $sekolah['npsn'] ?>">
                  </div>
                  <div class="form-group">
                    <label for="nama">Nama Sekolah<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="sekolah" name="sekolah" value="<?= $sekolah['nama_sekolah'] ?>">
                  </div>
                  <div class="form-group">
                  <label>Tingkat</label>
                  <select name="tingkat" id='tingkat' class="form-control">

                  <option value="" <?php if(CekTingkat("",$tingkat)) : ?> selected <?php endif ?>>Pilih Tingkat</option>
                  <option value="SD" <?php if(CekTingkat("SD",$tingkat)) : ?> selected <?php endif ?>>SD</option>
                  <option value="SMP" <?php if(CekTingkat("SMP",$tingkat)) : ?> selected <?php endif ?> >SMP</option>
                  <option value="SMK" <?php if(CekTingkat("SMK",$tingkat)) : ?> selected <?php endif ?>>SMK</option>
                  </select>
                </div>
                  <div class="form-group">
                    <label for="nama">Email</label>
                    <input type="text" class="form-control" id="email" name="email" value="<?= $sekolah['email'] ?>">
                  </div>
                  <div class="form-group">
                    <label for="nama">Website</label>
                    <input type="text" class="form-control" id="website" name="website" value="<?= $sekolah['website'] ?>">
                  </div>
                  <div class="form-group">
                    <label for="nama">Phone</label>
                    <input type="text" class="form-control" id="phone" name="phone" value="<?= $sekolah['phone'] ?>">
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

                  <div class="form-group">
                    <label for="nama">Masukan Password<span class="text-danger">*</span></label>
                    <input type="password" class="form-control" id="password" name="password">
                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer bg-white">
                  <button type="button" id="simpanSekolah" class="btn btn-primary">Submit</button>
                </div>
              </form>
              <center>
              <small><p class="text-danger">[*] Harus di isi !</p></small>
              </center>
              <!-- form end -->
        </div>
    </div>
  </div>

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->