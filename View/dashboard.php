<main>
    <div class="container">
        <ul class="collection with-header">
            <?php
                while($data = $this->fetch($keuangan)){?>
                    <li class="collection-item">
                        <p class="row">
                            <span class="title"><b>Kategori :</b> <?= $data['NAMA_KATEGORI'] ?></span>
                            <span class="title right"><b>Jenis Transaksi :</b> <?= $data['JENIS_TRANSAKSI'] == 0 ? 'Keluar' : 'Masuk' ?></span>
                        </p>
                        <p class="row">
                            <span class="title"><b>Nominal :</b> <?= $this->toUang($data['NOMINAL_TRANSAKSI']) ?></span>
                            <span class="title right"><b>Waktu :</b> <?= $this->toTanggal($data['WAKTU_TRANSAKSI']) ?></span>
                        </p>
                        <p>
                            <?= $data['KETERANGAN_TRANSAKSI'] ?>
                        </p>
                        <p class="row">
                            <a class="waves-effect waves-light red btn" href="<?= $this->baseUrl('keuangan/delete/' . $data['ID_TRANSAKSI']); ?>">Delete</a>
                        </p>
                    </li>    
                <?php
                }
            ?>
        </ul>  
    </div>
    <div class="fixed-action-btn">
        <a class="btn-floating btn-large waves-effect waves-light green z-depth-3 pulse tooltipped" href="<?= $this->baseUrl('keuangan/tambah'); ?>" data-position="left" data-tooltip="Tekan tombol untuk menambahkan transaksi">
            <i class="large material-icons">add</i>
        </a>
    </div>
</main>