    
    <body>
        <div class="container-fluid">
            <div class="table-responsive">
                <table width="100%" cellspacing="0">
                        <tr>
                            <td class="text-gray-900 text-center text-bold mb-1" rowspan="3" width="7%"><img src="<?php echo base_url().'assets/img/logo.png';?>" class="img-fluid ml-2.5" width="60px"></td>
                            <td class="text-gray-900" ><h1 class="h6 mb-0 text-gray-800 font-weight-bold ml-3 text-center"><b>PEMERINTAH <?php foreach ($pemda as $client){ echo $client->Nama_Pemda; }; ?></b></h1></td> 
                        </tr>
                        <tr>
                            <td class="text-gray-900"> <h1 class="h5 mb-0 text-gray-800 ml-3 font-weight-bold text-center"><b><?php echo $title; ?></b></h1></td>  
                        </tr>
                        <tr>
                            <td class="text-gray-900 text-center"><?php echo 'Periode ' . $periode; ?></td>  
                        </tr>
                </table>
                <hr color="black" class="mt-2 mb-0"><br>
                <small>
                    <table width="100%" cellspacing="0" border="1" class="text-gray-900">
                        <thead class="text-center">
                            <th>Kode</th>
                            <th>Uraian</th>
                            <?php if($jenis=="lra"){ ?>
                                <th width="15%">Anggaran</th>
                            <?php  } ?>
                            <th width="15%">Realisasi</th>
                        </thead>
                        <tbody>
                            <?php foreach($lra as $data): ?>
                                <tr>
                                    <td><?php echo $data->kode; ?></td>
                                    <td><?php echo $data->nama; ?></td>
                                    <?php if($jenis=="lra"){ ?>
                                        <td class="text-right"><?php echo number_format($data->anggaran,0,',','.'); ?></td>
                                    <?php  } ?>
                                    <td class="text-right"><?php echo number_format($data->nilai,0,',','.'); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </small>
            </div>
        </div>
    </body>
    <script>
        window.print();
        /* window.onafterprint = back;

        function back() {
            window.history.back();
        } */
    </script>
</html>