/*  Q1

  Depuis la console de votre navigateur, faites des appels à la fonction getLegos
  en passant successivement en paramètre 'creator', 'creator expert', 'star wars'.

  Puis en vous documentant que la propriété HTML onclick (https://www.w3schools.com/TAgs/att_onclick.asp)
  modifiez index.html pour rendre le menu de navigatrion pleinement fonctionnel.

  Note : l'usage de la propriété onclick est valide mais possède plusieurs inconvénients.
  Plus tard, nous verrons une meilleure solution. Donc gardez en tête qu'onclick est une
  solution temporaire qu'on évitera à terme. 

*/


/*  getLegos

  . paramètre name : le nom de la collection Lego souhaitée

  La fonction demande au serveur les données au format JSON de la collection de Lego.
  Quand les données sont reçues et lues, on les affiche avec la fonction V.renderLegos.

*/
let getLegos = async function(name){
  // attente de la réponse à la requête demandant les données d'une collection de Lego
  let response = await fetch("../server/script.php?collection=" + name);
  // attente de l'extration des données en format json de la réponse à la requête
  let data = await response.json();
  V.renderLegos(data);
}


/*  V (la Vue) : l'interface et tout ce qui s'y rapporte */
let V = {}


/*  V.formatOneMovieCard
    . paramètre datamov : une objet contenant les données sur un film (comme l'un de ceux contenus dans le tableau movies)
    > valeur de retour : une chaine représentant le template '#movie-card-template' formatée avec les données contenus dans datamov
*/
V.formatOneLegoCard = function( lego ){
    let template = document.querySelector("#lego-template");
    let html = template.innerHTML;

    html = html.replace("{{lego-name}}", lego.name);
    html = html.replace("{{lego-collection}}", lego.collection);
    html = html.replace("{{lego-nbpieces}}", lego.pieces);
    html = html.replace("{{lego-price}}", lego.price);
    html = html.replace("{{lego-description}}", lego.description);
    html = html.replace("{{lego-box-url}}", lego.images.box);
    html = html.replace("{{lego-background-url}}", lego.images.bg);

    return html;
}


/*  V.renderLegos
    . paramètre data : un tableau d'objets représentant des films (comme le tableau movies...)
    > valeur de retour : aucune

    La fonction utilise V.formatOneMovieCard pour formater chaque film du tableau data, puis 
    insère toutes les cartes formatées dans la section '#content' pour affichage
*/
V.renderLegos = function( data ){
  let allhtml = "";
  for(let lego of data ){
    allhtml += V.formatOneLegoCard(lego);
  }
  document.querySelector("#content").innerHTML = allhtml;
}
