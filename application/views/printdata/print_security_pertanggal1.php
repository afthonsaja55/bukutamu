<html lang="en" moznomarginboxes mozdisallowselectionprint>

<head>
    <title><?= $title ?></title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="<?= base_url('assets/css/laporan.css') ?>" />
    <link rel="shortcut icon" href="<?= base_url(); ?>assets/img/LogoKementerianKeuangan.png">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/dist/css/AdminLTE.min.css">
</head>

<body onload="window.print()" id="page-top">
    <div class="container">
        <br>
        <div class="row container">
            <table class="table table-borderless">
                <tr>
                    <center><img src="<?= base_url() . 'assets/img/logokppn.png' ?>" /></center>
                </tr>
            </table>
        </div>
        <div class="row container">
            <table class="table table-borderless">
                <tr>
                    <center>
                        <h4>Laporan Harian Bukutamu</h4>
                    </center>
                </tr>
            </table>
        </div>
        <div class="row container">
            <table class="table table-borderless">
                <?php $tgl = $lapor->tgl;
                $newTgl = date('d-m-Y', strtotime($tgl));
                ?>
                <tr>
                    Tanggal : <?= $newTgl ?>
                </tr>
            </table>

            <table class="table table-bordered">
                <thead>
                    <tr class="table-primary">
                        <th style="width:50px; text-align:center;">No</th>
                        <th style="text-align:center;">Tanggal</th>
                        <th style="text-align:center;">Lokasi</th>
                        <th style="text-align:center;">Jam</th>
                        <th style="text-align:center;">Kondisi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($lapor2->result() as $d) : ?>
                        <tr>
                            <td style="text-align:center;"><?= $i; ?></td>
                            <td style="padding-left:5px; text-align:center;"><?= date('d-m-Y', strtotime($d->tgl)); ?></td>
                            <td style="text-align:center;"><?= $d->id_lokasi; ?></td>
                            <td style="text-align:center;"><?= $d->id_jam; ?></td>
                            <td style="text-align:center;"><?= $d->kondisi; ?></td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach ?>
                </tbody>
            </table>

            <table class="table table-bordered table-primary">
                <thead>
                    <tr>
                        <th style="text-align:center;">Pegawai 1</th>
                        <th style="text-align:center;">Pegawai 2</th>
                        <th style="text-align:center;">Pegawai 3</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($peg->result() as $e) : ?>
                        <tr>
                            <td style="text-align:center;"><br><br><br><?= $e->id_peg; ?></td>
                            <td style="text-align:center;"><br><br><br><?= $e->id_peg1; ?></td>
                            <td style="text-align:center;"><br><br><br><?= $e->id_peg2; ?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>

            <table class="table table-bordeless table-primary">
                <thead>
                    <tr>
                        <th style="text-align:center;">Mengetahui<br>Kepala Sub Bagian Umum</th>
                        <th></th>
                        <th style="text-align:center;">Diperiksa<br>Bagian Rumah Tangga</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="text-align:center;"><br><br><br></td>
                        <td style="text-align:center;"><br><br><br></td>
                        <td style="text-align:center;"><br><br><br></td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td style="text-align:center;"><u><b>Niko</b></u><br>NIP. 19720310 199402 1 001</td>
                        <td style="text-align:center;"></td>
                        <td style="text-align:center;"><u><b>Mitro Wibowo</b></u><br>NIP. 19700822 200501 1 091</td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</body>

</html>