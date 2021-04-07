# University Refectory Automation

This project is a cafeteria automation written for Namık Kemal University. Made as an internship project.

![Image of Namık Kemal Üniversitesi](https://user-images.githubusercontent.com/46871570/113908277-04440580-97df-11eb-98e5-5588bd1be60b.gif)

## İnstall Guide

Xampp Server Setup => [https://www.apachefriends.org/tr/index.html]

We drop the project files into C:\xampp\htdocs.

We import the sql file in the backup folder into phpMyAdmin or whichever database design tool you use.

Then some database settings and general settings need to be made within the folders.

Go to C:\xampp\htdocs\university_refectory\config and in database.php file

- define ("DB_HOST","localhost");
- define ("DB_NAME","university_refectory");
- define ("DB_USER","root"); // database username
- define ("DB_PASS",""); // database password

we update the information.

2. in the general.php file via the same path as

- define ("URL","http://localhost/university_refectory");
- define ("DBNAME","university_refectory");
- define ("DOCUMENT",$_SERVER['DOCUMENT_ROOT']);
- define ("RESİMYOL",DOCUMENT."/university_refectory/views/assets/img/");
- define ("SLİDERRESİMYOL",DOCUMENT."/university_refectory/views/assets/img/slider/");
- define ("CACHEPATH",DOCUMENT."/university_refectory/cache/");
- define ("BACKUPPATH",DOCUMENT."/university_refectory/backup/");

we update the information.

By typing localhost / [folder name] for example => http://localhost/university_refectory from our browser, our website will be operational.

## Web Api Settings To Avoid Errors In Virtual Pos Operations

Go to C:\xampp\htdocs\university_refectory\config and in config.php file

- $options->setApiKey('your-key'); // Api Key
- $options->setSecretKey('your-secret'); // Api Secret Key

change the settings.

You can get api password by creating an account at https://sandbox-merchant.iyzipay.com/auth


`Youtube Video Playlist Explaining the Automation System` => [https://www.youtube.com/watch?v=Kg1ukcsZAM0&list=PLS_keznAqvux7840YlIJllT0F9pWa8ZBJ]


## Docker

Docker for NKU refectory project:

https://hub.docker.com/r/hakan22/university_refectory

#### Docker İnstall

Docker suitable for the operating system can be installed from the following address:

https://www.docker.com/get-started

#### Create Dockerfile

Dockerfile : It allows us to define and install extensions suitable for the project for the docker containers we will use.
Örnek: Dockerfile file in the project

https://github.com/hakan2259/university_refectory/blob/master/Dockerfile

#### Create Docker-Compose

It is a structure that allows different containers to work together in our Docker project. Docker-compose.yml file is created in our main project and necessary definitions are made. Example: docker-compose.yml file in the project

https://github.com/hakan2259/university_refectory/blob/master/docker-compose.yml

#### Making settings in the Docker project.

config/database.php =>

- define ("DB_HOST","db");
- define ("DB_NAME","university_refectory");
- define ("DB_USER","admin");
- define ("DB_PASS","admin");

config/genel.php =>

- define ("URL","http://localhost");
- define ("DBNAME","university_refectory");
- define ("DOCUMENT",$_SERVER['DOCUMENT_ROOT']);
- define ("RESİMYOL",DOCUMENT."/views/assets/img/");
- define ("SLİDERRESİMYOL",DOCUMENT."/views/assets/img/slider/");
- define ("CACHEPATH",DOCUMENT."/cache/");
- define ("BACKUPPATH",DOCUMENT."/backup/");

#### Containers should be formed and the project will get up from docker.

If we run it by typing docker-compose up -d (runs in the background) to the terminal, our containers will be created in accordance with the yml file and stand up to run in the background.







