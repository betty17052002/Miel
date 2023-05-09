
function setArticleDivEditable (idOfDivToEdit, fieldName, id){
	//if ( destroy )  setDivNoEditable ();
	//if ( editor1 )  return;

	let dataChanged;

    tinymce.init({
     
      inline: true,
      selector: "#"+idOfDivToEdit,
      
      toolbar: 'undo redo | styleselect | bold italic | link image',
      
      init_instance_callback: function(editor) {
    		editor.on('blur', function(event) {
				data = tinymce.get(idOfDivToEdit).getContent(); 
				if(dataChanged){
					if(id == 0){
						switch (fieldName) {
							case "titre" : titreNouvelArticle = data; break;
							case "contenu" : contenuNouvelArticle = data; break;
							case "auteur" : auteurNouvelArticle = data; break;
						}
					} else {
						updateArticle(id, fieldName, data) ;
					}

					dataChanged = false;
				}
			    destroy=true;
    		});

    		editor.on('change', function(event) {
				data = tinymce.get(idOfDivToEdit).getContent(); 
				dataChanged = true;
				if (fieldName=="contenu") {
					if ( $.trim(data) == "" ) { dataChanged = false; }
					else { dataChanged = true; }
				}
   			 });
			
			editor.on('keyup', function(event) {
				if (id == 0) {
					let dataValid = true;
					if (document.getElementById("titre-0").innerText.trim() == '') dataValid = false;
					if (document.getElementById("body-0").innerText.trim() == '') dataValid = false;
					if (document.getElementById("nomAuteur-0").innerText.trim() == '') dataValid = false;
					document.getElementById("submitButton-"+id).disabled = !dataValid;
				}
			});
      }
    });
}

function updateArticle( id_article, fieldName, data ) { 
	// Création du tableau de données à envoyer par Ajax
	let donnees = new FormData();
	
	donnees.append("action", "update");

	donnees.append("id", id_article);
	donnees.append("fieldName", fieldName);
	donnees.append("contenu", data);

	// Appel AJAX
	let request =
	$.ajax({
	type: "POST", //Méthode à employer POST ou GET 
	url: "./admin/table_Manager.php", // Page PHP à appeler coté serveur 
	data : donnees, //cette propriété sert à stocker les données à envoyer
	cache : false, 
	contentType : false, 
	processData : false, 
	
	beforeSend: function () {
	// Placer ici un éventuel code à exécuter avant l'appel ajax en lui même
	}
	});
	request.done(function (output) { // output : variable qui contient les éventuels affichages générés dans le fichier PHP appelé
	// Placer ici un éventuel code à exécuter si tout s'est bien exécuté coté PHP
	});
	request.fail(function (error) { // error : variable qui contient l'erreur survenue
	// Placer ici un éventuel code à exécuter en cas d'erreur coté PHP
	});
	request.always(function () {
	// Placer ici un éventuel code à exécuter quoi qu'il arrive
		reloadToPos();
	});
}	
   

function insertArticle(category) {
	// Création du tableau de données à envoyer par Ajax
	let donnees = new FormData();
	// Ajouter des données dans le tableau par des appels append(…) : 
	// donnees.append(clé, valeur);
	donnees.append("action", "create");

	donnees.append("category", category);
	donnees.append("nom_miel", document.getElementById("titre-0").innerText);
	donnees.append("image", document.getElementById("body-0").innerHTML);
	donnees.append("prix", document.getElementById("nomAuteur-0").innerText);

	// Appel AJAX
	let request =
	$.ajax({
	type: "POST", //Méthode à employer POST ou GET 
	url: "./admin/article_SqlTableManager.php", // Page PHP à appeler coté serveur 
	data : donnees, //cette propriété sert à stocker les données à envoyer
	cache : false, //permet de spécifier si le navigateur doit mettre en cache les pages demandées
	contentType : false, //permets de préciser le type de contenu à utiliser lors de l'envoi au serveur.
	processData : false, // définit si les données envoyées doivent être transformées en chaine de requête (ex : ?id=1?login=johnDoe).
	
	beforeSend: function () {
	// Placer ici un éventuel code à exécuter avant l'appel ajax en lui même
	}
	});
	request.done(function (output) { // output : variable qui contient les éventuels affichages générés dans le fichier PHP appelé
	// Placer ici un éventuel code à exécuter si tout s'est bien exécuté coté PHP
	});
	request.fail(function (error) { // error : variable qui contient l'erreur survenue
	// Placer ici un éventuel code à exécuter en cas d'erreur coté PHP
	});
	request.always(function () {
	// Placer ici un éventuel code à exécuter quoi qu'il arrive
		reloadToPos();
	});
}

function deleteArticle(id) {
	// Création du tableau de données à envoyer par Ajax
	let donnees = new FormData();
	// Ajouter des données dans le tableau par des appels append(…) : 
	// donnees.append(clé, valeur);
	donnees.append("action", "delete");

	donnees.append("id", id);

	// Appel AJAX
	let request =
	$.ajax({
	type: "POST", //Méthode à employer POST ou GET 
	url: "./admin/article_SqlTableManager.php", // Page PHP à appeler coté serveur 
	data : donnees, //cette propriété sert à stocker les données à envoyer
	cache : false, //permet de spécifier si le navigateur doit mettre en cache les pages demandées
	contentType : false, //permets de préciser le type de contenu à utiliser lors de l'envoi au serveur.
	processData : false, // définit si les données envoyées doivent être transformées en chaine de requête (ex : ?id=1?login=johnDoe).
	
	beforeSend: function () {
	// Placer ici un éventuel code à exécuter avant l'appel ajax en lui même
	}
	});
	request.done(function (output) { // output : variable qui contient les éventuels affichages générés dans le fichier PHP appelé
	// Placer ici un éventuel code à exécuter si tout s'est bien exécuté coté PHP
	});
	request.fail(function (error) { // error : variable qui contient l'erreur survenue
	// Placer ici un éventuel code à exécuter en cas d'erreur coté PHP
	});
	request.always(function () {
	// Placer ici un éventuel code à exécuter quoi qu'il arrive
		reloadToPos();
	});
}

function confirmDelete(id) {
	document.getElementById("deleteArticleIdField").value = id;
	document.getElementById("deleteArticleContent").innerHTML = document.getElementById(`body-${id}`).innerHTML;

	$("#dialogConfirmDel").modal({});
}

function getScrollPos()
{
 var scroll = {'Left':0, 'Top':0};
 if (window.pageXOffset !== undefined) { 
 // All browsers, except IE9 and earlier
 scroll.Left = window.pageXOffset;
 scroll.Top = window.pageYOffset;
 } else { 
 // IE9 and earlier
 scroll.Left = document.documentElement.scrollLeft;
 scroll.Top = document.documentElement.scrollTop;
 }
 return scroll;
}

function SetScroll(scrollLeft, scrollTop){
	window.scrollTo (scrollLeft, scrollTop);
   } 

   function getRefreshURL(base, defaultDonneeURL, scroll){
	var baseURL = window.location.protocol + "//" + window.location.host + window.location.pathname;
	var actuelURL = document.location.href;
	var donneesURL= actuelURL.replace(baseURL,"" );
	//alert("window.location.protocol : " + window.location.protocol + "\nwindow.location.host: " + 
	//window.location.host + "\nwindow.location.pathname : "+window.location.pathname);
	
	if (donneesURL == '') { donneesURL = defaultDonneeURL ; } 
	
	buf = donneesURL.split('&');
	
	var page="" ;
	if(buf[0]) { page = buf[0].substr(1); }
	
	var refreshURL = base;
	if (page!=="") refreshURL += '?'+page;
	if (scroll.Top!==0) refreshURL += '&scrollTop='+scroll.Top;
	if (scroll.Left!==0) refreshURL += '&scrollLeft='+scroll.Left;
	//alert("refreshURL : " + refreshURL);
	return(refreshURL);
}

function reloadToPos() {
	const pos = getScrollPos();

	const currentWindowLocation = window.location.toString().split("?", 2)[0];

	const query = `?scrollTop=${pos.Top}&scrollLeft=${pos.Left}`;

	window.location = `${currentWindowLocation}${query}`;
}
