DROP TABLE Post;
DROP TABLE Topic;
DROP TABLE ForumUser;


CREATE TABLE ForumUser
(
ID INT NOT NULL IDENTITY(1,1) PRIMARY KEY,
Username NVARCHAR(30) NOT NULL UNIQUE,
UserPassword NVARCHAR (22) NOT NULL
);

CREATE TABLE Topic
(
ID INT NOT NULL IDENTITY(1,1) PRIMARY KEY,
ArticleName NVARCHAR(60) NOT NULL,
PostDate DATETIME NOT NULL,
Content NVARCHAR(MAX) NOT NULL,
UserID INT NOT NULL,
FOREIGN KEY (UserID) REFERENCES dbo.ForumUser(ID)
ON DELETE CASCADE
ON UPDATE CASCADE
);

CREATE TABLE Post
(
ID INT NOT NULL IDENTITY(1,1) PRIMARY KEY,
Content NVARCHAR(MAX) NOT NULL,
PostDate DATETIME NOT NULL,
UserID INT NOT NULL,
TopicID INT NOT NULL,
FOREIGN KEY (UserID) REFERENCES dbo.ForumUser(ID),
FOREIGN KEY (TopicID) REFERENCES Topic(ID)
ON DELETE CASCADE
ON UPDATE CASCADE
);

INSERT INTO ForumUser(Username, UserPassword) VALUES ('t', 't');
INSERT INTO ForumUser(Username, UserPassword) VALUES ('q', 'q');

INSERT INTO Topic(ArticleName, Content, UserID, PostDate) VALUES('Test Topic', 'weeb topic by t', 1, GETDATE());
INSERT INTO Topic(ArticleName, Content, UserID, PostDate) VALUES('q topic', 'keeb topic by Q', 2, GETDATE());
INSERT INTO Topic(ArticleName, Content, UserID, PostDate) VALUES('second q topic', 'keeb topic by Q', 2, GETDATE());

INSERT INTO Post(Content, UserID, TopicID, PostDate) VALUES('post post post by t', 1, 2, GETDATE());
INSERT INTO Post(Content, UserID, TopicID, PostDate) VALUES('post post post by t', 1, 2, GETDATE());
INSERT INTO Post(Content, UserID, TopicID, PostDate) VALUES('post post post by q', 2, 1, GETDATE());
INSERT INTO Post(Content, UserID, TopicID, PostDate) VALUES('post post post by q', 2, 1, GETDATE());


 SELECT * FROM ForumUser;
  SELECT * FROM Topic;
   SELECT * FROM Post;