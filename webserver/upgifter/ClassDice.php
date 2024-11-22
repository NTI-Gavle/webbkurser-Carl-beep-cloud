<?php



 class Dice
{

    // Static 

    private static $diceList=array();   
    private static $antal = 0;

public static function allKast()
{
    

    foreach (Dice::$diceList as $obj) {
        echo  "Tärning nummer " .($obj->getThisAntal()+1). " med ". $obj->getSidor(). " olika sidor"."<br>" . $obj->getHistogram() . "<br>";
    }


}

public static function Allkastantal($tim)
{

    foreach(Dice::$diceList as $obj)
    {
        $obj->rollMultiple($tim);
    }
}

// Denna Dice specefikt    

  
    protected $thisAntal =0;

    protected $arrnum=0;
    protected $rolls;
   

    protected $arr;


  
    public function __construct($rolls=6)
    {
        $this->rolls = $rolls;





        Dice::$diceList[Dice::$antal] = $this;
        $this->thisAntal = Dice::$antal;
        Dice::$antal++;
    }

    

    // Man gör en rull men det bored läggas in i en array också;
     function roll()
    {
    $num = @rand(1,$this->rolls);
    $this->arr[$this->arrnum++] = $num;
    return$num;
    }


    // vanlig rull
    function roll2()
    {
        return @ rand(1,$this->rolls);
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
   
    // Tänkt ska räkna varje gång man gör ett enslikt rull så nästa kast hamnar på nästa plats i arrayen.
    public function arrNum()
    {
        return $this->arrnum;
      
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