<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <?php
            require "config.php";
            $p = mysqli_query($koneksi, "SELECT * FROM tbl_profil WHERE  id_profil='1'");
            while ($data = mysqli_fetch_array($p)) {
                echo '<a href="index.php?page=beranda" class="navbar-brand"><img src="images/home.png" height="100%"><b>&nbsp&nbsp ' . $data['nm_aplikasi'] . '</b> </a>';
            } ?>
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="navbar-collapse collapse" id="navbar-main">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="model/caridata.php"><b>CEK KELULUSAN</b></a></li>
                <li><a href="index.php?page=login"><b>LOGIN</b></a></li>
            </ul>
        </div>
    </div>
</div>