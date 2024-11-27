<?php
include './header.php'
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>IT HELP DESK</title>
    <link rel="stylesheet" href="./styles/home.css">
  </head>
  <body>
  <div style="width:100%;margin-top:30px;
  justify-content: center;">
    <main>
        <div id="carousel-bouton-gauche">
            <!-- Flèche gauche du carrousel (SVG) -->
            <svg width="100%" height="100%" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M16.2426 6.34317L14.8284 4.92896L7.75739 12L14.8285 19.0711L16.2427 17.6569L10.5858 12L16.2426 6.34317Z" fill="white" />
            </svg>
        </div>
        <!-- Images du carrousel -->
        <img src="images/uni.jpg" alt="fleur violette" id="carousel-item-0" class="carousel-item">
        <img src="images/p1.jpeg" alt="maison" id="carousel-item-1" class="carousel-item" width="100%" style="display: none;">
        <img src="images/uni1.jpeg" alt="furet" id="carousel-item-2" class="carousel-item" width="100%" style="display: none;">
        <div id="carousel-bouton-droite">
            <!-- Flèche droite du carrousel (SVG) -->
            <svg width="100%" height="100%" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M10.5858 6.34317L12 4.92896L19.0711 12L12 19.0711L10.5858 17.6569L16.2427 12L10.5858 6.34317Z" fill="white" />
            </svg>
        </div>
    </main>


    <div class="paragraph-box" style="margin-top:30px;margin-bottom:40px;padding:30px">
      <h3><center>Anouncements:</center></h3>
      <ul>
        <li>
          The registration deadline for the upcoming semester is 20/10/2023.
          Please ensure you complete your registration process.
        </li>
        <li>
          The details for this year's graduation ceremony have been finalized.
        </li>
        <li>
          In response to the ongoing situation, we've expanded our online
          learning resources.
        </li>
        <li>Our annual Career Fair will be held on 26/10/2023.</li>
        <li>The annual Research Symposium is fast approaching.</li>
      </ul>
    </div>
    <script src="js/home.js"></script>
    <script>
      // Sélection des éléments HTML avec les IDs correspondants
      const carouselBoutonGauche = document.getElementById(
        "carousel-bouton-gauche"
      );
      const carouselBoutonDroite = document.getElementById(
        "carousel-bouton-droite"
      );

      // Initialisation des variables
      let item = null; // L'élément actuellement affiché
      let elementValue = 0; // La valeur de l'élément actuellement affiché (index)

      // Gestionnaire d'événement pour le bouton gauche du carrousel
      carouselBoutonGauche.addEventListener("click", function () {
        if (elementValue > 0) {
          // Vérifie si l'élément actuel n'est pas le premier
          elementValue -= 1;
          item = "carousel-item-" + elementValue;
          document.getElementById(item).style.display = "block";
          carouselBoutonDroite.style.display = "block";
          carouselBoutonGauche.style.display = "block";
          if (elementValue === 0) {
            // Si nous sommes revenus au premier élément
            carouselBoutonGauche.style.display = "none";
          }

          for (let i = 0; i < 4; i++) {
            // Boucle pour masquer les autres éléments (0, 1, 2)
            if (i !== elementValue) {
              // Si l'élément n'est pas celui que nous voulons afficher
              document.getElementById("carousel-item-" + i).style.display =
                "none";
            }
          }
        }
      });

      // Gestionnaire d'événement pour le bouton droit du carrousel
      carouselBoutonDroite.addEventListener("click", function () {
        if (elementValue < 3) {
          // Vérifie si l'élément actuel n'est pas le dernier
          elementValue += 1;
          item = "carousel-item-" + elementValue;
          document.getElementById(item).style.display = "block";
          carouselBoutonDroite.style.display = "block";
          carouselBoutonGauche.style.display = "block";
          if (elementValue === 3) {
            // Si nous sommes arrivés au dernier élément
            carouselBoutonDroite.style.display = "none";
          }

          for (let i = 0; i < 4; i++) {
            // Boucle pour masquer les autres éléments (0, 1, 2)
            if (i !== elementValue) {
              // Si l'élément n'est pas celui que nous voulons afficher
              document.getElementById("carousel-item-" + i).style.display =
                "none";
            }
          }
        }
      });
    </script>

<?php 
include 'footer.php';
?>
  </body>
</html>
