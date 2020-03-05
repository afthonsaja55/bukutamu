<div class=" container my-auto">
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg">
                    <div class="p-5">
                        <nav class="navbar navbar-expand-lg navbar-light bg-light">
                            <a class="navbar-brand col-2" href="<?= base_url('bukutamu'); ?>"><img src="<?= base_url(); ?>assets/img/logokppn.png"></a>
                            <h5 class="col-8">Kantor Pelayanan Perbendaharaan Negara Blitar</h5>
                            <a class="btn btn-outline-success col-1" href="<?= base_url('auth'); ?>">LOGIN</a>
                        </nav>
                        <br>
                        <center>
                            <h3>Bukutamu</h3>
                            <br>
                            <?= $this->session->flashdata('message'); ?>
                            <form action="<?= base_url('bukutamu/bukutamu'); ?>" method="post">
                                <div class=" container">
                                    <div class="form-group col-6">
                                        <label for="tgl">Tanggal</label>
                                        <input type="date" class="form-control" id="tgl" name="tgl" placeholder="Pilih Tanggal">
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="uraian">Uraian</label>
                                        <input type="text" class="form-control" id="uraian" name="uraian" placeholder="Masukkan Uraian">
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="keterangan">Keterangan</label>
                                        <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Masukkan Keterangan">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                            <br>
                            <center>
                                <a class="btn small btn-success" href="<?= base_url('bukutamu'); ?>">
                                    <i class="fa fa-angle-double-left"></i> Kembali Ke Halaman Utama
                                </a>
                            </center>
                        </center>
                        <br>
                        <!-- Footer -->
                        <footer class="sticky-footer bg-light">
                            <div class="container my-auto">
                                <div class="copyright text-center my-auto">
                                    <span>Copyright &copy; KPPN Blitar <?= date('Y'); ?></span>
                                </div>
                            </div>
                        </footer>
                        <!-- End of Footer -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>