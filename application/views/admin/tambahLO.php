                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="card shadow mb-4" style="width: 80%"> 
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-secondary"><?php echo $title; ?></h6>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="<?php echo base_url('admin/rekLO/addDataAct'); ?>" class="needs-validation" novalidate>
                                <div class="form-group row">
                                    <label for="kodeLO" class="col-sm-2 col-form-label col-form-label-sm">Kode Rekening</label>
                                    <div class="col-sm-4">
                                        <input id="kodeLO" type="text" name="kodeLO" class="form-control form-control-sm" placeholder="x.x.xx.xx.xx.xxx" required><div class="invalid-feedback">Kode LO Wajib Diisi!!!!!</div>
                                        <small id="passwordHelpInline" class="text-muted">
                                            format rekening LO adalah x.x.xx.xx.xx.xxxx
                                        </small>
                                        <?php echo form_error('kodeLO','<div class="text-small text-danger"></div>') ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="namaLO" class="col-sm-2 col-form-label col-form-label-sm">Nama Rekening</label>
                                    <div class="col-sm-9">
                                        <textarea id="namaLO" type="text" name="namaLO" class="form-control form-control-sm" placeholder="Nama Rekening LO (Obyek Pajak)" required></textarea>
                                        <div class="invalid-feedback">Nama Rek LO Wajib Diisi!!!!!</div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="rekLRA" class="col-md-2 col-form-label col-form-label-sm">Kode Rekening LRA</label>
                                    <div class="col-sm-4">
                                        <select class="custom-select custom-select-sm" id="kodeLRA" name="kodeLRA" required>
                                            <option selected disabled value="">Pilih Rekening...</option>
                                        <?php foreach ($akun as $rek) : ?>
                                            <option value="<?php echo $rek->kodeLRA; ?>"><?php echo $rek->kodeLRA; ?></option>
                                        <?php endforeach;?>
                                        </select>
                                        <div class="invalid-feedback">Kode LRA Wajib Diisi!!!!!</div>
                                    </div>
                                </div>
                                <hr class="sidebar-divider mt-0">
                                <button type="submit" class="btn btn-sm btn-success btn-icon-split"><span class="icon text-white-50"><i class="fas fa-save"></i></span><span class="text">Simpan</span></button>
                                <a href="<?php echo base_url('admin/rekLO') ?>" class="btn btn-sm btn-danger btn-icon-split"><span class="icon text-white-50"><i class="fas fa-times"></i></span><span class="text">&nbsp Batal &nbsp</span></a>
                            </form>
                        </div>
                    </div>

            </div>
                <!-- /.container-fluid -->
        </div>
            <!-- End of Main Content -->

            