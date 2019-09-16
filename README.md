
[WWW.BULUTASARIM.COM](WWW.BULUTASARIM.COM)

##### Tarih : 2019-01-28 PAZARTESİ

##### Bu içerik HAKKI BULUT SERÇEŞME tarafından https://www.bulutasarim.com için oluşturulup paylaşılmıştır.
##### Bu script sayesinde Web sitenizin admin panelinde MYSQL işlemlerini yapabilirsiniz.
> **Konu Linki: [Tıkla](https://www.bulutasarim.com/php/panelden-veritabani-yonetim-sistemi-16 "Tıkla")**

##### Kullanım; Bu proje ile gerek host gerekse local de her türlü küçük sql işlemleri kısa sürede yapabilirsiniz. Hali hazırda kayıtlı bir veritabanı kaydınız varsa bağlantı bilgilerini girerek erişimi sağlayabilir, iki dosyayı (php,js) sayafanıza ekleyerek kurulum dosyasını tamamlarsınız.

##### Amacı; Phpmyadmin mysql yöneticisinin mini versiyonudur. Asıl uygulamadan farkı bunu Web sitenizde direk kullanabiliyor olmanız. Tablo yönetimi, Tablo silme ve girdileri düzenleme işlemi yapabilir anlık güncellemeler yapabilirisiniz. Phpmyadmin ile gelen yavaşlık ve karmaşıklığı bu script ile giderebilir, kendi uygulamalarınızı geliştirebilirisiniz.

#### GENEL YETKILER;

#### 1.  Tablo Ekleme
#### 2.  Sütun Ekleme
#### 3.  Tablo Silme
#### 4.  Sütun Silme
#### 5.  Sütun Düzenleme/Güncelleme
#### 6.  Tablo Adı Düzenleme/Güncelleme
#### 7.  Tabloya Veri Ekleme
#### 8.  Tablodaki Veriyi Düzenleme/Güncelleme
#### 9.  Tablodaki Veriyi Silme
#### 10. Database Seçme

#### Veritabanı seçme işlemini database bağlantısı ile gerçekleştire-biliyorsunuz. Database bağlantısı yaptığınız an çalışır duruma gelecektir. Php Class ile yorumlandığı için $table->tables(); komutuyla bütün tabloları listeler.  Toplamda 9 fonksiyon ile bütün sistem çalışır duruma gelir.

#### Kaynak dosya sayısı ikidir, bu sayede bütün projelerinize kolay bağlantı sağlayabilirisiniz. Güvenlik sistemine session kontrolüyle sınır koyarak sadece sizin kontrolünüzde çalışma imkanı sağlanabilir.

#### Bootstrap ile uyumludur.

#### FontAwesome icon desteği vardır.

#### Jquery ile dinamik ve stabil çalışır.


# ** Çalıştırma Kodları;**
```php
  if (isset($_GET["listeletablo"])) {
  $table->tableview($_GET["listeletablo"],$table->insertdata($_GET["listeletablo"]));
}
if (isset($_GET["yeni_satir"])) {
  $table->yeni_satir($table->satir());
}
if (isset($_GET["tabloduzenle"])) {
  $table->edittable($_GET["tabloduzenle"]);
}
if (isset($_GET["ekletablo"])) {
  $table->newtable($_GET["tablo_ad"],$table->satir());
}
if (!isset($_GET["listeletablo"]) AND !isset($_GET["sutun_sayi"]) AND !isset($_GET["tabloduzenle"])) {
  $table->tables($table->addtable("index.php"));
}
```




- ##### **/ Veritabanı seçme                            -panel/nav.php
- ##### */ Kayıtlı veritabanı bağlantısı yapma         -/baglan.php
- ##### */ Javascript fonksiyonları                    -/fonksiyonlar.js
- ##### */ Sql işlemleri                               -/tabloisle.php
- ##### */ Tablo ekleme formu                          -/index.php
- ##### */ Tablo düzenleme formu                       -/index.php
- ##### */ Veri ekleme formu                           -/index.php
- ##### */ Veri düzenleme formu                        -/index.php
- ##### */ Tablo listeleme                             -/index.php
- ##### */ header, footer ve nav                       -/panel/header.php
- #####    |_                                          -/panel/nav.php
- #####    |_                                          -/panel/footer.php



