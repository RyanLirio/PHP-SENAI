
<form method="POST" action="">
    <table>
        <tr>
            <td>User:</td>
            <td><input type="text" name="user"></td>
        </tr>
        <tr>
            <td>Password:</td>
            <td><input type="password" name="password"></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" value="Login"></td>
        </tr>
    </table>
</form>

<?php
    session_start();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $user = $_POST["user"] ?? '';
        $password = $_POST["password"] ?? '';

        if ($user == "admin" && $password == "123456"){
            $_SESSION['user'] = $user;
            header('Location: bemvindo.php');
            exit();
        }else{
            $autenticacao = "Usuário e senha incorretos. Tente novamente.";
            echo "<p>$autenticacao</p>";
        }
    }
?>