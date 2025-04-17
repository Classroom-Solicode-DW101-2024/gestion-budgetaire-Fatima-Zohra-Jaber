-- Création de la base
CREATE DATABASE gestion_budget;
USE gestion_budget;

-- Table des utilisateurs
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- Table des catégories (revenus ou dépenses)
CREATE TABLE categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    type ENUM('revenu', 'depense') NOT NULL
);

-- Table des transactions
CREATE TABLE transactions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    category_id INT NOT NULL,
    montant DECIMAL(10, 2) NOT NULL,
    description TEXT,
    date_transaction DATE NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE CASCADE
);

-- Pour l'utilisateur 1
INSERT INTO transactions (user_id, category_id, montant, description, date_transaction)
VALUES 
(1, 1, 8000.00, 'Salaire mensuel', '2025-04-01'),
(1, 6, 2000.00, 'Loyer avril', '2025-04-03');

-- Pour l'utilisateur 2
INSERT INTO transactions (user_id, category_id, montant, description, date_transaction)
VALUES 
(2, 3, 1500.00, 'Vente d’objets', '2025-04-04'),
(2, 7, 300.00, 'Essence', '2025-04-05');
(2, 2, 1200.00, 'Bourse universitaire', '2025-04-06'),
(2, 8, 500.00, 'Courses hebdomadaires', '2025-04-07');

