$(document).ready(function() {
  //Si on clique sur le bouton 'Commentaires' ayant l'ID 'commentaires'
  $('#commentaires').click(function() {
    //On ajoute la classe 'active' à ce bouton
    $(this).addClass('active');
    //On retire la classe 'active' au bouton ayant l'ID 'ajout_comm'
    $('#ajout_comm').removeClass('active');
  });

  //Si on clique sur le bouton 'Ajouter un commentaire' ayant l'ID 'ajout_comm'
  $('#ajout_comm').click(function() {
    //On ajoute la classe 'active' à ce bouton
    $(this).addClass('active');
    //On retire la classe 'active' au bouton ayant l'ID 'commentaires'
    $('#commentaires').removeClass('active');
  });

  //Si on clique sur le bouton pour publier un article ayant l'ID 'publie'
  $('#publie').click(function() {
    //S'il est coché on met la valeur à 1 sinon 0
    $(this).val(this.checked ? 1 : 0)
  });
});

//Fonction de vérification de formulaire (ajout de commentaire)
function checkForm() {
  //On met la valeur de 'email' dans la variable email
  var email = document.getElementById("email").value;
  //On met la valeur de 'message' dans la variable pseudo
  var message = document.getElementById("message").value;


  if(email == null || email == "")
  {
    //On change la couleur de la bordure de l'élément concerné
    document.getElementById("email").style.borderColor = "red";
    //On met un message d'alerte indiquant de remplir les champs requis
    alert("Remplissez le champ requis (email) s'il vous plait");
    //On retourne false pour ne pas envoyer le formulaire
    return false;
  }

  if(message == null || message == "")
  {
    //On change la couleur de la bordure de l'élément concerné
    document.getElementById("message").style.borderColor = "red";
    //On met un message d'alerte indiquant de remplir les champs requis
    alert("Remplissez le champ requis (Commentaire) s'il vous plait");
    //On retourne false pour ne pas envoyer le formulaire
    return false;
  }

}
