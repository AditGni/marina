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
        $("#gmb").attr('src',"img/bukti pembayaran/"+ada)
        $("#pesan_img").removeClass('alert-danger');
        $("#pesan_img").addClass('alert-warning');
        $("#pesan_img").html("<i class='fa fa-exclamation-circle'></i> Bukti Pengiriman sedang dikonfirmasi oleh admin");
        $("#gambar").fadeOut(200)
      }
    })
  })
</script>