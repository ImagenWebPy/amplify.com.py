<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Empresa</h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?= URL ?>/admin">Inicio</a>
            </li>
            <li class="active">
                <strong>Empresa</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Datos Sección</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-down"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content" style="display: none;">
                    <div class="row">
                        <form role="form" id="frmEditarEmpresa" method="POST">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Titulo</label>
                                    <input type="text" name="header_titulo" class="form-control" value="<?= utf8_encode($this->datosEmpresa['header_titulo']); ?>">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Contenido</label>
                                    <textarea style="height:80px;" name="contenido" class="summernote"><?= utf8_encode($this->datosEmpresa['contenido']); ?></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-block btn-primary btn-lg">Actualizar Contenido</button>
                            </div>
                        </form>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="ibox float-e-margins">
                                <div class="ibox-title">
                                    <h5>Imagen de la Cabecera</h5>
                                    <div class="ibox-tools">
                                        <a class="collapse-link">
                                            <i class="fa fa-chevron-up"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="ibox-content">
                                    <div class="alert alert-info alert-dismissable">
                                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                        Detalles de la imagen a subir:<br>
                                        -Formato: JPG, PNG<br>
                                        -Dimensión Recomendada: 1920 x 1100px<br>
                                        -Tamaño: 2MB<br>
                                        <strong>Obs.: Las imagenes serán redimensionadas automaticamente a la dimensión especificada y se reducirá la calidad de la misma.</strong>
                                    </div>
                                    <div class="html5fileupload fileImagenEmpresa" data-max-filesize="2048000" data-url="<?= URL; ?>/admin/uploadImgHeaderEmpresa" data-valid-extensions="JPG,JPEG,jpg,png,jpeg,PNG" style="width: 100%;">
                                        <input type="file" name="file_archivo" />
                                    </div>
                                    <script>
                                        $(".html5fileupload.fileImagenEmpresa").html5fileupload({
                                            onAfterStartSuccess: function (response) {
                                                $("#imgEmpresaHeader").html(response.content);
                                            }
                                        });
                                    </script>
                                    <div class="row">
                                        <div class="col-md-12" id="imgEmpresaHeader">
                                            <img class="img-responsive" src="<?= URL ?>public/images/header/<?= $this->datosEmpresa['header_img']; ?>">';
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /COL-LG-12-->
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Datos Meta Tags</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-down"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content" style="display: none;">
                    <div class="row">
                        <form role="form" id="frmEditarEmpresaMetaTags" method="POST">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Titulo</label>
                                    <input type="text" name="title" class="form-control" value="<?= utf8_encode($this->datosEmpresa['title']); ?>">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Descripcion</label>
                                    <textarea style="height:80px;" name="description" class="form-control"><?= utf8_encode($this->datosEmpresa['description']); ?></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Palabras Clave</label>
                                    <textarea style="height:80px;" name="keywords" class="form-control"><?= utf8_encode($this->datosEmpresa['keywords']); ?></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-block btn-primary btn-lg">Actualizar Contenido</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div><!-- /COL-LG-12-->
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $(".i-checks").iCheck({
            checkboxClass: "icheckbox_square-green",
            radioClass: "iradio_square-green",
        });
        $(".summernote").summernote({
            height: 300, // set editor height
            minHeight: null, // set minimum height of editor
            maxHeight: null // set maximum height of editor
        });
        $(document).on("submit", "#frmEditarEmpresa", function (e) {
            var url = "<?= URL ?>/admin/frmEditarEmpresa"; // the script where you handle the form input.
            $.ajax({
                type: "POST",
                url: url,
                dataType: "json",
                data: $("#frmEditarEmpresa").serialize(), // serializes the form's elements.
                success: function (data)
                {
                    if (data.type == 'success') {
                        toastr.success(data.content)
                    }
                }
            });
            e.preventDefault(); // avoid to execute the actual submit of the form.
        });
        $(document).on("submit", "#frmEditarEmpresaMetaTags", function (e) {
            var url = "<?= URL ?>/admin/frmEditarEmpresaMetaTags"; // the script where you handle the form input.
            $.ajax({
                type: "POST",
                url: url,
                dataType: "json",
                data: $("#frmEditarEmpresaMetaTags").serialize(), // serializes the form's elements.
                success: function (data)
                {
                    if (data.type == 'success') {
                        toastr.success(data.content)
                    }
                }
            });
            e.preventDefault(); // avoid to execute the actual submit of the form.
        });
    });
</script>