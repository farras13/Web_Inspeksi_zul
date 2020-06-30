<!-- PAGE CONTENT-->
<div class="page-content--bgf7">
    <!-- DATA TABLE-->
    <section class="p-t-20">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="title-5 m-b-35">Data Table User</h3>
                    <div class="table-data__tool">
                        <div class="table-data__tool-left">       </div>
                        <?php $a = $this->session->userdata('datauser');
                        if ($a['level'] == 0) { ?>
                            <div class="table-data__tool-right">
                                <button class="au-btn au-btn-icon au-btn--green au-btn--small" data-toggle="modal" data-target="#newSubMenuModal">
                                    <i class="zmdi zmdi-plus"></i>add item</button>
                            </div>
                        <?php } ?>
                    </div>
                    <?php if ($usr != null) : ?>
                        <div class="table-responsive table-responsive-data2">
                            <table class="table table-data2">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>username</th>
                                        <th>status</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $n = 1;
                                    foreach ($usr as $t) : ?>
                                        <tr class="tr-shadow">
                                            <td><?= $n; ?></td>
                                            <td><?= $t->username; ?></td>
                                            <td>
                                                <?php if ($t->level == 0) : ?>
                                                    <span class="status--process">Admin</span>
                                                <?php elseif ($t->level == 1) : ?>
                                                    <span class="status--process">Inspektor</span>
                                                <?php else :  ?>
                                                    <span class="status--process">Supervisor</span>
                                                <?php endif; ?>
                                            </td>
                                            <?php if ($a['level'] == 0) { ?>
                                                <td>
                                                    <div class="table-data-feature">

                                                        <button class="item" data-toggle="modal" data-placement="top" title="Edit" data-target="#edtModal<?= $t->id_user; ?>">
                                                            <i class="zmdi zmdi-edit"></i>
                                                        </button>
                                                        <a href="<?= base_url('Home/del_usr/') . $t->id_user; ?>" class="item" data-toggle="tooltip" data-placement="top" title="Delete">
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
                            <form action="<?php echo base_url('Home/ins_usr'); ?>" method="post">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="tgl" name="usr" placeholder="username" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" id="tgl" name="pass" placeholder="password" minlength="8" required>
                                    </div>
                                    <div class="form-group">
                                        <select name="lvl" id="jdl" class="form-control" required>
                                            <option value="0">Admin</option>
                                            <option value="1">Inspektor</option>
                                            <option value="2">Supervisor</option>
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
                <?php foreach ($usr as $t) : ?>
                    <div class="modal fade" id="edtModal<?= $t->id_user; ?>" tabindex="-1" role="dialog" aria-labelledby="edtModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="edtSubMenuModalLabel">Edit User</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="<?php echo base_url('Home/edt_usr'); ?>" method="post">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <input type="text" name="id" value="<?= $t->id_user; ?>" hidden>
                                            <input type="text" class="form-control" id="tgl" name="usr" value="<?= $t->username; ?>">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="tgl" name="pass" minlength="8" value="<?= $t->password; ?>">
                                        </div>
                                        <div class="form-group">
                                            <select name="lvl" id="jdl" class="form-control">
                                                <?php if ($t->level == "0") : ?>
                                                    <option value="0" selected>Admin</option>
                                                    <option value="1">Insepktor</option>
                                                    <option value="2">Supervisor</option>
                                                <?php elseif ($t->keterangan == "1") : ?>
                                                    <option value="0">Admin</option>
                                                    <option value="1" selected>Insepktor</option>
                                                    <option value="2">Supervisor</option>
                                                <?php else : ?>
                                                    <option value="0">Admin</option>
                                                    <option value="1">Insepktor</option>
                                                    <option value="2" selected>Supervisor</option>
                                                <?php endif; ?>
                                            </select>
                                        </div>
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