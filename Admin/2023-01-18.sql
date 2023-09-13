DROP TABLE announcement;

CREATE TABLE `announcement` (
  `actId` int(11) NOT NULL AUTO_INCREMENT,
  `actName` text NOT NULL,
  `actDate` varchar(20) NOT NULL,
  `date_added` varchar(20) NOT NULL,
  PRIMARY KEY (`actId`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

INSERT INTO announcement VALUES("2","Activity 5","2022-12-23","");
INSERT INTO announcement VALUES("3","Activity 3","2022-12-10","2022-12-11");
INSERT INTO announcement VALUES("4","Activity 2","2022-12-11","2022-12-11");
INSERT INTO announcement VALUES("5","Lorem ipsum, dolor sit amet consectetur adipisicing elit. Rem, ipsum delectus voluptatum? Molestias aut inventore eaque, maxime numquam dignissimos asperiores, voluptatibus consectetur distinctio excepturi odit architecto, saepe enim sunt, molestiae.","2022-12-11","2022-12-11");
INSERT INTO announcement VALUES("6","sample","2022-12-27","2022-12-27");
INSERT INTO announcement VALUES("8","gfdgfd","2023-01-06","2022-12-27");
INSERT INTO announcement VALUES("9","test123","2023-01-17","2023-01-17");
INSERT INTO announcement VALUES("10","tggdfg","2023-01-16","2023-01-17");
INSERT INTO announcement VALUES("11","gfdgdfetertertret","2023-01-18","2023-01-17");
INSERT INTO announcement VALUES("12","tesmplt","2023-01-11","2023-01-18");
INSERT INTO announcement VALUES("14","gfdgd","2023-01-02","2023-01-18");
INSERT INTO announcement VALUES("15","fdgfdgfd","2023-01-18","2023-01-18");



DROP TABLE attachedfiles;

CREATE TABLE `attachedfiles` (
  `attachId` int(11) NOT NULL AUTO_INCREMENT,
  `requestedby` int(11) NOT NULL,
  `file` varchar(255) NOT NULL,
  `fileType` varchar(255) NOT NULL,
  `fileSize` varchar(255) NOT NULL,
  `date_added` varchar(255) NOT NULL,
  PRIMARY KEY (`attachId`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

INSERT INTO attachedfiles VALUES("6","67","61074-brgy-bugs-new.docx","application/vnd.openxmlformats-officedocument.wordprocessingml.document","","2023-01-17");
INSERT INTO attachedfiles VALUES("7","67","36835-wp4813161-simple-minimalist-wallpapers.jpg","image/jpeg","","2023-01-17");
INSERT INTO attachedfiles VALUES("8","67","1643-4297150.jpg","image/jpeg","","2023-01-18");
INSERT INTO attachedfiles VALUES("9","67","88332-brgy-bugs-new.docx","application/vnd.openxmlformats-officedocument.wordprocessingml.document","","2023-01-18");



DROP TABLE customization;

CREATE TABLE `customization` (
  `customID` int(11) NOT NULL AUTO_INCREMENT,
  `picture` varchar(255) NOT NULL,
  `status` varchar(150) NOT NULL DEFAULT 'Inactive',
  `date_added` varchar(100) NOT NULL,
  PRIMARY KEY (`customID`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

INSERT INTO customization VALUES("10","wallpaperflare.com_wallpaper.jpg","Active","2022-11-27");
INSERT INTO customization VALUES("11","bgNew.jpg","Inactive","2022-11-27");
INSERT INTO customization VALUES("18","18.jpg","Inactive","2022-11-27");
INSERT INTO customization VALUES("19","2.jpg","Inactive","2022-12-27");



DROP TABLE users;

CREATE TABLE `users` (
  `user_Id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `suffix` varchar(255) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `age` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `birthplace` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `civilstatus` varchar(50) NOT NULL,
  `occupation` varchar(50) NOT NULL,
  `religion` varchar(100) NOT NULL,
  `house_no` varchar(255) NOT NULL,
  `street_name` varchar(255) NOT NULL,
  `purok` varchar(255) NOT NULL,
  `zone` varchar(255) NOT NULL,
  `barangay` varchar(255) NOT NULL,
  `municipality` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL,
  `region` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_type` varchar(50) NOT NULL DEFAULT 'User',
  `user_status` int(11) NOT NULL DEFAULT '0' COMMENT '0=Pending, 1=Verified',
  `verification_code` int(11) NOT NULL,
  `date_registered` date NOT NULL,
  PRIMARY KEY (`user_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=utf8mb4;

INSERT INTO users VALUES("66","Erwin","Cabag","Son","","1997-09-22","25 years old","admin@gmail.com","9359428963","Poblacion, Medellin, Cebu","Male","Married","Web developer","Bible Baptist Church","1234","Sitio Upper Landing","Purok San Isidro","Ambot","Daanlungsod","Medellin","","VII","3.jpg","0192023a7bbd73250516f069df18b500","Admin","1","374025","2022-11-25");
INSERT INTO users VALUES("67","SAMPLEfdgdfgdgdgfdgdf","d","d","g","2016-03-09","6 years old","sonerwin12@gmail.com","9123456789","dsa","Male","Married","fdsf","Bible Baptist Church","fdsfgdf","dsf","fdsf","fdsf","dsfsd","fdsf","","fds","12.jpg","7488e331b8b64e5794da3fa4eb10ad5d","","1","824301","2022-11-25");
INSERT INTO users VALUES("72","Samplefh updated","gfdgfd","gdfgd","g","2022-12-21","5 days old","Norlyngelig16@gmail.com","9359428963","gfdgfdg","Male","Married","gfdgfdgd","Buddhist","gfdg","fdg","gdfgdg","gfdg","dfgd","fdgdg","fdg","dfg","12.jpg","66952c6203ae23242590c0061675234d","User","1","0","2022-12-27");
INSERT INTO users VALUES("73","Norlyn","Son","Gelig","","2022-12-15","1 week old","Norlynfdsfdgelig16@gmail.com","9359428963","ewf","Male","Married","f","Methodist","gfd","gdfgd","gdfgdg","fdgd","gdf","gdgfdgdfgdfgd","Cebu","hgfhgfhfgghf","4.jpg","a03fd6e43c16b44429d829dffa31321a","User","1","0","2022-12-27");
INSERT INTO users VALUES("74","gfdgfdgdg","dfgd","gdgdfg","dfgdf","2022-12-15","1 week old","gfdgdg232df@gmail.com","9359428963","gfdg","Male","Single","gfdgdfg","Evangelical Christianity","gfdgg","fdgfdgd","gdf","gfdgfd","gdf","gfdgd","gdfgd","gdf","14.jpg","225f667d9243201a6b2b35e008ebe3d3","User","1","0","2022-12-27");
INSERT INTO users VALUES("75","Norlyn","Son","Gelig","","2022-12-15","1 week old","Norlgelig16@gmail.com","9359428963","gfdgfd","Male","Separated","gfdgd","Evangelical Christianity","gfdg","dfgdg","df","gfdg","fdgd","gfdgdfg","Cebu","gfd","17.jpg","74129ee1fc4edfc41937efbbd6231c42","User","0","0","2022-12-27");
INSERT INTO users VALUES("76","Sample name","Sample name","Sample name","","2020-01-30","2 years old","admiSampleamen@gmail.com","9132456789","Sample name","Male","Single","Sample name","Hindu","Sample name","Sample name","Sample name","Sample name","Sample name","Sample name","Sample name","Sample name","2.jpg","1f8d3468cfa5b64492933c90a3a673c4","User","1","0","2023-01-18");



