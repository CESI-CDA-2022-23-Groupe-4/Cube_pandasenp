Forum

	1. Inscription
	2. Connexion
	3. Publier une question
	4. Afficher les questions publiées par l'utilisateur
	5. Modifier une question 
	6. Supprimer une question
	7. Rechercher et afficher les questions déjà présentes pour avoir une réponse
	8. Accéder à une question du forum
	9. Répondre à une question
	10. Afficher le profil d'un utilisateur (avec ses publications - toutes les questions qu'il a publié)

3 dossiers principaux :

	1. actions
		==> stocker les actions de notre page
		==> par exemple : quand notre utilisateur va saisir ses informations dans un formulaire d'inscription, c'est dans ce dossier là qu'on va par exemple créer un fichier "signupAction.php" et c'est ce fichier là qui va faire : 
			• toutes les vérifications en PHP au niveau du formulaire et 
			• toutes les requêtes vers notre BDD qui vont nous permettre de :
				□ récupérer un utilisateur déjà existant, 
				□ insérer un nouvel utilisateur 
				
		==> architecture MVC possible 
		==> ici on crée notre propre architecture qui va vous permettre de mieux nous repérer et de mieux organiser votre code
		
		==> les fichiers de ce dossier "actions" va nous permettre de séparer notre code PHP brut de notre code HTML. Tout ce que l'utilisateur va voir et tout ce qui va se passer en arrière plan seront deux parties indépendantes. Par exemple, notre fichier "signupAction.php" qui se trouve dans le dossier "actions" sera inclus dans le fichier que l'utilisateur pourra voir (à savoir le fichier qui stocke le formulaire)
			
	2. assets
		==> c'est dans ce dossier qu'on stockera nos fichiers CSS et JS (si on souhaite faire le front-end nous-mêmes)
		
	3. includes
		==> on aura dans ce dossier des "sous-fichiers" qui vont nous permettre d'écrire du code qu'on va inclure dans chaque fichier principal
		
		==> par exemple dans un fichier "home.php", on pourra y inclure la barre de navigation qui sera un fichier PHP "navbar.php"
		
		==> pareil si on a un fichier "about.php" et qu'on veut une barre de navigation on lui incluera le fichier "navbar.php" 
		
		==> ca va nous permettre d'éviter de copier-coller à chaque fois du code

		==> on pourra créer ici un fichier "head.php" qui contiendra du code PHP lié à l'utilisation de bibliothèques provenant d'Internet par ex., ou vous pourrez y ajouter des fichiers JS, des fichiers CSS etc.


BDD - nos tables

users : 
		id / INT / A.I 
		username / VARCHAR /255
		last_name / VARCHAR /255
		first_name / VARCHAR /255
		pwd / TEXT

questions :
		id / INT / A.I 
		title / TEXT
		description / TEXT
		content / TEXT
		author_id / INT
		author_username / VARCHAR / 255
		publication_date / TEXT

answers : 
		id / INT / A.I 
		author_id / INT
		author_username / VARCHAR / 255
		question_id / INT
		content / TEXT


Architecture proposée

forum 
	question.php
		--> afficher le contenu propre à une question
	edit-question.php
		--> modifier une question
	index.php 
		--> affiche toutes les questions + barre de recherche (accessible pour un utilisateur lambda non connecté)
	login.php
		--> se connecter
	my-questions.php
		--> affiche toutes les questions de l'utilisateur loggé
	profile.php
		--> affiche le profil de l'utilisateur
	publish-question.php
		--> publier une question
	signup.php	
		--> s'inscrire

	actions (fichiers d'actions)
		database.php
			--> connexion à la base
		questions
			deleteQuestionAction.php
			editQuestionAction.php
			publishQuestionAction.php
			getInfosOfEditedQuestionAction.php
			myQuestionsAction.php
			showQuestionContentAction.php
			postAnswerAction.php
			showAllAnswersOfQuestionAction.php 
				--> Afficher les réponses aux questions
			showAllQuestionsAction.php 
				--> Afficher et rechercher des questions
		users
			loginAction.php
			logoutAction.php
			securityAction.php
			showOneUsersProfileAction.php
			signupAction.php
	assets
		style.css
	includes
		head.php
		navbar.php


--> améliorations possibles :

	* Dans "Mes Questions" 
		==> Rajouter un bouton "Partager la question" --> réseaux sociaux par ex. / lien de la question
	* Dans "Mon profil"
		==> Rajouter une photo de profil
		==> Rajouter "Mes réponses aux questions"
		==> Modifier ses informations (mdp, pseudo)
	* Fonctionnalités possibles : 
		==> classement des utilisateurs les + actifs sur le forum
		==> recherche de catégories
		==> mise en place de messages privés
		==> confirmation de compte par mail
		==> créer un espace d'administration (Username : james / Password : IamTheAdmin877)











