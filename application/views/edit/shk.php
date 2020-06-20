<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
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
                            <?php foreach ($sh as $a) : ?>
                                <form action="<?= base_url('inspeksi/updateData'); ?>" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <input name="id" type="text" value="<?= $a->id_shk ?>" hidden>
                                        <input name="jpos" type="text" value="SHK" hidden>
                                        <div class="col-6">
                                            <label for="Petugas" class="control-label mb-1">Petugas</label>
                                            <div class="input-group">
                                                <input id="Petugas" name="Petugas" type="text" class="form-control cc-cvc" value="<?= $a->petugas; ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <label for="Lokasi" class="control-label mb-1">Lokasi</label>
                                            <div class="input-group">
                                                <input id="Lokasi" name="Lokasi" type="text" class="form-control cc-cvc" value="<?= $a->lokasi; ?>" required>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <label for="Kendala" class="control-label mb-1">Kendala</label>
                                        <textarea name="Kendala" id="Kendala" rows="9" placeholder="Kendala yang ada..." class="form-control" required><?= $a->problem; ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="Solusi" class="control-label mb-1">Solusi</label>
                                        <textarea name="Solusi" id="Solusi" rows="9" placeholder="Solusi yang diambil..." class="form-control" required><?= $a->action; ?></textarea>
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