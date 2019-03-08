USE rotr0001;
DROP TABLE Post;
DROP TABLE Topic;
DROP TABLE User;

USE rotr0001;

CREATE TABLE User
(
ID INT NOT NULL AUTO_INCREMENT,
Username NVARCHAR(30) NOT NULL UNIQUE,
UserPassword NVARCHAR (22) NOT NULL ,
PRIMARY KEY (ID)
);

CREATE TABLE Topic
(
ID INT NOT NULL AUTO_INCREMENT,
ArticleName NVARCHAR(60) NOT NULL,
PostDate DATETIME NOT NULL,
Content NVARCHAR(10000) NOT NULL,
UserID INT NOT NULL,
PRIMARY KEY (ID),
FOREIGN KEY (UserID) REFERENCES User(ID)
ON DELETE CASCADE
ON UPDATE CASCADE
);

CREATE TABLE Post
(
ID INT NOT NULL AUTO_INCREMENT,
Content NVARCHAR(10000) NOT NULL,
PostDate DATETIME NOT NULL,
UserID INT NOT NULL,
TopicID INT NOT NULL,
PRIMARY KEY (ID),
FOREIGN KEY (UserID) REFERENCES User(ID),
FOREIGN KEY (TopicID) REFERENCES Topic(ID)
ON DELETE CASCADE
ON UPDATE CASCADE
);

INSERT INTO User(Username, UserPassword) VALUES ('t', 't');
INSERT INTO User(Username, UserPassword) VALUES ('q', 'q');

INSERT INTO Topic(ArticleName, Content, UserID, PostDate) VALUES('Test Topic', 'weeb topic by t', 1, NOW());
INSERT INTO Topic(ArticleName, Content, UserID, PostDate) VALUES('q topic', 'keeb topic by Q', 2, NOW());
INSERT INTO Topic(ArticleName, Content, UserID, PostDate) VALUES('q topic', 'keeb topic by Q', 2, NOW());

INSERT INTO Post(Content, UserID, TopicID, PostDate) VALUES('post post post by t', 1, 2, NOW());
INSERT INTO Post(Content, UserID, TopicID, PostDate) VALUES('post post post by t', 1, 2, NOW());
INSERT INTO Post(Content, UserID, TopicID, PostDate) VALUES('post post post by q', 2, 1, NOW());
INSERT INTO Post(Content, UserID, TopicID, PostDate) VALUES('post post post by q', 2, 1, NOW());

DELETE FROM Topic WHERE ID = 1;

USE rotr0001;
 SELECT * FROM User;
  SELECT * FROM Topic;
   SELECT * FROM Post;
  /* 
   USE rotr0001;
   DROP TABLE usr;
   
   CREATE TABLE IF NOT EXISTS usr (
  `id` int(11) NOT NULL,
  `name` varchar(20) COLLATE utf8_swedish_ci NOT NULL,
  `pass` varchar(50) COLLATE utf8_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

INSERT INTO usr (id, `name`, pass) VALUES
(1, 'admin', 'hemligt'),
(2, 'berit', 'superpass'),
(3, 'kalle', 'admin'),
(4, 'anna', 'password');

ALTER TABLE usr ADD PRIMARY KEY (`id`);
ALTER TABLE usr MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

USE rotr0001;
SELECT * FROM usr;
*/
