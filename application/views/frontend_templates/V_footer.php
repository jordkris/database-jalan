<div class="copyrights">
    <div class="container">
        <div class="footer-distributed text-center">
            <p class="footer-company-name text_white">All Rights Reserved. &copy; <span>2021</span> by <span>Jordy</span></p>
        </div>
    </div><!-- end container -->
</div><!-- end copyrights -->

<a href="#" id="scroll-to-top" class="dmtop global-radius"><i class="fa fa-angle-up"></i></a>

<!-- Modal -->
<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header tit-up">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Login</h4>
            </div>
            <div class="modal-body customer-box row">
                <div class="col-md-12">
                    <form role="form" class="form-horizontal" method="post" action="<?= base_url('auth'); ?>">
                        <div class="form-group">
                            <div class="col-sm-12">
                                <input class="form-control" placeholder="username" type="text" name="username" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <input class="form-control" placeholder="password" type="password" name="password" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-success btn-radius">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ALL JS FILES -->
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
<script src="<?= base_url('public/frontend/'); ?>js/all.js"></script>
<script src="<?= base_url('public/backend/') ?>assets/extra-libs/DataTables/datatables.min.js"></script>
<script src="<?= base_url('public/backend/'); ?>assets/libs/select2/dist/js/select2.full.min.js"></script>
<script src="<?= base_url('public/backend/'); ?>assets/libs/select2/dist/js/select2.min.js"></script>
<!-- ALL PLUGINS -->
<!-- <script src="<?= base_url('public/frontend/'); ?>js/jquery.bcSwipe.js"></script>
<script src="<?= base_url('public/frontend/'); ?>js/bootstrap-touch-slider.js"></script> -->
<script src="<?= base_url('public/frontend/'); ?>js/custom.js"></script>
<script src="<?= base_url('public/frontend/'); ?>js/flash-message.js"></script>
<script src="<?= base_url('public/frontend/'); ?>js/custom-carousel.js"></script>
<script src="<?= base_url('public/frontend/'); ?>js/data-jalan.js"></script>
<script src="<?= base_url('public/frontend/'); ?>js/data-penanganan.js"></script>

<script>
    let current_href = location.href;
    $('.active_navbar').each((i, elm) => {
        if (current_href == elm.getAttribute('href')) {
            elm.classList.add("active");
        }
    });
    let device_width;
    //detail jalan
    function getMaxHeight() {
        let max = 0;
        $(".detail-jalan").each(function() {
            c_height = parseInt($(this).height());
            if (c_height > max) {
                max = c_height;
            }
        });
        return max;
    }

    function handleWidget() {
        device_width = (window.innerWidth > 0) ? window.innerWidth : screen.width;
        if (device_width > 990) {
            $('.detail-jalan .widget.clearfix').css('height', getMaxHeight() + 'px');
        } else {
            $('.detail-jalan .widget.clearfix').css('height', getMaxHeight() + 'px');
        }
    }
    handleWidget();
    $(window).resize(() => {
        handleWidget();
    });
    // $('.detail-jalan .widget.clearfix').hover(() => {
    //     handleWidget();
    // }, () => {
    //     handleWidget();
    // });
</script>
</body>

</html>