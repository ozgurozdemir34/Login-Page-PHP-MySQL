<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="deneme.php" method="post">
    Email:<input type="text" name="kayitmail">
    Şifre:<input type="password" name="kayitsifre">
    <input type="submit" name="kaydol" value="Kaydol">
    <br>
    Email:<input type="text" name="girismail">
    Şifre:<input type="password" name="girissifre">
    <input type="submit" name="giris" value="Giriş Yap">
    


</form>
<?php
error_reporting(0);
$vt=mysqli_connect("localhost","root","","veritabani");
$kayitmail=$_POST["kayitmail"];
$kayitsifre=$_POST["kayitsifre"];
$girismail=$_POST["girismail"];
$girissifre=$_POST["girissifre"];

$kayitsorgu="SELECT email FROM kullanici WHERE email='$kayitmail'";
$kayitsorgusonuc=mysqli_query($vt,$kayitsorgu);

if($_POST["kaydol"]){
        if (mysqli_num_rows($kayitsorgusonuc)==1) {
            echo"Aynı mailde kayıt zaten var";
        }
        else{
            $kayit="INSERT INTO kullanici(email,sifre) VALUES('$kayitmail','$kayitsifre')";
            $kayitsonuc=mysqli_query($vt,$kayit);
                if($kayitsonuc){
                    echo"Başarıyla kaydınız oluşturuldu";
                }


        }
}
if ($_POST["giris"]) {
    $giris="SELECT email,sifre FROM kullanici WHERE email='$girismail' AND sifre='$girissifre'";
    $girissorgu=mysqli_query($vt,$giris);
    if(mysqli_num_rows($girissorgu)==1){
        echo"Merhaba hoşgeldiniz";
        
    }
    else{
        echo"Lütfen tekrar deneyiniz";
    }
}




    ?>
    
   
</body>
</html>


