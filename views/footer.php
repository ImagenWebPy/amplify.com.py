<?php if (empty($this->pagina)): ?>
    </div>
<?php endif; ?>
<!-- start footer --> 
<footer class="footer-classic-dark bg-extra-dark-gray padding-five-bottom xs-padding-30px-bottom">
    <div class="bg-dark-footer padding-50px-tb xs-padding-30px-tb">
        <div class="container">
            <div class="row equalize xs-equalize-auto">
                <!-- start slogan -->
                <div class="col-md-4 col-sm-5 col-xs-12 text-center alt-font display-table xs-text-center xs-margin-15px-bottom">
                    <div class="display-table-cell vertical-align-middle">
                        London based highly creative studio
                    </div>
                </div>
                <!-- end slogan -->
                <!-- start logo -->
                <div class="col-md-4 col-sm-2 col-xs-12 text-center display-table xs-margin-10px-bottom">
                    <div class="display-table-cell vertical-align-middle">
                        <a href="index.html"><img class="footer-logo" src="<?= URL; ?>public/images/logo-white.png" data-rjs="images/logo-white@2x.png" alt="Pofo"></a>
                    </div>
                </div>
                <!-- end logo -->
                <!-- start social media -->
                <div class="col-md-4 col-sm-5 col-xs-12 col-xs-12 text-center display-table xs-text-center">
                    <div class="display-table-cell vertical-align-middle">
                        <span class="alt-font margin-20px-right">On social networks</span>
                        <div class="social-icon-style-8 display-inline-block vertical-align-middle">
                            <ul class="small-icon no-margin-bottom">
                                <li><a class="facebook text-white" href="https://www.facebook.com/" target="_blank"><i class="fab fa-facebook-f" aria-hidden="true"></i></a></li>
                                <li><a class="twitter text-white" href="https://twitter.com/" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                <li><a class="google text-white" href="https://plus.google.com" target="_blank"><i class="fab fa-google-plus-g"></i></a></li>
                                <li><a class="instagram text-white" href="https://instagram.com/" target="_blank"><i class="fab fa-instagram no-margin-right" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- end social media -->
            </div>
        </div>
    </div>
    <div class="footer-widget-area padding-five-top padding-30px-bottom xs-padding-30px-top">
        <div class="container">
            <div class="row">
                <!-- start about -->
                <div class="col-md-3 col-sm-6 col-xs-12 widget sm-margin-30px-bottom xs-text-center">
                    <div class="widget-title alt-font text-small text-medium-gray text-uppercase margin-15px-bottom font-weight-600">About Agency</div>
                    <p class="text-small width-95 xs-width-100 no-margin">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the and typesetting industry. </p>
                </div>
                <!-- end about -->
                <!-- start blog post -->
                <div class="col-md-3 col-sm-6 col-xs-12 widget sm-margin-30px-bottom">
                    <div class="widget-title alt-font text-small text-medium-gray text-uppercase margin-15px-bottom font-weight-600 xs-text-center">Latest Blog Post</div>
                    <ul class="latest-post position-relative top-3">
                        <li class="border-bottom border-color-medium-dark-gray">
                            <figure>
                                <a href="blog-post-layout-01.html"><img src="http://placehold.it/700x403" alt=""></a>
                            </figure>
                            <div class="text-small"><a href="blog-post-layout-01.html">Design is not just what looks...</a> <span class="clearfix"></span>20 April 2017 | by <a href="blog-grid.html">Herman Miller</a></div>
                        </li>
                        <li class="border-bottom border-color-medium-dark-gray">
                            <figure>
                                <a href="blog-post-layout-02.html"><img src="http://placehold.it/700x403" alt=""></a>
                            </figure>
                            <div class="text-small"><a href="blog-post-layout-02.html">A lot of care, effort & passion...</a> <span class="clearfix"></span>20 April 2017 | by <a href="blog-grid.html">Herman Miller</a></div>
                        </li>
                        <li>
                            <figure>
                                <a href="blog-post-layout-03.html"><img src="http://placehold.it/700x403" alt=""></a>
                            </figure>
                            <div class="text-small"><a href="blog-post-layout-03.html">I love making the stuff, that's...</a> <span class="clearfix"></span>20 April 2017 | by <a href="blog-grid.html">Herman Miller</a></div>
                        </li>
                    </ul>
                </div>
                <!-- end blog post -->
                <!-- start newsletter -->
                <div class="col-md-3 col-sm-6 col-xs-12 widget sm-margin-30px-bottom xs-text-center">
                    <div class="widget-title alt-font text-small text-medium-gray text-uppercase margin-15px-bottom font-weight-600">Subscribe Newsletter</div>
                    <p class="text-small width-90 xs-width-100">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                    <form id="subscribenewsletterform" action="javascript:void(0)" method="post">
                        <div class="position-relative newsletter width-95">
                            <div id="success-subscribe-newsletter" class="no-margin-lr"></div>
                            <input type="text" id="email" name="email" class="bg-transparent text-small no-margin border-color-medium-dark-gray" placeholder="Enter your email...">
                            <button id="button-subscribe-newsletter" type="submit" class="btn btn-arrow-small position-absolute border-color-medium-dark-gray"><i class="fas fa-caret-right no-margin-left"></i></button>
                        </div> 
                    </form>
                </div>
                <!-- end newsletter -->
                <!-- start instagram -->
                <div class="col-md-3 col-sm-6 col-xs-12 widget xs-margin-5px-bottom xs-text-center">
                    <div class="widget-title alt-font text-small text-medium-gray text-uppercase margin-20px-bottom font-weight-600">Follow us Instagram</div>
                    <div class="instagram-follow-api">
                        <ul id="instaFeed-footer"></ul>
                    </div>
                </div>
                <!-- end instagram -->
            </div>
        </div>
    </div>
    <div class="container">
        <div class="footer-bottom border-top border-color-medium-dark-gray padding-30px-top">
            <div class="row">
                <!-- start copyright -->
                <div class="col-md-6 col-sm-6 col-xs-12 text-left text-small xs-text-center">POFO - Portfolio Concept Theme</div>
                <div class="col-md-6 col-sm-6 col-xs-12 text-right text-small xs-text-center">&COPY; 2017 POFO is Proudly Powered by <a href="http://www.themezaa.com" target="_blank" title="ThemeZaa">ThemeZaa</a></div>
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

</body>
</html>