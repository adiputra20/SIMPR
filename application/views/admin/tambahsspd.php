                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="card shadow mb-4" style="width: 100%">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-secondary"><?php echo 'Tambah ' . $title; ?></h6>
                        </div>
                        <div class="card-body">
                            <?php foreach ($skpd as $data) : ?>
                                <form method="POST" action="<?php echo base_url('admin/sspd/addDataAct'); ?>" class="needs-validation" novalidate>
                                    <div class="form-group row mb-0">
                                        <label for="npwpd" class="col-md-2 col-form-label col-form-label-sm">NPWPD</label>
                                        <div class="form-group col-md-2">
                                            <input type="text" class="form-control form-control-sm" readonly id="npwpd" name="npwpd" placeholder="NPWPD" value="<?php echo $data->npwpd; ?>" required>
                                            <div class="invalid-feedback">NPWP Wajib Diisi!!!!!</div>
                                        </div>
                                        <div class="form-group col-md-8">
                                            <input type="text" class="form-control form-control-sm" readonly id="nama" name="nama" placeholder="Nama/Merk Usaha" value="<?php echo $data->namapemilik . ' / ' . $data->namausaha; ?>">
                                            <div class="invalid-feedback">Nama Wajib Diisi!!!!!</div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0">
                                        <label for="nomor" class="col-md-2 col-form-label col-form-label-sm">No. SKPD</label>
                                        <div class="form-group col-md-2">
                                            <input type="text" class="form-control form-control-sm" readonly id="nomor" name="nomor" placeholder="No. SKPD" value="<?php echo $data->skpd; ?>">
                                            <div class="invalid-feedback">No.SKPD Wajib Diisi!!!!!</div>
                                        </div>
                                        <!-- <label for="tahun" class="col-md-2 col-form-label">Tahun</label> -->
                                        <div class="form-group col-md-2">
                                            <input type="text" class="form-control form-control-sm" readonly id="tahun" name="tahun" placeholder="Tahun" value="<?php echo $data->tahun; ?>">
                                            <div class="invalid-feedback">Tahun Wajib Diisi!!!!!</div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <input type="text" class="form-control form-control-sm" readonly id="obyek" name="obyek" placeholder="Obyek Pajak" value="<?php echo $data->obyek; ?>">
                                            <div class="invalid-feedback">Obyek Pajak Wajib Diisi!!!!!</div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0">
                                        <label for="tanggal1" class="col-md-2 col-form-label col-form-label-sm">No. SSPD</label>
                                        <div class="form-group col-md-2">
                                            <input type="text" class="form-control form-control-sm" id="sspd" name="sspd" placeholder="No. SSPD" required>
                                            <div class="invalid-feedback">No. SSPD Wajib Diisi!!!!!</div>
                                        </div>
                                        <label for="tanggal2" class="col-md-2 col-form-label col-form-label-sm">Tgl. Setoran</label>
                                        <div class="form-group col-md-2">
                                            <input type="date" class="form-control form-control-sm" id="tanggal" name="tanggal" value="<?php if (!is_null($data->tanggal)) {
                                                                                                                                            echo date("Y-m-d", strtotime($data->tanggal));
                                                                                                                                        } else {
                                                                                                                                            echo date("Y-m-d");
                                                                                                                                        }; ?>" required>
                                            <div class="invalid-feedback">Tanggal Input Wajib Diisi!!!!!</div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0">
                                        <label for="perbulan" class="col-md-2 col-form-label col-form-label-sm">Nilai Ketetapan</label>
                                        <div class="form-group col-md-2">
                                            <input type="text" class="form-control form-control-sm text-right" readonly id="ketetapan" name="ketetapan" placeholder="Nilai Ketetapan" value="<?php echo $data->ketetapan; ?>">
                                            <div class="invalid-feedback">Nilai Ketetapan Wajib Diisi!!!!!</div>
                                        </div>
                                        <label for="denda" class="col-md-2 col-form-label col-form-label-sm">Nilai Setoran</label>
                                        <div class="form-group col-md-2">
                                            <input type="text" class="form-control form-control-sm text-right" id="setoran" name="setoran" placeholder="Nilai Setoran" required>
                                            <div class="invalid-feedback">Nilai Setoran Wajib Diisi!!!!!</div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0">
                                        <label for="tanggal3" class="col-md-2 col-form-label col-form-label-sm">Uraian</label>
                                        <div class="form-group col-md-10">
                                            <textarea class="form-control form-control-sm" name="keterangan" id="keterangan" rows="3" placeholder="Uraian Pembayaran" required></textarea>
                                            <!-- <input type="date" class="form-control" id="tanggal3" name="tanggal3" value="<?php if (!is_null($data->tanggal)) {
                                                                                                                                    echo date("Y-m-d", strtotime($data->tanggal));
                                                                                                                                } else {
                                                                                                                                    echo date("Y-m-d");
                                                                                                                                }; ?>"> -->
                                            <div class="invalid-feedback">Keterangan Wajib Diisi!!!!!</div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0">
                                        <label for="perbulan" class="col-md-2 col-form-label col-form-label-sm">Pada Rekening Bank</label>
                                        <div class="form-group col-md-2">
                                            <select class="form-control form-control-sm mr-sm-2" id="nm_rek" name="nm_rek" required>
                                                <option selected disabled value="">Pilih Rekening...</option>
                                                <?php foreach ($akun as $rek) : ?>
                                                    <option value="<?php echo $rek->nmrek; ?>"><?php echo $rek->nmrek; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <div class="invalid-feedback">Nilai Ketetapan Wajib Diisi!!!!!</div>
                                        </div>
                                    </div>
                                    <hr class="sidebar-divider mt-0">
                                    <button type="submit" class="btn btn-sm btn-primary btn-icon-split"><span class="icon text-white-50"><i class="fas fa-save"></i></span><span class="text">Simpan</span></button>
                                    <!-- <button type="reset" class="btn btn-sm btn-danger btn-icon-split"><span class="icon text-white-50"><i class="fas fa-file"></i></span><span class="text">&nbsp Reset &nbsp</span></button> -->
                                    <a class="btn btn-sm btn-danger btn-icon-split" href="<?php echo base_url('admin/sspd') ?>"><span class="icon text-white-50"><i class="fas fa-times"></i></span><span class="text">&nbsp Batal &nbsp</span></a>
                                </form>
                            <?php endforeach; ?>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->
                </div>
                <!-- End of Main Content -->