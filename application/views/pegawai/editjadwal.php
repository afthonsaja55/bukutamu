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
                        <?php foreach ($lappeg as $lp) { ?>
                            <form action="<?= base_url('pegawai/updatejadwal'); ?>" method="post">
                                <div class="form-group row">
                                    <label for="tgl" class="col-sm-2 col-form-label">Tanggal Masuk</label>
                                    <div class="col-sm-10">
                                        <input type="hidden" class="form-control" name="id" value="<?php echo $lp->id ?>">
                                        <input type="text" class="form-control" id="tgl" name="tgl" value="<?= $lp->tgl ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="id_peg" class="col-sm-2 col-form-label">Pegawai 1</label>
                                    <div class="col-sm-10">
                                        <select name="id_peg" id="id_peg" class="form-control">
                                            <option value="<?= $lp->id_peg ?>"><?= $lp->id_peg ?></option>
                                            <?php foreach ($peg as $p) : ?>
                                                <option value="<?= $p['nama_peg']; ?>"><?= $p['nama_peg']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="id_peg1" class="col-sm-2 col-form-label">Pegawai 2</label>
                                    <div class="col-sm-10">
                                        <select name="id_peg1" id="id_peg1" class="form-control">
                                            <option value="<?= $lp->id_peg1 ?>"><?= $lp->id_peg1 ?></option>
                                            <?php foreach ($peg as $p) : ?>
                                                <option value="<?= $p['nama_peg']; ?>"><?= $p['nama_peg']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="id_peg2" class="col-sm-2 col-form-label">Pegawai 3</label>
                                    <div class="col-sm-10">
                                        <select name="id_peg2" id="id_peg2" class="form-control">
                                            <option value="<?= $lp->id_peg2 ?>"><?= $lp->id_peg2 ?></option>
                                            <?php foreach ($peg as $p) : ?>
                                                <option value="<?= $p['nama_peg']; ?>"><?= $p['nama_peg']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
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