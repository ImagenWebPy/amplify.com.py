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
<!-- start portfolio section -->
<section class="wow fadeIn padding-90px-top sm-padding-50px-top xs-padding-30px-top">
    <!-- start filter content -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 no-padding xs-padding-15px-lr">
                <div class="filter-content overflow-hidden" >
                    <ul class="portfolio-grid work-4col hover-option4 gutter-medium">
                        <li class="grid-sizer"></li>
                        <span id="divContenidoAsuncion">

                        </span>
                    </ul>
                </div>
                <div id="paginador" class="col-md-12"></div>
            </div>
        </div>
    </div>
    <!-- end filter content -->
</section>
<!-- end portfolio section -->
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
<script type="text/javascript">
    cargarContenidoAsuncion('<?= URL; ?>carteles_tradicionales/cargarContenidoAsuncion/1');
</script>