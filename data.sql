CREATE TABLE links (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
url TEXT(300) NOT NULL,
title VARCHAR(6)
);
INSERT INTO links (`url`, `title`)
    VALUES ('https://www.instagram.com/nithin_s.gowda', 'admin');