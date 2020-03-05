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
                            <h3 class="box-title"><?= $title2; ?></h3>
                        </center>
                        <br>
                        <?= $this->session->flashdata('message'); ?>

                        <a href="" class="btn btn-info" data-toggle="modal" data-target="#newTambahJadwalModal">Tambah Jadwal Pegawai</a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Pegawai 1</th>
                                    <th>Pegawai 2</th>
                                    <th>Pegawai 3</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($lappeg as $lp) : ?>
                                    <tr>
                                        <td><?= $i; ?></td>
                                        <td><?= date('d-m-Y', strtotime($lp['tgl'])); ?></td>
                                        <td><?= $lp['id_peg']; ?></td>
                                        <td><?= $lp['id_peg1']; ?></td>
                                        <td><?= $lp['id_peg2']; ?></td>
                                        <td>
                                            <a href="<?= base_url('pegawai/editjadwal/') . $lp['id']; ?>" class="btn btn-xs btn-warning"><i class="fa fa-edit "></i></a>
                                            <a href="<?= base_url('pegawai/deletejadwal/') . $lp['id']; ?>" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                <?php endforeach ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Pegawai 1</th>
                                    <th>Pegawai 2</th>
                                    <th>Pegawai 3</th>
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

<div class="modal fade" id="newTambahJadwalModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah Jadwal Pegawai</h4>
            </div>
            <form action="<?= base_url('pegawai/tambah'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">tanggal :</label>
                        <input type="date" class="form-control" id="tgl" name="tgl" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Pegawai 1 :</label>
                        <select name="id_peg" id="id_peg" class="form-control">
                            <option>Pilih Pegawai</option>
                            <?php foreach ($peg as $p) : ?>
                                <option value="<?= $p['nama_peg']; ?>"><?= $p['nama_peg']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Pegawai 2 :</label>
                        <select name="id_peg1" id="id_peg1" class="form-control">
                            <option>Pilih Pegawai</option>
                            <?php foreach ($peg as $p) : ?>
                                <option value="<?= $p['nama_peg']; ?>"><?= $p['nama_peg']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Pegawai 3 :</label>
                        <select name="id_peg2" id="id_peg2" class="form-control">
                            <option>Pilih Pegawai</option>
                            <?php foreach ($peg as $p) : ?>
                                <option value="<?= $p['nama_peg']; ?>"><?= $p['nama_peg']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Keluar</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->