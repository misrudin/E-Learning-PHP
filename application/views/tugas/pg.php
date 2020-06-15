<table id="tabel1" class="table table-hover text-center m-0">
                        <thead class='bg-dark'>
                        <tr>
                        <th class="text-center" widtn="70px">#</th>
                        <th>SOAL</th>
                        <th>A</th>
                        <th>B</th>
                        <th>C</th>
                        <th>D</th>
                        <th>E</th>
                        <th><i class="fa fa-key"></i></th>
                        <th class="text-center action bg-danger">ACTION</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i=1; ?>
                        <?php foreach ($dataPg[0] as $pg) : ?>
                        <tr>
                            <td class="text-center" widtn="70px"><?= $i ?></td>
                            <td class="text-justify"><?= $pg['soal'] ?></td>
                            <td><?= $pg['A'] ?></td>
                            <td><?= $pg['B'] ?></td>
                            <td><?= $pg['C'] ?></td>
                            <td><?= $pg['D'] ?></td>
                            <td><?= $pg['E'] ?></td>
                            <td><?= $pg['benar'] ?></td>
                            <td>
                                <a href="javascript:void(0)" data-id="<?= $pg['id'] ?>" id="edit"  data-toggle="modal" data-target="#modal-pg" class="badge badge-warning mr-3 edit"><i class="far fa-edit"></i></a>
                                <a href="javascript:void(0)" data-id="<?= $pg['id'] ?>" id="hapus" class="badge badge-danger"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
              <!-- table end -->


              <div class="card-footer bg-transparent  clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                    <?php if($dataPg[2] > 1) : ?>
                  <li class="page-item"><a class="page-link page" href="javasript:void(0)" data-page="<?= $dataPg[2] - 1; ?>">&laquo;</a></li>
                    <?php endif; ?>
                  <?php for ($i=1; $i <= $dataPg[1]; $i++) : ?>
                    <?php if ($dataPg[2] == $i) : ?>
                        <li class="page-item active"><a class="page-link page" href="javasript:void(0)" data-page="<?= $i; ?>"><?= $i; ?></a></li>
                    <?php else : ?>
                        <li class="page-item"><a class="page-link page" href="javasript:void(0)" data-page="<?= $i; ?>"><?= $i; ?></a></li>
                    <?php endif; ?>
                  <?php endfor; ?>
                  <?php if($dataPg[2] < $dataPg[1]) : ?>
                  <li class="page-item"><a class="page-link page" href="javasript:void(0)" data-page="<?= $dataPg[2] + 1; ?>">&raquo;</a></li>
                  <?php endif; ?>
                </ul>
              </div>
          <!-- pagination end -->