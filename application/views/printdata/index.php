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
                    </div>
                    <!-- /.box-header -->

                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Laporan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Laporan Bukutamu</td>
                                    <td>
                                        <a class="btn btn-sm btn-default" href="#lap_bukutamu" data-toggle="modal"><span class="fa fa-print"></span> Print</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Laporan Security</td>
                                    <td>
                                        <a class="btn btn-sm btn-default" href="#lap_security" data-toggle="modal"><span class="fa fa-print"></span> Print</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Laporan Gabungan</td>
                                    <td>
                                        <a class="btn btn-sm btn-default" href="#lap_gabungan" data-toggle="modal"><span class="fa fa-print"></span> Print</a>
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Laporan</th>
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

<!-- ============ MODAL Bukutamu =============== -->
<div class="modal fade" id="lap_bukutamu" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title" id="myModalLabel">Pilih Tanggal</h3>
            </div>
            <form class="form-horizontal" method="post" action="<?= base_url('printdata/lap_bukutamu_pertanggal'); ?>" target="_blank">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label col-xs-3">Tanggal</label>
                        <div class="col-xs-9">
                            <div class='input-group date' style="width:300px;">
                                <input type="date" name="tgl" class="form-control" value="" placeholder="Pilih Tanggal" required />
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button type="submit" class="btn btn-info"><span class="fa fa-print"></span> Cetak</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- ============ MODAL Security =============== -->
<div class="modal fade" id="lap_security" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title" id="myModalLabel">Pilih Tanggal</h3>
            </div>
            <form class="form-horizontal" method="post" action="<?= base_url('printdata/lap_security_pertanggal'); ?>" target="_blank">
                <div class="modal-body">

                    <div class="form-group">
                        <label class="control-label col-xs-3">Tanggal</label>
                        <div class="col-xs-9">
                            <div class='input-group date' style="width:300px;">
                                <input type="date" name="tgl" class="form-control" value="" placeholder="Pilih Tanggal" required />
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button class="btn btn-info"><span class="fa fa-print"></span> Cetak</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- ============ MODAL Gabungan =============== -->
<div class="modal fade" id="lap_gabungan" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title" id="myModalLabel">Pilih Tanggal</h3>
            </div>
            <form class="form-horizontal" method="post" action="<?= base_url('printdata/lap_gabungan_pertanggal'); ?>" target="_blank">
                <div class="modal-body">

                    <div class="form-group">
                        <label class="control-label col-xs-3">Tanggal</label>
                        <div class="col-xs-9">
                            <div class='input-group date' style="width:300px;">
                                <input type="date" name="tgl" class="form-control" value="" placeholder="Pilih Tanggal" required />
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button class="btn btn-info"><span class="fa fa-print"></span> Cetak</button>
                </div>
            </form>
        </div>
    </div>
</div>