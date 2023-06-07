<div id="map"></div>

<script>
    // Création de la carte et définir la vue initiale en utilisant les coordonnées du premier élément dans le tableau1
    var map = L.map('map').setView([<?php echo $tableau1[0]['latitude']; ?>, <?php echo $tableau1[0]['longitude'];?>, <?php echo $tableau1[0]['altitude']; ?>], 16.5);

    // Ajout de la couche de tuiles OpenStreetMap à la carte
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors',
        maxZoom: 25,
    }).addTo(map);

    // Création du premier menu déroulant pour choisir l'icône et la couleur
    var selectIcon1 = document.createElement('select');
    selectIcon1.addEventListener('change', function () {
        customIcon1.options.iconUrl = this.value;
        // Parcourir toutes les couches de la carte pour mettre à jour l'icône des marqueurs qui utilisent customIcon1
        map.eachLayer(function (layer) {
            if (layer instanceof L.Marker && layer.options.icon === customIcon1) {
                layer.setIcon(customIcon1);
            }
        });
        // Mettre à jour la couleur de la polyline du premier tracé
        updatePolylineColor1(selectColor1.value);
    });

    // Création des options pour le premier menu déroulant
    var option1Dog = document.createElement('option');
    option1Dog.value = '/wp-content/plugins/admin_templates/includes/images/dog.png';
    option1Dog.text = 'Chien';
    selectIcon1.add(option1Dog);
    var option1Cat = document.createElement('option');
    option1Cat.value = '/wp-content/plugins/admin_templates/includes/images/cat2.png';
    option1Cat.text = 'Chat';
    selectIcon1.add(option1Cat);
    var option1Oiseaux = document.createElement('option');
    option1Oiseaux.value = '/wp-content/plugins/admin_templates/includes/images/oiseaux.png';
    option1Oiseaux.text = 'Oiseaux';
    selectIcon1.add(option1Oiseaux);

    // Création du menu déroulant pour choisir la couleur du premier tracé
    var selectColor1 = document.createElement('select');
    selectColor1.addEventListener('change', function () {
        // Mettre à jour la couleur de la polyline du premier tracé
        updatePolylineColor1(this.value);
    });

    // Création des options pour le menu déroulant de couleur du premier tracé
    var option1Red = document.createElement('option');
    option1Red.value = 'red';
    option1Red.text = 'Rouge';
    selectColor1.add(option1Red);
    var option1Blue = document.createElement('option');
    option1Blue.value = 'blue';
    option1Blue.text = 'Bleu';
    selectColor1.add(option1Blue);
    // Ajouter d'autres options de couleur si nécessaire

    // Création de l'icône personnalisée pour le premier tracé
    var customIcon1 = L.icon({
        // Chemin d'accès à l'image pour le premier tracé
        iconUrl: option1Dog.value,
        iconSize: [20, 20], // Taille
    iconAnchor: [10, 30], // Place de l'icone 
    popupAnchor: [0, -50] // Placer la popup 
    });
    // Création de l'icône personnalisée pour le deuxième tracé
    var customIcon2 = L.icon({
        // Chemin d'accès à l'image pour le deuxième tracé
        iconUrl: option1Cat.value,
        iconSize: [32, 32],
        iconAnchor: [16, 32],
    });
    var customIcon3 = L.icon({
        // Chemin d'accès à l'image pour le deuxième tracé
        iconUrl: option1Oiseaux.value,
        iconSize: [32, 32],
        iconAnchor: [16, 32],
    });
    // Création d'un tableau pour stocker les points de la polyline du premier tracé
    var polylinePoints1 = [];
    var espece = '<?php echo $espece; ?>';

    var customIcon;

    if (espece == 'Chien') {
        customIcon = customIcon1;
    } else if (espece == 'Chat') {
        customIcon = customIcon2;
    } else if (espece == 'Oiseaux') {
        customIcon = customIcon3;
    }

    <?php foreach ($tableau1 as $data): ?>
        var latitude = <?php echo $data['latitude']; ?>;
        var longitude = <?php echo $data['longitude']; ?>;
        var altitude = <?php echo $data['altitude']; ?>;
        var heureDebut = '<?php echo $data['heure_debut']; ?>';
        var itineraire = 'https://www.openstreetmap.org/directions?engine=osrm&route=' + latitude + ',' + longitude + ',' + altitude;

        // Création d'un marqueur à partir des coordonnées et de l'icône personnalisée, ajout du marqueur à la carte
        var marker = L.marker([latitude, longitude, altitude], { icon: customIcon })
            .addTo(map)
            .bindPopup('Heure de passage: ' + heureDebut + '<br>Itinéraire: <a href="' + itineraire + '" target="_blank">Go</a>')
            .openPopup();


        // Ajout du point à la polyline du premier tracé
        polylinePoints1.push([latitude, longitude, altitude]);
    <?php endforeach; ?> 

    // Ajout de la polyline du premier tracé à la carte avec une couleur par défaut
    var polyline1 = L.polyline(polylinePoints1).addTo(map);

    function updatePolylineColor1(color) {
        polyline1.setStyle({ color: color });
    }

    if (espece == 'Chien') {
        updatePolylineColor1('blue');
    } else if (espece == 'Chat') {
        updatePolylineColor1('red');
    } else if (espece == 'Oiseaux') {
        updatePolylineColor1('green');
    }

</script>
