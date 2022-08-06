# TopGymManagementSystem



Related Database Table

CREATE TABLE teacher (
    num int PRIMARY KEY AUTO_INCREMENT,
    FirstName varchar(7),
    LastName varchar(7),
    Password varchar(255),
    CoPassword varchar(255)
);

CREATE TABLE student (
    stdNum int PRIMARY KEY AUTO_INCREMENT,
    FirstName varchar(7),
    LastName varchar(7),
    FatherName varchar(15),
    userID varchar(255),
    relatedTeacher int,
    Email varchar(30),
    FOREIGN KEY (relatedTeacher) REFERENCES teacher(num)
);


CREATE TABLE vid (
    vidNum int PRIMARY KEY AUTO_INCREMENT,
    title varchar(10),
    FileName varchar(50),
    uploadedVid LONGBLOB,
    relatedTeacher int,
    FOREIGN KEY (relatedTeacher) REFERENCES teacher(num)
);

CREATE TABLE todo (
    tdNum int PRIMARY KEY AUTO_INCREMENT,
    title varchar(20),
    des varchar(255),
    relatedStudent int,
    FOREIGN KEY (relatedStudent) REFERENCES student(StdNum)
);

CREATE TABLE foreignStd (
    frStd int PRIMARY KEY AUTO_INCREMENT,
    FirstName varchar(10),
    LastName varchar(10),
    Password varchar(255),
    CoPassword varchar(255)
)

CREATE TABLE todofr (
    tdNum int PRIMARY KEY AUTO_INCREMENT,
    title varchar(30),
    des varchar(255),
    relatedStudent int,
    FOREIGN KEY (relatedStudent) REFERENCES foreignstd(frStd)
)
