<script type="text/javascript">
    function formatRupiah(angka, prefix= 'Rp.'){
      var number_string = angka.replace(/[^,\d]/g, '').toString(),
      split       = number_string.split(','),
      sisa        = split[0].length % 3,
      rupiah        = split[0].substr(0, sisa),
      ribuan        = split[0].substr(sisa).match(/\d{3}/gi);
 
      // tambahkan titik jika yang di input sudah menjadi angka ribuan
      if(ribuan){
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
      }
 
      rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
      return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
      // return rupiah;
    }

    // sembunyikan
    $("#pesan").hide();
    $("#detail").hide();
    $("#byr").hide();
    $("#tun").hide();
    $("#kre").hide();
    $("#pesan_tunai").hide()
    $(".ker").click(function(){
      var i = $(this).attr('alt');
      var k = $(this).text();
      $.ajax({
        url: "ajax.php",
        type: "POST",
        data: "mod=in_car&id="+i,
        success: function(dat){
          if(k=='Beli'){
            window.location = "?page=keranjang";
          }
        }
      })
      $.ajax({
        url: "ajax.php",
        type: "POST",
        data: "mod=cek_jumlah_cart",
        success: function(dat){
          $("#menu_cart").html("Keranjang "+dat);
        }
      })
    })

    $(".del_cart").click(function(){
      var id = $(this).attr('alt');
      if(confirm('Yakin ingin dihapus?')){
        $.ajax({
          url: "ajax.php",
          type: "POST",
          data: "mod=del_cart&id="+id,
          success: function(ada){
            window.location = "?page=keranjang"
          }
        })
      }
    })

    $("#pilih_pay").change(function(){
      var isi = $(this).val();
      var item = $("#item").html();
      if(isi=='t'){
        $("#kre").hide();
        $("#detail").hide();
        $("#byr").show()
      } else if(isi=='k'){
          if(item > 2){
            alert("Jenis pembayaran kredit hanya berlaku untuk pembelian 2 barang atau jumlah");
          } else {
            $("#kre").fadeIn();
            $("#tun").hide();
            $("#byr").hide(); 
          }
      } else {
        $("#tun").fadeOut();
        $("#kre").fadeOut();
        $("#detail").hide();
        $("#byr").hide()
      }
    })

    $("#kredit").change(function(){
      var isi = $(this).val();
      if(isi=='' || $("#dp").val()==''){
        $("#detail").fadeOut();
        $("#byr").fadeOut();
      } else {
        $("#byr").fadeIn();
        $("#detail").fadeIn();
        var tenor = $("#kredit").val();
        var dp = $("#dp").val();
        var bunga;
        if(tenor==3){
          bunga = 2.5;
        } else if(tenor==6){
          bunga = 5;
        } else if(tenor==12){
          bunga = 8;
        }
        var total = $("#total").attr('alt');
        var h_dp = Math.round(total*(dp/100));
        var h_bunga = Math.round((total - h_dp)*(bunga/100)*tenor);
        var h_total = Math.round((total-h_dp)+h_bunga);

        $("#h_kre").attr('alt',$("#kredit").val());
        $("#h_dp").attr('alt', h_dp);
        $("#bung").attr('alt', h_bunga);
        $("#sub").attr('alt', (total-h_dp));
        $("#tot").attr('alt', h_total);
        $("#h_ang").attr('alt', (Math.round(h_total/tenor)));
        $("#b_bunga").val(bunga)

        $("#h_kre").html($("#kredit").val()+"x");
        $("#h_dp").html(formatRupiah(h_dp.toString())+" ("+dp+"%)");
        $("#bung").html(formatRupiah(h_bunga.toString())+" ("+bunga+"%)");
        $("#tot").html(formatRupiah(h_total.toString()));
        $("#sub").html(formatRupiah((total-h_dp).toString()));
        $("#h_ang").html(formatRupiah(Math.round(h_total/tenor).toString()));
      }
    })
    $("#dp").change(function(){
      var isi = $(this).val();
      if(isi=='' || $("#kredit").val()==''){
        $("#detail").fadeOut();
        $("#byr").hide()
      } else {
        $("#detail").fadeIn();
        $("#byr").fadeIn()
        var tenor = $("#kredit").val();
        var dp = $("#dp").val();
        var bunga;
        if(tenor==3){
          bunga = 2.5;
        } else if(tenor==6){
          bunga = 5;
        } else if(tenor==12){
          bunga = 8;
        }
        var total = $("#total").attr('alt');
        var h_dp = Math.round(total*(dp/100));
        var h_bunga = Math.round((total - h_dp)*(bunga/100)*tenor);
        var h_total = Math.round((total-h_dp)+h_bunga);

        $("#h_kre").attr('alt',$("#kredit").val());
        $("#h_dp").attr('alt', h_dp);
        $("#bung").attr('alt', h_bunga);
        $("#sub").attr('alt', (total-h_dp));
        $("#tot").attr('alt', h_total);
        $("#h_ang").attr('alt', (Math.round(h_total/tenor)));
        $("#b_bunga").val(bunga)

        $("#h_kre").html($("#kredit").val()+"x");
        $("#h_dp").html(formatRupiah(h_dp.toString())+" ("+dp+"%)");
        $("#bung").html(formatRupiah(h_bunga.toString())+" ("+bunga+"%)");
        $("#tot").html(formatRupiah(h_total.toString()));
        $("#sub").html(formatRupiah((total-h_dp).toString()));
        $("#h_ang").html(formatRupiah(Math.round(h_total/tenor).toString()));
      }
    })

    $("#byr").click(function(){
      if(confirm("Lanjutkan ke pembayaran?")){
        var isi = $("#pilih_pay").val()
        var item = $("#item").attr('alt');
        var lama = $("#h_kre").attr('alt');
        var dp = $("#h_dp").attr('alt');
        var bunga = $("#bung").attr('alt');
        var bb = $("#b_bunga").val();
        var tot_kotor = $("#sub").attr('alt');
        var tot_bersih = $("#tot").attr('alt'); 
        var ang = $("#h_ang").attr('alt');
        // alert(item+" "+lama+" "+dp+" "+bunga+" "+tot_kotor+" "+tot_bersih+" "+ang);
        $.ajax({
          url: "ajax.php",
          type: "POST",
          data: "isi="+isi+"&item="+item+"&lama="+lama+"&dp="+dp+"&bunga="+bunga+"&bb="+bb+"&tot_kotor="+tot_kotor+"&tot_bersih="+tot_bersih+"&angsur="+ang+"&mod=in_pen",
          success: function(ada){
            window.location = "?page=keranjang"
          }
        })
      }
    })

    $.ajax({
      url: "ajax_notif.php",
      type: "POST",
      data: "hal=view",
      success: function(ada){
        $("#notif").html(ada)
      }
    })
  </script>