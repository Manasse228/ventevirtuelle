var ageRegex = new RegExp (/^[-]?\d*\.?\d*$/); // Entre 1 et 3 chiffres
var mailRegex = new RegExp (/^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/); // Typique e-mail
var pseudoRegex = new RegExp (/^[a-zA-Z0-9_-]{5,25}$/); // on vérifie juste la longueur : entre 2 et 25 caractères
var telRegex = new RegExp (/^[-]?\d*\.?\d*$/); // Nombre


    function fetchselect(val){

        console.log("Valeur "+val);
        $.ajax({
            type: 'post',
            url: 'ajaxInfo.php',
            data: {
                get_option:val
            },
            success: function (response) {
                document.getElementById("sscateg").innerHTML=response;
            }
        });
    }


function verifier(f)
{
	
	var mailOK = verifMail(f.email);
	var pseudoOK = verifPseudo(f.nom);
        var passOK = verifPasse(f.passe);
	var result = false;
	var passr = verif()
	if (passOK && mailOK && pseudoOK && passr) // si tout est OK
	{
	result=true;
	
	}
	else
	{
	result=false;
	alert(" Veuillez remplir le formulaire correctement  ou bien saisir la confimation du mots de passe avant de l'envoyer");
	}
	return result;
}

function verifMail(champ)
{
	var result = mailRegex.test(champ.value);
	var mailRempli = champRempli(champ); // false si le champ n'est pas rempli
	
	if (mailRempli)	// evite de dire que le formulaire est mal rempli si on le laisse vide et qu'on change de champ
	{
		if (result)
			{		
			surligneErreur(champ, false); // pas d'erreur
			}
		else
			{
			surligneErreur(champ, true);	// erreur
			}
		return result;
	}
	else	// Si le champ n'est pas rempli on laisse la couleur de base
	{
		champ.style.backgroundColor = "";
	}
	
}


function verifPseudo(champ)
{
	var result = false;
	var pseudoRempli = champRempli(champ); // false si le champ n'est pas rempli
	
	if (pseudoRempli)	// evite de dire que le formulaire est mal rempli si on le laisse vide et qu'on change de champ
	{
		if (result = pseudoRegex.test(champ.value))
			{		
			surligneErreur(champ, false);
			}
		else
			{
			surligneErreur(champ, true);
			}
		return result;
	}
	else // Si le champ n'est pas rempli on laisse la couleur de base
	{
		champ.style.backgroundColor = "";
	}
}
function verif(){
                var pass =  window.document.getElementById('passe').value;
                var conf_pass  =    window.document.getElementById('cpasse').value;
                if (pass==conf_pass)
                {

                    return true;
                }
                else{
                    
                    return false;}
}
function verifPasse(champ)
{
	var result = false;
	var pseudoRempli = champRempli(champ); // false si le champ n'est pas rempli
	
	if (pseudoRempli)	// evite de dire que le formulaire est mal rempli si on le laisse vide et qu'on change de champ
	{
		if (result = pseudoRegex.test(champ.value))
			{		
			surligneErreur(champ, false);
			}
		else
			{
			surligneErreur(champ, true);
			}
		return result;
	}
	else // Si le champ n'est pas rempli on laisse la couleur de base
	{
		champ.style.backgroundColor = "";
	}
}
function verifTel(champ)
{
	var result = false;
	var telFRRempli = champRempli(champ); // false si le champ n'est pas rempli
	
	if (telFRRempli)	// evite de dire que le formulaire est mal rempli si on le laisse vide et qu'on change de champ
	{
		if (result = telRegex.test(champ.value))
			{		
			surligneErreur(champ, false);
			}
		else
			{
//			alert(champ.value + " : ce telephone francais est incorrect");
			surligneErreur(champ, true);
			}	
		return result;
	}
	else // Si le champ n'est pas rempli on laisse la couleur de base
	{
		champ.style.backgroundColor = "";
	}
}

// Renvoi false si le champ n'est pas rempli
function champRempli(champ)
{
	var result;
	if (champ.value == "")
	{
		result = false;
	}
	else
	{
		result = true;
	}	
	return result;
}

/* Si les champs ne sont pas bien remplis, on surligne le champ */
function surligneErreur(champ, erreur)
{
   if(erreur)
      champ.className = "erreur";
   else
      champ.className = "ok";
}