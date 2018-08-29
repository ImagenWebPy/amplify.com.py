<?php if (empty($this->pagina)): ?>
    </div>
<?php endif; ?>
<!-- start footer --> 
<footer class="footer-classic-dark bg-extra-dark-gray2 padding-five-bottom xs-padding-30px-bottom">
    <div class="bg-dark-footer padding-50px-tb xs-padding-30px-tb">
        <div class="container">
            <div class="row equalize xs-equalize-auto">
                <!-- start social media -->
                <div class="col-md-4 col-sm-5 col-xs-12 col-xs-12 text-center display-table xs-text-center pull-right">
                    <div class="display-table-cell vertical-align-middle">
                        <span class="alt-font margin-20px-right">En las redes sociales</span>
                        <div class="social-icon-style-8 display-inline-block vertical-align-middle">
                            <ul class="small-icon no-margin-bottom">
                                <?php foreach ($this->redes as $item): ?>
                                    <a href="<?= utf8_encode($item['url']); ?>" class="text-white" title="<?= utf8_encode($item['descripcion']); ?>" target="_blank"><i class="<?= utf8_encode($item['fontawesome']); ?>" aria-hidden="true"></i></a>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- end social media -->
            </div>
        </div>
    </div>
<!--    <div class="footer-widget-area padding-five-top padding-30px-bottom xs-padding-30px-top">
        <div class="container">
            <div class="row">
                 start about 
                <div class="col-md-12 col-sm-12 col-xs-12 widget sm-margin-30px-bottom xs-text-center">
                    <div class="widget-title alt-font text-small text-medium-gray text-uppercase margin-15px-bottom font-weight-600">La Empresa</div>
                    <p class="text-small width-95 xs-width-100 no-margin"><?= utf8_encode($this->footerInfo); ?></p>
                </div>
                 end about 
                 start newsletter 

                 end newsletter 
            </div>
        </div>
    </div>-->
    <div class="container">
        <div class="footer-bottom border-top border-color-medium-dark-gray padding-30px-top">
            <div class="row">
                <!-- start copyright -->
                <div class="col-md-6 col-sm-6 col-xs-12 text-right text-small xs-text-center pull-right">Powered by <a href="https://www.imagenwebhq.com" target="_blank" title="ImagenWeb"><img src="<?= URL; ?>public/images/iweb-logo-bn.png" alt="Imagen Web" style="position: relative; width: 130px; top: -2px;"></a></div>
                <!-- end copyright -->
            </div>
        </div>
    </div>
</footer>
<!-- end footer -->
<!-- start scroll to top -->
<a class="scroll-top-arrow" href="javascript:void(0);"><i class="ti-arrow-up"></i></a>
<!-- end scroll to top -->
<!-- javascript libraries -->

<script type="text/javascript" src="<?= URL; ?>public/js/modernizr.js"></script>
<script type="text/javascript" src="<?= URL; ?>public/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?= URL; ?>public/js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="<?= URL; ?>public/js/skrollr.min.js"></script>
<script type="text/javascript" src="<?= URL; ?>public/js/smooth-scroll.js"></script>
<script type="text/javascript" src="<?= URL; ?>public/js/jquery.appear.js"></script>
<!-- menu navigation -->
<script type="text/javascript" src="<?= URL; ?>public/js/bootsnav.js"></script>
<script type="text/javascript" src="<?= URL; ?>public/js/jquery.nav.js"></script>
<!-- animation -->
<script type="text/javascript" src="<?= URL; ?>public/js/wow.min.js"></script>
<!-- page scroll -->
<script type="text/javascript" src="<?= URL; ?>public/js/page-scroll.js"></script>
<!-- swiper carousel -->
<script type="text/javascript" src="<?= URL; ?>public/js/swiper.min.js"></script>
<!-- counter -->
<script type="text/javascript" src="<?= URL; ?>public/js/jquery.count-to.js"></script>
<!-- parallax -->
<script type="text/javascript" src="<?= URL; ?>public/js/jquery.stellar.js"></script>
<!-- magnific popup -->
<script type="text/javascript" src="<?= URL; ?>public/js/jquery.magnific-popup.min.js"></script>
<!-- portfolio with shorting tab -->
<script type="text/javascript" src="<?= URL; ?>public/js/isotope.pkgd.min.js"></script>
<!-- images loaded -->
<script type="text/javascript" src="<?= URL; ?>public/js/imagesloaded.pkgd.min.js"></script>
<!-- pull menu -->
<script type="text/javascript" src="<?= URL; ?>public/js/classie.js"></script>
<script type="text/javascript" src="<?= URL; ?>public/js/hamburger-menu.js"></script>
<!-- counter -->
<script type="text/javascript" src="<?= URL; ?>public/js/counter.js"></script>
<!-- fit video -->
<script type="text/javascript" src="<?= URL; ?>public/js/jquery.fitvids.js"></script>
<!-- equalize -->
<script type="text/javascript" src="<?= URL; ?>public/js/equalize.min.js"></script>
<!-- skill bars -->
<script type="text/javascript" src="<?= URL; ?>public/js/skill.bars.jquery.js"></script> 
<!-- justified gallery -->
<script type="text/javascript" src="<?= URL; ?>public/js/justified-gallery.min.js"></script>
<!--pie chart-->
<script type="text/javascript" src="<?= URL; ?>public/js/jquery.easypiechart.min.js"></script>
<!-- instagram -->
<script type="text/javascript" src="<?= URL; ?>public/js/instafeed.min.js"></script>
<!-- retina -->
<script type="text/javascript" src=<?= URL; ?>public/"js/retina.min.js"></script>
<!-- revolution -->
<script type="text/javascript" src="<?= URL; ?>public/revolution/js/jquery.themepunch.tools.min.js"></script>
<script type="text/javascript" src="<?= URL; ?>public/revolution/js/jquery.themepunch.revolution.min.js"></script>
<!-- revolution slider extensions (load below extensions JS files only on local file systems to make the slider work! The following part can be removed on server for on demand loading) -->
<!--<script type="text/javascript" src="revolution/js/extensions/revolution.extension.actions.min.js"></script>
<script type="text/javascript" src="revolution/js/extensions/revolution.extension.carousel.min.js"></script>
<script type="text/javascript" src="revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
<script type="text/javascript" src="revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
<script type="text/javascript" src="revolution/js/extensions/revolution.extension.migration.min.js"></script>
<script type="text/javascript" src="revolution/js/extensions/revolution.extension.navigation.min.js"></script>
<script type="text/javascript" src="revolution/js/extensions/revolution.extension.parallax.min.js"></script>
<script type="text/javascript" src="revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
<script type="text/javascript" src="revolution/js/extensions/revolution.extension.video.min.js"></script>-->
<!-- setting -->
<script type="text/javascript" src="<?= URL; ?>public/js/main.js"></script>
<?php
#cargamos los js de las vistas
if (isset($this->external_js)) {
    foreach ($this->external_js as $external) {
        echo '<script async defer src="' . $external . '"></script>';
    }
}
if (isset($this->public_js)) {
    foreach ($this->public_js as $public_js) {
        echo '<script type="text/javascript" src="' . URL . 'public/' . $public_js . '"></script>';
    }
}
if (isset($this->js)) {
    foreach ($this->js as $js) {
        echo '<script type="text/javascript" src="' . URL . 'views/' . $js . '"></script>';
    }
}
?>
</body>
</html>