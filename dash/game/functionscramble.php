<?php
function scramble($word)
{
    if (strlen($word) < 4) {
        return $word;
    }
    //END IF
    $punctuation = array(',', '.', '!', '?', ')', '(', ':', ';');
    $start_punc = '';
    $end_punc = '';
    $first_letter = substr($word, 0, 1);
    $last_letter = substr($word, -1);
    if (in_array($first_letter, $punctuation)) {
        $start_punc = $first_letter;
        $word = substr($word, 1);
        $first_letter = substr($word, 0, 1);
    }
    //END IF
    if (in_array($last_letter, $punctuation)) {
        $end_punc = $last_letter;
        $word = substr($word, 0, strlen($word) - 1);
        $last_letter = substr($word, -1);
    }
    //END IF
    $array = str_split(substr($word, 1, strlen($word) - 2));
    shuffle($array);
    return $start_punc . $first_letter . implode('', $array) . $last_letter . $end_punc;
}
?>