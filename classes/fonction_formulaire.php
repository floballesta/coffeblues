<?php

/**
*
*	CLASSE formulaire
*	
*	DESCRIPTION : 
*		classe pour construire Formulaires html elle construit dans un premier temp
*		les balise form les Fonctions ci dessous n'affecte que le constructeur pour
*		connaitre les fonctions de chaque objet de la classe reportez vous aux 
*		commentaires des fonctions.
*	
*	FONCTIONS :
*		new formulaire(string $action, sting $name, string $method, string $js, string $enctype, string $target)
*		Cree une instance de la classe formulaire.
*		Seul les 3 premiers parametres sont obligatoires.
*		* Le parametre $action correspond a l'url du fichier qui traitera notre formulaire	
*		* Le Parametre $name Sera le nom attribuÈ a notre formulaire	
*		* Le Parametre $method Sera la methode d'envoie des variable en General 'POST'	
*		// Les Parametres suivant sont facultatifs mais permettent certaines autres actions	
*		* Le Parametre $js sera l'appel a une fonction javascript lorsque que l'on soummettra le formulaire
*		  ex: 'alert("test")'	
*		* Le Parametre $enctype sera le type d'encodage voulue	
*		* Le Parametre $target definira une cible
*/

class formulaire {

	var $balise;
	/// Fonction constructeur generant un nouveau formulaire
	function formulaire($action, $name, $method, $js="", $enctype="", $target="") {		
		$str = '<form  id="'.$name.'" name="'.$name.'" method="'.$method.'"';		
		if($action) { $str .= ' action="'.$action.'"'; }
		if($enctype) { $str .= ' enctype="'.$enctype.'"'; }
		if($js) { $str .= ' onSubmit="'.$js.'"'; }
		if($target) { $str .= ' target='.$target.'"'; }
		$str .= '>';
		$this->balise = $str;
		//return $str;
	}
	
	
	function startForm(){
		return $this->balise;
	}
	/**
	* FONCTION ChampTexte
	*
	* DESCRIPTION : 
	* 	Fonctions creant un element de formulaire de type Input
	*
	* FONCTIONS : 
	*	formulaire->ChampTexte(string $type, sting $name, string $value, string $size, string $maxlength, string $option, string $action)
	*	Seul les 2 premiers parametres sont obligatoires.
	*
	*	* Le parametre $type est le type d'input 
	*		- ex 'text" pour un champ de texte normal
	*		- ex 'password" pour un mot de passe
	*		- ex 'hidden" pour un champ cachÈ etc..
	*	* Le Parametre $name Sera le nom attribuÈ a notre objet
	*	// Les Parametres suivant sont facultatifs mais permettent certaines autres actions
	*	* Le Parametre $value Sera la valeur par defaut contenue dans le champ
	*	* Le Parametre $size sera le nombre de caractere visible du champ
	*	* Le Parametre $maxlenght sera le nombre maximal de caractere inscriptible dans un champ
	*	* Le Parametre $option sers a definir si le champ est activer ou pas
	*	* Le Parametre $action sers a definir une action sur le champ
	*			
	*/

	function ChampTexte($type, $name, $value="", $size="", $maxlength="", $option="", $action="", $placeholder="") {
		// Fonction Generant des champs de textes
		$str = '<div class="col-sm-10"><input type="'.$type.'" class="form-control form-control-sm" name="'.$name.'" id="'.$name.'"';
		// Parametres facultatifs
		if($value) { $str .= ' value="'.$value.'"'; }
		if($size) { $str .= ' size="'.$size.'"'; }
		if($maxlength) { $str .= ' maxlength="'.$maxlength.'"'; }
		if($option) { $str .= $option; }
		if($action) { $str .= $action; }
		if($placeholder) { $str .= ' placeholder="'.$placeholder.'"'; }
		$str .= '></div>';
		return $str;
	}

	function Bouton($name,$value) {
		// Fonction Generant des champs bouton
		$str = '<div class="col-sm-10"><input type="submit" class="btn btn-primary" name="'.$name.'" id="'.$name.'"';
		// Parametres facultatifs
		if($value) { $str .= ' value="'.$value.'"'; }
		$str .= '></div>';
		return $str;
	}

	function ChampTexteEnrichi($name,$value=''){
		$str = '<input name="'.$name.'" id="'.$name.'" type="hidden" /><div class="col-sm-10">
		<div id="div_editor1" class="richtexteditor">'.$value.'
		</div></div>

		<script>
			var editor1 = new RichTextEditor(document.getElementById("div_editor1"));
			editor1.attachEvent("change", function () {
				document.getElementById("'.$name.'").value = editor1.getHTMLCode();
			});
			
		</script>';
		return $str;
	}

	function ChampTexteEnrichi2($name,$value=''){
		$str = '<input name="'.$name.'" id="'.$name.'" type="hidden" /><div class="col-sm-10">
		<div id="div_editor2" class="richtexteditor">'.$value.'
		</div></div>

		<script>
			var editor2 = new RichTextEditor(document.getElementById("div_editor2"));
			editor2.attachEvent("change", function () {
				document.getElementById("'.$name.'").value = editor2.getHTMLCode();
			});
			
		</script>';
		return $str;
	}
	
	/**
	* FONCTION menu
	*
	*	DESCRIPTION :
	*	Fonctions creant un menu deroulant
	*
	* FONCTIONS : 
	*	formulaire->menu(string $name, array $liste, string $selected,string $action)
	*	Seul les 4 premiers parametres sont obligatoires.		
	*	* Le parametre $name correspond au nom du menu deroulant
	*	* $liste est un tableau de donnÈe contenant les valeurs du menu
	* 	* $cle est l'id du select
	* 	* $value est la valeur du menu déroulant
	*	* $selected est le menu selectionÈ par defaut
	*
	*/

	function menu($name, $liste, $cle, $valeur, $valeur2='', $selected=0) {
		$str = '<div class="dropdown col-sm-10"><select class="dropdown-toggle" name="'.$name.'" id="'.$name.'">';
		$i = 1;
  		//while(list($k,$v)=each($liste)){
			foreach($liste as $uneliste){
  			if($uneliste["$cle"] == $selected){
  				$str .= '<option value="'.$uneliste["$cle"].'"';
  				$str .= ' selected';
				$str .= '>'.$uneliste["$valeur"];
				if($valeur2!=''){$str .= ' '.$uneliste["$valeur2"];}
				$str .='</option>';
  			}else{
				$str .= '<option value="'.$uneliste["$cle"].'"';
				$str .= '>'.$uneliste["$valeur"];
				if($valeur2!=''){$str .= ' '.$uneliste["$valeur2"];}
				$str .='</option>';
  			}
		}
		/*foreach ($liste as [$cle=> $id, $valeur => $nom]) {
			if($id == $selected){
				$str .= '<option value="'.$id.'"';
				$str .= ' selected';
			  $str .= '>'.$nom.'</option>';
			}else{
			  $str .= '<option value="'.$id.'"';
			  $str .= '>'.$nom.'</option>';
		}*/
		$str .= "</select></div>";
		return $str;
	}
	/**
	* FONCTION textarea
	*
	* DESCRIPTION :
	*	Fonctions creant une zone de texte
	*
	* FONCTIONS : 
	*	formulaire->textarea(string $name, string $texte, string $cols, string $rows)
	*	Seul le premier parametre est obligatoire.	
	*	* Le parametre $name correspond au nom de la zone de texte
	*	// Les Parametres suivant sont facultatifs mais permettent certaines autres actions
	*	* Le Parametre $texte est le texte par defaut contenue dans la zone de texte
	*	* Le Parametre $cols est le nombre de colone en caractere de la zone de texte
	*	* Le Parametre $rows est le nombre de rangee en caractere de la zone de texte
	*/

	function textarea($name, $texte="", $cols="", $rows="") {
		$str = '<div class="col-sm-10"><textarea class="form-control" name="'.$name.'"';
		if($cols) { $str .= ' cols="'.$cols.'"';}
		if($rows) { $str .= ' rows="'.$rows.'"';}
		$str .= ' id="'.$name.'">'.$texte.'</textarea></div>';
		return $str;
		return "\n";
	}

	/**
	* FONCTION checkbox
	*
	* DESCRIPTION :
	*	Fonctions creant une boite a cocher html
	*
	* FONCTIONS : 
	*	formulaire->checkbox(string $name, sting $checked)
	*	Seul le premiers parametres sont obligatoires.		
	*	* Le parametre $name correspond au nom de la boite a cocher 
	*	// Les Parametres suivant sont facultatifs mais permettent certaines autres actions		
	*	* Le Parametre $checked si il existe cochera et verrouillera la boite a cocher
	*
	*/

	function checkbox($name, $value, $checked="") {
		$str = '<input type="checkbox" class="form-check-input" name="'.$name.'" value="'.$value.'"';
		if($checked) { $str .= ' checked disabled'; }
		$str .= '>';
		return $str;
	}

	/**
	* FONCTION radio
	*
	* DESCRIPTION :
	*	Fonctions creant un bouton radio
	*
	* FONCTIONS : 
	*	formulaire->radio(string $name, sting $value, string $checked)
	*	Seul les 2 premiers parametres sont obligatoires.		
	*	* Le parametre $name correspond au nom du bouton radio
	*	* Le parametre $value correspond a la valeur contenue dans le bouton radio
	*	// Les Parametres suivant sont facultatifs mais permettent certaines autres actions
	*	* Le Parametre $checked si il existe cochera et le bouton radio par defautr
	*
	*/

	function radio($name, $value, $checked="") {
		// fonction generant des boutons radios
		$str = '<input type="radio" class="form-check-input" name="'.$name.'" value="'.$value.'"';
		// parametres facultatifs
		if($checked) { $str .= ' checked'; }
		$str .= '>';
		return $str;
	}

	/**
	* FONCTION fin
	*
	* DESCRIPTION :
	*	Fonction fermant les balise </form>
	*
	* FONCTIONS : 
	*	formulaire->fin()
	*	Aucun parametre pour cette fonction	
	*
	*/

	function fin() {
		return "</form>";
	}

}
?>
