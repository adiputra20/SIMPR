                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="row">
                        <!-- Page Heading -->
                        <div class="card shadow mb-4" style="width: 78%">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-secondary"><?php echo $title; ?></h6>
                            </div>
                            <div class="card-body">
                                <?php foreach ($pegawai as $user) : ?>
                                    <form method="POST" action="<?php echo base_url('admin/user/editDataAct'); ?>" enctype="multipart/form-data" class="needs-validation" novalidate>
                                        <div class="form-row">
                                            <div class="form-group col-md-3">
                                                <label for="nip" class="col-form-label col-form-label-sm">NIP</label>
                                                <input type="text" class="form-control form-control-sm" id="nip" readonly name="nip" placeholder="Nomor Induk Pegawai" value="<?php echo $user->nip; ?>" required>
                                                <div class="invalid-feedback">NIP Wajib Diisi!!!!!</div>
                                            </div>
                                            <div class="form-group col-md-9">
                                                <label for="nama" class="col-form-label col-form-label-sm">Nama</label>
                                                <input type="text" class="form-control form-control-sm" id="nama" name="nama" placeholder="Nama Pegawai" value="<?php echo $user->nama; ?>" required>
                                                <div class="invalid-feedback">Nama Wajib Diisi!!!!!</div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="golongan" class="col-md-3 col-form-label col-form-label-sm">Golongan</label>
                                            <div class="col-sm-3 select_search_box">
                                                <select class="form-control form-control-sm selectpicker" data-live-search="true" id="golongan" name="golongan" required>
                                                    <option disabled value="">Pilih Golongan...</option>
                                                    <?php foreach ($golongan as $gol) : ?>
                                                        <option <?php if ($user->golr == $gol->gorl) {
                                                                    echo 'selected';
                                                                }; ?> value="<?php echo $gol->gorl; ?>"><?php echo $gol->gorl; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                                <div class="invalid-feedback">Golongan Wajib Diisi!!!!!</div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="jabatan" class="col-md-3 col-form-label col-form-label-sm">Jabatan</label>
                                            <div class="col-sm-6 select_search_box">
                                                <select class="form-control form-control-sm selectpicker" data-live-search="true" id="jabatan" name="jabatan" required>
                                                    <option disabled value="">Pilih Jabatan...</option>
                                                    <?php foreach ($jabatan as $jbt) : ?>
                                                        <option <?php if ($user->jabatan == $jbt->jabatan) {
                                                                    echo 'selected';
                                                                }; ?> value="<?php echo $jbt->jabatan; ?>"><?php echo $jbt->jabatan; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                                <div class="invalid-feedback">Jabatan Wajib Diisi!!!!!</div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="bidang" class="col-md-3 col-form-label col-form-label-sm">Bidang</label>
                                            <div class="col-sm-6 select_search_box">
                                                <select class="form-control form-control-sm selectpicker" data-live-search="true" id="bidang" name="bidang" required>
                                                    <option disabled <?php if (is_null($user->bidang) || strlen(rtrim($user->bidang) <= 0)) {
                                                                            echo 'selected';
                                                                        } ?> value="">Pilih Bidang...</option>
                                                    <?php foreach ($bidang as $bdg) : ?>
                                                        <option <?php if ($user->bidang == $bdg->bidang) {
                                                                    echo 'selected';
                                                                }; ?> value="<?php echo $bdg->bidang; ?>"><?php echo $bdg->bidang; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                                <div class="invalid-feedback">Bidang Wajib Diisi!!!!!</div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="password" class="col-md-3 col-form-label col-form-label-sm">Password</label>
                                            <div class="col-sm-8 form-inline">
                                                <input type="password" class="form-control form-control-sm" id="password" name="password" aria-describedby="passwordHelpInline" placeholder="Passwornya jangan lupa ya" value="<?php echo $user->password; ?>" required>
                                                <small id="passwordHelpInline" class="text-muted">&nbsp;&nbsp;&nbsp;disarankan password lebih dari 8 karakter.</small>
                                                <div class="invalid-feedback">Password Wajib Diisi!!!!!</div>
                                                <!-- <div class="form-group col-md-2 mt-2">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="status" name="status" <?php if ($user->akses == 1) {
                                                                                                                                        echo "checked";
                                                                                                                                    } ?>>
                                                        <label class="form-check-label" for="status">Admin</label>
                                                    </div>
                                                </div> -->
                                            </div>
                                        </div>
                                        <?php
                                        if ($this->session->userdata('akses') == 1) {
                                        ?>
                                            <div class="form-group row mb-1">
                                                <label for="password" class="col-md-3 col-form-label col-form-label-sm">Level</label>
                                                <div class="col-sm-6 row ml-0">
                                                    <div class="form-check form-check-sm">
                                                        <input class="form-check-input" type="radio" name="akses" id="sadmin" value="1" <?php if ($user->akses == 1) {
                                                                                                                                            echo "checked";
                                                                                                                                        };  ?>>
                                                        <label class="form-check-label" for="exampleRadios1"><small>SAdmin</small></label>
                                                    </div>
                                                    <div class="form-check ml-2">
                                                        <input class="form-check-input" type="radio" name="akses" id="admin" value="2" <?php if ($user->akses == 2) {
                                                                                                                                            echo "checked";
                                                                                                                                        };  ?>>
                                                        <label class="form-check-label" for="exampleRadios2"><small>Administrator</small></label>
                                                    </div>
                                                    <div class="form-check ml-2">
                                                        <input class="form-check-input" type="radio" name="akses" id="operator" value="3" <?php if ($user->akses == 3) {
                                                                                                                                                echo "checked";
                                                                                                                                            };  ?>>
                                                        <label class="form-check-label" for="exampleRadios3"><small>Operator</small></label>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } else { ?>
                                            <input type="hidden" name="akses" value="3">
                                        <?php } ?>
                                        <div class="form-group row">
                                            <label for="foto" class="col-md-3 col-form-label col-form-label-sm">Foto Pegawai</label>
                                            <div class="custom-file col-sm-6 ml-2">
                                                <small>
                                                    <input type="file" class="custom-file-input" id="foto" name="foto">
                                                    <input type="hidden" class="form-control" id="fotolama" name="fotolama" value="<?php echo $user->foto; ?>">
                                                    <label class="custom-file-label" for="customFile">Pilih file foto</label>
                                                </small>
                                            </div>
                                        </div>
                                        <hr class="sidebar-divider mt-0">
                                        <button type="submit" class="btn btn-sm btn-success btn-icon-split"><span class="icon text-white-50"><i class="fas fa-save"></i></span><span class="text">Update</span></button>
                                        <a href="<?= $this->session->userdata('akses') == '3' ? base_url('admin/dashboard') : base_url('admin/user') ?>" class="btn btn-sm btn-danger btn-icon-split"><span class="icon text-white-50"><i class="fas fa-times"></i></span><span class="text">&nbsp Batal &nbsp</span></a>
                                    </form>
                            </div>
                        </div>
                        <div class="card shadow mb-4 ml-1" style="width: 20%">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-secondary text-center">Photo</h6>
                            </div>
                            <div class="card-body text-center">
                                <img src="<?php if (is_null($user->foto) || strlen(trim($user->foto)) == 0) {
                                                echo base_url() . 'assets/img/pegawai/blank.png';
                                            } else {
                                                echo base_url() . 'assets/img/pegawai/' . $user->foto;
                                            } ?>" alt="photo" width="200">
                            </div>
                        </div>
                    <?php endforeach; ?>
                    </div>
                </div>
                <!-- /.container-fluid -->
                </div>
                <!-- End of Main Content -->