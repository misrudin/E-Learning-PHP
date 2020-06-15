<table id="tabel1" class="table table-hover text-center m-0">
                <thead class='bg-dark'>
                <tr>
                  <th class="text-center" widtn="70px">#</th>
                  <th>SOAL</th>
                  <th class="text-center action bg-danger">ACTION</th>
                </tr>
                </thead>
                <tbody>
                <?php $i=1; ?>
                <?php foreach ($dataEsay[0] as $esay) : ?>
                <tr>
                    <td class="text-center" widtn="70px"><?= $i ?></td>
                    <td class="text-justify"><?= $esay['soal'] ?></td>
                    <td>
                        <a href="javascript:void(0)" data-id="<?= $esay['id'] ?>" id="edit"  data-toggle="modal" data-target="#modal-input" class="badge badge-warning mr-3 edit"><i class="far fa-edit"></i></a>
                        <a href="javascript:void(0)" data-id="<?= $esay['id'] ?>" id="hapus" class="badge badge-danger"><i class="fas fa-trash-alt"></i></a>
                    </td>
                </tr>
                    <?php $i++; ?>
                <?php endforeach; ?>
                </tbody>
              </table>
    
<!-- table end -->


<div class="card-footer bg-transparent  clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                    <?php if($dataEsay[2] > 1) : ?>
                  <li class="page-item"><a class="page-link page" href="javasript:void(0)" data-page="<?= $dataEsay[2] - 1; ?>">&laquo;</a></li>
                    <?php endif; ?>
                  <?php for ($i=1; $i <= $dataEsay[1]; $i++) : ?>
                    <?php if ($dataEsay[2] == $i) : ?>
                        <li class="page-item active"><a class="page-link page" href="javasript:void(0)" data-page="<?= $i; ?>"><?= $i; ?></a></li>
                    <?php else : ?>
                        <li class="page-item"><a class="page-link page" href="javasript:void(0)" data-page="<?= $i; ?>"><?= $i; ?></a></li>
                    <?php endif; ?>
                  <?php endfor; ?>
                  <?php if($dataEsay[2] < $dataEsay[1]) : ?>
                  <li class="page-item"><a class="page-link page" href="javasript:void(0)" data-page="<?= $dataEsay[2] + 1; ?>">&raquo;</a></li>
                  <?php endif; ?>
                </ul>
              </div>
<!-- pageinaton end -->