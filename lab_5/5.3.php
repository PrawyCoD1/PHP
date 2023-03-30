<html>
    <head>
        <meta charset="UTF-8">
        <title>Directory Traversal</title>
    </head>
    <body>
        <form action="" method="post">
                <label>Pick action:</label>
                <select name="action" id="action" required>
                    <option value="dir_read">Read directory</option>
                    <option value="dir_del">Delete directory</option>
                    <option value="mkdir">Create directory</option>
                </select></br>
                <label>Directory path:</label> 
                <input type="text" name="dir_path" required/>
                <input type="submit"/>
        </form>
    </body>
<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $action = $_POST["action"];
        $dir_path = $_POST["dir_path"];
        switch($action){
            case "dir_read":
                if(!file_exists($dir_path)){
                    echo "Either path is incorrect or directory doesn't exists!";
                    break;
                }
                $result = scandir($dir_path);
                print_r($result);
                break;
            case "dir_del":
                if(!file_exists($dir_path)){
                    echo "Either path is incorrect or directory doesn't exists!";
                    break;
                }
                $scandir = scandir($dir_path);
                if (sizeof($scandir) > 2){
                    echo "Directory isn't empty, you can't delete it!";
                    break;
                }
                else{
                    echo "Directory has been successfully deleted!";
                }
                rmdir($dir_path);
                break;
            case "mkdir":
                if(is_dir($dir_path)){
                    echo "Directory already exists!";
                    break;
                }else{
                    echo "Directory sucessfully created!";
                }
                mkdir($dir_path);
                break;
        }
    }
?>
</html>

