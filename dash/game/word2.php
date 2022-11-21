<?php
 
/**
Description
    Typoglycemia is a relatively new word given to a purported recent discovery about how people read 
    written text. 
     
    As wikipedia puts it[1] :The legend, propagated by email and message boards, 
    purportedly demonstrates that readers can understand the meaning of words in a sentence even when 
    the interior letters of each word are scrambled. As long as all the necessary letters are present, 
    and the first and last letters remain the same, readers appear to have little trouble reading the 
    text.
     
    Or as Urban Dictionary puts it[2] : Typoglycemia The mind's ability to decipher a mis-spelled word 
    if the first and last letters of the word are correct. The word Typoglycemia describes Teh mdin's 
    atbiliy to dpeihecr a msi-selpeld wrod if the fsirt and lsat lteetrs of the wrod are cerorct.
 
Input Description
    Any string of words with/without punctuation.
 
Output Description
    A scrambled form of the same sentence but with the word's first and last letter's positions intact.
 
Sample Inputs
    According to a research team at Cambridge University, it doesn't matter in what order the letters 
    in a word are, the only important thing is that the first and last letter be in the right place. 
     
    The rest can be a total mess and you can still read it without a problem.This is because the human 
    mind does not read every letter by itself, but the word as a whole. 
     
    Such a condition is appropriately called Typoglycemia.
 
Sample Outputs
    Aoccdrnig to a rseearch taem at Cmabrigde Uinervtisy, it deosn't mttaer in waht oredr the ltteers 
    in a wrod are, the olny iprmoatnt tihng is taht the frist and lsat ltteer be in the rghit pclae. 
     
    The rset can be a taotl mses and you can sitll raed it wouthit a porbelm. Tihs is bcuseae the huamn 
    mnid deos not raed ervey lteter by istlef, but the wrod as a wlohe. 
     
    Scuh a cdonition is arppoiatrely cllaed Typoglycemia.
/**/
$html = '';
$pa = isset($_POST['pa']) ? $_POST['pa'] : '';
$in_text = isset($_POST['in_text']) ? $_POST['in_text'] : '';
$out_paragraph = '';
switch (strtolower($pa)) {
    case 'process':
        $paragraphs = explode("\n", $in_text);
        foreach ($paragraphs as $paragraph) {
            $words = explode(' ', trim($paragraph));
            $out_words = '';
            foreach ($words as $word) {
                $out_words .= scramble($word) . ' ';
            }
            //END FOREACH
            $out_paragraph .= $out_words . " \n";
        }
        //END FOREACH
        $html .= '' . '<textarea cols="70" rows="20">' . $out_paragraph . '</textarea>' . '';
    default:
        $html = '' . '<form method="post">' . '<textarea cols="70" rows="20" name="in_text">' . $in_text . '</textarea> ' . '<textarea cols="70" rows="20">' . $out_paragraph . '</textarea>' . '<br /><input type="hidden" name="pa" value="process" />' . '<input type="submit" />' . '</form>' . '';
        break;
}
//END SWITCH
echo '<html><head><title>Typoglycemia</title></head><body>' . $html . '</body></html>';
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