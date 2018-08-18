<?php

class Carteles_tradicionales extends Controller {

    function __construct() {
        parent::__construct();
    }

    public function asuncion() {
        #PARAMETRO OBLIGATORIOS
        $this->view->title = TITLE . 'Carteles Tradicionales | Asunción';
        $this->view->description = 'Meta Descripcion Carteles Tradicionales Asuncion';
        $this->view->keywords = 'Meta Keywords Carteles Tradicionales Asuncion';
        $this->view->redes = $this->helper->obtenerRedes(3);
        $this->view->pagina = $this->pagina;
        $this->view->logos = $this->helper->getLogos();
        $this->view->footerInfo = $this->helper->getInfoFooter();
        #FIN PARAMETROS OBLIGATORIOS

        $this->view->contenido = $this->model->contenido('Asuncion');

        #cargamos la vista
        $this->view->render('header');
        $this->view->render('carteles_tradicionales/asuncion');
        $this->view->render('footer');
    }

    public function gran_asuncion() {
        #PARAMETRO OBLIGATORIOS
        $this->view->title = TITLE . 'Carteles Tradicionales | Gran Asunción';
        $this->view->description = 'Meta Descripcion Carteles Tradicionales Gran Asuncion';
        $this->view->keywords = 'Meta Keywords Carteles Tradicionales Gran Asuncion';
        $this->view->redes = $this->helper->obtenerRedes(3);
        $this->view->pagina = $this->pagina;
        $this->view->logos = $this->helper->getLogos();
        $this->view->footerInfo = $this->helper->getInfoFooter();
        #FIN PARAMETROS OBLIGATORIOS

        $this->view->contenido = $this->model->contenido('Gran Asuncion');

        #cargamos la vista
        $this->view->render('header');
        $this->view->render('carteles_tradicionales/gran_asuncion');
        $this->view->render('footer');
    }

    public function ruteros() {
        #PARAMETRO OBLIGATORIOS
        $this->view->title = TITLE . 'Carteles Tradicionales | Ruteros';
        $this->view->description = 'Meta Descripcion Carteles Tradicionales Ruteros';
        $this->view->keywords = 'Meta Keywords Carteles Tradicionales Ruteros';
        $this->view->redes = $this->helper->obtenerRedes(3);
        $this->view->pagina = $this->pagina;
        $this->view->logos = $this->helper->getLogos();
        $this->view->footerInfo = $this->helper->getInfoFooter();
        #FIN PARAMETROS OBLIGATORIOS

        $this->view->contenido = $this->model->contenido('Ruteros');

        #cargamos la vista
        $this->view->render('header');
        $this->view->render('carteles_tradicionales/ruteros');
        $this->view->render('footer');
    }

    public function urbanos() {
        #PARAMETRO OBLIGATORIOS
        $this->view->title = TITLE . 'Carteles Tradicionales | Urbanos';
        $this->view->description = 'Meta Descripcion Carteles Tradicionales Urbanos';
        $this->view->keywords = 'Meta Keywords Carteles Tradicionales Urbanos';
        $this->view->redes = $this->helper->obtenerRedes(3);
        $this->view->pagina = $this->pagina;
        $this->view->logos = $this->helper->getLogos();
        $this->view->footerInfo = $this->helper->getInfoFooter();
        #FIN PARAMETROS OBLIGATORIOS

        $this->view->contenido = $this->model->contenido('Urbanos');

        #cargamos la vista
        $this->view->render('header');
        $this->view->render('carteles_tradicionales/urbanos');
        $this->view->render('footer');
    }

    public function cargarContenidoAsuncion() {
        $url = $this->helper->getUrl();
        if (!empty($url[2])) {
            $pagina = $url[2];
        } else {
            $pagina = 1;
        }
        header('Content-type: application/json; charset=utf-8');
        $datos = $this->model->cargarContenidoAsuncion($pagina);
        echo json_encode($datos);
    }

    public function cargarContenidoGranAsuncion() {
        $url = $this->helper->getUrl();
        if (!empty($url[2])) {
            $pagina = $url[2];
        } else {
            $pagina = 1;
        }
        header('Content-type: application/json; charset=utf-8');
        $datos = $this->model->cargarContenidoGranAsuncion($pagina);
        echo json_encode($datos);
    }

    public function cargarContenidoRuteros() {
        $url = $this->helper->getUrl();
        if (!empty($url[2])) {
            $pagina = $url[2];
        } else {
            $pagina = 1;
        }
        header('Content-type: application/json; charset=utf-8');
        $datos = $this->model->cargarContenidoRuteros($pagina);
        echo json_encode($datos);
    }

    public function cargarContenidoUrbanos() {
        $url = $this->helper->getUrl();
        if (!empty($url[2])) {
            $pagina = $url[2];
        } else {
            $pagina = 1;
        }
        header('Content-type: application/json; charset=utf-8');
        $datos = $this->model->cargarContenidoUrbanos($pagina);
        echo json_encode($datos);
    }

}
