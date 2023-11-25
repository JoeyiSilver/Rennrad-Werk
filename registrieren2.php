<?php
if(isset($_POST["submit"])){
    require("mysql.php");
    $stmt_check = $mysql->prepare("SELECT * FROM accounts WHERE USERNAME = :user"); // Username überprüfen
    $stmt_check->bindParam(":user", $_POST["username"]);
    $stmt_check->execute();
    $count = $stmt_check->rowCount();

    if($count == 0){
        // Username ist frei
        if($_POST["pw"] == $_POST["pw2"]){
            // Passwörter stimmen überein
            $stmt_insert = $mysql->prepare("INSERT INTO accounts (USERNAME, PASSWORD) VALUES (:user, :pw)");
            $stmt_insert->bindParam(":user", $_POST["username"]);
            $hash = password_hash($_POST["pw"], PASSWORD_BCRYPT);
            $stmt_insert->bindParam(":pw", $hash);
            $stmt_insert->execute();
            echo "Der Account wurde erfolgreich erstellt.";
        } else {
            echo "Die Passwörter stimmen nicht überein.";
        }
    } else {
        echo "Der Username ist bereits vergeben.";
    }
}
?>
