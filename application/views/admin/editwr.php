                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="card shadow mb-4" style="width: 100%">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-secondary"><?php echo $title; ?></h6>
                        </div>
                        <div class="card-body">
                            <?php foreach ($wp as $wp) : ?>
                                <form method="POST" action="<?php echo base_url('admin/daftarr/editDataAct'); ?>" class="needs-validation" novalidate>
                                    <div class="form-group row mb-0">
                                        <label for="npwpd" class="col-md-2 col-form-label col-form-label-sm">NPWRD</label>
                                        <div class="form-group col-md-3">
                                            <input type="text" class="form-control form-control-sm" readonly id="npwpd" name="npwpd" placeholder="NPWPD" value="<?php echo $wp->npwprd; ?>" required>
                                            <div class="invalid-feedback">NPWRD Wajib Diisi!!!!!</div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0">
                                        <label for="nama" class="col-md-2 col-form-label col-form-label-sm">Nama Pemilik</label>
                                        <div class="form-group col-md-10">
                                            <input type="text" class="form-control form-control-sm" id="nama" name="nama" placeholder="Nama Pemilik" value="<?php echo $wp->namapemilik; ?>" required>
                                            <div class="invalid-feedback">Nama Pemilik Wajib Diisi!!!!!</div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0">
                                        <label for="alamat" class="col-md-2 col-form-label col-form-label-sm">Alamat Pemilik</label>
                                        <div class="form-group col-md-10">
                                            <input type="text" class="form-control form-control-sm" id="alamat" name="alamat" placeholder="Alamat Pemilik" value="<?php echo $wp->alamatpemilik; ?>" required>
                                            <div class="invalid-feedback">Alamat Pemilik Wajib Diisi!!!!!</div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0">
                                        <label for="telp" class="col-md-2 col-form-label col-form-label-sm">No. Telephone</label>
                                        <div class="form-group col-md-3">
                                            <input type="text" class="form-control form-control-sm" id="telp" name="telp" placeholder="No. Telp" value="<?php echo $wp->telepon; ?>">
                                        </div>
                                    </div>
                                    <hr class="sidebar-divider mt-0">
                                    <div class="form-group row mb-0">
                                        <label for="namausaha" class="col-md-2 col-form-label col-form-label-sm">Nama/Merk Usaha</label>
                                        <div class="form-group col-md-10">
                                            <input type="text" class="form-control form-control-sm" id="namausaha" name="namausaha" placeholder="Nama/Merk Usaha" value="<?php echo $wp->namausaha; ?>" required>
                                            <div class="invalid-feedback">Nama/Merk Usaha Wajib Diisi!!!!!</div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0">
                                        <label for="alamatusaha" class="col-md-2 col-form-label col-form-label-sm">Alamat Usaha</label>
                                        <div class="form-group col-md-3">
                                            <input type="text" class="form-control form-control-sm" id="alamatusaha" name="alamatusaha" placeholder="Alamat Tempat Usaha" value="<?php echo $wp->alamatusaha; ?>" required>
                                            <div class="invalid-feedback">Alamat Usaha Wajib Diisi!!!!!</div>
                                        </div>
                                        <label for="jenis" class="col-md-2 col-form-label col-form-label-sm">Bidang Usaha</label>
                                        <div class="col-sm-5">
                                            <select class="form-control form-control-sm" id="jenis" name="jenis" required>
                                                <option <?php if (is_null($wp->jenisusaha)) {
                                                            echo "selected";
                                                        } ?> disabled value="">Pilih Bidang Usaha...</option>
                                                <option <?php if ($wp->jenisusaha == "Hotel") {
                                                            echo "selected";
                                                        } ?> value="Hotel">Hotel</option>
                                                <option <?php if ($wp->jenisusaha == "Rumah Makan") {
                                                            echo "selected";
                                                        } ?> value="Rumah Makan">Rumah Makan</option>
                                                <option <?php if ($wp->jenisusaha == "Kios") {
                                                            echo "selected";
                                                        } ?> value="Kios">Kios</option>
                                                <option <?php if ($wp->jenisusaha == "Hiburan") {
                                                            echo "selected";
                                                        } ?> value="Hiburan">Hiburan</option>
                                                <option <?php if ($wp->jenisusaha == "Reklame") {
                                                            echo "selected";
                                                        } ?> value="Reklame">Reklame</option>
                                                <option <?php if ($wp->jenisusaha == "Penerangan Jalan") {
                                                            echo "selected";
                                                        } ?> value="Penerangan Jalan">Penerangan Jalan</option>
                                                <option <?php if ($wp->jenisusaha == "Parkir") {
                                                            echo "selected";
                                                        } ?> value="Parkir">Parkir</option>
                                                <option <?php if ($wp->jenisusaha == "Rumah Dinas") {
                                                            echo "selected";
                                                        } ?> value="Rumah Dinas">Rumah Dinas</option>
                                                <option <?php if ($wp->jenisusaha == "Sewa Aset") {
                                                            echo "selected";
                                                        } ?> value="Sewa Aset">Sewa Aset</option>
                                            </select>
                                            <div class="invalid-feedback">Bidang/Jenis Usaha Wajib Diisi!!!!!</div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0">
                                        <label for="desa" class="col-md-2 col-form-label col-form-label-sm">Desa/Kampung</label>
                                        <div class="form-group col-md-3">
                                            <input type="text" class="form-control form-control-sm" id="desa" name="desa" placeholder="Nama Desa/Kampung" value="<?php echo $wp->desa; ?>">
                                        </div>
                                        <label for="kecamatan" class="col-md-2 col-form-label col-form-label-sm">Kecamatan/Distrik</label>
                                        <div class="form-group col-md-5">
                                            <input type="text" class="form-control form-control-sm" id="kecamatan" name="kecamatan" placeholder="Nama Kecamatan/Distrik" value="<?php echo $wp->kecamatan; ?>" required>
                                            <div class="invalid-feedback">Kecamatan/Distrik Wajib Diisi!!!!!</div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0">
                                        <label for="situ" class="col-md-2 col-form-label col-form-label-sm">Nomor Surat Izin</label>
                                        <div class="form-group col-md-3">
                                            <input type="text" class="form-control form-control-sm" id="situ" name="situ" placeholder="No. SITU (Surat Izin Tempat Usaha)" value="<?php echo $wp->situ; ?>">
                                        </div>
                                        <label for="tanggal" class="col-md-2 col-form-label col-form-label-sm">Tgl. Pendaftaran</label>
                                        <div class="form-group col-md-2">
                                            <input type="date" class="form-control form-control-sm" id="tanggal" name="tanggal" value="<?php echo $wp->tanggal; ?>" required>
                                            <div class="invalid-feedback">Tanggal Wajib Diisi!!!!!</div>
                                        </div>
                                        <div class="form-group col-md-2 mt-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="status" name="status" <?php if ($wp->status == 1) {
                                                                                                                                echo "checked";
                                                                                                                            } ?>>
                                                <label class="form-check-label" for="status">Masih Beroperasi</label>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="sidebar-divider mt-0">
                                    <button type="submit" class="btn btn-sm btn-success btn-icon-split"><span class="icon text-white-50"><i class="fas fa-save"></i></span><span class="text">Update</span></button>
                                    <a class="btn btn-sm btn-danger btn-icon-split" href="<?php echo base_url('admin/daftarr') ?>"><span class="icon text-white-50"><i class="fas fa-times"></i></span><span class="text">&nbsp Batal &nbsp</span></a>
                                </form>
                        </div>
                    </div>
                <?php endforeach; ?>
                </div>
                <!-- /.container-fluid -->
                </div>
                <!-- End of Main Content -->