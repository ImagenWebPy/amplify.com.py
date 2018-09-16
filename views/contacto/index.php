<!-- start page title section -->
<section class="wow fadeIn parallax" data-stellar-background-ratio="0.5" style="background-image:url('<?= URL; ?>public/images/header/<?= utf8_encode($this->contenido['header_img']) ?>');">
    <div class="opacity-medium bg-extra-dark-gray"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 extra-small-screen display-table page-title-large">
                <div class="display-table-cell vertical-align-middle text-center">
                    <!-- start page title -->
                    <h1 class="text-white alt-font font-weight-600 letter-spacing-minus-1 margin-15px-bottom"><?= utf8_encode($this->contenido['header_titulo']) ?></h1>
                    <!-- end page title -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end page title section -->
<!-- start contact info -->
<section class="wow fadeIn">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-8 col-xs-12 center-col margin-eight-bottom sm-margin-40px-bottom xs-margin-30px-bottom text-center last-paragraph-no-margin">
                <h5 class="alt-font font-weight-700 text-extra-dark-gray text-uppercase"><?= utf8_encode($this->contenido['titulo']) ?></h5>
            </div>  
        </div>
        <div class="row">
            <div class="row">
                <!-- start contact info item -->
                <div class="col-md-4 col-sm-6 col-xs-12 text-center sm-margin-eight-bottom xs-margin-30px-bottom wow fadeInUp last-paragraph-no-margin">
                    <div class="display-inline-block margin-20px-bottom">
                        <div class="bg-extra-dark-gray icon-round-medium"><i class="icon-map-pin icon-medium text-white"></i></div>
                    </div>
                    <div class="text-extra-dark-gray text-uppercase text-small font-weight-600 alt-font margin-5px-bottom"><?= utf8_encode($this->contenido['titulo_direccion']) ?></div>
                    <p class="center-col"><?= utf8_encode($this->contenido['direccion']) ?></p>
                </div>
                <!-- end contact info item -->
                <!-- start contact info item -->
                <div class="col-md-4 col-sm-6 col-xs-12 text-center sm-margin-eight-bottom xs-margin-30px-bottom wow fadeInUp last-paragraph-no-margin" data-wow-delay="0.2s">
                    <div class="display-inline-block margin-20px-bottom">
                        <div class="bg-extra-dark-gray icon-round-medium"><i class="icon-chat icon-medium text-white"></i></div>
                    </div>
                    <div class="text-extra-dark-gray text-uppercase text-small font-weight-600 alt-font margin-5px-bottom"><?= utf8_encode($this->contenido['titulo_telefono']) ?></div>
                    <p class="center-col"><?= utf8_encode($this->contenido['telefono']) ?></p>
                    <!--<a href="#" class="text-decoration-line-through-deep-pink text-uppercase text-deep-pink text-small margin-15px-top xs-margin-10px-top display-inline-block">call us</a>-->
                </div>
                <!-- end contact info item -->
                <!-- start contact info item -->
                <div class="col-md-4 col-sm-6 col-xs-12 text-center xs-margin-30px-bottom wow fadeInUp last-paragraph-no-margin" data-wow-delay="0.4s">
                    <div class="display-inline-block margin-20px-bottom">
                        <div class="bg-extra-dark-gray icon-round-medium"><i class="icon-envelope icon-medium text-white"></i></div>
                    </div>
                    <div class="text-extra-dark-gray text-uppercase text-small font-weight-600 alt-font margin-5px-bottom"><?= utf8_encode($this->contenido['titulo_email']) ?></div>
                    <p class="center-col"><a href="mailto:<?= utf8_encode($this->contenido['email']) ?>"><?= utf8_encode($this->contenido['email']) ?></a></p>
                </div>
                <!-- end contact info item -->

            </div>
        </div>
    </div>
</section>
<!-- end contact info section -->
<!-- start contact form -->
<section id="contact" class="wow fadeIn no-padding bg-extra-dark-gray">
    <div class="container-fluid">
        <div class="row equalize sm-equalize-auto">
            <div class="col-md-6 cover-background sm-height-450px xs-height-350px wow fadeIn" style="background: url(<?= URL; ?>public/images/<?= utf8_encode($this->contenido['imagen']) ?>)"></div>
            <div class="col-md-6 wow fadeIn">
                <div class="padding-eleven-all text-center xs-no-padding-lr">
                    <div class="text-medium-gray alt-font text-small text-uppercase margin-5px-bottom xs-margin-three-bottom"><?= utf8_encode($this->contenido['texto_formulario']) ?></div>
                    <h5 class="margin-55px-bottom text-white alt-font font-weight-700 text-uppercase xs-margin-ten-bottom"><?= utf8_encode($this->contenido['titulo_formulario']) ?></h5>
                    <form id="project-contact-form" action="javascript:void(0)" method="post">
                        <div class="row">
                            <div class="col-md-12">
                                <div id="success-project-contact-form" class="no-margin-lr"></div>
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="name" id="name" placeholder="Nombre *" class="bg-transparent border-color-medium-dark-gray medium-input">
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="phone" id="phone" placeholder="Teléfono" class="bg-transparent border-color-medium-dark-gray medium-input">
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="email" id="email" placeholder="E-mail *" class="bg-transparent border-color-medium-dark-gray medium-input">
                            </div>
                            <div class="col-md-12">
                                <textarea name="comment" id="comment" placeholder="Ingrese su consulta" rows="6" class="bg-transparent border-color-medium-dark-gray medium-textarea"></textarea>
                            </div>
                            <div class="col-md-12 text-center">
                                <button id="project-contact-us-button" type="submit" class="btn btn-deep-pink btn-medium margin-20px-top">enviar mensaje</button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end contact form -->
<!-- start map section -->
<section class="no-padding one-second-screen sm-height-400px wow fadeIn" id="map"></section>
<!-- end map section -->
<!-- start social section -->
<section class="wow fadeIn">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center social-style-1 round social-icon-style-5">
                <ul class="large-icon no-margin-bottom">
                    <?php foreach ($this->redes as $item): ?>
                        <a href="<?= utf8_encode($item['url']); ?>" title="<?= utf8_encode($item['descripcion']); ?>" target="_blank"><i class="<?= utf8_encode($item['fontawesome']); ?>" aria-hidden="true"></i></a>
                    <?php endforeach; ?>
                </ul>
            </div>                   
        </div>
    </div>
</section>
<!-- end social section -->
<script type="text/javascript">
    function initMap() {
        var uluru = {lat: <?= $this->contenido['latitud']; ?>, lng: <?= $this->contenido['longitud']; ?>};
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: <?= $this->contenido['zoom']; ?>,
            center: uluru
        });
        var marker = new google.maps.Marker({
            position: uluru,
            map: map
        });
    }
</script>