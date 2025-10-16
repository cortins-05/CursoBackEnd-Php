CREATE DATABASE IF NOT EXISTS laravel_master;
USE laravel_master;

CREATE TABLE IF NOT EXISTS users (
    id              INT(11) AUTO_INCREMENT NOT NULL,
    role            VARCHAR(20),
    name            VARCHAR(100),
    surname         VARCHAR(200),
    nick            VARCHAR(100),
    email           VARCHAR(255),
    password        VARCHAR(255),
    image           VARCHAR(255),
    created_at      DATETIME,
    updated_at      DATETIME,
    remember_token  VARCHAR(255),
    CONSTRAINT pk_users PRIMARY KEY (id)
) ENGINE=InnoDB;

Insert into users values(null, 'user', 'Victor', 'Robles', 'victorroblesweb', 'victor@victor.com', 'pass', null, curtime(), curtime(),null);

CREATE TABLE IF NOT EXISTS images (
    id              INT(11) AUTO_INCREMENT NOT NULL,
    user_id         INT(11),
    image_path      VARCHAR(255),
    description     TEXT,
    created_at      DATETIME,
    updated_at      DATETIME,
    CONSTRAINT pk_images PRIMARY KEY (id),
    CONSTRAINT fk_images_users FOREIGN KEY (user_id) REFERENCES users(id)
        ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS comments (
    id              INT(11) AUTO_INCREMENT NOT NULL,
    user_id         INT(11),
    image_id        INT(11),
    content         TEXT,
    created_at      DATETIME,
    updated_at      DATETIME,
    CONSTRAINT pk_comments PRIMARY KEY (id),
    CONSTRAINT fk_comments_users FOREIGN KEY (user_id) REFERENCES users(id)
        ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT fk_comments_images FOREIGN KEY (image_id) REFERENCES images(id)
        ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS likes (
    id              INT(11) AUTO_INCREMENT NOT NULL,
    user_id         INT(11),
    image_id        INT(11),
    created_at      DATETIME,
    updated_at      DATETIME,
    CONSTRAINT pk_likes PRIMARY KEY (id),
    CONSTRAINT fk_likes_users FOREIGN KEY (user_id) REFERENCES users(id)
        ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT fk_likes_images FOREIGN KEY (image_id) REFERENCES images(id)
        ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB;
