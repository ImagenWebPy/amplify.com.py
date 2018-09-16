<!-- start page title section -->
<section class="wow fadeIn parallax" style="padding: 280px 0px;">
    <div id="player"></div>
</section>
<!-- end page title section -->
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
<script>
    // 2. This code loads the IFrame Player API code asynchronously.
    var tag = document.createElement('script');

    tag.src = "https://www.youtube.com/iframe_api";
    var firstScriptTag = document.getElementsByTagName('script')[0];
    firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

    // 3. This function creates an <iframe> (and YouTube player)
    //    after the API code downloads.
    var player;
    function onYouTubeIframeAPIReady() {
        player = new YT.Player('player', {
            height: '480',
            width: '720',
            videoId: '<?= $this->contenido['videoId']; ?>',
            events: {
                'onReady': onPlayerReady,
                'onStateChange': onPlayerStateChange
            }
        });
    }

    // 4. The API will call this function when the video player is ready.
    function onPlayerReady(event) {
        event.target.playVideo();
    }

    // 5. The API calls this function when the player's state changes.
    //    The function indicates that when playing a video (state=1),
    //    the player should play for six seconds and then stop.
    var done = false;
    function onPlayerStateChange(event) {
        if (event.data == YT.PlayerState.PLAYING && !done) {
            setTimeout(stopVideo, 6000);
            done = true;
        }
    }
    function stopVideo() {
        player.stopVideo();
    }
</script>