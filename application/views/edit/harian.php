<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong>INSPEKSI HARIAN</strong>
                            <small> Form</small>
                        </div>
                        <div class="card-body card-block">
                            <div class="card-title">
                                <h3 class="text-center title-2">FORM INSPEKSI HARIAN</h3>
                            </div>
                            <hr>
                            <?php foreach ($sh as $a) : ?>
                                <form action="<?= base_url('inspeksi/updateData'); ?>" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <input name="id" type="text" value="<?= $a->id_harian ?>" hidden>
                                        <input name="jpos" type="text" value="HARIAN" hidden>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <label for="Kendala" class="control-label mb-1">Kendala</label>
                                        <textarea name="Kendala" id="Kendala" rows="9" placeholder="Kendala yang ada..." class="form-control" required><?= $a->masalah; ?></textarea>
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