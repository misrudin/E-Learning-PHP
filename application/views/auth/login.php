<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= $title; ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('assets/Admin/'); ?>plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
      <!-- Toastr -->
      <link rel="stylesheet" href="<?= base_url('assets/Admin/'); ?>plugins/toastr/toastr.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= base_url('assets/Admin/'); ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('assets/Admin/'); ?>dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- style -->
  <link href="<?= base_url('assets/'); ?>style.css" rel="stylesheet">
  
</head>
<body>
  <div class="container-fluid auth">
    <div class="img"style="background-image:url(<?= base_url('assets/images/'); ?>6.jpg);">
  </div>
      <div class="d-flex flex-column data-sekolah align-items-start">
          <h3><?= $sekolah['nama_sekolah'] ?></h3>
          <p><?= $sekolah['alamat'] ?></p>
      </div>
    <!-- pilih login -->
    <?php if($sbg=="") { ?>
      <div class="row mt-sm-5 mb-5">
        <p class="pesan d-none" id="logout"><?= $this->session->flashdata('message'); ?></p>
		          <div class="col-xs-12 col-sm-12 mb-5">
              <a href="<?= base_url('/'); ?>?sbg=admin">
              <img src="<?= base_url('assets/images/'); ?>admin.png" class="img-responsive"  style="max-width:150px"/>
              </a>
              </div>
              <div class="col-xs-6 col-sm-6 mb-5">
              <a href="<?= base_url('/'); ?>?sbg=guru">
              <img src="<?= base_url('assets/images/'); ?>guru.png" class="img-responsive" style="max-width:150px"/>
              </a>
              </div>
              <div class="col-xs-6 col-sm-6 mb-5">
              <a href="<?= base_url('/'); ?>?sbg=siswa">
              <img src="<?= base_url('assets/images/'); ?>siswa.png" class="img-responsive" style="max-width:150px"/>
              </a>
              </div>
		</div>
    <?php } else { ?>
      <div class="login-container row">
        <div class="col-md-8 col-sm-10">
      <img src="<?= base_url('assets/images/'); ?><?php echo $sbg;?>.png" class="img-responsive mb-3" style="max-width:125px"/>
      <p class="text-danger text-capitalize" id="pesan_error"></p>
      <div class="d-flex justify-content-center">
        </div>
        <div class="login-area mt-2">
          <form id="loginForm" data-sbg="<?= $sbg; ?>">
                        <div class="form-group">
                        <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-user"></i></span>
                          </div>
                        <input type="text" class="form-control" id="username" placeholder="<?php 
                          if($sbg=="admin"){echo "Email";}
                          if($sbg=="guru"){echo "Nip";}
                          if($sbg=="siswa"){echo "Nis";}
                        ?>" name="username" >
                        </div>
                      </div>
                      <div class="form-group">
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-lock"></i></span>
                          </div>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                          </div>
                      </div>    
                      <button type="submit" id="login" class="btn btn-danger btn-user btn-block">
                        Masuk
                      </button>
              </form>
                  <div class="social-auth-links text-center mb-3">
                    <p class="text-capitalize">- atau masuk sebagai -</p>
                    <div class="d-flex justify-content-around">
                      <?php if($sbg !="admin") {?>
                        <a href="<?= base_url('/'); ?>?sbg=admin" class="btn px-2 btn-dark">
                          <i class="fa fa-cog mr-1"></i> Admin
                        </a>
                      <?php } ?>
                      <?php if($sbg !="guru") {?>
                        <a href="<?= base_url('/'); ?>?sbg=guru" class="btn px-2 btn-info">
                          <i class="fa fa-users mr-1"></i> Guru
                        </a>
                      <?php } ?>
                      <?php if($sbg !="siswa") {?>
                        <a href="<?= base_url('/'); ?>?sbg=siswa" class="btn px-2 btn-success">
                          <i class="fa fa-child mr-1"></i> Siswa
                        </a>
                      <?php } ?>
                    </div>
                  </div>
            </div>
            </div>
    <?php } ?>
  </div>
  </div>


<!-- jQuery -->
<script src="<?= base_url('assets/Admin/'); ?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('assets/Admin/'); ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Toastr -->
<script src="<?= base_url('assets/Admin/'); ?>plugins/toastr/toastr.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/Admin/'); ?>dist/js/adminlte.min.js"></script>
<!-- costom -->
<script src="<?= base_url('assets/'); ?>ajaxLogin.js"></script>

<script type="text/javascript">
$(document).ready(function () {

  const logout=$('#logout').html()
  
  if(logout != "" && logout != undefined){
    toastr.success(logout)
  }

});
</script>

</body>
</html>
