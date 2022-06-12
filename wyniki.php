<?php
    $id_pol = mysql_connect('mysql.cba.pl', 'asiatarasiuk', 'Iyilik1');
	if($id_pol)
	{
		$id_baza=mysql_select_db('asiatarasiuk');
		if($id_baza){
			$zap="SELECT id, imie, nazwisko, plec, panienskie, email, kod FROM formularz";
			if(empty($sz)){
				if(isset($_POST['kryteria']))
					$sz=$_POST['kryteria'];
				if(isset($_GET['kryteria']))
					$sz=$_GET['kryteria'];
			}
			/*echo 'sz '.$sz;*/
			$where='';
			if(!empty($sz)){
				$sz2=explode(' ',$sz);
				$i=0;
				while(isset($sz2[$i])){
					$l_kr[$i]=" Nazwisko LIKE '%$sz2[$i]%'";
					$i=$i+1;
				}
				$where=implode(' OR ',$l_kr);
				/*echo $sz;*/
				$zap=$zap." WHERE $where";
				$zap_pom="SELECT count(*) FROM formularz WHERE $where";
				/*echo $zap_pom;*/
			    $pom=mysql_query($zap_pom);
			    $liczba_wyn=mysql_result($pom,0);
				if($liczba_wyn!=0){
					/*echo $liczba_wyn;*/
			        $liczba_na_str=10;
			        $liczba_str=$liczba_wyn/$liczba_na_str;
			        $liczba_str=ceil($liczba_str);
					/*echo 'lstr'.$liczba_str;*/
			        if(isset($_GET['st2']))
				        $st2=$_GET['st2'];
			        else
				        $st2=1;
			        $pomin=($st2-1)*$liczba_na_str;
					$zap=$zap." LIMIT $pomin, $liczba_na_str";
					$w=mysql_query($zap);
					echo '<table width="778" border="1">';
					echo '<tr><th><b>ID</th></b><th><b>Imię</th></b><th><b>Nazwisko</b></th><th><b>Płeć</b></th><th><b>Nazwisko Panieńskie</b></th><th><b>E-mail</b></th><th><b>Kod pocztowy</b></th></tr></b>';
					while($wiersz=mysql_fetch_array($w)){
						echo '<tr><td>'. $wiersz['id'] .
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
					if($st2>1){
						$linki=$linki. '<a href="'.$_SERVER['PHP_SELF'].'?szukaj='.$szukaj.'&str=5'.'&st2='.($st2-1).'&kryteria='.$sz.'"><-</a>';
					}
					else
						$linki=$linki.'<-';
					for($i=1;$i<=$liczba_str;$i++){
						if($st2==$i)
							$linki=$linki.''.$i;
						else
							$linki=$linki. '<a href="'.$_SERVER['PHP_SELF'].'?szukaj='.$szukaj.'&str=5'.'&st2='.$i.'&kryteria='.$sz.'">'.$i.'</a>';
					}
					if($st2<$liczba_str)
						$linki=$linki. '<a href="'.$_SERVER['PHP_SELF'].'?szukaj='.$szukaj.'&str=5'.'&st2='.($st2+1).'&kryteria='.$sz.'">-></a>';
					else
						$linki=$linki.'->';
					echo $linki;
				}
				else
					echo 'Nie znaleziono kryteriów z podanym nazwiskiem pracownika.';
			}
			else
			   echo 'Nie podano nazwiska pracownika!';
		}
		else
			echo 'Baza danych nie istnieje.';
	}
	else
		echo 'Wykryty problem połączenia z bazą danych!';
?>