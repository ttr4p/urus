
CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(50) NOT NULL
);

CREATE TABLE IF NOT EXISTS estoque (
    id INT AUTO_INCREMENT PRIMARY KEY,
    produto VARCHAR(100),
    quantidade INT
);

INSERT INTO usuarios (username, password) VALUES ('admin', 'admin123');
INSERT INTO estoque (produto, quantidade) VALUES ('Teclado', 10), ('Mouse', 5);
