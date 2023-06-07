<div id="map"></div>

<script>
    // Création de la carte et définir la vue initiale en utilisant les coordonnées du premier élément dans le tableau1
    var map = L.map('map').setView([<?php echo $tableau1[0]['latitude']; ?>, <?php echo $tableau1[0]['longitude'];?>, <?php echo $tableau1[0]['altitude']; ?>], 16.5);

    // Ajout de la couche de tuiles OpenStreetMap à la carte
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors',
        maxZoom: 25,
    }).addTo(map);

</script>
