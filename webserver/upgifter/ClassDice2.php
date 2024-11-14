<?php
class Dice
{
    private static $diceList = [];
    private static $antal = 0;

 //? Galen grej som jag gjorde helt själv (=
    public static function loadFromSession()
    {
        if (isset($_SESSION['diceList'])) {
            self::$diceList = unserialize($_SESSION['diceList']);
            self::$antal = count(self::$diceList);
        }
    }

    //! Här sparas sakerna
    public static function saveToSession()
    {
        $_SESSION['diceList'] = serialize(self::$diceList);
    }

 //! En lista som sakerna sparas i 
    public static function addNewDice($sides = 6)
    {
        $newDice = new Dice($sides);
        self::$diceList[self::$antal] = $newDice;
        self::$antal++;
        self::saveToSession();
    }

    public static function allKast()
    {
        foreach (self::$diceList as $obj) {
            echo "Tärning nummer " . ($obj->getThisAntal() + 1) . " med " . $obj->getSidor() . " olika sidor<br>" . $obj->getHistogram() . "<br>";
        }
    }

    public static function rollAllDices($times)
    {
        foreach (self::$diceList as $obj) {
            $obj->rollMultiple($times);
        }
        self::saveToSession();
    }

    protected $thisAntal;
    protected $arrnum = 0;
    protected $rolls;
    protected $arr = [];

    public function __construct($rolls)
    {
        $this->rolls = $rolls;
        $this->thisAntal = self::$antal;
    }

    function roll()
    {
        $num = rand(1, $this->rolls);
        $this->arr[$this->arrnum++] = $num;
        return $num;
    }

    function rollMultiple($times)
    {
        for ($i = 0; $i < $times; $i++) {
            $this->roll();
        }
    }

    function getHistogram()
    {
        $output = "<h2>Resultat för Tärning " . ($this->getThisAntal() + 1) . ":</h2>";
        for ($i = 1; $i <= $this->rolls; $i++) {
            $count = array_count_values($this->arr)[$i] ?? 0;
            $output .= "[" . $i . "] " . str_repeat("*", $count) . " (" . $count . "st)<br>";
        }
        return $output;
    }

    function getThisAntal()
    {
        return $this->thisAntal;
    }

    function getSidor()
    {
        return $this->rolls;
    }
}

?>