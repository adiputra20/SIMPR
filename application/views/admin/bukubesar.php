<!-- Begin Page Content -->
<small>
    <div class="container-fluid">
        <?php
        if (isset($_GET['tanggalAwal']) && isset($_GET['tanggalAkhir']) && isset($_GET['obyek'])) {
            $tanggalAwal  = $_GET['tanggalAwal'];
            $tanggalAkhir = $_GET['tanggalAkhir'];
            $obyek        = $_GET['obyek'];

            $keterangan   = $_GET['obyek'] . ' dari tanggal ' . date("d F Y", strtotime($_GET['tanggalAwal'])) . ' sampai dengan ' . date("d F Y", strtotime($_GET['tanggalAkhir']));
        } else {
            $tanggalAwal  = "";
            $tanggalAkhir = "";
            $obyek        = "";

            $keterangan   = "";
        };
        ?>
        <div class="card shadow mb-1">
            <div class="card-header py-3">
                <span class="m-0 font-weight-bold text-secondary">Pilih <?php echo $title; ?> yang Anda Inginkan</span>
            </div>
            <div class="card-body">
                <form class="form-inline">
                    <div class="form-group mb-0">
                        <label class="col-form-label col-form-label-sm sm mb-2 mr-sm-2" for="inlineFormInputName2">Tanggal Awal :&nbsp;</label>
                        <input type="date" class="form-control form-control-sm mb-2 mr-sm-2" id="inlineFormInputName2" name="tanggalAwal" value="<?= $tanggalAwal ?>" required>
                        <div class="invalid-feedback">Tanggal Awal Wajib Diisi!!!</div>
                        <label class="col-form-label col-form-label-sm sm mb-2 mr-sm-2" for="inlineFormInputName2">&nbsp;s.d&nbsp;&nbsp;</label>
                        <input type="date" class="form-control form-control-sm mb-2 mr-sm-2" id="inlineFormInputName2" name="tanggalAkhir" value="<?= $tanggalAkhir ?>" required>
                        <div class="invalid-feedback">Tanggal Akhir Wajib Diisi!!!</div>
                        <select name="obyek" id="obyek" class="form-control form-control-sm sm mb-2 mr-sm-2" required>
                            <option selected disable value="">Pilih Rekening...</option>
                            <?php foreach ($rek as $kode) : ?>
                                <option value="<?php echo $kode->obyek; ?>" <?= $kode->obyek == $obyek ? "selected" : null ?>><?php echo $kode->obyek; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">Rekening Wajib Diisi!!!</div>
                        <button type="submit" class="btn btn-sm btn-info btn-icon-split mb-2 mr-sm-2"><span class="icon text-white-50"><i class="fas fa-eye"></i></span><span class="text">Tampilkan</span></button>
                        <a href="<?php echo base_url('admin/bukubesar/printData/?tanggalAwal=' . $_GET['tanggalAwal'] . '&tanggalAkhir=' . $_GET['tanggalAkhir'] . '&obyek=' . $_GET['obyek']); ?>" target="_blank" class="btn btn-sm btn-success btn-icon-split mb-2 mr-sm-2"><span class="icon text-white-50"><i class="fas fa-print"></i></span><span class="text">&nbsp;&nbsp;&nbsp;&nbsp;Cetak&nbsp;&nbsp;&nbsp;&nbsp;</span></a>
                    </div>
                </form>
            </div> <!-- /.Card Body -->
        </div> <!-- Card -->
        <div class="alert alert-sm alert-info">
            Menampilkan Buku Besar <span class="font-weight-bold"><?php echo $keterangan; ?></span>
        </div>
        <table class="table table-bordered table-hover table-sm" cellspacing="0" width="100%" id="example">
            <thead>
                <th class="text-center">No.</th>
                <th class="text-center">Tanggal</th>
                <th class="text-center">No. Bukti</th>
                <th class="text-center">Keterangan</th>
                <th class="text-center">Debet</th>
                <th class="text-center">Kredit</th>
                <th class="text-center">Saldo</th>
            </thead>
            <tbody>
                <?php $i = 1;
                $saldo = 0;
                foreach ($bukubesar as $data) : $saldo += $data->nilai; ?>
                    <tr>
                        <td class="text-center" width="3%"><?php echo $i++; ?></td>
                        <td width="8%"><?php echo date("d-m-Y", strtotime($data->tanggal)); ?></td>
                        <td width="20%"><?php echo $data->uraian; ?></td>
                        <td><?php echo $data->keterangan; ?></td>
                        <td class="text-right" width="10%"><?php echo '0'; ?></td>
                        <td class="text-right" width="10%"><?php echo number_format($data->nilai, 0, '.', ','); ?></td>
                        <td class="text-right" width="10%"><?php echo number_format($saldo, 0, '.', ','); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div> <!-- container fluid -->
</small>
</div> <!-- End of Main Content -->