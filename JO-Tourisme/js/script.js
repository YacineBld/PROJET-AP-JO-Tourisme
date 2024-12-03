function traiterEmail() {
    let email = document.getElementById("email").value;
  
    if (email == "") {
      document.getElementById("email").style.backgroundColor = "#e24d36";
    } else if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)) {
      document.getElementById("email").style.backgroundColor = "#71bf71";
    } else {
      document.getElementById("email").style.backgroundColor = "#e24d36";
    }
  }
  
  function traiterNom() {
    let nom = document.getElementById("nom").value;
    const regex = /^[A-Z][a-zA-Z]+$/;


    if (nom == "") {
        document.getElementById("nom").style.backgroundColor = "#e24d36";
    } else if (!regex.test(nom)) {
        // Si le nom ne respecte pas les critères.
        document.getElementById("nom").style.backgroundColor = "#e24d36"; // Rouge.
        alert("Le nom doit commencer par une majuscule et contenir uniquement des lettres.");
    }
    else {
        document.getElementById("nom").style.backgroundColor = "#71bf71";
    }
}

  function traiterPrenom() {
    let prenom = document.getElementById("prenom").value;
  
    if (prenom == "") {
      document.getElementById("prenom").style.backgroundColor = "#e24d36";
    } else {
      document.getElementById("prenom").style.backgroundColor = "#71bf71";
    }
  }
  
  function traiterMdp() {
    let mdp = document.getElementById("mdp").value;
  
    if (mdp == "") {
      document.getElementById("mdp").style.backgroundColor = "#e24d36";
    } else {
      document.getElementById("mdp").style.backgroundColor = "#71bf71";
    }
  }
  
  function traiterTel() {
    let tel = document.getElementById("tel").value;
  
    if (tel == "") {
      document.getElementById("tel").style.backgroundColor = "#e24d36";
    } else {
      document.getElementById("tel").style.backgroundColor = "#71bf71";
    }
  }

  function traiterNumSiret() {
    let num_Siret = document.getElementById("num_Siret").value;
    const regex = /^[0-9]{5}$/; // 5 chiffres exactement. 'Mission'
    if (num_Siret == "") {
        document.getElementById("num_Siret").style.backgroundColor = "#e24d36";
    } else if (!regex.test(num_Siret)) {
        document.getElementById("num_Siret").style.backgroundColor = "#e24d36";
        alert("Le num Siret doit contenir 5 chiffres.");
    }
   
    else {
        document.getElementById("num_Siret").style.backgroundColor = "#71bf71";
    }
}

  function traiterAdresse() {
    let adresse = document.getElementById("adresse").value;
    const regex = /^\d+\s/; // Commence par des chiffres suivis d'un espace. 'Mission'
    if (adresse == "") {
        document.getElementById("adresse").style.backgroundColor = "#e24d36";
    } else if (!regex.test(adresse)) {
        document.getElementById("adresse").style.backgroundColor = "#e24d36";
        alert("L'adresse doit commencer par un nombre suivi d'un espace.");
    }
    else {
        document.getElementById("adresse").style.backgroundColor = "#71bf71";
    }
}

  