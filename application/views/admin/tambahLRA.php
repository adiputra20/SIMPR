                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="card shadow mb-4" style="width: 80%"> 
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-secondary"><?php echo $title; ?></h6>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="<?php echo base_url('admin/rekLRA/addDataAct'); ?>" class="needs-validation" novalidate>
                                <div class="form-group row">
                                    <label for="kodeLRA" class="col-sm-2 col-form-label col-form-label-sm">Kode Rekening</label>
                                    <div class="col-sm-4">
                                        <input id="kodeLRA" type="text" name="kodeLRA" class="form-control form-control-sm" placeholder="x.x.xx.xx.xx.xxx" required><div class="invalid-feedback">Kode Rekening Wajib Diisi!!!!!</div>
                                        <small id="passwordHelpInline" class="text-muted">
                                            format rekening LRA adalah x.x.xx.xx.xx.xxxx
                                        </small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="namaLRA" class="col-sm-2 col-form-label col-form-label-sm">Nama Rekening</label>
                                    <div class="col-sm-9">
                                        <textarea id="namaLRA" type="text" name="namaLRA" class="form-control form-control-sm" placeholder="Nama Rekening LRA (Obyek Pajak)" required></textarea>
                                        <div class="invalid-feedback">Nama Rekening Wajib Diisi!!!!!</div>
                                    </div>
                                </div>   
                                <hr class="sidebar-divider mt-0">     
                                <button type="submit" class="btn btn-sm btn-success btn-icon-split"><span class="icon text-white-50"><i class="fas fa-save"></i></span><span class="text">Simpan</span></button>
                                <a href="<?php echo base_url('admin/rekLra') ?>" class="btn btn-sm btn-danger btn-icon-split"><span class="icon text-white-50"><i class="fas fa-times"></i></span><span class="text">&nbsp Batal &nbsp</span></a>
                            </form>
                        </div>
                    </div>

            </div>
                <!-- /.container-fluid -->
        </div>
            <!-- End of Main Content -->

            