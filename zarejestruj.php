<?
if(isset($_POST['discard']))
header("Location: index.php?strona=10");    
  
$pol= mysql_connect('mysql.cba.pl', 'asiatarasiuk', 'Iyilik1');

if ($pol->connect_error) 
{
    die("Problem z połączeniem: " . mysqli_connect_error());
}
$name_error=$surname_error=$login_error=$pass1_error=$pass2_error='';
$displayformName=$displayformSur=$displayformL=$displayformP1=$displayformP2=false;



        <form method='POST' action="index.php?strona=10">
            <table id="table">
                <tr><td>Imię:</td><td><input type="text" name='name' value='<?php echo htmlentities($name); ?>' /><span class='error'><?php echo $name_error; ?></span></td></tr>
                <tr><td>Nazwisko:</td><td><input type="text"  name='surname' value='<?php echo htmlentities($surname); ?>' /><span class='error'><?php echo $surname_error; ?></span></td></tr>
                <tr><td>Login:</td><td><input type="text" name='login' value='<?php echo htmlentities($login); ?>' /><span class='error'>*<?php echo $login_error; ?></span></td></tr>
                <tr><td>Hasło:</td><td><input type="password" name='pass1' value='<?php echo htmlentities($pass1); ?>' /><span class='error'><?php echo $pass1_error; ?></span></td></tr>
                <tr><td>Powtórz hasło:</td><td><input type="password" name='pass2' value='<?php echo htmlentities($pass2); ?>' /><span class='error'><?php echo $pass2_error; ?></span></td></tr>
                
                <?if(!empty($_SESSION['uzytkownicy']['login']))
                      echo' <tr><td><input type="submit" name="reg" value="Potwierdź zmiany"></td><td><form method="POST" action="index.php?strona=6"><input type="submit" name="discard" value="Odrzuć zmiany"></td></tr>';
                  else
                      echo '<tr><td></td><td><input type="submit" name="reg" value="Zarejestruj"></td></tr>'
                  ?>
            </table>
        </form>
    <?
}
mysql_close($pol);
?>