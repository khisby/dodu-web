<main>
    <div class="container">
        <ul class="collection with-header">
            <li class="collection-header"><h4>Chart</h4></li>
            <li class="collection-item">
                <canvas id="myChart"></canvas>
            </li>
        </ul>
        <ul class="collection with-header">
            <li class="collection-header"><h4>Kategori</h4></li>
            <?php
                for($i = 0; $i< count($kategori); $i++){ ?>
                    <li class="collection-item">
                        <p class="row">
                            <span class="title"><b>Kategori :</b> <?= $kategori[$i] ?></span>
                            <span class="title right right-align">Nominal Keluar : <?= $keluar[$i] ?> <br> Nominal Masuk : <?= $masuk[$i] ?> <br> <b>Total</b> : <?= $total[$i] ?></span>
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
