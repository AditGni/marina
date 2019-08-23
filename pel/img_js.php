<script type="text/javascript">
  $("#gambar").change(function(){
    var isi = new FormData();
    var nama = $(this).attr('name');
    isi.append(nama, $(this)[0].files[0]);
    $.ajax({
      url: "ajax2.php",
      type: "POST",
      cache: false,
      processData: false,
      contentType: false,
      data: isi,
      success: function(ada){
        
      }
    })
  })
</script>