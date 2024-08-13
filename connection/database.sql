--create database
gameclassroom

--create users

CREATE TABLE users(
    id INT AUTO_INCREMENT NOT NULL,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    guessPoints INT(255) NOT NULL,
    profile VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY(id)
)

-- CREATE TABLE guessNumberData(
--     guessId INT AUTO_INCREMENT NOT NULL,
--     userId INT,
--     points INT(255) NOT NULL,
--     PRIMARY KEY(guessId),
--     FOREIGN KEY (userId) REFERENCES users(id)
-- )
-- -- insert data into guessNUmberData
-- INSERT INTO guessNumberData (userId, points) VALUES (1, 100)