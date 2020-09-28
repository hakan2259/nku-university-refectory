SET NAMES utf8;DROP TABLE IF EXISTS administrator;

CREATE TABLE `administrator` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `appointment_management` int(11) NOT NULL,
  `user_management` int(11) NOT NULL DEFAULT 0,
  `menu_management` int(11) NOT NULL DEFAULT 0,
  `refectory_info_management` int(11) NOT NULL DEFAULT 0,
  `design_management` int(11) NOT NULL DEFAULT 0,
  `admin_user_management` int(11) NOT NULL DEFAULT 0,
  `system_management` int(11) NOT NULL DEFAULT 0,
  `system_maintenance` int(11) NOT NULL DEFAULT 0,
  `sql_backup_management` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

INSERT INTO administrator VALUES('1','Hakan','Sandal','hakan22','q5ijvc1oU5CRScAmNgZuacZfAA==','1','1','1','1','1','1','1','1','1');
INSERT INTO administrator VALUES('7','Betül','Yeşildağ','betul22','q5ijvc1oU5CRScAmNgZuacZfAA==','0','0','0','0','0','1','1','0','0');
INSERT INTO administrator VALUES('10','Hasan','Sandal','hasan22','q5ijvc1oU5CRScAmNgZuacZfAA==','0','1','1','0','0','0','0','1','0');
INSERT INTO administrator VALUES('11','Ali','Bacak','ali22','q5ijvc1oU5CRScAmNgZuacZfAA==','0','1','1','1','1','1','1','1','1');



DROP TABLE IF EXISTS color_management;

CREATE TABLE `color_management` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `body_color` varchar(6) NOT NULL,
  `theme_color` varchar(6) NOT NULL,
  `login_modal_color` varchar(6) NOT NULL,
  `login_btn` varchar(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO color_management VALUES('1','FFFFFF','01AEBC','31708F','01AEBC');



DROP TABLE IF EXISTS contact;

CREATE TABLE `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `address` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `fax` varchar(50) NOT NULL,
  `facebook_url` varchar(150) NOT NULL,
  `twitter_url` varchar(150) NOT NULL,
  `ios_url` varchar(150) NOT NULL,
  `android_url` varchar(150) NOT NULL,
  `instagram_url` varchar(150) NOT NULL,
  `youtube_url` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO contact VALUES('1','Değirmenaltı, 59030 Tekirdağ Merkez/Tekirdağ','yemekhane@nku.edu.tr','+90 222 335 05 80 / 1575','+90 222 335 80 81','https://www.facebook.com/','https://twitter.com/','https://www.apple.com/tr/','https://www.apple.com/tr/','https://www.instagram.com/?hl=en','https://www.youtube.com/');



DROP TABLE IF EXISTS menu;

CREATE TABLE `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `soups` varchar(50) DEFAULT NULL,
  `soups_calorie` varchar(10) NOT NULL,
  `main_meals` varchar(50) DEFAULT NULL,
  `main_meals_calorie` varchar(10) NOT NULL,
  `after_main_meals` varchar(50) DEFAULT NULL,
  `after_main_meals_calorie` varchar(10) NOT NULL,
  `desserts` varchar(50) DEFAULT NULL,
  `desserts_calorie` varchar(10) NOT NULL,
  `menu_date` varchar(10) NOT NULL,
  `menu_price` decimal(10,0) NOT NULL DEFAULT 5,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` varchar(10) DEFAULT NULL,
  `updated_at` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

INSERT INTO menu VALUES('1','Mantar Çorba1','391','Çoban Kavurma1','6011','Makarna1','1311','Ayran1','1141','03-08-2020','51','1','17-08-2020','17-08-2020');
INSERT INTO menu VALUES('2','Sebze Çorba','124','Etli Nohut','285','Sade Pilav','118','Yoğurt','59','04-08-2020','5','1','18-08-2020','18-08-2020');
INSERT INTO menu VALUES('3','Domates Çorba','30','Mantarlı Et Sote','256','Erişte','137','Cacık','128','05-08-2020','5','0','19-08-2020','19-08-2020');
INSERT INTO menu VALUES('4','Tavuksuyu Çorba','117','Yeşil Mercimek','285','Bulgur Pilavı','149','Çilek Komposto','46','06-08-2020','5','1','20-08-2020','20-08-2020');
INSERT INTO menu VALUES('5','Tutmaç Çorba','195','Etli Bezelye','201','Kıymalı Makarna','196','Şeftali','39','07-08-2020','5','1','21-08-2020','21-08-2020');
INSERT INTO menu VALUES('6','Tarhana Çorba','150','Kıymalı Bezelye','275','Peynirli Erişte','304','Tahin Helvası','197','08-08-2020','5','1','22-08-2020','22-08-2020');
INSERT INTO menu VALUES('7','Domates Çorba','30','Mantarlı Et Sote','169','Erişte','135','Cacık','128','09-08-2020','5','0','19-08-2020','19-08-2020');
INSERT INTO menu VALUES('8','Tavuksuyu Çorba','117','Yeşil Mercimek','285','Bulgur Pilavı','149','Çilek Komposto','46','10-08-2020','5','1','20-08-2020','20-08-2020');
INSERT INTO menu VALUES('9','Tutmaç Çorba','195','Etli Bezelye','201','Kıymalı Makarna','196','Şeftali','39','11-08-2020','5','1','21-08-2020','21-08-2020');
INSERT INTO menu VALUES('10','Tarhana Çorba','150','Kıymalı Bezelye','275','Peynirli Erişte','304','Tahin Helvası','197','12-08-2020','5','1','22-08-2020','22-08-2020');
INSERT INTO menu VALUES('11','Mantar Çorba','39','Çoban Kavurma','601','Makarna','131','Ayran','114','13-08-2020','5','1','17-08-2020','17-08-2020');
INSERT INTO menu VALUES('12','Mantar Çorba','39','Çoban Kavurma','601','Makarna','131','Ayran','114','14-08-2020','5','1','17-08-2020','17-08-2020');
INSERT INTO menu VALUES('13','Sebze Çorba','124','Etli Nohut','285','Sade Pilav','118','Yoğurt','59','15-08-2020','5','1','18-08-2020','18-08-2020');
INSERT INTO menu VALUES('14','Domates Çorba','30','Mantarlı Et Sote','256','Erişte','135','Cacık','128','16-08-2020','5','1','19-08-2020','19-08-2020');
INSERT INTO menu VALUES('15','Tavuksuyu Çorba','117','Yeşil Mercimek','285','Bulgur Pilavı','149','Çilek Komposto','46','17-08-2020','5','1','20-08-2020','20-08-2020');
INSERT INTO menu VALUES('16','Mantar Çorba','39','Çoban Kavurma','601','Makarna','131','Ayran','114','18-08-2020','5','1','17-08-2020','17-08-2020');
INSERT INTO menu VALUES('17','Sebze Çorba','124','Etli Nohut','285','Sade Pilav','118','Yoğurt','59','19-08-2020','5','1','18-08-2020','18-08-2020');
INSERT INTO menu VALUES('18','Domates Çorba','30','Mantarlı Et Sote','169','Erişte','135','Cacık','128','20-08-2020','5','1','19-08-2020','19-08-2020');
INSERT INTO menu VALUES('19','Tavuksuyu Çorba','117','Yeşil Mercimek','285','Bulgur Pilavı','149','Çilek Komposto','46','21-08-2020','5','1','20-08-2020','20-08-2020');
INSERT INTO menu VALUES('20','Tutmaç Çorba','195','Etli Bezelye','201','Kıymalı Makarna','196','Şeftali','39','22-08-2020','5','1','21-08-2020','21-08-2020');
INSERT INTO menu VALUES('21','Tutmaç Çorba','195','Etli Bezelye','201','Kıymalı Makarna','196','Şeftali','39','23-08-2020','5','1','21-08-2020','21-08-2020');
INSERT INTO menu VALUES('23','Mercimek Çorba','112','Sebzeli Kebap','250','Şeh.Pirin. Pilavı','350','Ayran','50','24-08-2020','5','1','21-08-2020','21-08-2020');



DROP TABLE IF EXISTS orders;

CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_no` varchar(50) NOT NULL,
  `school_no` varchar(10) NOT NULL,
  `user_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `refectory_place_id` int(11) NOT NULL,
  `payment_type` varchar(50) NOT NULL,
  `menu_price` varchar(5) NOT NULL,
  `status` int(11) NOT NULL,
  `appointment_date` varchar(10) NOT NULL,
  `created_at` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=utf8;

INSERT INTO orders VALUES('73','174767020','2180656907','30','1','9','Sanal Pos','51','1','03-08-2020','09-08-2020');
INSERT INTO orders VALUES('74','174767020','2180656907','30','2','1','Sanal Pos','5','1','04-08-2020','09-08-2020');
INSERT INTO orders VALUES('75','364583318','1180656906','28','4','11','Sanal Pos','5','1','05-08-2020','11-08-2020');
INSERT INTO orders VALUES('76','693791804','2180656907','30','1','14','Sanal Pos','51','1','11-08-2020','12-08-2020');
INSERT INTO orders VALUES('77','693791804','2180656907','30','2','15','Sanal Pos','5','1','12-08-2020','12-08-2020');
INSERT INTO orders VALUES('79','726852259','2180656906','30','2','2','Sanal Pos','5','1','04-08-2020','18.09.2020');
INSERT INTO orders VALUES('80','289569951','2180656906','30','1','1','Sanal Pos','51','1','03-08-2020','19.09.2020');
INSERT INTO orders VALUES('81','202566102','2180656906','30','1','1','Sanal Pos','51','1','03-08-2020','19.09.2020');
INSERT INTO orders VALUES('82','202566102','2180656906','30','2','2','Sanal Pos','5','1','04-08-2020','19.09.2020');



DROP TABLE IF EXISTS refectory_info;

CREATE TABLE `refectory_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `card` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

INSERT INTO refectory_info VALUES('1','<p style="text-align: left;"><font color="#212529" face="Tahoma"><span style="font-size: 16px;">★&nbsp;</span></font><font color="#212529" face="Tahoma" style=""><span style="font-size: 16px;">İnternet tarayıcınız üzerinden </span></font><a href="https://yemekhane.nku.edu.tr" style="">https://yemekhane.nku.edu.tr</a><font color="#212529" face="Tahoma" style=""><span style="font-size: 16px;">&nbsp;adresine giriş yapınız.Hangi gün hangi öğün ve hangi yemekhanede yemek yiyeceğinizi seçerek rezervasyonunuzu kaydediniz.Kaydedilen rezervasyonunuzu satışa dönüşebilmesi için ödemesini online olarak (banka kartı veya kredi kartı ile) veya yemekhane gişeleri aracılığıyla (nakit veya banka kartı veya kredi kartı ile) yapabilirsiniz.</span></font></p>');
INSERT INTO refectory_info VALUES('2','<p><font color="#212529" face="Tahoma"><span style="font-size: 16px;">★</span></font><span style="color: rgb(33, 37, 41); font-family: Tahoma; font-size: 16px;">&nbsp;</span><span style="color: rgb(34, 34, 34); font-size: 16px;"><font face="Tahoma">Gün dönümü her gün saat 17:30 dan itibaren gerçekleşir. Örneğin, Cuma günü önümüzdeki haftanın günleri için rezervasyon yapar ve ödemesini 17:30 dan sonra gerçekleştirirseniz gün dönümü olduğundan dolayı artık içinde bulunduğunuz gün Cumartesi olarak kabul edilir ve önümüzdeki haftanın Pazartesi ve Salı günlerini toptan fiyat üzerinden satın alamazsınız. Alamadığınız bu günleri kendi gününde günlük yemek fiyatı üzerinden satın alabilirsiniz.</font></span></p>');
INSERT INTO refectory_info VALUES('3','<p></p><p><font color="#212529" face="Tahoma"><span style="font-size: 16px;">★</span></font><span style="color: rgb(33, 37, 41); font-family: Tahoma; font-size: 16px;">&nbsp;R</span><span style="color: rgb(34, 34, 34); font-size: 16px;"><font face="Tahoma">ezervasyon kuralları gereği içinde bulunduğunuz günden 2 gün sonrası için rezervasyon yapabilir ve yemek satın alabilirsiniz. Önceden satın almadığınız ve içinde bulunduğunuz gün yemek yemek isterseniz günlük yemek satın alabilirsiniz. Rezervasyon kurallarının uygulanmasındaki temel amaç planlamanın sağlıklı bir şekilde yapılabilmesi ve yemek israfının önüne geçilebilmesi içindir.</font></span></p><p></p><h4><span style="color: rgb(34, 34, 34); font-size: 16px;"><font face="Tahoma"><b>Örnek Tablo:</b></font></span></h4><p></p><table class="table table-bordered"><tbody><tr><td><p><b><font face="Tahoma">İçinde bulunduğunuz gün</font></b></p></td><td><p><font face="Tahoma" style="">Rezervesyon yapıp satın alabileceğiniz günler</font></p></td></tr><tr><td><p><b>Pazartesi</b></p></td><td><p style="text-align: left;"><font face="Tahoma">Çarşamba-Perşembe-Cuma ve ertesi haftanın tüm günleri</font></p></td></tr><tr><td><p><b>Salı</b></p></td><td><p><span style="color: rgb(33, 37, 41); font-size: 16px; text-align: center;"><font face="Verdana">Perşembe-Cuma ve ertesi haftanın tüm günleri</font></span></p></td></tr><tr><td><p><font face="Tahoma"><b>Çarşamba</b></font></p></td><td><p><font face="Tahoma"><span style="color: rgb(33, 37, 41); font-size: 16px; text-align: center;">Cuma ve ertesi haftanın tüm günleri</span></font></p></td></tr><tr><td><p><font face="Tahoma"><b>Perşembe</b></font></p></td><td><p><font face="Tahoma"><span style="color: rgb(33, 37, 41); font-size: 16px; text-align: center;">Ertesi haftanın tüm günleri</span></font></p></td></tr><tr><td><p><font face="Tahoma"><b>Cuma</b></font></p></td><td><p><font face="Tahoma"><span style="color: rgb(33, 37, 41); font-size: 16px; text-align: center;">Ertesi haftanın tüm günleri (Saat 17:30’a kadar)</span></font></p></td></tr><tr><td><p><font face="Tahoma"><b>Cumartesi</b></font></p></td><td><p><font face="Tahoma"><span style="color: rgb(33, 37, 41); font-size: 16px; text-align: center;">Ertesi haftanın Çarşamba-Perşembe-Cuma günleri</span></font></p></td></tr><tr><td><p><font face="Tahoma"><b>Pazar</b></font></p></td><td><p><font face="Tahoma"><span style="color: rgb(33, 37, 41); font-size: 16px; text-align: center;">Ertesi haftanın Çarşamba-Perşembe-Cuma günleri</span></font></p></td></tr></tbody></table>');
INSERT INTO refectory_info VALUES('4','<font color="#212529" face="Tahoma"><span style="font-size: 16px;">★&nbsp;</span></font><span style="color: rgb(34, 34, 34); font-family: Ubuntu, sans-serif; font-size: 16px;">Ödemesini yaptığınız öğünler için satın alma aşamasında seçtiğiniz yemekhane içerisinde bulunan turnikeye öğrenci kartınızı veya personel kartınızı okutarak geçiş yapabilirsiniz.</span>');
INSERT INTO refectory_info VALUES('5','<p><font color="#212529" face="Tahoma"><span style="font-size: 16px;">★</span></font><span style="color: rgb(33, 37, 41); font-family: Tahoma; font-size: 16px;">&nbsp;</span><span style="color: rgb(34, 34, 34); font-family: Ubuntu, sans-serif; font-size: 16px;">Öğrenci kartınızı veya personel kartınızı unutmanız veya teknik nedenlerden dolayı kartınızın çalışmadığı durumlarda yemekhane gişelerine giderek yemek hakkınızın tek kullanımlık barkodlu fişe aktarılmasını talep edebilirsiniz.</span><br></p>');
INSERT INTO refectory_info VALUES('6','<p><font color="#212529" face="Tahoma"><span style="font-size: 16px;">★</span></font><span style="color: rgb(33, 37, 41); font-family: Tahoma; font-size: 16px;">&nbsp;</span><span style="color: rgb(34, 34, 34); font-family: Ubuntu, sans-serif; font-size: 16px;">Yemekhanemizin hizmet verdiği öğünler ve öğünlerin saatleri ile hizmetin verildiği yemekhaneler aşağıdaki tabloda belirtilmiştir.</span></p><table class="table table-bordered"><tbody><tr><td><b>Öğün</b></td><td><b>Öğün Saati</b></td><td><b>Hizmetin verildiği yemekhane</b></td></tr><tr><td><b>Kahvaltı</b></td><td><font face="Tahoma"><span style="color: rgb(34, 34, 34);">07:45 - 09:00</span><br></font></td><td><p style="box-sizing: border-box; margin-right: 0px; margin-bottom: 10.5px; margin-left: 0px; color: rgb(34, 34, 34);"><font face="Tahoma">Anadolu Üniversitesi Yunus Emre Kampüsü Merkez Öğrenci Yemekhanesi</font></p><p style="box-sizing: border-box; margin-right: 0px; margin-bottom: 10.5px; margin-left: 0px; color: rgb(34, 34, 34);"><font face="Tahoma">ESTÜ İki Eylül Kampüsü Öğrenci Yemekhanesi</font></p></td></tr><tr><td><font face="Tahoma"><b>Öğle Yemeği</b></font></td><td><font face="Tahoma"><span style="color: rgb(34, 34, 34);">11:30 - 14:00</span><br></font></td><td><p style="box-sizing: border-box; margin-right: 0px; margin-bottom: 10.5px; margin-left: 0px; color: rgb(34, 34, 34);"><font face="Tahoma">Anadolu Üniversitesi Yunus Emre Kampüsü Merkez Öğrenci Yemekhanesi</font></p><p style="box-sizing: border-box; margin-right: 0px; margin-bottom: 10.5px; margin-left: 0px; color: rgb(34, 34, 34);"><font face="Tahoma">Anadolu Üniversitesi Yunus Emre Kampüsü Yeni Öğrenci Yemekhanesi</font></p><p style="box-sizing: border-box; margin-right: 0px; margin-bottom: 10.5px; margin-left: 0px; color: rgb(34, 34, 34);"><font face="Tahoma">Anadolu Üniversitesi Yunus Emre Kampüsü Personel Yemekhanesi</font></p><p style="box-sizing: border-box; margin-right: 0px; margin-bottom: 10.5px; margin-left: 0px; color: rgb(34, 34, 34);"><font face="Tahoma">ESTÜ İki Eylül Kampüsü Öğrenci Yemekhanesi</font></p><p style="box-sizing: border-box; margin-right: 0px; margin-bottom: 10.5px; margin-left: 0px; color: rgb(34, 34, 34);"><font face="Tahoma">ESTÜ Porsuk Kampüsü Öğrenci Yemekhanesi</font></p><p style="box-sizing: border-box; margin-right: 0px; margin-bottom: 10.5px; margin-left: 0px; color: rgb(34, 34, 34);"><font face="Tahoma">ESTÜ İki Eylül Kampüsü Personel Yemekhanesi</font></p></td></tr><tr><td><font face="Tahoma"><b>Akşam Yemeği</b></font></td><td><p style="box-sizing: border-box; margin-right: 0px; margin-bottom: 10.5px; margin-left: 0px; color: rgb(34, 34, 34);"><font face="Tahoma">17:30 - 20:00</font></p><p style="box-sizing: border-box; margin-right: 0px; margin-bottom: 10.5px; margin-left: 0px; color: rgb(34, 34, 34);"><font face="Tahoma">17:30 - 19:00</font></p></td><td><p style="box-sizing: border-box; margin-right: 0px; margin-bottom: 10.5px; margin-left: 0px; color: rgb(34, 34, 34);"><font face="Tahoma">Anadolu Üniversitesi Yunus Emre Kampüsü Merkez Öğrenci Yemekhanesi</font></p><p style="box-sizing: border-box; margin-right: 0px; margin-bottom: 10.5px; margin-left: 0px; color: rgb(34, 34, 34);"><font face="Tahoma">Anadolu Üniversitesi Yunus Emre Kampüsü Yeni Öğrenci Yemekhanesi</font></p></td></tr></tbody></table>');
INSERT INTO refectory_info VALUES('7','<p><font color="#212529" face="Tahoma"><span style="font-size: 16px;">★</span></font><span style="color: rgb(33, 37, 41); font-family: Tahoma; font-size: 16px;">&nbsp;</span><span style="color: rgb(34, 34, 34); font-family: Ubuntu, sans-serif; font-size: 16px;">Yemekhanemizde hizmet verilen öğünler üniversitemiz bünyesinde çalışan personellerimiz tarafından hazırlanmaktadır.</span><br></p>');
INSERT INTO refectory_info VALUES('8','<p><font color="#212529" face="Tahoma"><span style="font-size: 16px;">★</span></font><span style="color: rgb(33, 37, 41); font-family: Tahoma; font-size: 16px;">&nbsp;</span><span style="color: rgb(34, 34, 34); font-family: Ubuntu, sans-serif; font-size: 16px;">Menüler önceden açıklanmaktadır (Akşam yemeği menüsü hariç) fakat malzeme temini ve teknik aksaklıklardan doğacak sorunlar nedeniyle menüde değişiklik yapılabilir.</span></p><p><font color="#212529" face="Tahoma"><span style="font-size: 16px;">★</span></font><span style="color: rgb(33, 37, 41); font-family: Tahoma; font-size: 16px;">&nbsp;</span><span style="color: rgb(34, 34, 34); font-family: Ubuntu, sans-serif; font-size: 16px;">Menü; gluten içeren tahıllar, süt ve süt ürünleri, yumurta, balık, yer fıstığı, soya fasulyesi, sert kabuklu meyveler, kereviz, hardal, susam vb. alerjen gıdalar ile hazırlanmış yiyecek ve içecek içerebilir.</span><br></p>');
INSERT INTO refectory_info VALUES('9','<p><font color="#212529" face="Tahoma"><span style="font-size: 16px;">★</span></font><span style="color: rgb(33, 37, 41); font-family: Tahoma; font-size: 16px;">&nbsp;</span><span style="color: rgb(34, 34, 34); font-family: Ubuntu, sans-serif; font-size: 16px;">Aynı gün ve aynı öğün için normal menü ve vejetaryen menü birlikte satın alınamamaktadır.</span></p><p><font color="#212529" face="Tahoma"><span style="font-size: 16px;">★</span></font><span style="color: rgb(33, 37, 41); font-family: Tahoma; font-size: 16px;">&nbsp;</span><span style="color: rgb(34, 34, 34); font-family: Ubuntu, sans-serif; font-size: 16px;">Satışı yapılan öğünler için ücret iadesi yapılamamaktadır.</span></p><p><font color="#212529" face="Tahoma"><span style="font-size: 16px;">★</span></font><span style="color: rgb(33, 37, 41); font-family: Tahoma; font-size: 16px;">&nbsp;</span><span style="color: rgb(34, 34, 34); font-family: Ubuntu, sans-serif; font-size: 16px;">Yemekhanemiz hafta sonlarında ve resmi tatillerde hizmet vermemektedir. Ara dönem tatilinde ise sadece öğle yemeği hizmeti verilmektedir.<br></span><br></p>');
INSERT INTO refectory_info VALUES('10','<p><font color="#212529" face="Tahoma"><span style="font-size: 16px;">★</span></font><span style="color: rgb(33, 37, 41); font-family: Tahoma; font-size: 16px;">&nbsp;</span><span style="color: rgb(34, 34, 34); font-family: Ubuntu, sans-serif; font-size: 16px;">Vejetaryen olan öğrencilerimiz için öğle ve akşam öğünlerinde normal menünün yanında vejetaryen menü de çıkarılmaktadır.</span></p><p><font color="#212529" face="Tahoma"><span style="font-size: 16px;">★</span></font><span style="color: rgb(33, 37, 41); font-family: Tahoma; font-size: 16px;">&nbsp;</span><span style="color: rgb(34, 34, 34); font-family: Ubuntu, sans-serif; font-size: 16px;">Çölyak hastalığı bulunan öğrencilerimiz ise yemekhane müdürlüğüne başvuruda bulunarak kendilerine özel çıkarılan menüden yararlanabilirler.<br></span><br></p>');



DROP TABLE IF EXISTS refectory_places;

CREATE TABLE `refectory_places` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `place_name` varchar(150) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

INSERT INTO refectory_places VALUES('1','TNKÜ Değirmealtı Yerleşkesi Öğrenci Sosyal Yaşam Merkezi Öğrenci Yemekhanesi','1','2020-08-24 00:36:33','2020-08-24 00:36:33');
INSERT INTO refectory_places VALUES('2','TNKÜ Değirmealtı Yerleşkesi Öğrenci Sosyal Yaşam Merkezi Akademik ve İdari Personel Yemekhanesi','1','2020-08-24 00:36:33','2020-08-23 23:38:21');
INSERT INTO refectory_places VALUES('3','TNKÜ Çorlu Mühendislik Fakültesi Öğrenci Yemekhanesi','1','2020-08-24 00:36:33','2020-08-24 00:36:33');
INSERT INTO refectory_places VALUES('4','TNKÜ Çorlu Mühendislik Fakültesi Akademik ve İdari Personel Yemekhanesi','1','2020-08-24 00:36:33','2020-08-24 00:36:33');
INSERT INTO refectory_places VALUES('5','TNKÜ Çorlu MYO Öğrenci,Akademik,İdari Personel Yemekhanesi','1','2020-08-24 00:36:33','2020-08-24 00:36:33');
INSERT INTO refectory_places VALUES('6','TNKÜ Şarköy MYO Öğrenci,Akademik,İdari Personel Yemekhanesi','1','2020-08-24 00:36:33','2020-08-24 00:36:33');
INSERT INTO refectory_places VALUES('7','TNKÜ Saray MYO Öğrenci,Akademik,İdari Personel Yemekhanesi','1','2020-08-24 00:36:33','2020-08-24 00:36:33');
INSERT INTO refectory_places VALUES('8','TNKÜ Çerkezköy MYO Öğrenci,Akademik,İdari Personel Yemekhanesi','1','2020-08-24 00:36:33','2020-08-24 00:36:33');
INSERT INTO refectory_places VALUES('9','TNKÜ Muratlı MYO Öğrenci,Akademik,İdari Personel Yemekhanesi','1','2020-08-24 00:36:33','2020-08-24 00:36:33');
INSERT INTO refectory_places VALUES('10','TNKÜ Malkara MYO Öğrenci,Akademik,İdari Personel Yemekhanesi','1','2020-08-24 00:36:33','2020-08-24 00:36:33');
INSERT INTO refectory_places VALUES('11','TNKÜ Marmaraereğlisi MYO Öğrenci,Akademik,İdari Personel Yemekhanesi','1','2020-08-24 00:36:33','2020-08-24 00:36:33');
INSERT INTO refectory_places VALUES('12','TNKÜ Hayrabolu MYO Öğrenci,Akademik,İdari Personel Yemekhanesi','1','2020-08-24 00:36:33','2020-08-24 00:36:33');
INSERT INTO refectory_places VALUES('14','Deneme Yemekhanesi','0','2020-08-24 00:33:13','2020-08-24 01:33:13');
INSERT INTO refectory_places VALUES('15','Deneme Yemekhanesi 2','0','2020-08-24 01:35:12','2020-08-24 01:35:12');



DROP TABLE IF EXISTS refectory_slider;

CREATE TABLE `refectory_slider` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image_url` varchar(225) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

INSERT INTO refectory_slider VALUES('1','1.jpg');
INSERT INTO refectory_slider VALUES('2','2.jpg');
INSERT INTO refectory_slider VALUES('3','3.jpg');
INSERT INTO refectory_slider VALUES('4','4.jpg');
INSERT INTO refectory_slider VALUES('5','5.jpg');
INSERT INTO refectory_slider VALUES('6','6.jpg');
INSERT INTO refectory_slider VALUES('7','7.jpg');
INSERT INTO refectory_slider VALUES('8','8.jpg');
INSERT INTO refectory_slider VALUES('9','9.png');
INSERT INTO refectory_slider VALUES('10','10.jpg');
INSERT INTO refectory_slider VALUES('11','11.jpg');



DROP TABLE IF EXISTS settings;

CREATE TABLE `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `front_logo` varchar(150) NOT NULL,
  `banner` varchar(150) NOT NULL,
  `video_link` varchar(150) NOT NULL,
  `footer_img` varchar(150) NOT NULL,
  `footer_logo` varchar(150) NOT NULL,
  `title` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `keywords` text NOT NULL,
  `icon` varchar(150) NOT NULL,
  `maintenance_time` varchar(20) NOT NULL,
  `sql_backup_time` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO settings VALUES('1','Namık Kemal Üniversitesi.png','nkumanset.jpg','https://www.youtube.com/embed/wPz_cpAjMXE','nku-giris.jpg','logo-footer.png','Yemekhane | Namık Kemal Üniversitesi','Namık Kemal Üniversitesi Yemekhane Otomasyonu. Üniversitemizin Personel veya Öğrencilerin Yemek Rezervasyon Yapabilecekleri Sistemdir.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      ','                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                namık kemal, üniversitesi, tekirdağ, yemekhane, refectory, namık kemal university, yemek                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               ','favicon.ico','18.09.2020 04:52:39','19.09.2020 02:04:43');



DROP TABLE IF EXISTS users;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `identity_number` varchar(50) NOT NULL,
  `school_number` varchar(10) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `username` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(250) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` text NOT NULL,
  `country` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `job_title` varchar(150) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=utf8;

INSERT INTO users VALUES('28','11111111111','2180656907','Betül','Yeşildağ','2180656907','2180656906@nku.edu.tr','q5ijvc1oU5CRScAmNgZuacZfAA==','021651651','Atatürk Mah.Çeken Cad.','Türkiye','Tekirdağ','student','1');
INSERT INTO users VALUES('30','22222222222','2180656906','Hakan','Sandal','2180656906','2180656906@gmail.com','q5ijvc1oU5CRScAmNgZuacZfAA==','542453453','Pınar Mahallesi Ateş Sokak','Türkiye','Tekirdağ','student','1');
INSERT INTO users VALUES('66','44444444444','2180656900','Bill','Akkara','2180656900','2180656906@nku.edu.tr','q5ijvc1oW5CRiUHAJjYG3gAmbQA=','0546565516','Deneme Deneme Address','Türkiye','İstanbul','Student','1');
INSERT INTO users VALUES('67','55555555555','5555555510','Rasmus','Lerdorf','5555555510','5555555510@nku.edu.tr','q5ijvc1oW5CRiUHAJjYG3gAmbQA=','10156165151','Deneme Deneme Address2','Türkiye','Tekirdağ','Personel','1');
INSERT INTO users VALUES('68','66666666666','7777777777','Guido','Rossum','66666666610','66666666610@nku.edu.tr','q5ijvc1oW5CRiUHAJjYG3gAmbQA=','1051651200','Deneme Deneme Address3','Türkiye','Tekirdağ','Teacher','1');



