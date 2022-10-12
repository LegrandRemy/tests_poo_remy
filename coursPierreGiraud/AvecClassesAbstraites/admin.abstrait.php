<?php
class Admins extends utilisateurs
{
    protected static $ban;
    public const ABONNEMENT = 5;

    public function __construct($n, $p, $r)
    {
        $this->user_name = strtoupper($n);
        $this->user_pass = $p;
        $this->user_region = $r;
    }

    public function setBan(...$b)
    {
        foreach ($b as $banned) {
            self::$ban[] .= $banned;
        }
    }

    public function getBan()
    {
        echo 'utilisateur bannis : ';

        foreach (self::$ban as $valeur) {
            echo $valeur . ', ';
        }
    }
    //lors de l'implementation d'une methode déclarée comme abstraite, on ne reecrit pas de abstract puisque
    //justement on implemente le methode abstraite. On change self:: par parent::
    public function setPrixAbo()
    {
        if ($this->user_region === 'Sud') {
            return $this->prix_abo = parent::ABONNEMENT / 6;
        } else {
            return $this->prix_abo = parent::ABONNEMENT / 3;
        }
    }
}
//on créé ensuite un fichier abonne.abstrait.php