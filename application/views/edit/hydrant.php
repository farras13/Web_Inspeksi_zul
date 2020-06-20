<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong>Hidran</strong>
                            <small> Form</small>
                        </div>
                        <div class="card-body card-block">
                            <div class="card-title">
                                <h3 class="text-center title-2">Hidran INSPEKSI</h3>
                            </div>
                            <hr>
                            <?php foreach($hy as $a): ?>
                            <form action="<?= base_url('inspeksi/updateData'); ?>" method="post">
                                <div class="row form-group">
                                    <input type="hidden" name="id" value="<?= $a->id_hydrant ?>">
                                    <input type="hidden" name="jpos" value="HYDRANT">
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
                                    <label for="Hydrant" class="control-label mb-1">Hydrant</label>
                                    <input id="Hydrant" name="Hydrant" type="text" class="form-control" value="<?= $a->hydrant ?>" required>
                                </div>
                                <div class="row form-group">
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="Pipe" class="control-label mb-1">Pipe Hydrant</label>
                                            <input id="Pipe" name="Pipe" type="text" class="form-control Refilling" value="<?= $a->pipe_hydrant ?>" required>
                                            <!-- <span class="help-block" data-valmsg-for="Refilling" data-valmsg-replace="true"></span> -->
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="Valve" class="control-label mb-1">Valve Hydrant</label>
                                            <input id="Valve" name="Valve" type="text" class="form-control berlaku" value="<?= $a->valve_hydrant ?>" required>
                                            <!-- <span class="help-block" data-valmsg-for="berlaku" data-valmsg-replace="true"></span> -->
                                        </div>
                                    </div>

                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="Hose" class="control-label mb-1">Hose Hydrant</label>
                                            <input id="Hose" name="Hose" type="text" class="form-control berlaku" value="<?= $a->hose_hydrant ?>" required>
                                            <!-- <span class="help-block" data-valmsg-for="berlaku" data-valmsg-replace="true"></span> -->
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="Box" class="control-label mb-1">Box Hydrant</label>
                                            <input id="Box" name="Box" type="text" class="form-control Hydrant" value="<?= $a->box_hydrant ?>" required>
                                            <!-- <span class="help-block" data-valmsg-for="Refilling" data-valmsg-replace="true"></span> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="Machino" class="control-label mb-1">Machino</label>
                                            <input id="Machino" name="Machino" type="text" class="form-control Machino" value="<?= $a->machino ?>" required>
                                            <!-- <span class="help-block" data-valmsg-for="Refilling" data-valmsg-replace="true"></span> -->
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="Nozzle" class="control-label mb-1">Nozzle</label>
                                            <input id="Nozzle" name="Nozzle" type="text" class="form-control Nozzle" value="<?= $a->nozzle ?>" required>
                                            <!-- <span class="help-block" data-valmsg-for="berlaku" data-valmsg-replace="true"></span> -->
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="Pressure" class="control-label mb-1">Pressure</label>
                                            <input id="Pressure" name="Pressure" type="text" class="form-control Pressure" value="<?= $a->pressure_hydrant ?>" required>
                                            <!-- <span class="help-block" data-valmsg-for="berlaku" data-valmsg-replace="true"></span> -->
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