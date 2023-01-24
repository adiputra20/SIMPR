<body>
    <?php foreach($sspd as $data): ?>
        <table border="1" cellspacing="0" width="100%">
            <tr>
                <td rowspan="3" width="10%"><center><img src="<?php echo base_url().'assets/img/logo.png';?>" class="img-fluid ml-2.5" width="85px"></center></td>
                <td width="70%">
                    <h1 class="h5 mb-0 text-gray-800 font-weight-bold ml-3 mt-2 text-center"><b>PEMERINTAH <?php foreach ($pemda as $client){ echo $client->Nama_Pemda; }; ?></b></h1>
                    <h1 class="h5 mb-0 text-gray-800 font-weight-bold ml-3 text-center"><b><?php echo $jns; ?></b></h1>
                    <h1 class="h5 mb-0 text-gray-800 font-weight-bold ml-3 text-center"><b>(<?php echo $jenis; ?>)</b></h1>
                    <hr color="black">
                    <form action="form-inline">
                        <div class="form-group row mb-0">
                            <label class="col-sm-2 col-form-label col-form-label-sm ml-4 text-gray-900 mb-0">Bulan</label>
                            <div class="col-sm-5">
                                <input type="text" readonly class="form-control-plaintext form-control-sm text-gray-900" value=": <?php echo date("F",strtotime($data->tanggal)); ?>">
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <label for="staticEmail" class="col-sm-2 col-form-label col-form-label-sm ml-4 text-gray-900">Tahun</label>
                            <div class="col-sm-6">
                                <input type="text" readonly class="form-control-plaintext form-control-sm text-gray-900" value=": <?php echo date("Y",strtotime($data->tanggal));; ?>">
                            </div>
                        </div>
                    </form>
                </td>
                <td class="text-center">
                    <small class="font-weight-bold text-gray-900"> NOMOR URUT
                    <br>
                    <?php echo $data->sspd; ?> </small>
                </td>
            </tr>
        </table>
        <table border="1" cellspacing="0" width="100%">
            <tr>
                <td class="text-gray-900">
                    <br><label class="col-sm-8 col-form-label col-form-label-sm ml-3 mb-0 text-gray-900">Bendaharan Penerimaan Badan Pendapatan Daerah <?php foreach ($pemda as $client){ echo $client->Nama_Pemda; }; ?></label>
                    <div class="form-group row mb-0">
                        <label class="col-sm-3 col-form-label col-form-label-sm ml-4 text-gray-900">&nbsp;Telah Menerima Uang Sebesar</label>
                        <div class="col-sm-6 ml-0">
                            <input type="text" readonly class="form-control-plaintext form-control-sm text-gray-900" value=": Rp. <?php if($data->nilai != ""){ echo number_format($data->nilai,2,',','.'); } ?> ">
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <label class="col-sm-3 col-form-label col-form-label-sm ml-4 text-gray-900">&nbsp;Dengan Huruf</label>
                        <div class="col-sm-6 ml-0">
                            <input type="text" readonly class="form-control-plaintext form-control-sm text-gray-900" value=": <?php echo $terbilang; ?> ">
                        </div>
                    </div>
                    <label class="col-sm-8 col-form-label col-form-label-sm ml-3 text-gray-900">dari</label>
                    <div class="form-group row mb-0">
                        <label class="col-sm-3 col-form-label col-form-label-sm ml-4 text-gray-900">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nama</label>
                        <div class="col-sm-6 ml-0">
                            <input type="text" readonly class="form-control-plaintext form-control-sm text-gray-900" value=": <?php echo $data->namausaha; ?> / <?php echo $data->namapemilik; ?> ">
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <label class="col-sm-3 col-form-label col-form-label-sm ml-4 text-gray-900">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NPWPD</label>
                        <div class="col-sm-6 ml-0">
                            <input type="text" readonly class="form-control-plaintext form-control-sm text-gray-900" value=": <?php echo $data->npwprd; ?>">
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <label class="col-sm-3 col-form-label col-form-label-sm ml-4 text-gray-900">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Alamat</label>
                        <div class="col-sm-6 ml-0">
                            <input type="text" readonly class="form-control-plaintext form-control-sm text-gray-900" value=": <?php echo $data->alamatusaha; ?>">
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <label class="col-sm-3 col-form-label col-form-label-sm ml-4 text-gray-900">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Jenis Pajak</label>
                        <div class="col-sm-6 ml-0">
                            <input type="text" readonly class="form-control-plaintext form-control-sm text-gray-900" value=": <?php echo $data->obyek; ?>">
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <label class="col-sm-3 col-form-label col-form-label-sm ml-4 text-gray-900">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sebagai Pembayaran</label>
                        <div class="col-sm-6 ml-0">
                            <input type="text" readonly class="form-control-plaintext form-control-sm text-gray-900" value=": <?php echo $data->keterangan; ?>">
                        </div>
                    </div>
                </td>
            </tr>
        </table>
        <table border="1" cellspacing="0" width="100%" class="text-gray-900">
            <tr>
                <td class="text-center">KODE REKENING</td>
                <td class="text-center" width="20%">Jumlah (Rp)</td>
            </tr>
            <tr>
                <td class="col-form-label-sm ml-4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(1). <?php echo $data->kodelra; ?></td>
                <td class="text-right"><?php if($data->nilai != ""){ echo 'Rp. '.number_format($data->nilai,2,',','.'); } ?>&nbsp;&nbsp;&nbsp;</td>
            </tr>
            <tr>
                <td class="col-form-label-sm ml-4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(2).</td>
                <td class="text-right"></td>
            </tr>
            <tr>
                <td class="col-form-label-sm ml-4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(3). </td>
                <td class="text-right"></td>
            </tr>
            <tr>
                <td class="col-form-label-sm ml-4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(4). </td>
                <td class="text-right"></td>
            </tr>
            <tr>
                <td class="col-form-label-sm ml-4 text-right font-weight-bold">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;JUMLAH&nbsp;&nbsp;&nbsp;</td>
                <td class="text-right font-weight-bold"><?php if($data->nilai != ""){ echo 'Rp. '.number_format($data->nilai,2,',','.'); } ?>&nbsp;&nbsp;&nbsp;</td>
            </tr>
        </table>
        <table border="1" cellspacing="0" width="100%" class="text-gray-900">
            <tr>
                <td>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tanggal Diterima Uang : <?php echo date("d F Y",strtotime($data->tanggal)); ?>
                    <br>
                    <div class="form-row align-items-center">
                        <div class="col-sm-6 my-1">
                            <!-- <label class="sr-only" for="inlineFormInputName">Name</label> -->
                            <input type="text" class="form-control form-control-plaintext text-gray-900 text-center" id="inlineFormInputName" value="Mengetahui,">
                        </div>
                        <div class="col-sm-6 my-1">
                            <!-- <label class="sr-only" for="inlineFormInputName">Name</label> -->
                            <input type="text" class="form-control form-control-plaintext text-gray-900 text-center" id="inlineFormInputName" value="Pembayar/Penyetor">
                        </div>
                    </div>
                    <br><br><br>
                    <div class="form-row align-items-center">
                        <div class="col-sm-6 my-1">
                            <!-- <label class="sr-only" for="inlineFormInputName">Name</label> -->
                            <input type="text" class="form-control form-control-plaintext text-gray-900 text-center" id="inlineFormInputName" value="...............................">
                        </div>
                        <div class="col-sm-6 my-1">
                            <!-- <label class="sr-only" for="inlineFormInputName">Name</label> -->
                            <input type="text" class="form-control form-control-plaintext text-gray-900 text-center" id="inlineFormInputName" value="...............................">
                        </div>
                    </div>
                    <p class="col-form-label-sm">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Lembar 1 : Untuk Pembayar/Penyetor/Pihak Ketiga <br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Lembar 2 : Untuk Bank <br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Lembar 3 : Untuk Bendahara Penerima/Bendahara Pembantu <br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Lembar 4 : Arsip. <br></p>
                </td>
            </tr>
        </table>
    <?php endforeach; ?>
    <script>
        window.print();
        window.onafterprint = back;

        function back() {
            window.history.back();
        }
    </script>
</body>