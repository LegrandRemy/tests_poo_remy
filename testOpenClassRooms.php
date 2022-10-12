<!-- Le langage PHP propose déjà plusieurs classes par défaut, comme DateTime. Pour utiliser cette
classe, vous devez l'appeler par son nom, précédé du mot clé new -->
<?php
$date = new DateTime;

// On vient d’instancier la classeDateTime
// I
// Il a fallu assigner l'instance   DateTime  à une variable, ici $date, pour pouvoir la manipuler
?>


<!-- Pour rappel, lorsque vous passez une variable en paramètre d’une fonction, PHP en fait une
copie par défaut. Par exemple, à l’exécution de ce code, la variable $a n’a pas changé :  -->
<?php
// déclaration par référence avec le symbole &
function foo1($var)
{
    $var = 2;
}

$a = 1;
foo1($a);
// $a vaut toujours 1
?>


<!-- Si vous souhaitez pouvoir modifier la variable au sein de la fonction, vous pouvez ajouter
le symbole & pour indiquer au langage de ne pas copier la valeur dans votre fonction,
mais plutôt de manipuler directement la variable d’origine. -->
<?php

// déclaration par référence avec le symbole &
function foo(&$var)
{
    $var = 2;
}
$a = 1;
foo($a);
// $a vaut 2 maintenant