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
                            <div class=" container my-auto">
                                <h3>Laporan Security</h3>
                                <br>
                                <?= $this->session->flashdata('message'); ?>
                                <form action="<?= base_url('bukutamu/laporan'); ?>" method="post">
                                    <div class="form-group col-6">
                                        <label for="tgl">Tanggal</label>
                                        <input type="date" class="form-control" id="tgl" name="tgl" placeholder="Pilih Tanggal">
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="lokasi">Lokasi</label>
                                        <select class="form-control" id="id_lokasi" name="id_lokasi">
                                            <option value="">Pilih Lokasi</option>
                                            <?php foreach ($lokasi as $l) : ?>
                                                <option value="<?= $l['lokasi']; ?>"><?= $l['lokasi']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="jam">Jam</label>
                                        <select class="form-control" id="id_jam" name="id_jam">
                                            <option value="">Pilih Jam</option>
                                            <?php foreach ($jam as $j) : ?>
                                                <option value="<?= $j['jam']; ?>"><?= $j['jam']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="kondisi">Kondisi</label>
                                        <input type="text" class="form-control" id="kondisi" name="kondisi" placeholder="Masukkan Kondisi">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </form>
                                <br>
                                <center>
                                    <a class="btn small btn-success" href="<?= base_url('bukutamu'); ?>">
                                        <i class="fas fa-angle-double-left"></i> Kembali Ke Halaman Utama
                                    </a>
                                </center>
                            </div>
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