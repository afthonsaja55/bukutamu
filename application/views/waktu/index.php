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
                    <div class="box-header container">
                        <center>
                            <h3 class="box-title"><?= $title2; ?></h3>
                        </center>
                        <br>
                        <a href="" class="btn btn-info" data-toggle="modal" data-target="#newWaktuModal">Tambah Jam</a>
                    </div>
                    <!-- /.box-header -->

                    <div class="box-body">

                        <?= $this->session->flashdata('message'); ?>

                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Jam</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($waktu as $w) : ?>
                                    <tr>
                                        <td><?= $i; ?></td>
                                        <td><?= $w['jam']; ?></td>
                                        <td>
                                            <a href="<?= base_url('waktu/editwaktu/') . $w['id']; ?>" class="btn btn-xs btn-warning"><i class="fa fa-edit "></i></a>
                                            <a href="<?= base_url('waktu/deletewaktu/') . $w['id']; ?>" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                <?php endforeach ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Jam</th>
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

<div class="modal fade" id="newWaktuModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah Jam</h4>
            </div>
            <form action="<?= base_url('waktu'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="jam" name="jam" placeholder="Masukkan Jam">
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