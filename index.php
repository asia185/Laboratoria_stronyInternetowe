<?php
session_start();
if(!isset($_SESSION['pracownik'])){
	$_SESSION['pracownik']=array();
}
if(!isset($_SESSION['login'])){
    $_SESSION['login']='';
}
if(!isset($_SESSION['uprawnienia'])){
    $_SESSION['uprawnienia']=0;
}
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Joanna Tarasiuk</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<link rel="stylesheet" href="style.css" type="text/css"/>
	</head>
	<body>
		<div id="zewnetrzny">
			<div id="nagory">Joanna Tarasiuk</div>
			<div id="tr">
			<div id="lewy">
				<ul id="l">
					<li><a href="index.php?str=1">Strona główna</a></li>
                    <?php
                    if(($_SESSION['uprawnienia'])>0)
                        echo '<li><a href="index.php?str=2">Formularz</a></li>';
                        echo '<li><a href="index.php?str=3">Zawartość Sesji</a></li>';
                        echo ' <li><a href="index.php?str=4">Baza Pracowników</a></li>';
                    if(($_SESSION['uprawnienia'])>1)
                        echo '<li><a href="index.php?str=6">Edycja Pracowników</a></li>';
                    if(($_SESSION['uprawnienia'])>2)
                        echo '<li><a href="index.php?str=7">Usunięcie Pracownika</a></li>';
                    ?>
				</ul>
			</div>
			<div id="prawy">
            <? 
                if(($_SESSION['uprawnienia'])>0){
				    echo '<form method="POST" action="index.php?str=5">';
					echo '<input type="text" name="kryteria"/>';
					echo '<input type="submit" name="szukaj" value="Szukaj!"/><br><br>';
				    echo '</form>';
                }
            ?>
                <?php if(!empty($_SESSION['login']))
                        echo '<li><a href="index.php?str=9"><ul><li>Wyloguj się!</ul></li></a></li>';
                    else
                        echo '<li><a href="index.php?str=9"><ul><li>Zaloguj się!</ul></li></a></li>';
                ?>
					<li><a href="index.php?str=10"><ul><li>Zarejestruj się!</ul></li></a></li>
			</div>
			<div id="srodkowy">
				<?php
if(isset($_GET['str']))
{
$strona=$_GET['str'];
if($strona=='2')
include('form.php');
elseif($strona==3)
include('sesja.php');
elseif($strona==4)
include('baza.php');
elseif($strona==5)
include('wyniki.php');
elseif($strona==6)
include('baza.php');
elseif($strona==7)
include('baza.php');
elseif($strona==8)
include('usun.php');
elseif($strona==9)
include('loguj.php');

elseif($strona==10)
include('zarejestruj.php');
else
echo 'To jest moja strona główna.';
}
else echo 'To jest moja strona główna.';
 ?>
			</div>
			
			</div>
			<div id='nadole'><?php 
				
					echo "Liczba dodanych pracownikow: ";
					echo count($_SESSION['pracownik']);
				
				?>
			</div>
		</div>
	</body>
</html>
