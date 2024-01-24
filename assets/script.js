jQuery(document).ready(function ($) {
  $(".lebonunivers-video-container").each(function () {
    var container = $(this);
    var video = container.find(".lebonunivers-video").get(0);
    var playIcon = container.find(".play-icon");

    // Afficher l'icône Play lorsque la vidéo est en pause
    if (video.paused) {
      playIcon.show();
    }

    container.find(".coque, .play-icon").on("click", function () {
      if (video.paused) {
        video.play();
        playIcon.hide();
      } else {
        video.pause();
        playIcon.show();
      }
    });

    $(video).on("ended", function () {
      video.currentTime = 0;
      playIcon.show();
    });
  });
});
