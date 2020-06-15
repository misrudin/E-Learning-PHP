<div class="card-body p-3">
              <?php foreach ($dataMateri[0] as $materi) : ?>
                <div class="callout callout-info shadow-sm">
                        <h5 class="text-rainbow text-uppercase"><?= $materi['nama_mapel']." - ".$materi['nama_kelas']." : ". $materi['description'] ?></h5>
                            <hr>
                        <p class="text-uppercase"><?= "Oleh : ".$materi['nama_guru'] ?></p>
                        <p class="text-uppercase"><?= "Pada : ".$materi['create'] ?></p>
                        <p class="label py-0 px-1 text-uppercase"><small><?= $materi['type'] ?></small></p>
                        <div class="callout-footer mt-2 d-flex">
                          <?php if($this->session->userdata['rule'] != "siswa") : ?>
                            <button data-id="<?= $materi['id'] ?>" id="edit" type="button" class="btn btn-sm btn-flat btn-warning mr-2" data-toggle="modal" data-target="#modal-input"><i class="fa fa-edit mr-1"></i>Edit</button>
                            <button data-id="<?= $materi['id'] ?>" type="button" id="hapus" class="btn btn-sm btn-flat btn-danger mr-2"><i class="fa fa-trash mr-1"></i>Hapus</button>
                          <?php endif; ?>
                            <a type="button" class="btn btn-sm btn-flat btn-info text-decoration-none text-light" href="<?= base_url('materi/belajar?id=').$materi['id'] ?>"><i class="fa fa-book-open mr-1"></i>Mulai Belajar</a>
                        </div>
                </div>
            <?php endforeach; ?>
            
            <div class="card-footer bg-transparent  clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                    <?php if($dataMateri[2] > 1) : ?>
                  <li class="page-item"><a class="page-link page" href="javasript:void(0)" data-page="<?= $dataMateri[2] - 1; ?>">&laquo;</a></li>
                    <?php endif; ?>
                  <?php for ($i=1; $i <= $dataMateri[1]; $i++) : ?>
                    <?php if ($dataMateri[2] == $i) : ?>
                        <li class="page-item active"><a class="page-link page" href="javasript:void(0)" data-page="<?= $i; ?>"><?= $i; ?></a></li>
                    <?php else : ?>
                        <li class="page-item"><a class="page-link page" href="javasript:void(0)" data-page="<?= $i; ?>"><?= $i; ?></a></li>
                    <?php endif; ?>
                  <?php endfor; ?>
                  <?php if($dataMateri[2] < $dataMateri[1]) : ?>
                  <li class="page-item"><a class="page-link page" href="javasript:void(0)" data-page="<?= $dataMateri[2] + 1; ?>">&raquo;</a></li>
                  <?php endif; ?>
                </ul>
              </div>
                      
          </div>