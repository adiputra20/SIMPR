    <body>
        <div class="container-fluid">
            <div class="table-responsive">
                <table width="100%" cellspacing="0">
                    <tr>
                        <td class="text-gray-900 text-center text-bold mb-1" rowspan="2" width="7%"><img src="<?php echo base_url() . 'assets/img/logo.png'; ?>" class="img-fluid ml-2.5" width="60px"></td>
                        <td class="text-gray-900">
                            <h1 class="h5 mb-0 text-gray-800 font-weight-bold ml-3 text-center"><b>PEMERINTAH <?php foreach ($pemda as $client) {
                                                                                                                    echo $client->Nama_Pemda;
                                                                                                                }; ?></b></h1>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-gray-900">
                            <h1 class="h4 mb-0 text-gray-800 ml-3 font-weight-bold text-center"><b>BADAN PENDAPATAN DAERAH</b></h1>
                        </td>
                    </tr>
                </table>
                <hr color="black" class="mt-2 mb-0"><br>
                <?php foreach ($stpd as $fiskal) : ?>
                    <?php foreach ($pemda as $client) : ?>
                        <table width="100%" cellspacing="0">
                            <tr>
                                <td class="h5 text-center text-gray-900 mb-0 text-uppercase"><b><?php echo $title; ?></b></td>
                            </tr>
                            <tr>
                                <td class="text-center text-gray-900 text-uppercase"><b><?php echo $fiskal->obyek; ?></b></td>
                            </tr>
                            <tr>
                                <td class="text-center text-gray-900 text-uppercase"><b><br></b></td>
                            </tr>
                        </table>
                        <table width="100%" cellspacing="0" border=1>
                            <tr>
                                <td colspan="2">
                                    <center>
                                        <table width="95%" cellspacing="0" class="text-gray-900">
                                            <tr>
                                                <td>Nomor</td>
                                                <td width="1%">:</td>
                                                <td><?php echo $fiskal->nostpd ?></td>
                                                <td width="15%">Tahun <?php echo $fiskal->tahun; ?> </td>
                                            </tr>
                                            <tr>
                                                <td width="17%">Tanggal Penerbitan</td>
                                                <td>:</td>
                                                <td><?php echo date("d F Y", strtotime($fiskal->tanggal)); ?></td>
                                                <td></td>
                                            </tr>
                                        </table>
                                    </center>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <center>
                                        <table class="text-gray-900" width="95%">
                                            <tr>
                                                <td width="50%"><br>Jumlah pajak/retribusi yang terutang dan masih harus dibayar</td>
                                                <td><br>Rp. <?php echo number_format($fiskal->ketetapan - $fiskal->nilai, 0, ',', '.') ?>,-</td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>( <?php echo $terbilang; ?> )</td>
                                            </tr>
                                            <tr>
                                                <td><br></td>
                                                <td></td>
                                            </tr>
                                        </table>
                                    </center>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <center>
                                        <table class="text-gray-900" width="95%" cellspacing="0">
                                            <tr>
                                                <td width="50%" class="font-weight-bold" colspan="2">
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<u>Letak Obyek Pajak</u></td>
                                                <td class="font-weight-bold">&nbsp;&nbsp;&nbsp;<u>Nama & Alamat Wajib Pajak</u></td>
                                            </tr>
                                            <tr>
                                                <td width="13%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kecamatan</td>
                                                <td>: <?php echo $fiskal->kecamatan ?></td>
                                                <td>&nbsp;&nbsp;&nbsp;<?php echo $fiskal->namausaha; ?></td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Desa</td>
                                                <td>: <?php echo $fiskal->desa ?></td>
                                                <td>&nbsp;&nbsp;&nbsp;<?php echo $fiskal->namapemilik; ?></td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Alamat</td>
                                                <td>: <?php echo $fiskal->alamatusaha ?></td>
                                                <td>&nbsp;&nbsp;&nbsp;<?php echo $fiskal->alamatpemilik; ?></td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NPWPD</td>
                                                <td>: <?php echo $fiskal->npwpd ?></td>
                                                <td>&nbsp;&nbsp;&nbsp;NPWP :</td>
                                            </tr>
                                        </table>
                                    </center>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <center>
                                        <table class="text-gray-900" width="95%">
                                            <tr>
                                                <td width="50%" class="font-weight-bold" colspan="3">Perincian Pajak yang Terutang</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <table width="100%" border="1" cellspacing="0">
                                                        <tr>
                                                            <td class="text-center" width="5%">1</td>
                                                            <td colspan="2">Pajak/Retribusi yang terutang menurut SKPD/SKRD Nomor <?php echo $fiskal->skpd; ?></td>
                                                            <td width="20%" class="text-right">Rp. <?php echo number_format($fiskal->ketetapan - $fiskal->nilai, 0, ",", "."); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-center" width="5%">2</td>
                                                            <td>Telah dibayar tanggal ..........</td>
                                                            <td width="20%" class="text-right">Rp. <?php echo number_format(0, 0, ",", "."); ?></td>
                                                            <td width="20%" class="text-right"></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-center" width="5%">3</td>
                                                            <td>Pengurangan</td>
                                                            <td width="20%" class="text-right">Rp. <?php echo number_format(0, 0, ",", "."); ?></td>
                                                            <td width="20%" class="text-right"></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-center" width="5%">4</td>
                                                            <td colspan="2">Jumlah yang dapat diperhitungkan <sub>(angka 2 + angka 3)</sub></td>
                                                            <td width="20%" class="text-right">Rp. <?php echo number_format(0, 0, ",", "."); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-center" width="5%">5</td>
                                                            <td colspan="2">Pajak/Retribusi yang Kurang dibayar <sub>(angka 1 - angka 4)</sub></td>
                                                            <td width="20%" class="text-right">Rp. <?php echo number_format($fiskal->ketetapan - $fiskal->nilai, 0, ",", "."); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-center" width="5%">6</td>
                                                            <td colspan="2">Denda Administrasi <sub>(2% x jumlah bulan keterlambatan x jumlah angka 5)</sub></td>
                                                            <td width="20%" class="text-right">Rp. <?php echo number_format(0, 0, ",", "."); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-center" width="5%">7</td>
                                                            <td colspan="2">Pajak/Retribusi yang harus dibayar <sub>(angka 5 + angka 6)</sub></td>
                                                            <td width="20%" class="text-right">Rp. <?php echo number_format($fiskal->ketetapan - $fiskal->nilai, 0, ",", "."); ?></td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;</td>
                                            </tr>
                                        </table>
                                    </center>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <center>
                                        <table cellspacing="0" width="95%" class="text-gray-900">
                                            <tr>
                                                <td width="50%">Tanggal Jatuh Tempo : <?php echo date("d F Y", strtotime($fiskal->jatuhtempo));  ?></td>
                                                <td>Tempat Pembayaran : <?php foreach ($pemda as $client) {
                                                                            echo $client->bank;
                                                                        }; ?></td>
                                            </tr>
                                        </table>
                                    </center>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <center>
                                        <table width="95%" cellspacing="0" class="text-gray-900">
                                            <tr>
                                                <td width="50%">
                                                    <br>
                                                    <center><b><u>PERHATIAN</u></b></center><br>
                                                    1. &nbsp;Surat Tagihan ini harus dilunasi paling lambat 1 (satu) bulan <br>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;sejak tanggal diterima <br>&nbsp;<br>
                                                    2. Apabila setalah lewat tanggal jatuh tempo utang pajak/retribusi<br>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;belum dilunasi, maka tindakan penagihan akan dilanjutkan <br>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;dengan penertiban Surat Paksa, pelaksanaan sita dan lelang <br>&nbsp;
                                                </td>
                                                <td>
                                                    <center>
                                                        <?php foreach ($pemda as $client) {
                                                            echo $client->ibu_kota . ', ' . date('d F Y', strtotime($fiskal->tanggal));
                                                        } ?><br><?php foreach ($pemda as $client) {
                                                                                                                                                                                echo $client->jbt_kaban;
                                                                                                                                                                            }; ?><br><br><br><br><br>
                                                        <u><?php foreach ($pemda as $client) {
                                                                echo $client->nama_kaban;
                                                            }; ?></u><br>
                                                        NIP. <?php foreach ($pemda as $client) {
                                                                    echo $client->nip_kaban;
                                                                }; ?>
                                                    </center>
                                                </td>
                                            </tr>
                                        </table>
                                    </center>
                                </td>
                            </tr>
                        </table>
                        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                        <table width="100%" cellspacing="0">
                            <tr>
                                <td class="text-gray-900 text-center text-bold mb-1" rowspan="2" width="7%"><img src="<?php echo base_url() . 'assets/img/logo.png'; ?>" class="img-fluid ml-2.5" width="60px"></td>
                                <td class="text-gray-900">
                                    <h1 class="h5 mb-0 text-gray-800 font-weight-bold ml-3 text-center"><b>PEMERINTAH <?php foreach ($pemda as $client) {
                                                                                                                            echo $client->Nama_Pemda;
                                                                                                                        }; ?></b></h1>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-gray-900">
                                    <h1 class="h4 mb-0 text-gray-800 ml-3 font-weight-bold text-center"><b>BADAN PENDAPATAN DAERAH</b></h1>
                                </td>
                            </tr>
                        </table>
                        <hr color="black" class="mt-2 mb-0"><br>
                        <table width="100%" cellspacing="0">
                            <tr>
                                <td>
                                    <center>
                                        <table width="95%" cellspacing="0" class="text-gray-900">
                                            <tr>
                                                <td colspan="3">Kepada Yth.</td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nama</td>
                                                <td width="1%">:</td>
                                                <td><?php echo $fiskal->namapemilik . '  /  ' . $fiskal->namausaha; ?></td>
                                            </tr>
                                            <tr>
                                                <td width="10%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NPWPD</td>
                                                <td>:</td>
                                                <td><?php echo $fiskal->npwpd; ?></td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Alamat</td>
                                                <td>:</td>
                                                <td><?php echo $fiskal->alamatpemilik; ?></td>
                                            </tr>
                                            <tr>
                                                <td><br></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td colspan="3">
                                                    <h1 class="h5 font-weight-bold text-center mb-0"><u>SURAT TEGURAN</u></h1>
                                                    <center>Nomor : <?php echo $fiskal->nostpd; ?></center>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="3"><br>Menurut tata usaha kami, hingga saat ini Saudara masih mempunyai tunggakan pajak sebagai berikut:</td>
                                            </tr>
                                        </table>
                                    </center>
                                </td>
                            </tr>
                        </table>
                        <center>
                            <table width="95%" cellspacing="0" border="1" class="text-gray-900">
                                <tr>
                                    <td class="text-center">Jenis Pajak/Retribusi</td>
                                    <td width="10%" class="text-center">Tahun Pajak/Retribusi</td>
                                    <td width="20%" class="text-center">Nomor Dokumen Pajak/Retribusi</td>
                                    <td width="15%" class="text-center">Tanggal Jatuh Tempo Pembayaran</td>
                                    <td width="15%" class="text-center">Jumlah Tunggakan Pajak/Retribusi</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;&nbsp;<?php echo $fiskal->obyek; ?></td>
                                    <td width="10%" class="text-center"><?php echo $fiskal->tahun; ?></td>
                                    <td width="20%" class="text-center"><?php echo $fiskal->skpd; ?></td>
                                    <td width="15%" class="text-center"><?php echo date("d M Y", strtotime($fiskal->jatuhtempo)); ?></td>
                                    <td width="15%" class="text-right"><?php echo number_format($fiskal->ketetapan - $fiskal->nilai, 0, ',', '.'); ?></td>
                                </tr>
                            </table>
                            <table width="95%" cellspacing="0" class="text-gray-900">
                                <tr>
                                    <td colspan="2"><small>(*) coret yang tidak perlu</small></td>
                                </tr>
                                <tr>
                                    <td colspan="2">dengan huruf : ( <?php echo $terbilang; ?> )</td>
                                </tr>
                                <tr>
                                    <td colspan="2"><br></td>
                                </tr>
                                <tr>
                                    <td colspan="2">untuk mencegah tindakan peanggilan pajak dengan Surat Paksa berdasarkan peraturan perundang-undangan yang berlaku maka diminta kepada Saudara agar melunasi jumlah tunggakan pajakndalam waktu 1 (satu) bulan.</td>
                                </tr>
                                <tr>
                                    <td colspan="2"><br></td>
                                </tr>
                                <tr>
                                    <td colspan="2">dalam hal Saudara telah melunasi tunggakan pajak/retribusi tersebut diatas, dimohon agar Saudara segera melaporkan kepada kami <br>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td width="50%">
                                        <center>
                                            <table border="1" cellspacing="0">
                                                <tr>
                                                    <td class="text-uppercase">
                                                        <b><u>
                                                                <center>PERHATIAN</center>
                                                            </u></b>
                                                        <br>Pajak harus dilunasi dalam waktu 30 (tiga puluh)
                                                        <br>hari atau 1 (satu) bulan setelah tanggal teguran
                                                        <br>ini<br>
                                                        <br>sesudah batas waktu tersebut, tindakan penagihan
                                                        <br>akan dilanjutkan dengan penertiban surat paksa.
                                                    </td>
                                                </tr>
                                            </table>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <?php foreach ($pemda as $client) {
                                                echo $client->ibu_kota . ', ' . date('d F Y', strtotime($fiskal->tanggal));
                                            } ?><br><?php foreach ($pemda as $client) {
                                                                                                                                                                    echo $client->jbt_kaban;
                                                                                                                                                                }; ?><br><br><br><br><br>
                                            <u><?php foreach ($pemda as $client) {
                                                    echo $client->nama_kaban;
                                                }; ?></u><br>
                                            NIP. <?php foreach ($pemda as $client) {
                                                        echo $client->nip_kaban;
                                                    }; ?>
                                        </center>
                                    </td>
                                </tr>
                            </table>
                        </center>
                    <?php endforeach; ?>
                <?php endforeach; ?>
            </div>
        </div>
    </body>
    <script>
        window.print();
        window.onafterprint = back;

        function back() {
            window.history.back();
        }
    </script>

    </html>