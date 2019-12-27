<main>
    <div class="container">
        <ul class="collection with-header">
            <li class="collection-header">
                <h4>
                    Tambah Jadwal
                </h4>
            </li>
            <li class="collection-item">
                <div class=" lighten-4 row" style="width: 100%;padding: 32px 48px 32px 48px;">
                    <form class="col s12" method="post" action="<?= $this->baseUrl('jadwal/prosesTambah'); ?>">

                        <div class='row'>
                            <div class='input-field col s12'>
                                <select class="validate tooltipped" name="kategori">
                                    <option value="" disabled selected>Pilih salah satu...</option>
                                    <?php
                                        while($data = $this->fetch($kategori)){?>
                                            <option value="<?= $data["ID_KATEGORI"]; ?>"><?= $data["NAMA_KATEGORI"]; ?></option>    
                                        <?php
                                        }
                                    ?>
                                </select>
                                <label>Pilih Kategori</label>
                            </div>
                        </div>

                        <div class='row'>
                            <div class='input-field col s12'>
                                <select class="validate" name="keluarMasuk">
                                    <option value="" disabled selected>Pilih salah satu...</option>
                                    <option value="K">Keluar</option>
                                    <option value="M">Masuk</option>
                                </select>
                                <label>Jenis Transaksi</label>
                            </div>
                        </div>

                        <div class='row'>
                            <div class='input-field col s12'>
                                <input class='validate' type='text' name='nominal' id='nominal' />
                                <label for='nominal'>Nominal</label>
                            </div>
                        </div>

                        <div class='row'>
                            <div class='input-field col s12'>
                                <input class='validate' type='text' name='keterangan' id='keterangan' />
                                <label for='keterangan'>Keterangan</label>
                            </div>
                        </div>

                        <div class='row'>
                            <div class='input-field col s12'>
                                <input class='validate' type='number' min="1" max="31" name='tanggal' id='tanggal' />
                                <label for='keterangan'>Tanggal</label>
                            </div>
                        </div>

                        <center>
                            <div class='row'>
                                <button type='submit' name='btn_login' class='col s12 btn tooltipped btn-large waves-effect indigo' data-position="bottom" data-tooltip="Tekan tombol untuk menyimpan">Simpan</button>
                            </div>
                        </center>
                    </form>

                                    
                    <table>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kategori</th>
                                <th>Jenis</th>
                                <th>Nominal</th>
                                <th>Keterangan</th>
                                <th>Tanggal / Bulan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $no = 1;
                                while($data = $this->fetch($jadwal)){
                                    ?>
                                        <tr>
                                            <td><?= $no ?></td>
                                            <td><?= $data['NAMA_KATEGORI'] ?></td>
                                            <td><?= $data['JENIS_TRANSAKSI'] == 0 ? 'Keluar' : 'Masuk' ?></td>
                                            <td><?= $data['NOMINAL_TRANSAKSI'] ?></td>
                                            <td><?= $data['KETERANGAN_TRANSAKSI'] ?></td>
                                            <td><?= $data['WAKTU_JADWAL'] ?></td>
                                        </tr>
                                    <?php
                                    $no++;
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </li>
        </ul>  
    </div>
</main>