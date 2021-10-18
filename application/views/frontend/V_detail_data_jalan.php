<div class="section wb" style="background: rgb(248, 248, 248)">
    <div class="container">
        <div class="section-title text-center">
            <h3><i class="fas fa-road global-radius effect-1"></i> <?= $title; ?></h3>
        </div><!-- end title -->

        <div class="row dev-list text-center">
            <div class="detail-jalan col-lg-6 col-md-6 col-sm-12 col-xs-12 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
                <div class="widget clearfix">
                    <div class="widget-title">
                        <h3>Peta Jalan</h3>
                        <h3><?= $pangkal_ruas . ' - ' . $ujung_ruas; ?></h3>
                        <div id="map"></div>
                    </div>
                    <!-- end title -->
                </div>
                <!--widget -->
            </div><!-- end col -->
            <div class="detail-jalan col-lg-6 col-md-6 col-sm-12 col-xs-12 mb-3 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.4s">
                <div class="widget clearfix">
                    <div class="widget-title">
                        <h3>Info Ruas Jalan</h3>
                        <!-- <small></small> -->
                    </div>
                    <!-- end title -->
                    <table class="table table-bordered table-striped hover row-border compact stripe order-column display nowrap" cellspacing="0">
                        <tbody>
                            <tr>
                                <td>Nama Ruas</td>
                                <td><?= $pangkal_ruas . ' - ' . $ujung_ruas; ?></td>
                            </tr>
                            <tr>
                                <td>Kategori Jalan</td>
                                <td><?= $jalan['kategori_jalan']; ?></td>
                            </tr>
                            <tr>
                                <td>Akses Ke N /P /K</td>
                                <td><?= $jalan['akses_ke']; ?></td>
                            </tr>
                            <tr>
                                <td>Kecamatan</td>
                                <td><?= $kecamatan; ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!--widget -->
            </div><!-- end col -->
            <div class="detail-jalan col-lg-6 col-md-6 col-sm-12 col-xs-12 mb-3 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.4s">
                <div class="widget clearfix">
                    <div class="widget-title">
                        <h3>Jenis Permukaan</h3>
                        <!-- <small></small> -->
                    </div>
                    <!-- end title -->
                    <table class="table table-bordered table-striped hover row-border compact stripe order-column display nowrap" cellspacing="0">
                        <tbody>
                            <tr>
                                <td>Aspal / AC-HRS-ATB</td>
                                <td class="stat_count"><?= $jalan['panjang_tjp_1']; ?></td>
                            </tr>
                            <tr>
                                <td>Penetrasi Macadam</td>
                                <td class="stat_count"><?= $jalan['panjang_tjp_2']; ?></td>
                            </tr>
                            <tr>
                                <td>Perkerasan Rigid Beton</td>
                                <td class="stat_count"><?= $jalan['panjang_tjp_3']; ?></td>
                            </tr>
                            <tr>
                                <td>Telford / Kerikil</td>
                                <td class="stat_count"><?= $jalan['panjang_tjp_4']; ?></td>
                            </tr>
                            <tr>
                                <td>Tanah / Belum Tembus</td>
                                <td class="stat_count"><?= $jalan['panjang_tjp_5']; ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!--widget -->
            </div><!-- end col -->
            <div class="detail-jalan col-lg-6 col-md-6 col-sm-12 col-xs-12 mb-3 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.4s">
                <div class="widget clearfix">
                    <div class="widget-title">
                        <h3>Keterangan</h3>
                        <!-- <small></small> -->
                    </div>
                    <!-- end title -->
                    <table class="table table-bordered table-striped hover row-border compact stripe order-column display nowrap" cellspacing="0">
                        <tbody>
                            <tr>
                                <td>Panjang</td>
                                <td><span class="stat_count"><?= $jalan['panjang_ruas']; ?></span> Km</td>
                            </tr>
                            <tr>
                                <td>Lebar</td>
                                <td><span class="stat_count"><?= $jalan['lebar']; ?></span> m</td>
                            </tr>
                            <tr>
                                <td>Kode Status ADM</td>
                                <td><?= $jalan['kode_status_adm']; ?></td>
                            </tr>
                            <tr>
                                <td>Klasifikasi Ruas</td>
                                <td><?= $jalan['klasifikasi_ruas']; ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!--widget -->
            </div><!-- end col -->
            <div class="detail-jalan col-lg-6 col-md-6 col-sm-12 col-xs-12 mb-3 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.4s">
                <div class="widget clearfix">
                    <div class="widget-title">
                        <h3>Foto Jalan</h3>
                        <!-- <small></small> -->
                    </div>
                    <!-- end title -->
                    <div id="images-slide" class="carousel bs-slider fade control-round indicators-line" data-ride="carousel" data-interval="false">
                        <?= $this->session->flashdata('message'); ?>
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <?php for ($i = 0; $i < count($jalan['foto_jalan']); $i++) {
                                if ($i == 0) { ?>
                                    <li data-target="#images-slide" data-slide-to="0" class="active"></li>
                                <?php } else { ?>
                                    <li data-target="#images-slide" data-slide-to="<?= $i; ?>"></li>
                            <?php }
                            } ?>
                        </ol>
                        <div class="carousel-inner" role="listbox">
                            <?php for ($i = 0; $i < count($jalan['foto_jalan']); $i++) {
                                if ($i == 0) { ?>
                                    <div class="item active">
                                    <?php } else { ?>
                                        <div class="item image-frame">
                                        <?php } ?>
                                        <img class="d-block w-100 image-custom" src="<?= base_url('public/uploads/') . $jalan['foto_jalan'][$i]; ?>" />
                                        </div>
                                    <?php } ?>
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
                    </div>
                    <!--widget -->
                </div><!-- end col -->
                <div class="detail-jalan col-lg-6 col-md-6 col-sm-12 col-xs-12 mb-3 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.4s">
                    <div class="widget clearfix">
                        <div class="widget-title">
                            <h3>Video Jalan</h3>
                            <!-- <small></small> -->
                            <div class="post-media wow fadeIn">
                                <div id="video-detail-jalan" class="embed-responsive embed-responsive-16by9"></div>
                                <script>
                                    let video_url = "<?= $setting['video_profil']; ?>";
                                    $.ajax({
                                        url: 'https://www.youtube.com/oembed?url=' + video_url + '&format=json',
                                        type: 'GET',
                                        success: (result) => {
                                            $('#video-detail-jalan').html(result.html);
                                            $('#video-detail-jalan').css('margin-top','10px');
                                        }
                                    });
                                </script>
                            </div><!-- end media -->
                        </div>
                        <!-- end title -->
                    </div>
                    <!--widget -->
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end section -->

    <div id="support" class="section wb">
        <div class="container">
            <div class="section-title text-center">
                <h3>Pengaduan Masyarakat</h3>
            </div><!-- end title -->

            <div class="row">
                <div class="col-md-12">
                    <div class="contact_form">
                        <div id="message"></div>
                        <form class="row" action="<?= base_url('data_jalan/pengaduan'); ?>" method="post" enctype="multipart/form-data">
                            <fieldset class="row-fluid">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="nama_lengkap" class="form-control" placeholder="Nama Lengkap" required>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="alamat_lengkap" class="form-control" placeholder="Alamat Lengkap" required>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="nomor_handphone" class="form-control" placeholder="Nomor Handphone" required>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <input type="email" name="email" class="form-control" placeholder="Email" required>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <textarea class="form-control" name="isi_pengaduan" placeholder="Isi Pengaduan" required></textarea>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="latitude" class="form-control" placeholder="Latitude" required>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="longitude" class="form-control" placeholder="Longitude" required>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <label>Upload Foto pendukung</label>
                                    <input type="file" name="foto_pendukung" class="form-control" placeholder="Upload foto pendukung" required>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <input type="checkbox" class="form-check-input" id="terms" />
                                    <label class="form-check-label">
                                        Saya menyatakan bahwa data yang diupload adalah benar
                                    </label>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                                    <button type="submit" id="submitBtn" class="btn btn-light btn-radius btn-brd grd1 btn-block">Submit</button>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end section -->
    <script src="<?= base_url('public/frontend/'); ?>js/custom-leaflet-single.js"></script>