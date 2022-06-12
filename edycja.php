<?php
    $szukaj='';
    $id_pol = mysql_connect('mysql.cba.pl', 'asiatarasiuk', 'Iyilik1');
    if($id_pol)
    {
    	$id_baza=mysql_select_db('asiatarasiuk');
		if($id_baza){
			$zapytanie="SELECT count(*) FROM formularz";
			$pomoc=mysql_query($zapytanie);
			$liczba_wyn=mysql_result($pomoc,0);
			$liczba_na_str=10;
			$liczba_str=$liczba_wyn/$liczba_na_str;
			$liczba_str=ceil($liczba_str);
			if(isset($_GET['st']))
				$st=$_GET['st'];
			else
				$st=1;
			$pomin=($st-1)*$liczba_na_str;
			$zapytanie="SELECT id, imie, nazwisko, plec, panienskie, email, kod FROM formularz LIMIT $pomin, $liczba_na_str";
			/*echo $zapytanie;*/
			$wyniki=mysql_query($zapytanie);
			echo '<table>';
			echo '<tr><td>Edycja</td><td>ID</td><td>Imię</td><td>Nazwisko</td><td>Płeć</td><td>Panieńskie</td><td>E-mail</td><td>Kod</td></tr>';
			while($wiersz=mysql_fetch_array($wyniki)){
				echo '<tr><td>'.'<a href="index.php?str=8">Edytuj</a>'.
                '</td><td>'. $wiersz['id'] .
				'</td><td>'. $wiersz['imie'] .
				'</td><td>'. $wiersz['nazwisko'] .
				'</td><td>'. $wiersz['plec'] .
				'</td><td>'. $wiersz['panienskie'] .
				'</td><td>'. $wiersz['email'] .
				'</td><td>'. $wiersz['kod'] .
				'</td></tr>'; 
			}
			echo '</table>';
			$linki='';
			if($st>1)
				{$linki=$linki. '<a href="'.$_SERVER['PHP_SELF'].'?szukaj='.$szukaj.'&str=6'.'&st='.($st-1).'"><-</a>';}
			else
				{$linki=$linki.'<-';}
			for($i=1;$i<=$liczba_str;$i++){
				if($st==$i)
					{$linki=$linki.''.$i;}
				else
					{$linki=$linki. '<a href="'.$_SERVER['PHP_SELF'].'?szukaj='.$szukaj.'&str=6'.'&st='.$i.'">'.$i.'</a>';}
			}
			if($st<$liczba_str) 
				{$linki=$linki. '<a href="'.$_SERVER['PHP_SELF'].'?szukaj='.$szukaj.'&str=6'.'&st='.($st+1).'">-></a>';}
			else
				$linki=$linki.'->';
			echo $linki;
		}
        else{
            echo 'Baza nie istnieje';
        }
	}
    else{
        echo 'Problem z połączeniem';
    }
?>