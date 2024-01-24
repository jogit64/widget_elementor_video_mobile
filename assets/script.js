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

    // Ajouter un gestionnaire pour l'événement 'ended' de la vidéo
    $(video).on("ended", function () {
      // Remettre la vidéo au début
      video.currentTime = 0;
      // Vous pouvez également ajouter video.pause(); ici si vous voulez vous assurer que la vidéo est en pause
    });
  });
});
