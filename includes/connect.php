 <?php

 //$connect = mysqli_connect('localhost','root','root','bookstore'); 
 $dsn = "mysql:host=localhost;dbname=fugbv919_nik;charset=utf8mb4";
 try {
 $connect = new PDO($dsn, 'fugbv919_general', 'Kolya345!');
 } catch (Exception $e) {
   error_log($e->getMessage());
   exit('unable to connect');
 }



 ?>