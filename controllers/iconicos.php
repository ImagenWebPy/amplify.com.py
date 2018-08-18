<?php

class Iconicos extends Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        #PARAMETRO OBLIGATORIOS
        $this->view->title = TITLE . 'Iconicos';
        $this->view->description = 'Meta Descripcion Iconicos';
        $this->view->keywords = 'Meta Keywords Iconicos';
        $this->view->redes = $this->helper->obtenerRedes(3);
        $this->view->pagina = $this->pagina;
        $this->view->logos = $this->helper->getLogos();
        #FIN PARAMETROS OBLIGATORIOS

        $this->view->contenido = $this->model->contenido();

        #cargamos la vista
        $this->view->render('header');
        $this->view->render('iconicos/index');
        $this->view->render('footer');
    }

    public function cargarIconicos() {
        $url = $this->helper->getUrl();
        if (!empty($url[2])) {
            $pagina = $url[2];
        } else {
            $pagina = 1;
        }
        header('Content-type: application/json; charset=utf-8');
        $datos = $this->model->cargarIconicos($pagina);
        echo json_encode($datos);
    }

}
