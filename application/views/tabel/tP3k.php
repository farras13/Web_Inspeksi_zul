<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive table--no-card m-b-30">
                        <button class="au-btn au-btn-icon au-btn--green au-btn--small" data-toggle="modal" data-target="#newSubMenuModal">
                            <i class="zmdi zmdi-plus"></i>add item</button>
                        <table class="table table-borderless  table-striped table-earning">
                            <thead>
                                <tr>
                                    <th rowspan="3" class="text-center">#</th>
                                    <th rowspan="3" class="text-center">Lokasi</th>
                                    <th colspan="42" class="text-center">Jenis Obat</th>
                                    <th rowspan="3" class="text-center">assa</th>
                                </tr>
                                <tr>

                                    <?php $i = 1;
                                    foreach ($pk as $p) : ?>
                                        <th class="text-center" colspan="2"><?= $p->list_p3k; ?></th>
                                    <?php $i++;
                                    endforeach; ?>

                                </tr>
                                <tr>
                                    <?php $i = 1;
                                    foreach ($pk as $p) : ?>
                                        <th class="text-center">stok</th>
                                        <th class="text-center">add</th>
                                    <?php $i++;
                                    endforeach; ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1; foreach($pks as $s) : ?>
                                    <tr>
                                        <td><?= $s->id_p3k; ?></td>
                                        <td><?= $s->lokasi; ?></td>
                                        <?php foreach ($pkd as $k) : ?>
                                            <td><?= $k->stok; ?></td> 
                                            <td><?= $k->add; ?></td>
                                        <?php endforeach; ?>
                                        <td><?= $i; ?></td>
                                    </tr>
                                <?php $i++; endforeach;?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="newSubMenuModal" tabindex="-1" role="dialog" aria-labelledby="newSubMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newSubMenuModalLabel">Add New Jadwal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo base_url('Home/ins_jdl'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="date" class="form-control" id="tgl" name="tgl" min="<?= date('Y-m-d'); ?>">
                    </div>
                    <div class="form-group">
                        <select name="jdl" id="jdl" class="form-control">
                            <option value="">Select Inspeksi</option>
                            <option value="Apar">Apar</option>
                            <option value="Detektor">Detektor</option>
                            <option value="Hidran">Hidran</option>
                            <option value="P3K">P3K</option>
                            <option value="SHK">SHK</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Penanggung Jawab">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>