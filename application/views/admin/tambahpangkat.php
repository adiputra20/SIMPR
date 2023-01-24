                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="card shadow mb-4" style="width: 80%"> 
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-secondary"><?php echo $title; ?></h6>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="<?php echo base_url('admin/pangkat/addDataAct'); ?>" class="needs-validation" novalidate>
                                <div class="form-group row">
                                    <label for="golongan" class="col-sm-2 col-form-label col-form-label-sm">Golongan/Ruang</label>
                                    <div class="col-sm-4">
                                        <input id="golongan" type="text" name="golongan" class="form-control form-control-sm" placeholder="Golongan/Ruang (ex: IIIa)" requierd>
                                        <div class="invalid-feedback">Golongan Wajib Diisi!!!!!</div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="pangkat" class="col-sm-2 col-form-label col-form-label-sm">Pangkat</label>
                                    <div class="col-sm-7">
                                        <input id="pangkat" type="text" name="pangkat" class="form-control form-control-sm" placeholder="Pangkat" required>
                                        <div class="invalid-feedback">Pangkat Wajib Diisi!!!!!</div>
                                    </div>
                                </div>
                                <hr class="sidebar-divider mt-0">        
                                <button type="submit" class="btn btn-sm btn-success btn-icon-split"><span class="icon text-white-50"><i class="fas fa-save"></i></span><span class="text">Simpan</span></button>
                                <a href="<?php echo base_url('admin/pangkat') ?>" class="btn btn-sm btn-danger btn-icon-split"><span class="icon text-white-50"><i class="fas fa-times"></i></span><span class="text">&nbsp Batal &nbsp</span></a>
                            </form>
                        </div>
                    </div>

            </div>
                <!-- /.container-fluid -->
        </div>
            <!-- End of Main Content -->

            