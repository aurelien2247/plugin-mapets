<?php
get_header();
$user = wp_get_current_user();
if ( in_array( 'subscriber' , (array) $user->roles ) || in_array( 'author' , (array) $user->roles ) || in_array( 'administrator' , (array) $user->roles )) {
  echo '<script src="https://kit.fontawesome.com/cfa8de8fe8.js" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/paho-mqtt/1.0.1/mqttws31.js" type="text/javascript"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/paho-mqtt/1.0.1/mqttws31.min.js" type="text/javascript"></script>
  <script src="/wp-content/plugins/admin_templates/js/custom.js" type="text/javascript"></script>
  ';

  if (isset($_POST['localiser'])) {
    $animal_nom = $_POST['animal_nom'];
    $proprietaire = $_POST['animal_proprietaire'];
    $collier = $_POST['animal_collier'];
    $spacies = $_POST['spacies_of_animal'];
    $user = wp_get_current_user();
    $user_name = $user->user_login ;

    if($proprietaire == $user_name){

      $table_categories = $wpdb->prefix . 'collier';
      $collar_animal = $wpdb->get_results( "SELECT * FROM $table_categories " );
  
      foreach ($collar_animal as $collar){
        if($collar->animal == $animal_nom) {
          $number_of_course = $collar->parcours;
          $table_categories = $wpdb->prefix . 'parcours';
          $resultat_course = $wpdb->get_results( "SELECT * FROM $table_categories " );
  
          foreach ($resultat_course as $course){
            affichage_carte();
            if ($number_of_course == $course->nom) {
              affichage_carte();
            }
  
          }
        } 
      }
    } else {
      $table_categories = $wpdb->prefix . 'collier';
      $resultat_animal = $wpdb->get_results( "SELECT * FROM $table_categories " );

      foreach ($resultat_animal as $collar){
        if($collar->animal == $animal_nom) {
          $number_of_course = $collar->parcours;
          $table_categories = $wpdb->prefix . 'parcours';
          $resultat_course = $wpdb->get_results( "SELECT * FROM $table_categories " );
  
          foreach ($resultat_course as $course){
  
            if ($number_of_course == $course->nom) {
              affichage_carte();
            }
  
          }
        }
      }
      $table_categories = $wpdb->prefix . 'animal';
      $espece_animal = $wpdb->get_results( "SELECT espece FROM $table_categories WHERE nom='$animal_nom'" );
  
      foreach($espece_animal as $espece){
        foreach($espece_animal as $espece){
          $spacies = $espece->espece ;
          global $wpdb;
    
          $table_categories = $wpdb->prefix . 'animal';
          $resultat = $wpdb->get_results("SELECT * FROM $table_categories");
          $i = 0;
          foreach ($resultat as $animal) {
              // vérifie si il y a des données d'image
              if ($animal->espece == $spacies) {
                  if (!empty($animal->img)) {
                      echo '<div class="all-card">';
                      $img = imagecreatefromstring($animal->img);
                      if ($img !== false) {
                          //enregistre l'image en png
                          imagepng($img, 'image' . $i . '.png');
                          // Free up memory
                          imagedestroy($img);
                          echo '
                      <div class="container">
                          <div class="card-custom">
                              <div class="face face1">
                                  <div class="content">
                                      <img src="	https://www.projet.local/wp-admin/image' . $i . '.png" alt="image">
                                      <h3>' . $animal->nom . '</h3>
                                      <h4>' . $animal->race . '</h4>
                                  </div>
                              </div>
                              <div class="face face2">
                                  <div class="content">
                                  <form name="localiser" method="post">
                                    <input type="hidden" name="animal_nom" value="' . $animal->nom . '">
                                    <input type="hidden" name="animal_proprietaire" value="' . $animal->proprietaire . '">
                                    <input type="hidden" name="animal_collier" value="' . $animal->nom_collier . '">
                                    <p>Vous souhaite localiser votre animal nommé(e) ' . $animal->nom . ' grace au collier ' . $animal->nom_collier . ' ? Alors clicker sur Localiser ci-dessous.</p>
                                    <input type="submit" class="btn-localiser" name="localiser" value="Localiser">
                                  </form>
                                  </div>
                              </div>
                          </div>
                      </div>';
                      }
                      ++$i;
                  } else {
                      echo '
                      <div class="container">
                          <div class="card-custom">
                              <div class="face face1">
                                  <div class="content">
                                      <img src="/wp-content/themes/Projet-CollierPourChien/image/user.png" alt="image">
                                      <h3>' . $animal->nom . '</h3>
                                  </div>
                              </div>
                              <div class="face face2">
                                  <div class="content">
                                      <form name="localiser" method="post">
                                          <input type="hidden" name="animal_nom" value="' . $animal->nom . '">
                                          <input type="hidden" name="animal_proprietaire" value="' . $animal->proprietaire . '">
                                          <input type="hidden" name="animal_collier" value="' . $animal->nom_collier . '">
                                          <p>Vous souhaitez localiser votre animal nommé(e) ' . $animal->nom . ' grace au collier ' . $animal->nom_collier . ' ? Alors clicker sur Localiser ci-dessous.</p>
                                          <input type="submit" class="btn-localiser" name="localiser" value="Localiser">
                                      </form>
                                  </div>
                              </div>
                          </div>
                      </div>';
                  }
              }
          }
        }
      }
    }

}
  ?>
  
    <?php choose_spacies();
    ?>
    <div class="barre">
    <script src="/wp-content/plugins/admin_templates/js/custom.js" type="text/javascript"></script>
        <h1 class="title_animaux">Vos animaux</h1>
    </div>
    <div class="all-card">
    <?php affichage_animal(); ?>
    </div>
        <?php form_information_animal(); ?><br><br>
<?php
} else {
	// L'utilisateur actuel n'a pas de compte
  echo '
  <div id="acount-box">
      <h1>Erreur:</h1>
      <p class="inscription"> Afin de pouvoir avoir accès à cette page merci de vous connecter en cliquant<a href="https://www.projet.local/wp-login.php?action=login"> ICI</a>.
      <br>Si vous n\'avez pas de compte vous pouvez vous inscrire en cliquant <a href="https://www.projet.local/inscription/"> ICI</a>.
      <br><br> Cette page une fois connecté vous permeteras d\'acceder à la localisation de votre animal ou d\'une espece entiere.</p>
  </div>';
}
?>
<?php get_footer(); ?>