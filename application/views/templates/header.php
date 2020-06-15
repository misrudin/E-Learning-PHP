<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= $title ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('assets/Admin/'); ?>plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="<?= base_url('assets/Admin/'); ?>plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- Toastr -->
  <link rel="stylesheet" href="<?= base_url('assets/Admin/'); ?>plugins/toastr/toastr.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="<?= base_url('assets/Admin/'); ?>plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?= base_url('assets/Admin/'); ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?= base_url('assets/Admin/'); ?>plugins/jqvmap/jqvmap.min.css">
   <!-- DataTables -->
   <link rel="stylesheet" href="<?= base_url('assets/Admin/'); ?>plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/Admin/'); ?>plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('assets/Admin/'); ?>dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?= base_url('assets/Admin/'); ?>plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?= base_url('assets/Admin/'); ?>plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?= base_url('assets/Admin/'); ?>plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- style -->
  <script>
    const base_url = '<?= base_url() ?>' // Buat variabel base_url agar bisa di akses di semua file js
  </script>
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>style.css">
  <style>
    .preloader {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            /* background-color: #fff; */
background-color:rgba(0,0,0,.5);

            display: -webkit-box;
            display: flex;
            -webkit-box-pack: center;
                    justify-content: center;
            -webkit-box-align: center;
                    align-items: center;
            z-index: 2000;
}

.spinner-dots {
  width: 70px;
  text-align: center;
}

.spinner-dots span {
  width: 12px;
  height: 12px;
  background-color: #33cabb;
  border-radius: 100%;
  display: inline-block;
  -webkit-animation: spinner-dots 1s infinite ease-in-out both;
          animation: spinner-dots 1s infinite ease-in-out both;
}

.spinner-dots .dot1 {
  -webkit-animation-delay: -0.32s;
          animation-delay: -0.32s;
}

.spinner-dots .dot2 {
  -webkit-animation-delay: -0.16s;
          animation-delay: -0.16s;
}

@-webkit-keyframes spinner-dots {
  0%, 80%, 100% {
    -webkit-transform: scale(0);
    transform: scale(0);
  }
  40% {
    -webkit-transform: scale(1);
    transform: scale(1);
  }
}

  </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

<p class="pesan d-none" id="pesan"><?= $this->session->flashdata('message'); ?></p>
<p class="pesanError d-none" id="pesanError"><?= $this->session->flashdata('error'); ?></p>
    <!-- Preloader -->
    <!-- <div class="preloader">
      <div class="spinner-dots">
        <span class="dot1"></span>
        <span class="dot2"></span>
        <span class="dot3"></span>
      </div>
    </div> -->