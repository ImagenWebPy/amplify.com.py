<!-- start slider section --> 
<section class="no-padding main-slider height-100 mobile-height wow fadeIn">
    <div class="swiper-full-screen swiper-container height-100 width-100 white-move">
        <div class="swiper-wrapper">
            <?php foreach ($this->slider as $item): ?>
                <!-- start slider item -->
                <!--                <div class="swiper-slide equalize xs-equalize-auto">
                                    <div class="col-md-6 col-sm-6 col-xs-12 bg-deep-pink height-700px xs-height-250px">
                                        <div class="display-table width-100 height-100">
                                            <div class="display-table-cell vertical-align-middle text-left padding-twelve-all xs-padding-five-all">
                <?php if (!empty($item['titulo'])): ?>
                                                                <h6 class="title-large text-white margin-auto alt-font font-weight-600 letter-spacing-minus-3"><?= utf8_encode($item['titulo']); ?></h6>
                <?php endif; ?>
                <?php if (!empty($item['texto_complementario'])): ?>
                                                                <span class="text-large text-middle-line font-weight-300 margin-30px-top width-65 md-width-75 sm-width-90 text-white display-block xs-margin-15px-top"><?= utf8_encode($item['texto_complementario']); ?></span>
                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12 no-padding-lr cover-background height-700px xs-height-400px" style="background-image:url('<?= URL; ?>public/images/slider/<?= utf8_encode($item['imagen']); ?>');"></div>
                                </div>-->
                <div class="swiper-slide cover-background xs-background-image-center" style="background-image:url('<?= URL; ?>public/images/slider/<?= utf8_encode($item['imagen']); ?>');">
                    <div class="container-fluid slider-half-screen position-relative">
                        <div class="slider-typography text-left">
                            <div class="slider-text-middle-main">
                                <div class="slider-text-middle padding-ten-left xs-padding-five-left">
                                    <?php if (!empty($item['texto_complementario'])): ?>
                                        <span class="text-middle-line text-deep-pink display-block width-20 sm-text-middle-line xs-width-50"><?= utf8_encode($item['texto_complementario']); ?></span>
                                    <?php endif; ?>
                                    <?php if (!empty($item['titulo'])): ?>
                                        <span class="title-large alt-font text-extra-dark-gray font-weight-700 width-25 margin-40px-tb xs-margin-20px-tb display-block letter-spacing-minus-2 sm-width-60"><?= utf8_encode($item['titulo']); ?></span>
                                    <?php endif; ?>
                                    <!--<a href="single-project-page-01.html" class="btn btn-small btn-dark-gray">Explore Work</a>-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end slider item -->
            <?php endforeach; ?>
        </div>
        <!-- start slider pagination -->
        <div class="swiper-pagination swiper-pagination-square swiper-pagination-white swiper-full-screen-pagination"></div>
        <div class="swiper-button-next swiper-button-black-highlight display-none"></div>
        <div class="swiper-button-prev swiper-button-black-highlight display-none"></div>
        <!-- end slider pagination -->
    </div>
</section>
<!-- end slider section -->
<!-- start feature box section -->
<section id="about" class="wow fadeIn">
    <div class="container">
        <?php if (!empty($this->index_seccion_1)): ?>
            <div class="row">
                <!-- start feature box item -->
                <div class="col-lg-8 col-md-8 col-sm-10 col-xs-12 text-center center-col margin-eight-bottom xs-margin-30px-bottom">
                    <span class="alt-font text-deep-pink text-medium margin-5px-bottom display-block"><?= utf8_encode($this->index_seccion_1['titulo']) ?></span>
                    <?= utf8_encode($this->index_seccion_1['contenido']) ?>
                </div>
                <!-- end feature box item -->
            </div>
        <?php endif; ?>
        <?php if (!empty($this->index_seccion_2)): ?>
            <div class="row">
                <?php foreach ($this->index_seccion_2 as $item): ?>
                    <!-- start feature box item -->
                    <div class="col-md-4 col-sm-4 col-xs-12 xs-margin-30px-bottom xs-text-center wow fadeInUp last-paragraph-no-margin">
                        <div class="col-md-3 col-sm-4 col-xs-12 no-padding-left pull-left xs-no-padding-right">
                            <i class="<?= utf8_encode($item['fontawesome']); ?> seccion2Font text-medium-gray xs-margin-10px-bottom position-relative top-minus3"></i>
                            <span class="separator-line-verticle-large margin-ten-right bg-deep-pink vertical-align-top pull-right margin-two-top hidden-xs"></span>
                        </div>
                        <div class="col-md-9 col-sm-8 col-xs-12 sm-no-padding-lr">
                            <span class="text-medium margin-four-bottom text-extra-dark-gray alt-font display-block sm-margin-10px-bottom xs-margin-5px-bottom"><?= utf8_encode($item['titulo']); ?></span>
                            <p class="width-90 md-width-100"><?= utf8_encode($item['contenido']); ?></p>
                        </div>
                    </div>
                    <!-- end feature box item -->
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
<!-- end feature box section -->
<?php if (!empty($this->index_seccion_3)): ?>
    <!-- start section -->
    <section class="wow fadeIn bg-extra-dark-gray">
        <div class="container"> 
            <div class="row equalize md-equalize-auto">
                <div class="col-lg-5 col-md-6 col-sm-12 col-xs-12 display-table sm-margin-five-bottom sm-text-center xs-no-margin-top wow fadeIn" data-wow-delay="0.4s">
                    <div class="display-table-cell vertical-align-middle md-padding-15px-lr xs-text-center xs-padding-five-lr xs-padding-ten-bottom width-100">
                        <span class="alt-font text-medium-gray display-block margin-10px-bottom"><?= utf8_encode($this->index_seccion_3['subtitulo']); ?></span>
                        <h6 class="text-light-gray alt-font width-90 sm-width-100"><?= utf8_encode($this->index_seccion_3['titulo']); ?></h6>
                        <p class="width-85 md-width-90 sm-width-100"><?= utf8_encode($this->index_seccion_3['descripcion']); ?></p>
                    </div>
                </div>
                <div class="col-lg-3 col-lg-offset-1 col-md-3 col-sm-12 col-xs-12 text-center display-table sm-margin-five-bottom wow fadeIn">
                    <div class="display-table-cell vertical-align-middle">
                        <img src="<?= URL; ?>public/images/<?= utf8_encode($this->index_seccion_3['imagen']); ?>" alt="" class="width-100">
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 text-left display-table wow fadeIn" data-wow-delay="0.2s">
                    <div class="display-table-cell vertical-align-middle text-white bg-deep-pink padding-35px-lr md-padding-15px-all sm-padding-30px-all last-paragraph-no-margin">
                        <div class="text-large margin-15px-bottom"><?= utf8_encode($this->index_seccion_3['titulo_cuadro']); ?></div>
                        <p><?= utf8_encode($this->index_seccion_3['descripcion_cuadro']); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end section -->
<?php endif; ?>
<?php if (!empty($this->index_seccion_4)): ?>
    <!-- start feature box section -->
    <section class="no-padding wow fadeIn bg-extra-dark-gray">
        <div class="container-fluid">
            <div class="row equalize sm-equalize-auto">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 cover-background sm-height-500px xs-height-350px wow fadeIn" style="background-image:url('<?= URL; ?>public/images/<?= utf8_encode($this->index_seccion_4['imagen']); ?>');"><div class="xs-height-400px"></div></div>
                <div class="col-md-6 col-sm-12 col-xs-12 display-table wow fadeInRight last-paragraph-no-margin sm-text-center">
                    <div class="display-table-cell vertical-align-middle padding-fifteen-all md-padding-ten-all sm-padding-90px-all xs-text-center xs-no-padding-lr xs-padding-40px-tb">
                        <span class="text-medium margin-20px-bottom display-block alt-font"><?= utf8_encode($this->index_seccion_3['subtitulo']); ?></span>
                        <h4 class="alt-font text-light-gray"><?= utf8_encode($this->index_seccion_3['titulo']); ?></h4>
                        <p class="width-85 md-width-100"><?= utf8_encode($this->index_seccion_3['descripcion']); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end feature box section -->
<?php endif; ?>
<?php if (!empty($this->index_seccion_5)): ?>
    <!-- start team section -->
    <section class="wow fadeIn">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-6 col-sm-6 col-xs-12 center-col margin-eight-bottom sm-margin-40px-bottom xs-margin-30px-bottom text-center">
                    <div class="alt-font text-medium-gray margin-5px-bottom text-uppercase text-small"><?= utf8_encode($this->index_seccion_5['subtitulo']); ?></div>
                    <h5 class="alt-font text-extra-dark-gray font-weight-700 text-uppercase"><?= utf8_encode($this->index_seccion_5['titulo']); ?></h5>
                </div>
            </div>
            <div class="row">
                <?php foreach ($this->mostrar_equipo_trabajo as $item): ?>
                    <!-- start team item -->
                    <div class="col-md-3 col-sm-6 col-xs-12 team-block text-left team-style-1 sm-margin-seven-bottom xs-margin-30px-bottom wow fadeInRight">
                        <figure>
                            <div class="team-image xs-width-100">
                                <img src="<?= URL; ?>public/images/equipo/<?= utf8_encode($item['imagen']); ?>" alt="<?= utf8_encode($item['nombre']); ?>">
                                <div class="overlay-content text-center">
                                    <div class="display-table height-100 width-100">
                                        <div class="vertical-align-bottom display-table-cell icon-social-small padding-twelve-all">
                                            <span class="text-white text-small display-inline-block no-margin">
                                                <?php
                                                if ($item['mostrar_telefono'] == 1) {
                                                    echo '<i class="fas fa-phone-volume"></i> ' . $item['telefono'] . '<br>';
                                                }
                                                if ($item['mostrar_email'] == 1) {
                                                    echo '<i class="far fa-envelope"></i> <a class="enlaceEquipoEmail" href="mailto:' . $item['email'] . '">' . $item['email'] . '</a>';
                                                }
                                                ?>
                                            </span>
                                            <div class="separator-line-horrizontal-full bg-deep-pink margin-eleven-tb"></div>
                                            <?php if (!empty(Helper::obtenerRedesEquipo($item['id']))): ?>
                                                <?php foreach (Helper::obtenerRedesEquipo($item['id']) as $red): ?>
                                                    <a href="<?= utf8_encode($red['url']); ?>" target="_blank" class="text-white" title="<?= utf8_encode($red['red_social']); ?>"><i class="<?= utf8_encode($red['fontawesome']); ?>"></i></a>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="team-overlay bg-extra-dark-gray opacity8"></div>
                            </div>
                            <figcaption>
                                <div class="team-member-position margin-20px-top text-center">
                                    <div class="text-small font-weight-500 text-extra-dark-gray text-uppercase"><?= utf8_encode($item['nombre']); ?></div>
                                    <div class="text-extra-small text-uppercase text-medium-gray"><?= utf8_encode($item['cargo']); ?></div>
                                </div> 
                            </figcaption>
                        </figure>
                    </div>
                    <!-- end team item -->
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <!-- end team section -->
<?php endif; ?>
</div>