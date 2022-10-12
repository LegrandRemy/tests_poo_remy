<?php
abstract class Utilisateurs
{
    protected $user_name;
    protected $user_pass;
    protected $user_region;
    protected $prix_abo;
    public const ABONNEMENT = 15;

    public function __destruct()
    {
    }
    abstract public function setPrixAbo();

    public function getNom()
    {
        echo $this->user_name;
    }

    public function getPrixAbo()
    {
        echo $this->prix_abo;
    }
}
//on definit la classe parent comme abstraite avec le mot abstract. On supprime le constructeur
//qui va etre definit dans les classes étendues et on declare egalement la methode setPrixAbo()
//comme abstraite.
//Definir la methode setPrixAbo() comme abstraite fait bcp de sens puisque chaque type d'utilisateur
//va avoir un prix d'abonnement calculé different