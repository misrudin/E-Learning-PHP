<table id="tabel1" class="table table-bordered table-hover">
                <thead class='bg-dark'>
                <tr>
                  <th class="text-center" width="70px">#</th>
                  <th>NIS</th>
                  <th>NAMA</th>
                  <th>KELAS</th>
                  <th>EMAIL</th>
                  <th class="text-center action bg-danger">ACTION</th>
                </tr>
                </thead>
                <tbody?>
                    <?php $i=1; ?>
               <?php foreach ($dataSiswa[0] as $siswa) : ?>
                <tr>
                  <td class="text-center"><?= $i ?></td>
                  <td><?= $siswa['nis'] ?></td>
                  <td><?= $siswa['nama'] ?></td>
                  <td><?= $siswa['nama_kelas'] ?></td>
                  <td class="email"><?= $siswa['email'] ?></td>
                  <td class="text-center">
                            <a href="javascript:void(0)" data-id="<?= $siswa['id'] ?>" id="edit"  data-toggle="modal" data-target="#modal-input" class="badge badge-warning mr-3 editSiswa"><i class="far fa-edit"></i></a>
                            <a href="javascript:void(0)" data-id="<?= $siswa['id'] ?>" id="hapus" class="badge badge-danger"><i class="fas fa-trash-alt"></i></a>
                </td>
                </tr>
                <?php $i++; ?>
                <?php endforeach ?>
                </tbody>
              </table>
            </div>

            <div class="card-footer bg-transparent  clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                    <?php if($dataSiswa[2] > 1) : ?>
                  <li class="page-item"><a class="page-link page" href="javasript:void(0)" data-page="<?= $dataSiswa[2] - 1; ?>">&laquo;</a></li>
                    <?php endif; ?>
                  <?php for ($i=1; $i <= $dataSiswa[1]; $i++) : ?>
                    <?php if ($dataSiswa[2] == $i) : ?>
                        <li class="page-item active"><a class="page-link page" href="javasript:void(0)" data-page="<?= $i; ?>"><?= $i; ?></a></li>
                    <?php else : ?>
                        <li class="page-item"><a class="page-link page" href="javasript:void(0)" data-page="<?= $i; ?>"><?= $i; ?></a></li>
                    <?php endif; ?>
                  <?php endfor; ?>
                  <?php if($dataSiswa[2] < $dataSiswa[1]) : ?>
                  <li class="page-item"><a class="page-link page" href="javasript:void(0)" data-page="<?= $dataSiswa[2] + 1; ?>">&raquo;</a></li>
                  <?php endif; ?>
                </ul>
              </div>