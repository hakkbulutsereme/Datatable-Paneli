<?php 

include 'baglan.php';

error_reporting(E_ALL ^ E_NOTICE);
ini_set('error_reporting', E_ALL ^ E_NOTICE); 
extract($_POST);
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
        ?>


<?php if (isset($_POST["icerikduzenle"])) {


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
echo '<form action="tabloisle.php" method="POST"><button type="submit" name="veriduzenle" class=" btn btn-warning " >Güncelle</button>';
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
                 <textarea style="display:none;"      name="' . $ad . '" >' .$veriisle[$i-1].'</textarea>
               </td>';
     }
echo "</tr>";
  
  }
  echo '</tbody>
    </table></form>';
  }

 } ?>