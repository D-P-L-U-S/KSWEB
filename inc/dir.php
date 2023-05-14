<?php 

  /*
  * Avant de modifier ces 2 variables assurez-vous d'aller sur Ksweb 
  * Puis sélectionnez votre serveur favoris (celui que vous voulez utiliser)
  * Ajouter un nouveau host (tous les hosts commencent par localhost si non ca ne marche pas)
  * Une fois créé, redémarrer ksweb puis retenez les informations comme le chemin du répertoire et le port que vous avez renseigné.
  * Enreer ces 2 informations respectivement dans les 2 variables ci dessous.
  */
  
  /* 
  * Before changing these 2 variables Make sure to go to KSWeb 
  * and then select your favorite server (the one you want to use) 
  * Add a new host (all hosts start with localhost if not it does not work)
  * Once created, restart KSWeb and hold the information like the directory path and the port you have inquired. 
  * Enread these 2 information respectively in the 2 variables below. 
  */
  
  
  // $mainProjetsName = Répertoire de votre projets en chemin relatif ou absolu
  /*
  * Chemin relatif (par rapport à ce projet) : ../parentProjectDir
  * ou : ../../parentProjectDir
  *
  * Chemin absolu (par rapport au répertoire racine) : /storage/emulated/0/myProject
  * ou /storage/emulated/0/Xender/app/projects
  *
  * $mainProjetsPort = Port utilisé lors de la création du host pour le répertoire de vos projets.
  */
  
  // $mainProjetsName = Directory of your projects on relative or absolute path 
  /* 
  * relative path (compared to this project): ../ParentprojectDir 
  * or: ../../parentprojectdir 
  * 
  * absolute path (compared to Root directory): /storage/emulated/0/myProject 
  * or /storage/emulated/0/Xender/app/projects 
  * 
  * $mainProjectsPort = Port used when creating the host for the directory of your projects. 
  */
  
  $mainProjetsName = ""; //dirProject
  $chemin = $mainProjetsName;
  $projet = basename($chemin);
  $mainProjetsPort = ""; //port
  
  
  
  /*
  * Vous aurez aussi besoin d'utiliser phpMyAdmin, alors renseigner le port de phpMyAdmin lorsque vous l'avez activé
  *
  * Par défaut c'est l'hôte avec le port 8002 ou 8002, ne renseigner pas n'importe quelles informations sinon ca ne marchera pas.
  */
  
  /* 
  * You will also need to use phpmyadmin, then fill in the phpmyadmin port when you have enabled 
  * 
  * By default it is the host with the 8002 or 8002 port, do not fill in any other information otherwise it will not work. 
  */
  $portPhpMyAdmin = "8002"; // change it with correct port phpMyAdmin 
  
  
  
  /* Vous aurez aussi besoin d'utiliser des fois admirer (pour voir les structures de vos tables et les modifiés plus facilement), alors renseigner le port de admirer lorsque vous l'avez activé
  *
  * Par défaut c'est l'hôte avec le port 8002 ou 8003, ne renseigner pas n'importe quelle information une fois de plus
  */
  
  /* You will also need to use sometimes admire (to see the structures of your tables and modified them more easily), then fill in the port of admiring when you have activated 
  * 
  * by default it is the host with the port 8002 or 8003, do not inquire Not any information once again 
  */
  
  $portAdmirer = "8003"; //change it with correct port admirer
?>