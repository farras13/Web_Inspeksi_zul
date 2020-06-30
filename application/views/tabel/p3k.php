<?php $x = $this->session->userdata('datauser'); ?>
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <!-- DATA TABLE -->
                    <h3 class="title-5 m-b-35">Data Table P3K</h3>
                    <div class="table-data__tool">
                        <div class="table-data__tool-left">
                            <form action="<?= base_url('inspeksi/p3k') ?>" method="POST">
                                <div class="rs-select2--light rs-select2--md">
                                    <select class="js-select2" name="filter" id="filter">
                                        <option value="b">Bulan</option>
                                        <option value="s">Status</option>
                                    </select>
                                    <div class="dropDownSelect2"></div>
                                </div>
                                <div class="rs-select2--light rs-select2--sm" id="bln">
                                    <select class="js-select2" name="time" id="time">
                                        <?php $a = date('Y');
                                        for ($i = 1; $i < 13; $i++) : ?>
                                            <option <?php if ($f == $i) echo 'selected'; ?> value="<?= date('Y-m-d', strtotime($a . '-' . $i . '-01')); ?>"><?= date('F', strtotime($a . '-' . $i . '-01')); ?></option>
                                        <?php endfor; ?>
                                    </select>
                                    <div class="dropDownSelect2"></div>
                                </div>
                                <div class="rs-select2--light rs-select2--sm" id="order">
                                    <select class="js-select2" name="order" id="ord-select">
                                        <option value="">Choose</option>
                                        <option value="1">valid</option>
                                        <option value="0">proses</option>
                                        <option value="2">denied</option>
                                    </select>
                                    <div class="dropDownSelect2"></div>
                                </div>
                                <button class="au-btn-filter">
                                    <i class="zmdi zmdi-filter-list"></i>filters</button>
                            </form>
                        </div>

                        <div class="table-data__tool-right">
                            <?php if ($x['level'] == 1) { ?>
                                <form action="<?= base_url('Export/p3k')?>" method="GET">
                                    <input type="hidden" name="tgle" id="tgle" <?php if ($f != null) { ?>value="<?= date('Y-m-d', strtotime($a . '-' . $f . '-01')); ?>" <?php } ?>>
                                    <input type="hidden" name="orde" id="orde" <?php if ($s != null) { ?>value="<?= $s; ?>" <?php } ?>>
                                    <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                        Export Excel</button>
                                </form>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="table-responsive table-responsive-data2">
                        <table class="table table-data2">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">LOKASI</th>
                                    <th class="text-center">STOK/ADD</th>
                                    <th class="text-center">PICTURE</th>
                                    <th class="text-center">PETUGAS</th>
                                    <th class="text-center">TANGGAL INSPEKSI</th>
                                    <th class="text-center">STATUS</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($pks as $a) : ?>
                                    <tr class="tr-shadow">
                                        <td class="text-center"><?= $i; ?></td>
                                        <td class="text-center"><?= $a->lokasi; ?></td>
                                        <td>
                                            <span class="block-email" data-toggle="modal" data-target="#newSubMenuModal<?= $a->id_p3k; ?>">DETAIL</span>
                                        </td>
                                        <!-- <td class="desc">Samsung S8 Black</td> -->
                                        <td><center><img height="60px" width="60px" src="<?= base_url('uploads/') . $a->gambar; ?>" alt="<?= $a->gambar; ?>"></center></td>
                                        <td class="text-center"><?= $a->checked_by; ?></td>
                                        <td class="text-center"><?= $a->inspect_date; ?></td>
                                        <td class="text-center">
                                            <?php if ($a->status == 1) : ?>
                                                <span class="status--process">Valid</span>
                                            <?php elseif ($a->status == 0) :  ?>
                                                <span class="status--process">Processed</span>
                                            <?php else :  ?>
                                                <span class="status--denied">Denied</span>
                                            <?php endif; ?>
                                        </td>
                                        <?php if ($x['level'] != 0) { ?>
                                            <td>
                                                <div class="table-data-feature">
                                                    <?php if ($x['level'] == 2) { ?>
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="accept">
                                                            <a href="<?= base_url('inspeksi/cs/5/a/') . $a->id_p3k; ?>"><i class="zmdi zmdi-check"></i></a>
                                                        </button>
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="decline">
                                                            <a href="<?= base_url('inspeksi/cs/5/b/') . $a->id_p3k; ?>"><i class="zmdi zmdi-block-alt"></i></a>
                                                        </button>
                                                    <?php } elseif ($x['level'] == 1) { ?>
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                            <a href="<?= base_url('inspeksi/edit_p3k/') . $a->id_p3k; ?>"><i class="zmdi zmdi-edit"></i></a>
                                                        </button>
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                            <a href="<?= base_url('inspeksi/delp3k/') . $a->id_p3k; ?>"><i class="zmdi zmdi-delete"></i></a>
                                                        </button>
                                                    <?php } ?>
                                                </div>
                                            </td>
                                        <?php } ?>
                                    </tr>
                                    <tr class="spacer"></tr>
                                <?php $i++;
                                endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- END DATA TABLE -->
                </div>
            </div>
        </div>
    </div>
</div>
<?php $i = 1;
foreach ($pks as $a) : ?>
    <!-- detail Modal -->
    <div class="modal fade" id="newSubMenuModal<?= $a->id_p3k; ?>" tabindex="-1" role="dialog" aria-labelledby="newSubMenuModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newSubMenuModalLabel">Add New Jadwal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="table-responsive table-data">
                    <table class="table">
                        <thead>
                            <tr>
                                <td class="text-center">Jenis Obat</td>
                                <td class="text-center">Stok</td>
                                <td class="text-center">Add</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($pk as $d) : if ($d->id_p3k == $a->id_p3k) : ?>
                                    <tr>
                                        <td class="text-center"><?= $d->list_p3k; ?></td>
                                        <td class="text-center"><?= $d->stok; ?></td>
                                        <td class="text-center"><?= $d->add; ?></td>
                                    </tr>
                            <?php endif;
                            endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<!-- detail Modal -->
<div class="modal fade" id="editp3k" tabindex="-1" role="dialog" aria-labelledby="editp3k" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editp3k">Add New Jadwal</h5>
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