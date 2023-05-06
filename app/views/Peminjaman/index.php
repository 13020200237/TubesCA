<style>
    button {
        background-color: #4CAF50;
        /* Green */
        border: none;
        color: white;
        padding: 8px 16px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
        border-radius: 4px;
    }

    .acc {
        background-color: #008CBA;
        /* Blue */
    }

    .tolak {
        background-color: #f44336;
        /* Red */
    }

    .th {
        text-align: center;
    }

    .kembali {
        background-color: #008CBA;
        /* Blue */
    }

    .bermasalah {
        background-color: #f44336;
        /* Red */
    }
</style>


<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2 class="h2">Peminjam Alat</h2>
    </div>

    <div class=tabel>
        <div class="table-responsive">
            <table class="table  table-sm table-bordered">
                <h5 class=h5>DATA MAHASISWA YANG MELAKUKAN PEMINJAMAN</h5>
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Nama Peminjam</th>
                        <th scope="col">Tanggal Mulai</th>
                        <th scope="col">Tanggal Selesai</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                foreach ($data['pending'] as $i => $kode_pinjam) :
            ?>
                    <tr>
                        <td><?=$i + 1?></td>
                        <td><?=$kode_pinjam['nama_lengkap']?></td>
                        <td><?=$kode_pinjam['tgl_mulai']?></td>
                        <td><?=$kode_pinjam['tgl_selesai']?></td>
                        <td>
                            <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                data-bs-target="#detailModel"> Detail</button>
                            <button type="button" class="btn btn-primary">Acc</button>
                            <button type="button" class="btn btn-danger">Tolak</button>
                        </td>
                    </tr>


                    <?php endforeach; ?>
                </tbody>
        </div>
    </div>

    <!-- Modal Detail -->
    <div class="modal fade" id="detailModel-<?=$index?>" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="judulModal">Detail Peminjaman Alat</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">

                    <form action="<?=BASEURL ?>/Alat/detail/<?=$alat['id_barang']?>" method="POST">
                        <input type="hidden" name="id_barang" value="<?= $alat['id_barang']?>">
                        <div class="mb-3">
                            <label for="nama_barang" class="form-label">Nama Barang</label>
                            <input type="text" id="nama_barang" name="nama_barang" class="form-control"
                                value="<?= $alat['nama_barang']?>">
                        </div>

                        <div class="mb-3 row">
                            <label for="kode_mp" class="col-sm-3 col-form-label">Kode Matapraktikum</label>
                            <div class="col-sm-9">
                            <?=$mp['kode_mp'];?>
                        </div>

                        <div class="mb-3">
                            <label for="jml_stok" class="form-label">Jumlah Stok</label>
                            <input type="number" id="jml_stok" name="jml_stok" class="form-control"
                                value="<?= $alat['jml_stok']?>">
                        </div>

                        <div class="mb-3">
                            <label for="denda_rusak" class="form-label">Denda Rusak</label>
                            <input type="number " id="denda_rusak" name="denda_rusak" class="form-control"
                                value="<?= $alat['denda_rusak']?>">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary"
                        onclick="location.href='<?=BASEURL?>/Alat/edit/<?=$alat['id_barang']?>'">Edit Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class=tabel1>
        <div class="table-responsive">
            <table class="table  table-sm table-bordered">
                <h5 class=h5>ACC</h5>
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Nama Peminjam</th>
                        <th scope="col">Tanggal Mulai</th>
                        <th scope="col">Tanggal Selesai</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                foreach ($data['acc'] as $acc => $kode_pinjam) :
            ?>
                    <tr>
                        <td><?=$acc + 1?></td>
                        <td><?=$kode_pinjam['nama_lengkap']?></td>
                        <td><?=$kode_pinjam['tgl_mulai']?></td>
                        <td><?=$kode_pinjam['tgl_selesai']?></td>
                        <td>
                            <button type="button" class="btn btn-success"> Detail</button>
                            <button type="button" class="btn btn-primary">Kembali</button>
                            <button type="button" class="btn btn-danger">Bermasalah</button>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
        </div>
    </div>

    <div class=tabel2>
        <div class="table-responsive">
            <table class="table  table-sm table-bordered">
                <h5 class=h5>TOLAK</h5>
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Nama Peminjam</th>
                        <th scope="col">Tanggal Mulai</th>
                        <th scope="col">Tanggal Selesai</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                foreach ($data['tolak'] as $tolak => $kode_pinjam) :
            ?>
                    <tr>
                        <td><?=$tolak + 1?></td>
                        <td><?=$kode_pinjam['nama_lengkap']?></td>
                        <td><?=$kode_pinjam['tgl_mulai']?></td>
                        <td><?=$kode_pinjam['tgl_selesai']?></td>
                        <td>
                            <button type="button" class="btn btn-success"> Detail</button>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
        </div>
    </div>

    <div class=tabel3>
        <div class="table-responsive">
            <table class="table  table-sm table-bordered">
                <h5 class=h5>BERMASALAH</h5>
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Nama Peminjam</th>
                        <th scope="col">Tanggal Mulai</th>
                        <th scope="col">Tanggal Selesai</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                foreach ($data['bermasalah'] as $bermasalah => $kode_pinjam) :
            ?>
                    <tr>
                        <td><?=$bermasalah + 1?></td>
                        <td><?=$kode_pinjam['nama_lengkap']?></td>
                        <td><?=$kode_pinjam['tgl_mulai']?></td>
                        <td><?=$kode_pinjam['tgl_selesai']?></td>
                        <td>
                            <button type="button" class="btn btn-success"> Detail</button>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
        </div>
    </div>

    <div class=tabel4>
        <div class="table-responsive">
            <table class="table  table-sm table-bordered">
                <h5 class=h5>KEMBALI</h5>
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Nama Peminjam</th>
                        <th scope="col">Tanggal Mulai</th>
                        <th scope="col">Tanggal Selesai</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                foreach ($data['kembali'] as $kembali => $kode_pinjam) :
            ?>
                    <tr>
                        <td><?=$kembali + 1?></td>
                        <td><?=$kode_pinjam['nama_lengkap']?></td>
                        <td><?=$kode_pinjam['tgl_mulai']?></td>
                        <td><?=$kode_pinjam['tgl_selesai']?></td>
                        <td>
                            <button type="button" class="btn btn-success"> Detail</button>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
        </div>
    </div>

</main>


</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"
    integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous">
</script>