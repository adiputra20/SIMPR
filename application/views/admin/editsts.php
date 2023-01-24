                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="card shadow mb-4" style="width: 100%">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-secondary"><?php echo $title; ?></h6>
                        </div>
                        <div class="card-body">
                            <?php foreach ($sts as $data) : ?>
                                <form method="POST" action="<?php echo base_url('admin/nsts/editDataAct'); ?>" class="needs-validation" novalidate>
                                    <div class="form-group row mb-0">
                                        <label for="npwpd" class="col-md-2 col-form-label col-form-label-sm">No. STS</label>
                                        <div class="form-group col-md-3">
                                            <input type="text" class="form-control form-control-sm" readonly id="no_sts" name="no_sts" placeholder="Nomor STS" value="<?php echo $data->nosts; ?>" required>
                                            <div class="invalid-feedback">Nomor STS Wajib Diisi!!!!!</div>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <input type="date" class="form-control form-control-sm" id="tanggal" name="tanggal" placeholder="tanggal" value="<?php echo date("Y-m-d", strtotime($data->tanggal)); ?>" required>
                                            <div class="invalid-feedback">Tanggal STS Wajib Diisi!!!!!</div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0">
                                        <label for="tanggal3" class="col-md-2 col-form-label col-form-label-sm">Keterangan</label>
                                        <div class="form-group col-md-9">
                                            <textarea class="form-control form-control-sm" name="keterangan" id="keterangan" rows="3" placeholder="Keterangan Setoran" required><?php echo $data->keterangan; ?></textarea>
                                            <div class="invalid-feedback">Keterangan Wajib Diisi!!!!!</div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0">
                                        <label for="perbulan" class="col-md-2 col-form-label col-form-label-sm">Rek. Obyek Penerimaan</label>
                                        <div class="form-group col-md-9">
                                            <select class="form-control form-control-sm mr-sm-2selectpicker" data-live-search="true" id="nmobyek" name="nmobyek" required>
                                                <option <?php if (is_null($data->obyek)) {
                                                            echo "selected";
                                                        } ?> disabled value="">Pilih Obyek Rekening...</option>
                                                <?php foreach ($obyek as $akun) : ?>
                                                    <option <?php if ($data->obyek == $akun->namalra) {
                                                                echo "selected";
                                                            } ?> value="<?php echo $akun->namalra; ?>"><?php echo $akun->namalra; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <div class="invalid-feedback">Obyek Rekening Wajib Diisi!!!!!</div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0">
                                        <label for="perbulan" class="col-md-2 col-form-label col-form-label-sm">Pada Rekening Bank</label>
                                        <div class="form-group col-md-2">
                                            <select class="form-control form-control-sm mr-sm-2" id="nm_rek" name="nm_rek" required>
                                                <option <?php if (is_null($data->norek)) {
                                                            echo "selected";
                                                        } ?> disabled value="">Pilih Rekening...</option>
                                                <?php foreach ($rekening as $rek) : ?>
                                                    <option <?php if ($data->norek == $rek->nmrek) {
                                                                echo "selected";
                                                            } ?> value="<?php echo $rek->nmrek; ?>"><?php echo $rek->nmrek; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <div class="invalid-feedback">Rekening Bank Wajib Diisi!!!!!</div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0">
                                        <label for="nomor" class="col-md-2 col-form-label col-form-label-sm">Nilai Setoran</label>
                                        <div class="form-group col-md-2">
                                            <input type="text" class="form-control form-control-sm" id="nilai" name="nilai" placeholder="Nilai" value="<?php echo $data->nilai; ?>" required>
                                            <div class="invalid-feedback">Nilai Setoran Wajib Diisi!!!!!</div>
                                        </div>
                                    </div>
                                    <hr class="sidebar-divider mt-0">
                                    <button type="submit" class="btn btn-sm btn-primary btn-icon-split"><span class="icon text-white-50"><i class="fas fa-save"></i></span><span class="text">Simpan</span></button>
                                    <!-- <button type="reset" class="btn btn-sm btn-warning btn-icon-split"><span class="icon text-white-50"><i class="fas fa-file"></i></span><span class="text">&nbsp Reset &nbsp</span></button> -->
                                    <a class="btn btn-sm btn-danger btn-icon-split" href="<?php echo base_url('admin/nsts') ?>"><span class="icon text-white-50"><i class="fas fa-times"></i></span><span class="text">&nbsp Batal &nbsp</span></a>
                                </form>
                            <?php endforeach; ?>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->
                </div>
                <!-- End of Main Content -->