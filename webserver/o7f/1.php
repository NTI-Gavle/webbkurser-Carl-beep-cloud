1
Skapa en klass vid namn Boll med egenskaperna färg och radie, skapa sen ett program som använder sig av klassen boll.
Skapa en boll, sätt färg och radie på den samt skriv ut informationen om den aktuella bollen. Skriv lämpliga funktioner.
Exempelvis beräkning av volym.
<br> <br>
2
Bygg vidare på föregående övning. Skriv en egen konstruktor där du skickar med värdena som argument till
klassegenskaperna radie och färg.
<br><br>
3
Kolla upp hur “php property promotion” fungerar och implementera det.
<br><br>
4
Sätt private framför klassegenskaperna och public framför konstruktorer och metoder. Försök få programmet att fungera.
Eventuellt måste du skriva några ytterligare metoder.
<br><br>
5
Bygg vidare på föregående övning. Skapa två subklasser (arv) till din klass Boll, skapa sedan ett program som använder
sig
utav subklasserna, där den skapar bollar från varje klass och använder lämpliga metoder som finns i klasserna.
Exempelvis spåboll, rödboll, magiskboll, fotboll, etc.

<?php

class Boll
{

    protected $färg;

    protected $r;


    public function __construct($F, $radie)
    {

        $this->färg = $F;

        $this->r = $radie;

    }


    function show()
    {

        echo "<br>";
        echo "<br>";
        echo "BALL INFO";
        echo "<br>";
        echo "Färgen på bollen är " . $this->färg;
        echo "<br>";
        echo "Bollens radie är " . $this->r;
        echo "<br>";
        echo "Bollens area är " . $this->r * $this->r * 3.14;

    }


}
class Badboll extends Boll
{

    private $floats;

    function __construct($F, $radie, $floats)
    {

        parent::__construct($F, $radie);
        $this->floats = $floats;
    }

    
    function show()
    {

        echo "<br>";
        echo "<br>";
        echo "BALL INFO";
        echo "<br>";
        echo "Färgen på bollen är " . $this->färg;
        echo "<br>";
        echo "Bollens radie är " . $this->r;
        echo "<br>";
        echo "Bollens area är " . $this->r * $this->r * 3.14;

    }

}






@$boll = new Boll($_POST['t'], $_POST['rad']);



$boll->show();

?>

<form action="" method="post">

    Färg : <input name="t" type="text"> <br>
    Radie : <input name="rad" type="number">

    <input type="submit">
</form>