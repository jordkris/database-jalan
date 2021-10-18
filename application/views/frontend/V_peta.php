<div class="section wb" style="background: rgb(248, 248, 248)">
    <div class="container">
        <div class="section-title text-center">
            <h3><i class="fas fa-map-marked-alt global-radius effect-1"></i> <?= $title; ?></h3>
        </div><!-- end title -->
    </div><!-- end container -->
    <hr class="hr3">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div id="map"></div>
            </div>
            <div class="col-lg-6">
                <div id="post-it">
                    <b>Search values:</b><br />
                    <ul>
                        <?php foreach ($jalan as $key => $val) { ?>
                            <li><?= $val['nama_pangkal_ruas'] . ' - ' . $val['nama_ujung_ruas']; ?></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div><!-- end section -->
<script src="<?= base_url('public/frontend/'); ?>js/custom-leaflet.js"></script>