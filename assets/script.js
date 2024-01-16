jQuery(document).ready(function ($) {
  // Cibler la vidéo à l'intérieur du conteneur spécifique
  $(".zenzone-video-container").each(function () {
    var container = $(this);
    var video = container.find(".zenzone-video").get(0);

    container.find(".coque").on("click", function () {
      if (video.paused) {
        video.play();
      } else {
        video.pause();
      }
    });
  });
});
