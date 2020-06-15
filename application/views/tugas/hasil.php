  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid py-2">

      <div class="card">
                      <div class="card-body">
                            heloo
                      </div>
                </div>
                  <div class="container-kerjakan" >
                  <?php $i=1; ?>
<?php foreach($dataPg as $pg) : ?>
                        <div class="soal d-flex mt-4">
                                <p class=""><?= $i; ?>.</p>
                                <p class="text text-dark text-uppercase"><?= $pg['soal'] ?></p>
                        </div>
                        <div class="jawaban ml-3 d-flex">
                                <p class="pilihan <?php if($pg['jawaban']=="A"){echo "bg-primary";}else{echo "bg-dark";} ?>">A</p>
                                <p class="text text-dark text-uppercase"><?= $pg['A'] ?></p>
                        </div>
                        <div class="jawaban ml-3 d-flex">
                                <p class="pilihan <?php if($pg['jawaban']=="B"){echo "bg-primary";}else{echo "bg-dark";} ?>">B</p>
                                <p class="text text-dark text-uppercase"><?= $pg['B'] ?></p>
                        </div>
                        <div class="jawaban ml-3 d-flex">
                                <p class="pilihan <?php if($pg['jawaban']=="C"){echo "bg-primary";}else{echo "bg-dark";} ?>">C</p>
                                <p class="text text-dark text-uppercase"><?= $pg['C'] ?></p>
                        </div>
                        <div class="jawaban ml-3 d-flex">
                                <p class="pilihan <?php if($pg['jawaban']=="D"){echo "bg-primary";}else{echo "bg-dark";} ?>">D</p>
                                <p class="text text-dark text-uppercase"><?= $pg['D'] ?></p>
                        </div>
                        <div class="jawaban ml-3 d-flex">
                                <p class="pilihan <?php if($pg['jawaban']=="E"){echo "bg-primary";}else{echo "bg-dark";} ?>">E</p>
                                <p class="text text-dark text-uppercase"><?= $pg['E'] ?></p>
                        </div>
                        <div class="jawaban ml-3 d-flex">
                                <a class="text-bold">Jawaban : <?= $pg['benar'] ?></a>
                        </div>
                     
<?php $i++; ?>
<?php endforeach; ?>
                  </div>

                  <div class="container-kerjakan">
                  <?php $i=1; ?>
<?php foreach($dataEsay as $esay) : ?>

        <div class="soal d-flex mt-4">
                                <p class=""><?= $i; ?>.</p>
                                <p class="text text-dark text-uppercase"><?= $esay['soal'] ?></p>
                        </div>
                        <div class="jawaban d-flex ml-3">
                        <div class="col-12">
                      <!-- textarea -->
                              <div class="form-group">
                                    <label>Jawaban</label>
                                    <textarea class="form-control" rows="2" id="jawaban" readonly name="jawaban"><?= $esay['jawaban'] ?></textarea>
                              </div>
                              </div>
                        </div>

<?php $i++; ?>
<?php endforeach; ?>
                  </div>
                  <div class="container-fluid mt-5 row d-flex justify-content-end">
                  <a href="<?= base_url('/tugas') ?>" class="btn btn-dark" id="selesai"><i class="fa fa-reply mr-1"></i>Kembali</a>
                  </div>

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->