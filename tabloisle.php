<?php 

include 'baglan.php';

error_reporting(E_ALL ^ E_NOTICE);
ini_set('error_reporting', E_ALL ^ E_NOTICE); 
extract($_POST);

class table{
    
    public $Field;
    public $sutun_sayi;
    public $tablo_ad;
    
   // public $db = Null;
    public function get($get) {
    global $db;

        if(!empty($get)){
         
           if (isset($get["yeni_satir"])) {
       $tablo_ad = $_GET["tablo"];
       $this->sutun_sayi = $_GET["sutun_sayi"];
       $sql = "SHOW FULL COLUMNS FROM  ".$tablo_ad ;
       $vrtb=$db->prepare($sql);
       $vrtb->execute();
       $sutun_sayi = $vrtb->rowCount();
       $this->Field  =  $vrtb->fetchAll(PDO::FETCH_ASSOC);
       $sql = "ALTER TABLE ".$tablo_ad." ADD";
       $sonuc = "<label style='color:white;'>Olumlu</label>";
       $btn ="";
       $bg ="info";
       $this->tablo_ad = $tablo_ad;

    
     if ($this->sutun_sayi==0) {

      header("Location:index.php");
    }
}
 
if (isset($get["tabloduzenle"])) {
  try{
    $tablo_ad = $_GET["tablo"];
    $sql = "SHOW FULL COLUMNS FROM  ".$tablo_ad ;
    $vrtb=$db->prepare($sql);
    $vrtb->execute();
    $this->sutun_sayi = $vrtb->rowCount(); 
    $this->Field =  $vrtb->fetchAll(PDO::FETCH_ASSOC);
    $sonuc = "<label style='color:white;'>Olumlu</label>";
    $btn ="";
    $bg ="info";
    $this->tablo_ad = $tablo_ad;

  }catch (PDOException $e) {
    $sql =$sql .' hata: '.$e->getMessage();
    $sonuc = "<label style='color:red;'>Olumsuz</label>";
    $btn = '<button type="button" class="btn btn-info" onclick="javascript:history.back(3)">Geri Git</button>';
    $bg ="warning";
  }
} if (isset($get["sql_cumlesi"])) {
   if($_GET["durum"] =="ok"){
    $sonuc = "<label style='color:white;'>Olumlu</label>";
    $btn ="";
    $bg ="info";
    $sql = $_GET["sql_cumlesi"];
    
  }else{
    $sonuc = "<label style='color:red;'>Olumsuz</label>";
    $btn = '<button type="button" class="btn btn-info" onclick="javascript:history.back(3)">Geri Git</button>';
    $bg ="warning";
    $sql = $_GET["sql_cumlesi"];
  }
} 
 if (isset($get["ekletablo"])) {
  $this->tablo_ad = $_GET["tablo_ad"];
   $sonuc = "<label style='color:white;'>Olumlu</label>";
    $btn ="";
    $bg ="info";
    $sql = "CREATE ".$get["tablo_ad"];
 }
 echo '<div class="info" id="info_box">
 <div class="alert alert-'.$bg.' alert-dismissable">
 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
 <h4><i class="icon fa fa-info"></i> SQL Komutu! Sonuç: '.$sonuc.'</h4>
 '.$sql.'<br>'.$btn.' <div id="json_cevap"></div>
 </div>
 </div>';
        }




        }

 





public function newtable($value='')
{  
?>
   <form action="tabloisle.php" method="post">
  <div class="col-md-4 form-group">
              <label for="exampleInputEmail1">Tablo Adı</label>
              <input type="text" class="form-control" name="tablo_ad" id="ilk_ad" required="" value="<?php echo $this->tablo_ad;?>" placeholder="Tablo Adı"><button id="yeni_ad_kaydet" style="display: none;" type="button" class="btn btn-warning">Yeniden Adlandır</button><span id="yeni_ad_sc"></span>
</div> 
<div class="col-xs-3 form-group "><input type="hidden" class="tabloduzenle" value=""> <button type="submit" name="tabloisle" class="btn btn-info "><i class="fa fa-plus"></i> Tabloyu Kaydet</button></div>

<table  class="table table-hover">

            <thead>
              <tr>
                <th style="width: 10px">Sil</th>
                <th>Sutun Adı</th>
                <th style="width: 30px">Türü</th>
                <th>Uzunluk Değeri</th>
                <th>Varsayılan</th>
                <th>Karşılaştırma</th>
                <th>Index</th>
                <th>Boş</th>
                <th>AI</th>
                
              </tr>
            </thead>
            <tbody id="satir-ekle">

            </tbody>


      
          </table> 

</form>
<?php
}


  public function yeni_satir()
  {?>
    <form action="index.php" method="post">
  <div class="col-md-4 form-group">
              <label for="exampleInputEmail1">Tablo Adı</label>
              <input type="text" class="form-control" name="tablo_ad" id="ilk_ad" required="" value="<?php echo $this->tablo_ad;?>" placeholder="Tablo Adı"><button id="yeni_ad_kaydet" style="display: none;" type="button" class="btn btn-warning">Yeniden Adlandır</button><span id="yeni_ad_sc"></span>
</div>            
            
             <div class="col-md-3 form-group">
       <label for="exampleInputEmail1">Sonrasına Ekle</label>
       <select name="sonrasi" class="form-control">
              <option >FIRST</option>
        <?php    foreach ($this->Field as $key ) {
 echo "<option>".$key["Field"]."</option>";

}?>
</select></div>
             
           <div class="col-xs-3 form-group "><input type="hidden" class="tabloduzenle" value=""><button type="submit" name="yeni_satir" class="btn btn-info "><i class="fa fa-plus"></i> Sutun Kaydet</button></div>


      



           <table  class="table table-hover">

            <thead>
              <tr>
                <th style="width: 10px">Sil</th>
                <th>Sutun Adı</th>
                <th style="width: 30px">Türü</th>
                <th>Uzunluk Değeri</th>
                <th>Varsayılan</th>
                <th>Karşılaştırma</th>
                <th>Index</th>
                <th>Boş</th>
                <th>AI</th>
                
              </tr>
            </thead>
            <tbody id="satir-ekle">

            </tbody>


      
          </table> <div class="form-group pull-right"><button type="submit" name="yeni_satir" class="btn btn-info "><i class="fa fa-plus"></i> Sutun Kaydet</button></div></form>
<?php
  }

public function satir($value='')
{?>
              <form method="get" action="">
<div class="form-row">
              <div class="col-md-1 form-group">
              <input type="number"  class="form-control sutun_sayi"  name="sutun_sayi" value="<?php if(isset($_GET["sutun_sayi"])){ echo $_GET["sutun_sayi"]; }else{echo '1';}?>"  placeholder="Sutun Sayısı">
             </div>   

                  <div class="form-group ">
                  <button type="<?php if(isset($_GET['sutun_sayi'])){echo 'button';}else{echo 'submit';} ?>" id="ekletablo" name="ekletablo" class="btn btn-warning"><i class="fa fa-users"></i>  Satır Ekle</button></div></div>
                  <input type="hidden" name="tablo" value="<?php if(isset($_GET['tablo'])){echo $_GET['tablo'];} ?>">
                  <input type="hidden" name="tablo_ad" value="<?php if(isset($_GET['tablo_ad'])){echo $_GET['tablo_ad'];} ?>">

</form>
  <?php
}


  public function edittable()
  {

    ?>
    <form action="tabloisle.php" method="post">
        <div class="col-md-4 form-group">
              <label for="exampleInputEmail1">Tablo Adı</label>
          
             
              
<input type="text" class="form-control" name="tablo_yeni_ad" id="tablo_yeni_ad" required="" value="<?php echo $this->tablo_ad; ?>" placeholder="Tablo Adı">
<input type="hidden" class="form-control" name="tablo_ad" id="ilk_ad" required="" value="<?php echo $this->tablo_ad; ?>" placeholder="Tablo Adı"><button id="yeni_ad_kaydet" style="display: none;" type="button" class="btn btn-warning">Yeniden Adlandır</button><span id="yeni_ad_sc"></span>
</div> 
  <div class="col-xs-3 form-group "><input type="hidden" class="tabloduzenle" value="1"><button type="submit" name="tabloduzenle" class="btn btn-info "><i class="fa fa-plus"></i> Tabloyu Düzenle</button></div>
  <table  class="table table-hover">


            <thead>
              <tr>
                <th style="width: 10px">Sil</th>
                <th>Sutun Adı</th>
                <th style="width: 30px">Türü</th>
                <th>Uzunluk Değeri</th>
                <th>Varsayılan</th>
                <th>Karşılaştırma</th>
                <th>Index</th>
                <th>Boş</th>
                <th>AI</th>
                
              </tr>
            </thead>
            <tbody id="satir-ekle">



           
<?php 

if (isset($this->Field)) {

$i =0;
foreach ($this->Field as $key ) {
$ad = $key['Field'];
   
$i++;
  
 
 ?>

                <tr id="satir-<?php echo $ad; ?>" >

                  <td width="10">
                    <button type="button" table="<?php echo $this->tablo_ad; ?>" ad="<?php echo $ad; ?>" class="fa fa-minus button satir-sil" style="padding: 3px; background-color: red;color: white; border-radius: 50%;"></button></td>
                  <td>
       <input type="text" name="adi[]" value="<?php if(!empty($key["Field"])){echo $key["Field"]; } ?>">
       <input type="hidden" name="adi2[]" value="<?php if(!empty($key["Field"])){echo $key["Field"]; } ?>">
     </td>
                  <td><select class="column_type" value="" name="turu[<?php echo $i-1; ?>]" id="field_0_2"><?php if(!empty($key["Type"])){echo "<option>".strtoupper(explode("(",$key["Type"])[0])."</option>"; } ?>
   <option title="4-bayt'lık bir tamsayı, işaretli aralığı -2,147,483,648'den 2,147,483,647'ye kadardır, işaretsiz aralığı 0'dan 4,294,967,295'e kadardır">INT</option>
   <option title="Değişken uzunluk (0-65,535) dizgisi, en fazla satır boyutu etkili en fazla uzunluk konusudur">VARCHAR</option>
   <option title="En fazla 65,535 (2^16 - 1) karakter uzunluğunda bir TEXT sütunu, bayt'larda değerin uzunluğunu gösteren iki-bayt'lık bir ön ek ile saklanır">TEXT</option>
   <option title="Bir tarih, desteklenen aralık 1000-01-01 ile 9999-12-31 arası">DATE</option>
   <optgroup label="Sayısal">
      <option title="1-bayt'lık bir tamsayı, işaretli aralığı -128'den 127'ye kadardır, işaretsiz aralığı 0'dan 255'e kadardır">TINYINT</option>
      <option title="2-bayt'lık bir tamsayı, işaretli aralığı -32,768'den 32,767'ye kadardır, işaretsiz aralığı 0'dan 65,535'e kadardır">SMALLINT</option>
      <option title="3-bayt'lık bir tamsayı, işaretli aralığı -8,388,608'den 8,388,607'ye kadardır, işaretsiz aralığı 0'dan 16,777,215'e kadardır">MEDIUMINT</option>
      <option title="4-bayt'lık bir tamsayı, işaretli aralığı -2,147,483,648'den 2,147,483,647'ye kadardır, işaretsiz aralığı 0'dan 4,294,967,295'e kadardır">INT</option>
      <option title="8-bayt'lık bir tamsayı, işaretli aralığı -9,223,372,036,854,775,808'den 9,223,372,036,854,775,807'ye kadardır, işaretsiz aralığı 0'dan 18,446,744,073,709,551,615'e kadardır">BIGINT</option>
      <option disabled="disabled">-</option>
      <option title="Sabit noktalı bir sayı (M, D) - rakamların (M) en fazla sayısı 65'tir, ondalıkların (D) en fazla sayısı 30'dur. (varsayılan 0)">DECIMAL</option>
      <option title="Küçük kayan noktalı bir sayı, izin verilebilir değerler -3.402823466E+38'den -1.175494351E-38'e, 0 ve 1.175494351E-38'den 3.402823466E+38'e kadardır">FLOAT</option>
      <option title="Çift duyarlıklı kayan noktalı bir sayı, izin verilebilir değerler -1.7976931348623157E+308'den -2.2250738585072014E-308'e, 0 ve 2.2250738585072014E-308'den 1.7976931348623157E+308'e kadardır">DOUBLE</option>
      <option title="DOUBLE için eş anlamlı (istisna: REAL_AS_FLOAT SQL kipte FLOAT için eş anlamlıdır)">REAL</option>
      <option disabled="disabled">-</option>
      <option title="Bir bit alanı türü (M), değer (varsayılan 1'dir, en fazla 64'tür) başına bit'lerin M'sini saklar">BIT</option>
      <option title="TINYINT(1) için bir eş anlam, sıfır değeri false sayılır, sıfır olmayan değerler true sayılır">BOOLEAN</option>
      <option title="BIGINT UNSIGNED NOT NULL AUTO_INCREMENT UNIQUE için bir kod adı">SERIAL</option>
   </optgroup>
   <optgroup label="Tarih ve saat">
      <option title="Bir tarih, desteklenen aralık 1000-01-01 ile 9999-12-31 arası">DATE</option>
      <option title="Bir tarih ve saat birleşimi, desteklenen aralık 1000-01-01 00:00:00 ile 9999-12-31 23:59:59 arası">DATETIME</option>
      <option title="Bir zaman damgası, aralığı " 1970-01-01="" 00:00:01"="" utc="" ile="" "2038-01-09="" 03:14:07"="" arası,="" devirden="" ("1970-01-01="" 00:00:00"="" utc)="" bu="" yana="" saniye="" sayısı="" olarak="" saklanır"="">TIMESTAMP</option>
      <option title="Bir saat, aralığı -838:59:59 ile 838:59:59 arası">TIME</option>
      <option title="Dört rakamlı (4, varsayılan) bir yıl veya iki rakamlı (2) biçimde, izin verilebilir değerler 70 (1970) ile 69 (2069) arası ya da 1901 ile 2155 arası ve 0000">YEAR</option>
   </optgroup>
   <optgroup label="Dizgi">
      <option title="Saklandığında belirlenmiş uzunluğa sağdan takviyeli boşluklu sabit uzunluk (0-255, varsayılan 1) dizgisi">CHAR</option>
      <option title="Değişken uzunluk (0-65,535) dizgisi, en fazla satır boyutu etkili en fazla uzunluk konusudur">VARCHAR</option>
      <option disabled="disabled">-</option>
      <option title="En fazla 255 (2^8 - 1) karakter uzunluğunda bir TEXT sütunu, bayt'larda değerin uzunluğunu gösteren bir-bayt'lık bir ön ek ile saklanır">TINYTEXT</option>
      <option title="En fazla 65,535 (2^16 - 1) karakter uzunluğunda bir TEXT sütunu, bayt'larda değerin uzunluğunu gösteren iki-bayt'lık bir ön ek ile saklanır">TEXT</option>
      <option title="En fazla 16,777,215 (2^24 - 1) karakter uzunluğunda bir TEXT sütunu, bayt'larda değerin uzunluğunu gösteren üç-bayt'lık bir ön ek ile saklanır">MEDIUMTEXT</option>
      <option title="En fazla 4,294,967,295 veya 4GiB (2^32 - 1) karakter uzunluğunda bir TEXT sütunu, bayt'larda değerin uzunluğunu gösteren dört-bayt'lık bir ön ek ile saklanır">LONGTEXT</option>
      <option disabled="disabled">-</option>
      <option title="CHAR türü benzeridir ama ikili değer olmayan karakter dizgileri yerine ikili değer bayt dizgilerini saklar">BINARY</option>
      <option title="VARCHAR türü benzeridir ama ikili değer olmayan karakter dizgileri yerine ikili değer bayt dizgilerini saklar">VARBINARY</option>
      <option disabled="disabled">-</option>
      <option title="En fazla 255 (2^8 - 1) bayt uzunluğunda bir BLOB sütunu, değerin uzunluğunu gösteren bir-bayt'lık bir ön ek ile saklanır">TINYBLOB</option>
      <option title="En fazla 16,777,215 (2^24 - 1) bayt uzunluğunda bir BLOB sütunu, değerin uzunluğunu gösteren üç-bayt'lık bir ön ek ile saklanır">MEDIUMBLOB</option>
      <option title="En fazla 65,535 (2^16 - 1) bayt uzunluğunda bir BLOB sütunu, değerin uzunluğunu gösteren iki-bayt'lık bir ön ek ile saklanır">BLOB</option>
      <option title="En fazla 4,294,967,295 veya 4GiB (2^32 - 1) bayt uzunluğunda bir BLOB sütunu, değerin uzunluğunu gösteren dört-bayt'lık bir ön ek ile saklanır">LONGBLOB</option>
      <option disabled="disabled">-</option>
      <option title="Bir numaralandırma, 65,535 değerine kadar olan listeden seçilir ya da özel " hata="" değeridir"="">ENUM</option>
      <option title="64 üyeye kadar olan bir gruptan seçilen tek bir değerdir">SET</option>
   </optgroup>
   <optgroup label="Uzaysal">
      <option title="Herhangi bir türün geometrisini saklayabilen bir tür">GEOMETRY</option>
      <option title="2-boyutlu uzayda bir nokta">POINT</option>
      <option title="Noktalar arasındaki doğrusal eklentili bir eğri">LINESTRING</option>
      <option title="Poligon">POLYGON</option>
      <option title="Noktalar topluluğu">MULTIPOINT</option>
      <option title="Noktalar arasındaki doğrusal eklentili bir eğri topluluğu">MULTILINESTRING</option>
      <option title="Poligonlar topluluğu">MULTIPOLYGON</option>
      <option title="Herhangi bir türün geometri nesneleri topluluğu">GEOMETRYCOLLECTION</option>
   </optgroup>
</select></td>
     <td><input type="number" name="uzunluk[]" <?php if (!strpos($key["Type"],"(")) {
       
     }else{ echo 'required=""'; } ?> value="<?php if(!empty($key["Type"])){
      if(strtoupper($key["Type"]) == "TIMESTAMP"){echo '0';}else{
           
if( strpos($key["Type"],"(")){
  echo explode(')',explode('(',$key["Type"])[1])[0];
}
          } } ?>"></td>
                  <td>
            <select  name="varsayilan[]" id="field_0_4" class="default_type">
     <?php if(!empty($key["Default"])){if($key["Default"] == "CURRENT_TIMESTAMP"){echo '<option value="CURRENT_TIMESTAMP">CURRENT_TIMESTAMP</option>'; }else if(!empty($key["Default"]) ==NULL){echo '<option value="NULL">NULL</option>';}else{echo '<option value="USER_DEFINED">Tanımlandığı gibi:</option>';} } ?>
            <option value="NONE">Yok</option>
            <option value="USER_DEFINED">Tanımlandığı gibi:</option>
            <option value="NULL">NULL</option>
            <option value="CURRENT_TIMESTAMP">CURRENT_TIMESTAMP</option>
            </select>
            <br/>
            <input type="text" name="tanimlanan[]" value="<?php if(!empty($key["Default"])){echo $key["Default"]; } ?>" style="max-width:100px;display: <?php if(!empty($key["Default"]) and $key["Default"] !== "CURRENT_TIMESTAMP"){echo 'block'; }else{echo 'none';} ?>;"></td>
                  <td>
                    <select lang="en" dir="ltr" name="karsilastirma[]" id="field_0_5"> <?php if(!empty($key["Collation"])){echo "<option>".$key["Collation"]."</option>"; } ?>
<option value=""></option>
<optgroup label="armscii8" title="ARMSCII-8 Armenian">
<option value="armscii8_bin" title="Ermenice, İkili Değer">armscii8_bin</option>
<option value="armscii8_general_ci" title="Ermenice, büyük küçük harfe duyarsız">armscii8_general_ci</option>
</optgroup>
<optgroup label="ascii" title="US ASCII">
<option value="ascii_bin" title="Batı Avrupa (çokdilli), İkili Değer">ascii_bin</option>
<option value="ascii_general_ci" title="Batı Avrupa (çokdilli), büyük küçük harfe duyarsız">ascii_general_ci</option>
</optgroup>
<optgroup label="big5" title="Big5 Traditional Chinese">
<option value="big5_bin" title="Geleneksel Çince, İkili Değer">big5_bin</option>
<option value="big5_chinese_ci" title="Geleneksel Çince, büyük küçük harfe duyarsız">big5_chinese_ci</option>
</optgroup>
<optgroup label="binary" title="Binary pseudo charset">
<option value="binary" title="İkili Değer">binary</option>
</optgroup>
<optgroup label="cp1250" title="Windows Central European">
<option value="cp1250_bin" title="Orta Avrupa (çokdilli), İkili Değer">cp1250_bin</option>
<option value="cp1250_croatian_ci" title="Hırvatça, büyük küçük harfe duyarsız">cp1250_croatian_ci</option>
<option value="cp1250_czech_cs" title="Çekçe, büyük küçük harfe duyarlı">cp1250_czech_cs</option>
<option value="cp1250_general_ci" title="Orta Avrupa (çokdilli), büyük küçük harfe duyarsız">cp1250_general_ci</option>
<option value="cp1250_polish_ci" title="Lehçe, büyük küçük harfe duyarsız">cp1250_polish_ci</option>
</optgroup>
<optgroup label="cp1251" title="Windows Cyrillic">
<option value="cp1251_bin" title="Kiril (çokdilli), İkili Değer">cp1251_bin</option>
<option value="cp1251_bulgarian_ci" title="Bulgarca, büyük küçük harfe duyarsız">cp1251_bulgarian_ci</option>
<option value="cp1251_general_ci" title="Kiril (çokdilli), büyük küçük harfe duyarsız">cp1251_general_ci</option>
<option value="cp1251_general_cs" title="Kiril (çokdilli), büyük küçük harfe duyarlı">cp1251_general_cs</option>
<option value="cp1251_ukrainian_ci" title="Ukraynaca, büyük küçük harfe duyarsız">cp1251_ukrainian_ci</option>
</optgroup>
<optgroup label="cp1256" title="Windows Arabic">
<option value="cp1256_bin" title="Arapça, İkili Değer">cp1256_bin</option>
<option value="cp1256_general_ci" title="Arapça, büyük küçük harfe duyarsız">cp1256_general_ci</option>
</optgroup>
<optgroup label="cp1257" title="Windows Baltic">
<option value="cp1257_bin" title="Baltık (çokdilli), İkili Değer">cp1257_bin</option>
<option value="cp1257_general_ci" title="Baltık (çokdilli), büyük küçük harfe duyarsız">cp1257_general_ci</option>
<option value="cp1257_lithuanian_ci" title="Litvanyaca, büyük küçük harfe duyarsız">cp1257_lithuanian_ci</option>
</optgroup>
<optgroup label="cp850" title="DOS West European">
<option value="cp850_bin" title="Batı Avrupa (çokdilli), İkili Değer">cp850_bin</option>
<option value="cp850_general_ci" title="Batı Avrupa (çokdilli), büyük küçük harfe duyarsız">cp850_general_ci</option>
</optgroup>
<optgroup label="cp852" title="DOS Central European">
<option value="cp852_bin" title="Orta Avrupa (çokdilli), İkili Değer">cp852_bin</option>
<option value="cp852_general_ci" title="Orta Avrupa (çokdilli), büyük küçük harfe duyarsız">cp852_general_ci</option>
</optgroup>
<optgroup label="cp866" title="DOS Russian">
<option value="cp866_bin" title="Rusça, İkili Değer">cp866_bin</option>
<option value="cp866_general_ci" title="Rusça, büyük küçük harfe duyarsız">cp866_general_ci</option>
</optgroup>
<optgroup label="cp932" title="SJIS for Windows Japanese">
<option value="cp932_bin" title="Japonca, İkili Değer">cp932_bin</option>
<option value="cp932_japanese_ci" title="Japonca, büyük küçük harfe duyarsız">cp932_japanese_ci</option>
</optgroup>
<optgroup label="dec8" title="DEC West European">
<option value="dec8_bin" title="Batı Avrupa (çokdilli), İkili Değer">dec8_bin</option>
<option value="dec8_swedish_ci" title="İsveççe, büyük küçük harfe duyarsız">dec8_swedish_ci</option>
</optgroup>
<optgroup label="eucjpms" title="UJIS for Windows Japanese">
<option value="eucjpms_bin" title="Japonca, İkili Değer">eucjpms_bin</option>
<option value="eucjpms_japanese_ci" title="Japonca, büyük küçük harfe duyarsız">eucjpms_japanese_ci</option>
</optgroup>
<optgroup label="euckr" title="EUC-KR Korean">
<option value="euckr_bin" title="Korece, İkili Değer">euckr_bin</option>
<option value="euckr_korean_ci" title="Korece, büyük küçük harfe duyarsız">euckr_korean_ci</option>
</optgroup>
<optgroup label="gb2312" title="GB2312 Simplified Chinese">
<option value="gb2312_bin" title="Basitleştirilmiş Çince, İkili Değer">gb2312_bin</option>
<option value="gb2312_chinese_ci" title="Basitleştirilmiş Çince, büyük küçük harfe duyarsız">gb2312_chinese_ci</option>
</optgroup>
<optgroup label="gbk" title="GBK Simplified Chinese">
<option value="gbk_bin" title="Basitleştirilmiş Çince, İkili Değer">gbk_bin</option>
<option value="gbk_chinese_ci" title="Basitleştirilmiş Çince, büyük küçük harfe duyarsız">gbk_chinese_ci</option>
</optgroup>
<optgroup label="geostd8" title="GEOSTD8 Georgian">
<option value="geostd8_bin" title="Gürcüce, İkili Değer">geostd8_bin</option>
<option value="geostd8_general_ci" title="Gürcüce, büyük küçük harfe duyarsız">geostd8_general_ci</option>
</optgroup>
<optgroup label="greek" title="ISO 8859-7 Greek">
<option value="greek_bin" title="Yunanca, İkili Değer">greek_bin</option>
<option value="greek_general_ci" title="Yunanca, büyük küçük harfe duyarsız">greek_general_ci</option>
</optgroup>
<optgroup label="hebrew" title="ISO 8859-8 Hebrew">
<option value="hebrew_bin" title="İbranice, İkili Değer">hebrew_bin</option>
<option value="hebrew_general_ci" title="İbranice, büyük küçük harfe duyarsız">hebrew_general_ci</option>
</optgroup>
<optgroup label="hp8" title="HP West European">
<option value="hp8_bin" title="Batı Avrupa (çokdilli), İkili Değer">hp8_bin</option>
<option value="hp8_english_ci" title="İngilizce, büyük küçük harfe duyarsız">hp8_english_ci</option>
</optgroup>
<optgroup label="keybcs2" title="DOS Kamenicky Czech-Slovak">
<option value="keybcs2_bin" title="Çekçe-Slovakça, İkili Değer">keybcs2_bin</option>
<option value="keybcs2_general_ci" title="Çekçe-Slovakça, büyük küçük harfe duyarsız">keybcs2_general_ci</option>
</optgroup>
<optgroup label="koi8r" title="KOI8-R Relcom Russian">
<option value="koi8r_bin" title="Rusça, İkili Değer">koi8r_bin</option>
<option value="koi8r_general_ci" title="Rusça, büyük küçük harfe duyarsız">koi8r_general_ci</option>
</optgroup>
<optgroup label="koi8u" title="KOI8-U Ukrainian">
<option value="koi8u_bin" title="Ukraynaca, İkili Değer">koi8u_bin</option>
<option value="koi8u_general_ci" title="Ukraynaca, büyük küçük harfe duyarsız">koi8u_general_ci</option>
</optgroup>
<optgroup label="latin1" title="cp1252 West European">
<option value="latin1_bin" title="Batı Avrupa (çokdilli), İkili Değer">latin1_bin</option>
<option value="latin1_danish_ci" title="Danca, büyük küçük harfe duyarsız">latin1_danish_ci</option>
<option value="latin1_general_ci" title="Batı Avrupa (çokdilli), büyük küçük harfe duyarsız">latin1_general_ci</option>
<option value="latin1_general_cs" title="Batı Avrupa (çokdilli), büyük küçük harfe duyarlı">latin1_general_cs</option>
<option value="latin1_german1_ci" title="Almanca (sözlük), büyük küçük harfe duyarsız">latin1_german1_ci</option>
<option value="latin1_german2_ci" title="Almanca (telefon defteri), büyük küçük harfe duyarsız">latin1_german2_ci</option>
<option value="latin1_spanish_ci" title="İspanyolca, büyük küçük harfe duyarsız">latin1_spanish_ci</option>
<option value="latin1_swedish_ci" title="İsveççe, büyük küçük harfe duyarsız">latin1_swedish_ci</option>
</optgroup>
<optgroup label="latin2" title="ISO 8859-2 Central European">
<option value="latin2_bin" title="Orta Avrupa (çokdilli), İkili Değer">latin2_bin</option>
<option value="latin2_croatian_ci" title="Hırvatça, büyük küçük harfe duyarsız">latin2_croatian_ci</option>
<option value="latin2_czech_cs" title="Çekçe, büyük küçük harfe duyarlı">latin2_czech_cs</option>
<option value="latin2_general_ci" title="Orta Avrupa (çokdilli), büyük küçük harfe duyarsız">latin2_general_ci</option>
<option value="latin2_hungarian_ci" title="Macarca, büyük küçük harfe duyarsız">latin2_hungarian_ci</option>
</optgroup>
<optgroup label="latin5" title="ISO 8859-9 Turkish">
<option value="latin5_bin" title="Türkçe, İkili Değer">latin5_bin</option>
<option value="latin5_turkish_ci" title="Türkçe, büyük küçük harfe duyarsız">latin5_turkish_ci</option>
</optgroup>
<optgroup label="latin7" title="ISO 8859-13 Baltic">
<option value="latin7_bin" title="Baltık (çokdilli), İkili Değer">latin7_bin</option>
<option value="latin7_estonian_cs" title="Estçe, büyük küçük harfe duyarlı">latin7_estonian_cs</option>
<option value="latin7_general_ci" title="Baltık (çokdilli), büyük küçük harfe duyarsız">latin7_general_ci</option>
<option value="latin7_general_cs" title="Baltık (çokdilli), büyük küçük harfe duyarlı">latin7_general_cs</option>
</optgroup>
<optgroup label="macce" title="Mac Central European">
<option value="macce_bin" title="Orta Avrupa (çokdilli), İkili Değer">macce_bin</option>
<option value="macce_general_ci" title="Orta Avrupa (çokdilli), büyük küçük harfe duyarsız">macce_general_ci</option>
</optgroup>
<optgroup label="macroman" title="Mac West European">
<option value="macroman_bin" title="Batı Avrupa (çokdilli), İkili Değer">macroman_bin</option>
<option value="macroman_general_ci" title="Batı Avrupa (çokdilli), büyük küçük harfe duyarsız">macroman_general_ci</option>
</optgroup>
<optgroup label="sjis" title="Shift-JIS Japanese">
<option value="sjis_bin" title="Japonca, İkili Değer">sjis_bin</option>
<option value="sjis_japanese_ci" title="Japonca, büyük küçük harfe duyarsız">sjis_japanese_ci</option>
</optgroup>
<optgroup label="swe7" title="7bit Swedish">
<option value="swe7_bin" title="İsveççe, İkili Değer">swe7_bin</option>
<option value="swe7_swedish_ci" title="İsveççe, büyük küçük harfe duyarsız">swe7_swedish_ci</option>
</optgroup>
<optgroup label="tis620" title="TIS620 Thai">
<option value="tis620_bin" title="Tayca, İkili Değer">tis620_bin</option>
<option value="tis620_thai_ci" title="Tayca, büyük küçük harfe duyarsız">tis620_thai_ci</option>
</optgroup>
<optgroup label="ucs2" title="UCS-2 Unicode">
<option value="ucs2_bin" title="Evrensel Kod (çokdilli), İkili Değer">ucs2_bin</option>
<option value="ucs2_croatian_ci" title="Hırvatça, büyük küçük harfe duyarsız">ucs2_croatian_ci</option>
<option value="ucs2_croatian_mysql561_ci" title="Hırvatça">ucs2_croatian_mysql561_ci</option>
<option value="ucs2_czech_ci" title="Çekçe, büyük küçük harfe duyarsız">ucs2_czech_ci</option>
<option value="ucs2_danish_ci" title="Danca, büyük küçük harfe duyarsız">ucs2_danish_ci</option>
<option value="ucs2_esperanto_ci" title="Esperanto, büyük küçük harfe duyarsız">ucs2_esperanto_ci</option>
<option value="ucs2_estonian_ci" title="Estçe, büyük küçük harfe duyarsız">ucs2_estonian_ci</option>
<option value="ucs2_general_ci" title="Evrensel Kod (çokdilli), büyük küçük harfe duyarsız">ucs2_general_ci</option>
<option value="ucs2_general_mysql500_ci" title="Evrensel Kod (çokdilli)">ucs2_general_mysql500_ci</option>
<option value="ucs2_german2_ci" title="Almanca (telefon defteri), büyük küçük harfe duyarsız">ucs2_german2_ci</option>
<option value="ucs2_hungarian_ci" title="Macarca, büyük küçük harfe duyarsız">ucs2_hungarian_ci</option>
<option value="ucs2_icelandic_ci" title="İzlandaca, büyük küçük harfe duyarsız">ucs2_icelandic_ci</option>
<option value="ucs2_latvian_ci" title="Litvanyaca, büyük küçük harfe duyarsız">ucs2_latvian_ci</option>
<option value="ucs2_lithuanian_ci" title="Litvanyaca, büyük küçük harfe duyarsız">ucs2_lithuanian_ci</option>
<option value="ucs2_myanmar_ci" title="bilinmiyor, büyük küçük harfe duyarsız">ucs2_myanmar_ci</option>
<option value="ucs2_persian_ci" title="Farsça, büyük küçük harfe duyarsız">ucs2_persian_ci</option>
<option value="ucs2_polish_ci" title="Lehçe, büyük küçük harfe duyarsız">ucs2_polish_ci</option>
<option value="ucs2_roman_ci" title="Batı Avrupa, büyük küçük harfe duyarsız">ucs2_roman_ci</option>
<option value="ucs2_romanian_ci" title="Romence, büyük küçük harfe duyarsız">ucs2_romanian_ci</option>
<option value="ucs2_sinhala_ci" title="Seylanca, büyük küçük harfe duyarsız">ucs2_sinhala_ci</option>
<option value="ucs2_slovak_ci" title="Slovakça, büyük küçük harfe duyarsız">ucs2_slovak_ci</option>
<option value="ucs2_slovenian_ci" title="Slovence, büyük küçük harfe duyarsız">ucs2_slovenian_ci</option>
<option value="ucs2_spanish2_ci" title="Geleneksel İspanyolca, büyük küçük harfe duyarsız">ucs2_spanish2_ci</option>
<option value="ucs2_spanish_ci" title="İspanyolca, büyük küçük harfe duyarsız">ucs2_spanish_ci</option>
<option value="ucs2_swedish_ci" title="İsveççe, büyük küçük harfe duyarsız">ucs2_swedish_ci</option>
<option value="ucs2_thai_520_w2" title="Tayca">ucs2_thai_520_w2</option>
<option value="ucs2_turkish_ci" title="Türkçe, büyük küçük harfe duyarsız">ucs2_turkish_ci</option>
<option value="ucs2_unicode_520_ci" title="Evrensel Kod (çokdilli)">ucs2_unicode_520_ci</option>
<option value="ucs2_unicode_ci" title="Evrensel Kod (çokdilli), büyük küçük harfe duyarsız">ucs2_unicode_ci</option>
<option value="ucs2_vietnamese_ci" title="Vietnamca, büyük küçük harfe duyarsız">ucs2_vietnamese_ci</option>
</optgroup>
<optgroup label="ujis" title="EUC-JP Japanese">
<option value="ujis_bin" title="Japonca, İkili Değer">ujis_bin</option>
<option value="ujis_japanese_ci" title="Japonca, büyük küçük harfe duyarsız">ujis_japanese_ci</option>
</optgroup>
<optgroup label="utf16" title="UTF-16 Unicode">
<option value="utf16_bin" title="bilinmiyor, İkili Değer">utf16_bin</option>
<option value="utf16_croatian_ci" title="Hırvatça, büyük küçük harfe duyarsız">utf16_croatian_ci</option>
<option value="utf16_croatian_mysql561_ci" title="Hırvatça">utf16_croatian_mysql561_ci</option>
<option value="utf16_czech_ci" title="Çekçe, büyük küçük harfe duyarsız">utf16_czech_ci</option>
<option value="utf16_danish_ci" title="Danca, büyük küçük harfe duyarsız">utf16_danish_ci</option>
<option value="utf16_esperanto_ci" title="Esperanto, büyük küçük harfe duyarsız">utf16_esperanto_ci</option>
<option value="utf16_estonian_ci" title="Estçe, büyük küçük harfe duyarsız">utf16_estonian_ci</option>
<option value="utf16_general_ci" title="bilinmiyor, büyük küçük harfe duyarsız">utf16_general_ci</option>
<option value="utf16_german2_ci" title="Almanca (telefon defteri), büyük küçük harfe duyarsız">utf16_german2_ci</option>
<option value="utf16_hungarian_ci" title="Macarca, büyük küçük harfe duyarsız">utf16_hungarian_ci</option>
<option value="utf16_icelandic_ci" title="İzlandaca, büyük küçük harfe duyarsız">utf16_icelandic_ci</option>
<option value="utf16_latvian_ci" title="Litvanyaca, büyük küçük harfe duyarsız">utf16_latvian_ci</option>
<option value="utf16_lithuanian_ci" title="Litvanyaca, büyük küçük harfe duyarsız">utf16_lithuanian_ci</option>
<option value="utf16_myanmar_ci" title="bilinmiyor, büyük küçük harfe duyarsız">utf16_myanmar_ci</option>
<option value="utf16_persian_ci" title="Farsça, büyük küçük harfe duyarsız">utf16_persian_ci</option>
<option value="utf16_polish_ci" title="Lehçe, büyük küçük harfe duyarsız">utf16_polish_ci</option>
<option value="utf16_roman_ci" title="Batı Avrupa, büyük küçük harfe duyarsız">utf16_roman_ci</option>
<option value="utf16_romanian_ci" title="Romence, büyük küçük harfe duyarsız">utf16_romanian_ci</option>
<option value="utf16_sinhala_ci" title="Seylanca, büyük küçük harfe duyarsız">utf16_sinhala_ci</option>
<option value="utf16_slovak_ci" title="Slovakça, büyük küçük harfe duyarsız">utf16_slovak_ci</option>
<option value="utf16_slovenian_ci" title="Slovence, büyük küçük harfe duyarsız">utf16_slovenian_ci</option>
<option value="utf16_spanish2_ci" title="Geleneksel İspanyolca, büyük küçük harfe duyarsız">utf16_spanish2_ci</option>
<option value="utf16_spanish_ci" title="İspanyolca, büyük küçük harfe duyarsız">utf16_spanish_ci</option>
<option value="utf16_swedish_ci" title="İsveççe, büyük küçük harfe duyarsız">utf16_swedish_ci</option>
<option value="utf16_thai_520_w2" title="Tayca">utf16_thai_520_w2</option>
<option value="utf16_turkish_ci" title="Türkçe, büyük küçük harfe duyarsız">utf16_turkish_ci</option>
<option value="utf16_unicode_520_ci" title="Evrensel Kod (çokdilli)">utf16_unicode_520_ci</option>
<option value="utf16_unicode_ci" title="Evrensel Kod (çokdilli), büyük küçük harfe duyarsız">utf16_unicode_ci</option>
<option value="utf16_vietnamese_ci" title="Vietnamca, büyük küçük harfe duyarsız">utf16_vietnamese_ci</option>
</optgroup>
<optgroup label="utf16le" title="UTF-16LE Unicode">
<option value="utf16le_bin" title="bilinmiyor, İkili Değer">utf16le_bin</option>
<option value="utf16le_general_ci" title="bilinmiyor, büyük küçük harfe duyarsız">utf16le_general_ci</option>
</optgroup>
<optgroup label="utf32" title="UTF-32 Unicode">
<option value="utf32_bin" title="bilinmiyor, İkili Değer">utf32_bin</option>
<option value="utf32_croatian_ci" title="Hırvatça, büyük küçük harfe duyarsız">utf32_croatian_ci</option>
<option value="utf32_croatian_mysql561_ci" title="Hırvatça">utf32_croatian_mysql561_ci</option>
<option value="utf32_czech_ci" title="Çekçe, büyük küçük harfe duyarsız">utf32_czech_ci</option>
<option value="utf32_danish_ci" title="Danca, büyük küçük harfe duyarsız">utf32_danish_ci</option>
<option value="utf32_esperanto_ci" title="Esperanto, büyük küçük harfe duyarsız">utf32_esperanto_ci</option>
<option value="utf32_estonian_ci" title="Estçe, büyük küçük harfe duyarsız">utf32_estonian_ci</option>
<option value="utf32_general_ci" title="bilinmiyor, büyük küçük harfe duyarsız">utf32_general_ci</option>
<option value="utf32_german2_ci" title="Almanca (telefon defteri), büyük küçük harfe duyarsız">utf32_german2_ci</option>
<option value="utf32_hungarian_ci" title="Macarca, büyük küçük harfe duyarsız">utf32_hungarian_ci</option>
<option value="utf32_icelandic_ci" title="İzlandaca, büyük küçük harfe duyarsız">utf32_icelandic_ci</option>
<option value="utf32_latvian_ci" title="Litvanyaca, büyük küçük harfe duyarsız">utf32_latvian_ci</option>
<option value="utf32_lithuanian_ci" title="Litvanyaca, büyük küçük harfe duyarsız">utf32_lithuanian_ci</option>
<option value="utf32_myanmar_ci" title="bilinmiyor, büyük küçük harfe duyarsız">utf32_myanmar_ci</option>
<option value="utf32_persian_ci" title="Farsça, büyük küçük harfe duyarsız">utf32_persian_ci</option>
<option value="utf32_polish_ci" title="Lehçe, büyük küçük harfe duyarsız">utf32_polish_ci</option>
<option value="utf32_roman_ci" title="Batı Avrupa, büyük küçük harfe duyarsız">utf32_roman_ci</option>
<option value="utf32_romanian_ci" title="Romence, büyük küçük harfe duyarsız">utf32_romanian_ci</option>
<option value="utf32_sinhala_ci" title="Seylanca, büyük küçük harfe duyarsız">utf32_sinhala_ci</option>
<option value="utf32_slovak_ci" title="Slovakça, büyük küçük harfe duyarsız">utf32_slovak_ci</option>
<option value="utf32_slovenian_ci" title="Slovence, büyük küçük harfe duyarsız">utf32_slovenian_ci</option>
<option value="utf32_spanish2_ci" title="Geleneksel İspanyolca, büyük küçük harfe duyarsız">utf32_spanish2_ci</option>
<option value="utf32_spanish_ci" title="İspanyolca, büyük küçük harfe duyarsız">utf32_spanish_ci</option>
<option value="utf32_swedish_ci" title="İsveççe, büyük küçük harfe duyarsız">utf32_swedish_ci</option>
<option value="utf32_thai_520_w2" title="Tayca">utf32_thai_520_w2</option>
<option value="utf32_turkish_ci" title="Türkçe, büyük küçük harfe duyarsız">utf32_turkish_ci</option>
<option value="utf32_unicode_520_ci" title="Evrensel Kod (çokdilli)">utf32_unicode_520_ci</option>
<option value="utf32_unicode_ci" title="Evrensel Kod (çokdilli), büyük küçük harfe duyarsız">utf32_unicode_ci</option>
<option value="utf32_vietnamese_ci" title="Vietnamca, büyük küçük harfe duyarsız">utf32_vietnamese_ci</option>
</optgroup>
<optgroup label="utf8" title="UTF-8 Unicode">
<option value="utf8_bin" title="Evrensel Kod (çokdilli), İkili Değer">utf8_bin</option>
<option value="utf8_croatian_ci" title="Hırvatça, büyük küçük harfe duyarsız">utf8_croatian_ci</option>
<option value="utf8_croatian_mysql561_ci" title="Hırvatça">utf8_croatian_mysql561_ci</option>
<option value="utf8_czech_ci" title="Çekçe, büyük küçük harfe duyarsız">utf8_czech_ci</option>
<option value="utf8_danish_ci" title="Danca, büyük küçük harfe duyarsız">utf8_danish_ci</option>
<option value="utf8_esperanto_ci" title="Esperanto, büyük küçük harfe duyarsız">utf8_esperanto_ci</option>
<option value="utf8_estonian_ci" title="Estçe, büyük küçük harfe duyarsız">utf8_estonian_ci</option>
<option value="utf8_general_ci" title="Evrensel Kod (çokdilli), büyük küçük harfe duyarsız">utf8_general_ci</option>
<option value="utf8_general_mysql500_ci" title="Evrensel Kod (çokdilli)">utf8_general_mysql500_ci</option>
<option value="utf8_german2_ci" title="Almanca (telefon defteri), büyük küçük harfe duyarsız">utf8_german2_ci</option>
<option value="utf8_hungarian_ci" title="Macarca, büyük küçük harfe duyarsız">utf8_hungarian_ci</option>
<option value="utf8_icelandic_ci" title="İzlandaca, büyük küçük harfe duyarsız">utf8_icelandic_ci</option>
<option value="utf8_latvian_ci" title="Litvanyaca, büyük küçük harfe duyarsız">utf8_latvian_ci</option>
<option value="utf8_lithuanian_ci" title="Litvanyaca, büyük küçük harfe duyarsız">utf8_lithuanian_ci</option>
<option value="utf8_myanmar_ci" title="bilinmiyor, büyük küçük harfe duyarsız">utf8_myanmar_ci</option>
<option value="utf8_persian_ci" title="Farsça, büyük küçük harfe duyarsız">utf8_persian_ci</option>
<option value="utf8_polish_ci" title="Lehçe, büyük küçük harfe duyarsız">utf8_polish_ci</option>
<option value="utf8_roman_ci" title="Batı Avrupa, büyük küçük harfe duyarsız">utf8_roman_ci</option>
<option value="utf8_romanian_ci" title="Romence, büyük küçük harfe duyarsız">utf8_romanian_ci</option>
<option value="utf8_sinhala_ci" title="Seylanca, büyük küçük harfe duyarsız">utf8_sinhala_ci</option>
<option value="utf8_slovak_ci" title="Slovakça, büyük küçük harfe duyarsız">utf8_slovak_ci</option>
<option value="utf8_slovenian_ci" title="Slovence, büyük küçük harfe duyarsız">utf8_slovenian_ci</option>
<option value="utf8_spanish2_ci" title="Geleneksel İspanyolca, büyük küçük harfe duyarsız">utf8_spanish2_ci</option>
<option value="utf8_spanish_ci" title="İspanyolca, büyük küçük harfe duyarsız">utf8_spanish_ci</option>
<option value="utf8_swedish_ci" title="İsveççe, büyük küçük harfe duyarsız">utf8_swedish_ci</option>
<option value="utf8_thai_520_w2" title="Tayca">utf8_thai_520_w2</option>
<option value="utf8_turkish_ci" title="Türkçe, büyük küçük harfe duyarsız">utf8_turkish_ci</option>
<option value="utf8_unicode_520_ci" title="Evrensel Kod (çokdilli)">utf8_unicode_520_ci</option>
<option value="utf8_unicode_ci" title="Evrensel Kod (çokdilli), büyük küçük harfe duyarsız">utf8_unicode_ci</option>
<option value="utf8_vietnamese_ci" title="Vietnamca, büyük küçük harfe duyarsız">utf8_vietnamese_ci</option>
</optgroup>
<optgroup label="utf8mb4" title="UTF-8 Unicode">
<option value="utf8mb4_bin" title="Evrensel Kod (çokdilli), İkili Değer">utf8mb4_bin</option>
<option value="utf8mb4_croatian_ci" title="Hırvatça, büyük küçük harfe duyarsız">utf8mb4_croatian_ci</option>
<option value="utf8mb4_croatian_mysql561_ci" title="Hırvatça">utf8mb4_croatian_mysql561_ci</option>
<option value="utf8mb4_czech_ci" title="Çekçe, büyük küçük harfe duyarsız">utf8mb4_czech_ci</option>
<option value="utf8mb4_danish_ci" title="Danca, büyük küçük harfe duyarsız">utf8mb4_danish_ci</option>
<option value="utf8mb4_esperanto_ci" title="Esperanto, büyük küçük harfe duyarsız">utf8mb4_esperanto_ci</option>
<option value="utf8mb4_estonian_ci" title="Estçe, büyük küçük harfe duyarsız">utf8mb4_estonian_ci</option>
<option value="utf8mb4_general_ci" title="Evrensel Kod (çokdilli), büyük küçük harfe duyarsız">utf8mb4_general_ci</option>
<option value="utf8mb4_german2_ci" title="Almanca (telefon defteri), büyük küçük harfe duyarsız">utf8mb4_german2_ci</option>
<option value="utf8mb4_hungarian_ci" title="Macarca, büyük küçük harfe duyarsız">utf8mb4_hungarian_ci</option>
<option value="utf8mb4_icelandic_ci" title="İzlandaca, büyük küçük harfe duyarsız">utf8mb4_icelandic_ci</option>
<option value="utf8mb4_latvian_ci" title="Litvanyaca, büyük küçük harfe duyarsız">utf8mb4_latvian_ci</option>
<option value="utf8mb4_lithuanian_ci" title="Litvanyaca, büyük küçük harfe duyarsız">utf8mb4_lithuanian_ci</option>
<option value="utf8mb4_myanmar_ci" title="bilinmiyor, büyük küçük harfe duyarsız">utf8mb4_myanmar_ci</option>
<option value="utf8mb4_persian_ci" title="Farsça, büyük küçük harfe duyarsız">utf8mb4_persian_ci</option>
<option value="utf8mb4_polish_ci" title="Lehçe, büyük küçük harfe duyarsız">utf8mb4_polish_ci</option>
<option value="utf8mb4_roman_ci" title="Batı Avrupa, büyük küçük harfe duyarsız">utf8mb4_roman_ci</option>
<option value="utf8mb4_romanian_ci" title="Romence, büyük küçük harfe duyarsız">utf8mb4_romanian_ci</option>
<option value="utf8mb4_sinhala_ci" title="Seylanca, büyük küçük harfe duyarsız">utf8mb4_sinhala_ci</option>
<option value="utf8mb4_slovak_ci" title="Slovakça, büyük küçük harfe duyarsız">utf8mb4_slovak_ci</option>
<option value="utf8mb4_slovenian_ci" title="Slovence, büyük küçük harfe duyarsız">utf8mb4_slovenian_ci</option>
<option value="utf8mb4_spanish2_ci" title="Geleneksel İspanyolca, büyük küçük harfe duyarsız">utf8mb4_spanish2_ci</option>
<option value="utf8mb4_spanish_ci" title="İspanyolca, büyük küçük harfe duyarsız">utf8mb4_spanish_ci</option>
<option value="utf8mb4_swedish_ci" title="İsveççe, büyük küçük harfe duyarsız">utf8mb4_swedish_ci</option>
<option value="utf8mb4_thai_520_w2" title="Tayca">utf8mb4_thai_520_w2</option>
<option value="utf8mb4_turkish_ci" title="Türkçe, büyük küçük harfe duyarsız">utf8mb4_turkish_ci</option>
<option value="utf8mb4_unicode_520_ci" title="Evrensel Kod (çokdilli)">utf8mb4_unicode_520_ci</option>
<option value="utf8mb4_unicode_ci" title="Evrensel Kod (çokdilli), büyük küçük harfe duyarsız">utf8mb4_unicode_ci</option>
<option value="utf8mb4_vietnamese_ci" title="Vietnamca, büyük küçük harfe duyarsız">utf8mb4_vietnamese_ci</option>
</optgroup>
</select>
                  </td>
                  <td>   

                    <?php if (!isset($_GET["tabloduzenle"])) {echo $key["Key"]." ".strtoupper($key["Extra"]);}else{ ?> <select class="table_index" name="index[]" id="field_0_7" data-index="">
          <?php
            if(!empty($key["Key"])){
            echo "<option>".$key["Key"]."</option>"; } ?>
               
    <option value="bos">---</option>
    <option  title="Birincil">
        PRIMARY
    </option>
    <option  title="Benzersiz">
        UNIQUE
    </option>
    <option  title="Index">
        INDEX
    </option>
    <option  title="Tam metin">
        FULLTEXT
    </option>
    <option  title="Uzaysal">
        SPATIAL
    </option>
</select> <?php } ?></td>
<td><input type="checkbox" name="bos[<?php echo $i-1; ?>]" class="bos" value="bos"  <?php if(!empty($key["Null"] =="YES")){echo "checked"; } ?>></td>
<td>
  <input type="checkbox" class="ai" name="aicrement[<?php echo $i-1; ?>]" value="<?php if (!empty($key["Extra"])) {echo "AUTO_INCREMENT";
} ?>" <?php if (!empty($key["Extra"]) and $key["Extra"] == "auto_increment") {echo "checked";
} ?> ><?php if (!empty($key["Extra"]) and $key["Extra"] == "auto_increment") {echo "<a class='aiptal' href='javascript:aiptal()'>iptal</a>";
} ?></td>

                  

                </tr>
           <?php }} ?>
            </tbody>


      
          </table>
          <div class="form-group pull-right"><button type="submit" name="tabloduzenle" class="btn btn-info "><i class="fa fa-plus"></i> Tabloyu Düzenle</button></div></form>
  <?php }

  public function insertdata($tablo_ad)
  {global $db;
  $sql = "SHOW FULL COLUMNS FROM  ".$tablo_ad ;
       $vrtb=$db->prepare($sql);
              $vrtb->execute();
             $sutun_sayi = $vrtb->rowCount();
             echo '<div style="display: none;" id="veriekle-container"><form action="tabloisle.php" method="POST">';
             echo "<input type='hidden' name='tablo_adi' value='".$tablo_ad."' />";
             echo "<input type='hidden' name='sutun_sayi' value='".$sutun_sayi."' />";
              $isle =  $vrtb->fetchAll(PDO::FETCH_ASSOC);
 

if (isset($isle)) {
echo '<table   class="table table-bordered table-hover">
    <thead>
    <tr>
    <th>Adı</th>
    <th>Türü</th>
    <th>Boş</th>
    <th style="width:50%;">Değer</th>
    </tr>
    </thead>
    <tbody>';
$i =0;
foreach ($isle as $key ) {
$ad = $key['Field'];
$int=" ";
if (!empty($key["Extra"])) {$int =  "<input type='hidden' name='primary' value='".$ad."' >";}
 
$i++;

    echo '  
    <tr>
    <td><div class="col-md-4 form-group"><label for="'. $ad .'">' . $ad . '</label><input type="hidden" name="sutun_ad[]" value="'.$ad.'"/>'.$int.'</div></td>
    <td><label>'.$key["Type"].'</label></td>';
 if($key["Null"] == "YES"){ echo  '<td><div class="col-md-4 form-group"><input onclick="$('."'#".$ad."'".').val('."'Null'".');" type="checkbox" name="bos"></div></td>';}else
 { echo  '<td><div class="col-md-4 form-group"></div></td>';}
if (explode("(",$key["Type"])[0] == "int") {
echo '<td>   
                 <input type="number"  id="' . $ad . '"  name="' . $ad . '" value="'. $key["Default"] .'" >
               </td>
       ';

}else if(explode("(",$key["Type"])[0] == "varchar" and explode(")",explode("(",$key["Type"])[1])[0] >= 100){
echo '<td>   
                 <textarea type="text" id="' . $ad . '" class="form-control" name="' . $ad . '" value="" >'. $key["Default"] .'</textarea>
               </td>
       ';
}else if(explode("(",$key["Type"])[0] == "mediumtext"){
echo '<td>   
                 <textarea type="text" rows="15" id="' . $ad . '" class="form-control" name="' . $ad . '" value="" ></textarea>
               </td>
       ';
}else if(explode("(",$key["Type"])[0] == "text"){
echo '<td>   
                 <textarea type="text" rows="5" id="' . $ad . '" class="form-control" name="' . $ad . '" value="" ></textarea>
               </td>
       ';
}else if(explode("(",$key["Type"])[0] == "date" ){
echo '<td>   
                 <input type="date" id="' . $ad . '" class="form-control"  name="' . $ad . '" value="" >
               </td>
       ';
}else if(explode("(",$key["Type"])[0] == "time" ){
echo '<td>   
                 <input type="time" id="' . $ad . '" class="form-control"  name="' . $ad . '" value="" >
               </td>
       ';
}else if(explode("(",$key["Type"])[0] == "timestamp"){
echo '<td>   
                 <input type="timestamp" id="' . $ad . '" class="form-control"  name="' . $ad . '" value="" >
               </td>
       ';
}else if($key["Type"] == "datetime" ){
echo '<td>   
                 <input type="text" id="' . $ad . '" class="form-control"  name="' . $ad . '" value="'. $key["Default"] .'" >
               </td>
       ';
}
else{echo '<td>   
                 <input type="text"  size="'.explode(")",explode("(",$key["Type"])[1])[0].'" data-maxlength="'.explode(")",explode("(",$key["Type"])[1])[0].'" id="' . $ad . '"  name="' . $ad . '" value="'. $key["Default"] .'" >
               </td>';
     }
echo "</tr>";
  
  }
  echo '</tbody>
    </table><button type="submit" name="veriekle" class=" veriekle btn btn-warning pull-right" >Kaydet</button></form></div>';
  }
  }
public function tableview($listeletablo)
{ global $db;
echo '<button id="verieklebtn" class="btn-warning btn"><i class="fa fa-plus"></i> Veri Ekle</button>';
$loadNum = "";
$benzersiz =  "";
try{
  $vrtb=$db->prepare('SHOW FULL COLUMNS FROM '.$listeletablo);
$vrtb->execute();
}catch(PDOException $e){
header("Location:index.php?durum=no&sql_cumlesi=".$e->getMessage());
}
$sutun_sayi = $vrtb->rowCount();
if ($sutun_sayi>0){
 echo  ' <table id="listeletablo"  tablo-ad="'.$listeletablo.'" class="table table-bordered table-hover "><thead><tr><th>İşlemler</th>';
  while($isle =  $vrtb->fetch(PDO::FETCH_ASSOC)){
 if($isle["Key"] == "PRI"){
$duzenle = "ok";
$loadNum = "loadNum";
$benzersiz = $isle["Field"];
}

}
$query = 'select * from '.$listeletablo;
$veri = $db->prepare($query);
$veri->execute();

if ($veri)
{
  $i = 0;
  $uye = new \stdClass();
  while ($i < $veri->columnCount())
  {
     $meta = $veri->getColumnMeta($i);
     
    echo '<th sutun="' . $meta['name'] . '">' . $meta['name'] . '</th>';
      if (isset($benzersiz) == $meta['name']) {
      $sutun = $i;
    }
   // $sutunno = array($i=>$meta['name']);
    $uye->$i ="";
    $uye->$i =$meta['name'];
    $i = $i + 1;
  
  }
  echo '</tr></thead> <tbody>';
  $icerik ="";
  $i = 0;
  while ($row = $veri->fetch(PDO::FETCH_ASSOC)) 
  {
    echo '<tr>';
    $count = $veri->columnCount();
    $counts = $veri->rowCount();
    $y = 0;
    while ($y < $count)
    {

        $icerik =  current($row);
     $sutunno = $uye->$y;
      
      if ($y == 0) {
        if(isset($duzenle) == "ok"){

      echo '<td> <button title="Sil" icerik="'.$icerik.'" data-table="'.$listeletablo.'" data-field="'.$benzersiz.'" class="btn btn-danger silicerik"><i class="fa fa-trash"></i></button> <button  title="Düzenle" icerik="'.$icerik.'" data-table="'.$listeletablo.'" data-field="'.$benzersiz.'" class="btn btn-info duzenleicerik"><i class="fa fa-edit"></i></button></td>';
      }else{
        echo "<td class='soru-isaret'><div class='soru-anlam'>Benzersiz içerik değil düzenleme yapılamaz?</div><i  class='fa fa-question-circle'> </i></td>";
      }}
      
      echo '<td><span  sutun="'.$sutunno.'" datatable="'.$listeletablo.'"   datafield="'.$benzersiz.'" class="'.$loadNum.'">' . substr(htmlspecialchars(current($row)),0,100) . '</span><textarea style="display:none;" >'.current($row).'</textarea></td>';
      next($row);
     
      $y = $y + 1;
    }
    echo '</tr>';
    $i = $i + 1;
  }
  echo '</tbody></table>';}}


}

public function addtable($action){
 
echo '  <form action="'.$action.'" method="get">
  
  <div class="form-row">

  <div class="col-md-3 form-group">
              <label for="exampleInputEmail1">Tablo Adı</label>
              <input type="text" class="form-control" name="tablo_ad" value="" placeholder="Tablo Adı">
            </div>
  <div class="col-md-2 form-group">
              <label for="exampleInputEmail1">Sütun Sayısı</label>
              <input type="number" class="form-control" name="sutun_sayi" value="2" min="1" max="30"  placeholder="Sutun Sayısı">
            </div> 
             <div class="col-md-2 form-group"><label class="">Tabloyu Oluştur <i style="color:#000;" class="fa fa-arrow-down"></i></label>
              <input type="submit" value="Tabloyu Oluştur" name="ekletablo" class="btn btn-info form-control"></div>
  </div>       
</form>';
 
}

public function tables($value='')
{global$db; ?>
             <table id="listeletablo" class="table table-hover">

            <thead>
              <tr>
                <th>Tablo Adı</th>
                <th>Karşılaştırma</th>
                <th>Sutun Sayısı</th>
                <th>İçerik Sayısı</th>
                <th>Boyut</th>
                <th>Oluşturma Tarihi</th>
                <th>Sil | Düzenle | Görüntüle</th>
                
              </tr>
            </thead>
            <tbody>



              <?php 
              $vrtb=$db->prepare("SHOW TABLE STATUS");
              $vrtb->execute();
              $isle =  $vrtb->fetchAll(PDO::FETCH_ASSOC);
              foreach ($isle as $tablo) {
              # code...



                ?>

    

                
              

                <tr>
                  <td><?php echo $tablo["Name"]; ?> </td>
                  <td><?php echo $tablo["Collation"]; ?></td>
                  <td><span><?php  
   $vrtb = $db->prepare("SHOW FULL COLUMNS FROM  ".$tablo["Name"]); $vrtb->execute(); echo $vrtb->rowCount(); 
                   ?></span> 
                   <form style="float: right;" action="index.php" method="get">
                    <input style="width: 30px" type="number" required=""  name="sutun_sayi">
                    <input type="hidden" min="1" max="20" name="tablo" value="<?php echo $tablo['Name']; ?>">
                    <button type="submit" class="btn btn-warning" style="padding: 5px" title="Sutun Ekle"  name="yeni_satir" ><i class="fa fa-plus-square"></i></button></form></td>
                  <td><?php echo $tablo["Rows"]; ?> <button onclick="emptytable('<?php echo $tablo["Name"]; ?>')" title="Tabloyu Boşalt" class="btn-xs btn btn-danger pull-right"><i class="fa fa-minus-square"></i></button></td>
                  <td><?php echo ROUND($tablo["Data_length"]/1024,1); ?> kb</td>
                  <td><?php echo $tablo["Create_time"]; ?></td>
                  <td><button onclick="siltable('<?php echo $tablo["Name"]; ?>')" title="Sil" class="btn btn-danger"><i class="fa fa-trash"></i></button> <button title="Düzenle" onclick="duzenle('<?php echo $tablo["Name"]; ?>')" class="btn btn-info"><i class="fa fa-edit"></i></button> <a title="Görüntüle" class="btn btn-warning" href="index.php?durum=ok&sql_cumlesi=<?php echo 'SELECT * FROM '.$tablo["Name"]; ?>&listeletablo=<?php echo $tablo["Name"]; ?>"><i class="fa fa-eye"></i></a></td>

                </tr>
              <?php } ?>
            </tbody>


          </table>
<?php
}
}













$dizgi =  array("CHAR","VARCHAR","TINYTEXT","TEXT","MEDIUMTEXT","BINARY","VARBINARY","TINYBLOB","MEDIUMBLOB","BLOB","LONGBLOB","ENUM");
$veriduzenle = array("sutun_ad","tablo_adi","sutun_sayi","primary","primary_value","veriduzenle");




if (isset($_POST["veriduzenle"])) {

$kayit = false;
  $set ="UPDATE `".$_POST["tablo_adi"]."` SET ";
 $i =0;$y =0;
  foreach ($_POST as $key => $icerik) {if (in_array($key,$veriduzenle) == 0 ) {if ($_POST["primary"] !== $key && $_POST["primary"]."_ex" !== $key && $_POST[$key."_ex"] !== $_POST[$key]) {if(isset($_POST[$key."_ex"])) {$i++;}}}}



  foreach ($_POST as $key => $icerik) {
   
  if (in_array($key,$veriduzenle) == 0 ) {

if ($_POST["primary"] !== $key && $_POST["primary"]."_ex" !== $key && $_POST[$key."_ex"] !== $_POST[$key]) {
 
  
  if(isset($_POST[$key."_ex"])) {
$y++;
    
      if ($i == $y) {
        $set .= "`".$key."`="."'".filter_var($icerik, FILTER_SANITIZE_STRING)."' WHERE ".$_POST["primary"]."= '".$_POST["primary_value"]."'";
        $kayit = true;
   
      }else{ 
       $set .= "`".$key."`='".filter_var($icerik, FILTER_SANITIZE_STRING)."',";
      $kayit = true;
     }

     
   }
   


}

     
    }
   

  }
if ($kayit == true) {

    try{
       $db->exec($set);

Header ("Location:index.php?durum=ok&sql_cumlesi=".$set."&listeletablo=".$_POST['tablo_adi']);

      }catch(PDOException $e)
      {


    Header ("Location:index.php?durum=no&sql_cumlesi=".$set."<br>".$e->getMessage()."&listeletablo=".$_POST['tablo_adi']);


      }
}
}









if (isset($_POST['yeni'])) {

 $benzersiz = $_POST['benzersiz'];
 $benzersiz_veri = $_POST['benzersiz_veri'];
 $tablo = $_POST['tablo'];
 $sutun = $_POST['sutun'];
 $yeni = $_POST['yeni'];
 $isle = "UPDATE `".$tablo."` SET `".$sutun."` = '".$yeni."' WHERE `".$tablo."`.`".$benzersiz."` = '".$benzersiz_veri."'";
 try{
       $db->exec($isle);

 $array["ok"] = $isle;

echo json_encode($array);
      }catch(PDOException $e)
      {

 $array["no"] = $isle."<br>".$e->getMessage();
 echo json_encode($array);
      }

}

if (isset($_POST['veriekle'])) {
  if (isset($_POST["primary"])) {
  $pri =$_POST["primary"];
  }
  $sql =" INSERT INTO `".$_POST['tablo_adi']."` (";
  $value =" VALUE (";
  $i=0; 
foreach($_POST['sutun_ad'] as $tasarim_yazi) {
 $i++;
  if ($_POST["sutun_sayi"] == $i) {
    if ($tasarim_yazi == $pri) {
      $array .= " NULL ";
    }else{
      $array .= "'".$_POST[$tasarim_yazi]."')";
    }
    $sutun .= "`".$tasarim_yazi.'` )';
    
  }else {
if ($tasarim_yazi == $pri) {
   $array .= "NULL,";
}else{
  $array .= "'".$_POST[$tasarim_yazi]."',";
}
    $sutun .= "`".$tasarim_yazi."`,";
    
  }

}
$isle =  $sql.$sutun.$value.$array;
  try{
       $db->exec($isle);

Header ("Location:index.php?durum=ok&sql_cumlesi=".$isle."&listeletablo=".$_POST['tablo_adi']);

      }catch(PDOException $e)
      {


    Header ("Location:index.php?durum=no&sql_cumlesi=".$isle."<br>".$e->getMessage()."&listeletablo=".$_POST['tablo_adi']);


      }

}



if (isset($_POST['yeni_ad'])) {
$veritabani = $_SESSION["veritabani"];
$yeni_ad =$_POST['yeni_ad'];
$ilk_ad =$_POST['ilk_ad'];
$isle = "RENAME TABLE `".$veritabani."`.`".$ilk_ad."` TO `".$veritabani."`.`".$yeni_ad."`";
  try{
       $db->exec($isle);
     echo "ok";


      }catch(PDOException $e)
      {


     echo $isle;


      }
}




if (isset($_POST['tabloduzenle'])) {
$i =0 ;
  $mik = 0;
  $sql ="";
  $tabload = "ALTER TABLE `".$_POST["tablo_ad"]."` ";
  $varsayilan_deger = "";
  $karsilastirma = ""; 
  foreach($_POST['adi'] as $tasarim_yazi) {
    if (!empty($tasarim_yazi)){
      $mik++; }
    }
    foreach($_POST['adi'] as $tasarim_yazi) {

      if (!empty($tasarim_yazi)){   
        $adi = $_POST['adi'][$i];
        $adi2 = $_POST['adi2'][$i];
        if($mik-1 == $i) {//Sonuncu satırı çalıştırır.
         
          $virgulbas = " ";
          $virguldis = "  ";
          if($_POST['index'][$i] == "PRIMARY"){
            $virgulbas = " , ";
            $virguldis = " , ";
            $varsayilan_deger = $virgulbas." CHANGE PRIMARY KEY "."(`".$adi."`)".$virgulson;
          }else if($_POST['index'][$i] == "bos"){
            $varsayilan_deger = "  ";$virgulson; $virgulbas = "  ";$virguldis = "  ";

          }else{
            $varsayilan_deger = $virgulbas." CHANGE ".$_POST['index'][$i]."(`".$adi."`)".$virgulson;
          }
        }


        else{
         
          $virguldis = " , ";

          if($_POST['index'][$i] == "PRIMARY"){
            $virgulbas = " , ";
            $varsayilan_deger = $virgulbas." CHANGE  PRIMARY KEY "."(`".$adi."`)".$virgulson;
          }else if($_POST['index'][$i] == "bos"){
            $varsayilan_deger = "  "; $virgulson = " "; $virgulbas = " "; $virguldis = " , ";
          }
          else{
            $virgulbas = " , ";
            $varsayilan_deger = $virgulbas." CHANGE ".$_POST['index'][$i]."(`".$adi."`)".$virgulson;
          }
        };





            $karsilastirma  =" ";
            $turu = $_POST['turu'][$i];
            
            if (!empty($_POST['uzunluk'][$i])) {
            $uzunluk_deger = "(".$_POST['uzunluk'][$i].")";
            }else{
              $uzunluk_deger =" ";
            }

            if(in_array($turu,$dizgi) == 1 ){
              if (!empty($_POST['karsilastirma'][$i])) {
                $dil = explode("_", $_POST['karsilastirma'][$i]);
                $karsilastirma = "CHARACTER SET ".$dil[0]." COLLATE ".$_POST['karsilastirma'][$i];
              }
              
            }
            $varsayilan = $_POST['varsayilan'][$i];

            switch ($varsayilan) {
              case "NONE":
              $tanimlanan = " ";
             
              break;
              case "USER_DEFINED":
              if ($_POST['tanimlanan'][$i] == "CURRENT_TIMESTAMP") {
                $uzunluk_deger =" ";
              }
              $tanimlanan = "DEFAULT '".$_POST['tanimlanan'][$i]."' ";
              break;
              case "NULL":
              $tanimlanan = " DEFAULT NULL ";
              break;
              case "CURRENT_TIMESTAMP":
              $tanimlanan = "  DEFAULT CURRENT_TIMESTAMP ";
              $tanim = " CURRENT_TIMESTAMP ";
              $uzunluk_deger =" ";
              break;
            }



            if (!isset($_POST['aicrement'][$i])) {
              $notnull = " NOT NULL ";
              $aicrement = " ";

            }else if ( $_POST['aicrement'][$i] == "AUTO_INCREMENT"){
              $aicrement = " NOT NULL ".$_POST['aicrement'][$i];
              $notnull =" ";
              
            }     if (isset($_POST['bos'][$i])) {
             $notnull = "  NULL ";
              

            }


        $sql .= "CHANGE `".$adi2."` "." `".$adi."` ".$turu.$uzunluk_deger." ".$aicrement." ".$karsilastirma.$notnull.$tanimlanan.$virguldis;
      
        $i++;}
      } 


    $isle = $tabload.$sql."";



      try{
       $db->exec($isle);
       Header ("Location:index.php?durum=ok&sql_cumlesi=".$isle);


      }catch(PDOException $e)
      {


       Header ("Location:index.php?durum=no&sql_cumlesi=".$isle."<br>".$e->getMessage());


      }
}

if (isset($_POST["sutunindex"])) {
  $isle = $_POST["islem"];
try{
       $db->exec($isle);

 $array["ok"] = "<br>".$isle;

echo json_encode($array);
      }catch(PDOException $e)
      {

 $array["no"] = "<br>".$isle."<br>".$e->getMessage();
 echo json_encode($array);
      }
}










if (isset($_POST['yeni_satir'])) {
  $i =0 ;
  $mik = 0;
  $sql ="";
  $tabload = "ALTER TABLE `".$_POST["tablo_ad"]."` ";
  $varsayilan_deger = "";
  $karsilastirma = ""; 
  foreach($_POST['adi'] as $tasarim_yazi) {
    if (!empty($tasarim_yazi)){
      $mik++; }
    }
    foreach($_POST['adi'] as $tasarim_yazi) {

      if (!empty($tasarim_yazi)){   
        $adi = $_POST['adi'][$i];
        if($mik-1 == $i) {//Sonuncu satırı çalıştırır.
          if(!empty($ilki)){
          $sonrasi = $ilki;          
          $virgulbas = " ";
          $virguldis = " , "; 
          $after = " AFTER ";
          } // Önceden  satırlar varsa.
          else{// Önceden Satır yoksa.

               if($_POST['sonrasi'] == "FIRST" ){
                         $sonrasi = $_POST['sonrasi'];
                       }else{
                         $sonrasi = "`".$_POST['sonrasi']."`";
                         $after = " AFTER ";
                       }
          
          $virgulbas = " ";
          $virguldis = "  ";
          }

          if($_POST['index'][$i] == "PRIMARY"){
            $virgulbas = " , ";
            $virguldis = " , ";
            $virgulson = "";
                      if(!empty($ilki)){$sonrasi = $ilki;          $virgulbas = " ";
          $virguldis = " , "; } // Önceden  satırlar varsa.
          else{// Önceden Satır yoksa.
           if($first == "FIRST"){ if($_POST['sonrasi'] == "FIRST" ){
                         $sonrasi = $_POST['sonrasi'];
                       }else{
                         $sonrasi = "`".$_POST['sonrasi']."`";
                         $after = " AFTER ";
                       }}
          $virgulbas = " , ";
          $virguldis = "  ";
          }
            $varsayilan_deger = $virgulbas." ADD PRIMARY KEY "."(`".$adi."`)".$virgulson;
          }else if($_POST['index'][$i] == "bos"){
            $varsayilan_deger = "  ";$virgulson; $virgulbas = "  ";$virguldis = "  ";

          }else{
            $varsayilan_deger = $virgulbas." ADD ".$_POST['index'][$i]."(`".$adi."`)".$virgulson;
          }
        }


        else{

         if($_POST['sonrasi'] == "FIRST"){
              $sonrasi = $_POST['sonrasi'];
              $first= $_POST['sonrasi'];
            }else{
              $sonrasi = "`".$_POST['sonrasi']."`";
              $after = " AFTER ";
               $first= $_POST['sonrasi'];
            }
          $ilki = "`".$adi."`";
          $virguldis = " , ";

          if($_POST['index'][$i] == "PRIMARY"){
            $virgulbas = " , ";
            $varsayilan_deger = $virgulbas."ADD PRIMARY KEY "."(`".$adi."`)".$virgulson;
          }else if($_POST['index'][$i] == "bos"){
            $varsayilan_deger = "  "; $virgulson = " "; $virgulbas = " "; $virguldis = " , ";
          }
          else{
            $virgulbas = " , ";
            $varsayilan_deger = $virgulbas." ADD ".$_POST['index'][$i]."(`".$adi."`)".$virgulson;
          }
        };





         $karsilastirma  =" ";
            $turu = $_POST['turu'][$i];
            if (!empty($_POST['uzunluk'][$i])) {
            $uzunluk_deger = "(".$_POST['uzunluk'][$i].")";
            }else{
              $uzunluk_deger =" ";
            }
            if(in_array($turu,$dizgi) == 1 ){
              if (!empty($_POST['karsilastirma'][$i])) {
                $dil = explode("_", $_POST['karsilastirma'][$i]);
                $karsilastirma = "CHARACTER SET ".$dil[0]." COLLATE ".$_POST['karsilastirma'][$i];
              }
              
            }
            $varsayilan = $_POST['varsayilan'][$i];

            switch ($varsayilan) {
              case "NONE":
              $tanimlanan = " ";
              break;
              case "USER_DEFINED":
              if ($_POST['tanimlanan'][$i] == "CURRENT_TIMESTAMP") {
                $uzunluk_deger =" ";
              }
              $tanimlanan = "DEFAULT '".$_POST['tanimlanan'][$i]."' ";
              break;
              case "NULL":
              $tanimlanan = " DEFAULT NULL ";
              break;
              case "CURRENT_TIMESTAMP":
              $tanimlanan = "  DEFAULT CURRENT_TIMESTAMP ";
              $tanim = "CURRENT_TIMESTAMP";
              $uzunluk_deger =" ";
              break;
            }



            if (!empty($_POST['aicrement'][$i])) {
              $aicrement = " NOT NULL ".$_POST['aicrement'][$i];
              $notnull ="";
            }else{
              $notnull = " NOT NULL ";
              $aicrement = " ";
              
            }
              if (isset($_POST['bos'][$i])) {
             $notnull = "  NULL ";
              

            }


        $sql .= "ADD `".$adi."` ".$turu.$uzunluk_deger." ".$aicrement." ".$karsilastirma.$notnull.$tanimlanan.$after.$sonrasi.$virguldis;
        $varsayilan_degerler .=$varsayilan_deger;
        $i++;}
      } 


      $isle = $tabload.$sql.$varsayilan_degerler."";



      try{
        $db->exec($isle);
        Header ("Location:index.php?durum=ok&sql_cumlesi=".$isle);

      }catch(PDOException $e)
      {


        Header ("Location:index.php?durum=no&sql_cumlesi=".$isle."<br>".$e->getMessage());


      }

    }




if (isset($_POST["tablosil"])) {
  $sql=$db->prepare("DROP TABLE  ".$_POST["tablo"]);
if($sql->execute()){
echo "ok";
}else{
echo "no";
}
}
if (isset($_POST["tablobosalt"])) {
  $sql=$db->prepare("TRUNCATE  ".$_POST["tablo"]);
if($sql->execute()){
echo "ok";
}else{
echo "no";
}
}


if (isset($_POST["satirsil"])) {

$sql = "ALTER TABLE  `".$_POST["tablo"]."` DROP `".$_POST["satir"]."`";
 try{
$db->exec($sql);
echo "ok";
    
}catch(PDOException $e)
    {
 echo "no";
    
  }

}

if (isset($_POST["iceriksil"])) {

$sil=$db ->prepare("DELETE FROM ".$_POST["iceriktable"]." WHERE ".$_POST["icerikbenzersiz"]."=:".$_POST["icerikbenzersiz"]);
  $kontrolet=$sil->execute(array($_POST["icerikbenzersiz"] => $_POST["icerik"]));
  if ($kontrolet) {
    echo  "ok";

  }else{
    echo "no";
  }
}












    if(isset($_POST['tabloisle'])) { 
      $i =0 ;
      $mik = 0;
      $sql ="";
      $tabload = "CREATE TABLE `".$_POST["tablo_ad"]."` (";
      $varsayilan_deger = "";
      $karsilastirma = ""; 
      foreach($_POST['adi'] as $tasarim_yazi) {
        if (!empty($tasarim_yazi)){
          $mik++; }
        }
        foreach($_POST['adi'] as $tasarim_yazi) {

          if (!empty($tasarim_yazi)){   
            $adi = $_POST['adi'][$i];
            if($mik-1 == $i) {
              $virgulbas = " ";
              $virguldis = " , ";
              if($_POST['index'][$i] == "PRIMARY"){
                $virgulbas = " , ";
                $virguldis = " , ";
                $varsayilan_deger = $virgulbas." PRIMARY KEY "."(`".$adi."`)".$virgulson;
              }else if($_POST['index'][$i] == "bos"){
                $varsayilan_deger = "  ";$virgulson; $virgulbas = "  ";$virguldis = "  ";

              }else{
                $varsayilan_deger = $virgulbas." ".$_POST['index'][$i]."(`".$adi."`)".$virgulson;
              }
            }else{
              $virguldis = " , ";

              if($_POST['index'][$i] == "PRIMARY"){
                $virgulbas = " , ";
                $varsayilan_deger = $virgulbas." PRIMARY KEY "."(`".$adi."`)".$virgulson;
              }else if($_POST['index'][$i] == "bos"){
                $varsayilan_deger = "  "; $virgulson = " "; $virgulbas = " "; $virguldis = " , ";
              }
              else{
                $virgulbas = " , ";
                $varsayilan_deger = $virgulbas." ".$_POST['index'][$i]."(`".$adi."`)".$virgulson;
              }
            };




            $karsilastirma  =" ";
            $turu = $_POST['turu'][$i];
            if (!empty($_POST['uzunluk'][$i])) {
            $uzunluk_deger = "(".$_POST['uzunluk'][$i].")";
            }else{
              $uzunluk_deger =" ";
            }
            if(in_array($turu,$dizgi) == 1 ){
              if (!empty($_POST['karsilastirma'][$i])) {
                $dil = explode("_", $_POST['karsilastirma'][$i]);
                $karsilastirma = "CHARACTER SET ".$dil[0]." COLLATE ".$_POST['karsilastirma'][$i];
              }
              
            }
            $varsayilan = $_POST['varsayilan'][$i];

            switch ($varsayilan) {
              case "NONE":
              $tanimlanan = " ";
              break;
              case "USER_DEFINED":
              if ($_POST['tanimlanan'][$i] == "CURRENT_TIMESTAMP") {
                $uzunluk_deger =" ";
              }
              $tanimlanan = "DEFAULT '".$_POST['tanimlanan'][$i]."' ";
              break;
              case "NULL":
              $tanimlanan = " DEFAULT NULL ";
              break;
              case "CURRENT_TIMESTAMP":
              $tanimlanan = "  DEFAULT CURRENT_TIMESTAMP ";
              $tanim = "CURRENT_TIMESTAMP";
              $uzunluk_deger =" ";
              break;
            }



            if (!empty($_POST['aicrement'][$i])) {
              $aicrement = " NOT NULL ".$_POST['aicrement'][$i];
              $notnull ="";
            }else{
              $notnull = " NOT NULL ";
              $aicrement = " ";
              
            }

            $sql .= "`".$adi."` ".$turu.$uzunluk_deger." ".$aicrement." ".$karsilastirma.$notnull.$tanimlanan.$virguldis;
            $varsayilan_degerler .=$varsayilan_deger;
            $i++;}
          } 


          $isle = $tabload.$sql.$varsayilan_degerler.") ENGINE = InnoDB";



          try{
            $db->exec($isle);
            Header ("Location:index.php?durum=ok&sql_cumlesi=".$isle);


          }catch(PDOException $e)
          {

            Header ("Location:index.php?durum=no&sql_cumlesi=".$isle."<br>".$e->getMessage());
          }

        }






         // 1.  bu yazi tekse $virgulson = false index varsa   $virguldis = true    yoksa $virguldis = false             
         // 2.  bu yazi index varsa          $virgulbas = true    son yaziysa                        $virgulson = fasle
         // 3.  bu yazi index yoksa          $virgulbas = false  son yaziysa                         $virgulson = false
         // 4.  bu yazi sonsa $virguldis = false index varsa $virgulbas = true yoksa  $virgulson = fasle
 if (isset($_POST["icerikduzenle"])) {


$tablo_ad = $_POST["iceriktable"];
$icerikbenzersiz = $_POST["icerikbenzersiz"];
$icerik = $_POST["icerik"];

$veri=$db->prepare("SELECT * FROM ".$tablo_ad." WHERE ".$icerikbenzersiz." =?");
$veri->execute(array($icerik));
$veri_sayi = $veri->rowCount();
$veriisle =  $veri->fetch(PDO::FETCH_NUM);


$sql = "SHOW FULL COLUMNS FROM  ".$tablo_ad ;
$vrtb=$db->prepare($sql);
$vrtb->execute();
$sutun_sayi = $vrtb->rowCount();
$isle =  $vrtb->fetchAll(PDO::FETCH_ASSOC);
echo '<form action="tabloisle.php" method="POST"><div class="form-group"><button type="submit" name="veriduzenle" class=" btn btn-warning " >Güncelle</button></div>';
echo "<input type='hidden' name='tablo_adi' value='".$tablo_ad."' />";
echo "<input type='hidden' name='sutun_sayi' value='".$sutun_sayi."' />";
echo '<table  class="table table-bordered table-hover">
    <thead>
    <tr>
    <th>Adı</th>
    <th>Türü</th>
    <th>Boş</th>
    <th style="width:50%;">Değer</th>
    </tr>
    </thead>
    <tbody>';
 

if (isset($isle)) {

$i =0;
foreach ($isle as $key ) {
$ad = $key['Field'];
$int=" ";
if ($key["Key"] == "PRI" || $key["Key"] == "UNI") {$int =  "<input type='hidden' name='primary' value='".$icerikbenzersiz."' /><input type='hidden' name='primary_value' value='".$icerik."' />";}
 
$i++;

    echo '  
    <tr>
    <td><div class="col-md-4 form-group"><label for="'. $ad .'">' . $ad . '</label><input type="hidden" name="sutun_ad[]" value="'.$ad.'"/>'.$int.'</div></td>
    <td><label>'.$key["Type"].'</label></td>';
 if($key["Null"] == "YES"){ echo  '<td><div class="col-md-4 form-group"><input onclick="$('."'#".$ad."'".').val('."'Null'".');" type="checkbox" name="bos"></div></td>';}else
 { echo  '<td><div class="col-md-4 form-group"></div></td>';}
if (explode("(",$key["Type"])[0] == "int") {
echo '<td>   
                 <input type="number"  id="' . $ad . '"  name="' . $ad . '" value="'.$veriisle[$i-1].'" >
                 <textarea style="display:none;"   name="' . $ad . '_ex" >'.$veriisle[$i-1].'</textarea>
               </td>
       ';

}else if(explode("(",$key["Type"])[0] == "varchar" and explode(")",explode("(",$key["Type"])[1])[0] >= 100){
echo '<td>   
                 <textarea type="text" id="' . $ad . '" class="form-control" name="' . $ad . '"  >'.$veriisle[$i-1].'</textarea>
                 <textarea style="display:none;" name="' . $ad . '_ex"  >'. $veriisle[$i-1].'</textarea>
               </td>
       ';
}else if(explode("(",$key["Type"])[0] == "mediumtext"){
echo '<td>   
                 <textarea type="text" rows="15" id="' . $ad . '" class="form-control" name="' . $ad . '" >'.$veriisle[$i-1].'</textarea>
                 <textarea style="display:none;"   name="' . $ad . '_ex" >'.$veriisle[$i-1].'</textarea>
               </td>
       ';
}else if(explode("(",$key["Type"])[0] == "text"){
echo '<td>   
                 <textarea type="text" rows="5" id="' . $ad . '" class="form-control" name="' . $ad . '" >'.$veriisle[$i-1].'</textarea>
                 <textarea style="display:none;"   name="' . $ad . '_ex" >'.$veriisle[$i-1].'</textarea>
               </td>
       ';
}
else{echo '<td>   
                 <input type="text"  size="'.explode(")",explode("(",$key["Type"])[1])[0].'" data-maxlength="'.explode(")",explode("(",$key["Type"])[1])[0].'" id="' . $ad . '"  name="' . $ad . '" value="'. $veriisle[$i-1].'" >
                 <textarea style="display:none;"      name="' . $ad . '_ex" >' .$veriisle[$i-1].'</textarea>
               </td>';
     }
echo "</tr>";
  
  }
  echo '</tbody>
    </table><div class="form-group"><button type="submit" name="veriduzenle" class=" btn btn-warning " >Güncelle</button></div></form>';
  }

 } 