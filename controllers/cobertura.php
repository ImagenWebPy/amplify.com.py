<?php

class Cobertura extends Controller {

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
        $this->view->pagina = $this->pagina;
        $this->view->logos = $this->helper->getLogos();
        $this->view->footerInfo = $this->helper->getInfoFooter();
        #FIN PARAMETROS OBLIGATORIOS

        $this->view->contenido = $this->model->contenido();
        $this->view->ubicaciones = $this->model->ubicaciones();

        $this->view->external_js = array("https://maps.googleapis.com/maps/api/js?key=AIzaSyB7fLf_oDK9bVgP3sgOuTVvR_BFrluHSik&callback=initMap");
        #cargamos la vista
        $this->view->render('header');
        $this->view->render('cobertura/index');
        $this->view->render('footer');
    }

}
