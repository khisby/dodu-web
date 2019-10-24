<main>
    <center>
        <div class="section"></div>
        <img class="responsive-img" style="width: 100px;" src="http://profile.khisoft.id/assets/images/khisoft.png" />

        <h5 class="indigo-text">Silahkan register akun Dodu</h5>
        <div class="section"></div>

        <div class="container">
            <div class="z-depth-1 grey lighten-4 row" style="width: 40%;padding: 32px 48px 32px 48px; border: 1px solid #EEE;">
                <?= Flasher::getFlash() ?>
                <form class="col s12" method="post" action="<?= $this->baseUrl('registrasi/register'); ?>">

                    <div class='row'>
                        <div class='input-field col s12'>
                            <input class='validate' type='text' name='namaPengguna' id='namaPengguna' />
                            <label for='namaPengguna'>Masukkan nama pengguna...</label>
                        </div>
                    </div>

                    <div class='row'>
                        <div class='input-field col s12'>
                            <input class='validate' type='email' name='surelPengguna' id='email' />
                            <label for='email'>Masukkan email...</label>
                        </div>
                    </div>

                    <div class='row'>
                        <div class='input-field col s12'>
                            <input class='validate' type='password' name='sandiPengguna' id='password' />
                            <label for='password'>Masukkan kata sandi...</label>
                        </div>
                    </div>

                    <center>
                        <div class='row'>
                            <button type='submit' name='btn_login' class='col s12 btn btn-large waves-effect indigo'>Registrasi</button>
                        </div>
                    </center>
                </form>
            </div>
        </div>
        <a href="<?= $this->baseUrl('login'); ?>">Sudah punya akun? login disini</a>
    </center>
</main>