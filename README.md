# University Refectory Automation

This project is a cafeteria automation written for Namık Kemal University.

![Image of Namık Kemal Üniversitesi](https://upload.wikimedia.org/wikipedia/tr/3/3d/Tekirda%C4%9F_Nam%C4%B1k_Kemal_%C3%9Cniversitesi_Logosu.png)

## İnstall Guide

Xampp Server Kurulumu => [https://www.apachefriends.org/tr/index.html]

Proje Dosyalarını C:\xampp\htdocs içine atıyoruz.

Backup klasörü içindeki sql dosyasını phpMyAdmin veya siz hangi veritabanı tasarım aracı kullanıyorsanız oranın içine aktarım yapıyoruz.

daha sonra klasörler içinde bazı veritabanı ayarları ve genel ayarlar yapılması gerekiyor.

C:\xampp\htdocs\university_refectory\config gidip database.php dosyasında

- define ("DB_HOST","localhost");
- define ("DB_NAME","university_refectory");
- define ("DB_USER","root"); // database kullanıcı adı
- define ("DB_PASS",""); // database şifre

bilgileri güncelliyoruz.

2. olarak aynı yol üzerinden genel.php dosyasında

- define ("URL","http://localhost/university_refectory");
- define ("DBNAME","university_refectory");
- define ("DOCUMENT",$_SERVER['DOCUMENT_ROOT']);
- define ("RESİMYOL",DOCUMENT."/university_refectory/views/assets/img/");
- define ("SLİDERRESİMYOL",DOCUMENT."/university_refectory/views/assets/img/slider/");
- define ("CACHEPATH",DOCUMENT."/university_refectory/cache/");
- define ("BACKUPPATH",DOCUMENT."/university_refectory/backup/");

bilgileri güncelliyoruz.

tarayıcımızdan localhost/[klasör_ismi] örneğin => http://localhost/university_refectory yazıldığında web sitemiz çalışır hale gelir.

## Web Api Ayarları Sanal Pos İşlemlerinde Hata Alınmaması İçin

C:\xampp\htdocs\university_refectory\config config.php dosyasında

- $options->setApiKey('your-key'); // Api Key
- $options->setSecretKey('your-secret'); // Api Secret Key

ayarlarını değiştiriniz.

https://sandbox-merchant.iyzipay.com/auth adresinden hesap oluşturarak api şifresi alabilirsiniz



`Otomasyon Sisteminin Anlatıldıgı Youtube Video Oynatma Listesi` => [https://www.youtube.com/watch?v=Kg1ukcsZAM0&list=PLS_keznAqvux7840YlIJllT0F9pWa8ZBJ]


## Docker

NKU yemekhane projesi için Docker:

https://hub.docker.com/r/hakan22/university_refectory

#### Docker Kurulumu

İşletim sistemine uygun docker aşağıdaki adresten kurulabilir:

https://www.docker.com/get-started

#### Create Dockerfile

Dockerfile : Kullanacağımız docker containerlar için projeye uygun uzantıları(extensions) tanımlamamızı ve kurmamızı sağlar.
Örnek: Projedeki Dockerfile dosyası 

https://github.com/hakan2259/university_refectory/blob/master/Dockerfile

#### Create Docker-Compose

Docker projemiz içerisinde farklı containerların birlikte çalışmasını sağlayan bir yapıdır. Ana projemiz içerisine Docker-compose.yml dosyası oluşturulur ve gerekli tanımlamalar yapılır. Örnek: Projedeki docker-compose.yml dosyası

https://github.com/hakan2259/university_refectory/blob/master/docker-compose.yml

#### Docker proje içindeki ayarların yapılması.

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

#### Containerlar oluşsun ve Proje docker üzerinden ayağı kalksın.

Terminale docker-compose up (console bağlanmış bir şekilde çalışır) docker-compose up -d (arka planda çalışır) yazarak çalıştırırsak yml dosyasına uygun olarak containerlarımız oluşur ve arka planda çalışacak şekilde ayağım kalkar.







