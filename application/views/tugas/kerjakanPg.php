<?php error_reporting(1); ?>
<?php $i=1; ?>
<?php foreach($dataPg as $pg) : ?>
                        <div class="soal d-flex mt-4">
                                <p class=""><?= $i; ?>.</p>
                                <p class="text text-dark text-uppercase"><?= $pg['soal'] ?></p>
                        </div>
                        <div class="jawaban ml-3 d-flex">
                                <a href="javascript:void(0)" id="A" class="pilihan <?php if($pg['id']==$jawabanPg[$i-1]['id_detail_tugas'] && $jawabanPg[$i-1]['jawaban']=="A"){echo "bg-primary";}else{ echo "bg-dark";} ?>" data-jawaban="A" data-id="<?= $pg['id']; ?>">A</a>
                                <p class="text text-dark text-uppercase"><?= $pg['A'] ?></p>
                        </div>
                        <div class="jawaban ml-3 d-flex">
                                <a href="javascript:void(0)" id="B" class="pilihan <?php if($pg['id']==$jawabanPg[$i-1]['id_detail_tugas'] && $jawabanPg[$i-1]['jawaban']=="B"){echo "bg-primary";}else{ echo "bg-dark";} ?>" data-jawaban="B" data-id="<?= $pg['id']; ?>">B</a>
                                <p class="text text-dark text-uppercase"><?= $pg['B'] ?></p>
                        </div>
                        <div class="jawaban ml-3 d-flex">
                                <a href="javascript:void(0)" id="C" class="pilihan <?php if($pg['id']==$jawabanPg[$i-1]['id_detail_tugas'] && $jawabanPg[$i-1]['jawaban']=="C"){echo "bg-primary";}else{ echo "bg-dark";} ?>" data-jawaban="C" data-id="<?= $pg['id']; ?>">C</a>
                                <p class="text text-dark text-uppercase"><?= $pg['C'] ?></p>
                        </div>
                        <div class="jawaban ml-3 d-flex">
                                <a href="javascript:void(0)" id="D" class="pilihan <?php if($pg['id']==$jawabanPg[$i-1]['id_detail_tugas'] && $jawabanPg[$i-1]['jawaban']=="D"){echo "bg-primary";}else{ echo "bg-dark";} ?>" data-jawaban="D" data-id="<?= $pg['id']; ?>">D</a>
                                <p class="text text-dark text-uppercase"><?= $pg['D'] ?></p>
                        </div>
                        <div class="jawaban ml-3 d-flex">
                                <a href="javascript:void(0)" id="E" class="pilihan <?php if($pg['id']==$jawabanPg[$i-1]['id_detail_tugas'] && $jawabanPg[$i-1]['jawaban']=="E"){echo "bg-primary";}else{ echo "bg-dark";} ?>" data-jawaban="E" data-id="<?= $pg['id']; ?>">E</a>
                                <p class="text text-dark text-uppercase"><?= $pg['E'] ?></p>
                        </div>
                     
<?php $i++; ?>
<?php endforeach; ?>
