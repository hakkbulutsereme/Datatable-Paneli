<?php
if (basename($_SERVER['PHP_SELF'])==basename(__FILE__)) {
  exit(' Erişim Engellendi.');
};


 ?> <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      Bulut Tasarım
    </div>
    <!-- Default to the left -->
    <strong>Tüm hakları saklıdır. &copy; 2018</strong>
  </footer>


 
</div>
<script>
  $(function () {
    $('#example1').DataTable();
})


</script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>


<!-- DataTables -->
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>



<!-- Select2 -->
<script src="bower_components/select2/dist/js/select2.full.min.js"></script>



</body>
</html>