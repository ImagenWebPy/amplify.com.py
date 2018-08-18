<?php

class Errores extends Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        #PARAMETRO OBLIGATORIOS
        $this->view->title = TITLE . 'Error';
        $this->view->description = 'Meta Descripcion Buses';
        $this->view->keywords = 'Meta Keywords Buses';
        $this->view->redes = $this->helper->obtenerRedes(3);
        $this->view->pagina = $this->pagina;
        $this->view->logos = $this->helper->getLogos();
        #FIN PARAMETROS OBLIGATORIOS

        $this->view->contenido = $this->helper->getErrorContenido();
        $this->view->render('header');
        $this->view->render('error/index');
        $this->view->render('footer');
    }

}
