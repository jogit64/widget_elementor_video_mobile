jQuery(document).ready(function ($) {
  var video = $(".zenzone-video-widget video").get(0); // Obtient l'élément vidéo

  $(".votre-element-de-controle").on("click", function () {
    // Vérifie si la vidéo est en train de jouer
    if (video.paused) {
      video.play();
    } else {
      video.pause();
    }
  });
});
