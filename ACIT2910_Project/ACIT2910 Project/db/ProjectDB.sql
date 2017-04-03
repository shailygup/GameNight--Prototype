DROP TABLE user;

CREATE TABLE user(
  ID int NOT NULL AUTO_INCREMENT,
  customerName  VARCHAR(50) NOT NULL,
  email  VARCHAR(50) 	NOT NULL,
  username VARCHAR(50) NOT NULL,
  password  VARCHAR(50) NOT NULL,
  gender  VARCHAR(50) NOT NULL,
  private VARCHAR(10) ,
  pic VARCHAR(100) NOT NULL, 
  coverPic VARCHAR(100) NOT NULL,
  PRIMARY KEY (ID)
); 


INSERT INTO user (customerName, email, username,password, gender, private, pic, coverPic)
VALUES ('Shaily Gupta', 'sgupta@my.bcit.ca', 'Shaily', MD5('user'), 'female', 'No', 'Style/Images/profile.png', 'Style/Images/game.jpg');
INSERT INTO user (customerName, email, username,password, gender, private, pic, coverPic)
VALUES ('Andrew Schaub', 'aschaub@my.bcit.ca', 'Andrew', MD5('user'), 'watermelon', 'No', 'Style/Images/profile.png', 'Style/Images/game.jpg');
INSERT INTO user (customerName, email, username,password, gender, private, pic, coverPic)
VALUES ('Kelvin Trieu', 'TTrieu@my.bcit.ca', 'Kelvin', MD5('user'), 'male', 'No', 'Style/Images/profile.png', 'Style/Images/game.jpg');
INSERT INTO user (customerName, email, username,password, gender, private, pic, coverPic)
VALUES ('Daisy Johnson', 'quake@sheild.marv','Quake', MD5('user'), 'female', 'No', 'Style/Images/profile.png', 'Style/Images/game.jpg'); 
INSERT INTO user (customerName, email, username,password, gender, private, pic, coverPic)
VALUES ('Grant Ward', 'takenover@hydra.marv','HailHydra', MD5('user'), 'male', 'No', 'Style/Images/profile.png', 'Style/Images/game.jpg'); 
INSERT INTO user (customerName, email, username,password, gender, private, pic, coverPic)
VALUES ('Melinda May', 'thecaverly@sheild.marv','theCaverly', MD5('user'), '----', 'No', 'Style/Images/profile.png', 'Style/Images/game.jpg');

CREATE TABLE events(
  ID int NOT NULL AUTO_INCREMENT,
  eventName  VARCHAR(50) NOT NULL,
  location  VARCHAR(50)   NOT NULL,
  eventStartDate VARCHAR(50) NOT NULL,
  eventEndDate VARCHAR(50) NOT NULL,
  eventStartTime  VARCHAR(50) NOT NULL,
  eventEndTime VARCHAR(50) NOT NULL,
  member  VARCHAR(50) NOT NULL,
  PRIMARY KEY (ID)
); 


INSERT INTO events (eventName, location,eventStartDate, eventEndDate, eventStartTime, eventEndTime, member)
VALUES ('Party Time', 'Andys PLace', '2016-05-14','2016-05-15','17:00', '00:30', '3');
INSERT INTO events (eventName, location,eventStartDate, eventEndDate, eventStartTime, eventEndTime, member)
VALUES ('Steves Awesome Party', 'Steves PLace', '2016-05-22','2016-05-22','18:00', '23:30', '3');
INSERT INTO events (eventName, location,eventStartDate, eventEndDate, eventStartTime, eventEndTime, member)
VALUES ('AEG Release Party', 'Craving for a game', '2016-05-31','2016-05-31','10:30', '21:00', '3'); 

CREATE TABLE friends(
  ID int NOT NULL AUTO_INCREMENT,
  name  VARCHAR(50) NOT NULL,
  pic  VARCHAR(50)  NOT NULL,
  PRIMARY KEY (ID)
); 

INSERT INTO friends (pic, name) VALUES ('Style/Images/minion-small.jpg', 'Dave');
INSERT INTO friends (pic, name) VALUES ('Style/Images/minion-small.jpg', 'Dave'); 
INSERT INTO friends (pic, name) VALUES ('Style/Images/minion-small.jpg' ,'Dave');
INSERT INTO friends (pic, name) VALUES ('Style/Images/minion-small.jpg', 'Dave');
INSERT INTO friends (pic, name) VALUES ('Style/Images/minion-small.jpg','Dave');
INSERT INTO friends (pic, name) VALUES ('Style/Images/minion-small.jpg', 'Dave');
INSERT INTO friends (pic, name) VALUES ('Style/Images/minion-small.jpg', 'Dave');

CREATE TABLE games(
  ID int NOT NULL AUTO_INCREMENT,
  gameName VARCHAR(50) NOT NULL, 
  genre VARCHAR(50) NOT NULL,
  minNumPlayer INT NOT NULL,
  maxNumPlayer INT NOT NULL,
  pic VARCHAR(100) NOT NULL,
  PRIMARY KEY(ID)
);

INSERT INTO games (gameName, genre, minNumPlayer, MaxNumPlayer, pic)
VALUES ('Smash Up','Worker Placement', 2, 8, 'Style/Images/game.jpg');
INSERT INTO games (gameName, genre, minNumPlayer, MaxNumPlayer, pic)
VALUES ('Love Letter','Bluffing', 2, 4, 'Style/Images/game.jpg');
INSERT INTO games (gameName, genre, minNumPlayer, MaxNumPlayer, pic)
VALUES ('Sentinels Of the Multiverse','RPG', 3, 5, 'Style/Images/game.jpg');
INSERT INTO games (gameName, genre, minNumPlayer, MaxNumPlayer, pic)
VALUES ('Sentinels Tactics','Strategy', 3, 8, 'Style/Images/game.jpg');
INSERT INTO games (gameName, genre, minNumPlayer, MaxNumPlayer, pic)
VALUES ('Marvel Legendary','Deck Building', 2, 6, 'Style/Images/game.jpg');
