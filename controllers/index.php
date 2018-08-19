<?php

class Index extends Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        #PARAMETRO OBLIGATORIOS
        $metas = $this->helper->getMetaTags($this->url);
        $this->view->title = TITLE . $metas['title'];
        $this->view->description = $metas['description'];
        $this->view->keywords = $metas['keywords'];
        $this->view->redes = $this->helper->obtenerRedes(3);
        $this->view->pagina = '';
        $this->view->logos = $this->helper->getLogos();
        $this->view->footerInfo = $this->helper->getInfoFooter();
        #FIN PARAMETROS OBLIGATORIOS

        $this->view->slider = $this->helper->obtenerSlider();
        $this->view->index_seccion_1 = $this->helper->index_seccion_1();
        $this->view->index_seccion_2 = $this->helper->index_seccion_2();
        $this->view->index_seccion_3 = $this->helper->index_seccion_3();
        $this->view->index_seccion_4 = $this->helper->index_seccion_4();
        $this->view->index_seccion_5 = $this->helper->index_seccion_5();
        $this->view->mostrar_equipo_trabajo = $this->helper->mostrar_equipo_trabajo();
        #cargamos la vista
        $this->view->render('header');
        $this->view->render('index/index');
        $this->view->render('footer');
    }

}
