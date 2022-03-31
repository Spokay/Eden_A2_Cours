<?php
include "inc/function.inc.php";

if (isAdmin()){
    header('Location:secret_2.php');
}else if (isUser()){
    header('Location:secret_1.php');
}

if ($_POST){
    if ($_POST['remember'] == true){
        setcookie('login', $_POST['login'], time() + 3000);
        setcookie('passw', $_POST['passw'], time() + 3000);
    }else{
        setcookie('login', '', time() + 3000);
        setcookie('passw', '', time() + 3000);
    }
    $_SESSION['login'] = $_POST['login'];
    if ($_POST['login'] == 'Admin' && $_POST['passw'] == 'Admin123'){
        $_SESSION['status'] = 2;
        header('Location:secret_2.php');
    }elseif ($_POST['login'] == 'Exelib' && $_POST['passw'] == 'exe123'){
        $_SESSION['status'] = 1;
        header('Location:secret_1.php');
    }else{
        $_SESSION['status'] = 0;
        header('Location:login.php?action=error');
    }
}

if (!empty($_GET) && $_GET['action'] == 'error'){
?>
    <div style="background-color: rgba(255,0,0,0.6); width: 70%; padding: 20px; display: flex; align-items: center; justify-content: center;flex-direction: column; margin: 0 auto">
        <h2>Le pseudo ou le mot de passe est incorrect ! </h2>
        <a href="inscription.php">S'inscrire ici</a>
    </div>
<?php
}else{
?>
<h1>Page de connexion</h1>
<form action="" method="POST" enctype="multipart/form-data">
    <input type="text" name="login" placeholder="Login"<?php if (isset($_COOKIE['login'])){echo "value='".$_COOKIE['login']."'";}
    ?>
    >
    <input type="password" name="passw" placeholder="Password" <?php if (isset($_COOKIE['passw'])){echo "value='".$_COOKIE['passw']."'";}
    ?>
    >
    <label for="remember">Se rappeler de moi</label>
    <input type="checkbox" name="remember" <?php if (isset($_COOKIE['login']) || isset($_COOKIE['passw'])){echo "checked";}
    ?>
    >
    <input type="submit" value="Envoyer">
</form>

<?php
}
?>