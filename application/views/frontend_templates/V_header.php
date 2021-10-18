<!DOCTYPE html>
<html lang="en">

<!-- Basic -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<!-- Mobile Metas -->
<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

<!-- Site Metas -->
<title><?= $title; ?></title>
<meta name="keywords" content="">
<meta name="description" content="">
<meta name="author" content="">

<!-- Site Icons -->
<link id="img-logo" rel="shortcut icon" href="<?= base_url('public/frontend/'); ?>images/logo.png" type="image/x-icon" />
<link rel="apple-touch-icon" href="<?= base_url('public/frontend/'); ?>images/apple-touch-icon.png">

<!-- Bootstrap CSS -->
<!-- <link rel="stylesheet" href="<?= base_url('public/frontend/'); ?>css/bootstrap.min.css"> -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- Site CSS -->
<link rel="stylesheet" href="<?= base_url('public/frontend/'); ?>style.css">
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.0/dist/leaflet.css" />
<link rel="stylesheet" href="<?= base_url('public/frontend/'); ?>css/leaflet/style.css">
<link rel="stylesheet" href="<?= base_url('public/frontend/'); ?>css/leaflet/leaflet-search.css">
<!-- Colors CSS -->
<link rel="stylesheet" href="<?= base_url('public/frontend/'); ?>css/colors.css">
<!-- ALL VERSION CSS -->
<link rel="stylesheet" href="<?= base_url('public/frontend/'); ?>css/versions.css">
<!-- Responsive CSS -->
<link rel="stylesheet" href="<?= base_url('public/frontend/'); ?>css/responsive.css">
<!-- Custom CSS -->
<script src="https://kit.fontawesome.com/5e59a4bfec.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="<?= base_url('public/frontend/'); ?>css/custom.css">
<!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css"> -->
<!-- <link href="<?= base_url('public/backend/'); ?>assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet" /> -->
<link href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap.min.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="<?= base_url('public/backend/'); ?>assets/libs/select2/dist/css/select2.min.css" />
<!-- Modernizer for Portfolio -->
<script>
    localStorage.setItem('base_url', '<?= base_url(''); ?>');
</script>
<script src="<?= base_url('public/frontend/'); ?>js/modernizer.js"></script>

<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://unpkg.com/leaflet@1.3.0/dist/leaflet.js"></script>
<script src="<?= base_url('public/frontend/'); ?>js/leaflet/leaflet-search.js"></script>
</head>

<body class="host_version" data-spy="scroll" data-target=".navbar">

    <!-- LOADER -->
    <div id="preloader">
        <div class="loading">
            <div class="finger finger-1">
                <div class="finger-item">
                    <span></span><i></i>
                </div>
            </div>
            <div class="finger finger-2">
                <div class="finger-item">
                    <span></span><i></i>
                </div>
            </div>
            <div class="finger finger-3">
                <div class="finger-item">
                    <span></span><i></i>
                </div>
            </div>
            <div class="finger finger-4">
                <div class="finger-item">
                    <span></span><i></i>
                </div>
            </div>
            <div class="last-finger">
                <div class="last-finger-item"><i></i></div>
            </div>
        </div>
    </div>
    <!-- END LOADER -->
    <header class="header header_style_01">
        <nav class="megamenu navbar navbar-default">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand active_navbar" href="<?= base_url(''); ?>"><img src="<?= base_url('public/frontend/'); ?>images/logo.png" class="img-logo" alt="image"></a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li><a class="active_navbar effect-1" href="<?= base_url('home'); ?>"><i class="fas fa-home global-radius"></i> Home</a></li>
                        <li><a class="active_navbar effect-1" href="<?= base_url('peta'); ?>"><i class="fas fa-map-marked-alt global-radius"></i> Peta</a></li>
                        <li><a class="active_navbar effect-1" href="<?= base_url('data_jalan'); ?>"><i class="fas fa-road global-radius"></i> Data Jalan</a></li>
                        <li><a class="active_navbar effect-1" href="<?= base_url('data_penanganan'); ?>"><i class="fas fa-tools global-radius"></i> Data Perbaikan</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a class="btn-light btn-radius btn-brd log effect-1" href="#" data-toggle="modal" data-target="#login"><i class="flaticon-padlock"></i> Login</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div id="bootstrap-touch-slider" class="carousel bs-slider fade control-round indicators-line" data-ride="carousel" data-interval="false">
        <?= $this->session->flashdata('message'); ?>
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#bootstrap-touch-slider" data-slide-to="0" class="active"></li>
            <li data-target="#bootstrap-touch-slider" data-slide-to="1"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <div class="first-section" style="background-image:url('<?= base_url('public/uploads/') . $setting['gambar_utama']; ?>');background-size: 100% 100%;">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 text-center">
                                <div class="big-tagline">
                                    <h2 data-animation="animated zoomInRight" style="color: white; background-color: rgba(0,0,0,0.6);"><?= $setting['nama_aplikasi']; ?></h2>
                                </div>
                            </div>
                        </div><!-- end row -->
                    </div><!-- end container -->
                </div><!-- end section -->
            </div>
            <div class="item">
                <div class="first-section" style="background-image:url('<?= base_url('public/uploads/'); ?>gambar_utama2.jpg');background-size: 100% 100%;">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 text-center">
                                <div class="big-tagline">
                                    <h2 data-animation="animated zoomInRight text-white" style="color: black;background-color: rgba(255,255,255,0.6);"><?= $setting['nama_aplikasi']; ?></h2>
                                </div>
                            </div>
                        </div><!-- end row -->
                    </div><!-- end container -->
                </div><!-- end section -->
            </div>
            <!-- Left Control -->
            <button class="left carousel-control">
                <span class="fa fa-angle-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </button>

            <!-- Right Control -->
            <button class="right carousel-control">
                <span class="fa fa-angle-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </button>
        </div>
    </div>