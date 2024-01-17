jQuery(document).ready(function ($) {
  // Cibler la vidéo à l'intérieur du conteneur spécifique
  $(".lebonunivers-video-container").each(function () {
    var container = $(this);
    var video = container.find(".lebonunivers-video").get(0);

    container.find(".coque").on("click", function () {
      if (video.paused) {
        video.play();
      } else {
        video.pause();
      }
    });
  });
});
