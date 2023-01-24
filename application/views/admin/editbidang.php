                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="card shadow mb-4" style="width: 80%"> 
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-secondary"><?php echo $title; ?></h6>
                        </div>
                        <div class="card-body">
                            <?php foreach ($bidang as $j): ?>
                                <form method="POST" action="<?php echo base_url('admin/bidang/editDataAct'); ?>" class="needs-validation" novalidate>
                                    <div class="form-group">
                                        <label class="col-form-label col-form-label-sm">Nama Bidang</label>
                                        <input type="hidden" name="idjabat" class="form-control" value="<?php echo $j->kode; ?>">
                                        <input type="text" name="bidang" class="form-control form-control-sm" value="<?php echo $j->bidang; ?>" required>
                                        <div class="invalid-feedback">Jabatan Wajib Diisi!!!!!</div>
                                    </div>
                                    <hr class="sidebar-divider mt-0">
                                    <button type="submit" class="btn btn-sm btn-success btn-icon-split"><span class="icon text-white-50"><i class="fas fa-save"></i></span><span class="text">Update</span></button>
                                    <a href="<?php echo base_url('admin/bidang') ?>" class="btn btn-sm btn-danger btn-icon-split"><span class="icon text-white-50"><i class="fas fa-times"></i></span><span class="text">&nbsp Batal &nbsp</span></a>
                                </form>
                            <?php endforeach; ?>
                        </div>
                </div>

            </div>
                <!-- /.container-fluid -->
        </div>
            <!-- End of Main Content -->

            