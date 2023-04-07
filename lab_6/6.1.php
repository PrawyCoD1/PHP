<html>

<head>

    <title>Reverse function</title>
</head>

<body>
    <form method="post">
        <input type="file" name="pick_file" required/></br></br>
        <input type="submit">
    </form>
</body>
</html>
<?php
function reverseLine()
{
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["pick_file"])) {
        $pick_file = $_POST["pick_file"];
        $file = file($pick_file);
        echo "Preview of text in the file:</br>";
        for($i = 0; $i < sizeof($file); $i++){
            echo $file[$i]."</br>";
        }
        $open = fopen($pick_file, "w");
        for($j = sizeof($file) - 1; $j >=0; $j--){
            if($j == 3){ //That's for the case when there's no new line in the last line. If there is, output is going to be messed up
                fwrite($open, $file[$j] . "\n");
            }
            else{
            fwrite($open, $file[$j]);
            }
        }
    }
}
echo reverseLine();
?>
