/*const mqtt = require('mqtt');

// Configuration de l'application TTN
const appId = 'reciever-mapets'; // remplacer par l'ID de votre application TTN
const accessKey = 'NNSXS.JMGNXLYHEK2E6ZXBJDO475LKTTULRB4NSPBJPPQ.2M2FJNJKJAJ2HOPI3QXE3JBZBXIMFZYJ3NEHTQU6KQZPLQJYJHUQ'; // remplacer par votre clé d'accès TTN

var client = mqtt.connect("mqtt://eu1.cloud.thethings.network", {
    username: appId,
    password: accessKey,
    port: 1883
});
client.on("connect", function () {
  console.log("Connecté à l'API MQTT de The Things Network");
  // Souscription à un topic
  client.subscribe("v3/reciever-mapets@ttn/devices/collier-envoie-de-donnee-brut/up");
});

client.on("error", function (error) {
  console.error("Une erreur s'est produite lors de la connexion à l'API MQTT de The Things Network :", error);
});

document.getElementById('create-device-form').addEventListener('submit', function(event) {
  console.log('passe');
  client.connect();
});

// Configuration de l'application TTN
const region = 'eu';
const appId = 'reciever-mapets';
const accessKey = 'NNSXS.JMGNXLYHEK2E6ZXBJDO475LKTTULRB4NSPBJPPQ.2M2FJNJKJAJ2HOPI3QXE3JBZBXIMFZYJ3NEHTQU6KQZPLQJYJHUQ';

// Configuration du client MQTT
const client = mqtt.connect(`mqtt://eu1.cloud.thethings.network`, {
  username: appId,
  password: accessKey
});

// Événement connect du client MQTT
client.on('connect', () => {
  console.log('Client MQTT connecté');

  // Événement submit du formulaire pour publier un message
  const form = document.getElementById('create-device-form');
  form.addEventListener('submit', (event) => {
    event.preventDefault(); // empêche la soumission normale du formulaire

    // Récupération des valeurs du formulaire
    const deviceName = document.getElementById('collier-nom').value;
    const deviceDevEUI = document.getElementById('collier-deveui').value;

    // Message JSON à publier sur le topic TTN
    const message = {
      end_device_ids: {
        device_id: deviceName,
        dev_eui: deviceDevEUI
      }
      // d'autres propriétés du device peuvent être ajoutées ici
    };

    // Publication du message sur le topic TTN
    client.publish(`v3/reciever-mapets@ttn/devices/collier-envoie-de-donnee-brut/up`, JSON.stringify(message), (error) => {
      if (error) {
        console.error('Erreur lors de la publication du message :', error);
      } else {
        console.log('Message publié avec succès');
      }
    });
  });
});

// Événement error du client MQTT
client.on('error', (error) => {
  console.error('Erreur de connexion au client MQTT :', error);
});
*/