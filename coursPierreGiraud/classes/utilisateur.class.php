<!-- //dans le terminal:
//C:\xampp\htdocs\tests_poo_remy> php -S localhost:8000
//sur le navigateur http://localhost:8000/coursPierreGiraud/cours.php -->

<?php
// /*** PROPRIETES ***/
//les variables crées dans les classes sont LES PROPRIETES
class Utilisateur
{

    protected $user_name; //propriétés "private" donc accessible que interieur classe
    protected $user_pass; //proprietes "public" donc accessible interieur et exterieur classe
    protected $user_region;
    protected $prix_abo;
    //CONSTANTE DE CLASSE AJOUT SETPRIXABO ET GETPRIXABO + REGION DANS CONSTRUCTEUR
    //ON RAJOUTE 2 PROPRIETES DANS LA CLASSE $user_region qui va contenir la region
    //$prix_abo qui va contenir le prix de l'abo apres calcul
    public const ABONNEMENT = 15; //constante qui stocke la valeur 15(represente le prix d'un abonnement)

    // /*** METHODES ***/
    //les fonctions definies dans une classe sont LES METHODES
    //methodes "public" donc accessible depuis int et ext de la classe
    //Le rôle de getNom() va être de récupérer la valeur contenue dans la propriété $user_name
    //les méthodes qui servent à récupérer des valeurs sont appelées des getters
    public function getNom()
    {
        echo $this->user_name; //this est appelé "pseudo-variable" et fait référence a l'objet courament utilisé
    }
    //Les rôles de setNom() et de setPass() vont être respectivement de définir ou de modifier la valeur 
    //contenue dans les propriétés $user_name et $user_pass relativement à l’objet courant 
    //(la valeur de la propriété ne sera modifiée que pour l’objet couramment utilisé)
    //les méthodes qui servent à définir / modifier / mettre à jour une valeur sont appelées des setters
    public function setNom($news_user_name)
    {
        return $this->user_name = $news_user_name;
        //la ligne $this->user_name = $new_user_name signifie littéralement que l’on 
        //souhaite stocker dans la propriété $user_name définie dans notre classe le contenu 
        //de $new_user_name (c’est-à-dire l’argument qui va être passé) POUR un objet 
        //en particulier et en l’occurrence ici pour $pierre. La pseudo-variable 
        //$this fait référence dans ce cas à $pierre.
    }

    public function setPass($new_user_pass)
    {
        return $this->user_pass = $new_user_pass;
    }


    public function __construct($n, $p, $r)
    {
        $this->user_name = $n;
        $this->user_pass = $p;
        //on modifie le constructeur pour initialiser la valeur des la creation de l'objet
        $this->user_region = $r;
    }

    public function __destruct()
    {
        //Du code à exécuter
    }
    //creation methode qui va definir le prix de l'abonnement
    //self::ABONNEMENT pour acceder au contenu de la const car elle a ete defini dans la meme classe
    public function setPrixAbo()
    {
        /*On peut imaginer qu'on calcule un prix d'abonnement différent
             *selon les profils des utilisateurs*/
        if ($this->user_region === 'Sud') {
            return $this->prix_abo = self::ABONNEMENT / 2;
        } else {
            return $this->prix_abo = self::ABONNEMENT;
        }
    }
    //creation methode qui renvoie la valeur contenue dans la propriete $prix_abo pour un objet
    public function getPrixAbo()
    {
        echo $this->prix_abo;
    }
    //changement aussi dans class Admin
}