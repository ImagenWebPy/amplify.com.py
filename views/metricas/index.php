<!-- start page title section -->
<section class="wow fadeIn parallax" data-stellar-background-ratio="0.5" style="background-image:url('<?= URL; ?>public/images/header/<?= utf8_encode($this->contenido['header_img']); ?>');">
    <div class="opacity-medium bg-extra-dark-gray"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 extra-small-screen display-table page-title-large">
                <div class="display-table-cell vertical-align-middle text-center">
                    <!-- start page title -->
                    <h1 class="text-white alt-font font-weight-600 letter-spacing-minus-1 margin-10px-bottom"><?= utf8_encode($this->contenido['header_titulo']); ?></h1>
                    <!-- end page title -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end page title section -->
<!-- start call to action section -->
<section class="wow fadeIn padding-50px-tb border-top border-width-1 border-color-extra-light-gray">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 sm-margin-30px-bottom sm-text-center wow fadeInDown"> 
                <?= utf8_encode($this->contenido['contenido']); ?>
            </div>

        </div>
    </div>
</section>
<!-- end call to action section -->