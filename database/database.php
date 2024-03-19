<?php 
class database {
    function create(){
        $dsn = new PDO("mysql:host=localhost;dbname=pokemonbooster", "root", "");
        $dsn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $createTable = ("CREATE TABLE IF NOT EXISTS
        `users` (
            `idUser` int(11) NOT NULL AUTO_INCREMENT,
            `username` varchar(255) DEFAULT NULL,
            `email` varchar(255) DEFAULT NULL,
            `passwordUser` varchar(255) DEFAULT NULL,
            `age` int(11) DEFAULT NULL,
            `pictures` LONGBLOB DEFAULT NULL,
            `isAdmin` tinyint(1) DEFAULT '0',
            PRIMARY KEY (`idUser`),
            CONSTRAINT unique_key UNIQUE (`email`)
        ) ENGINE = InnoDB AUTO_INCREMENT = 1 DEFAULT CHARSET = latin1");
        $dsn->exec($createTable);

        $createTable = ("CREATE TABLE IF NOT EXISTS
        `cards` (
            `idCard` int(11) NOT NULL AUTO_INCREMENT,
            `nameCard` varchar(255) DEFAULT NULL,
            `supertype` varchar(255) DEFAULT NULL,
            `image` TEXT DEFAULT NULL,
            `subtypes` TEXT DEFAULT NULL,
            `types` varchar(255) DEFAULT NULL,
            `number` int(11) DEFAULT NULL,
            `rarety` varchar(255) DEFAULT NULL,
            PRIMARY key (`idCard`)
        ) ENGINE = InnoDB AUTO_INCREMENT = 1 DEFAULT CHARSET = latin1");
        $dsn->exec($createTable);

        $createTable = ("CREATE TABLE IF NOT EXISTS
        `cardForUser` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `idUser` int(11) DEFAULT NULL,
            `idCard` int(11) DEFAULT NULL,
            PRIMARY key (`id`),
            FOREIGN KEY (`idUser`) REFERENCES users(`idUser`),
            FOREIGN KEY (`idCard`) REFERENCES cards(`idCard`)
        ) ENGINE = InnoDB AUTO_INCREMENT = 1 DEFAULT CHARSET = latin1");
        $dsn->exec($createTable);
    }

    function connect()
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "pokemonbooster";
        $dsn = '';
        try {
            $dsn = 'mysql:host=' . $servername . ';dbname=' . $dbname;
            $pdo = new PDO($dsn, $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'connection failed: ' . $e->getMessage();
        }
        return $pdo;
    }
}
?>