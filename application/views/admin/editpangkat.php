                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="card shadow mb-4" style="width: 80%"> 
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-secondary"><?php echo $title; ?></h6>
                        </div>
                        <div class="card-body">
                            <?php foreach ($golongan as $gol): ?>
                                <form method="POST" action="<?php echo base_url('admin/pangkat/editDataAct'); ?>" class="needs-validation" novalidate>
                                    <div class="form-group row">
                                        <label for="golongan" class="col-sm-2 col-form-label">Golongan/Ruang</label>
                                        <div class="col-sm-4">
                                            <input id="golongan" type="text" name="golongan" class="form-control" value="<?php echo $gol->gorl; ?>">
                                            <?php echo form_error('golongan','<div class="text-small text-danger"></div>') ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="pangkat" class="col-sm-2 col-form-label">Pangkat</label>
                                        <div class="col-sm-7">
                                            <input id="pangkat" type="text" name="pangkat" class="form-control" value="<?php echo $gol->pangkat; ?>">
                                            <?php echo form_error('pangkat','<div class="text-small text-danger"></div>') ?>
                                        </div>
                                    </div>        
                                    <button type="submit" class="btn btn-success">Simpan</button>
                                </form>
                            <?php endforeach; ?>
                        </div>
                    </div>

            </div>
                <!-- /.container-fluid -->
        </div>
            <!-- End of Main Content -->

            