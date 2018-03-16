<h1>Inscription</h1>
<?php
if(isset($_POST["frmRegistration"])){
    $name = $_POST["name"] ?? "";
    $firstName = $_POST["firstName"] ?? "";
    $mail = $_POST["mail"] ?? "";
    $password = $_POST["password"] ?? "";

    $erreurs = array();

    if ($name == "") array_push($erreurs, "Veuillez saisir un nom");
    if ($firstName == "") array_push($erreurs, "Veuillez saisir un prenom");
    if ($mail == "") array_push($erreurs, "Veuillez saisir un mail");
    if ($password == "") array_push($erreurs, "Veuillez saisir un mot de passe");

    if(count($erreurs) > 0) {
        $message = "<ul>";

        for ($i = 0 ; $i < count($erreurs) ; $i++ ) {
            $message .= "<li>";
            $message .= $erreurs[$i];
            $message .= "</li>";
        }

        $message .= "</ul>";

        echo $message;
        include "frmRegistration.php";
    }

    else {
        $rec = new Queries();
        $password = sha1($password);
        $token = uniqid(sha1(date('Y-m-d|H:m:s')), false);

        $sql = "INSERT INTO t_users(usenom, useprenom, usemail, usepassword,usetoken, id_groupes)
                 VALUES ('$name', '$firstName', '$mail', '$password', '$token', 3)";

        $rec -> insert($sql);
        $message = "<h1>Wunderbar !!!</h1>";
        $message .= "<p>Vous êtes inscrit !!!</p>";
        $message .= "<p>Merci de cliquer sur le lien pour valider</p>";
        $message .= "<p><a href='http://localhost/CESI/AP/index.php?";
        $message .= "page=validationInscription&amp;token=";
        $message .= $token;
        $message .= "' target='_blank'>Lien</a></p>";
        mail($mail, 'Confirmation compte', $message);
        echo "<p>Ich bin dans la base</p>";

    }

}
else {
    include "frmRegistration.php";
}
