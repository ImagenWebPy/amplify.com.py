<?php

class Metricas extends Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        #PARAMETRO OBLIGATORIOS
        $this->view->title = TITLE . 'Métricas';
        $this->view->description = 'Meta Descripcion Métricas';
        $this->view->keywords = 'Meta Keywords Métricas';
        $this->view->redes = $this->helper->obtenerRedes(3);
        $this->view->pagina = $this->pagina;
        $this->view->logos = $this->helper->getLogos();
        $this->view->footerInfo = $this->helper->getInfoFooter();
        #FIN PARAMETROS OBLIGATORIOS

        $this->view->contenido = $this->model->contenido();

        #cargamos la vista
        $this->view->render('header');
        $this->view->render('metricas/index');
        $this->view->render('footer');
    }

}
