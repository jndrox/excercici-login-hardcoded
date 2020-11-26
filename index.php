<?php 
    require_once "./contrasenyas.php";
   
    $usuaris=array(
        "usuari1"=>"admin@educem.com",
        "usuari2"=>"donald@educem.com",
        "usuari3"=>"gilete@educem.com",
        "usuari4"=>"gon@educem.com",

    );
    
    $i=1;
    $trobat=0;
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $email= base64_decode($_POST['email']) ;
        $pass= base64_decode($_POST['password']);
        foreach ($usuaris as $usuari) {
        
           //$partes= explode(";",$usuari);
           //$hash=password_hash($password[1],PASSWORD_BCRYPT);
           
           if ($email==$usuari &&  password_verify($pass,  $password[$i])) {
               $trobat=1;
               header('Location: https://educem.com');
           }
           $i++;
        }
        if ($trobat==0) {
         //echo"no l'has trobat";
         echo"<script> alert('wrong username');document.getElementById('email').value=''; document.getElementById('password').value=''; </script>";
         //Malerta();
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

<form class="form-group" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" onsubmit=" return validarForm()">
  <div class="form-group">
    <label>
      <input id="email" type="text" name="email"  value=" ">
      <span>email</span>
    </label>
     
  </div>
  <div class="form-group">
    <label>
      <input id="password" type="text" name="password" value=" ">
      <span>password</span>
    </label>
   
    
  </div>
  <input type="submit" value="Send">
</form>
<a href="">vols recuperar la contrasenya?</a>
<p id="prova">aaa</p>
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
<script>
 function  validarForm(){
   var email= document.getElementById("email").value;
   var password= document.getElementById("password").value;

   var codEmail = window.btoa(email);
   var codPassword = window.btoa(password);
   document.getElementById("email").value=codEmail;
   document.getElementById("password").value=codPassword;
  // console.log(codEmail);
  // console.log(codPassword);
 } 
 
</script>
