
<?php
function shuffleWord($word) {

    $wordArray = str_split($word);
    shuffle($wordArray);
    return implode('',$wordArray);
}

$word = 'random';
$anagram = shuffleWord($word);

?>