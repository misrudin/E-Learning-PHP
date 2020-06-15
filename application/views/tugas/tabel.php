<div class="card-body p-3">
              <?php foreach ($dataTugas[0] as $tugas) : ?>
                <div class="callout callout-danger shadow-sm">
                        <h5 class="text-rainbow text-uppercase"><?= $tugas['nama_mapel']." - ".$tugas['nama_kelas'] ?></h5>
                            <hr>
                        <p class="text-uppercase"><?= "Oleh : ".$tugas['nama_guru'] ?></p>
                        <p class="text-uppercase"><?= "Batas Waktu : ".$tugas['batas_waktu']." Menit" ?></p>
                        <p class="label py-0 px-1"><small><?php if($tugas['type']==0){echo "Esay";}; if($tugas['type']==1){echo "Pilihan Ganda";}; if($tugas['type']==2){echo "Esay & Pilihan Ganda";}; ?></small></p>
                        <div class="callout-footer mt-2 d-flex">
                        <?php if($this->session->userdata['rule'] != "siswa") : ?>
                            <button data-id="<?= $tugas['id'] ?>" id="edit" type="button" class="btn btn-sm btn-flat btn-warning mr-2" data-toggle="modal" data-target="#modal-input"><i class="fa fa-edit mr-1"></i>Edit</button>
                            <button data-id="<?= $tugas['id'] ?>" type="button" id="hapus" class="btn btn-sm btn-flat btn-danger mr-2"><i class="fa fa-trash mr-1"></i>Hapus</button>
                            <a href="<?= base_url('tugas/hasil?tugasid='.$tugas['id']) ?>" class="btn btn-sm btn-flat btn-success mr-2 text-decoration-none text-white"><i class="fa fa-history mr-1"></i>Lihat Hasil</a>
                        <?php endif; ?>
                        <?php if($this->session->userdata['rule'] == "siswa") : ?>
                            <a href="<?= base_url('tugas/kerjakan?tugasid='.$tugas['id']) ?>" class="btn btn-sm btn-flat btn-info mr-2 text-decoration-none text-white"><i class="fa fa-hourglass-start mr-1"></i>Kerjakan</a>
                            <a href="<?= base_url('tugas/hasil?tugasid='.$tugas['id']) ?>" class="btn btn-sm btn-flat btn-success mr-2 text-decoration-none text-white"><i class="fa fa-history mr-1"></i>Lihat Hasil</a>
                            <?php endif; ?>
                         </div>
                </div>
            <?php endforeach; ?>
            
            <div class="card-footer bg-transparent  clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                    <?php if($dataTugas[2] > 1) : ?>
                  <li class="page-item"><a class="page-link page" href="javasript:void(0)" data-page="<?= $dataTugas[2] - 1; ?>">&laquo;</a></li>
                    <?php endif; ?>
                  <?php for ($i=1; $i <= $dataTugas[1]; $i++) : ?>
                    <?php if ($dataTugas[2] == $i) : ?>
                        <li class="page-item active"><a class="page-link page" href="javasript:void(0)" data-page="<?= $i; ?>"><?= $i; ?></a></li>
                    <?php else : ?>
                        <li class="page-item"><a class="page-link page" href="javasript:void(0)" data-page="<?= $i; ?>"><?= $i; ?></a></li>
                    <?php endif; ?>
                  <?php endfor; ?>
                  <?php if($dataTugas[2] < $dataTugas[1]) : ?>
                  <li class="page-item"><a class="page-link page" href="javasript:void(0)" data-page="<?= $dataTugas[2] + 1; ?>">&raquo;</a></li>
                  <?php endif; ?>
                </ul>
              </div>
                      
        </div>