USE coursportfolio;

CREATE TABLE IF NOT EXISTS creation (
    id_creation INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    created_at DATE NOT NULL,
    picture VARCHAR(255) DEFAULT NULL
);