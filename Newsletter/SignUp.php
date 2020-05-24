<?php
//Database Information
$dbInfo = include 'dbInfo.php';
//Server Databse Section
$link = mysqli_connect($dbInfo['serverAddress'], $dbInfo['username'], $dbInfo['password'], $dbInfo['username']);
//Ensure SQL DB Connection
if (mysqli_connect_error()) {
    //If not Connected to database
    echo ("Connection Not Secured");
}
//Do not edit this
//##########
$host = $dbInfo['serverAddress'];
$db = $dbInfo['username'];
$user = $db;
$pass = $dbInfo['password'];
$charset = 'utf8mb4';

$dns = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
try {
    $pdo = new PDO($dns,$user,$pass,$options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(),(int)$e->getCode());
}
//##########

//Fills the email variable
$email = $_POST['emailing'];

//Checking to Ensure it is a valid email address
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  $emailErr = "Invalid email format";
    echo $emailErr;
}
else {
    //Checking for duplicates
    $stmt = $pdo->prepare("SELECT * FROM emails WHERE email=?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();
    if ($user) {
        //Email Found
        echo "Email already Signed Up";
        die();
    }
    else {
        //No Email Found
        //Sends to DB
        $stmt = $pdo->prepare('INSERT INTO emails VALUES (?)');
        $stmt->execute([$email]);
        echo "Signed Up!";
    }
}
/*HOW TO USE THIS SCRIPT

1.) Must Update the dbInfo.php with your information
2.) In your form, you must name the input: name="emailing"
3.)That's it, enjoy!
4.)It is recommended that you use my Send.php script as well as it works best with this script
*/
?>
