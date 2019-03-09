   function vtb(database) {
   window.location = "baglan.php?vtb="+database;
  }

 function emptytable(tb) {
  var sil = confirm(">"+tb+"< Tablosunu boşaltmak istediğine Eminmisin?");
  var tablo = "tablobosalt=ok&tablo="+tb;
  if(sil){
  $.ajax({
    url:'tabloisle.php',
    data:tablo,
    type:'POST',
    success:function (sc) {
if (sc.trim() == "ok") {
      alert("Tablo Boşaltıldı!");
      location.reload();
    }else{
 alert("Tablo Boşatılmadı!");
};
    }
  });
}
}
 function siltable(tb) {
  var sil = confirm(">"+tb+"< Tablosunu Silmek istediğine Eminmisin?");
  var tablo = "tablosil=ok&tablo="+tb;
  if(sil){
  $.ajax({
    url:'tabloisle.php',
    data:tablo,
    type:'POST',
    success:function (sc) {
if (sc.trim() == "ok") {
      alert("Tablo Silindi!");
      location.reload();
    }else{
 alert("Tablo Silinemedi!");
};
    }
  });
}
}
 function duzenle(tb) {
  var dz = confirm(">"+tb+"< Tablosunu Düzenlemek istediğine Emin misin?");
 "tabloduzenle=ok&tablo="+tb;
  if(dz){
 window.location = "./?tabloduzenle=ok&tablo="+tb;  

}
}


$('#ekletablo').on("click",function(){
    

 var val = $('.sutun_sayi').val();

  
          $.ajax({
    url:'satir.js',
    success:function (sc) {
if (sc) {
i = 0;
   for(i = 0; i < val; i++){
    i++;
  var html = $('#satir-ekle').html();
     $('#satir-ekle').html(html+code); 
   }  

   var yol =  $('#satir-ekle').find('tr input[class=ai]').length;

   for(i = 0; i < yol; i++){    
$('#satir-ekle').find('.ai').eq(i).attr("name","aicrement["+i+"]");//eq ile numaralandırma.
$('#satir-ekle').find('.column_type').eq(i).attr("name","turu["+i+"]");
   
}
    }else{
 alert("Hata!");
};
   return;  }
  });

}); 

$("#tablo_yeni_ad").change(function(){
$("#yeni_ad_kaydet").show();
})
$("#yeni_ad_kaydet").on("click",function(){
 var yeni = $("#tablo_yeni_ad").val();
 var ilk = $("#ilk_ad").val();
 var tablo_ad = "yeni_ad="+yeni+"&ilk_ad="+ilk;
  if (yeni !== ilk) {
 
      $.ajax({
    url:'tabloisle.php',
    data:tablo_ad,
    type:'POST',
    success:function (sc) {
if (sc.trim() == "ok") {
      $("#ilk_ad").val(yeni);
      
   $("#yeni_ad_sc").html("<br/> Yeniden adlandırıldı.");
 setTimeout(500);
 var href = window.location.href.substring(0, window.location.href.indexOf('?'));// url paremetresini ayırma.
 window.location = href+"?tabloduzenle=ok&tablo="+yeni;// url düzenleyip table yönlendirme.
    }else{
   $("#yeni_ad_sc").html("<br/> Yeniden adlandırılamadı. <br/>"+"Hata:"+sc);

};
    }
  });
  }
})
$( document ).on("change",".ai",function()
 {
$(".aiptal").hide();
$(".ai").prop('checked',false);
$(".ai").removeAttr('checked');
$(".ai").val("NONE");
$(this).prop('checked',true);
$(this).val("AUTO_INCREMENT");
$(this).closest("td").append("<a class='aiptal' href='javascript:aiptal()'>iptal</a>");//input  yanına iptal ekleme.
});

function aiptal() {
$(".aiptal").hide();
$(".ai").prop('checked',false);
$(".ai").removeAttr('checked');
$(".ai").val("NONE");
}


$( document ).on("change",".table_index",function (){
var index = $(this).val();
if (index == "PRIMARY") {index = "PRIMARY KEY"}
if(index !== "bos"){
var sutun = $(this).closest("tr").find("button").attr("ad");
var table = $(this).closest("tr").find("button").attr("table");
var islem = "ALTER TABLE `"+table+"` ADD "+index+"(`"+sutun+"`)";
var onay = confirm("Bu işlemi onaylıyor musunuz? > "+islem);}
if (onay) {
  $.ajax({
    url:"tabloisle.php",
    data:{sutunindex:"ok",islem:islem},
    type:"POST",
    dataType:"json",
    success:function(sc){
if (sc.ok) {
$("#json_cevap").html($("#json_cevap").html()+sc.ok);
}else if(sc.no){
$("#json_cevap").html($("#json_cevap").html()+sc.no);
}
    }
  })
}
})

$( document ).on("change",".default_type",function (){

if ($(this).val() == "USER_DEFINED") {
  $(this).next().next().show();
return;
}else if($(this).val() == "NULL"){

$(this).closest("tr").find(".bos").attr("checked", true);// varsayılanı değişince checkbox aktif olur.

}
else{
  $(this).next().next().hide();

}



})
 
 $("#example2").on("click",".button",function (e) {

 if(!$(this).attr("table") == ""){ 
 var yol = $(this).attr("ad"); 
  var sil = confirm(">"+$(this).attr("ad")+"< Satırını Silmek İstediğine Eminmisin?");
  var tablo = "satirsil=ok&tablo="+$(this).attr("table")+"&satir="+$(this).attr("ad");
  if(sil){
  $.ajax({
    url:'tabloisle.php',
    data:tablo,
    type:'POST',
    success:function (sc) {
if (sc.trim() == "ok") {
      
      alert(yol+" Silindi");
   $("#satir-"+yol).remove();
    }else{
 alert("Satır Silinemedi!");
};
    }
  });
}
}else{
  

  e.preventDefault();
            $(this).closest("tr").remove();

}
 });


   var yol =  $('tbody').find('tr input[class=ai]').length;
 
   for(i = 0; i < yol; i++){
 
     
$('tbody').find('.ai').eq(i).attr("name","aicrement["+i+"]");// satır varsa numralandıracak.
$('tbody').find('.column_type').eq(i).attr("name","turu["+i+"]");
 }


  var switchToInput = function () {

       var $input = $("<textarea>", {
            val: $(this).next().val(),
            rows: "3",
            width: "400",
            name:"edit"
        });


        
        $input.addClass("loadNum");
        $(this).replaceWith($input);
             eski =  $(this).text();
             benzersiz = $(this).attr("datafield");
             datatable = $(this).attr("datatable");
             sutun = $(this).attr("sutun");
             
            
        $input.on("blur",switchToSpan);
       
        $input.select();


    };
    var switchToSpan = function () 
    {
      var yeni = $(this).val();

      veri = $(this).closest("tr").find(".silicerik").attr("icerik");
        var $span = $("<span>", {
            text: $(this).val().substring(0,100),
            sutun: sutun,
            datafield: benzersiz,
            datatable: datatable

        });
        
        $span.addClass("loadNum");

        $(this).replaceWith($span);
        
        $span.on("dblclick", switchToInput);
        
       
        $span.on("dblclick",yukle(yeni,eski,benzersiz,datatable,sutun,veri,$span));
       
      
        

    }
    $(".loadNum").on("dblclick",switchToInput);


  function  yukle(yeni,eski,benzersiz,datatable,sutun,veri,$span) {

if(yeni !== eski){

 // var data = "benzersiz="+benzersiz+"&benzersiz_veri="+veri+"&tablo="+datatable+"&sutun="+sutun;
  $.ajax({
    url:"tabloisle.php",
    data:{benzersiz:benzersiz,benzersiz_veri:veri,tablo:datatable,sutun:sutun,yeni:yeni},
    type:"POST",
    dataType:"json",
    success:function(sc){
if (sc.ok) {
  if (sc.ok.length >200) {
    $("#json_cevap").text(sc.ok.substr(0,70)+"[...]"+sc.ok.substr(sc.ok.length-70));
}else{
  $("#json_cevap").text(sc.ok);
} 
$span.next().text(yeni);
}else{if (sc.no.length>200) {$("#json_cevap").text(sc.ok.substr(0,70)+"[...]"+sc.ok.substr(sc.ok.length-70));
}else{
  $("#json_cevap").text(sc.no);
}
}
    }

  })

}}
  
function htmlspecialchars(str) {
  return str.replace('&', '&amp;').replace('"', '&quot;').replace("'", '&#039;').replace('<', '&lt;').replace('>', '&gt;');
}

  var silicerik = function (argument) {
var onay = confirm($(this).attr("data-field")+" Silmek İstediğine Emin misin?");
if (onay) {
         $(this).closest("tr").remove(); 

var data = "iceriksil=ok&icerikbenzersiz="+$(this).attr("data-field")+"&iceriktable="+$(this).attr("data-table")+"&icerik="+$(this).attr("icerik");

    $.ajax({
    url:'tabloisle.php',
    data:data,
    type:'POST',
    success:function (sc) {
if (sc.trim() == "ok") {
        alert("Seçim Silindi!");

    }else{
    alert("Seçim Silinemedi!");
}
    }
  });
}
  }
    var duzenleicerik = function (argument) {
var onay = confirm($(this).attr("data-field")+" Düzenlemek İstediğine Emin misin?");
if (onay) {
      
    $('#modal-info').modal({
        show: 'false'
    }); 

var data = "icerikduzenle=ok&icerikbenzersiz="+$(this).attr("data-field")+"&iceriktable="+$(this).attr("data-table")+"&icerik="+$(this).attr("icerik");

    $.ajax({
    url:'tabloisle.php',
    data:data,
    type:'POST',
    success:function (sc) {
if (sc.trim() == "ok") {
        $(".modal-body").html(sc);

    }else{
    $(".modal-body").html(sc);
}
    }
  });
}
  }

       var ekleicerik = function (argument) {
         $('#modal-info').modal({
        show: 'false'
    }); 
$(".modal-body").html($("#veriekle-container").html());

  } 
 $(".silicerik").on("dblclick",silicerik);
 $(".duzenleicerik").on("click",duzenleicerik);
 $(document).on("click","#verieklebtn",ekleicerik);