<div class="container-loader"> 
    <div class="loader"></div>
    <p>Mohon tunggu masih memproses.</p>
</div>
<main>
    <center>
        <div class="section"></div>
        <img class="responsive-img" style="width: 100px;" src="http://profile.khisoft.id/assets/images/khisoft.png" />


        <h5 class="indigo-text">Silahkan login, dengan akun Dodu</h5>
        <div class="section"></div>

        <div class="container">
            <div class="z-depth-1 grey lighten-4 row" style="width: 40%;padding: 32px 48px 32px 48px; border: 1px solid #EEE;">
                <p id="pesanFlash"><?= Session::getFlash() ?></p>
                <form class="col s12" method="post" id="formLogin" action="<?= $this->baseUrl('login/login'); ?>">

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
                        <!-- <label style='float: right;'>
                            <a class='pink-text' href='#!'><b>Forgot Password?</b></a>
                        </label> -->
                    </div>

                    <center>
                        <div class='row'>
                            <button type='submit' name='btn_login' id="btnLogin" class='col s12 btn btn-large waves-effect indigo' onClick="return false;">Login</button>
                        </div>
                    </center>
                </form>
            </div>
        </div>
        <a href="<?= $this->baseUrl('registrasi'); ?>">Buat akun baru</a>
    </center>
</main>