<?php 
include "panel/header.php";
include "panel/nav.php";
include "tabloisle.php";
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
tr td input{
  max-width: 130px;
}
tr td select{
  max-width: 100px;
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
      <li><a href="./"><i class="fa fa-dashboard"></i> Anasayfa</a></li>
      <li class="active">Veritabanı Yönetim</li>
    </ol>
  </section>

  <!-- Main content -->



   <section class="content">

 <?php $table = new table();
      $table->get($_GET);
   ?>

     
<div class="modal fade" id="veri-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Veri Yükleme Penceresi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>

      </div>
    </div>
  </div>
</div>



        <div class="row">
          <div class="col-md-12">


           <div class="nav-tabs-custom">
           <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Veritabanı Yönetim</h3>


              </div>





              <div class="box-body">
                
<?php 
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
 ?>


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
<script>
  $(function () {
   $('#example1').DataTable()
   $('#example2').DataTable({
    'paging'      : false,
    'lengthChange': false,
    'searching'   : false,
    'ordering'    : true,
    'info'        : false,
    'autoWidth'   : false
  })
 })
</script>
<script type="text/javascript" src="fonksiyonlar.js"></script>


<?php include 'panel/footer.php'; ?>
