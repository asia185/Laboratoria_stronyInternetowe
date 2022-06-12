<table width="778" border="1">
<tr><th><b>Imię</b></th><th>Nazwisko</th><th>Płeć</th><th>Nazwisko Panieńskie</th><th>E-mail</th><th>Kod</th></tr></b></b>
<?php
    foreach($_SESSION['pracownik'] as $i)
    {
		echo "<tr>";
        echo "<td>".$i['imie']."<br/></td>";
        echo "<td>".$i['nazwisko']."<br/></td>";
        echo "<td>".$i['plec']."<br/></td>";
        echo "<td>".$i['panienskie']."<br/></td>";
        echo "<td>".$i['email']."<br/></td>";
        echo "<td>".$i['kod']."<br/></td>";
        echo "</tr>";
    }
?>
</table>