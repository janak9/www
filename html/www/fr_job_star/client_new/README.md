# jquery.paginemytable

Un petit plugin pour JQuery. Le dossier semantic sert simplement pour l'exemple, il n'est pas nécessaire.

## 1. Installation

Il s'agit simplement d'un script à inclure dans votre header, typiquement:  
&lt;script src="/chemin/vers/jquery.paginemytable.min.js&gt;&lt;/script&gt;

## 2. Utilisation

L'utilisation du plugin est simple, il suffit de l'appeler la fonction paginate sur votre table, comme suit:  
$("#maTable").paginate({options});

## 3. options

Voici la liste des options utilisées par le plugin:
  - pageLength: Le nombre d'éléments par page. (Défaut: 15)
  - nbPages: Indique en combien de pages on veut découper notre table. Une valeur de 0 indique que l'on veut autant de pages que possible (Défaut: 0)
  - headerSelector: Le sélecteur du header. Si vous utilisez une div au lieu d'un thead par exemple. (Défaut: "thead")
  - bodySelector: Le sélecteur du body. (Défaut: "tbody")
  - footerSelector: La balise footer de votre table. (Défaut: "tfoot")
  - paginationButtonsClass: La/Les classe(s) que vous souhaitez ajouter sur les bouton de navigation entre les pages. (Défaut: "")
  - paginationButtonsTagName: Le nom de balise que vous souhaitez pour les boutons de navigation entre les pages. (Défaut: "span")
  - paginationButtonsContainerClass: La/Les classes que vous voulez mettre sur le parent des boutons de pagination. (Défaut: "")
  - previousButtonContent: Le contenu du bouton "précédent". (Défaut: "&lt;")
  - nextButtonContent: Le contenu du bouton "suivant". (Défaut: "&gt;")
  - previousButtonId: L'id pour le bouton "précédent". Peut servir si vous avez des callbacks à rajouter. (Défaut: "")
  - nextButtonId: L'id pour le bouton "suivant". Peut servir si vous avez des callbacks à rajouter. (Défaut: "")
