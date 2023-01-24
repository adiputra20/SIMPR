<body>
    <?php foreach ($skpd as $data) : ?>
        <table border="1" cellspacing="0" width="100%">
            <tr>
                <td rowspan="3" width="10%">
                    <center><img src="<?php echo base_url() . 'assets/img/logo.png'; ?>" class="img-fluid ml-2.5" width="85px"></center>
                </td>
                <td width="70%">
                    <h1 class="h5 mb-0 text-gray-800 font-weight-bold ml-3 mt-2 text-center"><b>PEMERINTAH <?php foreach ($pemda as $client) {
                                                                                                                echo $client->Nama_Pemda;
                                                                                                            }; ?></b></h1>
                    <h1 class="h5 mb-0 text-gray-800 font-weight-bold ml-3 text-center"><b>SKRD</b></h1>
                    <h1 class="h5 mb-0 text-gray-800 font-weight-bold ml-3 text-center"><b>(SURAT KETETAPAN RETRIBUSI DAERAH)</b></h1>
                    <hr color="black">
                    <form action="form-inline">
                        <div class="form-group row mb-1">
                            <label class="col-sm-3 col-form-label ml-4 text-gray-900">Masa Retribusi</label>
                            <div class="col-sm-6">
                                <input type="text" readonly class="form-control-plaintext text-gray-900" value=": <?php echo date("F", strtotime($data->penetapan)); ?> sampai dengan <?php echo date("F", strtotime($data->jatuhtempo)); ?>">
                            </div>
                        </div>
                        <div class="form-group row mb-1">
                            <label for="staticEmail" class="col-sm-3 col-form-label ml-4 text-gray-900">Tahun Retribusi</label>
                            <div class="col-sm-6">
                                <input type="text" readonly class="form-control-plaintext text-gray-900" value=": <?php echo $data->tahun; ?>">
                            </div>
                        </div>
                    </form>
                </td>
                <td class="text-center">
                    <small class="font-weight-bold text-gray-900"> NOMOR URUT
                        <br>
                        <?php echo $data->skrd; ?> </small>
                </td>
            </tr>
        </table>
        <table width="100%" cellspacing="0" border="1">
            <tr>
                <td>
                    <div class="form-group row mb-1">
                        <label class="col-sm-3 col-form-label ml-4 text-gray-900">NPWRD</label>
                        <div class="col-sm-6 ml-0">
                            <input type="text" readonly class="form-control-plaintext text-gray-900" value=": <?php echo $data->npwrd; ?> ">
                        </div>
                    </div>
                    <div class="form-group row mb-1">
                        <label class="col-sm-3 col-form-label ml-4 text-gray-900">Nama Pemilik/Nama Usaha</label>
                        <div class="col-sm-6 ml-0">
                            <input type="text" readonly class="form-control-plaintext text-gray-900" value=": <?php echo $data->namapemilik; ?> / <?php echo $data->namausaha; ?>">
                        </div>
                    </div>
                    <div class="form-group row mb-1">
                        <label class="col-sm-3 col-form-label ml-4 text-gray-900">Alamat</label>
                        <div class="col-sm-8 ml-0">
                            <input type="text" readonly class="form-control-plaintext text-gray-900" value=": <?php echo $data->alamatusaha; ?> / <?php echo $data->alamatusaha; ?>">
                        </div>
                    </div>
                    <div class="form-group row mb-1">
                        <label class="col-sm-3 col-form-label ml-4 text-gray-900">Tanggal Jatuh Tempo</label>
                        <div class="col-sm-6 ml-0">
                            <input type="text" readonly class="form-control-plaintext text-gray-900" value=": <?php echo date("d F Y", strtotime($data->jatuhtempo)); ?>">
                        </div>
                    </div>
                </td>
            </tr>
        </table>
        <table width="100%" cellspacing="0" border="1">
            <tr>
                <td width="3%" class="text-gray-900 text-center">NO</td>
                <td width="23%" class="text-center text-gray-900" colspan="6">KODE REKENING</td>
                <td class="text-center text-gray-900">URAIAN PAJAK DAERAH</td>
                <td width="20%" class="text-center text-gray-900">JUMLAH (Rp)</td>
            </tr>
            <tr>
                <td class="text-center text-gray-900">1</td>
                <!-- <td class="text-gray-900">&nbsp;&nbsp;<?php echo $data->kodeLRA; ?></td> -->
                <td class="text-gray-900 text-center" width="4%">&nbsp;&nbsp;<?php echo substr($data->kodeLRA, 0, 1); ?></td>
                <td class="text-gray-900 text-center" width="4%">&nbsp;&nbsp;<?php echo substr($data->kodeLRA, 2, 1); ?></td>
                <td class="text-gray-900 text-center" width="4%">&nbsp;&nbsp;<?php echo substr($data->kodeLRA, 4, 2); ?></td>
                <td class="text-gray-900 text-center" width="4%">&nbsp;&nbsp;<?php echo substr($data->kodeLRA, 7, 2); ?></td>
                <td class="text-gray-900 text-center" width="4%">&nbsp;&nbsp;<?php echo substr($data->kodeLRA, 10, 2); ?></td>
                <td class="text-gray-900 text-center" width="5%">&nbsp;&nbsp;<?php echo trim(substr($data->kodeLRA, 13, 4)); ?></td>
                <td class="text-gray-900">&nbsp;&nbsp;<?php echo $data->obyek; ?> ( <?php echo ((date("m", strtotime($data->jatuhtempo)) - date("m", strtotime($data->penetapan))) + 1); ?> Bulan x Rp <?php echo number_format($data->perbulan, 0, ",", "."); ?> )</td>
                <td class="text-right text-gray-900"><?php echo number_format($data->pokok, 0, ",", "."); ?>&nbsp;&nbsp;</td>
            </tr>
            <?php for ($i = 2; $i <= 4; $i++) { ?>
                <tr>
                    <td class="text-center text-gray-900"><?php echo $i; ?></td>
                    <td class="text-gray-900"></td>
                    <td class="text-gray-900"></td>
                    <td class="text-right text-gray-900"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            <?php } ?>
        </table>
        <table width="100%" cellspacing="0" border="1">
            <tr>
                <td class="text-right text-gray-900">Jumlah Ketetapan Pokok Pajak Daerah&nbsp;&nbsp;</td>
                <td class="text-right text-gray-900" width="20%"><?php echo number_format($data->pokok, 0, ",", "."); ?>&nbsp;&nbsp;</td>
            </tr>
            <tr>
                <td class="text-right text-gray-900">Jumlah Sanksi&nbsp;&nbsp;</td>
                <td class="text-right text-gray-900" width="20%"><?php echo number_format($data->denda, 0, ",", "."); ?>&nbsp;&nbsp;</td>
            </tr>
            <tr>
                <td class="text-right text-gray-900">Jumlah Keselurahan&nbsp;&nbsp;</td>
                <td class="text-right text-gray-900" width="20%"><?php echo number_format($data->ketetapan, 0, ",", "."); ?>&nbsp;&nbsp;</td>
            </tr>
        </table>
        <table border="1" width="100%" cellspacing="0">
            <tr>
                <td class="text-gray-900">&nbsp;&nbsp;&nbsp;Terbilang : <?php echo $terbilang; ?></td>
            </tr>
        </table>
        <table border="1" width="100%" cellspacing="0">
            <tr>
                <td class="text-gray-900">
                    &nbsp;&nbsp;&nbsp;<b>PERHATIAN :</b><br>
                    &nbsp;&nbsp;&nbsp;1. Pembayaran melalui <?php foreach ($pemda as $client) {
                                                                echo $client->bank . ', ' . ucwords($client->Nama_Pemda);
                                                            }; ?>;<br>
                    &nbsp;&nbsp;&nbsp;2. Terlambat membayar dari Tanggal Jatuh Tempo, dikenakan sanksi administrasi berupa bunga sebesar 2% (dua persen) sebulan.
                </td>
            </tr>
        </table>
        <?php foreach ($pemda as $client) : ?>
            <table width="100%" border="1" cellspacing="0">
                <tr>
                    <td class="text-gray-900"><br>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label"></label>
                            <label for="inputEmail3" class="col-sm-2 col-form-label"></label>
                            <label for="inputEmail3" class="col-sm-2 col-form-label"></label>

                            <div class="col-sm-5">
                                <input type="text" class="form-control-plaintext text-gray-900 text-center" value="<?php echo $client->ibu_kota . ', ' . date("d F Y", strtotime($data->tanggal)); ?>">
                                <input type="text" class="form-control-plaintext text-gray-900 text-center" value="<?php echo $client->jbt_kaban; ?>"><br><br><br><br><br>
                                <input type="text" class="form-control-plaintext text-gray-900 font-weight-bold mb-0 text-center" value="<?php echo $client->nama_kaban; ?>">
                                <input type="text" class="form-control-plaintext text-gray-900 mb-0 text-center" value="<?php echo $client->pangkat; ?>">
                                <input type="text" class="form-control-plaintext text-gray-900 mb-0 text-center" value="<?php echo $client->nip_kaban; ?>">
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="text-center">-------------------------------------------Gunting disini--------------------------------------------</td>
                </tr>
                <tr>
                    <td>
                        <div class="form-group row text-gray-900">
                            <label for="inputEmail3" class="col-sm-2 col-form-label"></label>
                            <label for="inputEmail3" class="col-sm-2 col-form-label"></label>
                            <label for="inputEmail3" class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control-plaintext text-gray-900 text-center font-weight-bold" value="No. SKRD : <?php echo $data->skrd; ?>">
                            </div>
                        </div>
                        &nbsp;&nbsp;&nbsp;NPWRD &nbsp;:&nbsp;<?php echo $data->npwrd; ?><br>
                        &nbsp;&nbsp;&nbsp;Nama &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;<?php echo $data->namapemilik; ?><br>
                        &nbsp;&nbsp;&nbsp;Alamat &nbsp;&nbsp;&nbsp;:&nbsp;<?php echo $data->alamatusaha; ?><br>
                        <div class="form-group row text-gray-900">
                            <label for="inputEmail3" class="col-sm-2 col-form-label"></label>
                            <label for="inputEmail3" class="col-sm-2 col-form-label"></label>
                            <label for="inputEmail3" class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control-plaintext text-gray-900 text-center" value="<?php echo $client->ibu_kota . ', ' . date("d F Y", strtotime($data->tanggal)); ?>"><br><br><br>
                                <input type="text" class="form-control-plaintext text-gray-900 text-center" value="Yang Menerima">
                                <input type="text" class="form-control-plaintext text-gray-900 text-center" value="( <?php echo $data->namapemilik; ?> )">
                            </div>
                        </div>
                    </td>
                </tr>
            </table>
        <?php endforeach; ?>
    <?php endforeach; ?>

    <script>
        window.print();
        window.onafterprint = back;

        function back() {
            window.history.back();
        }
    </script>
</body>