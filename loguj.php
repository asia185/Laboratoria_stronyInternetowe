<?php
$wal=0;
if(!empty($_SESSION['login'])){
    $_SESSION['login']='';
    $_SESSION['uprawnienia']=0;
    }
if(isset($_POST['loguj'])){
    $login=$_POST['login'];
    $haslo=$_POST['haslo'];
    if(!empty($login) and !empty($haslo)){
    $pol = mysql_connect('mysql.cba.pl', 'asiatarasiuk', 'Iyilik1');
        if ($pol)
        {
            $baza = mysql_select_db("asiatarasiuk");
            if ($baza)
            {
            $zap="SELECT login, haslo, uprawnienia, imie, nazwisko FROM uzytkownicy WHERE login LIKE '".$login."' AND haslo LIKE '".$haslo."'";
            $del_zap = mysql_query($zap);
            echo mysql_error();
                if($del_zap)
                {
                 while($wiersz=mysql_fetch_array($del_zap)){
                           $imie=$wiersz['imie'];
                           $_SESSION['login']=$wiersz['login'];
                           $_SESSION['uprawnienia']=$wiersz['uprawnienia'];
                        }
                        if(empty($imie))
                            $wal=0;
                        else{
                            echo 'Dzień dobry, <b>'.$imie;
echo ' ';
                            echo $_SESSION['login'];
                            echo '</b>.<br> Twój poziom uprawnień:';
echo '<b> <font color="red"> ';
                            echo $_SESSION['uprawnienia'];
echo '</b></font>.';

                    if(($_SESSION['uprawnienia'])==4)
echo '<br><br>Jesteś <font color="green"><b>administratorem</b></font>. Masz możliwość usuwania użytkowników, zmiany poziomu ich dostępu, a także wgląd do formularza, zawartości sesji, bazy danych, zmiany danych
oraz wyszukiwarki.';

if(($_SESSION['uprawnienia'])==1)
echo '<br><br>Jesteś <font color="green"><b>użytkownikiem (poziom 1)</b></font>. Masz wgląd do formularza, zawartości sesji, bazy danych, zmiany danych
oraz wyszukiwarki.';

if(($_SESSION['uprawnienia'])==2)
echo '<br><br>Jesteś <font color="green"><b>użytkownikiem (poziom 2)</b></font>. Masz wgląd do formularza, zawartości sesji, bazy danych, zmiany danych,
oraz wyszukiwarki, a dodatkowo również możliwość edycji.';

if(($_SESSION['uprawnienia'])==3)
echo '<br><br>Jesteś <font color="green"><b>użytkownikiem (poziom 3)</b></font>. Masz wgląd do formularza, zawartości sesji, bazy danych, zmiany danych,
oraz wyszukiwarki, a dodatkowo również możliwość edycji oraz usuwania.';

                            $wal=1;
                        }
                }
                else{
                        echo "Błąd podczas zapytania do bazy danych".mysql_error();
                    }
            }
            else
            {
            echo "Błąd połączenia z bazą danych".mysql_error();
            }
            mysql_close($pol);
        }
        else
        {
        echo "Błąd połączenia z serwerem".mysql_error();
        }
    }
}
if(!isset($_POST['loguj'])or($wal==0))
{
    ?>
<form method="POST" action="index.php?str=9">
    <table>
	<tr><td>Twój Login:</td>   <td><input type="text" name="login"/></td></tr>
    <tr><td>Twoje Hasło:</td> <td><input type="password" name="haslo"/></td></tr>
	<tr><td></td><td><br><input type="submit" name="loguj" value="Zaloguj się!"/></td></tr>
    </table>
</form>
<?php
}
?>		