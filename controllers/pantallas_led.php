<?php

class Pantallas_led extends Controller {

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
        
        $this->view->helper = $this->helper;
        $this->view->contenido = $this->model->contenido();

        #cargamos la vista
        $this->view->render('header');
        $this->view->render('pantallas_led/index');
        $this->view->render('footer');
    }

    public function cargarPantallasLed() {
        $url = $this->helper->getUrl();
        if (!empty($url[2])) {
            $pagina = $url[2];
        } else {
            $pagina = 1;
        }
        header('Content-type: application/json; charset=utf-8');
        $datos = $this->model->cargarPantallasLed($pagina);
        echo json_encode($datos);
    }

}
