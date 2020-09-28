# University Refectory Automation

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






