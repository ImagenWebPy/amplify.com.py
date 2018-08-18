<?php

class Contacto extends Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        #PARAMETRO OBLIGATORIOS
        $this->view->title = TITLE . 'Empresa';
        $this->view->description = 'Meta Descripcion Empresa';
        $this->view->keywords = 'Meta Keywords Empresa';
        $this->view->redes = $this->helper->obtenerRedes(3);
        $this->view->pagina = $this->pagina;
        $this->view->logos = $this->helper->getLogos();
        #FIN PARAMETROS OBLIGATORIOS

        $this->view->contenido = $this->model->contenido();

        $this->view->external_js = array("https://maps.googleapis.com/maps/api/js?key=AIzaSyB7fLf_oDK9bVgP3sgOuTVvR_BFrluHSik&callback=initMap");
        #cargamos la vista
        $this->view->render('header');
        $this->view->render('contacto/index');
        $this->view->render('footer');
    }

}
