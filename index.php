<?php 
include "panel/header.php";
include "panel/nav.php";
include "baglan.php";
?>
<style type="text/css">
  table {
        display: block;
        overflow-x: auto;
        white-space: nowrap;
    }
.soru-anlam{
display: none;
    background-color: black;
    color: white;
    font-size: 14px;
    min-height: initial;
    opacity: .7;
    outline: 1px solid black;
    padding: 4px 8px;
    position: absolute;
    }
    .soru-isaret:hover .soru-anlam{
display: block;
    }
</style>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Veritabanı Yönetim

    </h1>



    <!-- Liste ayarları Data kısmında -->

    <ol class="breadcrumb">
      <li><a href="index.php"><i class="fa fa-dashboard"></i> Anasayfa</a></li>
      <li class="active">Veritabanı Yönetim</li>
    </ol>
  </section>

  <!-- Main content -->






  <section class="content">
    <?php if (isset($_GET["sql_cumlesi"])) {
      if($_GET["durum"] =="ok"){
        $sonuc = "<label style='color:white;'>Olumlu</label>";
        $btn ="";
        $bg ="info";
      }else{
        $sonuc = "<label style='color:red;'>Olumsuz</label>";
        $btn = '<button type="button" class="btn btn-info" onclick="javascript:history.back(3)">Geri Git</button>';
        $bg ="warning";
      }
                 echo '<div class="info" id="info_box">
  <div class="alert alert-'.$bg.' alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-info"></i> SQL Komutu! Sonuç: '.$sonuc.'</h4>
'.$_GET["sql_cumlesi"].'<br>'.$btn.' <div id="json_cevap"></div>
                  </div>
  </div>';
    } ?>
    <div class="row">
      <div class="col-md-12">


       <div class="nav-tabs-custom">
        <div style="display: block;" id="mesajat"> <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Veritabanı Yönetim</h3>
          </div>







<?php if (!isset($_GET["listeletablo"])) {
 
 ?>

 <div class="box-body">
<form action="ekletablo.php" method="get">
  <div class="col-xs-3 form-group">
              <label for="exampleInputEmail1">Tablo Adı</label>
              <input type="text" class="form-control" name="tablo_ad" value="" placeholder="Tablo Adı">
            </div><div class="col-xs-2 form-group">
              <label for="exampleInputEmail1">Sütun Sayısı</label>
              <input type="number" class="form-control" name="sutun_sayi" value="2" min="1" max="30"  placeholder="Sutun Sayısı">
            </div>
             <div class="form-group pull-right"> <button type="submit" name="ekletablo" class="btn btn-info "><i class="fa fa-plus"></i> Tablo Ekle</button></div>
           </form>

</div>
          <div class="box-body">





           <table id="example1" class="table table-bordered table-hover">

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
                   <form style="float: right;" action="ekletablo.php" method="get">
                    <input style="width: 30px" type="number" required=""  name="sutun_sayi">
                    <input type="hidden" min="1" max="20" name="tablo" value="<?php echo $tablo['Name']; ?>">
                    <button type="submit" class="btn btn-warning" style="padding: 5px" title="Sutun Ekle"  name="yeni_satir" value="sutun ekle"><i class="fa fa-plus-square"></i></button></form></td>
                  <td><?php echo $tablo["Rows"]; ?> <button onclick="emptytable('<?php echo $tablo["Name"]; ?>')" title="Tabloyu Boşalt" class="btn-xs btn btn-danger pull-right"><i class="fa fa-minus-square"></i></button></td>
                  <td><?php echo $tablo["Data_length"]/1024; ?> kb</td>
                  <td><?php echo $tablo["Create_time"]; ?></td>
                  <td><button onclick="siltable('<?php echo $tablo["Name"]; ?>')" title="Sil" class="btn btn-danger"><i class="fa fa-trash-o"></i></button> <button title="Düzenle" onclick="duzenle('<?php echo $tablo["Name"]; ?>')" class="btn btn-info"><i class="fa fa-edit"></i></button> <a title="Görüntüle" class="btn btn-warning" href="index.php?durum=ok&sql_cumlesi=<?php echo 'SELECT * FROM '.$tablo["Name"]; ?>&listeletablo=<?php echo $tablo["Name"]; ?>"><i class="fa fa-external-link"></i></a></td>

                </tr>
              <?php } ?>
            </tbody>


          </table>
        </div>


<?php }else{ 
if (isset($_GET["listeletablo"])) {

?>

<div class='box-body'>

  <div class=' form-group'>
    <a href='index.php' class='btn-info btn'><i class="fa fa-arrow-left"></i> Geri</a> 
    <button id="verieklebtn" class='btn-warning btn'><i class="fa fa-plus"></i> Veri Ekle</button>
    <div><br>

<!-- İÇERİK -->

    <table id="example1" tablo-ad="<?php echo $_GET["listeletablo"]; ?>" class="table table-bordered table-hover"><thead><tr><th>İşlemler</th>
<?php 

$loadNum = "";
$benzersiz =  "";
$vrtb=$db->prepare('SHOW FULL COLUMNS FROM '.$_GET["listeletablo"]);
$vrtb->execute();
$sutun_sayi = $vrtb->rowCount();
while($isle =  $vrtb->fetch(PDO::FETCH_ASSOC)){
 if($isle["Key"] == "PRI"){
$duzenle = "ok";
$loadNum = "loadNum";
$benzersiz = $isle["Field"];
}

}
$query = 'select * from '.$_GET["listeletablo"];
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

      echo '<td> <button title="Sil" icerik="'.$icerik.'" data-table="'.$_GET["listeletablo"].'" data-field="'.$benzersiz.'" class="btn btn-danger silicerik"><i class="fa fa-trash"></i></button> <button  title="Düzenle" icerik="'.$icerik.'" data-table="'.$_GET["listeletablo"].'" data-field="'.$benzersiz.'" class="btn btn-info duzenleicerik"><i class="fa fa-edit"></i></button></td>';
      }else{
        echo "<td class='soru-isaret'><div class='soru-anlam'>Benzersiz içerik değil düzenleme yapılamaz?</div><i  class='fa fa-question-circle-o'> </i></td>";
      }}
      
      echo '<td><span  sutun="'.$sutunno.'" datatable="'.$_GET["listeletablo"].'"   datafield="'.$benzersiz.'" class="'.$loadNum.'">' . substr(htmlspecialchars(current($row)),0,100) . '</span><textarea style="display:none;" >'.current($row).'</textarea></td>';
      next($row);
     
      $y = $y + 1;
    }
    echo '</tr>';
    $i = $i + 1;
  }
  echo '</tbody></table></div>';





?>
<!-- İÇERİK -->
<!-- MODAL -->
               <div class="modal fade " id="modal-info">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="md-baslik">Veri Ekle</h4>
              </div>
              <div class="modal-body" >
              </div> 
              <div class="modal-footer">
                <button type="button" class="btn btn-info pull-left" data-dismiss="modal">Kapat</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
<div style="display: none;" id="veriekle-container">
  <?php if (isset($_GET["listeletablo"])) {
                # code...
               ?><form action="tabloisle.php" method="POST">
              <?php 
$tablo_ad = $_GET["listeletablo"];
            $sql = "SHOW FULL COLUMNS FROM  ".$tablo_ad ;
       $vrtb=$db->prepare($sql);
              $vrtb->execute();
             $sutun_sayi = $vrtb->rowCount();
             echo "<input type='hidden' name='tablo_adi' value='".$tablo_ad."' />";
             echo "<input type='hidden' name='sutun_sayi' value='".$sutun_sayi."' />";
              $isle =  $vrtb->fetchAll(PDO::FETCH_ASSOC);
 

if (isset($isle)) {
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
}else if(explode("(",$key["Type"])[0] == "date" || explode("(",$key["Type"])[0] == "time" || explode("(",$key["Type"])[0] == "timestamp"){
echo '<td>   
                 <input type="date" id="' . $ad . '" class="form-control"  name="' . $ad . '" value="" >
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
    </table>';
  }

               ?><button type="submit" name="veriekle" class=" veriekle btn btn-warning pull-right" >Kaydet</button></form>
             <?php } ?>
</div>
<?php
}}} ?>
<!-- MODAL -->


        <!-- /.box-body -->
      </div>
    </div>
  </div>
  <!-- /.box -->
</div>
<!-- /.col -->

<!-- /.row -->
</section>
<!-- /.content -->
</div>

<script type="text/javascript">
 // $("tr td").dblclick(function() {
  //$(this).find("span").css("display","none");  
 // $(this).find(".gizli").css("display","block");  
 // })

    


//$(document).on("click",".veriekle",function(){alert();})
</script>

<script type="text/javascript" src="fonksiyonlar.js"></script>


<?php include 'panel/footer.php'; ?>
