<?php
function counter()
{
        $file_before = file("counter.txt");
        $open = fopen("counter.txt", "w");
        $counter = 0;
        for($i = 0; $i < sizeof($file_before); $i++){
            $counter = $file_before[$i];
            $counter++;
            fwrite($open, $counter);
        }
        $file_after = file("counter.txt");
        echo "Odwiedziny: {$file_after[0]}</br>";
}
echo counter();
?>