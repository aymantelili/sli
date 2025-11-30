<?php
// includes/auth.php
if (session_status() === PHP_SESSION_NONE) session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: ../../index.php');
    exit;
}

function hasAccessToLigne($requiredLigne) {
    if ($_SESSION['role'] === 'directeur' || 
        $_SESSION['role'] === 'sous_directeur' || 
        $_SESSION['role'] === 'supervisor_mh') {
        return true;
    }
    if (in_array($requiredLigne, $_SESSION['ligne_access'] ?? [])) {
        return true;
    }
    return false;
}
?>
