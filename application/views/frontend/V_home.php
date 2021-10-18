<div class="section wb">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="message-box">
                    <h2 class="text-center"><i class="fas fa-star text-primary"></i></h2>
                    <h2 class="text-center">Selamat Datang</h2>
                    <p class="text-justify"><?= $setting['deskripsi_aplikasi']; ?></p>
                </div><!-- end messagebox -->
            </div><!-- end col -->

            <div class="col-md-6">
                <div class="post-media wow fadeIn">
                    <div id="video-home" class="embed-responsive embed-responsive-16by9"></div>
                    <script>
                        let video_url = "<?=  $setting['video_profil']; ?>";
                        $.ajax({
                            url: 'https://www.youtube.com/oembed?url='+video_url+'&format=json',
                            type:'GET',
                            success: (result) => {
                                $('#video-home').html(result.html);
                            }
                        });
                    </script> 
                </div><!-- end media -->
            </div><!-- end col -->
        </div><!-- end row -->
        <hr class="invis">
        <div class="row">
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="icon-wrapper wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
                    <i class="fas fa-map-marked-alt global-radius effect-1 alignleft"></i>
                    <h3>Data Peta</h3>
                    <p><?= $setting['deskripsi_peta']; ?></p>
                </div><!-- end icon-wrapper -->
            </div><!-- end col -->
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="icon-wrapper wow fadeIn" data-wow-duration="1s" data-wow-delay="0.6s">
                    <i class="fas fa-road global-radius effect-1 alignleft"></i>
                    <h3>Data Jalan</h3>
                    <p><?= $setting['deskripsi_data_jalan']; ?></p>
                </div><!-- end icon-wrapper -->
            </div><!-- end col -->
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="icon-wrapper wow fadeIn" data-wow-duration="1s" data-wow-delay="0.4s">
                    <i class="fas fa-tools global-radius effect-1 alignleft"></i>
                    <h3>Data Perbaikan</h3>
                    <p><?= $setting['deskripsi_data_perbaikan']; ?></p>
                </div><!-- end icon-wrapper -->
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</div><!-- end section -->