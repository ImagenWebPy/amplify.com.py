<?php

class Buses extends Controller {

    function __construct() {
        parent::__construct();
    }
    
    public function index() {
        #PARAMETRO OBLIGATORIOS
        $this->view->title = TITLE . 'Buses';
        $this->view->description = 'Meta Descripcion Buses';
        $this->view->keywords = 'Meta Keywords Buses';
        $this->view->redes = $this->helper->obtenerRedes(3);
        $this->view->pagina = $this->pagina;
        $this->view->logos = $this->helper->getLogos();
        $this->view->footerInfo = $this->helper->getInfoFooter();
        #FIN PARAMETROS OBLIGATORIOS
        
        $this->view->contenido = $this->model->contenido();

        #cargamos la vista
        $this->view->render('header');
        $this->view->render('buses/index');
        $this->view->render('footer');
    }

    public function cargarBuses() {
        $url = $this->helper->getUrl();
        if (!empty($url[2])) {
            $pagina = $url[2];
        } else {
            $pagina = 1;
        }
        header('Content-type: application/json; charset=utf-8');
        $datos = $this->model->cargarBuses($pagina);
        echo json_encode($datos);
    }
}
