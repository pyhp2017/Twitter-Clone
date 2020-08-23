<?php
namespace twitter;
require_once 'SignupForm.php';
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp</title>
</head>
<style>
    .error {color: #FF0000;}
</style>
<body>

<?php
    $form = new SignupForm("","","","");
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $form->setForm($_POST['userName'],$_POST['password'] , $_POST['email'] , "");
    }
?>

<form method="post" action="Signup.php">
<p>UserName: <input type="text" name="userName"></p>
<span class="error">* <?php  echo $form->getUserNameErr(); ?></span>
<br><br>
<p>Password: <input type="password" name="password"></p>
<span class="error">* <?php  echo $form->getPasswordErr(); ?></span>
<br><br>
<p>Email: <input type="email" name="email"></p>
<span class="error">* <?php  echo $form->getEmailErr(); ?></span>
<br><br>
<p>Avatar: <input type="file" name="avatar"></p>
<br><br>
    <input type="submit" name="submit" value="Signup">
</form>


<?php

if ($_SERVER["REQUEST_METHOD"] == "POST" && $form->getValid())
{

 $servername = "localhost";
 $username = "ahmad";
 $password = "password";
 $dbname = "twitter";

 try
 {
     $conn = new \PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
     $conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
     $stmt = $conn->prepare("INSERT INTO Users (userName, passWord, email,lastTweetDate, image) VALUES (:userNameVal, :passwordVal, :emailVal, :lastVal ,:imageVal)");
     $stmt->bindParam(":userNameVal",$userNameVal);
     $stmt->bindParam(":passwordVal",$passwordVal);
     $stmt->bindParam(":emailVal",$emailVal);
     $stmt->bindParam(":lastVal",$lastVal);
     $stmt->bindParam(":imageVal",$imageVal);

     $userNameVal = $form->getUserName();
     $passwordVal = $form->getPassword();
     $emailVal = $form->getEmail();
     $lastVal = date("Y-m-d H:i:s");
     $imageVal = $form->getImage();
     $stmt->execute();

     echo "<h1>You Just Signed Up</h1>";
 }
 catch (\PDOException $e)
 {
     echo $e->getMessage();
//     echo "Error While Trying to add User";
 }
 $conn = null;


}
?>



<?php
//$password = "ahmad123";
//
//$crypted_pass = crypt($password,"warinliveisexpensive");
//
//echo $crypted_pass;


//$1$XUEcuZoA$PCvqQsnj0kkkAm1ebjt8a.
//$pass_from_login is the user entered password
//$crypted_pass is the encryption

//$crypted_pass = 'tWtC7JCq/J0nE';
//$pass_from_login = "zaqmko123";


//if(crypt($pass_from_login,$crypted_pass) == $crypted_pass)
//{
//    echo("hello user!");
//}

//$expected  = crypt('12345', '$2a$07$usesomesillystringforsalt$');
//$correct   = crypt('12345', '$2a$07$usesomesillystringforsalt$');
//$incorrect = crypt('apple',  '$2a$07$usesomesillystringforsalt$');

//var_dump(hash_equals($expected, $correct));
//var_dump(hash_equals($expected, $incorrect));


//$cryptUserInput = crypt("ahmad123","warinliveisexpensive");
//
//if(hash_equals($crypted_pass,$cryptUserInput))
//{
//    echo "Welcome";
//}
//if (defined("CRYPT_BLOWFISH") && CRYPT_BLOWFISH) {
//    echo "CRYPT_BLOWFISH is enabled!";
//} else {
//    echo "CRYPT_BLOWFISH is not available";
//}


//echo hash("sha512","ahmad123");

?>

</body>
</html>