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
                        <?php foreach ($submenu as $sm) { ?>
                            <form action="<?= base_url('menu/updatemenu'); ?>" method="post">
                                <div class="form-group row">
                                    <label for="menu" class="col-sm-2 col-form-label">Sub Menu</label>
                                    <!-- <div class="col-sm-10">
                                        <input type="hidden" class="form-control" name="id" value="<?= $sm->id ?>">
                                        <input type="text" class="form-control" id="menu" name="menu" value="<?= $sm->title ?>">
                                    </div> -->
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