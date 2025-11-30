<?php require '../../includes/auth.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SLI - Operator Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <nav class="navbar navbar-dark bg-primary">
        <div class="container-fluid">
            <span class="navbar-brand">SLI | Welcome <?= htmlspecialchars($_SESSION['name']) ?> (<?= $_SESSION['matricule'] ?>)</span>
            <a href="../../logout.php" class="btn btn-outline-light btn-sm">Logout</a>
        </div>
    </nav>

    <div class="container mt-5">
        <h2 class="text-center mb-4">INR Feeding Performance</h2>
        <div class="row g-4">
            <?php
            $allowed = $_SESSION['ligne_access'];
            $fakeData = [
                "INR-L1" => ["on_time" => 98, "avg_time" => "4.2", "late" => 3],
                "INR-L2" => ["on_time" => 95, "avg_time" => "5.1", "late" => 8],
                "INR-L3" => ["on_time" => 99, "avg_time" => "4.0", "late" => 1],
                "INR-L4" => ["on_time" => 92, "avg_time" => "6.3", "late" => 12],
            ];

            foreach ($allowed as $ligne) {
                $d = $fakeData[$ligne];
                $color = $d['on_time'] >= 98 ? 'success' : ($d['on_time'] >= 95 ? 'warning' : 'danger');
                echo '
                <div class="col-md-6">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-'.$color.' text-white">
                            <h5 class="mb-0">'.$ligne.'</h5>
                        </div>
                        <div class="card-body">
                            <h3>'.$d['on_time'].'% <small class="text-muted">On Time</small></h3>
                            <p>Average Feeding Time: <strong>'.$d['avg_time'].' min</strong></p>
                            <p>Late Containers Today: <span class="badge bg-danger">'.$d['late'].'</span></p>
                        </div>
                    </div>
                </div>';
            }
            ?>
        </div>
    </div>
</body>
</html>
