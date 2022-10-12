<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    // require 'classes/utilisateur.class.php';

    //SANS CONSTRUCTEUR
    // $pierre = new Utilisateur();
    // $mathilde = new Utilisateur();

    // Creation de 2 objets en durs pour le moment
    // $pierre->user_name = 'Pierre';
    // $pierre->user_pass = 1234;

    // $mathilde->user_name = 'Mathilde';
    // $mathilde->user_pass = 5678;
    // Fin objets en durs

    //on inclut notre fichier de classe puis on instancie ensuite notre 
    //classe et on stocke cette instance dans un objet qu’on appelle $pierre. On utilise les methodes
    //pour definir une valeur a stocker dans les proprietes $user_name et $user_pass
    // on leur passe un argument ('Pierre'et'1234')
    // $pierre->setNom('Pierre');
    // $pierre->setPass(1234);
    // echo $pierre->getNom() . '<br>';
    //On va pouvoir accéder à nos méthodes setNom(), getNom() et setPass() définies 
    //dans notre classe depuis notre objet puisqu’on a utilisé le mot clef public 
    //lorsqu’on les a déclarées.
    //on retourne le contenu de $user_name relatif à notre objet $pierre grâce à getNom()
    // $mathilde->setNom('Math');
    // $mathilde->setPass(5678);
    // echo $mathilde->getNom() . '<br>';
    // FIN SANS CONSTRUCTEUR

    //Avec constructeur 
    //on veut stocker le nom d’utilisateur et le mot de passe choisi dans nos variables 
    //$user_name et $user_pass dès la création d’un nouvel objet
    // $pierre = new Utilisateur('Pierre', 1234);
    // $mathilde = new Utilisateur('Mathilde', 5678);
    // echo $pierre->getNom() . '<br>';
    // echo $mathilde->getNom() . '<br>';
    // 
    ?>
    <p>un paragraphe</p>

    <!-- premier aperçu d’un script « utile » avec un formulaire -->
    <!-- <h1>premier aperçu d’un script « utile »</h1>
    <form action="cours.php" method="POST">
        <label for="nom">Nom d'utilisateur</label>
        <input type="text" name="nom" id="nom"><br>
        <label for="pass">Mot de passe</label>
        <input type="text" name="pass" id="pass">
        <input type="submit" value="Envoyer">
    </form> -->
    <?php
    // require 'classes/utilisateur.class.php';
    // //+ Vérification des données reçues (regex + filtres)
    // //+ Stockage des données (base de données)
    // $pierre = new Utilisateur($_POST['nom'], $_POST['pass']);
    // echo $pierre->getNom() . '<br>';
    ?>
    <!-- FIN premier aperçu d’un script « utile » avec un formulaire -->

    <?php
    //HERITAGE DE CLASSE ET VISIBILITE
    //require normal
    // require 'classes/utilisateur.class.php';
    // require 'classes/admin.class.php';

    //require classes abstraites
    //attention ajouts du "S" a admins et utilisateurs
    require 'AvecClassesAbstraites/abonne.abstrait.php';
    require 'AvecClassesAbstraites/admin.abstrait.php';
    require 'AvecClassesAbstraites/utilisateur.abstrait.php';

    $pierre = new Admins('Pierre', 1234, 'Sud');
    $mathilde = new Admins('Mathi', 5678, 'Nord');
    $florian = new Utilisateurs('Florian', 'abcdef', 'Ouest');

    $pierre->setPrixAbo();
    $mathilde->setPrixAbo();
    $florian->setPrixAbo();
    //’il est possible en PHP de référencer une classe en utilisant une variable, c’est-à-dire d’utiliser 
    //une variable pour faire référence à une classe. Pour faire cela, il suffit de stocker le nom 
    //exact de la classe dans la variable et on pourra ensuite l’utiliser comme référence à notre classe
    $u = 'Utilisateur';
    echo 'valeur de ABONNEMENT dans Utilisateur : ' . $u::ABONNEMENT . '<br>';
    echo 'Valeur de ABONNEMENT dans Admin : ' . Admins::ABONNEMENT . '<br>';

    echo 'Prix de l\'abonnement pour : ';
    $pierre->getNom();
    echo ':';
    $pierre->getPrixAbo();

    echo '<br>Prix de l\'abonnement pour : ';
    $mathilde->getNom();
    echo ':';
    $mathilde->getPrixAbo();

    echo '<br>Prix de l\'abonnement pour : ';
    $florian->getNom();
    echo ':';
    $florian->getPrixAbo();

    echo '<br>';

    // echo $pierre->getNom2() . '<br>';
    echo $pierre->getNom() . '<br>';
    echo $mathilde->getNom() . '<br>';

    $pierre->setBan('Paul', 'Jack');
    $mathilde->setBan('Toto');

    $pierre->getBan();
    echo '<br>';
    $mathilde->getBan();




    ?>

</body>

</html>