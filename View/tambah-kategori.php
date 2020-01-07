<main>
    <div class="container">
        <ul class="collection with-header">
            <li class="collection-header">
                <h4>
                    <?php
                        if(!isset($kat)){
                            echo "Tambah Kategori";
                        }else{
                            echo "Ubah Kategori";
                        }
                    ?>
                </h4>
            </li>
            <li class="collection-item">
                <div class=" lighten-4 row" style="width: 100%;padding: 32px 48px 32px 48px;">
                    <?php
                        if(!isset($kat)){?>
                            <form class="col s12" method="post" action="<?= $this->baseUrl('kategori/tambah'); ?>">
                                <div class='row'>
                                    <div class='input-field col s12'>
                                        <input class='validate' type='text' name='kategori' id='kategori' />
                                        <label for='kategori'>Kategori</label>
                                    </div>
                                </div>

                                <center>
                                    <div class='row'>
                                        <button type='submit' name='btn_login' class='col s12 btn tooltipped btn-large waves-effect indigo' data-position="bottom" data-tooltip="Tekan tombol untuk menyimpan">Simpan</button>
                                    </div>
                                </center>
                            </form>
                            <?php
                        }else{
                            ?>
                            <form class="col s12" method="post" action="<?= $this->baseUrl('kategori/prosesUpdate'); ?>">
                                <div class='row'>
                                    <div class='input-field col s12'>
                                        <input class='validate' type='hidden' name='id' id='id' value="<?= $kat['ID_KATEGORI'] ?>"/>
                                        <input class='validate' type='text' name='kategori' id='kategori' value="<?= $kat['NAMA_KATEGORI'] ?>"/>
                                        <label for='kategori'>Kategori</label>
                                    </div>
                                </div>

                                <center>
                                    <div class='row'>
                                        <button type='submit' name='btn_login' class='col s12 btn tooltipped btn-large waves-effect indigo' data-position="bottom" data-tooltip="Tekan tombol untuk menyimpan">Ubah</button>
                                    </div>
                                </center>
                            </form>
                            <?php
                        }
                    ?>

                                    
                    <table>
                        <thead>
                            <tr>
                                <th>Kategori</th>
                                <th style="width: 100px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                while($data = $this->fetch($kategori)){
                                    ?>
                                    <tr>
                                        <td><?= $data['NAMA_KATEGORI'] ?></td>
                                        <td><a class="waves-effect waves-light grey btn" href="<?= $this->baseUrl('kategori/update/' . $data['ID_KATEGORI']); ?>">Update</a></td>
                                        <td><a class="waves-effect waves-light red btn" onClick="confirmDeleteKategori(<?= $data['ID_KATEGORI']; ?>)" href="#">Delete</a></td>
                                    </tr>
                                    <?php
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </li>
        </ul>  
    </div>
</main>