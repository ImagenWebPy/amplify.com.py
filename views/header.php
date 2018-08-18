<!doctype html>
<html class="no-js" lang="es">
    <head>
        <!-- title -->
        <title><?= $this->title; ?></title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1" />
        <meta name="author" content="ImagenWeb">
        <!-- description -->
        <meta name="description" content="<?= $this->description; ?>">
        <!-- keywords -->
        <meta name="keywords" content="<?= $this->keywords; ?>">
        <!-- favicon -->
        <link rel="shortcut icon" href="<?= URL; ?>public/images/favicon.png">
        <link rel="apple-touch-icon" href="<?= URL; ?>public/images/apple-touch-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="72x72" href="<?= URL; ?>public/images/apple-touch-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="114x114" href="<?= URL; ?>public/images/apple-touch-icon-114x114.png">
        <!-- animation -->
        <link rel="stylesheet" href="<?= URL; ?>public/css/animate.css" />
        <!-- bootstrap -->
        <link rel="stylesheet" href="<?= URL; ?>public/css/bootstrap.min.css" />
        <!-- et line icon --> 
        <link rel="stylesheet" href="<?= URL; ?>public/css/et-line-icons.css" />
        <!-- font-awesome icon -->
        <link rel="stylesheet" href="<?= URL; ?>public/css/font-awesome.min.css" />
        <!-- themify icon -->
        <link rel="stylesheet" href="<?= URL; ?>public/css/themify-icons.css">
        <!-- swiper carousel -->
        <link rel="stylesheet" href="<?= URL; ?>public/css/swiper.min.css">
        <!-- justified gallery -->
        <link rel="stylesheet" href="<?= URL; ?>public/css/justified-gallery.min.css">
        <!-- magnific popup -->
        <link rel="stylesheet" href="<?= URL; ?>public/css/magnific-popup.css" />
        <!-- revolution slider -->
        <link rel="stylesheet" type="text/css" href="<?= URL; ?>public/revolution/css/settings.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="<?= URL; ?>public/revolution/css/layers.css">
        <link rel="stylesheet" type="text/css" href="<?= URL; ?>public/revolution/css/navigation.css">
        <!-- bootsnav -->
        <link rel="stylesheet" href="<?= URL; ?>public/css/bootsnav.css">
        <!-- style -->
        <link rel="stylesheet" href="<?= URL; ?>public/css/style.css" />
        <!-- responsive css -->
        <link rel="stylesheet" href="<?= URL; ?>public/css/responsive.css" />
        <!-- custom css -->
        <link rel="stylesheet" href="<?= URL; ?>public/css/custom.css" />
        <!--[if IE]>
            <script src="js/html5shiv.js"></script>
        <![endif]-->
        <script type="text/javascript" src="<?= URL; ?>public/js/jquery.js"></script>
        <script type="text/javascript" src="<?= URL; ?>public/js/custom.js"></script>
    </head>
    <body>
        <?php if (empty($this->pagina)): ?>
            <div class="box-layout">
            <?php endif; ?>
            <!-- start header -->
            <header>
                <!-- start navigation -->
                <nav class="navbar navbar-default bootsnav bg-transparent navbar-scroll-top header-light">
                    <div class="container nav-header-container">
                        <div class="row">
                            <div class="col-md-2 col-xs-5">
                                <a href="<?= URL; ?>" title="Amplify" class="logo"><img src="<?= URL; ?>public/images/<?= utf8_encode($this->logos['logo']); ?>" data-rjs="images/<?= utf8_encode($this->logos['logo_x2']); ?>" class="logo-dark default" alt="Amplify"></a>
                            </div>
                            <div class="col-md-7 col-xs-2 width-auto pull-right accordion-menu xs-no-padding-right">
                                <button type="button" class="navbar-toggle collapsed pull-right" data-toggle="collapse" data-target="#navbar-collapse-toggle-1">
                                    <span class="sr-only">toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <div class="navbar-collapse collapse pull-right" id="navbar-collapse-toggle-1">
                                    <ul id="accordion" class="nav navbar-nav navbar-left no-margin alt-font text-normal" data-in="fadeIn" data-out="fadeOut">
                                        <li><a href="<?= URL; ?>">Inicio</a></li>
                                        <li><a href="<?= URL; ?>pantallas_led">Pantallas Led</a></li>
                                        <li class="dropdown simple-dropdown">
                                            <a class="dropdown-toggle" data-toggle="dropdown" href="javascript:void(0);">Carteles Tradicionales</a>
                                            <ul class="dropdown-menu">
                                                <li><a href="<?= URL; ?>carteles_tradicionales/asuncion">Asunción</a></li>
                                                <li><a href="<?= URL; ?>carteles_tradicionales/gran_asuncion">Gran Asunción</a></li>
                                                <li><a href="<?= URL; ?>carteles_tradicionales/ruteros">Ruteros</a></li>
                                                <li><a href="<?= URL; ?>carteles_tradicionales/urbanos">Urbanos</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="<?= URL; ?>iconicos">Icónicos</a></li>
                                        <li><a href="<?= URL; ?>buses">Buses</a></li>
                                        <li><a href="<?= URL; ?>cobertura">Cobertura</a></li>
                                        <li><a href="<?= URL; ?>metricas">Métricas</a></li>
                                        <li><a href="<?= URL; ?>empresa">Empresa</a></li>
                                        <li><a href="<?= URL; ?>contacto">Contacto</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-2 col-xs-5 width-auto">
                                <div class="header-social-icon xs-display-none">
                                    <?php foreach ($this->redes as $item): ?>
                                        <a href="<?= utf8_encode($item['url']); ?>" title="<?= utf8_encode($item['descripcion']); ?>" target="_blank"><i class="<?= utf8_encode($item['fontawesome']); ?>" aria-hidden="true"></i></a>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
                <!-- end navigation -->
            </header>
            <!-- end header -->