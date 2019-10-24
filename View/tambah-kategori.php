<main>
    <div class="container">
        <ul class="collection with-header">
            <li class="collection-header">
                <h4>
                    Tambah Kategori
                </h4>
            </li>
            <li class="collection-item">
                <div class=" lighten-4 row" style="width: 100%;padding: 32px 48px 32px 48px;">
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
                </div>
            </li>
        </ul>  
    </div>
</main>