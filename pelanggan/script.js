  <script src="js/freelancer.min.js"></script>
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

    $("#tun").hide();
    $("#kre").hide();
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

    $("#pilih_pay").change(function(){
      var isi = $(this).val();
      if(isi=='t'){
        $("#tun").fadeIn();
        $("#kre").hide();
      } else if(isi=='k'){
        $("#kre").fadeIn();
        $("#tun").hide();
      } else {
        $("#tun").fadeOut();
        $("#kre").fadeOut();
      }
    })

    $("#kredit").change(function(){
      var isi = $(this).val();
      if(isi==''){
        $("#detail").fadeOut();
      } else {
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
        var h_dp = total*(dp/100);
        var h_bunga = (total - h_dp)*(bunga/100)*tenor;
        var h_total = (total-h_dp)+h_bunga;

        $("#h_kre").html($("#kredit").val()+"x");
        $("#h_dp").html(formatRupiah(h_dp.toString())+" ("+dp+"%)");
        $("#bung").html(formatRupiah(h_bunga.toString())+" ("+bunga+"%)");
        $("#tot").html(formatRupiah(h_total.toString()));
        $("#sub").html(formatRupiah((total-h_dp).toString()));
        $("#h_ang").html(formatRupiah((h_total/tenor).toString()));
      }
    })
    $("#dp").change(function(){
      var isi = $(this).val();
      if(isi==''){
        $("#detail").fadeOut();
      } else {
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
        var h_dp = total*(dp/100);
        var h_bunga = (total - h_dp)*(bunga/100)*tenor;
        var h_total = (total-h_dp)+h_bunga;

        $("#h_kre").html($("#kredit").val()+"x");
        $("#h_dp").html(formatRupiah(h_dp.toString())+" ("+dp+"%)");
        $("#bung").html(formatRupiah(h_bunga.toString())+" ("+bunga+"%)");
        $("#tot").html(formatRupiah(h_total.toString()));
        $("#sub").html(formatRupiah((total-h_dp).toString()));
        $("#h_ang").html(formatRupiah((h_total/tenor).toString()));
      }
    })
  </script>
  <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDyEU8awzu_Fs0oAWAZGueEl7VPrpZShn4&callback=initial"></script>
  <script>
    function initial(){
      var properti = {
        center: new google.maps.LatLng(0.563563, 123.053546),
        zoom: 15,
        mapTypeId: google.maps.MapTypeId.ROADMAP
      };
      var peta = new google.maps.Map(document.getElementById("maps"), properti);

      var titik = new google.maps.Marker({
        position: new google.maps.LatLng(0.563563, 123.053546),
        map: peta,
      })
    }
    google.maps.event.addDomListener(window, 'load', initial);
  </script>