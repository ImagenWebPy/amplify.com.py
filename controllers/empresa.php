<?php

class Empresa extends Controller {

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

        #cargamos la vista
        $this->view->render('header');
        $this->view->render('empresa/index');
        $this->view->render('footer');
    }

}
