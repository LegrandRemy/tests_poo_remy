<?php
class Admin extends Utilisateur
{
    //on tente d'afficher $user_name qui n'existe pas dans Admin
    // public function getNom2()
    // {
    //     return $this->user_name;
    // }
    // On surcharge la methode getNom() de Utilisateur. Ici, on conserve le meme code 
    //dans la methode mais c'est cettemethode qui sera utilisée par $pierre
    // cela ne fonctionnera que si on change les proprietes en mode "protected" au lieu de "public"
    // public function getNom()
    // {
    //     return $this->user_name;
    // }


    //nouvelle methode pour la classe fille seulement
    protected static $ban;
    public const ABONNEMENT = 5;
    //avec operateur de resolution de portee parent::
    public function __construct($n, $p, $r)
    {
        $this->user_name = strtoupper($n);
        $this->user_pass = $p;
        $this->user_region = $r;
    }

    // sans propriete static
    // public function setBan($b)
    // {
    //     $this->ban[] .= $b;
    // }
    // public function getBan()
    // {
    //     echo 'utilisateur bannis par ' . $this->user_name . ' : ';
    //     foreach ($this->ban as $valeur) {
    //         echo $valeur . ', ';
    //     }
    // }
    //fin sans propriete static

    //avec propriete static de $ban
    public function setBan(...$b) //les ... permet à une fonction d’accepter un nombre variable 
    //d’arguments. On utilise cette écriture ici pour permettre à nos objets de bannir une ou 
    //plusieurs personnes d’un coup.
    {
        foreach ($b as $banned) {
            self::$ban[] .= $banned;
        }
    }
    public function getBan()
    {
        echo 'utilisateur bannis : '; //on remplace $this->ban per self::$ban
        //puisque notre propriété $ban est désormais statique et appartient à la classe et non pas à un objet en particulier. 
        //Il faut donc utiliser l’opérateur de résolution de portée pour y accéder.
        //La boucle foreach nous permet simplement d’ajouter les différentes valeurs passées en argument dans notre propriété 
        //statique $ban qu’on définit comme un tableau.
        foreach (self::$ban as $valeur) {
            echo $valeur . ', ';
        } //Chaque objet de la classe Admin va ainsi pouvoir bannir des utilisateurs en utilisant 
    }   //setBan() et chaque nouvel utilisateur banni va être stocké dans la propriété $ban. 
    //De même, chaque objet va pouvoir afficher la liste complète des personnes bannies en utilisant getBan().
    //echo dans fichier source cours.php pour afficher la liste des bannis

    public function setPrixAbo()
    {
        if ($this->user_region === 'Sud') {
            return $this->prix_abo = self::ABONNEMENT;
        } else {
            return $this->prix_abo = parent::ABONNEMENT / 2;
        }
    }
}