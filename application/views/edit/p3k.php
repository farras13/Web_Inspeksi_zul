<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong>P3K</strong>
                            <small> Form</small>
                        </div>
                        <div class="card-body card-block">
                            <div class="card-title">
                                <h3 class="text-center title-2">FORM P3K INSPEKSI</h3>
                            </div>
                            <hr>
                            <?php foreach($pk as $a): ?>
                            <form action="<?= base_url('inspeksi/updateData'); ?>" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <input type="hidden" name="id" value="<?= $a->id_p3k ?>">
                                    <input type="hidden" name="jpos" value="P3K">
                                    <div class="col-6">
                                        <label for="Petugas" class="control-label mb-1">Petugas</label>
                                        <div class="input-group">
                                            <input id="Petugas" name="Petugas" type="text" class="form-control cc-cvc" value="<?= $a->checked_by ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <label for="Lokasi" class="control-label mb-1">Lokasi</label>
                                        <div class="input-group">
                                            <input id="Lokasi" name="Lokasi" type="text" class="form-control cc-cvc" value="<?= $a->lokasi ?>" required>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <table class="table table-borderless" style="margin:10px">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>jenis obat</th>
                                                <th>stok</th>
                                                <th>add</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1;
                                            foreach ($pkd as $p) : if($a->id_p3k == $p->id_p3k){?>
                                                <tr>
                                                    <input type="hidden" name="idd<?= $i; ?>" value="<?= $p->id_detail ?>">
                                                    <td><?= $i ?></td>
                                                    <td><?= $p->list_p3k ?></td>
                                                    <td><input name="stok<?= $i; ?>" type="text" class="form-control cc-cvc" value="<?= $p->stok ?>" required></td>
                                                    <td><input name="add<?= $i; ?>" type="text" class="form-control cc-cvc" value="<?= $p->add ?>" required></td>
                                                </tr>
                                            <?php } $i++;
                                            endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="form-group">
                                    <label for="pict" class="control-label mb-1">Photo</label>
                                    <input id="pict" name="pict" type="file" class="form-control" accept="image/*">
                                </div>
                                <div>
                                    <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                        <span id="payment-button-amount">Submit</span>
                                    </button>
                                </div>
                            </form>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>