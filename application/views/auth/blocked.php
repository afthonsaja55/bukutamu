<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            404 Error Page
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="error-page">
            <h2 class="headline text-yellow"> 404</h2>

            <div class="error-content">
                <h3><i class="fa fa-warning text-yellow"></i> Oops! Page not found.</h3>

                <p>
                    Halaman yang anda cari masih dalam tahap pembenahan.
                    Silahkan, kembali ke <a href="<?= base_url('user'); ?>">dashboard</a>.
                </p>

                <a class="btn btn-xs btn-warning" href="<?= base_url('user'); ?>">
                    <i class="fa btn-xs btn-warning"></i> Kembali Ke Halaman Utama
                </a>
            </div>
            <!-- /.error-content -->
        </div>
        <!-- /.error-page -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->