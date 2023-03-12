<?php
function censorship($sentence, $unwanted_words) {
    $i = 0;
    $num_words = count($unwanted_words);
    while ($i < $num_words) {
      $unwanted_word = $unwanted_words[$i];
      $asterisks = str_repeat('*', strlen($unwanted_word));
      $sentence = str_ireplace($unwanted_word, $asterisks, $sentence);
      $i++;
    }
    return $sentence;
}
echo censorship("robię kupę", array("kupę"));