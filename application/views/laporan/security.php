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
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <center>
                            <img src="<?= base_url(); ?>assets/img/logokppn.png" class="img-thumbnail">
                            <br>
                            <br>
                            <h3 class="box-title"><?= $title2; ?></h3>
                        </center>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                    <?= $this->session->flashdata('message'); ?>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Lokasi</th>
                                    <th>Jam</th>
                                    <th>Kondisi</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($laporan as $l) : ?>
                                    <tr>
                                        <td><?= $i; ?></td>
                                        <td><?= date('d-m-Y', strtotime($l['tgl'])); ?></td>
                                        <td><?= $l['id_lokasi']; ?></td>
                                        <td><?= $l['id_jam']; ?></td>
                                        <td><?= $l['kondisi']; ?></td>
                                        <td>
                                            <a href="<?= base_url('laporan/editsecurity/') . $l['id']; ?>" class="btn btn-xs btn-warning"><i class="fa fa-edit "></i></a>
                                            <a href="<?= base_url('laporan/deletesecurity/') . $l['id']; ?>" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                <?php endforeach ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Lokasi</th>
                                    <th>Jam</th>
                                    <th>Kondisi</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->