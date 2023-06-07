<?php

/**
 * Ajoute des pages de sous-menu comptes
 */
// Définition de la fonction my_template_array3
// Cette fonction retourne un tableau contenant les noms de fichiers de modèles disponibles pour notre plugin Wordpress
function my_template_array(){
  $temps = [];

  // Ajout d'un seul modèle disponible nommé "localisation-user.php"
  $temps['localisation-administrator.php'] = 'localisation_administrator';

  // Retour du tableau de modèles
  return $temps;
}
function my_template_array2(){
  $temps = [];

  // Ajout d'un seul modèle disponible nommé "localisation-user.php"
  $temps['localisation-page.php'] = 'localisation_page';

  // Retour du tableau de modèles
  return $temps;
}
function my_template_array3(){
  $temps = [];

  // Ajout d'un seul modèle disponible nommé "localisation-user.php"
  $temps['localisation-user.php'] = 'localisation-user';

  // Retour du tableau de modèles
  return $temps;
}

// Définition de la fonction my_template_register3
// Cette fonction enregistre les modèles disponibles dans notre plugin Wordpress
// Elle prend en entrée trois paramètres :
// $page_templates : tableau des modèles déjà enregistrés dans Wordpress
// $theme : le thème actuellement utilisé dans Wordpress
// $post : l'objet post correspondant à la page en cours
function my_template_register($page_templates, $theme, $post){
  // Récupération du tableau de modèles défini par la fonction my_template_array3
  $templates = my_template_array();

  // Boucle sur le tableau de modèles pour ajouter chaque modèle au tableau $page_templates
  foreach ($templates as $tk => $tv) {
    $page_templates[$tk] = $tv;
  }

  // Retour du tableau $page_templates mis à jour
  return $page_templates;
}
function my_template_register2($page_templates, $theme, $post){
  // Récupération du tableau de modèles défini par la fonction my_template_array3
  $templates = my_template_array2();

  // Boucle sur le tableau de modèles pour ajouter chaque modèle au tableau $page_templates
  foreach ($templates as $tk => $tv) {
    $page_templates[$tk] = $tv;
  }

  // Retour du tableau $page_templates mis à jour
  return $page_templates;
}
function my_template_register3($page_templates, $theme, $post){
  // Récupération du tableau de modèles défini par la fonction my_template_array3
  $templates = my_template_array3();

  // Boucle sur le tableau de modèles pour ajouter chaque modèle au tableau $page_templates
  foreach ($templates as $tk => $tv) {
    $page_templates[$tk] = $tv;
  }

  // Retour du tableau $page_templates mis à jour
  return $page_templates;
}

// Définition de la fonction my_template_select3
// Cette fonction sélectionne le modèle à utiliser pour une page donnée
// Elle prend en entrée un paramètre $template correspondant au modèle par défaut de Wordpress
function my_template_select($template){
  // Définition de variables globales nécessaires pour notre plugin Wordpress
  global $post, $wp_querry, $wpdb;

  // Récupération du nom de fichier du modèle actuellement utilisé pour la page en cours
  $page_temp_slug = get_page_template_slug($post->ID);

  // Récupération du tableau de modèles défini par la fonction my_template_array3
  $templates = my_template_array();

  // Vérification si le nom de fichier du modèle actuel est présent dans le tableau de modèles
  if (isset($templates[$page_temp_slug])) {
    // Si oui, définition du chemin d'accès au fichier de modèle correspondant
    $template = plugin_dir_path(__FILE__) . '../templates/' . $page_temp_slug;
  }

  // Retour du chemin d'accès au modèle choisi
  return $template;
}
function my_template_select2($template){
  // Définition de variables globales nécessaires pour notre plugin Wordpress
  global $post, $wp_querry, $wpdb;

  // Récupération du nom de fichier du modèle actuellement utilisé pour la page en cours
  $page_temp_slug = get_page_template_slug($post->ID);

  // Récupération du tableau de modèles défini par la fonction my_template_array3
  $templates = my_template_array2();

  // Vérification si le nom de fichier du modèle actuel est présent dans le tableau de modèles
  if (isset($templates[$page_temp_slug])) {
    // Si oui, définition du chemin d'accès au fichier de modèle correspondant
    $template = plugin_dir_path(__FILE__) . '../templates/' . $page_temp_slug;
  }

  // Retour du chemin d'accès au modèle choisi
  return $template;
}
function my_template_select3($template){
  // Définition de variables globales nécessaires pour notre plugin Wordpress
  global $post, $wp_querry, $wpdb;

  // Récupération du nom de fichier du modèle actuellement utilisé pour la page en cours
  $page_temp_slug = get_page_template_slug($post->ID);

  // Récupération du tableau de modèles défini par la fonction my_template_array3
  $templates = my_template_array3();

  // Vérification si le nom de fichier du modèle actuel est présent dans le tableau de modèles
  if (isset($templates[$page_temp_slug])) {
    // Si oui, définition du chemin d'accès au fichier de modèle correspondant
    $template = plugin_dir_path(__FILE__) . '../templates/' . $page_temp_slug;
  }

  // Retour du chemin d'accès au modèle choisi
  return $template;
}

// Définition de la fonction menu_administration
// Cette fonction permet d'ajouter deux menu et de supprimer certains menu pour ceux qui ne sont pas admin notamment pour les professionel.



/**
 * Fonction pour gérer les opérations liées aux colliers, y compris
 * l'ajout et la suppression de colliers.
 * 
 * Utilise la base de données WordPress pour stocker les informations sur les colliers.
 * 
 * @uses wpdb Classe WordPress pour se connecter à la base de données.
 * @uses ABSPATH Constante définie dans wp-config.php, indiquant le chemin absolu vers l'installation de WordPress.
 * 
 * @return Affiche des formulaires HTML pour ajouter ou supprimer un collier,
 *         puis gère la soumission des formulaires pour effectuer les opérations correspondantes sur la base de données.
 */
function collar(){
  require_once ABSPATH . 'wp-admin/includes/upgrade.php';
  global $wpdb;
  $table_categories = $wpdb->prefix . 'collier';
  $resultat = $wpdb->get_results("SELECT * FROM $table_categories ");
/*
  // Array of WP_User objects.
  echo '
  <h1>Ajouter un collier:</h1>

  <form name="add_collar" method="post">';
echo ' 
  <input class="add_collar" type="text" name="name_of_collar" size=15 placeholder="Nom du collier"></input>
  <input type="number" name="course" size=15 placeholder="Nom du parcour"></input>

    <input class="custom-btn btn-add" type="submit" name="add_collar" value="Ajouter">
  </form>';*/

  echo '
  <h1>Supprimer un collier:</h1>

  <form name="del_collar" method="post">
  <div class="dropdown dropdown-dark">
    <select class="dropdown-select" name="name_of_collar" id="name_of_collar">
  <option value="">Collier à supprimer</option>';
  foreach ($resultat as $colier) {
    $i = 0;
    echo '<option value="' . $colier->nom_collier . '">' . $colier->nom_collier . ' (' . $colier->animal . ')</option>';
    ++$i;
  }
  echo '        
  </select>
  </div><br>

    <input class="custom-btn-del btn-del" type="submit" name="del_collar" value="Supprimer">
  </form>';


  if (isset($_POST['add_collar'])) {
    require_once ABSPATH . 'wp-admin/includes/upgrade.php';
    global $wpdb;

    $name_of_collar = $_POST['name_of_collar'];
    $course = $_POST['course'];
    $table = $wpdb->prefix . 'collier';
    $data = array('nom_collier' => $name_of_collar, 'parcours' => $course);
    $format = array('%s', '%d');
    $wpdb->insert($table, $data, $format);
  }

  if (isset($_POST['del_collar'])) {

    require_once ABSPATH . 'wp-admin/includes/upgrade.php';
    global $wpdb;


    $name_of_collar = $_POST['name_of_collar'];
    //Supprime le colier
    $table = $wpdb->prefix . 'collier';
    $data = array('nom_collier' => $name_of_collar);
    $format = array('%s');
    $wpdb->delete($table, $data, $format);

    //maj des autre bdd contenant l'information
    $table_collar = $wpdb->prefix . 'animal';

    $data_collar = array('nom_collier' => NULL);
    $where_collar = array('nom_collier' => $name_of_collar);
    $format_collar = array(NULL);
    $format_where = array('%s');
    $wpdb->update($table_collar, $data_collar, $where_collar, $format_collar, $format_where);
  }
}
/**
 * Function animal()
 * 
 * La fonction crée deux formulaires pour ajouter et supprimer un animal de la base de données.
 * Le premier formulaire requiert le nom de l'animal, le propriétaire, l'espèce et le collier.
 * Le second formulaire ne requiert que le nom de l'animal à supprimer.
 * 
 * @global $wpdb (Object) Objet de la base de données de WordPress
 * 
 * @return HTML Form
 */
function animal(){
  require_once ABSPATH . 'wp-admin/includes/upgrade.php';
  global $wpdb;

  // Récupération des utilisateurs
  $users = get_users();

  // Récupération des données collier, animal, espece
  $table_categories = $wpdb->prefix . 'collier';
  $resultat = $wpdb->get_results("SELECT * FROM $table_categories");
  $table_categories_animal = $wpdb->prefix . 'animal';
  $resultat_animal = $wpdb->get_results("SELECT * FROM $table_categories_animal");
  $table_categories_espece = $wpdb->prefix . 'espece';
  $resultat_espece = $wpdb->get_results("SELECT * FROM $table_categories_espece");


  echo '
  <h1>Ajouter un animal:</h1>

  <form name="add_animal" method="post">
  <input class="dropdown dropdown-dark" type="text" name="name_of_animal" size=15 placeholder="Animal"><br><br>
  <div class="dropdown dropdown-dark">
    <select class="dropdown-select" name="owner" id="owner">
    <option value="">Choisissez le proprietaire</option>
    ';
    // Boucle pour afficher les utilisateurs dans la liste déroulante pour l'ajout d'un animal afin d'y deffinir le proprietaire
    foreach ($users as $user) {
      $i = 0;
      echo '<option value="' . $user->user_login . '">' . $user->user_login . '</option>';
      ++$i;
    }
    echo '        
    </select>
  </div><br><br>
  <div class="dropdown dropdown-dark">
    <select class="dropdown-select" name="spacies" id="spacies">
    <option value="">Choisissez l\'espece de l\'animal</option>
    ';
    // Boucle pour afficher les especes créer par l'administrateur
    foreach ($resultat_espece as $espece) {
      echo '<option value="' . $espece->nom_espece . '">' . $espece->nom_espece . '</option>';
    }
    echo '        
    </select>
  </div><br><br>
  <div class="block">
  <div class="dropdown dropdown-dark">
    <select class="dropdown-select" name="collar_name" id="collar_name">
    <option value="">Choisissez le collier</option>
    ';
    // Boucle pour afficher les colliers disponibles dans la liste déroulante pour l'assigner à un animal
    foreach ($resultat as $collier) {
      $animal = $collier->animal;
      if ($animal == NULL) {
        echo '<option value="' . $collier->nom_collier . '">' . $collier->nom_collier . '</option>';
      }
    }
    echo '        
    </select>
  </div><br><br>

    <input class="custom-btn btn-add" type="submit" name="add_animal" value="Ajouter">
  </form>
  </div>';
  echo '
  <h1>Supprimer un animal:</h1>

  <div class="dropdown dropdown-dark">
    <form name="del_animal" method="post">
    <select class="dropdown-select" class="del_collar" name="name_of_animal" id="name_of_animal">
    <option value="">Choisissez qui désassigner</option>
    ';
    foreach ($resultat_animal as $animal) {
      echo '<option value="' . $animal->nom . '">' . $animal->nom . ' (' . $animal->proprietaire . ')</option>';
    }
    echo '        
    </select>
    ';
    foreach ($resultat_animal as $animal) {
      echo '<input type="hidden" name="collar_name" value="' . $animal->nom_collier . '"></input>';
    }

    echo '
      <input class="custom-btn-del btn-del" type="submit" name="del_animal" value="Supprimer">
    </form>
  </div>';

  // Ajouter un animal en base de donnée et l'assigner a un collier 
  if (isset($_POST['add_animal'])) {
    require_once ABSPATH . 'wp-admin/includes/upgrade.php';
    global $wpdb;
    // Récuperation des données du formulaires
    $name_of_animal = $_POST['name_of_animal'];
    $collar_name = $_POST['collar_name'];
    $spacies = $_POST['spacies'];

    // Creer dans la base de donnée l'animal
    $owner = $_POST['owner'];
    $table_animal = $wpdb->prefix . 'animal';
    $data_animal = array('nom' => $name_of_animal, 'proprietaire' => $owner, 'nom_collier' => $collar_name, 'espece' => $spacies);
    $format_data_animal = array('%s', '%s', '%s', '%s');
    $wpdb->insert($table_animal, $data_animal, $format_data_animal);

    // Enregistre dans la base de donnée du collier le nom de l'animal que l'on viens de créer      
    $table_collar = $wpdb->prefix . 'collier';
    $data_collar = array('animal' => $name_of_animal);
    $where_collar = array('nom_collier' => $collar_name);
    $format_collar = array('%s');
    $format_where = array('%s');

    $wpdb->update($table_collar, $data_collar, $where_collar, $format_collar, $format_where);
  }
  // Supprimer un animal et déassigner un colier de l'animal 
  if (isset($_POST['del_animal'])) {
    require_once ABSPATH . 'wp-admin/includes/upgrade.php';
    global $wpdb;

    $name_of_animal = $_POST['name_of_animal'];
    $table = $wpdb->prefix . 'animal';
    $data = array('nom' => $name_of_animal);
    $format = array('%s');
    $wpdb->delete($table, $data, $format);

    $collar_name = $_POST['collar_name'];
    $table_collar = $wpdb->prefix . 'collier';

    $data_collar = array('animal' => NULL);
    $where_collar = array('nom_collier' => $collar_name);
    $format_collar = array(NULL);
    $format_where = array('%s');
    $wpdb->update($table_collar, $data_collar, $where_collar, $format_collar, $format_where);
  }

}

/**
 * Fonction recap()
 * Cette fonction affiche un récapitulatif des informations sur les animaux présents dans la base de données.
 * Il lit les données à partir de la table "animal" dans la base de données de WordPress.
 * Les informations affichées sont le nom de l'animal, le propriétaire et le collier.
 * @global $wpdb (Objet) Objet de la base de données de WordPress
 * @return HTML Table
 */
function recap(){
  require_once ABSPATH . 'wp-admin/includes/upgrade.php';
  global $wpdb;
  // Récupere les informations en base de donnée
  $table_categories_animal = $wpdb->prefix . 'animal';
  $resultat_animal = $wpdb->get_results("SELECT * FROM $table_categories_animal");

  echo '
  <h1>Récapitulatif des utilisations </h1>
  
 <table class="table-center">
  <tbody>
      <tr>
          <td class="ligne-admin">Propriétaire</td>
          <td class="ligne-admin">Animal</td>
          <td class="ligne-admin">Collier</td>
      </tr>
      ';
  // Ajoute au tableau les informations de l'animal et du collier qui sont eux meme assigner.
  foreach ($resultat_animal as $animal) {
    echo '
    <tr>
      <td class="ligne-admin">' . $animal->proprietaire . '</td>
      <td class="ligne-admin">' . $animal->nom . '</td>
      <td class="ligne-admin">' . $animal->nom_collier . '</td>
    </tr>
      ';
  }
  echo '

  </tbody>
  </table> 
  ';
}
/**
 * La fonction form_information_animal() gère l'ajout et la mise à jour des informations d'un animal dans la base de données de WordPress.
 * Elle crée un formulaire qui requiert le nom de l'animal, la race, et l'image associée.
 * Elle utilise l'objet $wpdb de WordPress pour se connecter à la base de données et effectuer des opérations telles que la sélection et la mise à jour de données.
 * L'utilisateur actuel est obtenu à l'aide de la fonction wp_get_current_user() de WordPress et est utilisé pour vérifier si l'animal appartient bien à l'utilisateur connecté.
 * Les erreurs sont gérées en affichant des messages d'erreur si les informations requises ne sont pas fournies.
 * Si les informations sont valides, elles sont mises à jour dans la base de données.
 * @global $wpdb (Object) Objet de la base de données de WordPress
 * @return HTML Form
 */
function form_information_animal(){
  require_once ABSPATH . 'wp-admin/includes/upgrade.php';
  global $wpdb;
  $user = wp_get_current_user();
  $user_login = $user->user_login;

  $table_categories = $wpdb->prefix . 'animal';
  $resultat = $wpdb->get_results("SELECT * FROM $table_categories ");
  echo '
  <div class="boxlocalisation">
    <h1>Ajouter des informations<br> Sur Votre Animal</h1>
    <form name="form_animal" class="form_animal" method="post" enctype="multipart/form-data">
      <div class="dropdown dropdown-dark">
        <select class="dropdown-select" name="name_animal" id="name_animal">
        <option value="">--Choisissez un animal--</option>';
  // Boucle pour afficher tous les animaux appartenant à l'utilisateur connecté
  foreach ($resultat as $animal) {
    if ($animal->proprietaire == $user_login) {
      echo '<tr>
              <option value="' . $animal->nom . '">' . $animal->nom . '</option>        
              ';
    }
  }
  echo '</select></div><br>
        <input type="text" class="dropdown dropdown-dark" name="race" placeholder="Race de l\'animal"><br>
        <input type="file" class="img_animal" name="img_animal" ><br>
        <input type="submit" class="custom-btn btn-add" name="form_animal" >
    </form>
  </div> ';

  if (isset($_POST['form_animal'])) {
    // Récupere les données entré dans le formulaire
    $animal = $_POST['name_animal'];
    $race = $_POST['race'];
    $img_animal = file_get_contents($_FILES['img_animal']['tmp_name']);

    // Mise en place des messages d'erreure et de validation selon les données envoyé
    if ($animal == NULL) {
      echo '<h2 class="error">Veuillez ajouter des informations sur l\'animal !</h2></div>';
    } else if ($race == NULL && $img_animal == NULL) {
      echo '<h2 class="error">Veuillez ajouter des informations sur l\'animal !</h2></div>';
    } else if ($race && $img_animal == NULL) {
      require_once ABSPATH . 'wp-admin/includes/upgrade.php';
      global $wpdb;
      $table_collar = $wpdb->prefix . 'animal';

      $data_collar = array('race' => $race);
      $where_collar = array('nom' => $animal, 'proprietaire' => $user_login);
      $format_collar = array('%s');
      $format_where = array('%s', '%s');
      $wpdb->update($table_collar, $data_collar, $where_collar, $format_collar, $format_where);
      echo '<h2 class="valid">La race de votre animal a bien été enregistrer</h2></div>';
    } else if ($race == NULL && $img_animal) {
      require_once ABSPATH . 'wp-admin/includes/upgrade.php';
      global $wpdb;
      $table_collar = $wpdb->prefix . 'animal';

      $data_collar = array('img' => $img_animal);
      $where_collar = array('nom' => $animal, 'proprietaire' => $user_login);
      $format_collar = array('%s');
      $format_where = array('%s', '%s');
      $wpdb->update($table_collar, $data_collar, $where_collar, $format_collar, $format_where);
      echo '<h2 class="valid">L\'image de votre animal a été enregistrer</h2></div>';
    } else if ($race && $img_animal) {
      require_once ABSPATH . 'wp-admin/includes/upgrade.php';
      global $wpdb;
      $table_collar = $wpdb->prefix . 'animal';

      $data_collar = array('img' => $img_animal, 'race' => $race);
      $where_collar = array('nom' => $animal, 'proprietaire' => $user_login);
      $format_collar = array('%s', '%s');
      $format_where = array('%s', '%s');
      $wpdb->update($table_collar, $data_collar, $where_collar, $format_collar, $format_where);
      echo '<h2 class="valid">Les informations ont été enregistrés</h2></div>';
    }
  }
}
/**
 * Function affichage_animal()
 * La fonction affiche les informations des animaux appartenant à l'utilisateur actuel depuis la base de données de WordPress.
 * Si l'image de l'animal est présente dans la base de données, elle est convertie en format PNG et enregistrée dans le serveur.
 * Sinon, une image par défaut est affichée.
 * Pour chaque animal, un formulaire est généré pour permettre à l'utilisateur de localiser l'animal à l'aide du collier.
 * @global $wpdb (Object) Objet de la base de données de WordPress
 * @uses wp_get_current_user() Fonction de récupération de l'utilisateur actuel de WordPress
 * @uses imagecreatefromstring() Fonction de conversion de la chaine d'image en image PNG
 * @uses imagepng() Fonction d'enregistrement de l'image sur le serveur
 * @uses imagedestroy() Fonction de libération de la mémoire
 * @return HTML Form pour localiser un animal
 */
function affichage_animal(){
  global $wpdb;
  $user = wp_get_current_user();
  $user_login = $user->user_login;

  $table_categories = $wpdb->prefix . 'animal';
  $resultat = $wpdb->get_results("SELECT * FROM $table_categories");

  $i = 0;
  foreach ($resultat as $animal) {
    // Récupérer les données d'image depuis la base de données
    $image_data = $animal->img;
    // vérifie si il y a des données d'image
    if (!empty($animal->img)) {
//      $img = imagecreatefromstring($animal->img);
      // Encoder les données d'image en base64
      $image_base64 = base64_encode($image_data);

      // Créer une URL pour l'image
      $image_url = 'data:image/png;base64,' . $image_base64;

      if ($img !== false) {
        //enregistre l'image en png
        //imagepng($img, 'image' . $i . '.png');
        // Libere la memoire
        //imagedestroy($img);


        if ($animal->proprietaire == $user_login) {
          echo '
                  <div class="container">
                      <div class="card-custom">
                          <div class="face face1">
                              <div class="content">
                                  <img src="' . $image_url . '">
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
                                <p>Vous souhaitez localiser votre animal nommé(e) ' . $animal->nom . ' grace au collier ' . $animal->nom_collier . ' ? Alors clicker sur Localiser ci-dessous.</p>
                                <input type="submit" class="btn-localiser" name="localiser" value="Localiser">
                              </form>
                              </div>
                          </div>
                      </div>
                  </div>';
        }
      }
      ++$i;
    } else {
      if ($animal->proprietaire == $user_login) {
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

/**
 * Function choose_spacies()
 * La fonction affiche un formulaire permettant de choisir une espèce d'animal.
 * Lorsque l'utilisateur soumet le formulaire, la fonction affiche tous les trajets pour l'espèce choisie.
 * Le trajet est récupéré en interrogeant la base de données de WordPress via l'objet $wpdb.
 * @global $wpdb (Object) Objet de la base de données de WordPress
 * @uses affichage_carte() Fonction pour afficher la carte des trajets
 * @return HTML Form et les informations de parcours pour l'espèce choisie
 */
function choose_spacies(){
  global $wpdb;

  $table_categories = $wpdb->prefix . 'animal';
  $resultat = $wpdb->get_results("SELECT DISTINCT espece FROM $table_categories");
  echo '
  <div class="barre">
      <form name="spacies" method="post" enctype="multipart/form-data">
          <div class="dropdown dropdown-dark">
              <select class="dropdown-select" name="spacies_of_animal" id="name_animal">
                  <option value="">Selectionner l\'espece</option> ';
  // Boucle pour parcourir les résultats de la requête SQL précédente et afficher les espece d'animaux qui sont en base de donnée sur des animaux assignés
  foreach ($resultat as $spacies) {
    echo '<option value="' . $spacies->espece . '">' . $spacies->espece . '</option>';
  }
  echo ' </select>
          </div>
          <input type="submit" name="btn" class="btn-see-all" value="Tout voir">
      </form>
  </div>';

  if (isset($_POST['btn'])) {
    $spacies = $_POST['spacies_of_animal'];
    global $wpdb;
    $table_categories = $wpdb->prefix . 'animal';
    $resultat = $wpdb->get_results("SELECT * FROM $table_categories WHERE espece='$spacies'");
    echo '<h1 class="title">Voici tous les trajets de l\'espece: ' . $spacies . '</h1>';
    // Récupere tous les collier assigné a lespece d'animal sélectionné
    foreach ($resultat as $animal) {
      $name_of_collar = $animal->nom_collier;
      affichage_carte_espece($name_of_collar);
      
    }
  }
}

/**
 * Function affichage_carte_espece()
 * La fonction affiche une carte interactive à l'aide de la bibliothèque Leaflet.
 * Elle utilise des fichiers CDN pour charger Leaflet et définit les propriétés de la carte (latitude, longitude, zoom, fond de carte, etc.).
 * La carte est insérée dans un élément HTML ayant l'ID "map".
 * Un marqueur est également ajouté à la carte en utilisant les coordonnées spécifiées.
 * @return HTML Affichage de la carte
 */
function affichage_carte_espece($name_of_collar) {
  echo '
  <style>
      /* Style CSS pour la carte */
      #map {
          width: 100%;
          height: 100vh;
          /* La carte occupera 100% de la largeur et 100% de la hauteur de la fenêtre */
      }
  </style>';

  //include 'map.php';

  global $wpdb;
  $table_categories = $wpdb->prefix . 'parcours';
  $data = $wpdb->get_results("SELECT id_parcours FROM $table_categories WHERE id_collier='$name_of_collar'");

  echo '<div id="map"></div>';

  echo '<script>
      // Création de la carte
      var map = L.map("map").setView([0, 0], 10);

      // Ajout de la couche de tuiles OpenStreetMap à la carte
      L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
          attribution: "Map data &copy; <a href=\"https://www.openstreetmap.org/\">OpenStreetMap</a> contributors",
          maxZoom: 25,
      }).addTo(map);
  </script>';

  $colors = array('red', 'blue', 'green', 'orange', 'purple', 'yellow', 'cyan', 'magenta');
  $colorIndex = 0;

  foreach ($data as $parcours) {
      $id_parcours = $parcours->id_parcours;
      $table_categories = $wpdb->prefix . 'parcours_' . $id_parcours;
      $res = $wpdb->get_results("SELECT * FROM $table_categories");
          

      echo '<script>';
      echo 'var polylinePoints = [];';

      foreach ($res as $trajet) {
          $latitude = $trajet->latitude;
          $longitude = $trajet->longitude;
          $altitude = $trajet->altitude;
          $heureDebut = $trajet->heure_debut;
          $itineraire = "https://www.openstreetmap.org/directions?engine=osrm&route=" . $latitude . "," . $longitude . "," . $altitude;
          $color = $colors[$colorIndex];

          echo '
          var marker = L.marker([' . $latitude . ', ' . $longitude . '])
              .addTo(map)
              .bindPopup("Heure de passage: ' . $heureDebut . '<br>Itinéraire: <a href=\'' . $itineraire . '\' target=\'_blank\'>Go</a>")
              .openPopup();
          ';

          echo 'polylinePoints.push([' . $latitude . ', ' . $longitude . ']);';
      }

      echo '
      var polyline = L.polyline(polylinePoints, { color: "' . $color . '" }).addTo(map);
      map.fitBounds(polyline.getBounds());
      ';
      echo '</script>';

      $colorIndex++;
  }
}





/**
 * Function affichage_carte()
 * La fonction affiche une carte interactive à l'aide de la bibliothèque Leaflet.
 * Elle utilise des fichiers CDN pour charger Leaflet et définit les propriétés de la carte (latitude, longitude, zoom, fond de carte, etc.).
 * La carte est insérée dans un élément HTML ayant l'ID "map".
 * Un marqueur est également ajouté à la carte en utilisant les coordonnées spécifiées.
 * @return HTML Affichage de la carte
 */
function affichage_carte($name_of_collar){
  echo '
  <style>
  /* Style CSS pour la carte */
  #map {
      width: 100%;
      height: 100vh;
      /* La carte occupera 100% de la largeur et 100% de la hauteur de la fenêtre */
  }

</style>
            <div class="map-animal">';
	    // Inclusion du fichier database.php permet de se connecter à la base de données et accédé au trajet
		    include 'database.php';
		    // Inclusion du fichier map.php contenant le code pour afficher la carte et et les points ainsi que les relation 
		    include 'map.php'; 
            echo '</div>
            ';

}

/**
 * Function spacies()
 * Cette fonction crée une table avec un formulaire pour ajouter et supprimer une espèce de la base de données.
 * Le premier formulaire requiert le nom de l'espèce.
 * Le second formulaire ne requiert que le nom de l'espèce à supprimer.
 * @global $wpdb (Object) Objet de la base de données de WordPress
 * @uses select_fonction() Fonction pour générer le select contenant les nouvelles informations
 * @return HTML Table avec formulaires
 */
function spacies(){

  echo '  <br><br>
  <div class="barre2">  
        <table>
                <caption class="titre_de_tableau">Espece</caption>
                <tr>
                    <th>Select</th>
                    <th>Champ à ajouter</th>
                    <th>Champ à Supprimer</th>
                    <th>Liste des especes disponible</th>
                </tr><tr>
                <form name="formulaire"  method="post">
                    <td><p>Espece</p></td>
                    <td>
                        <form name="add" method="post">
                            <input class="dropdown dropdown-dark" type="text" name="add_field" id="name_animal" size=15 placeholder="texte"><br><br>
                            <input class="custom-btn-del btn-del" type="submit" name="add" value="Ajouter">
                        </form>
                    </td>
                    <td>
                        <form name="delete" method="post">
                            <input class="dropdown dropdown-dark" type="text" name="delete_field" size=15 placeholder="texte"><br><br>
                            <input class="custom-btn-del btn-del" type="submit" name="delete" value="Supprimer">
                        </form>
                    </td>'; ?>
                    <?php select_fonction(); ?>
                    <?php echo '<br><br>
    
    
                </form></tr>
        </table>
    </div><br><br><br><br><br>'; ?>

  <?php
  if (isset($_POST['add']) || isset($_POST['delete'])) {

    require_once ABSPATH . 'wp-admin/includes/upgrade.php';
    global $wpdb;

    if (isset($_POST['add'])) {
      $add_spacies = $_POST['add_field'];
      $table = $wpdb->prefix . 'espece';
      $data = array('nom_espece' => $add_spacies);
      $format = array('%s');
      $wpdb->insert($table, $data, $format);

    }

    if (isset($_POST['delete'])) {
      $del_spacies = $_POST['delete_field'];
      $table = $wpdb->prefix . 'espece';
      $data = array('nom_espece' => $del_spacies);
      $format = array('%s');
      $wpdb->delete($table, $data, $format);

    }
  }
}

/**
 * Function select_fonction()
 * La fonction crée un formulaire sélecteur pour afficher les différentes espèces enregistrées dans la base de données de WordPress.
 * @global $wpdb (Object) Objet de la base de données de WordPress
 * @return HTML Form (select)
 */
function select_fonction(){

  echo '<td>';

  require_once ABSPATH . 'wp-admin/includes/upgrade.php';
  global $wpdb;
  $table_categories = $wpdb->prefix . 'espece';
  $resultat = $wpdb->get_results("SELECT * FROM $table_categories");

  echo '
  <form name="spacies" method="post" enctype="multipart/form-data">
  <div class="dropdown dropdown-dark">
      <select class="dropdown-select" name="spacies_of_animal" id="name_animal">
          <option value="">Selectionner l\'espece</option> ';
// Boucle pour parcourir les résultats de la requête SQL précédente et afficher les espece d'animaux qui sont en base de donnée sur des animaux assignés
  foreach ($resultat as $espece) {
    echo '<option value="' . $espece->nom_espece . '">' . $espece->nom_espece . '</option>';
  }
echo ' </select>
  </div>
</form> </td>
';

}
?>