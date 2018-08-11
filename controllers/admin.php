<?php

class Admin extends Controller {

    function __construct() {
        parent::__construct();
        Auth::handleLogin();
    }

    public function index() {
        $this->view->title = TITLE . 'Inicio';
        $this->view->public_css = array("css/plugins/daterangepicker/daterangepicker-bs3.css");
        $this->view->public_js = array("js/plugins/daterangepicker/momen.min.js", "js/plugins/daterangepicker/daterangepicker.js");
        $this->view->render('admin/header');
        $this->view->render('admin/index/index');
        $this->view->render('admin/footer');
    }

    public function inicio() {
        $this->view->helper = $this->helper;
        $this->view->title = 'Inicio';

        $this->view->datosSeccion1 = $this->model->datosSeccion(1);
        $this->view->datosSeccion3 = $this->model->datosSeccion(3);
        $this->view->datosSeccion4 = $this->model->datosSeccion(4);
        $this->view->datosSeccion5 = $this->model->datosSeccion(5);

        $this->view->public_css = array("css/plugins/dataTables/datatables.min.css", "css/plugins/html5fileupload/html5fileupload.css", "css/plugins/toastr/toastr.min.css", "css/plugins/iCheck/custom.css", "css/plugins/summernote/summernote.css");
        $this->view->publicHeader_js = array("js/plugins/html5fileupload/html5fileupload.min.js");
        $this->view->public_js = array("js/plugins/dataTables/datatables.min.js", "js/plugins/toastr/toastr.min.js", "js/plugins/summernote/summernote.min.js", "js/plugins/iCheck/icheck.min.js");
        $this->view->render('admin/header');
        $this->view->render('admin/inicio/index');
        $this->view->render('admin/footer');
        if (!empty($_SESSION['message']))
            unset($_SESSION['message']);
    }

    public function cambiarEstado() {
        header('Content-type: application/json; charset=utf-8');
        $datos = array(
            'id' => $this->helper->cleanInput($_POST['id']),
            'tabla' => $this->helper->cleanInput($_POST['tabla']),
            'campo' => $this->helper->cleanInput($_POST['campo']),
            'seccion' => $this->helper->cleanInput($_POST['seccion']),
            'estado' => (!empty($_POST['estado'])) ? $this->helper->cleanInput($_POST['estado']) : 0,
        );
        $data = $this->model->cambiarEstado($datos);
        echo json_encode($data);
    }

    public function modalEditarDTSlider() {
        header('Content-type: application/json; charset=utf-8');
        $data = array(
            'id' => $this->helper->cleanInput($_POST['id'])
        );
        $datos = $this->model->modalEditarDTSlider($data);
        echo $datos;
    }

    public function listadoDTSlider() {
        header('Content-type: application/json; charset=utf-8');
        $data = $this->model->listadoDTSlider();
        echo $data;
    }

    public function frmEditarSlider() {
        header('Content-type: application/json; charset=utf-8');
        $datos = array(
            'id' => $this->helper->cleanInput($_POST['id']),
            'orden' => (!empty($_POST['orden'])) ? $this->helper->cleanInput($_POST['orden']) : NULL,
            'enlace' => (!empty($_POST['enlace'])) ? $this->helper->cleanInput($_POST['enlace']) : NULL,
            'texto_boton' => (!empty($_POST['texto_boton'])) ? $this->helper->cleanInput($_POST['texto_boton']) : NULL,
            'titulo' => (!empty($_POST['titulo'])) ? $this->helper->cleanInput($_POST['titulo']) : NULL,
            'texto_complementario' => (!empty($_POST['texto_complementario'])) ? $this->helper->cleanInput($_POST['texto_complementario']) : NULL,
            'estado' => (!empty($_POST['estado'])) ? $this->helper->cleanInput($_POST['estado']) : 0,
        );
        $data = $this->model->frmEditarSlider($datos);
        echo json_encode($data);
    }

    public function uploadImgSlider() {
        if (!empty($_POST)) {
            $idPost = $_POST['data']['id'];
            $this->model->unlinkImagenSlider($idPost);
            $error = false;
            $absolutedir = dirname(__FILE__);
            $dir = 'public/images/slider/';
            $serverdir = $dir;
            $tmp = explode(',', $_POST['file']);
            $file = base64_decode($tmp[1]);
            $ext = explode('.', $_POST['filename']);
            $extension = strtolower(end($ext));
            $name = $_POST['name'];
            $filename = $this->helper->cleanUrl($idPost . '_' . $name);
            $filename = $filename . '.' . $extension;
            $handle = fopen($serverdir . $filename, 'w');
            fwrite($handle, $file);
            fclose($handle);
            #REDIMENSIONAR
            $imagen = $serverdir . $filename;
            $imagen_final = $filename;
            $ancho = 1800;
            $alto = 800;
            $this->helper->redimensionar($imagen, $imagen_final, $ancho, $alto, $serverdir);
            #############
            header('Content-type: application/json; charset=utf-8');
            $data = array(
                'id' => $idPost,
                'imagen' => $filename
            );
            $response = $this->model->uploadImgSlider($data);
            echo json_encode($response);
        }
    }

    public function modalAgregarSlider() {
        header('Content-type: application/json; charset=utf-8');
        $datos = $this->model->modalAgregarSlider();
        echo json_encode($datos);
    }

    public function frmAgregarSlider() {
        if (!empty($_POST)) {
            $principal = $_POST['principal'];
            $data = array(
                'orden' => (!empty($_POST['orden'])) ? $this->helper->cleanInput($_POST['orden']) : NULL,
                'titulo' => (!empty($_POST['titulo'])) ? $this->helper->cleanInput($_POST['titulo']) : NULL,
                'texto_complementario' => (!empty($_POST['texto_complementario'])) ? $this->helper->cleanInput($_POST['texto_complementario']) : NULL,
                'texto_boton' => (!empty($_POST['texto_boton'])) ? $this->helper->cleanInput($_POST['texto_boton']) : NULL,
                'enlace' => (!empty($_POST['enlace'])) ? $this->helper->cleanInput($_POST['enlace']) : NULL,
                'estado' => (!empty($_POST['estado'])) ? $this->helper->cleanInput($_POST['estado']) : 0,
            );
            $idPost = $this->model->frmAgregarSlider($data);
            #IMAGENES
            if (!empty($_FILES['file_archivo']['name'])) {
                $error = false;
                $dir = 'public/images/slider/';
                $serverdir = $dir;
                #IMAGENES
                $newname = $idPost . '_' . $_FILES['file_archivo']['name'];
                $fname = $this->helper->cleanUrl($newname);
                $contents = file_get_contents($_FILES['file_archivo']['tmp_name']);

                $handle = fopen($serverdir . $fname, 'w');
                fwrite($handle, $contents);
                fclose($handle);
                #############
                #SE REDIMENSIONA LA IMAGEN
                #############
                # ruta de la imagen a redimensionar 
                $imagen = $serverdir . $fname;
                # ruta de la imagen final, si se pone el mismo nombre que la imagen, esta se sobreescribe 
                $imagen_final = $fname;
                $ancho = 1800;
                $alto = 800;
                $this->helper->redimensionar($imagen, $imagen_final, $ancho, $alto, $serverdir);
                #############
                $imagenes = array(
                    'id' => $idPost,
                    'imagenes' => $fname
                );
                $this->model->frmAddSliderImg($imagenes);
            }
            Session::set('message', array(
                'type' => 'success',
                'mensaje' => 'Se ha agregado correctamente el slider'
            ));
        }
        header('Location:' . URL . 'admin/inicio/');
    }

    public function frmEditarIndexSeccion1() {
        header('Content-type: application/json; charset=utf-8');
        $data = array(
            'titulo' => (!empty($_POST['titulo'])) ? $this->helper->cleanInput($_POST['titulo']) : NULL,
            'contenido' => (!empty($_POST['contenido'])) ? $_POST['contenido'] : NULL,
            'estado' => (!empty($_POST['estado'])) ? $this->helper->cleanInput($_POST['estado']) : 0
        );
        $datos = $this->model->frmEditarIndexSeccion1($data);
        echo json_encode($datos);
    }

    public function listadoDTSeccion2() {
        header('Content-type: application/json; charset=utf-8');
        $data = $this->model->listadoDTSeccion2();
        echo $data;
    }

    public function modalEditarDTSeccion2() {
        header('Content-type: application/json; charset=utf-8');
        $data = array(
            'id' => $this->helper->cleanInput($_POST['id'])
        );
        $datos = $this->model->modalEditarDTSeccion2($data);
        echo $datos;
    }

    public function frmEditarIndexSeccion2() {
        header('Content-type: application/json; charset=utf-8');
        $data = array(
            'id' => $this->helper->cleanInput($_POST['id']),
            'titulo' => (!empty($_POST['titulo'])) ? $this->helper->cleanInput($_POST['titulo']) : NULL,
            'contenido' => (!empty($_POST['contenido'])) ? $this->helper->cleanInput($_POST['contenido']) : NULL,
            'fontawesome' => (!empty($_POST['fontawesome'])) ? $this->helper->cleanInput($_POST['fontawesome']) : NULL,
            'orden' => (!empty($_POST['orden'])) ? $this->helper->cleanInput($_POST['orden']) : NULL,
            'estado' => (!empty($_POST['estado'])) ? $this->helper->cleanInput($_POST['estado']) : 0
        );
        $datos = $this->model->frmEditarIndexSeccion2($data);
        echo json_encode($datos);
    }

    public function modalAgregarItemSeccion2() {
        header('Content-type: application/json; charset=utf-8');
        $datos = $this->model->modalAgregarItemSeccion2();
        echo json_encode($datos);
    }

    public function frmAgregarIndexSeccionItem2() {
        header('Content-type: application/json; charset=utf-8');
        $datos = array(
            'titulo' => (!empty($_POST['titulo'])) ? $this->helper->cleanInput($_POST['titulo']) : NULL,
            'contenido' => (!empty($_POST['contenido'])) ? $this->helper->cleanInput($_POST['contenido']) : NULL,
            'fontawesome' => (!empty($_POST['fontawesome'])) ? $this->helper->cleanInput($_POST['fontawesome']) : NULL,
            'orden' => (!empty($_POST['orden'])) ? $this->helper->cleanInput($_POST['orden']) : NULL,
            'estado' => (!empty($_POST['estado'])) ? $this->helper->cleanInput($_POST['estado']) : 0,
        );
        $data = $this->model->frmAgregarIndexSeccionItem2($datos);
        echo json_encode($data);
    }

    public function frmEditarIndexSeccion3() {
        header('Content-type: application/json; charset=utf-8');
        $data = array(
            'titulo' => (!empty($_POST['titulo'])) ? $this->helper->cleanInput($_POST['titulo']) : NULL,
            'subtitulo' => (!empty($_POST['subtitulo'])) ? $_POST['subtitulo'] : NULL,
            'descripcion' => (!empty($_POST['descripcion'])) ? $_POST['descripcion'] : NULL,
            'titulo_cuadro' => (!empty($_POST['titulo_cuadro'])) ? $_POST['titulo_cuadro'] : NULL,
            'descripcion_cuadro' => (!empty($_POST['descripcion_cuadro'])) ? $_POST['descripcion_cuadro'] : NULL,
            'estado' => (!empty($_POST['estado'])) ? $this->helper->cleanInput($_POST['estado']) : 0
        );
        $datos = $this->model->frmEditarIndexSeccion3($data);
        echo json_encode($datos);
    }

    public function frmEditarIndexSeccion4() {
        header('Content-type: application/json; charset=utf-8');
        $data = array(
            'titulo' => (!empty($_POST['titulo'])) ? $this->helper->cleanInput($_POST['titulo']) : NULL,
            'subtitulo' => (!empty($_POST['subtitulo'])) ? $_POST['subtitulo'] : NULL,
            'descripcion' => (!empty($_POST['descripcion'])) ? $_POST['descripcion'] : NULL,
            'estado' => (!empty($_POST['estado'])) ? $this->helper->cleanInput($_POST['estado']) : 0
        );
        $datos = $this->model->frmEditarIndexSeccion4($data);
        echo json_encode($datos);
    }
    
    public function frmEditarIndexSeccion5() {
        header('Content-type: application/json; charset=utf-8');
        $data = array(
            'titulo' => (!empty($_POST['titulo'])) ? $this->helper->cleanInput($_POST['titulo']) : NULL,
            'subtitulo' => (!empty($_POST['subtitulo'])) ? $_POST['subtitulo'] : NULL,
            'estado' => (!empty($_POST['estado'])) ? $this->helper->cleanInput($_POST['estado']) : 0
        );
        $datos = $this->model->frmEditarIndexSeccion5($data);
        echo json_encode($datos);
    }

    public function uploadImgSeccion3() {
        if (!empty($_POST)) {
            $error = false;
            $error = false;
            $absolutedir = dirname(__FILE__);
            $dir = 'public/images/';
            $serverdir = $dir;
            $tmp = explode(',', $_POST['file']);
            $file = base64_decode($tmp[1]);
            $ext = explode('.', $_POST['filename']);
            $extension = strtolower(end($ext));
            $name = $_POST['name'];
            $filename = $this->helper->cleanUrl($name);
            $filename = $filename . '.' . $extension;
            $handle = fopen($serverdir . $filename, 'w');
            fwrite($handle, $file);
            fclose($handle);
            #############
            #SE REDIMENSIONA LA IMAGEN
            #############
            # ruta de la imagen a redimensionar 
            $imagen = $serverdir . $filename;
            # ruta de la imagen final, si se pone el mismo nombre que la imagen, esta se sobreescribe 
            $imagen_final = $filename;
            $ancho = 600;
            $alto = 825;
            $this->helper->redimensionar($imagen, $imagen_final, $ancho, $alto, $serverdir);

            #############
            header('Content-type: application/json; charset=utf-8');
            $data = array(
                'imagen' => $filename
            );
            $response = $this->model->uploadImgSeccion3($data);
            echo json_encode($response);
        }
    }

    public function uploadImgSeccion4() {
        if (!empty($_POST)) {
            $error = false;
            $error = false;
            $absolutedir = dirname(__FILE__);
            $dir = 'public/images/';
            $serverdir = $dir;
            $tmp = explode(',', $_POST['file']);
            $file = base64_decode($tmp[1]);
            $ext = explode('.', $_POST['filename']);
            $extension = strtolower(end($ext));
            $name = $_POST['name'];
            $filename = $this->helper->cleanUrl($name);
            $filename = $filename . '.' . $extension;
            $handle = fopen($serverdir . $filename, 'w');
            fwrite($handle, $file);
            fclose($handle);
            #############
            #SE REDIMENSIONA LA IMAGEN
            #############
            # ruta de la imagen a redimensionar 
            $imagen = $serverdir . $filename;
            # ruta de la imagen final, si se pone el mismo nombre que la imagen, esta se sobreescribe 
            $imagen_final = $filename;
            $ancho = 900;
            $alto = 585;
            $this->helper->redimensionar($imagen, $imagen_final, $ancho, $alto, $serverdir);

            #############
            header('Content-type: application/json; charset=utf-8');
            $data = array(
                'imagen' => $filename
            );
            $response = $this->model->uploadImgSeccion4($data);
            echo json_encode($response);
        }
    }

}
