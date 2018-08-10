<!-- start page title section -->
<section class="wow fadeIn parallax" data-stellar-background-ratio="0.5" style="background-image:url('<?= URL; ?>public/images/header/<?= utf8_encode($this->contenido['header_img']) ?>');">
    <div class="opacity-medium bg-extra-dark-gray"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 extra-small-screen display-table page-title-large">
                <div class="display-table-cell vertical-align-middle text-center">
                    <!-- start page title -->
                    <h1 class="text-white alt-font font-weight-600 letter-spacing-minus-1 margin-15px-bottom"><?= utf8_encode($this->contenido['header_titulo']) ?></h1>
                    <!-- end page title -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- start map section -->
<section class="no-padding one-second-screen sm-height-400px wow fadeIn" id="map"></section>
<!-- end map section -->
<!-- start call to action section -->
<section class="wow fadeIn padding-50px-tb border-top border-width-1 border-color-extra-light-gray">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 sm-margin-30px-bottom sm-text-center wow fadeInDown"> 
                <?= utf8_encode($this->contenido['contenido']); ?>
            </div>

        </div>
    </div>
</section>
<!-- end call to action section -->
<script type="text/javascript">
    function initMap() {
        var locations = [
<?php foreach ($this->ubicaciones['ubicaciones'] as $key => $ubicacion): ?>
                ['<?= $ubicacion['descripcion']; ?>', <?= $ubicacion['latitud']; ?>, <?= $ubicacion['longitud']; ?>, <?= $key; ?>],
<?php endforeach; ?>
        ];

        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 10,
            center: new google.maps.LatLng(<?= $this->ubicaciones['principal']['latitud']; ?>, <?= $this->ubicaciones['principal']['longitud']; ?>),
            mapTypeId: google.maps.MapTypeId.ROADMAP
        });

        var infowindow = new google.maps.InfoWindow();

        var marker, i;

        for (i = 0; i < locations.length; i++) {
            marker = new google.maps.Marker({
                position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                map: map
            });

            google.maps.event.addListener(marker, 'click', (function (marker, i) {
                return function () {
                    infowindow.setContent(locations[i][0]);
                    infowindow.open(map, marker);
                }
            })(marker, i));
        }
    }
</script>