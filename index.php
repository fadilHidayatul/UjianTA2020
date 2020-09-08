<?php
    session_start();

?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Input Soal</title>
    <script src="asset/js/app.js" defer></script>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="asset/css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="asset/css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="asset/css/style.css" rel="stylesheet">
</head>
<body>
    <div id="app">
        <!--Navbar -->
    <nav class="mb-5 navbar navbar-expand-lg navbar-light bg-danger ">
        <a class="navbar-brand text-white" href="#" >Web Admin Ujian Online</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-333"
            aria-controls="navbarSupportedContent-333" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent-333">
        <ul class="navbar-nav mr-auto">

<?php if(isset($_SESSION['id'])){ ?>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white" id="navbarDropdownMenuLink-333" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">NIS
                </a>
                <div class="dropdown-menu dropdown-default" aria-labelledby="navbarDropdownMenuLink-333">
                <a class="dropdown-item" href="?page=nis">Input NIS</a>
                <a class="dropdown-item" href="?page=nis_chk">List NIS</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white" id="navbarDropdownMenuLink-333" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">SOAL
                </a>
                <div class="dropdown-menu dropdown-default" aria-labelledby="navbarDropdownMenuLink-333">
                <a class="nav-link" href="?page=soal">Input Soal</a>
                <a class="nav-link" href="?page=soal_chk">Cek Soal</a>
                </div>
            </li>



            
            
           

            <li class="nav-item">
                    <a class="nav-link text-white" href="?page=nilai">Nilai Siswa</a>
            </li>
        </ul>

        <ul class="navbar-nav ml-auto nav-flex-icons">
                <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <?php echo $_SESSION['nama'] ?> <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="logout"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="aksi/logout.php" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
        

<?php }else if (!isset($_SESSION['id'])) {
     ?>     
                <li class="nav-item active">
                        <a class="nav-link text-white" href="?page=login">Login</a>
                    </li>
                   
             
<?php  } ?>

            
            </ul>
        </div>
    </nav>
        <!--/.Navbar -->

        <main class="py-4">
            <?php
                if(isset($_GET['page'])){
                    if($_GET['page'] == 'login'){
                        include_once('page/login.php');

                    }elseif($_GET['page'] == 'nis'){
                        include_once('page/input-nis.php');

                    }elseif($_GET['page'] == 'soal'){
                        include_once('page/input-soal.php');
                        
                    }elseif($_GET['page'] == 'nilai'){
                        include_once('page/nilai-siswa.php');

                    }elseif($_GET['page'] == 'nis_chk'){
                        include_once('page/cek-nis.php');

                    }elseif($_GET['page'] == 'soal_chk'){
                        include_once('page/cek-soal.php');
                    }
                }else{
                    include_once('page/login.php');
                }
            ?>
        </main>
    </div>
    <!-- JQuery -->
    <script type="text/javascript" src="asset/js/jquery-3.4.1.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="asset/js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="asset/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="asset/js/mdb.min.js"></script>
</body>
</html>
