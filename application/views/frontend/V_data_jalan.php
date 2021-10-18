<div class="section wb" style="background: rgb(248, 248, 248)">
    <div class="container">
        <div class="section-title text-center">
            <h3><i class="fas fa-road global-radius effect-1"></i> <?= $title; ?></h3>
        </div><!-- end title -->

        <div class="row dev-list text-center">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
                <div class="widget clearfix">
                    <div class="widget-title">
                        <h3>Total Panjang Jalan</h3>
                        <!-- <small></small> -->
                    </div>
                    <!-- end title -->
                    <p>Total panjang jalan di Kabupaten AAA adalah <strong class="stat_count"><?= $total_pr; ?></strong> Km</p>
                </div>
                <!--widget -->
            </div><!-- end col -->
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 mb-3 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.4s">
                <div class="widget clearfix">
                    <div class="widget-title">
                        <h3>Ruas Jalan</h3>
                        <!-- <small></small> -->
                    </div>
                    <!-- end title -->
                    <p>Total ruas jalan di Kabupaten AAA adalah <strong class="stat_count"><?= $total_ruas; ?></strong> ruas</p>
                </div>
                <!--widget -->
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
    <hr class="hr3">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <div class="row">
                        <div class="col-lg-12">
                            <label for="kategori-jalan" class="input-group-text">Kategori Jalan</label>
                            <select id="kategori-jalan" class="select2 form-select shadow-none form-control form-control-lg">
                                <option value="all" selected>-- Semua --</option>
                                <option value="Jalan Kabupaten">Jalan Kabupaten</option>
                                <option value="Jalan Strategis Desa">Jalan Strategis Desa</option>
                                <option value="Jalan Non Status">Jalan Non Status</option>
                            </select>
                        </div>
                    </div>
                    <hr />
                    <table class="table table-bordered table-striped hover row-border compact stripe order-column display nowrap" id="tabel-jalan" cellspacing="0" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nomor Ruas</th>
                                <th>Nama Ruas Jalan</th>
                                <th>Titik Pengenal</th>
                                <th>Panjang Jalan (km)</th>
                                <th>Lebar Jalan (m)</th>
                                <th>Kecamatan</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div><!-- end section -->