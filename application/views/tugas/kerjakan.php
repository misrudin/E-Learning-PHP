  <p class="idtugas d-none" id="idtugas"><?= $_GET['tugasid'] ?></p>
 <div class="container-fluid py-2">

                <div class="card">
                      <div class="card-body">
                            heloo
                      </div>
                </div>
                <?php if($tugasDetail['type']!=0) : ?>
                  <h5 class="text-uppercase">Pilihan Ganda</h5>
                  <hr>
                  <div class="container-kerjakan" id="kerjakanpg">
                        
                  </div>
                <?php endif; ?>

                <?php if($tugasDetail['type']!=1) : ?>
                  <h5 class="text-uppercase m-4 p-0 mb-0">Esay</h5>
                  <hr>
                  <div class="container-kerjakan" id="kerjakanesay">
                       
                  </div>
                <?php endif; ?>
                  <div class="container-fluid mt-5 row d-flex justify-content-end">
                  <a href="#" class="btn btn-dark" id="selesai"><i class="fa fa-check mr-1"></i>Selesai</a>
                  </div>
      </div><!-- /.container-fluid -->