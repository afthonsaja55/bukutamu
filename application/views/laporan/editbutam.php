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
                    <?= $this->session->flashdata('message'); ?>
                    <div class="box-body">
                        <?php foreach ($butam as $bt) { ?>
                            <form action="<?= base_url('laporan/updatebutam'); ?>" method="post">
                                <div class="form-group row">
                                    <label for="tgl" class="col-sm-2 col-form-label">Tanggal Masuk</label>
                                    <div class="col-sm-10">
                                        <input type="hidden" class="form-control" name="id" value="<?php echo $bt->id ?>">
                                        <input type="text" class="form-control" id="tgl" name="tgl" value="<?= $bt->tgl ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="jam" class="col-sm-2 col-form-label">Jam Masuk</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="jam" name="jam" value="<?= date('H:i:s', $bt->jam); ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="uraian" class="col-sm-2 col-form-label">Uraian</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="uraian" name="uraian" value="<?= $bt->uraian ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="keterangan" name="keterangan" value="<?= $bt->keterangan ?>">
                                    </div>
                                </div>
                                <div class="form-group row justify-content-end">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">Ubah</button>
                                    </div>
                                </div>
                            </form>
                        <?php } ?>
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