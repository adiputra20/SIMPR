                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <form method="POST" action="<?php echo base_url('admin/pemda/editDataAct'); ?>" class="needs-validation" novalidate>
                        <?php foreach ($pemda as $client) : ?>
                            <div class="card shadow mb-1">
                                <div class="card-header py-2">
                                    <h6 class="m-0 font-weight-bold text-secondary"><?php echo $title; ?></h6>
                                </div>
                                <div class="card-body">
                                    <div class="form-row">
                                        <div class="form-group col-md-7">
                                            <label for="nama_pemda" class="col-form-label col-form-label-sm">Nama Pemerintah Daerah</label>
                                            <input type="text" class="form-control form-control-sm" id="nama_pemda" name="nama_pemda" placeholder="Pemerintah Daerah" value="<?php echo $client->Nama_Pemda; ?>" required>
                                            <div class="invalid-feedback">Nama Pemda Wajib Diisi!!!!!</div>
                                        </div>
                                        <div class="form-group col-md-5">
                                            <label for="ibu_kota" class="col-form-label col-form-label-sm">Ibu Kota</label>
                                            <input type="text" class="form-control form-control-sm" id="ibu_kota" name="ibu_kota" placeholder="Ibu Kota" value="<?php echo $client->ibu_kota; ?>" required>
                                            <div class="invalid-feedback">Ibukota Wajib Diisi!!!!!</div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="bupati" class="col-form-label col-form-label-sm">Kepala Daerah</label>
                                            <input type="text" class="form-control form-control-sm" id="bupati" name="bupati" placeholder="Kepala Daerah" value="<?php echo $client->Bupati; ?>" required>
                                            <div class="invalid-feedback">Nama Kepala Daerah Wajib Diisi!!!!!</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card shadow mb-1">
                                <div class="card-header py-2">
                                    <h6 class="m-0 font-weight-bold text-primary">PENANDATANGAN DOKUMEN</h6>
                                </div>
                                <div class="card-body">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="nama_kaban" class="col-form-label col-form-label-sm">Nama Kepala SKPD</label>
                                            <input type="text" class="form-control form-control-sm" id="nama_kaban" name="nama_kaban" placeholder="Nama Kepala SKPD" value="<?php echo $client->nama_kaban; ?>" required>
                                            <div class="invalid-feedback">Nama Kepala SKPD Wajib Diisi!!!!!</div>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="nip_kaban" class="col-form-label col-form-label-sm">NIP</label>
                                            <input type="text" class="form-control form-control-sm" id="nip_kaban" name="nip_kaban" placeholder="NIP" value="<?php echo $client->nip_kaban; ?>" required>
                                            <div class="invalid-feedback">NIP. Kepala SKPD Wajib Diisi!!!!!</div>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="gol_kaban" class="col-form-label col-form-label-sm">Golongan/Ruang</label>
                                            <select class="form-control form-control-sm selectpicker" data-live-search="true" id="gol_kaban" name="gol_kaban" required>
                                                <option disabled value="">Pilih Golongan...</option>
                                                <?php foreach ($golongan as $gol) : ?>
                                                    <option <?php if ($client->gol_kaban == $gol->gorl) {
                                                                echo 'selected';
                                                            }; ?> value="<?php echo $gol->gorl; ?>"><?php echo $gol->gorl; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <div class="invalid-feedback">Golongan Kepala SKPD Wajib Diisi!!!!!</div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="nama_kabid" class="col-form-label col-form-label-sm">Nama Kepala Bidang Penetapan</label>
                                            <input type="text" class="form-control form-control-sm" id="nama_kabid" name="nama_kabid" placeholder="Nama Kepala SKPD" value="<?php echo $client->nama_kabid; ?>" required>
                                            <div class="invalid-feedback">Nama Kepala Bidang Wajib Diisi!!!!!</div>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="nip_kabid" class="col-form-label col-form-label-sm">NIP</label>
                                            <input type="text" class="form-control form-control-sm" id="nip_kabid" name="nip_kabid" placeholder="NIP" value="<?php echo $client->nip_kabid; ?>" required>
                                            <div class="invalid-feedback">NIP. Kepala Bidang Wajib Diisi!!!!!</div>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="gol_kabid" class="col-form-label col-form-label-sm">Golongan/Ruang</label>
                                            <select class="form-control form-control-sm selectpicker" data-live-search="true" id="gol_kabid" name="gol_kabid" required>
                                                <option disabled value="">Pilih Golongan...</option>
                                                <?php foreach ($golongan as $gol) : ?>
                                                    <option <?php if ($client->gol_kabid == $gol->gorl) {
                                                                echo 'selected';
                                                            }; ?> value="<?php echo $gol->gorl; ?>"><?php echo $gol->gorl; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <div class="invalid-feedback">Golongan Kepala Bidang Wajib Diisi!!!!!</div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="nama_kabid" class="col-form-label col-form-label-sm">Nama Bendahara Penerimaan</label>
                                            <input type="text" class="form-control form-control-sm" id="nama_bend" name="nama_bend" placeholder="Nama Bendahara" value="<?php echo $client->nama_bend; ?>" required>
                                            <div class="invalid-feedback">Nama Bendahara Penerimaan Wajib Diisi!!!!!</div>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="nip_kabid" class="col-form-label col-form-label-sm">NIP</label>
                                            <input type="text" class="form-control form-control-sm" id="nip_bend" name="nip_bend" placeholder="NIP" value="<?php echo $client->nip_bend; ?>" required>
                                            <div class="invalid-feedback">NIP. Bendahara Peneriman Wajib Diisi!!!!!</div>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="gol_kabid" class="col-form-label col-form-label-sm">Golongan/Ruang</label>
                                            <select class="form-control form-control-sm selectpicker" data-live-search="true" id="gol_bend" name="gol_bend" required>
                                                <option disabled value="">Pilih Golongan...</option>
                                                <?php foreach ($golongan as $gol) : ?>
                                                    <option <?php if ($client->gol_bend == $gol->gorl) {
                                                                echo 'selected';
                                                            }; ?> value="<?php echo $gol->gorl; ?>"><?php echo $gol->gorl; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <div class="invalid-feedback">Golongan Bendahara Penerimaan Wajib Diisi!!!!!</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        <button type="submit" class="btn btn-sm btn-success btn-icon-split mb-4"><span class="icon text-white-50"><i class="fas fa-save"></i></span><span class="text">Simpan</span></button>
                    </form>
                    <!-- /.container-fluid -->
                </div>
                <!-- End of Main Content -->