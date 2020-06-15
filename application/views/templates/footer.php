<?php
 $sekolah=$this->db->get_where('sekolah',['id',1])->row_array();

?>

<footer class="main-footer">
    <strong>Copyright &copy; 2020 <a href="<?= base_url('dashboard'); ?>"><?= $sekolah['nama_sekolah'] ?></a>.</strong>
    All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?= base_url('assets/Admin/'); ?>plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url('assets/Admin/'); ?>plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('assets/Admin/'); ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- SweetAlert2 -->
<script src="<?= base_url('assets/Admin/'); ?>plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="<?= base_url('assets/Admin/'); ?>plugins/toastr/toastr.min.js"></script>
<!-- bs-custom-file-input -->
<script src="<?= base_url('assets/Admin/'); ?>plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- ChartJS -->
<script src="<?= base_url('assets/Admin/'); ?>plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?= base_url('assets/Admin/'); ?>plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?= base_url('assets/Admin/'); ?>plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?= base_url('assets/Admin/'); ?>plugins/moment/moment.min.js"></script>
<script src="<?= base_url('assets/Admin/'); ?>plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= base_url('assets/Admin/'); ?>plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?= base_url('assets/Admin/'); ?>plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url('assets/Admin/'); ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- DataTables -->
<script src="<?= base_url('assets/Admin/'); ?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/Admin/'); ?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/Admin/'); ?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url('assets/Admin/'); ?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/Admin/'); ?>dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?= base_url('assets/Admin/'); ?>dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url('assets/Admin/'); ?>dist/js/demo.js"></script>


<script type="text/javascript">
$(document).ready(function () {
  bsCustomFileInput.init();

  const pesan=$('#pesan').html()
  const pesanError=$('#pesanError').html()

// console.log(pesan,pesanError);


  if(pesan == "2"){
    toastr.error("Max 5 mb, dan type file harus pdf!")
  }else if(pesan == "1"){
    toastr.success("Berhasil")
  }

});
</script>
<!-- costom -->
<?php if ($title == "Tambah Isi") :?>
  <script src="<?= base_url('assets/'); ?>costom.js"></script>
<?php endif; ?>
<?php if ($title == "Kerjakan") :?>
  <script src="<?= base_url('assets/'); ?>kerjakan.js"></script>
<?php endif; ?>
<?php if ($title == "Data Kelas") :?>
<script src="<?= base_url('assets/'); ?>ajaxKelas.js"></script>
<?php endif; ?>
<?php if ($title == "Data Guru") :?>
  <script src="<?= base_url('assets/'); ?>ajaxGuru.js"></script>
<?php endif; ?>
<?php if ($title == "Data Mapel") :?>
  <script src="<?= base_url('assets/'); ?>ajaxMapel.js"></script>
<?php endif; ?>
<?php if ($title == "Data Siswa") :?>
  <script src="<?= base_url('assets/'); ?>ajaxSiswa.js"></script>
<?php endif; ?>
<?php if ($title == "Materi") :?>
  <script src="<?= base_url('assets/'); ?>ajaxMateri.js"></script>
<?php endif; ?>
<?php if ($title == "Tugas") :?>
  <script src="<?= base_url('assets/'); ?>ajaxTugas.js"></script>
<?php endif; ?>
<?php if ($title == "Sekolah" || $title == "Profile" || $title == "Password") :?>
  <script src="<?= base_url('assets/'); ?>ajaxPengaturan.js"></script>
<?php endif; ?>
</body>
</html>
