<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?= $title2 ?>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">

    <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo $buku;?></h3>

              <p>Laporan Bukutamu</p>
            </div>
            <div class="icon">
              <i class="fa fa-address-book"></i>
            </div>
            <a href="<?= base_url('laporan'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo $sec;?></h3>

              <p>Laporan Security</p>
            </div>
            <div class="icon">
              <i class="fa fa-file-archive-o"></i>
            </div>
            <a href="<?= base_url('laporan/security'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo $peg;?></h3>

              <p>Jumlah Pegawai</p>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
            <a href="<?= base_url('pegawai'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php echo $users;?></h3>

              <p>Jumlah User</p>
            </div>
            <div class="icon">
              <i class="fa fa-user"></i>
            </div>
            <a href="<?= base_url('admin/tambahuser'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->

        <!-- COLOR PALETTE -->
        <div class="box box-default color-palette-box">
            <div class="box-header with-border">
                <h3 class="box-title"> Selamat datang di Aplikasi Bukutamu KPPN Blitar. Pada aplikasi ini berisi tentang: </h3>
            </div>
            <div class="box-header">
                1. Input Bukutamu
                <br>2. Input Laporan Security
                <br>3. Tambah Pegawai
                <br>4. Tambah Jadwal Pegawai
                <br>5. Cek dan print Laporan Bukutamu
                <br>6. Cek dan print Laporan Security
            </div>
        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->