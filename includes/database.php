<?php
// Connexion à la base de données
$servername = "localhost";
$username = "cartographie";
$password = "mapetspassword";
$dbname = "projet";
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Vérifier la connexion
if (!$conn) {
    die("La connexion à la base de données a échoué : " . mysqli_connect_error());
}


$sql = "SELECT id_parcours FROM wp_parcours WHERE id_collier = '$name_of_collar' ORDER BY id_parcours DESC LIMIT 1;";
$res = $conn->query($sql);

if ($res->num_rows > 0) {
    $row = $res->fetch_assoc();
    $id_parcours = $row['id_parcours'];
}

// Requête SQL pour récupérer les données de wp_parcours_id_parcours
$parcours = "wp_parcours_$id_parcours";
$sql1 = "SELECT longitude, latitude, altitude FROM $parcours";
$res1 = $conn->query($sql1);

// Récupération de l'heure de début depuis wp_parcours
$heure_debut = '';
$sql2 = "SELECT heure_debut FROM wp_parcours WHERE id_collier = '$name_of_collar'"; // Remplacez <ID_PARCOURS> par l'identifiant du parcours souhaité
$res2 = $conn->query($sql2);


if ($res2->num_rows > 0) {
    $row2 = $res2->fetch_assoc();
    $heure_debut = $row2["heure_debut"];
}
// Code PHP pour récupérer la valeur de espece depuis la base de données
$sql3 = "SELECT espece FROM wp_animal WHERE nom_collier = '$name_of_collar'";
$res3 = $conn->query($sql3);

if ($res3->num_rows > 0) {
    $row3 = $res3->fetch_assoc();
    $espece = $row3['espece'];
}
// Création d'un tableau vide pour le tracé
$tableau1 = array();
$temps = 0; // Variable pour suivre le temps (en secondes)

if ($res1->num_rows > 0) {
    while ($row = $res1->fetch_assoc()) {
        $data = array(
            "latitude" => $row["latitude"],
            "longitude" => $row["longitude"],
            "altitude" => $row["altitude"],
            "heure_debut" => $heure_debut, // Ajouter l'heure de début actuelle au point
        );

        // Ajout du sous-tableau au tableau principal
        $tableau1[] = $data;

        // Ajouter 17 secondes à l'heure de début pour le prochain point
        $heure_debut = date("H:i:s", strtotime($heure_debut) + 17);
    }
} else {
    echo "0 results for Tracé 1<br>\n";
}

// Fermer la connexion
mysqli_close($conn);
?>