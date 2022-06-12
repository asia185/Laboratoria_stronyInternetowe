<?php
    $szukaj='';
    if ( (isset($_POST['TAK'])) && ($_POST['TAK'] == 'TAK') && ($_GET["str"] == 7))
    {
        $user_id = $_GET['id'];
        $pol = mysql_connect('mysql.cba.pl', 'asiatarasiuk', 'Iyilik1');
        if ($pol)
        {
            $baza = mysql_select_db("asiatarasiuk");
            if ($baza)
            {
            $del= "DELETE FROM formularz WHERE id='".$user_id."'";
            $del_zap = mysql_query($del);
                if(!$del_zap)
                {
                echo "Wykryty błąd podczas zapytania do bazy danych".mysql_error();
                }
            }
            else
            {
            echo "Wykryty błąd połączenia z bazą danych".mysql_error();
            }
            mysql_close($pol);
        }
        else
        {
        echo "Wykryty błąd połączenia z serwerem".mysql_error();
        }
    }
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
            if(isset($_GET['str']))
                $str=$_GET['str'];
			if(isset($_GET['st']))
				$st=$_GET['st'];
			else
				$st=1;
           	$pomin=($st-1)*$liczba_na_str;
			$zapytanie="SELECT id, imie, nazwisko, plec, panienskie, email, kod FROM formularz LIMIT $pomin, $liczba_na_str";
			/*echo $zapytanie;*/
			$wyniki=mysql_query($zapytanie);
			echo '<table width="778" border="1">';
            if($str==4)
			    echo '<tr><td><b>ID</b></td><td><b>Imię</b></td><td><b>Nazwisko</b></td><td><b>Płeć</b></td><td><b>Nazwisko Panieńskie</b></td><td><b>E-mail</b></td><td><b>Kod</b></td></tr>';
            if($str==6)
                echo '<tr><td>Edycja</td><td>ID</td><td>Imię</td><td>Nazwisko</td><td>Płeć</td><td>Panieńskie</td><td>E-mail</td><td>Kod</td></tr>';
            if($str==7)
                echo '<tr><td>Usuń</td><td>ID</td><td>Imię</td><td>Nazwisko</td><td>Płeć</td><td>Panieńskie</td><td>E-mail</td><td>Kod</td></tr>';
			while($wiersz=mysql_fetch_array($wyniki)){
				echo '<tr>';
                if($str==6)
                    echo '<td><a href="index.php?str=2&id='.$wiersz['id'].'">Edycja</td>';
                if($str==7)
                    echo '<td><a href="index.php?str=8&id= '.$wiersz['id'].'">Usuń</td>';
                echo '<td>'.$wiersz['id'] .
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
				{$linki=$linki. '<a href="'.$_SERVER['PHP_SELF'].'?szukaj='.$szukaj.'&str='.$str.'&st='.($st-1).'"><-</a>';}
			else
				{$linki=$linki.'<- </b></center>';}
			for($i=1;$i<=$liczba_str;$i++){
				if($st==$i)
					{$linki=$linki.''.$i;}
				else
					{$linki=$linki. '<a href="'.$_SERVER['PHP_SELF'].'?szukaj='.$szukaj.'&str='.$str.'&st='.$i.'">'.$i.'</a></b></center>';}
			}
			if($st<$liczba_str) 
				{$linki=$linki. '<a href="'.$_SERVER['PHP_SELF'].'?szukaj='.$szukaj.'&str='.$str.'&st='.($st+1).'">-></a></center>';}
			else
				$linki=$linki.'   -></b>';
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