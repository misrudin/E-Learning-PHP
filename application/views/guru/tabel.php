<table id="tabel1" class="table table-bordered table-hover">
                <thead class='bg-dark'>
                <tr>
                  <th class="text-center" width="70px">#</th>
                  <th>NIP</th>
                  <th>NAMA</th>
                  <th>EMAIL</th>
                  <th class="text-center action bg-danger">ACTION</th>
                </tr>
                </thead>
                <tbody>
                    <?php $i=1; ?>
               <?php foreach ($dataGuru[0] as $guru) : ?>
                <tr>
                  <td class="text-center"><?= $i ?></td>
                  <td><?= $guru['nip'] ?></td>
                  <td><?= $guru['nama_guru'] ?></td>
                  <td class="email"><?= $guru['email'] ?></td>
                  <td class="text-center">
                  <a href="javascript:void(0)" data-id="<?= $guru['id'] ?>" id="edit"  data-toggle="modal" data-target="#modal-input" class="badge badge-warning mr-3 edit"><i class="far fa-edit"></i></a>
                   <a href="javascript:void(0)" data-id="<?= $guru['id'] ?>" id="hapus" class="badge badge-danger"><i class="fas fa-trash-alt"></i></a>
                </td>
                </tr>
                <?php $i++; ?>
                <?php endforeach ?>
                </tbody>
              </table>

            <div class="card-footer bg-transparent  clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                    <?php if($dataGuru[2] > 1) : ?>
                  <li class="page-item"><a class="page-link page2" href="javasript:void(0)" data-page="<?= $dataGuru[2] - 1; ?>">&laquo;</a></li>
                    <?php endif; ?>
                  <?php for ($i=1; $i <= $dataGuru[1]; $i++) : ?>
                    <?php if ($dataGuru[2] == $i) : ?>
                        <li class="page-item active"><a class="page-link page2" href="javasript:void(0)" data-page="<?= $i; ?>"><?= $i; ?></a></li>
                    <?php else : ?>
                        <li class="page-item"><a class="page-link page2" href="javasript:void(0)" data-page="<?= $i; ?>"><?= $i; ?></a></li>
                    <?php endif; ?>
                  <?php endfor; ?>
                  <?php if($dataGuru[2] < $dataGuru[1]) : ?>
                  <li class="page-item"><a class="page-link page2" href="javasript:void(0)" data-page="<?= $dataGuru[2] + 1; ?>">&raquo;</a></li>
                  <?php endif; ?>
                </ul>
              </div>