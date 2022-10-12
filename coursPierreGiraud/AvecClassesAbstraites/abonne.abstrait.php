<?php
//Dans ce fichier nous allons definir un constructeur pour nos abonnes qui representent 
//nos utilisateurs de base et allons à nouveau implémenter la methode setPrixAbo()

class Abonne extends Utilisateurs
{
    public function __construct($n, $p, $r)
    {
        $this->user_name = $n;
        $this->user_pass = $p;
        $this->user_region = $r;
    }

    public function setPrixAbo()
    {
        if ($this->user_region === 'Sud') {
            return $this->prix_abo = parent::ABONNEMENT / 2;
        } else {
            return $this->prix_abo = parent::ABONNEMENT;
        }
    }
}
//on peut maintenant retourner sur le script principal et creer des objet à partir de nos classes
//etendues et voir comment ils se comportent