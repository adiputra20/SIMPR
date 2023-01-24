                <!-- Begin Page Content -->
                <?php $url = isset($_SERVER['HTTP_REFERER']) ? htmlspecialchars($_SERVER['HTTP_REFERER']) : ''; ?>
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="card shadow mb-4" style="width: 100%">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-secondary"><?php foreach ($skpd as $judul) : if (is_null($judul->penetapan)) {
                                                                                    echo 'Tambah ' . $title;
                                                                                } else {
                                                                                    echo 'Edit ' . $title;
                                                                                };
                                                                            endforeach; ?></h6>
                        </div>
                        <div class="card-body">
                            <?php foreach ($skpd as $data) : ?>
                                <form method="POST" action="<?php echo base_url('admin/skpd/editDataAct'); ?>" class="needs-validation" novalidate>
                                    <div class="form-group row mb-0">
                                        <label for="npwpd" class="col-md-2 col-form-label col-form-label-sm">NPWPD</label>
                                        <div class="form-group col-md-2">
                                            <input type="text" class="form-control form-control-sm" readonly id="npwpd" name="npwpd" placeholder="NPWPD" value="<?php echo $data->npwpd; ?>" required>
                                            <div class="invalid-feedback">NPWPD Wajib Diisi!!!!!</div>
                                        </div>
                                        <div class="form-group col-md-8">
                                            <input type="text" class="form-control form-control-sm" readonly id="nama" name="nama" placeholder="Nama/Merk Usaha" value="<?php echo $data->namapemilik . ' / ' . $data->namausaha; ?>">
                                            <div class="invalid-feedback">Nama Wajib Diisi!!!!!</div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0">
                                        <label for="nomor" class="col-md-2 col-form-label col-form-label-sm">No. SKPD</label>
                                        <div class="form-group col-md-4">
                                            <input type="text" class="form-control form-control-sm" readonly id="nomor" name="nomor" placeholder="No. SKPD" value="<?php echo $data->skpd; ?>">
                                            <div class="invalid-feedback">No. SKPD Wajib Diisi!!!!!</div>
                                        </div>
                                        <!-- <label for="tahun" class="col-md-2 col-form-label">Tahun</label> -->
                                        <div class="form-group col-md-2">
                                            <input type="text" class="form-control form-control-sm" readonly id="tahun" name="tahun" placeholder="Tahun" value="<?php echo $data->tahun; ?>">
                                            <div class="invalid-feedback">Tahun Wajib Diisi!!!!!</div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0">
                                        <label for="tanggal1" class="col-md-2 col-form-label col-form-label-sm">Tgl. Penetapan</label>
                                        <div class="form-group col-md-2">
                                            <input type="date" class="form-control form-control-sm" id="tanggal1" name="tanggal1" value="<?php if (!is_null($data->penetapan)) {
                                                                                                                                                echo date("Y-m-d", strtotime($data->penetapan));
                                                                                                                                            }; ?>">
                                            <div class="invalid-feedback">Tgl. Penetapan Wajib Diisi!!!!!</div>
                                        </div>
                                        <label for="tanggal2" class="col-md-2 col-form-label col-form-label-sm">Tgl. Jatuh Tempo</label>
                                        <div class="form-group col-md-2">
                                            <input type="date" class="form-control form-control-sm" id="tanggal2" name="tanggal2" value="<?php if (!is_null($data->jatuhtempo)) {
                                                                                                                                                echo date("Y-m-d", strtotime($data->jatuhtempo));
                                                                                                                                            }; ?>">
                                            <div class="invalid-feedback">Tgl. Jatuh Tempo Wajib Diisi!!!!!</div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0">
                                        <label for="obyek" class="col-md-2 col-form-label col-form-label-sm">Uraian Pajak</label>
                                        <div class="form-group col-md-6 search_select_box">
                                            <select class="form-control form-control-sm selectpicker" data-live-search="true" id="obyek" name="obyek" required>
                                                <option <?php if (is_null($data->obyek)) {
                                                            echo "selected";
                                                        }; ?> disabled value="">Pilih Uraian Pajak...</option>
                                                <?php foreach ($obyek as $akun) : ?>
                                                    <option <?php if ($data->obyek == $akun->namalra) {
                                                                echo "selected";
                                                            }; ?> value="<?php echo $akun->namalra; ?>"><?php echo $akun->namalra; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <div class="invalid-feedback">Obyek Pajak Wajib Diisi!!!!!</div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0">
                                        <label for="perbulan" class="col-md-2 col-form-label col-form-label-sm">Nilai Per Bulan</label>
                                        <div class="form-group col-md-2">
                                            <input type="text" class="form-control form-control-sm text-right" id="perbulan" name="perbulan" placeholder="Nilai per Bulan" value="<?php if (!is_null($data->perbulan)) {
                                                                                                                                                                                        echo $data->perbulan;
                                                                                                                                                                                    };   ?>">
                                            <div class="invalid-feedback">Nilai Perbulan Wajib Diisi!!!!!</div>
                                        </div>
                                        <label for="denda" class="col-md-2 col-form-label col-form-label-sm">Denda</label>
                                        <div class="form-group col-md-2">
                                            <input type="text" class="form-control form-control-sm text-right" id="denda" name="denda" placeholder="Nilai Denda" value="<?php if (!is_null($data->denda)) {
                                                                                                                                                                            echo $data->denda;
                                                                                                                                                                        } else {
                                                                                                                                                                            echo "0";
                                                                                                                                                                        };   ?>">
                                            <div class="invalid-feedback">Denda Wajib Diisi!!!!!</div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0">
                                        <label for="tanggal3" class="col-md-2 col-form-label col-form-label-sm">Tgl. Input</label>
                                        <div class="form-group col-md-2">
                                            <input type="date" class="form-control form-control-sm" id="tanggal3" name="tanggal3" value="<?php if (!is_null($data->tanggal)) {
                                                                                                                                                echo date("Y-m-d", strtotime($data->tanggal));
                                                                                                                                            } else {
                                                                                                                                                echo date("Y-m-d");
                                                                                                                                            }; ?>">
                                            <div class="invalid-feedback">Tgl. Input Wajib Diisi!!!!!</div>
                                        </div>
                                    </div>
                                    <hr class="sidebar-divider mt-0">
                                    <button type="submit" class="btn btn-sm btn-primary btn-icon-split"><span class="icon text-white-50"><i class="fas fa-save"></i></span><span class="text">Simpan</span></button>
                                    <!-- <button type="reset" class="btn btn-sm btn-danger btn-icon-split"><span class="icon text-white-50"><i class="fas fa-file"></i></span><span class="text">&nbsp Reset &nbsp</span></button> -->
                                    <a class="btn btn-sm btn-danger btn-icon-split" href="<?php echo base_url('admin/skpd') ?>"><span class="icon text-white-50"><i class="fas fa-times"></i></span><span class="text">&nbsp Batal &nbsp</span></a>
                                </form>
                            <?php endforeach; ?>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->
                </div>
                <!-- End of Main Content -->