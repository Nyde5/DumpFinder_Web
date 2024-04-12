

// Definire la funzione di gestione degli eventi quando la richiesta è completata
// xhr.onreadystatechange = function() {
//     if (xhr.readyState === XMLHttpRequest.DONE) {
//         if (xhr.status === 200) {
//             // La richiesta è stata completata con successo
//             console.log(xhr.responseText);
//             // Puoi manipolare la risposta qui
//         } else {
//             // C'è stato un errore nella richiesta
//             console.error('Si è verificato un errore:', xhr.status);
//         }
//     }
// };



// // Creare un oggetto XMLHttpRequest
// var xhr = new XMLHttpRequest();

// // Definire il metodo HTTP e l'URL del proxy PHP che inoltrerà la richiesta al server remoto
// var metodo = "GET";
// var url = "http://dumpfinder.altervista.org/my_dumpfinder/WEB/proxy.php";

// // Aprire la richiesta con il metodo e l'URL specificati
// xhr.open(metodo, url, true);
// xhr.responseType = 'json';

// // Invia la richiesta
// xhr.send();

// xhr.onload = () => {
//     const response = xhr.response;
//     console.log(response);
// };


// Crea una richiesta XMLHttpRequest
$.getJSON ('./stat.php', showResult);

function showResult(result){
  console.log(result);
}


// var xhr = new XMLHttpRequest();



// // Imposta il metodo e l'URL della richiesta
// xhr.open("POST", "../php/stat.php");

// // Invia la richiesta
// xhr.send();

// // Gestisce la risposta
// xhr.onload = function() {
//   if (xhr.status === 200) {
//     // La richiesta ha avuto successo
//     var data = JSON.parse(xhr.responseText);
//     // Usa i dati ricevuti dalla pagina PHP
//   } else {
//     // La richiesta ha fallito
//     console.error("Errore durante la richiesta: " + xhr.status);
//   }
// };
