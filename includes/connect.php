 <?php
 
 //$connect = mysqli_connect('localhost','root','root','bookstore'); 

 $dsn = "mysql:host=localhost;dbname=meijer_nik_portfolio;charset=utf8mb4";
 try {
 $connect = new PDO($dsn, 'root', '');
 } catch (Exception $e) {
   error_log($e->getMessage());
   exit('unable to connect');
 }



 ?>