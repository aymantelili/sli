<?php
// login.php
session_start();
require_once 'config/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $matricule = trim($_POST['matricule']);
    $password  = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE matricule = ? AND is_active = 1");
    $stmt->execute([$matricule]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        // Session data
        $_SESSION['user_id']      = $user['id'];
        $_SESSION['matricule']    = $user['matricule'];
        $_SESSION['name']         = $user['name'];
        $_SESSION['role']         = $user['role'];
        $_SESSION['department']   = $user['department'];
        $_SESSION['ligne_access'] = $user['ligne_access'] ? json_decode($user['ligne_access'], true) : [];

        // Redirect according to role
        switch ($user['role']) {
            case 'directeur':
                header('Location: dashboard/directeur/index.php'); break;
            case 'sous_directeur':
                header('Location: dashboard/sous-directeur/index.php'); break;
            case 'supervisor_mh':
                header('Location: dashboard/supervisor/index.php'); break;
            case 'team_leader':
                header('Location: dashboard/teamleader/index.php'); break;
            case 'operateur':
                header('Location: dashboard/operateur/index.php'); break;
            default:
                header('Location: dashboard/operateur/index.php');
        }
        exit;
    } else {
        $_SESSION['error'] = "Invalid Matricule or Password";
        header('Location: index.php');
        exit;
    }
}
?>
