
<?php
echo medel($num=[2,1,2,4,6,54,2,12,543,123,22]);


$medel;
function medel($num){
    $sum=0;
for ($i=0; $i < Count($num); $i++) {
    $sum += $num[$i];

}

$medel = $sum/count($num);
return $medel;
}

?>