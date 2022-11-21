<?php
$arr_a = array(1,2,3,4,5,6);
$random_keys=array_rand($arr_a,5);
$fresult = $arr_a[$random_keys[0]];
$sresult = $arr_a[$random_keys[1]];
$thresult = $arr_a[$random_keys[2]];
$ftresult = $arr_a[$random_keys[3]];

$cheatresult = $arr_a[$random_keys[4]];
//$sixthresult = $arr_a[$random_keys[5]];

/**echo "<p>first = $fresult</p>";
echo "<p>Second = $sresult</p>";
echo "<p>third = $thresult</p>";
echo "<p>fourth = $ftresult</p>";
echo "<p>fifth = $cheatresult</p>";***/
//echo "<p>sixth = $sixthresult</p>";

/***
function wordcombos ($words) {
        if ( count($words) <= 1 ) {
            $result = $words;
        } else {
            $result = array();
            for ( $i = 0; $i < count($words); ++$i ) {
                $firstword = $words[$i];
                $remainingwords = array();
                for ( $j = 0; $j < count($words); ++$j ) {
                    if ( $i <> $j ) $remainingwords[] = $words[$j];
                }
                $combos = wordcombos($remainingwords);
                for ( $j = 0; $j < count($combos); ++$j ) {
                    $result[] = $firstword . ' ' . $combos[$j];
                }
            }
        }
        return $result;
    }
***/


include_once("../finishit.php");
$word = 'random';
$anagram = x_shuffle($word);
$anagramm = x_shuffle($word);
$nad = x_shuffle($word);
$red = $nad;
echo $anagram."<br/>";
echo $anagramm."<br/>";
//echo $nad."<br/>";
//echo $red."<br/>";

?>
