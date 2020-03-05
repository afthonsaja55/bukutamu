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
                    <div class="box-body">
                        <?php foreach ($lapor as $l) { ?>
                            <form action="<?= base_url('laporan/updatesecurity'); ?>" method="post">
                                <div class="form-group row">
                                    <label for="tgl" class="col-sm-2 col-form-label">Tanggal Masuk</label>
                                    <div class="col-sm-10">
                                        <input type="hidden" class="form-control" name="id" value="<?php echo $l->id ?>">
                                        <input type="text" class="form-control" id="tgl" name="tgl" value="<?= date('d-m-Y', strtotime($l->tgl)); ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="jam" class="col-sm-2 col-form-label">Jam Masuk</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" id="id_jam" name="id_jam">
                                            <?php foreach ($lap_jam as $lj) : ?>
                                                <option value="<?= $lj['jam']; ?>"><?= $lj['jam']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="uraian" class="col-sm-2 col-form-label">Uraian</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" id="id_lokasi" name="id_lokasi">
                                            <?php foreach ($lap_lok as $lk) : ?>
                                                <option value="<?= $lk['lokasi']; ?>"><?= $lk['lokasi']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="kondisi" class="col-sm-2 col-form-label">Kondisi</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="kondisi" name="kondisi" value="<?= $l->kondisi ?>">
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