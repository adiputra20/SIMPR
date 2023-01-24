                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="row">
                        <div class="card shadow mb-4" style="width: 78%">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-secondary"><?php echo $title; ?></h6>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="<?php echo base_url('admin/user/addDataAct'); ?>" enctype="multipart/form-data" class="needs-validation" novalidate>
                                    <div class="form-row">
                                        <div class="form-group col-md-3">
                                            <label for="nip" class="col-form-label col-form-label-sm">NIP</label>
                                            <input type="text" class="form-control form-control-sm" id="nip" name="nip" placeholder="Nomor Induk Pegawai" required>
                                            <div class="invalid-feedback">NIP Wajib Diisi!!!!!</div>
                                        </div>
                                        <div class="form-group col-md-9">
                                            <label for="nama" class="col-form-label col-form-label-sm">Nama</label>
                                            <input type="text" class="form-control form-control-sm" id="nama" name="nama" placeholder="Nama Pegawai" required>
                                            <div class="invalid-feedback">Nama Wajib Diisi!!!!!</div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="golongan" class="col-md-3 col-form-label col-form-label-sm">Golongan</label>
                                        <div class="col-sm-3 search_select_box">
                                            <select class="form-control form-control-sm selectpicker" data-live-search="true" id="golongan" name="golongan" required>
                                                <option selected disabled value="">Pilih Golongan...</option>
                                                <?php foreach ($golongan as $gol) : ?>
                                                    <option value="<?php echo $gol->gorl; ?>"><?php echo $gol->gorl; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <div class="invalid-feedback">Golongan Wajib Diisi!!!!!</div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="jabatan" class="col-md-3 col-form-label col-form-label-sm">Jabatan</label>
                                        <div class="col-sm-6 select_search_box">
                                            <select class="form-control form-control-sm selectpicker" data-live-search="true" id="jabatan" name="jabatan" required>
                                                <option selected disabled value="">Pilih Jabatan...</option>
                                                <?php foreach ($jabatan as $jbt) : ?>
                                                    <option value="<?php echo $jbt->jabatan; ?>"><?php echo $jbt->jabatan; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <div class="invalid-feedback">Jabatan Wajib Diisi!!!!!</div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="bidang" class="col-md-3 col-form-label col-form-label-sm">Bidang Pendapatan</label>
                                        <div class="col-sm-6 select_search_box">
                                            <select class="form-control form-control-sm selectpicker" data-live-search="true" id="bidang" name="bidang" required>
                                                <option selected disabled value="">Pilih Bidang...</option>
                                                <?php foreach ($bidang as $bdg) : ?>
                                                    <option value="<?php echo $bdg->bidang; ?>"><?php echo $bdg->bidang; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <div class="invalid-feedback">Bidang Wajib Diisi!!!!!</div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="password" class="col-md-3 col-form-label col-form-label-sm">Password</label>
                                        <div class="col-sm-8 form-inline">
                                            <input type="password" class="form-control form-control-sm" id="password" name="password" aria-describedby="passwordHelpInline" placeholder="Passwornya jangan lupa ya" required>
                                            <small id="passwordHelpInline" class="text-muted">&nbsp;&nbsp;&nbsp;disarankan password lebih dari 8 karakter.</small>
                                            <div class="invalid-feedback">Password Wajib Diisi!!!!!</div>
                                            <!-- <div class="form-group col-md-2 mt-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="status" name="status">
                                                        <label class="form-check-label form-check-label" for="status">Admin</label>
                                                    </div>
                                                </div> -->
                                        </div>
                                    </div>
                                    <div class="form-group row mb-1">
                                        <label for="password" class="col-md-3 col-form-label col-form-label-sm">Level</label>
                                        <div class="col-sm-6 row ml-0">
                                            <div class="form-check form-check-sm">
                                                <input class="form-check-input" type="radio" name="akses" id="sadmin" value="1" checked>
                                                <label class="form-check-label" for="exampleRadios1"><small>SAdmin</small></label>
                                            </div>
                                            <div class="form-check ml-2">
                                                <input class="form-check-input" type="radio" name="akses" id="admin" value="2">
                                                <label class="form-check-label" for="exampleRadios2"><small>Administrator</small></label>
                                            </div>
                                            <div class="form-check ml-2">
                                                <input class="form-check-input" type="radio" name="akses" id="operator" value="3">
                                                <label class="form-check-label" for="exampleRadios3"><small>Operator</small></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="bidang" class="col-md-3 col-form-label col-form-label-sm">Foto Pegawai</label>
                                        <div class="custom-file col-sm-6 ml-2">
                                            <small>
                                                <input type="file" class="custom-file-input" id="foto" name="foto">
                                                <label class="custom-file-label" for="customFile">Pilih file foto</label>
                                            </small>
                                        </div>
                                    </div>
                                    <hr class="sidebar-divider mt-0">
                                    <button type="submit" class="btn btn-sm btn-success btn-icon-split"><span class="icon text-white-50"><i class="fas fa-save"></i></span><span class="text">Simpan</span></button>
                                    <a href="<?php echo base_url('admin/user') ?>" class="btn btn-sm btn-danger btn-icon-split"><span class="icon text-white-50"><i class="fas fa-times"></i></span><span class="text">&nbsp Batal &nbsp</span></a>
                                </form>
                            </div>
                        </div>
                        <div class="card shadow mb-4 ml-1" style="width: 20%">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-secondary text-center">Photo</h6>
                            </div>
                            <div class="card-body text-center">
                                <img src="<?php echo base_url(); ?>assets/img/pegawai/blank.png" alt="photo" width="200">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
                </div>
                <!-- End of Main Content -->