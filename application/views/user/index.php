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
                        <div class="row">
                            <div class="col-lg-12">
                                <?= $this->session->flashdata('message'); ?>
                            </div>
                        </div>

                        <!-- Profile Image -->
                        <div class="box box-primary">
                            <div class="box-body box-profile">
                                <img class="profile-user-img img-responsive img-circle" src="<?= base_url('assets/img/profile/') . $user['image']; ?>" alt="User profile picture">

                                <h3 class="profile-username text-center"><?= $user['name']; ?></h3>

                                <ul class="list-group list-group-unbordered">
                                    <li class="list-group-item">
                                        <b>Email :</b> <a class="pull-right"><?= $user['email']; ?></a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Member Since:</b> <a class="pull-right"><?= date('d F Y', $user['date_created']); ?></a>
                                    </li>
                                </ul>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
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