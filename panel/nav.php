<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
<div style="padding: 20px"></div>
      </div>
      <div class="pull-left info" >
        <p>Bulut Tasarım</p>
        <a href="#"><i class="fa fa-circle text-success"></i> Aktif  </a>
      
      </div>
    </div>
    <!-- search form -->

    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
     


<li>
 <div class="btn-group " style="padding-left: 35px">
                  <button type="button" onclick="yonetici();" class="btn btn-default"><i class="fa fa-database"></i>  Veritabanları</button>
                  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                    <span class="caret"></span>
                    <span class="sr-only">Açılır Menu</span>
                  </button>
                  <ul class="dropdown-menu" role="menu">
                    
<?php
$user = 'root';
$pass = '';
$server = 'localhost';

$dbh = new PDO( "mysql:host=$server", $user, $pass );
$dbs = $dbh->query( 'SHOW DATABASES' );

while( ( $ls = $dbs->fetchColumn( 0 ) ) !== false )
{
     echo '<li><a onclick="vtb('."'".$ls."'".');" href="javascript:(0)"><i class="fa fa-plus"></i>'.$ls." </a></li>";
}
?>

                   
                    
                  </ul>
                </div>
</li>
      <li><a href="./"><i class="fa fa-circle-o text-aqua"></i> <span>Anasayfa</span></a></li>
      
      
      


      
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
