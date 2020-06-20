<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong>Inspeksi</strong>
                            <small> Form</small>
                        </div>
                        <div class="card-body card-block">
                            <div class="form-group">
                                <label for="country" class=" form-control-label"> Inspeksi</label>
                                <select name="inspeksi" id="inspeksi" class="form-control">
                                    <option value="">Chooese inspeksi</option>
                                    <option value="Apar">Apar</option>
                                    <option value="FireAlarm">Fire Alarm</option>
                                    <option value="Hidran">Hidran</option>
                                    <option value="P3K">P3K</option>
                                    <option value="SHK">SHK</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row" id="Apar">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">Inspeksi Apar</div>
                        <div class="card-body">
                            <div class="card-title">
                                <h3 class="text-center title-2">APAR INSPEKSI</h3>
                            </div>
                            <hr>
                            <form action="<?= base_url('inspeksi/ins_apar'); ?>" method="post" novalidate="novalidate">
                                <div class="row">
                                    <div class="col-6">
                                        <label for="Petugas" class="control-label mb-1">Petugas</label>
                                        <div class="input-group">
                                            <input id="Petugas" name="Petugas" type="text" class="form-control cc-cvc" value="" data-val="true" data-val-required="Please enter the security code" data-val-cc-cvc="Please enter a valid security code" autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label for="Fire" class="control-label mb-1">Fire Extinguisher</label>
                                    <input id="Fire" name="Fire" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="No & Jenis">
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="Refilling" class="control-label mb-1">Refilling</label>
                                            <input id="Refilling" name="Refilling" type="date" class="form-control Refilling" data-val="true">
                                            <span class="help-block" data-valmsg-for="Refilling" data-valmsg-replace="true"></span>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="berlaku" class="control-label mb-1">Masa berlaku</label>
                                            <input id="berlaku" name="berlaku" type="date" class="form-control berlaku" data-val="true">
                                            <span class="help-block" data-valmsg-for="berlaku" data-valmsg-replace="true"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="Tabung" class="control-label mb-1">Kondisi Tabung</label>
                                            <input id="Tabung" name="Tabung" type="text" class="form-control Tabung" data-val="true">
                                            <span class="help-block" data-valmsg-for="Tabung" data-valmsg-replace="true"></span>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="Hose" class="control-label mb-1">Hose</label>
                                            <input id="Hose" name="Hose" type="text" class="form-control Hose" data-val="true">
                                            <span class="help-block" data-valmsg-for="Hose" data-valmsg-replace="true"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="Pen" class="control-label mb-1">Pen Pengaman</label>
                                            <input id="Pen" name="Pen" type="text" class="form-control Pen">
                                            <span class="help-block" data-valmsg-for="Pen" data-valmsg-replace="true"></span>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <label for="Segel" class="control-label mb-1">Segel Pengaman</label>
                                        <div class="input-group">
                                            <input id="Segel" name="Segel" type="text" class="form-control cc-cvc">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <label for="Pressure" class="control-label mb-1">Pressure </label>
                                        <div class="input-group">
                                            <input id="Pressure" name="Pressure" type="text" class="form-control cc-cvc">
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                        <span id="payment-button-amount">Submit</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row" id="FireAlarm">
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
                            <form action="<?= base_url('inspeksi/ins_fire'); ?>" method="post" novalidate="novalidate">
                                <div class="row">
                                    <div class="col-6">
                                        <label for="Petugas" class="control-label mb-1">Petugas</label>
                                        <div class="input-group">
                                            <input id="Petugas" name="Petugas" type="text" class="form-control cc-cvc" required>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <label for="Petugas" class="control-label mb-1">Lokasi</label>
                                        <div class="input-group">
                                            <input id="Lokasi" name="Lokasi" type="text" class="form-control cc-cvc" required>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label for="Peralatan" class="control-label mb-1">Peralatan</label>
                                    <input id="Peralatan" name="Peralatan" type="text" class="form-control" placeholder="Peralatan yang di check" required>
                                </div>
                                <div class="row form-group">
                                    <div class="col-3">
                                        <label for="jumlah" class="control-label mb-1">jumlah instalasi</label>
                                        <div class="input-group">
                                            <input id="jumlah" name="jumlah" type="number" class="form-control cc-cvc" required>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <label for="Smoke" class="control-label mb-1">Smoke</label>
                                        <div class="input-group">
                                            <input id="Smoke" name="Smoke" type="number" class="form-control cc-cvc" required>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <label for="Heat" class="control-label mb-1">Heat</label>
                                        <div class="input-group">
                                            <input id="Heat" name="Heat" type="number" class="form-control cc-cvc" required>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <label for="equip" class="control-label mb-1">Equip</label>
                                        <div class="input-group">
                                            <input id="equip" name="equip" type="number" class="form-control cc-cvc" required>
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
                                                <input type="radio" id="inline-radio1" name="Kondisi" value="Baik" class="form-check-input">Baik
                                            </label>&nbsp;
                                            <label for="inline-radio2" class="form-check-label ">
                                                <input type="radio" id="inline-radio2" name="Kondisi" value="Rusak" class="form-check-input">Rusak
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="Keterangan" class="control-label mb-1">Keterangan</label>
                                    <textarea name="Keterangan" id="Keterangan" rows="9" placeholder="Keterangan..." class="form-control" required></textarea>
                                </div>
                                <div>
                                    <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                        <span id="payment-button-amount">Submit</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row" id="Hidran">
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
                            <form action="<?= base_url('inspeksi/ins_hydrant'); ?>" method="post">
                                <div class="row form-group">
                                    <div class="col-6">
                                        <label for="Petugas" class="control-label mb-1">Petugas</label>
                                        <div class="input-group">
                                            <input id="Petugas" name="Petugas" type="text" class="form-control cc-cvc" required>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <label for="Petugas" class="control-label mb-1">Lokasi</label>
                                        <div class="input-group">
                                            <input id="Lokasi" name="Lokasi" type="text" class="form-control cc-cvc" required>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label for="Hydrant" class="control-label mb-1">Hydrant</label>
                                    <input id="Hydrant" name="Hydrant" type="text" class="form-control" aria-required="true" aria-invalid="false" placeholder="Hydrant" required>
                                </div>
                                <div class="row form-group">
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="Pipe" class="control-label mb-1">Pipe Hydrant</label>
                                            <input id="Pipe" name="Pipe" type="text" class="form-control Refilling" required>
                                            <!-- <span class="help-block" data-valmsg-for="Refilling" data-valmsg-replace="true"></span> -->
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="Valve" class="control-label mb-1">Valve Hydrant</label>
                                            <input id="Valve" name="Valve" type="text" class="form-control berlaku" required>
                                            <!-- <span class="help-block" data-valmsg-for="berlaku" data-valmsg-replace="true"></span> -->
                                        </div>
                                    </div>

                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="Hose" class="control-label mb-1">Hose Hydrant</label>
                                            <input id="Hose" name="Hose" type="text" class="form-control berlaku" required>
                                            <!-- <span class="help-block" data-valmsg-for="berlaku" data-valmsg-replace="true"></span> -->
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label for="Box" class="control-label mb-1">Box Hydrant</label>
                                            <input id="Box" name="Box" type="text" class="form-control Hydrant" required>
                                            <!-- <span class="help-block" data-valmsg-for="Refilling" data-valmsg-replace="true"></span> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="Machino" class="control-label mb-1">Machino</label>
                                            <input id="Machino" name="Machino" type="text" class="form-control Machino" required>
                                            <!-- <span class="help-block" data-valmsg-for="Refilling" data-valmsg-replace="true"></span> -->
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="Nozzle" class="control-label mb-1">Nozzle</label>
                                            <input id="Nozzle" name="Nozzle" type="text" class="form-control Nozzle" required>
                                            <!-- <span class="help-block" data-valmsg-for="berlaku" data-valmsg-replace="true"></span> -->
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="Pressure" class="control-label mb-1">Pressure</label>
                                            <input id="Pressure" name="Pressure" type="text" class="form-control Pressure" required>
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
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong>Hidran</strong>
                            <small> Form</small>
                        </div>
                        <div class="card-body card-block">
                            <!-- <div class="card-title">
                                <h3 class="text-center title-2">Hidran INSPEKSI</h3>
                            </div>
                            <hr> -->
                            <form action="<?= base_url('inspeksi/ins_cph'); ?>" method="post">
                                <div class="row form-group">
                                    <div class="col-6">
                                        <label for="Lokasi" class="control-label mb-1">Lokasi</label>
                                        <div class="input-group">
                                            <input id="Lokasi" name="Lokasi" type="text" class="form-control cc-cvc" required>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <label for="Week" class="control-label mb-1">Week</label>
                                        <div class="input-group">
                                            <select name="Week" id="Week" class="form-control" required>
                                                <option value="2"> Week 2</option>
                                                <option value="4"> Week 4</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="Petugas" class="control-label mb-1">Petugas</label>
                                    <div class="input-group">
                                        <input id="Petugas" name="Petugas" type="text" class="form-control cc-cvc" required>
                                    </div>
                                </div>
                                <hr>
                                <div class="row form-group">
                                    <div class="form-group">
                                        <label for="Pipe" class="control-label mb-1">Equipment</label>
                                        <input id="Pipe" name="Pipe" type="text" class="form-control Equipment" data-val="true">
                                        <span class="help-block" data-valmsg-for="Equipment" data-valmsg-replace="true"></span>
                                    </div>
                                </div>
                                <div class="row form-group">                                    
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="Bensin" class="control-label mb-1">Bensin</label>
                                            <input id="Bensin" name="Bensin" type="number" class="form-control Bensin" placeholder="liter" required>
                                            <!-- <span class="help-block" data-valmsg-for="Bensin" data-valmsg-replace="true"></span> -->
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="Olie" class="control-label mb-1">Olie</label>
                                            <input id="Olie" name="Olie" type="number" class="form-control Olie" placeholder="liter" required>
                                            <!-- <span class="help-block" data-valmsg-for="berlaku" data-valmsg-replace="true"></span> -->
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="Jam" class="control-label mb-1">Total Jam </label>
                                            <input id="Jam" name="Jam" type="number" class="form-control Refilling" required>
                                            <!-- <span class="help-block" data-valmsg-for="Refilling" data-valmsg-replace="true"></span> -->
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                        <span id="payment-button-amount">Submit</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row" id="P3K">
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
                            <form action="<?= base_url('inspeksi/ins_p3k'); ?>" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-6">
                                        <label for="Petugas" class="control-label mb-1">Petugas</label>
                                        <div class="input-group">
                                            <input id="Petugas" name="Petugas" type="text" class="form-control cc-cvc" required>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <label for="Lokasi" class="control-label mb-1">Lokasi</label>
                                        <div class="input-group">
                                            <input id="Lokasi" name="Lokasi" type="text" class="form-control cc-cvc" required>
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
                                            foreach ($pkd as $p) : ?>
                                                <tr>
                                                    <td><?= $i ?></td>
                                                    <td><?= $p->list_p3k ?></td>
                                                    <td><input name="stok<?= $i; ?>" type="text" class="form-control cc-cvc" required></td>
                                                    <td><input name="add<?= $i; ?>" type="text" class="form-control cc-cvc" required></td>
                                                </tr>
                                            <?php $i++;
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
                        </div>
                    </div>
                </div>
            </div>

            <div class="row" id="SHK">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong>SHK</strong>
                            <small> Form</small>
                        </div>
                        <div class="card-body card-block">
                            <div class="card-title">
                                <h3 class="text-center title-2">FORM SHK INSPEKSI</h3>
                            </div>
                            <hr>
                            <form action="<?= base_url('inspeksi/ins_shk'); ?>" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-9"></div>
                                    <div class="col-3">
                                        <label for="Petugas" class="control-label mb-1">Petugas</label>
                                        <div class="input-group">
                                            <input id="Petugas" name="Petugas" type="text" class="form-control cc-cvc" required>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label for="Kendala" class="control-label mb-1">Kendala</label>
                                    <textarea name="Kendala" id="Kendala" rows="9" placeholder="Kendala yang ada..." class="form-control" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="Solusi" class="control-label mb-1">Solusi</label>
                                    <textarea name="Solusi" id="Solusi" rows="9" placeholder="Solusi yang diambil..." class="form-control" required></textarea>
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
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>