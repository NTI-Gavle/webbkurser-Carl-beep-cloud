
6

Ändra så att någon metod har samma namn i alla klasserna (och samma antal argument och typer). Skriv om ditt huvudprogram så att det utnyttjar subklasserna. 
Skapa en array och lagra alla dina olika bollar i den. Läs in och skriv ut på lämpligt sätt.

<br><br><br>
7 

Bekanta dig med begreppet static. Sök information själv och skapa en klassvariabel i klassen Boll som håller reda på hur många bollar som finns “just nu” när programmet körs. 
Skapa en metod för att “hämta” värdet. Varför inte göra en den som en klassmetod? Testa om det fungera

<?php
// todo    Det funkade inte men sen fungerade det helst plötsligt.
session_start();


if (!isset($_SESSION['arr'])) {
    $_SESSION['arr'] = [];
}


//$arr=[];
//$arrcount = 0;



class Boll
{

    protected static int $antal=0;
    protected $färg;

    protected $r =0;



    public function __construct($F, $radie)
    {

        $this->färg = $F;

        
        $this->r = intval($radie);
   

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
        echo $this->sho();
    }




    function sho()
    {
        echo "  <br> Boll nummer:";
        Boll::$antal++;
        return Boll::$antal;
    }


}
class Badboll extends Boll
{


    protected $floats;

    function __construct($F, $radie, $floats)
    {

        parent::__construct($F, $radie);
        $this->floats = $floats;
    }


    function show()
    {
        
        echo "<br>";
        echo "<br>";
        echo "BadBALL INFO";
        echo "<br>";
        echo "Färgen på bollen är " . $this->färg;
        echo "<br>";
        echo "Bollens radie är " . $this->r;
        echo "<br>";
        echo "Bollens area är " . $this->r * $this->r * 3.14;
        echo "<br>";
        echo "Yes if BadBolle can flaot: " . $this->floats;
        echo $this->sho();
    }




}



class ostBoll extends Boll
{
   protected $ostig;

 function __construct($F,$radie,$ost,) {
    parent::__construct($F, $radie);

    $this->ostig = $ost;
}

function show()
    {
        
        echo "<br>";
        echo "<br>";
        echo "OSTBALL INFO";
        echo "<br>";
        echo "Färgen på bollen är " . $this->färg;
        echo "<br>";
        echo "Bollens radie är " . $this->r;
        echo "<br>";
        echo "Bollens area är " . $this->r * $this->r * 3.14;
        echo "<br>";
        echo "Hur ostig är bollen: " . $this->ostig;
        echo $this->sho();
      
    }




    
}


class bastuboll extends Boll{

    protected $bastu;



    function __construct($F,$radie,$bastu,){

    parent::__construct($F, $radie);

    $this->bastu = $bastu; 
    }


    function show()
    {
         
        echo "<br>";
        echo "<br>";
        echo "BASTUBALL INFO";
        echo "<br>";
        echo "Färgen på bollen är " . $this->färg;
        echo "<br>";
        echo "Bollens radie är " . $this->r;
        echo "<br>";
        echo "Bollens area är " . $this->r * $this->r * 3.14;
        echo "<br>";
        echo "ÄR det e bastu boll: " . $this->bastu;
        echo $this->sho();
    }


}








if (isset($_POST['flyt'])) {
    
if ($_POST['flyt'] == "ost") {
    $ball = new ostBoll($_POST['t'], $_POST['rad'], $_POST['flyt']);
    $_SESSION['arr'][] = $ball;
  //  $arr[$arrcount] = $ball;
  //  $arrcount++;
  
}

if ($_POST['flyt'] == "Floats") {
    $ball = new Badboll($_POST['t'], $_POST['rad'], $_POST['flyt']);
    $_SESSION['arr'][] = $ball;
   // $arr[$arrcount] = $ball;
   // $arrcount++;
   
}

if ($_POST['flyt'] == "Bastu") {
    $ball = new bastuboll($_POST['t'], $_POST['rad'], $_POST['flyt']);
    $_SESSION['arr'][] = $ball;
 //   $arr[$arrcount] = $ball;
  //  $arrcount++;
  
}


}

if (isset($_POST['ding'])) {

   foreach ($_SESSION['arr'] as $obj) {
       $obj->show();
   }

}









//@$boll = new Boll($_POST['t'], $_POST['rad']);

//@$badBoll = new Badboll($_POST['t'], $_POST['rad'], $_POST['flyt'] );

//@$ostboll = new ostBoll( $_POST['t'],$_POST['rad'],$_POST['ostig']);

//@$bastuboll = new bastuboll($_POST['t'],$_POST['rad'],$_POST['bastu']);

//! $boll->show();

//! $badBoll->show();

//! $ostboll->show();

//! $bastuboll->show();

?>

<br>
 <br>
 <br>
<form action="" method="post">

    Färg : <input name="t" type="text"> <br>
    Radie : <input name="rad" type="number"> <br>
  Floats :  <select name="flyt" id="">

  <option type="radio" name="oj" value="ost">ostig</option>
    <option  type="radio" name="oj" value="Floats">Floats</option>
    <option type="radio" name="oj" value="Bastu">Bastu</option>
</select>


<br>

    <input type="submit">
</form>


<br><br>

<form action="" method="post">
    <input name="ding" type="submit">
</form>

<br>