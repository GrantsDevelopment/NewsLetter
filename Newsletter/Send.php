<?php
//Database Information
$dbInfo = include 'dbInfo.php';
//Server Databse Section
$link = mysqli_connect($dbInfo['serverAddress'], $dbInfo['username'], $dbInfo['password'], $dbInfo['username']);
//Ensure SQL DB Connection
if (mysqli_connect_error()) {
    //If not Connected to database
    echo ("Connection Not Secured");
    //Will kill the script if no connection
    die();
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

//Creating the array for the email list
$email = [];

//This block here will grab the data from the DB
$stmt = $pdo->query('SELECT email FROM emails');
while ($row = $stmt->fetch()) {
    $email[] = $row['email'];
}

//Subscribers Email Address
//This will be used to store the news content
$newsContent = $_POST['content'];
//This will be the subject information that the user will see initially
$subject = $_POST['subject'];
//Headers, to tell where the email came from
$header = "From: webmaster@grantwebdevelopment.com";
//This will be used to send the Emails out
for ($i = 0; $i < sizeOf($email); $i++) {
    //Where the actual Magic happens
    //Sending to, The Subject, The Content, Return Email(Who From)
    echo $email[i];
    mail($email[$i], $subject, $newsContent, $header);
}
/*How to use this script:
1.)Need to configure your form as the following:
    Subject Input: name="subject"
    TextArea: name="content"
    [I will include the SendNewsletter.php as a reference]
2.)That's all
*/

/*
Created by: Grant Huey on May 20th, 2020
Updated On: May 20th, 2020
My Website: http://www.grantwebdevelopment.com
*/
?>
