<?php

class Contacto extends Controller {

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

        $this->view->external_js = array("https://maps.googleapis.com/maps/api/js?key=AIzaSyB7fLf_oDK9bVgP3sgOuTVvR_BFrluHSik&callback=initMap");
        #cargamos la vista
        $this->view->render('header');
        $this->view->render('contacto/index');
        $this->view->render('footer');
    }

    public function contacto() {
        header('Content-type: application/json; charset=utf-8');
        $data = array(
            'nombre' => (!empty($_POST['name'])) ? $this->helper->cleanInput($_POST['name']) : NULL,
            'email' => (!empty($_POST['email'])) ? $this->helper->cleanInput($_POST['email']) : NULL,
            'telefono' => (!empty($_POST['phone'])) ? $this->helper->cleanInput($_POST['phone']) : NULL,
            'mensaje' => (!empty($_POST['comment'])) ? $this->helper->cleanInput($_POST['comment']) : NULL
        );
        $datos = $this->model->contacto($data);
        echo json_encode($datos);
    }

}
