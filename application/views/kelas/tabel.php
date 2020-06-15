<table id="tabel1" class="table table-bordered table-hover">
                <thead class='bg-dark'>
                <tr>
                  <th width="70px" class="text-center">#</th>
                  <th>KELAS</th>
                  <th class="text-center action bg-danger">ACTION</th>
                </tr>
                </thead>
                <tbody?>
                    <?php $i=1; ?>
               <?php foreach ($dataKelas[0] as $kelas) : ?>
                <tr>
                  <td class="text-center"><?= $i ?></td>
                  <td><?= $kelas['nama_kelas'] ?></td>
                  <td class="text-center">
                        <a href="javascript:void(0)" data-id="<?= $kelas['id'] ?>" id="edit"  data-toggle="modal" data-target="#modal-input" class="badge badge-warning mr-3 editKelas"><i class="far fa-edit"></i></a>
                        <a href="javascript:void(0)" data-id="<?= $kelas['id'] ?>" id="hapus" class="badge badge-danger"><i class="fas fa-trash-alt"></i></a>
                </td>
                </tr>
                <?php $i++; ?>
                <?php endforeach ?>
                </tbody>
              </table>
     
            <div class="card-footer bg-transparent  clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                    <?php if($dataKelas[2] > 1) : ?>
                  <li class="page-item"><a class="page-link page" href="javasript:void(0)" data-page="<?= $dataKelas[2] - 1; ?>">&laquo;</a></li>
                    <?php endif; ?>
                  <?php for ($i=1; $i <= $dataKelas[1]; $i++) : ?>
                    <?php if ($dataKelas[2] == $i) : ?>
                        <li class="page-item active"><a class="page-link page" href="javasript:void(0)" data-page="<?= $i; ?>"><?= $i; ?></a></li>
                    <?php else : ?>
                        <li class="page-item"><a class="page-link page" href="javasript:void(0)" data-page="<?= $i; ?>"><?= $i; ?></a></li>
                    <?php endif; ?>
                  <?php endfor; ?>
                  <?php if($dataKelas[2] < $dataKelas[1]) : ?>
                  <li class="page-item"><a class="page-link page" href="javasript:void(0)" data-page="<?= $dataKelas[2] + 1; ?>">&raquo;</a></li>
                  <?php endif; ?>
                </ul>
              </div>