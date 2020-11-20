<?php 
    $usuaris=array(
        "usuari1"=>"admin@educem.com;iloveu",
        "usuari2"=>"donald@educem.com;m4k3Am3r1caGr3atAg41n!",
        "usuari3"=>"gilete@educem.com;ErF4ryS1empr3",
        "usuari4"=>"gon@educem.com;Fatality!",

    );
   // var_dump($usuaris);
   
    $trobat=0;
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $email= $_POST['email'];
        $pass= $_POST['password'];
        foreach ($usuaris as $usuari) {
        
           $partes= explode(";",$usuari);
           $hash=password_hash($partes[1], PASSWORD_DEFAULT);
           
           if ($email==$partes[0] &&  password_verify($pass, $hash )) {
               $trobat=1;
               header('Location: https://educem.com');
           }
        }
        if ($trobat==0) {
         echo"no l'has trobat";
        }
    }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <h1>formulari</h1>

<form class="form-group" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
  <div class="form-group">
    <label>
      <input id="fname" type="text" name="email" value=" ">
      <span>email</span>
    </label>
    
    
  </div>
  <div class="form-group">
    <label>
      <input type="password" name="password" value="">
      <span>password</span>
    </label>
   
    
  </div>
  <input type="submit" value="Send">
</form>
<a href="">vols recuperar la contrasenya?</a>
</body>
</html>
<style>
  body {
  background: #35dc9b;
  display: flex;
  flex-direction: column;
  flex-grow: 0;
  align-items: center;
  justify-content: center;
  height: 100vh;
}



h1 {
  margin: 0 auto 40px;
  color: #fff;
  font: 20px Helvetica;
  text-transform: uppercase;
  letter-spacing: 3px;
}
</style>