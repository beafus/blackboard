# blackboard

## Description
This application uses a basic application framework layout and utilize databases to provide a customizable application.
The app is configurable to use a specific database on a user supplied hostname, with user and password.
## Installation

* First of all you need to run installation.php There you will select your host, username, password and database name. 
That information will be stored in a file in order to be able to access to it later. 
The name of the folder is “installations”. Each data will be stored in a different .txt file.
* Given all that information a database will be created.
In order to access to the database information in configuration.php we get the info from the installations folder and we create some constants that we will use in our program. 
The tables on the database are: 
1. Users
2. Subjects
3. Enrollments

## Users
The users can be students or professors.
The difference between them is that the teachers, just after logging in, will be available to change the page title and subtitle.

* Change title and subtitle (only professors)
 * If you click on Edit title the page will redirect you to another one where the administrator (the teacher) will be able to change them using a form.
 * Those strings will also be stored in a file, each one in a .txt file inside the titles folder.

* Each user has to log in with its own username and password. I will provide you the passwords of my program so you can test it:
 * Students:
    * **Username:** bfusterg  **Password:** beafus
    * **Username:** jrtundidor  **Password:** jaime
    * **Username:** andreagm  **Password:** andrea
 * Professors:
    * **Username:** jlamber4  **Password:** jason
    * **Username:** phuang9  **Password:** peisong
    * **Username:** carlson  **Password:** carl
    * **Username:** mschray  **Password:** martin
    
All these passwords, in order to provide security to the page, are salted and hashed.

* The user has two external views:
  * A list view of all users names and emails
  * A link to an enrolment view that shows all courses that the user has enrolled in by description and course number


##Subjects

* Those links will give you a link to the list of subjects.
* If you click on any subject title, it will give you access to another page with the specific information of that particular subject.
* If you have logged in, the user will also be able to enroll to that subject.
