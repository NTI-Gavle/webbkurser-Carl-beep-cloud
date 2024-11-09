<?php



 class Dice
{

    // Static 

    private static $diceList=array();
    private static $antal = 0;

public static  function allKast()
{
    

    foreach (Dice::$diceList as $obj) {
        echo  "Tärning nummer " .($obj->getThisAntal()+1). " med ". $obj->getSidor(). " olika sidor"."<br>" ./*  $obj->roll()*/ $obj->getHistogram() . "<br>";
    }


}

// Denna Dice specefikt    
    protected $thisAntal =0;
    protected $rolls;
   
    protected $arr;

  
    public function __construct($rolls=6)
    {
        $this->rolls = $rolls;

        Dice::$diceList[Dice::$antal] = $this;
        $this->thisAntal = Dice::$antal;
        Dice::$antal++;
    }

    //? Fattar inte vad ska jag göra med destruktorn
    /*
    public function __destruct()
    {

        echo "Denna tärning har blivit likviderad";

    }
    */

     function roll()
    {
     return  @rand(1,$this->rolls);
    }


    function rollMultiple($times) {
        $arr = [];
        for ($i = 0; $i < $times; $i++) {
            $arr[]=$this->roll();
        }
        $this->arr = $arr;
        return $arr;
   
    }


    // skriver ut arrayen som skapas men skrivs ut som en string
    // är inte så bra nu men behövs säkert senare;
    function getSarr()
    {   
        echo "<br>";
        $sarr="";
        for ($i=0; $i < count($this->arr); $i++) { 
            $sarr.=strval($this->arr[$i]).", ";
        } 


        return $sarr;

    }
   

    //Vilket antal i skapelseföljden denna tärning har.
     function getThisAntal()
    {
        return $this->thisAntal;
    }

    // Hur många sidor den här tärningen har.
    function getSidor()
    {
        return $this->rolls;
    }

    
    public function getHistogram()
    {

    echo "<h2>". "Resultatet av alla kasten med tärning " .($this->getThisAntal()+1). " blev:"."</h2>";
    for ($i=1; $i< $this->rolls+1; $i++) { 
     echo "<br>";
     echo "[".$i."]";
        $numamountcount=0;
            for ($y=1; $y <  count($this->arr)+1; $y++)
             {
             
                if  ($i ==$this->arr[$y-1]) {
                {
                    echo "*";
                $numamountcount+= 1;
                
                }
                   
            }
           
            }
            echo "(". $numamountcount."st)";

    }
echo "<br>";
echo "<h3>" . "alla kasten" . "</h3>";
echo "<br>";
    for ($i=0; $i < count($this->arr); $i++) { 
        echo "Kast: ".($i+1). " är ".$this->arr[$i] . "<br>"; 
    }

  
}
}