<?php error_reporting(1); ?>
<?php $i=1; ?>
<?php foreach($dataEsay as $esay) : ?>

                        <div class="soal d-flex mt-4">
                                <p class=""><?= $i; ?>.</p>
                                <p class="text text-dark text-uppercase"><?= $esay['soal'] ?></p>
                        </div>
                        <div class="jawaban d-flex ml-3 p-0">
                        <div class="col-12">
                              <form class="form-horizontal">
                                    <div class="col-12">
                                          <div class="form-group mx-0">
                                                <label>Jawaban</label>
                                                <textarea class="form-control" rows="2" name="jawaban"><?= $jawabanEsay[$i-1]['jawaban'] ?></textarea>
                                          </div>
                                    </div>
                                    <button type="button" data-id="<?= $esay['id']; ?>" class="ml-2 btn btn-warning btn-sm jawabesay"><i class="mr-1 fa fa-check"></i>Simpan Jawaban</button>
                              </form>
                              </div>
                        </div>

<?php $i++; ?>
<?php endforeach; ?>