                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="card shadow mb-4" style="width: 80%"> 
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-secondary"><?php echo $title; ?></h6>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="<?php echo base_url('admin/jabatan/addDataAct'); ?>" class="needs-validation" novalidate>
                                <div class="form-group">
                                    <label class="col-form-label col-form-label-sm">Nama Jabatan</label>
                                    <input type="text" name="jabatan" class="form-control form-control-sm" placeholder="Nama Jabatan Dinas/Badan" required>
                                    <div class="invalid-feedback">Nama Jabatan Wajib Diisi!!!!!</div>
                                </div>
                                <hr class="sidebar-divider mt-0">
                                <button type="submit" class="btn btn-sm btn-success btn-icon-split"><span class="icon text-white-50"><i class="fas fa-save"></i></span><span class="text">Simpan</span></button>
                                <a href="<?php echo base_url('admin/jabatan') ?>" class="btn btn-sm btn-danger btn-icon-split"><span class="icon text-white-50"><i class="fas fa-times"></i></span><span class="text">&nbsp Batal &nbsp</span></a>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
        </div>
            <!-- End of Main Content -->

            