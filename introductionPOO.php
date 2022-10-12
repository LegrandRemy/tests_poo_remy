<?php
//dans le terminal:
//C:\xampp\htdocs\tests_poo_remy> php -S localhost:8000
//sur le navigateur http://localhost:8000/introductionPOO.php

//Interface: elle definit simplement des methodes que l'on veut rendre obligatoire sur tous les objets qui
//  se definissent comme des Travailleur, sur toutes les classes qui se dise "moi je suis Travailleur je veux respecter le contrat
// du Travailleur" , il faut qu'elle est les methodes que le contrat du Travailleur demande
//tous ceux qu'il veulent repsecter ce contrat il faut avoir une public function travailler(); on ne dit pas ce qu'elle 
//doit faire cette fonction, on dit juste "je veux qu'il est cette fonction"... on peut mettre plusieurs fonction
// interface Travailleur
// {
//     public function travailler();
// }

//classe abstraite: c'est exactement comme une interface mais qui a en plus des prorpietes et methodes qui peuvent deja etre definit
abstract class Humain
{
    public $nom;
    public $prenom;
    protected $age;
    public function __construct($prenom, $nom, $age)
    {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->setAge($age);
    }
    abstract public function travailler();

    public function setAge($age)
    {
        //is_int permet de verifier que c'est un entier
        if (is_int($age) && $age >= 1 && $age <= 120) {
            $this->age = $age;
        } else {
            //throw new Exception donnera (lancera (=throw)) une erreur si ce n'est pas un nombre entier
            throw new Exception("L'age d'un employé doit etre un entier de 1 à 120ans");
        }
    }

    public function getAge()
    {
        return $this->age;
    }
}

// *** LES CLASSES ***

//La classe est une representation de ce qu'est un employé mais c'est pas un employé avec ses données(nom prenom age) et 
// son comportement(ici sa presentation)
// un employé est un objet
class Employe extends Humain //implements Travailleur (pour l'interface)... extends humain pour faire heriter Employe de Humain et
//on met les variables et function dans la classe abstraite Humain
{
    //les variables sont des PROPRIETES car elle sont dans la classe
    // public $nom;
    // public $prenom;
    // protected $age;
    // le modificateur "private" specifie qu'une propriete ne peut etre touchée que depuis la classe elle-meme
    //pour pouvoir changer quand meme en dehors de la classe on peut mettre en place des getteur et des setteur (ce sont des portes
    //ouvertes pour acceder malgré tout aux proprietes privées)

    // public function __construct($prenom, $nom, $age)
    // {
    //     $this->nom = $nom;
    //     $this->prenom = $prenom;
    //     $this->setAge($age);
    // }
    public function travailler()
    {
        return "je suis un employé et je travaille";
    }

    // public function setAge($age)
    // {
    //     //is_int permet de verifier que c'est un entier
    //     if (is_int($age) && $age >= 1 && $age <= 120) {
    //         $this->age = $age;
    //     } else {
    //         //throw new Exception donnera (lancera (=throw)) une erreur si ce n'est pas un nombre entier
    //         throw new Exception("L'age d'un employé doit etre un entier de 1 à 120ans");
    //     }
    // }

    // public function getAge()
    // {
    //     return $this->age;
    // }

    // Notion de methode : c'est une fonction qui fait partie d'un objet
    public function presentation()
    {
        //$this est une pseudo-variable represente l'objet dans lequel on se trouve
        var_dump("Salut je suis $this->prenom $this->nom et j'ai $this->age ans");
    }
}
//La classe patron "herite" de la classe Employe on a pas besoin de repeter qu'il a un nom, prenom, age
//La classe patron "specialise" la classe Employe et elle "etend" aussi c'est une extension de Employe
// Patron est "fille" de Employe : Employe est le "parent" de Patron
class Patron extends Employe
{
    public $voiture;

    public function __construct($prenom, $nom, $age, $voiture)
    {
        //parent:: pour eviter de repeter le construct deja fait dans Employe
        parent::__construct($prenom, $nom, $age);
        $this->voiture = $voiture;
    }

    //si on veut que le patron se presente differement de Employe
    public function presentation()
    {
        var_dump("Bonjour je suis $this->prenom $this->nom et j'ai $this->age ans et j'ai une voiture !");
    }

    //representation de ce qu'est un patron il est comme un employé (nom prenom age) sauf qu'il a une voiture en plus
    // on a enlevé toute les fonction herite de la class eEmploye mais on doit mettre la fonction rouler que la classe Employe n'a pas
    public function rouler()
    {
        var_dump("Bonjour je roule avec ma $this->voiture !");
    }

    public function travailler()
    {
        return "je suis le patron et je bosse aussi";
    }
}

//Pour creer objet : employe1 est un nouvel objet issue de la classe Employe
// employe1 est une nouvelle instance de la classe Employe et il possede donc l'ensemble des données 
//et des comportement de ce que la classe Employe prevoit
// Notion de constructeur : Permet de passer des infos à l'objet dès sa naissance(construction)
//$employe1 et $employe2 sont des sinstances de cette classe Employe, sont de veritables employés
$employe1 = new Employe("Remy", "Legrand", 36);
$employe2 = new Employe("Eve", "Dermigny", 36);
//quand on appelle la fonction employe1, "this" represente employe1 et grace a la condition d'etre un entier, avec is_int, 
//on ne peut pas mettre de string
$employe1->presentation();

//Principe du DRY (Don't Repeat Yourself) on a repeté plusieurs fois les propriete nom prenom age, constructeur, setAge et getAge
//juste pour ajouter une notion de "voiture" et une methode "rouler"... et c'est la que l'heritage intervient. on peut utiliser l'heritage de classe
//on peut creer une classe qui va heriter de la classe Employe... Les données et les comportement vont etre copies colles de la classe Employe
//par php lui meme
$patron = new Patron("Joseph", "Durand", 50, "Mercedes");
$patron->presentation();
$patron->rouler();


//on change l'age avec le setteur car sans set, on ne pouvais pas changer l'age car age est "private"
$employe1->setAge(50);

//un nouveau developpeur arrive sur le code et cée une nouvelle classe
// la claase Etudiant n'a aucun rapport avec la classe patron et employe
class Etudiant extends Humain
{
    public function travailler()
    {
        return "je suis un etudiant et je revise";
    }
}


faireTravailler($employe1);
faireTravailler($patron);


//fonction pour l'interface
// function faireTravailler(Travailleur $objet)
// {
//     //ecrire travail en cours et afficher le resultat d'une methode qui existe sur l'objet($objet) et qui sappelle travailler
//     var_dump("travail en cours : {$objet->travailler()}");
//     //quelque soit l'objet qu'on passe a la fonction faireTravailler on veut etre sur a 100% que cet objet ai une fonction travailler
// }
//fonction pour classe abstraite
function faireTravailler(Humain $objet)
{
    //ecrire travail en cours et afficher le resultat d'une methode qui existe sur l'objet($objet) et qui sappelle travailler
    var_dump("travail en cours : {$objet->travailler()}");
    //quelque soit l'objet qu'on passe a la fonction faireTravailler on veut etre sur a 100% que cet objet ai une fonction travailler
}


// *** L'ENCAPSULATION ***
//Amene de la securite dans le code
// faire ce qu'il faut pour proteger $age pour que tout soit coherent avec le setteur setAge($age)

// *** L'HERITAGE ***
// 
// *** INTERFACE ET CLASSES ABSTRAITES ***
// Controle du code grace aux interfaces... une interface est un contrat qu'une classe signe et qu'elle doit respecter
//on cree une interface tout en haut du fichier

// *** ABSTRACTION ***
//on se fout de la facon dont c'est fait et de ce que ca fait on veut juste faire... il faut que ca ai la fonction ici travailler() 
//tant que l'objet aura la methode travailler

// *** POLYMORPHISME
//une fonction de meme nom qui ne donne pas les memes comportements

// *** CLASSE ABSTRAITE ***
// c'est exactement comme une interface mais qui a en plus des prorpietes et methodes qui peuvent deja etre definit
//1. Redéfinition obligatoire : comme pour l'interface, la methode abstraite doit etre implémentée!
//2. Pas d'instance possible : on ne peut pas creer d'objet à partir d'une classe abstraite