<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">Inspeksi Apar</div>
                        <div class="card-body">
                            <div class="card-title">
                                <h3 class="text-center title-2">APAR INSPEKSI</h3>
                            </div>
                            <hr>
                            <?php foreach($ap as $a): ?>
                            <form action="<?= base_url('inspeksi/updateData'); ?>" method="post">
                                <div class="row">
                                    <input name="id" value="<?= $a->id_apar; ?>" type="text" hidden>
                                    <input name="jpos" value="APAR" type="text" hidden>
                                    <div class="col-6">
                                        <label for="Petugas" class="control-label mb-1">Petugas</label>
                                        <div class="input-group">
                                            <input id="Petugas" name="Petugas" type="text" class="form-control cc-cvc" value="<?= $a->petugas; ?>">
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label for="Fire" class="control-label mb-1">Fire Extinguisher</label>
                                    <input id="Fire" name="Fire" type="text" class="form-control" value="<?= $a->fire_extinguisher; ?>">
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="Refilling" class="control-label mb-1">Refilling</label>
                                            <input id="Refilling" name="Refilling" type="date" class="form-control Refilling" value="<?= date('Y-m-d',strtotime($a->tgl_refil)) ; ?>">
                                            <!-- <span class="help-block" data-valmsg-for="Refilling" data-valmsg-replace="true"></span> -->
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="berlaku" class="control-label mb-1">Masa berlaku</label>
                                            <input id="berlaku" name="berlaku" type="date" class="form-control berlaku" value="<?= date('Y-m-d',strtotime($a->tgl_berlaku)) ; ?>">
                                            <span class="help-block" data-valmsg-for="berlaku" data-valmsg-replace="true"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="Tabung" class="control-label mb-1">Kondisi Tabung</label>
                                            <input id="Tabung" name="Tabung" type="text" class="form-control Tabung" value="<?= $a->kondisi_tabung ?>">
                                            <!-- <span class="help-block" data-valmsg-for="Tabung" data-valmsg-replace="true"></span> -->
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="Hose" class="control-label mb-1">Hose</label>
                                            <input id="Hose" name="Hose" type="text" class="form-control Hose" value="<?= $a->hose ?>">
                                            <!-- <span class="help-block" data-valmsg-for="Hose" data-valmsg-replace="true"></span> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="Pen" class="control-label mb-1">Pen Pengaman</label>
                                            <input id="Pen" name="Pen" type="text" class="form-control Pen" value="<?= $a->pen_pengaman ?>">
                                            <!-- <span class="help-block" data-valmsg-for="Pen" data-valmsg-replace="true"></span> -->
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <label for="Segel" class="control-label mb-1">Segel Pengaman</label>
                                        <div class="input-group">
                                            <input id="Segel" name="Segel" type="text" class="form-control cc-cvc" value="<?= $a->segel_pengaman ?>">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <label for="Pressure" class="control-label mb-1">Pressure </label>
                                        <div class="input-group">
                                            <input id="Pressure" name="Pressure" type="text" class="form-control cc-cvc" value="<?= $a->pressure ?>">
                                        </div>
                                    </div>
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