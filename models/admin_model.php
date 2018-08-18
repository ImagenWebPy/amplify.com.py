<?php

class Admin_Model extends Model {

    function __construct() {
        parent::__construct();
    }

    public function cambiarEstado($datos) {
        $id = $datos['id'];
        $tabla = $datos['tabla'];
        $campo = $datos['campo'];
        $seccion = $datos['seccion'];
        $estado = $datos['estado'];
        #Actualizamos el estado de acuerdo al valor actual
        if ($estado == 1)
            $newEstado = 0;
        else
            $newEstado = 1;
        $update = array(
            $campo => $newEstado
        );
        $this->db->update($tabla, $update, "id = $id");
        $data = array(
            'type' => 'success',
            'content' => $this->rowDataTable($seccion, $tabla, $id)
        );
        return $data;
    }

    public function listadoDTSlider() {
        $sql = $this->db->select("SELECT * FROM slider ORDER BY orden ASC;");
        $datos = array();
        foreach ($sql as $item) {
            $id = $item['id'];
            if ($item['estado'] == 1) {
                $estado = '<a class="pointer btnCambiarEstado" data-seccion="slider" data-rowid="slider_" data-tabla="slider" data-campo="estado" data-id="' . $id . '" data-estado="1"><span class="label label-primary">Activo</span></a>';
            } else {
                $estado = '<a class="pointer btnCambiarEstado" data-seccion="slider" data-rowid="slider_" data-tabla="slider" data-campo="estado" data-id="' . $id . '" data-estado="0"><span class="label label-danger">Inactivo</span></a>';
            }
            $btnEditar = '<a class="editDTContenido pointer btn-xs" data-id="' . $id . '" data-url="modalEditarDTSlider"><i class="fa fa-edit"></i> Editar </a>';
            if (!empty($item['imagen'])) {
                $img = '<img src="' . URL . 'public/images/slider/' . $item['imagen'] . '" style="width: 160px;">';
            } else {
                $img = '-';
            }
            array_push($datos, array(
                "DT_RowId" => "slider_$id",
                'orden' => $item['orden'],
                'imagen' => $img,
                'titulo' => utf8_encode($item['titulo']),
                'texto_complementario' => utf8_encode($item['texto_complementario']),
                'estado' => $estado,
                'editar' => $btnEditar
            ));
        }
        $json = '{"data": ' . json_encode($datos) . '}';
        return $json;
    }

    private function rowDataTable($seccion, $tabla, $id) {
//$sql = $this->db->select("SELECT * FROM $tabla WHERE id = $id;");
        $data = '';
        switch ($tabla) {
            case 'usuario':
                $sql = $this->db->select("SELECT wa.nombre, wa.email, wr.descripcion as rol, wa.estado
                                        FROM usuario wa
                                        LEFT JOIN usuario_rol wr on wr.id = wa.id_usuario_rol WHERE wa.id = $id;");
                break;
            case 'meta_tags':
                $sql = $this->db->select("SELECT
                                                m.es_texto,
                                                en_texto
                                        FROM
                                                meta_tags mt
                                        LEFT JOIN menu m ON m.id = mt.id_menu WHERE mt.id = $id;");
                break;
            default :
                $sql = $this->db->select("SELECT * FROM $tabla WHERE id = $id;");
                break;
        }
        switch ($seccion) {
            case 'slider':
                if ($sql[0]['estado'] == 1) {
                    $estado = '<a class="pointer btnCambiarEstado" data-seccion="slider" data-rowid="slider_" data-tabla="slider" data-campo="estado" data-id="' . $id . '" data-estado="1"><span class="label label-primary">Activo</span></a>';
                } else {
                    $estado = '<a class="pointer btnCambiarEstado" data-seccion="slider" data-rowid="slider_" data-tabla="slider" data-campo="estado" data-id="' . $id . '" data-estado="0"><span class="label label-danger">Inactivo</span></a>';
                }
                $btnEditar = '<a class="editDTContenido pointer btn-xs" data-id="' . $id . '" data-url="modalEditarDTSlider"><i class="fa fa-edit"></i> Editar </a>';
                if (!empty($sql[0]['imagen'])) {
                    $img = '<img src="' . URL . 'public/images/slider/' . $sql[0]['imagen'] . '" style="width: 160px;">';
                } else {
                    $img = '';
                }
                $data = '<td>' . $sql[0]['orden'] . '</td>'
                        . '<td>' . $img . '</td>'
                        . '<td>' . utf8_encode($sql[0]['titulo']) . '</td>'
                        . '<td>' . utf8_encode($sql[0]['texto_complementario']) . '</td>'
                        . '<td>' . $estado . '</td>'
                        . '<td>' . $btnEditar . '</td>';
                break;
            case 'seccion2':
                if ($sql[0]['estado'] == 1) {
                    $estado = '<a class="pointer btnCambiarEstado" data-seccion="seccion2" data-rowid="seccion2_" data-tabla="index_seccion_2" data-campo="estado" data-id="' . $id . '" data-estado="1"><span class="label label-primary">Activo</span></a>';
                } else {
                    $estado = '<a class="pointer btnCambiarEstado" data-seccion="seccion2" data-rowid="seccion2_" data-tabla="index_seccion_2" data-campo="estado" data-id="' . $id . '" data-estado="0"><span class="label label-danger">Inactivo</span></a>';
                }
                $btnEditar = '<a class="editDTContenido pointer btn-xs" data-id="' . $id . '" data-url="modalEditarDTSeccion2"><i class="fa fa-edit"></i> Editar </a>';
                $data = '<td>' . $sql[0]['orden'] . '</td>'
                        . '<td>' . utf8_encode($sql[0]['titulo']) . '</td>'
                        . '<td>' . $estado . '</td>'
                        . '<td>' . $btnEditar . '</td>';
                break;
            case 'ubicaciones':
                if ($sql[0]['estado'] == 1) {
                    $estado = '<a class="pointer btnCambiarEstado" data-seccion="ubicaciones" data-rowid="ubicaciones_" data-tabla="cobertura_ubicaciones" data-campo="estado" data-id="' . $id . '" data-estado="1"><span class="label label-primary">Activo</span></a>';
                } else {
                    $estado = '<a class="pointer btnCambiarEstado" data-seccion="ubicaciones" data-rowid="ubicaciones_" data-tabla="cobertura_ubicaciones" data-campo="estado" data-id="' . $id . '" data-estado="0"><span class="label label-danger">Inactivo</span></a>';
                }
                $principal = '';
                if ($sql[0]['principal'] == 1) {
                    $principal = '<span class="label label-warning">Principal</span>';
                }
                $btnEditar = '<a class="editDTContenido pointer btn-xs" data-id="' . $id . '" data-url="modalEditarDTUbicaciones"><i class="fa fa-edit"></i> Editar </a>';
                $data = '<td class="sorting_1">' . utf8_encode($sql[0]['id']) . '</td>'
                        . '<td>' . strip_tags(utf8_encode($sql[0]['descripcion'])) . '</td>'
                        . '<td>' . utf8_encode($sql[0]['latitud']) . '</td>'
                        . '<td>' . utf8_encode($sql[0]['longitud']) . '</td>'
                        . '<td>' . $principal . '</td>'
                        . '<td>' . $estado . '</td>'
                        . '<td>' . $btnEditar . '</td>';
                break;
            case 'verContacto':
                if ($sql[0]['leido'] == 1) {
                    $estado = '<span class="label label-primary">Leído</span>';
                } else {
                    $estado = '<span class="label label-danger">No Leído</span>';
                }
                $btnEditar = '<a class="btnVerContacto pointer btn-xs" data-id="' . $id . '" data-url="modalVerContacto"><i class="fa fa-edit"></i> Ver Datos </a>';
                $data = '<td class="sorting_1">' . $id . '</td>'
                        . '<td>' . utf8_encode($sql[0]['nombre']) . '</td>'
                        . '<td>' . utf8_encode($sql[0]['email']) . '</td>'
                        . '<td>' . date('d-m-Y H:i:s', strtotime($sql[0]['nombre'])) . '</td>'
                        . '<td>' . $estado . '</td>'
                        . '<td>' . $btnEditar . '</td>';
                break;
        }
        return $data;
    }

    public function modalEditarDTSlider($datos) {
        $id = $datos['id'];
        $sql = $this->db->select("select * from slider where id = $id");
        $checked = ($sql[0]['estado'] == 1) ? 'checked' : '';
        $modal = '<div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Modificar Datos del Slider</h3>
                    </div>
                    <div class="row">
                        <form role="form" id="frmEditarSlider" method="POST">
                            <input type="hidden" name="id" value="' . $id . '">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Orden</label>
                                        <input type="text" name="orden" class="form-control" placeholder="Orden" value="' . utf8_encode($sql[0]['orden']) . '">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="i-checks"><label> <input type="checkbox" name="estado" value="1" ' . $checked . '> <i></i> Mostrar </label></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Titulo</label>
                                        <input type="text" name="titulo" class="form-control" value="' . utf8_encode($sql[0]['titulo']) . '">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Texto Complementario</label>
                                        <input type="text" name="texto_complementario" class="form-control" value="' . utf8_encode($sql[0]['texto_complementario']) . '">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Texto Botón</label>
                                        <input type="text" name="texto_boton" class="form-control" value="' . utf8_encode($sql[0]['texto_boton']) . '">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Enlace</label>
                                        <input type="text" name="enlace" class="form-control" placeholder="Enlace" value="' . utf8_encode($sql[0]['enlace']) . '">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-block btn-primary btn-lg">Editar Contenido</button>
                                </div>
                            </div>
                        </form>
                        <hr>
                        <div class="col-md-12">
                            <h3>Imagen</h3>
                            <div class="alert alert-info alert-dismissable">
                                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                Detalles de la imagen a subir:<br>
                                -Formato: JPG,PNG (La imagen principal tiene que ser PNG transparente)<br>
                                -Dimensión: Imagen Normal: 1800 x 800<br>
                                -Tamaño: Hasta 2MB<br>
                                <strong>Obs.: Las imagenes serán redimensionadas automaticamente a la dimensión especificada y se reducirá la calidad de la misma.</strong>
                            </div>
                            <div class="html5fileupload fileSlider" data-max-filesize="2048000" data-url="' . URL . '/admin/uploadImgSlider" data-valid-extensions="JPG,JPEG,jpg,png,jpeg,PNG" style="width: 100%;">
                                <input type="file" name="file_archivo" />
                            </div>
                            <script>
                                $(".html5fileupload.fileSlider").html5fileupload({
                                    data: {id: ' . $id . '},
                                    onAfterStartSuccess: function (response) {
                                        $("#imgSlider" + response.id).html(response.content);
                                        $("#slider_" + response.id).html(response.row);
                                    }
                                });
                            </script>
                        </div>
                        <div class="col-md-12" id="imgSlider' . $id . '">';
        if (!empty($sql[0]['imagen'])) {
            $modal .= '     <img class="img-responsive" src="' . URL . 'public/images/slider/' . $sql[0]['imagen'] . '">';
        }
        $modal .= '     </div>
                    </div>
                </div>
                <script>
                    $(document).ready(function () {
                        $(".i-checks").iCheck({
                            checkboxClass: "icheckbox_square-green",
                            radioClass: "iradio_square-green",
                        });
                    });
                </script>';
        $data = array(
            'titulo' => 'Editar Slider',
            'content' => $modal
        );
        return json_encode($data);
    }

    public function editar_img_pantallas_led($datos) {
        $id = $datos['id'];
        $sql = $this->db->select("SELECT * FROM `pantallas_led_img` where id = $id");
        $checked = ($sql[0]['estado'] == 1) ? 'checked' : '';
        $modal = '<div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Modificar Datos de la imagen</h3>
                    </div>
                    <div class="row">
                        <form role="form" id="frmEditarImagenesPantallasLed" method="POST">
                            <input type="hidden" name="id" value="' . $id . '">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Orden</label>
                                        <input type="text" name="orden" class="form-control" placeholder="Orden" value="' . utf8_encode($sql[0]['orden']) . '">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="i-checks"><label> <input type="checkbox" name="estado" value="1" ' . $checked . '> <i></i> Mostrar </label></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Descripción</label>
                                        <input type="text" name="descripcion" class="form-control" value="' . utf8_encode($sql[0]['descripcion']) . '">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-block btn-primary btn-lg">Editar Contenido</button>
                                </div>
                            </div>
                        </form>
                        <hr>
                        <div class="col-md-12">
                            <h3>Imagen</h3>
                            <div class="alert alert-info alert-dismissable">
                                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                Detalles de la imagen a subir:<br>
                                -Formato: JPG,PNG<br>
                                -Dimensión: Imagen Normal: 800 x 650<br>
                                -Tamaño: Hasta 2MB<br>
                                <strong>Obs.: Las imagenes serán redimensionadas automaticamente a la dimensión especificada y se reducirá la calidad de la misma.</strong>
                            </div>
                            <div class="html5fileupload fileSlider" data-max-filesize="2048000" data-url="' . URL . '/admin/uploadImgPantallaLed" data-valid-extensions="JPG,JPEG,jpg,png,jpeg,PNG" style="width: 100%;">
                                <input type="file" name="file_archivo" />
                            </div>
                            <script>
                                $(".html5fileupload.fileSlider").html5fileupload({
                                    data: {id: ' . $id . '},
                                    onAfterStartSuccess: function (response) {
                                        $("#imgsPantallasLed" + response.id).html(response.imagen);
                                        $("#imagenGaleria" + response.id).html(response.content);
                                    }
                                });
                            </script>
                        </div>
                        <div class="col-md-12" id="imgsPantallasLed' . $id . '">';
        if (!empty($sql[0]['imagen'])) {
            $modal .= '     <img class="img-responsive" src="' . URL . 'public/images/pantallas_led/' . $sql[0]['imagen'] . '">';
        }
        $modal .= '     </div>
                    </div>
                </div>
                <script>
                    $(document).ready(function () {
                        $(".i-checks").iCheck({
                            checkboxClass: "icheckbox_square-green",
                            radioClass: "iradio_square-green",
                        });
                    });
                </script>';
        $data = array(
            'titulo' => 'Editar Slider',
            'content' => $modal
        );
        return json_encode($data);
    }

    public function editar_img_buses($datos) {
        $id = $datos['id'];
        $sql = $this->db->select("SELECT * FROM `buses_img` where id = $id");
        $checked = ($sql[0]['estado'] == 1) ? 'checked' : '';
        $modal = '<div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Modificar Datos de la imagen</h3>
                    </div>
                    <div class="row">
                        <form role="form" id="frmEditarImagenesBuses" method="POST">
                            <input type="hidden" name="id" value="' . $id . '">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Orden</label>
                                        <input type="text" name="orden" class="form-control" placeholder="Orden" value="' . utf8_encode($sql[0]['orden']) . '">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="i-checks"><label> <input type="checkbox" name="estado" value="1" ' . $checked . '> <i></i> Mostrar </label></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Descripción</label>
                                        <input type="text" name="descripcion" class="form-control" value="' . utf8_encode($sql[0]['descripcion']) . '">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-block btn-primary btn-lg">Editar Contenido</button>
                                </div>
                            </div>
                        </form>
                        <hr>
                        <div class="col-md-12">
                            <h3>Imagen</h3>
                            <div class="alert alert-info alert-dismissable">
                                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                Detalles de la imagen a subir:<br>
                                -Formato: JPG,PNG<br>
                                -Dimensión: Imagen Normal: 800 x 650<br>
                                -Tamaño: Hasta 2MB<br>
                                <strong>Obs.: Las imagenes serán redimensionadas automaticamente a la dimensión especificada y se reducirá la calidad de la misma.</strong>
                            </div>
                            <div class="html5fileupload fileEditarBuses" data-max-filesize="2048000" data-url="' . URL . '/admin/uploadImgBuses" data-valid-extensions="JPG,JPEG,jpg,png,jpeg,PNG" style="width: 100%;">
                                <input type="file" name="file_archivo" />
                            </div>
                            <script>
                                $(".html5fileupload.fileEditarBuses").html5fileupload({
                                    data: {id: ' . $id . '},
                                    onAfterStartSuccess: function (response) {
                                        $("#imgsBuses" + response.id).html(response.imagen);
                                        $("#imagenGaleria" + response.id).html(response.content);
                                    }
                                });
                            </script>
                        </div>
                        <div class="col-md-12" id="imgsBuses' . $id . '">';
        if (!empty($sql[0]['imagen'])) {
            $modal .= '     <img class="img-responsive" src="' . URL . 'public/images/buses/' . $sql[0]['imagen'] . '">';
        }
        $modal .= '     </div>
                    </div>
                </div>
                <script>
                    $(document).ready(function () {
                        $(".i-checks").iCheck({
                            checkboxClass: "icheckbox_square-green",
                            radioClass: "iradio_square-green",
                        });
                    });
                </script>';
        $data = array(
            'titulo' => 'Editar Slider',
            'content' => $modal
        );
        return json_encode($data);
    }

    public function editar_img_iconicos($datos) {
        $id = $datos['id'];
        $sql = $this->db->select("SELECT * FROM `iconicos_img` where id = $id");
        $checked = ($sql[0]['estado'] == 1) ? 'checked' : '';
        $modal = '<div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Modificar Datos de la imagen</h3>
                    </div>
                    <div class="row">
                        <form role="form" id="frmEditarImagenesIconicos" method="POST">
                            <input type="hidden" name="id" value="' . $id . '">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Orden</label>
                                        <input type="text" name="orden" class="form-control" placeholder="Orden" value="' . utf8_encode($sql[0]['orden']) . '">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="i-checks"><label> <input type="checkbox" name="estado" value="1" ' . $checked . '> <i></i> Mostrar </label></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Descripción</label>
                                        <input type="text" name="descripcion" class="form-control" value="' . utf8_encode($sql[0]['descripcion']) . '">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-block btn-primary btn-lg">Editar Contenido</button>
                                </div>
                            </div>
                        </form>
                        <hr>
                        <div class="col-md-12">
                            <h3>Imagen</h3>
                            <div class="alert alert-info alert-dismissable">
                                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                Detalles de la imagen a subir:<br>
                                -Formato: JPG,PNG<br>
                                -Dimensión: Imagen Normal: 800 x 650<br>
                                -Tamaño: Hasta 2MB<br>
                                <strong>Obs.: Las imagenes serán redimensionadas automaticamente a la dimensión especificada y se reducirá la calidad de la misma.</strong>
                            </div>
                            <div class="html5fileupload fileIconicosAgregar" data-max-filesize="2048000" data-url="' . URL . '/admin/uploadImgIconicos" data-valid-extensions="JPG,JPEG,jpg,png,jpeg,PNG" style="width: 100%;">
                                <input type="file" name="file_archivo" />
                            </div>
                            <script>
                                $(".html5fileupload.fileIconicosAgregar").html5fileupload({
                                    data: {id: ' . $id . '},
                                    onAfterStartSuccess: function (response) {
                                        $("#imgsIconicosAgregar" + response.id).html(response.imagen);
                                        $("#imagenGaleria" + response.id).html(response.content);
                                    }
                                });
                            </script>
                        </div>
                        <div class="col-md-12" id="imgsIconicosAgregar' . $id . '">';
        if (!empty($sql[0]['imagen'])) {
            $modal .= '     <img class="img-responsive" src="' . URL . 'public/images/iconicos/' . $sql[0]['imagen'] . '">';
        }
        $modal .= '     </div>
                    </div>
                </div>
                <script>
                    $(document).ready(function () {
                        $(".i-checks").iCheck({
                            checkboxClass: "icheckbox_square-green",
                            radioClass: "iradio_square-green",
                        });
                    });
                </script>';
        $data = array(
            'titulo' => 'Editar Icónicos',
            'content' => $modal
        );
        return json_encode($data);
    }

    public function editar_img_carteles_tradicionales($datos) {
        $id = $datos['id'];
        $sql = $this->db->select("SELECT * FROM `carteles_tradicionales_img` where id = $id");
        $checked = ($sql[0]['estado'] == 1) ? 'checked' : '';
        $modal = '<div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Modificar Datos de la imagen</h3>
                    </div>
                    <div class="row">
                        <form role="form" id="frmEditarImagenesCartelesTradicionales" method="POST">
                            <input type="hidden" name="id" value="' . $id . '">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Orden</label>
                                        <input type="text" name="orden" class="form-control" placeholder="Orden" value="' . utf8_encode($sql[0]['orden']) . '">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="i-checks"><label> <input type="checkbox" name="estado" value="1" ' . $checked . '> <i></i> Mostrar </label></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Descripción</label>
                                        <input type="text" name="descripcion" class="form-control" value="' . utf8_encode($sql[0]['descripcion']) . '">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-block btn-primary btn-lg">Editar Contenido</button>
                                </div>
                            </div>
                        </form>
                        <hr>
                        <div class="col-md-12">
                            <h3>Imagen</h3>
                            <div class="alert alert-info alert-dismissable">
                                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                Detalles de la imagen a subir:<br>
                                -Formato: JPG,PNG<br>
                                -Dimensión: Imagen Normal: 800 x 650<br>
                                -Tamaño: Hasta 2MB<br>
                                <strong>Obs.: Las imagenes serán redimensionadas automaticamente a la dimensión especificada y se reducirá la calidad de la misma.</strong>
                            </div>
                            <div class="html5fileupload fileSlider" data-max-filesize="2048000" data-url="' . URL . '/admin/uploadImgCartelesTradicionales" data-valid-extensions="JPG,JPEG,jpg,png,jpeg,PNG" style="width: 100%;">
                                <input type="file" name="file_archivo" />
                            </div>
                            <script>
                                $(".html5fileupload.fileSlider").html5fileupload({
                                    data: {id: ' . $id . '},
                                    onAfterStartSuccess: function (response) {
                                        $("#imgsCartelesTradicionales" + response.id).html(response.imagen);
                                        $("#imagenGaleria" + response.id).html(response.content);
                                    }
                                });
                            </script>
                        </div>
                        <div class="col-md-12" id="imgsCartelesTradicionales' . $id . '">';
        if (!empty($sql[0]['imagen'])) {
            $modal .= '     <img class="img-responsive" src="' . URL . 'public/images/carteles_tradicionales/' . $sql[0]['imagen'] . '">';
        }
        $modal .= '     </div>
                    </div>
                </div>
                <script>
                    $(document).ready(function () {
                        $(".i-checks").iCheck({
                            checkboxClass: "icheckbox_square-green",
                            radioClass: "iradio_square-green",
                        });
                    });
                </script>';
        $data = array(
            'titulo' => 'Editar Carteles Tradicionales',
            'content' => $modal
        );
        return json_encode($data);
    }

    public function frmEditarSlider($datos) {
        $id = $datos['id'];
        $estado = 1;
        if (empty($datos['estado'])) {
            $estado = 0;
        }
        $update = array(
            'enlace' => utf8_decode($datos['enlace']),
            'texto_boton' => utf8_decode($datos['texto_boton']),
            'titulo' => utf8_decode($datos['titulo']),
            'texto_complementario' => utf8_decode($datos['texto_complementario']),
            'orden' => $datos['orden'],
            'estado' => $estado
        );
        $this->db->update('slider', $update, "id = $id");
        $data = array(
            'type' => 'success',
            'id' => $id,
            'content' => $this->rowDataTable('slider', 'slider', $id),
            'message' => 'Se ha actualizado el contenido del slider'
        );
        return $data;
    }

    public function frmEditarCoberturaUbicacion($datos) {
        $id = $datos['id'];
        $update = array(
            'latitud' => utf8_decode($datos['latitud']),
            'longitud' => utf8_decode($datos['longitud']),
            'descripcion' => utf8_decode($datos['descripcion']),
            'principal' => $datos['principal'],
            'estado' => $datos['estado']
        );
        $this->db->update('cobertura_ubicaciones', $update, "id = $id");
        $data = array(
            'type' => 'success',
            'id' => $id,
            'content' => $this->rowDataTable('ubicaciones', 'cobertura_ubicaciones', $id),
            'message' => 'Se ha actualizado el contenido de la ubicación'
        );
        return $data;
    }

    public function uploadImgSlider($datos) {
        $id = $datos['id'];
        $update = array(
            'imagen' => $datos['imagen']
        );
        $this->db->update('slider', $update, "id = $id");
        $contenido = '<img class="img-responsive" src="' . URL . 'public/images/slider/' . $datos['imagen'] . '">';
        $data = array(
            "result" => true,
            'id' => $id,
            'content' => $contenido,
            'row' => $this->rowDataTable('slider', 'slider', $id)
        );
        return $data;
    }

    public function unlinkImagenSlider($id) {
        $sql = $this->db->select("select imagen from slider where id = $id");
        $dir = 'public/images/slider/';
        if (!empty($sql)) {
            if (file_exists($dir . $sql[0]['imagen'])) {
                unlink($dir . $sql[0]['imagen']);
            }
        }
    }

    public function unlinkImagenPantallasLed($id) {
        $sql = $this->db->select("select imagen from pantallas_led_img where id = $id");
        $dir = 'public/images/pantallas_led/';
        if (!empty($sql)) {
            if (file_exists($dir . $sql[0]['imagen'])) {
                unlink($dir . $sql[0]['imagen']);
            }
        }
    }

    public function unlinkImagenBuses($id) {
        $sql = $this->db->select("select imagen from buses_img where id = $id");
        $dir = 'public/images/buses/';
        if (!empty($sql)) {
            if (file_exists($dir . $sql[0]['imagen'])) {
                unlink($dir . $sql[0]['imagen']);
            }
        }
    }

    public function unlinkImagenIconicos($id) {
        $sql = $this->db->select("select imagen from iconicos_img where id = $id");
        $dir = 'public/images/iconicos/';
        if (!empty($sql)) {
            if (file_exists($dir . $sql[0]['imagen'])) {
                unlink($dir . $sql[0]['imagen']);
            }
        }
    }

    public function unlinkImagenCartelesTradicionales($id) {
        $sql = $this->db->select("select imagen from carteles_tradicionales_img where id = $id");
        $dir = 'public/images/carteles_tradicionales/';
        if (!empty($sql)) {
            if (file_exists($dir . $sql[0]['imagen'])) {
                unlink($dir . $sql[0]['imagen']);
            }
        }
    }

    public function modalAgregarSlider() {
        $modal = '<div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Agregar Slider</h3>
                    </div>
                    <div class="row">
                        <form role="form" action="' . URL . '/admin/frmAgregarSlider" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Orden</label>
                                        <input type="text" name="orden" class="form-control" placeholder="Orden" value="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="i-checks"><label> <input type="checkbox" name="estado" value="1"> <i></i> Mostrar </label></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Titulo</label>
                                        <input type="text" name="titulo" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Texto Complementario</label>
                                        <input type="text" name="texto_complementario" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Texto Botón</label>
                                        <input type="text" name="es_boton" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Enlace</label>
                                        <input type="text" name="enlace" class="form-control" placeholder="Enlace" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <h3>Imagen</h3>
                                    <div class="alert alert-info alert-dismissable">
                                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                        Detalles de la imagen a subir:<br>
                                        -Formato: JPG,PNG<br>
                                        -Dimensión: Imagen Normal: 1800 x 800<br>
                                        -Tamaño: Hasta 2MB<br>
                                        <strong>Obs.: Las imagenes serán redimensionadas automaticamente a la dimensión especificada y se reducirá la calidad de la misma.</strong>
                                    </div>
                                    <div class="html5fileupload fileAgregarSlider" data-form="true" data-max-filesize="2048000"  data-valid-extensions="JPG,JPEG,jpg,png,jpeg,PNG" style="width: 100%;">
                                        <input type="file" name="file_archivo" />
                                    </div>
                                    <script>
                                        $(".html5fileupload.fileAgregarSlider").html5fileupload();
                                    </script>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-block btn-primary btn-lg">Agregar Slider</button>
                        </form>
                    </div>
                </div>
                <script>
                    $(document).ready(function () {
                        $(".i-checks").iCheck({
                            checkboxClass: "icheckbox_square-green",
                            radioClass: "iradio_square-green",
                        });
                    });
                </script>';
        $data = array(
            'titulo' => 'Agregar Slider',
            'content' => $modal
        );
        return $data;
    }

    public function frmAgregarSlider($datos) {
        $this->db->insert('slider', array(
            'titulo' => utf8_decode($datos['titulo']),
            'texto_complementario' => utf8_decode($datos['texto_complementario']),
            'texto_boton' => utf8_decode($datos['texto_boton']),
            'enlace' => utf8_decode($datos['enlace']),
            'orden' => $datos['orden'],
            'estado' => $datos['estado']
        ));
        $id = $this->db->lastInsertId();
        return $id;
    }

    public function frmAgregarImgPantallasLed($datos) {
        $this->db->insert('pantallas_led_img', array(
            'orden' => utf8_decode($datos['orden']),
            'descripcion' => utf8_decode($datos['descripcion']),
            'estado' => $datos['estado']
        ));
        $id = $this->db->lastInsertId();
        return $id;
    }

    public function frmAgregarImgBuses($datos) {
        $this->db->insert('buses_img', array(
            'orden' => utf8_decode($datos['orden']),
            'descripcion' => utf8_decode($datos['descripcion']),
            'estado' => $datos['estado']
        ));
        $id = $this->db->lastInsertId();
        return $id;
    }

    public function frmAgregarImgIconicos($datos) {
        $this->db->insert('iconicos_img', array(
            'orden' => utf8_decode($datos['orden']),
            'descripcion' => utf8_decode($datos['descripcion']),
            'estado' => $datos['estado']
        ));
        $id = $this->db->lastInsertId();
        return $id;
    }

    public function frmAgregarImgCartelesTradicionales($datos) {
        $this->db->insert('carteles_tradicionales_img', array(
            'id_carteles_tradicionales' => utf8_decode($datos['id_carteles_tradicionales']),
            'orden' => utf8_decode($datos['orden']),
            'descripcion' => utf8_decode($datos['descripcion']),
            'estado' => $datos['estado']
        ));
        $id = $this->db->lastInsertId();
        return $id;
    }

    public function frmAddSliderImg($imagenes) {
        $id = $imagenes['id'];
        $update = array(
            'imagen' => $imagenes['imagenes']
        );
        $this->db->update('slider', $update, "id = $id");
    }

    public function frmAddImgPantallasLed($imagenes) {
        $id = $imagenes['id'];
        $update = array(
            'imagen' => $imagenes['imagenes']
        );
        $this->db->update('pantallas_led_img', $update, "id = $id");
    }

    public function frmAddImgBuses($imagenes) {
        $id = $imagenes['id'];
        $update = array(
            'imagen' => $imagenes['imagenes']
        );
        $this->db->update('buses_img', $update, "id = $id");
    }

    public function frmAddImgIconicos($imagenes) {
        $id = $imagenes['id'];
        $update = array(
            'imagen' => $imagenes['imagenes']
        );
        $this->db->update('iconicos_img', $update, "id = $id");
    }

    public function frmAddImgCartelesTradicionales($imagenes) {
        $id = $imagenes['id'];
        $update = array(
            'imagen' => $imagenes['imagenes']
        );
        $this->db->update('carteles_tradicionales_img', $update, "id = $id");
    }

    public function datosSeccion($seccion) {
        $sql = $this->db->select("select * from index_seccion_" . $seccion . " where id = 1");
        return $sql[0];
    }

    public function frmEditarImagenesPantallasLed($datos) {
        $id = $datos['id'];
        $estado = 1;
        if (empty($datos['estado'])) {
            $estado = 0;
        }
        $update = array(
            'orden' => utf8_decode($datos['orden']),
            'descripcion' => utf8_decode($datos['descripcion']),
            'estado' => $estado
        );
        $this->db->update('pantallas_led_img', $update, "id = $id");
        $data = array(
            'type' => 'success',
            'content' => 'Se ha actualizado el contenido de la imagen'
        );
        return $data;
    }

    public function frmEditarImagenesBuses($datos) {
        $id = $datos['id'];
        $estado = 1;
        if (empty($datos['estado'])) {
            $estado = 0;
        }
        $update = array(
            'orden' => utf8_decode($datos['orden']),
            'descripcion' => utf8_decode($datos['descripcion']),
            'estado' => $estado
        );
        $this->db->update('buses_img', $update, "id = $id");
        $data = array(
            'type' => 'success',
            'content' => 'Se ha actualizado el contenido de la imagen'
        );
        return $data;
    }

    public function frmEditarImagenesIconicos($datos) {
        $id = $datos['id'];
        $estado = 1;
        if (empty($datos['estado'])) {
            $estado = 0;
        }
        $update = array(
            'orden' => utf8_decode($datos['orden']),
            'descripcion' => utf8_decode($datos['descripcion']),
            'estado' => $estado
        );
        $this->db->update('iconicos_img', $update, "id = $id");
        $data = array(
            'type' => 'success',
            'content' => 'Se ha actualizado el contenido de la imagen'
        );
        return $data;
    }

    public function frmEditarImagenesCartelesTradicionales($datos) {
        $id = $datos['id'];
        $estado = 1;
        if (empty($datos['estado'])) {
            $estado = 0;
        }
        $update = array(
            'orden' => utf8_decode($datos['orden']),
            'descripcion' => utf8_decode($datos['descripcion']),
            'estado' => $estado
        );
        $this->db->update('carteles_tradicionales_img', $update, "id = $id");
        $data = array(
            'type' => 'success',
            'content' => 'Se ha actualizado el contenido de la imagen'
        );
        return $data;
    }

    public function frmEditarIndexSeccion1($datos) {
        $id = 1;
        $estado = 1;
        if (empty($datos['estado'])) {
            $estado = 0;
        }
        $update = array(
            'titulo' => utf8_decode($datos['titulo']),
            'contenido' => utf8_decode($datos['contenido']),
            'estado' => $estado
        );
        $this->db->update('index_seccion_1', $update, "id = $id");
        $data = array(
            'type' => 'success',
            'mensaje' => 'Se ha actualizado el contenido de la sección 1'
        );
        return $data;
    }

    public function listadoDTSeccion2() {
        $sql = $this->db->select("SELECT * FROM index_seccion_2 ORDER BY orden ASC;");
        $datos = array();
        foreach ($sql as $item) {
            $id = $item['id'];
            if ($item['estado'] == 1) {
                $estado = '<a class="pointer btnCambiarEstado" data-seccion="seccion2" data-rowid="seccion2_" data-tabla="index_seccion_2" data-campo="estado" data-id="' . $id . '" data-estado="1"><span class="label label-primary">Activo</span></a>';
            } else {
                $estado = '<a class="pointer btnCambiarEstado" data-seccion="seccion2" data-rowid="seccion2_" data-tabla="index_seccion_2" data-campo="estado" data-id="' . $id . '" data-estado="0"><span class="label label-danger">Inactivo</span></a>';
            }
            $btnEditar = '<a class="editDTContenido pointer btn-xs" data-id="' . $id . '" data-url="modalEditarDTSeccion2"><i class="fa fa-edit"></i> Editar </a>';
            array_push($datos, array(
                "DT_RowId" => "seccion2_$id",
                'orden' => $item['orden'],
                'titulo' => utf8_encode($item['titulo']),
                'estado' => $estado,
                'editar' => $btnEditar
            ));
        }
        $json = '{"data": ' . json_encode($datos) . '}';
        return $json;
    }

    public function modalEditarDTSeccion2($datos) {
        $id = $datos['id'];
        $sql = $this->db->select("SELECT * FROM `index_seccion_2` where id = $id");
        $checked = "";
        if ($sql[0]['estado'] == 1)
            $checked = 'checked';
        $modal = '<div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Modificar Datos</h3>
                    </div>
                    <div class="row">
                        <form role="form" id="frmEditarIndexSeccion2" method="POST">
                            <input type="hidden" name="id" value="' . $id . '">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Titulo</label>
                                    <input type="text" name="titulo" class="form-control" value="' . utf8_encode($sql[0]['titulo']) . '">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Contenido</label>
                                    <textarea name="contenido" class="form-control">' . utf8_encode($sql[0]['contenido']) . '</textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Orden</label>
                                    <input type="text" name="orden" class="form-control" value="' . utf8_encode($sql[0]['orden']) . '">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="i-checks"><label> <input type="checkbox" name="estado" value="1" ' . $checked . '> <i></i> Mostrar </label></div>
                            </div>
                            <div class="col-md-12">
                                <div class="alert alert-info">
                                    Para cambiar el icono, tiene que buscar uno en la siguiente pagina <a href="https://fontawesome.com/icons" target="_blank">Font Awesome</a>. Ingrese al icono, busque el siguiente texto <br><strong>&#60;i class="fab fa-accessible-icon"&#62;&#60;/i&#62;</strong> y copie solamente lo que se encuentra dentro de la etiqueta class. Ej.<strong>fab fa-accessible-icon</strong>
                                </div>
                                <div class="form-group">
                                    <label>Font Awesome</label>
                                    <input type="text" name="fontawesome" class="form-control" value="' . utf8_encode($sql[0]['fontawesome']) . '">
                                </div>
                            </div>
                            <hr>
                            <div class="clearfix"></div>
                            <div class="btn-submit">
                                <button type="submit" class="btn btn-block btn-primary btn-lg">Editar Item</button>
                            </div>
                        </form>
                    </div>
                </div>
                <script>
                    $(document).ready(function () {
                        $(".i-checks").iCheck({
                            checkboxClass: "icheckbox_square-green"
                        });
                    });
                </script>';
        $data = array(
            'titulo' => 'Editar Item de la Seccion 2',
            'content' => $modal
        );
        return json_encode($data);
    }

    public function frmEditarIndexSeccion2($datos) {
        $id = $datos['id'];
        $estado = 1;
        if (empty($datos['estado'])) {
            $estado = 0;
        }
        $update = array(
            'titulo' => utf8_decode($datos['titulo']),
            'contenido' => utf8_decode($datos['contenido']),
            'fontawesome' => utf8_decode($datos['fontawesome']),
            'orden' => utf8_decode($datos['orden']),
            'estado' => $estado
        );
        $this->db->update('index_seccion_2', $update, "id = $id");
        $data = array(
            'type' => 'success',
            'content' => $this->rowDataTable('seccion2', 'index_seccion_2', $id),
            'mensaje' => 'Se ha actualizado el contenido del Item de la sección 2',
            'id' => $id
        );
        return $data;
    }

    public function modalAgregarItemSeccion2() {
        $modal = '<div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Agregar Datos</h3>
                    </div>
                    <div class="row">
                        <form role="form" id="frmAgregarIndexSeccionItem2" method="POST">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Titulo</label>
                                    <input type="text" name="titulo" class="form-control" value="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Contenido</label>
                                    <textarea name="contenido" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Orden</label>
                                    <input type="text" name="orden" class="form-control" value="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="i-checks"><label> <input type="checkbox" name="estado" value="1"> <i></i> Mostrar </label></div>
                            </div>
                            <div class="col-md-12">
                                <div class="alert alert-info">
                                    Para cambiar el icono, tiene que buscar uno en la siguiente pagina <a href="https://fontawesome.com/icons" target="_blank">Font Awesome</a>. Ingrese al icono, busque el siguiente texto <br><strong>&#60;i class="fab fa-accessible-icon"&#62;&#60;/i&#62;</strong> y copie solamente lo que se encuentra dentro de la etiqueta class. Ej.<strong>fab fa-accessible-icon</strong>
                                </div>
                                <div class="form-group">
                                    <label>Font Awesome</label>
                                    <input type="text" name="fontawesome" class="form-control" value="">
                                </div>
                            </div>
                            <hr>
                            <div class="clearfix"></div>
                            <div class="btn-submit">
                                <button type="submit" class="btn btn-block btn-primary btn-lg">Agregar Item</button>
                            </div>
                        </form>
                    </div>
                </div>
                <script>
                    $(document).ready(function () {
                        $(".i-checks").iCheck({
                            checkboxClass: "icheckbox_square-green"
                        });
                    });
                </script>';
        $data = array(
            'titulo' => 'Agregar Item',
            'content' => $modal
        );
        return $data;
    }

    public function frmAgregarIndexSeccionItem2($datos) {
        $this->db->insert('index_seccion_2', array(
            'titulo' => utf8_decode($datos['titulo']),
            'contenido' => utf8_decode($datos['contenido']),
            'fontawesome' => utf8_decode($datos['fontawesome']),
            'orden' => utf8_decode($datos['orden']),
            'estado' => (!empty($datos['estado'])) ? $datos['estado'] : 0
        ));
        $id = $this->db->lastInsertId();
        $sql = $this->db->select("select * from index_seccion_2 where id = $id");
        if ($sql[0]['estado'] == 1) {
            $estado = '<a class="pointer btnCambiarEstado" data-seccion="seccion2" data-rowid="seccion2_" data-tabla="index_seccion_2" data-campo="estado" data-id="' . $id . '" data-estado="1"><span class="label label-primary">Activo</span></a>';
        } else {
            $estado = '<a class="pointer btnCambiarEstado" data-seccion="seccion2" data-rowid="seccion2_" data-tabla="index_seccion_2" data-campo="estado" data-id="' . $id . '" data-estado="0"><span class="label label-danger">Inactivo</span></a>';
        }
        $btnEditar = '<a class="editDTContenido pointer btn-xs" data-id="' . $id . '" data-url="modalEditarDTSeccion2"><i class="fa fa-edit"></i> Editar </a>';
        $data = array(
            'type' => 'success',
            'content' => '<tr id="seccion2_' . $id . '" role="row" class="odd">'
            . '<td class="sorting_1">' . $sql[0]['orden'] . '</td>'
            . '<td>' . utf8_encode($sql[0]['titulo']) . '</td>'
            . '<td>' . $estado . '</td>'
            . '<td>' . $btnEditar . '</td>'
            . '</tr>',
            'mensaje' => 'Se ha agregado correctamente Item de la seccion 2'
        );
        return $data;
    }

    public function frmAgregarCoberturaUbicacion($datos) {
        $this->db->insert('cobertura_ubicaciones', array(
            'descripcion' => utf8_decode($datos['descripcion']),
            'latitud' => utf8_decode($datos['latitud']),
            'longitud' => utf8_decode($datos['longitud']),
            'principal' => $datos['principal'],
            'estado' => $datos['estado']
        ));
        $id = $this->db->lastInsertId();
        $sql = $this->db->select("select * from cobertura_ubicaciones where id = $id");
        if ($sql[0]['estado'] == 1) {
            $estado = '<a class="pointer btnCambiarEstado" data-seccion="ubicaciones" data-rowid="ubicaciones_" data-tabla="cobertura_ubicaciones" data-campo="estado" data-id="' . $id . '" data-estado="1"><span class="label label-primary">Activo</span></a>';
        } else {
            $estado = '<a class="pointer btnCambiarEstado" data-seccion="ubicaciones" data-rowid="ubicaciones_" data-tabla="cobertura_ubicaciones" data-campo="estado" data-id="' . $id . '" data-estado="0"><span class="label label-danger">Inactivo</span></a>';
        }
        $principal = '';
        if ($sql[0]['principal'] == 1) {
            $principal = '<span class="label label-warning">Principal</span>';
        }
        $btnEditar = '<a class="editDTContenido pointer btn-xs" data-id="' . $id . '" data-url="modalEditarDTUbicaciones"><i class="fa fa-edit"></i> Editar </a>';
        $data = array(
            'type' => 'success',
            'content' => '<tr id="ubicaciones_' . $id . '" role="row" class="even">'
            . '<td class="sorting_1">' . $id . '</td>'
            . '<td>' . strip_tags(utf8_encode($sql[0]['descripcion'])) . '</td>'
            . '<td>' . utf8_encode($sql[0]['latitud']) . '</td>'
            . '<td>' . utf8_encode($sql[0]['longitud']) . '</td>'
            . '<td>' . $principal . '</td>'
            . '<td>' . $estado . '</td>'
            . '<td>' . $btnEditar . '</td>'
            . '</tr>',
            'message' => 'Se ha agregado correctamente la ubcación'
        );
        return $data;
    }

    public function frmEditarIndexSeccion3($datos) {
        $id = 1;
        $estado = 1;
        if (empty($datos['estado'])) {
            $estado = 0;
        }
        $update = array(
            'titulo' => utf8_decode($datos['titulo']),
            'subtitulo' => utf8_decode($datos['subtitulo']),
            'descripcion' => utf8_decode($datos['descripcion']),
            'titulo_cuadro' => utf8_decode($datos['titulo_cuadro']),
            'descripcion_cuadro' => utf8_decode($datos['descripcion_cuadro']),
            'estado' => $estado
        );
        $this->db->update('index_seccion_3', $update, "id = $id");
        $data = array(
            'type' => 'success',
            'mensaje' => 'Se ha actualizado el contenido de la sección 3'
        );
        return $data;
    }

    public function frmEditarIndexSeccion4($datos) {
        $id = 1;
        $estado = 1;
        if (empty($datos['estado'])) {
            $estado = 0;
        }
        $update = array(
            'titulo' => utf8_decode($datos['titulo']),
            'subtitulo' => utf8_decode($datos['subtitulo']),
            'descripcion' => utf8_decode($datos['descripcion']),
            'estado' => $estado
        );
        $this->db->update('index_seccion_4', $update, "id = $id");
        $data = array(
            'type' => 'success',
            'mensaje' => 'Se ha actualizado el contenido de la sección 4'
        );
        return $data;
    }

    public function frmEditarIndexSeccion5($datos) {
        $id = 1;
        $estado = 1;
        if (empty($datos['estado'])) {
            $estado = 0;
        }
        $update = array(
            'titulo' => utf8_decode($datos['titulo']),
            'subtitulo' => utf8_decode($datos['subtitulo']),
            'estado' => $estado
        );
        $this->db->update('index_seccion_5', $update, "id = $id");
        $data = array(
            'type' => 'success',
            'mensaje' => 'Se ha actualizado el contenido de la sección 5'
        );
        return $data;
    }

    public function frmEditarPantallasLed($datos) {
        $update = array(
            'header_titulo' => utf8_decode($datos['header_titulo']),
            'contenido' => utf8_decode($datos['contenido'])
        );
        $this->db->update('pantallas_led', $update, "id = 1");
        $data = array(
            'type' => 'success',
            'content' => 'Se ha actualizado el contenido.'
        );
        return $data;
    }

    public function frmEditarDatosContacto($datos) {
        $update = array(
            'titulo' => utf8_decode($datos['titulo']),
            'titulo_direccion' => utf8_decode($datos['titulo_direccion']),
            'direccion' => utf8_decode($datos['direccion']),
            'titulo_telefono' => utf8_decode($datos['titulo_telefono']),
            'telefono' => utf8_decode($datos['telefono']),
            'titulo_email' => utf8_decode($datos['titulo_email']),
            'email' => utf8_decode($datos['email']),
        );
        $this->db->update('contacto', $update, "id = 1");
        $data = array(
            'type' => 'success',
            'content' => 'Se ha actualizado el contenido de datos de Contacto'
        );
        return $data;
    }

    public function frmEditarDatosFormulario($datos) {
        $update = array(
            'titulo_formulario' => utf8_decode($datos['titulo_formulario']),
            'texto_formulario' => utf8_decode($datos['texto_formulario'])
        );
        $this->db->update('contacto', $update, "id = 1");
        $data = array(
            'type' => 'success',
            'content' => 'Se ha actualizado los datos del formulario'
        );
        return $data;
    }

    public function frmEditarDatosMapa($datos) {
        $update = array(
            'longitud' => utf8_decode($datos['longitud']),
            'latitud' => utf8_decode($datos['latitud']),
            'zoom' => utf8_decode($datos['zoom']),
        );
        $this->db->update('contacto', $update, "id = 1");
        $data = array(
            'type' => 'success',
            'content' => 'Se ha actualizado los datos del mapa'
        );
        return $data;
    }

    public function frmEditarMetricas($datos) {
        $update = array(
            'header_titulo' => utf8_decode($datos['header_titulo']),
            'contenido' => utf8_decode($datos['contenido'])
        );
        $this->db->update('metricas', $update, "id = 1");
        $data = array(
            'type' => 'success',
            'content' => 'Se ha actualizado el contenido.'
        );
        return $data;
    }

    public function frmEditarEmpresa($datos) {
        $update = array(
            'header_titulo' => utf8_decode($datos['header_titulo']),
            'contenido' => utf8_decode($datos['contenido'])
        );
        $this->db->update('empresa', $update, "id = 1");
        $data = array(
            'type' => 'success',
            'content' => 'Se ha actualizado el contenido.'
        );
        return $data;
    }

    public function frmEditarContacto($datos) {
        $update = array(
            'header_titulo' => utf8_decode($datos['header_titulo'])
        );
        $this->db->update('contacto', $update, "id = 1");
        $data = array(
            'type' => 'success',
            'content' => 'Se ha actualizado el contenido.'
        );
        return $data;
    }

    public function frmEditarCobertura($datos) {
        $update = array(
            'header_titulo' => utf8_decode($datos['header_titulo']),
            'contenido' => utf8_decode($datos['contenido'])
        );
        $this->db->update('cobertura', $update, "id = 1");
        $data = array(
            'type' => 'success',
            'content' => 'Se ha actualizado el contenido.'
        );
        return $data;
    }

    public function frmEditarBuses($datos) {
        $update = array(
            'header_titulo' => utf8_decode($datos['header_titulo']),
            'contenido' => utf8_decode($datos['contenido'])
        );
        $this->db->update('buses', $update, "id = 1");
        $data = array(
            'type' => 'success',
            'content' => 'Se ha actualizado el contenido.'
        );
        return $data;
    }

    public function frmEditarIconicos($datos) {
        $update = array(
            'header_titulo' => utf8_decode($datos['header_titulo']),
            'contenido' => utf8_decode($datos['contenido'])
        );
        $this->db->update('iconicos', $update, "id = 1");
        $data = array(
            'type' => 'success',
            'content' => 'Se ha actualizado el contenido.'
        );
        return $data;
    }

    public function frmEditarCartelesTradicionales($datos) {
        $id = $datos['id'];
        $update = array(
            'header_titulo' => utf8_decode($datos['header_titulo']),
            'orden' => utf8_decode($datos['orden']),
            'contenido' => utf8_decode($datos['contenido'])
        );
        $this->db->update('carteles_tradicionales', $update, "id = $id");
        $data = array(
            'type' => 'success',
            'content' => 'Se ha actualizado el contenido.'
        );
        return $data;
    }

    public function frmEditarPantallasLedMetaTags($datos) {
        $update = array(
            'title' => utf8_decode($datos['title']),
            'description' => utf8_decode($datos['description']),
            'keywords' => utf8_decode($datos['keywords'])
        );
        $this->db->update('pantallas_led', $update, "id = 1");
        $data = array(
            'type' => 'success',
            'content' => 'Se ha actualizado el contenido de meta tags.'
        );
        return $data;
    }

    public function frmEditarMetricasMetaTags($datos) {
        $update = array(
            'title' => utf8_decode($datos['title']),
            'description' => utf8_decode($datos['description']),
            'keywords' => utf8_decode($datos['keywords'])
        );
        $this->db->update('metricas', $update, "id = 1");
        $data = array(
            'type' => 'success',
            'content' => 'Se ha actualizado el contenido de meta tags.'
        );
        return $data;
    }

    public function frmEditarEmpresaMetaTags($datos) {
        $update = array(
            'title' => utf8_decode($datos['title']),
            'description' => utf8_decode($datos['description']),
            'keywords' => utf8_decode($datos['keywords'])
        );
        $this->db->update('empresa', $update, "id = 1");
        $data = array(
            'type' => 'success',
            'content' => 'Se ha actualizado el contenido de meta tags.'
        );
        return $data;
    }

    public function frmEditarContactoMetaTags($datos) {
        $update = array(
            'title' => utf8_decode($datos['title']),
            'description' => utf8_decode($datos['description']),
            'keywords' => utf8_decode($datos['keywords'])
        );
        $this->db->update('contacto', $update, "id = 1");
        $data = array(
            'type' => 'success',
            'content' => 'Se ha actualizado el contenido de meta tags.'
        );
        return $data;
    }

    public function frmEditarCoberturaMetaTags($datos) {
        $update = array(
            'title' => utf8_decode($datos['title']),
            'description' => utf8_decode($datos['description']),
            'keywords' => utf8_decode($datos['keywords'])
        );
        $this->db->update('cobertura', $update, "id = 1");
        $data = array(
            'type' => 'success',
            'content' => 'Se ha actualizado el contenido de meta tags.'
        );
        return $data;
    }

    public function frmEditarBusesMetaTags($datos) {
        $update = array(
            'title' => utf8_decode($datos['title']),
            'description' => utf8_decode($datos['description']),
            'keywords' => utf8_decode($datos['keywords'])
        );
        $this->db->update('buses', $update, "id = 1");
        $data = array(
            'type' => 'success',
            'content' => 'Se ha actualizado el contenido de meta tags.'
        );
        return $data;
    }

    public function frmEditarIconicosMetaTags($datos) {
        $update = array(
            'title' => utf8_decode($datos['title']),
            'description' => utf8_decode($datos['description']),
            'keywords' => utf8_decode($datos['keywords'])
        );
        $this->db->update('iconicos', $update, "id = 1");
        $data = array(
            'type' => 'success',
            'content' => 'Se ha actualizado el contenido de meta tags.'
        );
        return $data;
    }

    public function frmEditarCartelesTradicionalesMetaTags($datos) {
        $id = $datos['id'];
        $update = array(
            'title' => utf8_decode($datos['title']),
            'description' => utf8_decode($datos['description']),
            'keywords' => utf8_decode($datos['keywords'])
        );
        $this->db->update('carteles_tradicionales', $update, "id = $id");
        $data = array(
            'type' => 'success',
            'content' => 'Se ha actualizado el contenido de meta tags.'
        );
        return $data;
    }

    public function uploadImgSeccion3($data) {
        $id = 1;
        $update = array(
            'imagen' => $data['imagen']
        );
        $this->db->update('index_seccion_3', $update, "id = $id");
        $contenido = '<img class="img-responsive" src="' . URL . 'public/images/' . $data['imagen'] . '">';
        $datos = array(
            "result" => TRUE,
            'content' => $contenido
        );
        return $datos;
    }

    public function uploadImgSeccion4($data) {
        $id = 1;
        $update = array(
            'imagen' => $data['imagen']
        );
        $this->db->update('index_seccion_4', $update, "id = $id");
        $contenido = '<img class="img-responsive" src="' . URL . 'public/images/' . $data['imagen'] . '">';
        $datos = array(
            "result" => TRUE,
            'content' => $contenido
        );
        return $datos;
    }

    public function uploadImgPantallaLed($data) {
        $id = $data['id'];
        $update = array(
            'imagen' => $data['imagen']
        );
        $this->db->update('pantallas_led_img', $update, "id = $id");
        $sql = $this->db->select("select * from pantallas_led_img where id = $id");
        if ($sql[0]['estado'] == 1) {
            $mostrar = '    <a class="pointer btnMostrarImg" id="mostrarImg' . $id . '" data-id="' . $id . '" data-metodo="estado_img_pantallas_led"><span class="label label-success">Visible</span></a>';
        } else {
            $mostrar = '    <a class="pointer btnMostrarImg" id="mostrarImg' . $id . '" data-id="' . $id . '" data-metodo="estado_img_pantallas_led"><span class="label label-danger">Oculta</span></a>';
        }
        $contenido = '
                    <img class="img-responsive" src="' . URL . 'public/images/pantallas_led/' . $data['imagen'] . '" alt="Photo">
                    <p>' . $mostrar . ' | <a class="pointer btnEditarImg" data-id="' . $id . '" data-metodo="editar_img_pantallas_led"><span class="label label-warning">Editar</span></a> | <a class="pointer btnEliminarImg" data-id="' . $id . '" data-metodo="eliminar_img_pantallas_led"><span class="label label-danger">Eliminar</span></a></p>
                    ';
        $imagen = '<img class="img-responsive" src="' . URL . 'public/images/pantallas_led/' . $data['imagen'] . '" alt="Photo">';
        $row = '';
        $datos = array(
            "result" => TRUE,
            'id' => $id,
            'imagen' => $imagen,
            'content' => $contenido
        );
        return $datos;
    }

    public function uploadImgBuses($data) {
        $id = $data['id'];
        $update = array(
            'imagen' => $data['imagen']
        );
        $this->db->update('buses_img', $update, "id = $id");
        $sql = $this->db->select("select * from buses_img where id = $id");
        if ($sql[0]['estado'] == 1) {
            $mostrar = '    <a class="pointer btnMostrarImg" id="mostrarImg' . $id . '" data-id="' . $id . '" data-metodo="estado_img_buses"><span class="label label-success">Visible</span></a>';
        } else {
            $mostrar = '    <a class="pointer btnMostrarImg" id="mostrarImg' . $id . '" data-id="' . $id . '" data-metodo="estado_img_buses"><span class="label label-danger">Oculta</span></a>';
        }
        $contenido = '
                    <img class="img-responsive" src="' . URL . 'public/images/buses/' . $data['imagen'] . '" alt="Photo">
                    <p>' . $mostrar . ' | <a class="pointer btnEditarImg" data-id="' . $id . '" data-metodo="editar_img_buses"><span class="label label-warning">Editar</span></a> | <a class="pointer btnEliminarImg" data-id="' . $id . '" data-metodo="eliminar_img_buses"><span class="label label-danger">Eliminar</span></a></p>
                    ';
        $imagen = '<img class="img-responsive" src="' . URL . 'public/images/buses/' . $data['imagen'] . '" alt="Photo">';
        $row = '';
        $datos = array(
            "result" => TRUE,
            'id' => $id,
            'imagen' => $imagen,
            'content' => $contenido
        );
        return $datos;
    }

    public function uploadImgIconicos($data) {
        $id = $data['id'];
        $update = array(
            'imagen' => $data['imagen']
        );
        $this->db->update('iconicos_img', $update, "id = $id");
        $sql = $this->db->select("select * from iconicos_img where id = $id");
        if ($sql[0]['estado'] == 1) {
            $mostrar = '    <a class="pointer btnMostrarImg" id="mostrarImg' . $id . '" data-id="' . $id . '" data-metodo="estado_img_iconicos"><span class="label label-success">Visible</span></a>';
        } else {
            $mostrar = '    <a class="pointer btnMostrarImg" id="mostrarImg' . $id . '" data-id="' . $id . '" data-metodo="estado_img_iconicos"><span class="label label-danger">Oculta</span></a>';
        }
        $contenido = '
                    <img class="img-responsive" src="' . URL . 'public/images/iconicos/' . $data['imagen'] . '" alt="Photo">
                    <p>' . $mostrar . ' | <a class="pointer btnEditarImg" data-id="' . $id . '" data-metodo="editar_img_iconicos"><span class="label label-warning">Editar</span></a> | <a class="pointer btnEliminarImg" data-id="' . $id . '" data-metodo="eliminar_img_iconicos"><span class="label label-danger">Eliminar</span></a></p>
                    ';
        $imagen = '<img class="img-responsive" src="' . URL . 'public/images/iconicos/' . $data['imagen'] . '" alt="Photo">';
        $row = '';
        $datos = array(
            "result" => TRUE,
            'id' => $id,
            'imagen' => $imagen,
            'content' => $contenido
        );
        return $datos;
    }

    public function uploadImgCartelesTradicionales($data) {
        $id = $data['id'];
        $update = array(
            'imagen' => $data['imagen']
        );
        $this->db->update('carteles_tradicionales_img', $update, "id = $id");
        $sql = $this->db->select("select * from carteles_tradicionales_img where id = $id");
        if ($sql[0]['estado'] == 1) {
            $mostrar = '    <a class="pointer btnMostrarImg" id="mostrarImg' . $id . '" data-id="' . $id . '" data-metodo="estado_img_carteles_tradicionales"><span class="label label-success">Visible</span></a>';
        } else {
            $mostrar = '    <a class="pointer btnMostrarImg" id="mostrarImg' . $id . '" data-id="' . $id . '" data-metodo="estado_img_carteles_tradicionales"><span class="label label-danger">Oculta</span></a>';
        }
        $contenido = '
                    <img class="img-responsive" src="' . URL . 'public/images/carteles_tradicionales/' . $data['imagen'] . '" alt="Photo">
                    <p>' . $mostrar . ' | <a class="pointer btnEditarImg" data-id="' . $id . '" data-metodo="editar_img_carteles_tradicionales"><span class="label label-warning">Editar</span></a> | <a class="pointer btnEliminarImg" data-id="' . $id . '" data-metodo="eliminar_img_carteles_tradicionales"><span class="label label-danger">Eliminar</span></a></p>
                    ';
        $imagen = '<img class="img-responsive" src="' . URL . 'public/images/carteles_tradicionales/' . $data['imagen'] . '" alt="Photo">';
        $row = '';
        $datos = array(
            "result" => TRUE,
            'id' => $id,
            'imagen' => $imagen,
            'content' => $contenido
        );
        return $datos;
    }

    public function uploadImgHeaderPantallasLed($data) {
        $id = 1;
        $update = array(
            'header_img' => $data['imagen']
        );
        $this->db->update('pantallas_led', $update, "id = $id");
        $contenido = '<img class="img-responsive" src="' . URL . 'public/images/header/' . $data['imagen'] . '">';
        $datos = array(
            "result" => TRUE,
            'content' => $contenido
        );
        return $datos;
    }

    public function uploadImgContactoFormulario($data) {
        $id = 1;
        $update = array(
            'imagen' => $data['imagen']
        );
        $this->db->update('contacto', $update, "id = $id");
        $contenido = '<img class="img-responsive" src="' . URL . 'public/images/' . $data['imagen'] . '">';
        $datos = array(
            "result" => TRUE,
            'content' => $contenido
        );
        return $datos;
    }

    public function uploadImgHeaderMetricas($data) {
        $id = 1;
        $update = array(
            'header_img' => $data['imagen']
        );
        $this->db->update('metricas', $update, "id = $id");
        $contenido = '<img class="img-responsive" src="' . URL . 'public/images/header/' . $data['imagen'] . '">';
        $datos = array(
            "result" => TRUE,
            'content' => $contenido
        );
        return $datos;
    }

    public function uploadImgHeaderEmpresa($data) {
        $id = 1;
        $update = array(
            'header_img' => $data['imagen']
        );
        $this->db->update('empresa', $update, "id = $id");
        $contenido = '<img class="img-responsive" src="' . URL . 'public/images/header/' . $data['imagen'] . '">';
        $datos = array(
            "result" => TRUE,
            'content' => $contenido
        );
        return $datos;
    }

    public function uploadImgHeaderCobertura($data) {
        $id = 1;
        $update = array(
            'header_img' => $data['imagen']
        );
        $this->db->update('cobertura', $update, "id = $id");
        $contenido = '<img class="img-responsive" src="' . URL . 'public/images/header/' . $data['imagen'] . '">';
        $datos = array(
            "result" => TRUE,
            'content' => $contenido
        );
        return $datos;
    }

    public function uploadImgHeaderContacto($data) {
        $id = 1;
        $update = array(
            'header_img' => $data['imagen']
        );
        $this->db->update('contacto', $update, "id = $id");
        $contenido = '<img class="img-responsive" src="' . URL . 'public/images/header/' . $data['imagen'] . '">';
        $datos = array(
            "result" => TRUE,
            'content' => $contenido
        );
        return $datos;
    }

    public function uploadImgHeaderCartelesTradicionales($data) {
        $id = $data['id'];
        $update = array(
            'header_img' => $data['imagen']
        );
        $this->db->update('carteles_tradicionales', $update, "id = $id");
        $contenido = '<img class="img-responsive" src="' . URL . 'public/images/header/' . $data['imagen'] . '">';
        $datos = array(
            "result" => TRUE,
            'content' => $contenido
        );
        return $datos;
    }

    public function imagenesPantallasLed() {
        $sql = $this->db->select("SELECT * FROM pantallas_led_img ORDER BY orden ASC");
        return $sql;
    }

    public function imagenesBuses() {
        $sql = $this->db->select("SELECT * FROM buses_img ORDER BY orden ASC");
        return $sql;
    }

    public function imagenesIconicos() {
        $sql = $this->db->select("SELECT * FROM iconicos_img ORDER BY orden ASC");
        return $sql;
    }

    public function imagenesCartelesTradicionales($id_carteles_tradicionales) {
        $sql = $this->db->select("SELECT * FROM carteles_tradicionales_img where id_carteles_tradicionales = $id_carteles_tradicionales ORDER BY orden ASC");
        return $sql;
    }

    public function estado_img_pantallas_led($datos) {
        $id = $datos['id'];
        #estado actual
        $sql = $this->db->select("select estado from pantallas_led_img where id = $id");
        $newEstado = ($sql[0]['estado'] == 1) ? 0 : 1;
        $update = array(
            'estado' => $newEstado
        );
        $this->db->update('pantallas_led_img', $update, "id = $id");
        if ($newEstado == 1) {
            $mostrar = '    <a class="pointer btnMostrarImg" id="mostrarImg' . $id . '" data-id="' . $id . '" data-metodo="estado_img_pantallas_led"><span class="label label-success">Visible</span></a>';
        } else {
            $mostrar = '    <a class="pointer btnMostrarImg" id="mostrarImg' . $id . '" data-id="' . $id . '" data-metodo="estado_img_pantallas_led"><span class="label label-danger">Oculta</span></a>';
        }
        $data = array(
            'id' => $id,
            'content' => $mostrar
        );
        return $data;
    }

    public function estado_img_buses($datos) {
        $id = $datos['id'];
        #estado actual
        $sql = $this->db->select("select estado from buses_img where id = $id");
        $newEstado = ($sql[0]['estado'] == 1) ? 0 : 1;
        $update = array(
            'estado' => $newEstado
        );
        $this->db->update('buses_img', $update, "id = $id");
        if ($newEstado == 1) {
            $mostrar = '    <a class="pointer btnMostrarImg" id="mostrarImg' . $id . '" data-id="' . $id . '" data-metodo="estado_img_buses"><span class="label label-success">Visible</span></a>';
        } else {
            $mostrar = '    <a class="pointer btnMostrarImg" id="mostrarImg' . $id . '" data-id="' . $id . '" data-metodo="estado_img_buses"><span class="label label-danger">Oculta</span></a>';
        }
        $data = array(
            'id' => $id,
            'content' => $mostrar
        );
        return $data;
    }

    public function estado_img_iconicos($datos) {
        $id = $datos['id'];
        #estado actual
        $sql = $this->db->select("select estado from iconicos_img where id = $id");
        $newEstado = ($sql[0]['estado'] == 1) ? 0 : 1;
        $update = array(
            'estado' => $newEstado
        );
        $this->db->update('iconicos_img', $update, "id = $id");
        if ($newEstado == 1) {
            $mostrar = '    <a class="pointer btnMostrarImg" id="mostrarImg' . $id . '" data-id="' . $id . '" data-metodo="estado_img_iconicos"><span class="label label-success">Visible</span></a>';
        } else {
            $mostrar = '    <a class="pointer btnMostrarImg" id="mostrarImg' . $id . '" data-id="' . $id . '" data-metodo="estado_img_iconicos"><span class="label label-danger">Oculta</span></a>';
        }
        $data = array(
            'id' => $id,
            'content' => $mostrar
        );
        return $data;
    }

    public function estado_img_carteles_tradicionales($datos) {
        $id = $datos['id'];
        #estado actual
        $sql = $this->db->select("select estado from carteles_tradicionales_img where id = $id");
        $newEstado = ($sql[0]['estado'] == 1) ? 0 : 1;
        $update = array(
            'estado' => $newEstado
        );
        $this->db->update('carteles_tradicionales_img', $update, "id = $id");
        if ($newEstado == 1) {
            $mostrar = '    <a class="pointer btnMostrarImg" id="mostrarImg' . $id . '" data-id="' . $id . '" data-metodo="estado_img_carteles_tradicionales"><span class="label label-success">Visible</span></a>';
        } else {
            $mostrar = '    <a class="pointer btnMostrarImg" id="mostrarImg' . $id . '" data-id="' . $id . '" data-metodo="estado_img_carteles_tradicionales"><span class="label label-danger">Oculta</span></a>';
        }
        $data = array(
            'id' => $id,
            'content' => $mostrar
        );
        return $data;
    }

    public function insertProductoImagenes($datos) {
        $this->db->insert('pantallas_led_img', array(
            'estado' => 1,
        ));
        $id = $this->db->lastInsertId();
        return $id;
    }

    public function getDatosTabla($tabla, $id) {
        $sql = $this->db->select("select * from $tabla where id = $id");
        return $sql[0];
    }

    public function armaPantallasLed($datos) {
        $id = $datos;
        $sql = $this->db->select("SELECT * FROM pantallas_led_img where id = $id;");
        if ($sql[0]['estado'] == 1) {
            $mostrar = '    <a class="pointer btnMostrarImg" id="mostrarImg' . $id . '" data-id="' . $id . '" data-metodo="estado_img_pantallas_led"><span class="label label-success">Visible</span></a>';
        } else {
            $mostrar = '    <a class="pointer btnMostrarImg" id="mostrarImg' . $id . '" data-id="' . $id . '" data-metodo="estado_img_pantallas_led"><span class="label label-danger">Oculta</span></a>';
        }
        $content = '<div class="col-sm-3" id="imagenGaleria' . $id . '">
                    <img style="width: 237px; height: 192px;" class="img-responsive" src="' . URL . 'public/images/pantallas_led/' . $sql[0]['imagen'] . '" alt="Photo">
                    <p>    ' . $mostrar . ' | <a class="pointer btnEditarImg" data-id="' . $id . '" data-metodo="editar_img_pantallas_led"><span class="label label-warning">Editar</span></a> | <a class="pointer btnEliminarImg" data-id="' . $id . '" data-metodo="eliminar_img_pantallas_led"><span class="label label-danger">Eliminar</span></a></p>
                </div>';
        $data = array(
            'content' => $content,
            'message' => 'Se ha agregado el contenido.'
        );
        return $data;
    }

    public function armaBuses($datos) {
        $id = $datos;
        $sql = $this->db->select("SELECT * FROM buses_img where id = $id;");
        if ($sql[0]['estado'] == 1) {
            $mostrar = '    <a class="pointer btnMostrarImg" id="mostrarImg' . $id . '" data-id="' . $id . '" data-metodo="estado_img_buses"><span class="label label-success">Visible</span></a>';
        } else {
            $mostrar = '    <a class="pointer btnMostrarImg" id="mostrarImg' . $id . '" data-id="' . $id . '" data-metodo="estado_img_buses"><span class="label label-danger">Oculta</span></a>';
        }
        $content = '<div class="col-sm-3" id="imagenGaleria' . $id . '">
                    <img style="width: 237px; height: 192px;" class="img-responsive" src="' . URL . 'public/images/buses/' . $sql[0]['imagen'] . '" alt="Photo">
                    <p>    ' . $mostrar . ' | <a class="pointer btnEditarImg" data-id="' . $id . '" data-metodo="editar_img_buses"><span class="label label-warning">Editar</span></a> | <a class="pointer btnEliminarImg" data-id="' . $id . '" data-metodo="eliminar_img_buses"><span class="label label-danger">Eliminar</span></a></p>
                </div>';
        $data = array(
            'content' => $content,
            'message' => 'Se ha agregado el contenido.'
        );
        return $data;
    }

    public function armaIconicos($datos) {
        $id = $datos;
        $sql = $this->db->select("SELECT * FROM iconicos_img where id = $id;");
        if ($sql[0]['estado'] == 1) {
            $mostrar = '    <a class="pointer btnMostrarImg" id="mostrarImg' . $id . '" data-id="' . $id . '" data-metodo="estado_img_iconicos"><span class="label label-success">Visible</span></a>';
        } else {
            $mostrar = '    <a class="pointer btnMostrarImg" id="mostrarImg' . $id . '" data-id="' . $id . '" data-metodo="estado_img_iconicos"><span class="label label-danger">Oculta</span></a>';
        }
        $content = '<div class="col-sm-3" id="imagenGaleria' . $id . '">
                    <img style="width: 237px; height: 192px;" class="img-responsive" src="' . URL . 'public/images/iconicos/' . $sql[0]['imagen'] . '" alt="Photo">
                    <p>    ' . $mostrar . ' | <a class="pointer btnEditarImg" data-id="' . $id . '" data-metodo="editar_img_iconicos"><span class="label label-warning">Editar</span></a> | <a class="pointer btnEliminarImg" data-id="' . $id . '" data-metodo="eliminar_img_iconicos"><span class="label label-danger">Eliminar</span></a></p>
                </div>';
        $data = array(
            'content' => $content,
            'message' => 'Se ha agregado el contenido.'
        );
        return $data;
    }

    public function armaCartelesTradicionales($datos) {
        $id = $datos;
        $sql = $this->db->select("SELECT * FROM carteles_tradicionales_img where id = $id;");
        if ($sql[0]['estado'] == 1) {
            $mostrar = '    <a class="pointer btnMostrarImg" id="mostrarImg' . $id . '" data-id="' . $id . '" data-metodo="estado_img_carteles_tradicionales"><span class="label label-success">Visible</span></a>';
        } else {
            $mostrar = '    <a class="pointer btnMostrarImg" id="mostrarImg' . $id . '" data-id="' . $id . '" data-metodo="estado_img_carteles_tradicionales"><span class="label label-danger">Oculta</span></a>';
        }
        $content = '<div class="col-sm-3" id="imagenGaleria' . $id . '">
                    <img style="width: 237px; height: 192px;" class="img-responsive" src="' . URL . 'public/images/carteles_tradicionales/' . $sql[0]['imagen'] . '" alt="Photo">
                    <p>    ' . $mostrar . ' | <a class="pointer btnEditarImg" data-id="' . $id . '" data-metodo="editar_img_carteles_tradicionales"><span class="label label-warning">Editar</span></a> | <a class="pointer btnEliminarImg" data-id="' . $id . '" data-metodo="eliminar_img_carteles_tradicionales"><span class="label label-danger">Eliminar</span></a></p>
                </div>';
        $data = array(
            'content' => $content,
            'message' => 'Se ha agregado el contenido.'
        );
        return $data;
    }

    public function eliminar_img_pantallas_led($datos) {
        $id = $datos['id'];
        $this->unlinkImagenPantallasLed($id);
        $sth = $this->db->prepare("delete from pantallas_led_img where id = :id");
        $sth->execute(array(
            ':id' => $id
        ));
        $data = array(
            'id' => $id,
            'content' => 'Se ha eliminado correctamente la imagen'
        );
        return $data;
    }

    public function eliminar_img_buses($datos) {
        $id = $datos['id'];
        $this->unlinkImagenBuses($id);
        $sth = $this->db->prepare("delete from buses_img where id = :id");
        $sth->execute(array(
            ':id' => $id
        ));
        $data = array(
            'id' => $id,
            'content' => 'Se ha eliminado correctamente la imagen'
        );
        return $data;
    }

    public function eliminar_img_iconicos($datos) {
        $id = $datos['id'];
        $this->unlinkImagenIconicos($id);
        $sth = $this->db->prepare("delete from iconicos_img where id = :id");
        $sth->execute(array(
            ':id' => $id
        ));
        $data = array(
            'id' => $id,
            'content' => 'Se ha eliminado correctamente la imagen'
        );
        return $data;
    }

    public function eliminar_img_carteles_tradicionales($datos) {
        $id = $datos['id'];
        $this->unlinkImagenCartelesTradicionales($id);
        $sth = $this->db->prepare("delete from carteles_tradicionales_img where id = :id");
        $sth->execute(array(
            ':id' => $id
        ));
        $data = array(
            'id' => $id,
            'content' => 'Se ha eliminado correctamente la imagen'
        );
        return $data;
    }

    public function coberturaUbicaciones() {
        $sql = $this->db->select("SELECT * FROM `cobertura_ubicaciones`;");
        return $sql;
    }

    public function listadoDTUbicaciones() {
        $sql = $this->db->select("SELECT * FROM cobertura_ubicaciones ORDER BY id ASC;");
        $datos = array();
        foreach ($sql as $item) {
            $id = $item['id'];
            if ($item['estado'] == 1) {
                $estado = '<a class="pointer btnCambiarEstado" data-seccion="ubicaciones" data-rowid="ubicaciones_" data-tabla="cobertura_ubicaciones" data-campo="estado" data-id="' . $id . '" data-estado="1"><span class="label label-primary">Activo</span></a>';
            } else {
                $estado = '<a class="pointer btnCambiarEstado" data-seccion="ubicaciones" data-rowid="ubicaciones_" data-tabla="cobertura_ubicaciones" data-campo="estado" data-id="' . $id . '" data-estado="0"><span class="label label-danger">Inactivo</span></a>';
            }
            $principal = '';
            if ($item['principal'] == 1) {
                $principal = '<span class="label label-warning">Principal</span>';
            }
            $btnEditar = '<a class="editDTContenido pointer btn-xs" data-id="' . $id . '" data-url="modalEditarDTUbicaciones"><i class="fa fa-edit"></i> Editar </a>';
            array_push($datos, array(
                "DT_RowId" => "ubicaciones_$id",
                'id' => $item['id'],
                'descripcion' => strip_tags(utf8_encode($item['descripcion'])),
                'latitud' => utf8_encode($item['latitud']),
                'longitud' => utf8_encode($item['longitud']),
                'principal' => $principal,
                'estado' => $estado,
                'editar' => $btnEditar
            ));
        }
        $json = '{"data": ' . json_encode($datos) . '}';
        return $json;
    }

    public function modalEditarDTUbicaciones($datos) {
        $id = $datos['id'];
        $sql = $this->db->select("SELECT * FROM `cobertura_ubicaciones` where id = $id");
        $checkedEstado = ($sql[0]['estado'] == 1) ? 'checked' : '';
        $checkedPrincipal = ($sql[0]['principal'] == 1) ? 'checked' : '';
        $modal = '<div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Modificar Datos</h3>
                    </div>
                    <div class="row">
                        <form role="form" id="frmEditarCoberturaUbicacion" method="POST">
                            <input type="hidden" name="id" value="' . $id . '">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Descripcion</label>
                                    <textarea name="descripcion" class="summernote">' . utf8_encode($sql[0]['descripcion']) . '</textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Latitud</label>
                                    <input type="text" name="latitud" class="form-control" value="' . utf8_encode($sql[0]['latitud']) . '">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Longitud</label>
                                    <input type="text" name="longitud" class="form-control" value="' . utf8_encode($sql[0]['longitud']) . '">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="i-checks"><label> <input type="checkbox" name="principal" value="1" ' . $checkedPrincipal . '> <i></i> Principal </label></div>
                            </div>
                            <div class="col-md-6">
                                <div class="i-checks"><label> <input type="checkbox" name="estado" value="1" ' . $checkedEstado . '> <i></i> Mostrar </label></div>
                            </div>
                            <hr>
                            <div class="clearfix"></div>
                            <div class="btn-submit">
                                <button type="submit" class="btn btn-block btn-primary btn-lg">Editar Item</button>
                            </div>
                        </form>
                    </div>
                </div>
                <script>
                    $(document).ready(function () {
                        $(".i-checks").iCheck({
                            checkboxClass: "icheckbox_square-green"
                        });
                    });
                </script>';
        $data = array(
            'titulo' => 'Editar Item de Ubicación',
            'content' => $modal
        );
        return json_encode($data);
    }

    public function modalAgregarItemUbicacion() {
        $modal = '<div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Modificar Datos</h3>
                    </div>
                    <div class="row">
                        <form role="form" id="frmAgregarCoberturaUbicacion" method="POST">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Descripcion</label>
                                    <textarea name="descripcion" class="summernote"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Latitud</label>
                                    <input type="text" name="latitud" class="form-control" value="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Longitud</label>
                                    <input type="text" name="longitud" class="form-control" value="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="i-checks"><label> <input type="checkbox" name="principal" value="1"> <i></i> Principal </label></div>
                            </div>
                            <div class="col-md-6">
                                <div class="i-checks"><label> <input type="checkbox" name="estado" value="1"> <i></i> Mostrar </label></div>
                            </div>
                            <hr>
                            <div class="clearfix"></div>
                            <div class="btn-submit">
                                <button type="submit" class="btn btn-block btn-primary btn-lg">Agregar Item</button>
                            </div>
                        </form>
                    </div>
                </div>
                <script>
                    $(document).ready(function () {
                        $(".i-checks").iCheck({
                            checkboxClass: "icheckbox_square-green"
                        });
                    });
                </script>';
        $data = array(
            'titulo' => 'Agregar Item de Ubicación',
            'content' => $modal
        );
        return $data;
    }

    public function listadoDTContacto($datos) {
        $columns = array(
            0 => 'id',
            1 => 'nombre',
            2 => 'email',
            3 => 'fecha',
            4 => 'visto',
            5 => 'accion'
        );
#getting total number records without any search
        $sql = $this->db->select("SELECT COUNT(*) as cantidad FROM frm_contacto");
        $totalFiltered = $sql[0]['cantidad'];
        $totalData = $sql[0]['cantidad'];

        $query = "SELECT * FROM frm_contacto where 1 = 1";
        $where = "";
        if (!empty($datos['search']['value'])) {
            $where .= " AND (nombre LIKE '%" . $requestData['search']['value'] . "%' ";
            $where .= " OR email LIKE '%" . $requestData['search']['value'] . "%' ";
            $where .= " OR fecha LIKE '%" . $requestData['search']['value'] . "%' )";
#when there is a search parameter then we have to modify total number filtered rows as per search result.
            $sql = $this->db->select("SELECT COUNT(*) as cantidad FROM frm_contacto where 1 = 1 $where");
            $totalFiltered = $sql[0]['cantidad'];
        }
        $query .= $where;
        $query .= " ORDER BY " . $columns[$datos['order'][0]['column']] . "   " . $datos['order'][0]['dir'] . "  LIMIT " . $datos['start'] . " ," . $datos['length'] . "   ";
        $sql = $this->db->select($query);
        $data = array();
        foreach ($sql as $row) {  // preparing an array
            $id = $row["id"];
            if ($row['leido'] == 1) {
                $estado = '<span class="label label-primary">Leído</span>';
            } else {
                $estado = '<span class="label label-danger">No Leído</span>';
            }
            $btnEditar = '<a class="btnVerContacto pointer btn-xs" data-id="' . $id . '" data-url="modalVerContacto"><i class="fa fa-edit"></i> Ver Datos </a>';
            $nestedData = array();
            $nestedData['DT_RowId'] = 'contacto_' . $id;
            $nestedData[] = $id;
            $nestedData[] = utf8_encode($row["nombre"]);
            $nestedData[] = utf8_encode($row["email"]);
            $nestedData[] = date('d-m-Y H:i:s', strtotime($row["fecha"]));
            $nestedData[] = $estado;
            $nestedData[] = $btnEditar;
            $data[] = $nestedData;
        }

        $json_data = array(
            "draw" => intval($datos['draw']), // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
            "recordsTotal" => intval($totalData), // total number of records
            "recordsFiltered" => intval($totalFiltered), // total number of records after searching, if there is no searching then totalFiltered = totalData
            "data" => $data   // total data array
        );

        return json_encode($json_data);
    }

    public function modalVerContacto($datos) {
        $id = $datos['id'];
        $sql = $this->db->select("SELECT * FROM frm_contacto where id = $id");
        $modal = '<div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Formulario de contacto enviado por ' . utf8_encode($sql[0]['nombre']) . '</h3>
                    </div>
                    <div class="row">
                        <table class="table table-hover">
                            <tr>
                                <td class="text-bold">Nombre:</td>
                                <td>' . utf8_encode($sql[0]['nombre']) . '</td>
                            </tr>
                            <tr>
                                <td class="text-bold">Email:</td>
                                <td>' . utf8_encode($sql[0]['email']) . '</td>
                            </tr>
                            <tr>
                                <td class="text-bold">Mensaje:</td>
                                <td>' . utf8_encode($sql[0]['mensaje']) . '</td>
                            </tr>
                            <tr>
                                <td class="text-bold">IP:</td>
                                <td>' . utf8_encode($sql[0]['ip']) . '</td>
                            </tr>
                            <tr>
                                <td class="text-bold">Fecha:</td>
                                <td>' . date('d-m-Y H:i:s', strtotime($sql[0]['fecha'])) . '</td>
                            </tr>
                        </table>
                    </div>
                </div>';
        $update = array(
            'leido' => 1
        );
        $this->db->update('frm_contacto', $update, "id = $id");
        $data = array(
            'titulo' => 'Ver datos de contacto',
            'content' => $modal,
            'id' => $id,
            'row' => $this->rowDataTable('verContacto', 'frm_contacto', $id)
        );
        return json_encode($data);
    }

}
