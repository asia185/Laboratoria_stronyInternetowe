<?php
        $user_id = $_GET['id'];
        echo'Czy na pewno chcesz usunąć tego użytkownika?<br><br>';
        echo'<form action ="index.php?str=7&id='.$user_id;
        echo'" method = "POST">
        <input type="submit" name = "TAK" value = "TAK" onclick="http://asiatarasiuk.cba.pl/index.php?str=7">
        <input type="submit" name = "NIE" value = "NIE" onclick="http://asiatarasiuk.cba.pl/index.php?str=7">
        </form>


';
?>