<?php

class Index extends Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->view->title = TITLE . 'Inicio';
        $this->view->description = 'Meta Descripcion Inicio';
        $this->view->keywords = 'Meta Keywords Inicio';

        $this->view->render('header');
        $this->view->render('index/index');
        $this->view->render('footer');
    }

}
