<!-- PAGE CONTENT-->
<div class="page-content--bgf7">
    <!-- DATA TABLE-->
    <section class="p-t-20">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="title-5 m-b-35">data table</h3>
                    <div class="table-data__tool">
                        <div class="table-data__tool-left">
                            <form action="<?= base_url('home/jadwal') ?>">
                                <div class="rs-select2--light rs-select2--md">
                                    <select class="js-select2" name="time">
                                        <option value="1">Today</option>
                                        <option value="3">3 Days</option>
                                        <option value="7">1 Week</option>
                                    </select>
                                    <div class="dropDownSelect2"></div>
                                </div>
                                <button class="au-btn-filter">
                                    <i class="zmdi zmdi-filter-list"></i>filters
                                </button>
                            </form>
                        </div>
                        <?php $a = $this->session->userdata('datauser');
                        if ($a['level'] == 0) { ?>
                            <div class="table-data__tool-right">
                                <button class="au-btn au-btn-icon au-btn--green au-btn--small" data-toggle="modal" data-target="#newSubMenuModal">
                                    <i class="zmdi zmdi-plus"></i>add item</button>
                                <div class="rs-select2--dark rs-select2--sm rs-select2--dark2">
                                    <select class="js-select2" name="type">
                                        <option selected="selected">Export</option>
                                        <option value="">Option 1</option>
                                        <option value="">Option 2</option>
                                    </select>
                                    <div class="dropDownSelect2"></div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <?php if ($tbl != null) : ?>
                        <div class="table-responsive table-responsive-data2">
                            <table class="table table-data2">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Kategori</th>
                                        <!-- <th>Penanggung Jawab</th> -->
                                        <th>date</th>
                                        <th>status</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $n = 1;
                                    foreach ($tbl as $t) : ?>
                                        <tr class="tr-shadow">
                                            <td><?= $n; ?></td>
                                            <td><?= $t->keterangan; ?></td>

                                            <td class="desc"><?= date('d M Y', strtotime($t->jadwal)); ?></td>
                                            <td>
                                                <?php if (date('Y-m-d') == $t->jadwal) : ?>
                                                    <span class="status--process">Today</span>
                                                <?php elseif (date('Y-m-d') < $t->jadwal) :  ?>
                                                    <span class="status--process">Processed</span>
                                                <?php elseif (date('Y-m-d') > $t->jadwal) :  ?>
                                                    <span class="status--denied">Expired</span>
                                                <?php endif; ?>
                                            </td>
                                            <?php if ($a['level'] == 0) { ?>
                                                <td>
                                                    <div class="table-data-feature">

                                                        <button class="item" data-toggle="modal" data-placement="top" title="Edit" data-target="#edtModal<?= $t->id_jadwal; ?>">
                                                            <i class="zmdi zmdi-edit"></i>
                                                        </button>
                                                        <a href="<?= base_url('Home/del_jdl/') . $t->id_jadwal; ?>" class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                            <i class="zmdi zmdi-delete"></i>
                                                        </a>

                                                    </div>
                                                </td>
                                            <?php } ?>
                                        </tr>
                                    <?php $n++;
                                    endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php else : ?>
                        <center><img src="<?= base_url('assets/images/bg1.png') ?>"></center>
                    <?php endif; ?>
                </div>
                <!-- END DATA TABLE-->
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
                                        <input type="date" class="form-control" id="tgl" name="tgl" min="<?= date('Y-m-d'); ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <select name="jdl" id="jdl" class="form-control" required>
                                            <option value="">Select Inspeksi</option>
                                            <option value="Apar">Apar</option>
                                            <option value="Detektor">Detektor</option>
                                            <option value="Hidran">Hidran</option>
                                            <option value="P3K">P3K</option>
                                            <option value="SHK">SHK</option>
                                        </select>
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

                <!-- Modal -->
                <?php foreach ($tbl as $t) : ?>
                    <div class="modal fade" id="edtModal<?= $t->id_jadwal; ?>" tabindex="-1" role="dialog" aria-labelledby="edtModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="edtSubMenuModalLabel">Edit Jadwal</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="<?php echo base_url('Home/edt_jdl'); ?>" method="post">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <input type="text" name="id" value="<?= $t->id_jadwal; ?>" hidden>
                                            <input type="date" class="form-control" id="tgl" name="tgl" min="<?= date('Y-m-d'); ?>" value="<?= $t->jadwal; ?>">
                                        </div>
                                        <div class="form-group">
                                            <select name="jdl" id="jdl" class="form-control">
                                                <?php if ($t->keterangan == "Apar") : ?>
                                                    <option value="Apar" selected>Apar</option>
                                                    <option value="Detektor">Detektor</option>
                                                    <option value="Hidran">Hidran</option>
                                                    <option value="P3K">P3K</option>
                                                    <option value="SHK">SHK</option>
                                                <?php elseif ($t->keterangan == "Detektor") : ?>
                                                    <option value="Apar">Apar</option>
                                                    <option value="Detektor" selected>Detektor</option>
                                                    <option value="Hidran">Hidran</option>
                                                    <option value="P3K">P3K</option>
                                                    <option value="SHK">SHK</option>
                                                <?php elseif ($t->keterangan == "Hidran") : ?>
                                                    <option value="Apar">Apar</option>
                                                    <option value="Detektor">Detektor</option>
                                                    <option value="Hidran" selected>Hidran</option>
                                                    <option value="P3K">P3K</option>
                                                    <option value="SHK">SHK</option>
                                                <?php elseif ($t->keterangan == "P3k") : ?>
                                                    <option value="Apar">Apar</option>
                                                    <option value="Detektor">Detektor</option>
                                                    <option value="Hidran">Hidran</option>
                                                    <option value="P3K" selected>P3K</option>
                                                    <option value="SHK">SHK</option>
                                                <?php else : ?>
                                                    <option value="Apar">Apar</option>
                                                    <option value="Detektor">Detektor</option>
                                                    <option value="Hidran">Hidran</option>
                                                    <option value="P3K">P3K</option>
                                                    <option value="SHK" selected>SHK</option>
                                                <?php endif; ?>
                                            </select>
                                        </div>
                                        <!-- <div class="form-group">
                                        <?php foreach ($pj as $p) : if ($t->id_jadwal == $p->id_jadwal) : ?>
                                        <input type="text" class="form-control" id="name" name="name" value="<?= $p->nama; ?>">
                                        <?php endif;
                                        endforeach; ?>
                                    </div> -->
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Edit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>