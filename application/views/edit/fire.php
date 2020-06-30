<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong>Fire Alarm</strong>
                            <small> Form</small>
                        </div>
                        <div class="card-body card-block">
                            <div class="card-title">
                                <h3 class="text-center title-2">Fire Alarm INSPEKSI</h3>
                            </div>
                            <hr>
                            <?php foreach($fa as $a): ?>
                            <form action="<?= base_url('inspeksi/updateData'); ?>" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <input type="hidden" name="id" value="<?= $a->id_fa ?>">
                                    <input type="hidden" name="jpos" value="FIRE">
                                    <div class="col-6">
                                        <label for="Petugas" class="control-label mb-1">Petugas</label>
                                        <div class="input-group">
                                            <input id="Petugas" name="Petugas" type="text" class="form-control cc-cvc" value="<?= $a->petugas ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <label for="Petugas" class="control-label mb-1">Lokasi</label>
                                        <div class="input-group">
                                            <input id="Lokasi" name="Lokasi" type="text" class="form-control cc-cvc" value="<?= $a->lokasi ?>" required>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label for="Peralatan" class="control-label mb-1">Peralatan</label>
                                    <input id="Peralatan" name="Peralatan" type="text" class="form-control" value="<?= $a->peralatan ?>" required>
                                </div>
                                <div class="row form-group">
                                    <div class="col-3">
                                        <label for="jumlah" class="control-label mb-1">jumlah instalasi</label>
                                        <div class="input-group">
                                            <input id="jumlah" name="jumlah" type="number" class="form-control cc-cvc" value="<?= $a->jumlah_instalasi ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <label for="Smoke" class="control-label mb-1">Smoke</label>
                                        <div class="input-group">
                                            <input id="Smoke" name="Smoke" type="number" class="form-control cc-cvc" value="<?= $a->smoke ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <label for="Heat" class="control-label mb-1">Heat</label>
                                        <div class="input-group">
                                            <input id="Heat" name="Heat" type="number" class="form-control cc-cvc" value="<?= $a->heat ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <label for="equip" class="control-label mb-1">Equip</label>
                                        <div class="input-group">
                                            <input id="equip" name="equip" type="number" class="form-control cc-cvc" value="<?= $a->equip ?>" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label class=" form-control-label">Kondisi Peralatan</label>
                                    </div>
                                    <div class="col col-md-9">
                                        <div class="form-check-inline form-check">
                                            <label for="inline-radio1" class="form-check-label ">
                                                
                                                <input type="radio" id="inline-radio1" name="Kondisi" value="Baik" class="form-check-input" <?php echo ($a->kondisi_peralatan == 'Baik') ?  "checked" : "" ;  ?>>Baik
                                            </label>&nbsp;
                                            <label for="inline-radio2" class="form-check-label ">
                                                <input type="radio" id="inline-radio2" name="Kondisi" value="Rusak" class="form-check-input" <?php echo ($a->kondisi_peralatan != 'Baik') ?  "checked" : "" ;  ?>>Rusak
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="Keterangan" class="control-label mb-1">Keterangan</label>
                                    <textarea name="Keterangan" id="Keterangan" rows="9" placeholder="Keterangan..." class="form-control" required><?= $a->keterangan ?></textarea>
                                </div>
                                <div class="row form-group">
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