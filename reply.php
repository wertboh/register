<?php
session_start();
if (!$_SESSION['auth']) {
    header('Location: login.php');
    die();
}
else {
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Guest Book</title>
    <style>
        body {
            background: linear-gradient(45deg, #EECFBA, #C5DDE8);
        }

        H3 {
            font-size: 1000%;
            font-family: Bookman, URW Bookman L, serif;
            color: #20B2AA;
            margin-bottom: 100px;
        }

        input[type=submit], input[type=reset], input[type=button] {
            background-color: #20B2AA;
            color: white;
            padding: 4px 16px;
            margin: 4px 2px;
            border: 1px solid #ccc;
            width: 100px;
        }

        /*textarea {*/
        /*    1px solid #888;*/
        /*}*/

        input:focus {
            outline: 3px solid transparent;
        }

    </style>
</head>
<body>
<form action="" method="post">
    <input type="button" name="exit" value="Exit" style="float: right;">
    <center>
        <h3>Guest book</h3>
        <textarea name="commet" required placeholder="  Write you comment.." rows="4" cols="50"
                  minlength="10" maxlength="2000">

        </textarea><br>
        <input type="submit" value="Submit">
        <input type="reset" value="Reset"><br>
    </center>
</form>
</body>
</html>
<?php

$comment = $_POST['commet'];
//$db = new PDO('mysql:dbname=registeruser;host=127.0.0.1', 'root', 'root');
//$stmt = $db->prepare("SELECT * FROM user WHERE id_user = :id_user ");
//$stmt = $db->prepare(':id_user', $_SESSION['id_user']);
//$stmt->execute();
//$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
//var_dump($data);
if (!empty($comment)) {
//    echo $data[0]['login'];
    echo '<br><div style="border: 2px solid yellow; width: 1000px; border-radius: 10px; background: pink; word-break: break-all; 
padding-left:20px; padding-top:5px; padding-right:35px; padding-bottom:10px">' . $comment . '</div>';
}
if (isset($_POST['exit'])) {
    session_destroy();
    header ('Location: login.php');
}
}
?>