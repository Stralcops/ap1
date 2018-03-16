<h1>Login</h1>
<?php
if (isset($_POST['frmLogin'])) {
    $mail = $_POST['mail'] ?? "";
    $password = $_POST['password'] ?? "";
    $erreurs = array();

    if ($mail == "") array_push($erreurs, "Veuillez saisir un mail");
    if ($password == "") array_push($erreurs, "Veuillez saisir un mot de passe");
    if (count($erreurs) > 0) {

        $message = "<ul>";
        for ($i = 0; $i < count($erreurs); $i++) {
            $message .= "<li>";
            $message .= $erreurs[$i];
            $message .= "</li>";
        }
        $message .= "</ul>";
        echo $message;
        include "frmLogin.php";
    } else {
        $password = sha1($password);
        $sql = "SELECT * FROM t_users  WHERE usemail='$mail' AND usepassword='$password'";
        $query = new Queries();
        $resultat = $query -> select($sql) -> fetch();
        $_SESSION['prenom']= $resultat -> useprenom;
        echo 'Bienvenue ' . $_SESSION['prenom'] . ' !';
        $_SESSION['connect'] = "oui";
    }
}

else {
    include "frmLogin.php";
}
?>

