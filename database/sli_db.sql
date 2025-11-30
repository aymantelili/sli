CREATE DATABASE IF NOT EXISTS sli_drax CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE sli_drax;

DROP TABLE IF EXISTS users;
CREATE TABLE users (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    matricule VARCHAR(12) UNIQUE NOT NULL,
    name VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('directeur','sous_directeur','supervisor_mh','team_leader','operateur') NOT NULL,
    department VARCHAR(20) DEFAULT NULL,
    ligne_access JSON DEFAULT NULL,
    is_active TINYINT(1) DEFAULT 1,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Password for all demo accounts: demo123
INSERT INTO users (matricule, name, role, department, ligne_access) VALUES
('D16000001', 'Directeur Général', 'directeur', NULL, NULL),
('sd16000002', 'Sous-Directeur MH', 'sous_directeur', 'MH', NULL),
('s16000003', 'Supervisor MH', 'supervisor_mh', 'MH', NULL),
('tl16000123', 'Team Leader INR L1', 'team_leader', 'MH', '["INR-L1"]'),
('tl16000124', 'Team Leader INR L2-L3', 'team_leader', 'MH', '["INR-L2","INR-L3"]'),
('tl16000125', 'Team Leader INR L4', 'team_leader', 'MH', '["INR-L4"]'),
('O16001234', 'Operator INR L1', 'operateur', 'MH', '["INR-L1"]'),
('O16005678', 'Operator INR L2', 'operateur', 'MH', '["INR-L2"]'),
('O16009876', 'Operator INR L3', 'operateur', 'MH', '["INR-L3"]'),
('O16004321', 'Operator INR L4', 'operateur', 'MH', '["INR-L4"]')
ON DUPLICATE KEY UPDATE password = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi';
