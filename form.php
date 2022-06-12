<?php
$imie=" ";$nazwisko="";$plec="";$panienskie="";$email="";$kod=""; $wal=0;
$preg_email="";$preg_kod="";
if(isset($_GET['id'])&&(!isset($_POST['wyslij']))){
    $id=$_GET['id'];
    $id_pol = mysql_connect('mysql.cba.pl', 'asiatarasiuk', 'Iyilik1');
        if($id_pol)
        {
            $id_baza=mysql_select_db('asiatarasiuk');
            if($id_baza){
                $tekst='SELECT id, imie, nazwisko, plec, panienskie, email, kod FROM formularz WHERE id='.$id;
                /*echo $tekst;*/
                $zap=mysql_query($tekst);
                if($zap){
                    while($wiersz=mysql_fetch_array($zap)){
                        $imie=$wiersz['imie'];
                        $nazwisko=$wiersz['nazwisko'];
                        $plec=$wiersz['plec'];
                        $panienskie=$wiersz['panienskie'];
                        $email=$wiersz['email'];
                        $kod=$wiersz['kod'];
                    }
                    mysql_close($id_pol);

                    $wal_im=1;
	                $wal_naz=1;
	                $wal_plec=1;
	                $wal_panien=1;
	                $wal_email=1;
	                $wal_kod=1;
                }
                else
                    echo "Błąd".mysql_error();
            }
            else echo "Błąd".mysql_error();
        }
        else echo "Błąd".mysql_error();
    }
if(isset($_POST['wyslij']))
{
	
    $imie=$_POST['imie'];
    $nazwisko=$_POST['nazwisko'];
    $plec=$_POST['plec'];
    $panienskie=$_POST['panienskie'];
    $email=$_POST['email'];
    $kod=$_POST['kod'];
	$wal_im=0;
	$wal_naz=0;
	$wal_plec=0;
	$wal_panien=0;
	$wal_email=0;
	$wal_kod=0;
	$wal_kod1=0;
	$wal_kod2=0;
	$wal_kod3=0;
	$wal_kod4=0;
	if(!empty($imie))
		$wal_im=1;

	if(!empty($nazwisko))
		$wal_naz=1;

	if(!empty($plec))
		$wal_plec=1;

	if(!empty($panienskie))
		$wal_panien=1;
	if($plec=='M'){
		$panienskie='--';
		$wal_panien=1;
	}
	if(!empty($email)){
		if(preg_match('/^[a-zA-Z1-9]{1,10}@[a-zA-Z]{1,10}\W[a-z]{2,3}$/',$email)){
			$wal_email=1;
		}
		else
		{
			$wal_kod3=1;
		}
	}
	else{
		$wal_kod4=1;
	}
	if(!empty($kod)){
		if(preg_match('/^[0-9]{2,2}-[0-9]{3,3}$/',$kod)){
			$wal_kod=1;
		}
		else
		{
			$wal_kod1=1;
		}
	}
	else{
		$wal_kod2=1;
	}
	if(($wal_im==1) and ($wal_naz==1) and ($wal_plec==1) and ($wal_panien==1) and ($wal_email==1) and ($wal_kod==1))
	{
		$wal=1;
        if(!isset($_GET['id'])){
		    echo "<br>Imię: $imie</br>";
		    echo "<br>Nazwisko: $nazwisko</br>";
		    echo "<br>Płeć: $plec</br>";
		    echo "<br>Nazwisko panieńskie: $panienskie</br>";
		    echo "<br>E-mail: $email</br>";
		    echo "<br>Kod: $kod</br>";
		    $_SESSION['pracownik'][]=array('imie'=>$imie, 'nazwisko'=>$nazwisko, 'plec'=>$plec, 'panienskie'=>$panienskie, 'email'=>$email, 'kod'=>$kod);
        }
        $id_pol = mysql_connect('mysql.cba.pl', 'asiatarasiuk', 'Iyilik1');
        if($id_pol)
        {
            $id_baza=mysql_select_db('asiatarasiuk');
            if($id_baza){
                if(isset($_GET['id']))
                {
                    $id=$_GET['id'];
                    $tekst="UPDATE formularz SET Imie='$imie',Nazwisko='$nazwisko',Plec='$plec',Panienskie='$panienskie',Email='$email',Kod='$kod' WHERE id=$id";
                }
                else{
                    $tekst="Insert Into formularz(ID,Imie,Nazwisko,Plec,Panienskie,Email,Kod) VALUES ('','$imie','$nazwisko','$plec','$panienskie','$email','$kod')";
                }

                $id_zap=mysql_query($tekst);
                if($id_zap)
                    mysql_close($id_pol);
                
                else
                    echo "Błąd".mysql_error();
                
            }
            else echo "Błąd".mysql_error();
        }
		else echo "Błąd".mysql_error();
}
}
 if((!isset($_POST['wyslij']))or($wal==0)or(!isset($_POST['potwierdz'])))
{
    if(isset($_GET['id'])){
        $id=$_GET['id'];
            $akcja="str=2&id=$id";
    }
    else{
        $akcja="str=2";
    }
 ?>
<form action="index.php?<?php echo $akcja ?>" method="POST" onclick="http://asiatarasiuk.cba.pl/index.php?str=6">
        			<table>	
							<tr><td>Imię:</td><td> <input type="text" name="imie" value="<?php if($wal_im==1) echo $imie;?>"><?php if($wal_im==0 and (isset($_POST['wyslij']))){ echo "<b><font color='red'> Niepodano imienia!</b></font>";}?></br></td></tr>
							<tr><td>Nazwisko:</td><td><input type="text" name="nazwisko" value="<?php if($wal_naz==1) echo $nazwisko;?>"> <?php if($wal_naz==0 and (isset($_POST['wyslij']))){ echo "<b><font color='red'>Niepodano nazwiska!</b></font>";}?><br/></td></tr>
							<tr>
								<td>Płeć:</td>
								<td>
									<input type="radio" name="plec" value="K" <?php if($plec=='K') echo 'checked';?>>kobieta<br/>
									<input type="radio" name="plec" value="M" <?php if($plec=='M') echo 'checked';?>>mężczyzna<br/>
								</td>
							</tr>
							<tr><td>Nazwisko panieńskie:</td><td><input type="text" name="panienskie" value="<?php if($wal_panien==1) echo $panienskie;?>"> <?php if($wal_panien==0 and (isset($_POST['wyslij']))){echo "<b><font color='red'>Niepodano nazwiska panieńskiego!</b></font>";}?><br/></td></tr>
							<tr><td>E-mail:</td><td><input type="text" name="email" value="<?php if($wal_email==1) echo $email;?>"> <?php if($wal_email==0 and(isset($_POST['wyslij']))){ if($wal_kod3==1){echo "<b><font color='orange'>Niepoprawny format e-mail. Prawidłowy: jj@gmail.com</b></font>";}if($wal_kod4==1){echo "<b><font color='red'>Niepodano adresu e-mail!</b></font>";}} ?><br/></td></tr>
							<tr><td>Kod pocztowy:</td><td><input type="text" name="kod" value="<?php if($wal_kod==1) echo $kod;?>"> <?php if($wal_kod==0 and (isset($_POST['wyslij']))){ if($wal_kod1==1){echo "<b><font color='orange'>Niepoprawny format kodu! Prawidłowy: np. 11-111</b></font>";}if($wal_kod2==1){echo "<b><font color='red'>Niepodano kodu!</b></font>";} }?><br/></td></tr>
							<?php
                                if(isset($_GET[id])){
                                    echo '<tr>';
                                    echo'<td><form method = "POST" action="http://asiatarasiuk.cba.pl/index.php?str=6"><input type='.'submit'.' name="anuluj" value='.'Anuluj'.' action="http://asiatarasiuk.cba.pl/index.php?str=6"></td></form>

';
                                    echo '<td><input onclick="http://asiatarasiuk.cba.pl/index.php?str=6" type='.'submit'.' name="wyslij" value='.'Potwierdź'.' onclick="http://asiatarasiuk.cba.pl/index.php?str=6"></td></tr>';


                                }
                                else{
                                    echo '<tr><td><input type='.'submit'.' name="wyslij" value='.'Wyślij formularz!'.'></td></tr>';
                                }
                            ?>
					</table>
				</form>
<?php
}
 ?>
