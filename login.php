<?php
session_start();

?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <style>
        body{
            background: linear-gradient(45deg, #EECFBA, #C5DDE8);
        }
        H3 {
            font-size: 140%;
            font-family: Verdana, Georgia, Helvetica, sans-serif;
            color: #20B2AA;

        }
        fieldset{
            border: border: 1rem solid;
            width: 100px;
            background: linear-gradient(45deg, #EECFBA, #ffff80);
        }
        input[type=submit], input[type=reset] {
            background-color: #20B2AA;
            color: white;
            padding: 4px 16px;
            margin: 4px 2px;
            border: 1px solid #ccc;
            width: 100px;
        }
        input[type=password] {
            border-radius: 4px;
            padding: 12px 20px;
            margin: 4px 0;
            border: 1px solid #ccc;
            width: 250px;
        }

        input[type=email] {
            border-radius: 4px;
            padding: 12px 20px;
            margin: 4px 0;
            border: 1px solid #ccc;
            width: 250px;
        }
    </style>
</head>
<body>
<form action=""  method="post">
    <center>
        <fieldset style="...">
            <legend><h3>Login</h3></legend>
    <input type="email" name="email" required placeholder="E-mail"><br>
    <input type="password" name="pass" required placeholder="Password"><br><hr>
    <input type="submit" value="Submit">
    <input type="reset" value="Reset"><br>
            <font size="2" color="gray" face="Arial">If you don`t have account. Please click <a href="register.php">here</a></font>
        </fieldset>
    </center>
</form>
</body>
</html>
<?php
$email = $_POST['email'];
$pass = $_POST['pass'];

var_dump($pass);


//$pass = '1';
//$hes ='$2y$10$XsIyHGBVmCb4xA5DTRLt9.qte3q3RfUnfr6TT5pdXic0umseEYXfG';


$db = new PDO('mysql:dbname=registeruser;host=127.0.0.1','root','root');
$stmt = $db->prepare("SELECT * FROM user WHERE email = :email");
$stmt->bindParam(':email', $email);
$stmt->execute();
$data=$stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($data as $key=>$value){
echo 'data ' . $data[0]['pass']. '<br>';
}

if (password_verify($data[0]['pass'], $pass)) echo 'true';
//if(password_verify($pass, $hes)) echo 'rtue';
else {
    echo 'Invalid password.';
}
$_SESSION['id_user'] = $data['id_user'];
if(isset($_SESSION[0]['id_user']))    {
    echo "пользователь авторизован";
}


//var_dump($data);
echo '<br>';
//var_dump($_SESSION);
?>
