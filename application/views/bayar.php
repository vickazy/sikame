<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<script src="<?php echo base_url() ?>assets/js/jquery-2.1.4.min.js"></script>
	<script type="text/javascript">
	    $(document).ready(function() {
	        $('#bayar').keyup(function(){
	        var total=parseInt($('#total').val());
	        var bayar=parseInt($('#bayar').val());

	        var total_bayar=bayar-total;
	        if (total > bayar) {
	        	$('#kembali').val("Uang Kurang");
	        } else if(bayar == ""){
	        	$('#kembali').val("Masukkan Jumlah Bayar");
	        } else {
				$('#kembali').val(total_bayar);
	        }
	        });
	    });
    </script>
</head>
<body>
	<form action="">
		<label for="total">Total</label>
		<input type="text" id="total" name="total">
		<label for="bayar">Bayar</label>
		<input type="text" id="bayar" name="bayar">
		<label for="kembali">Kembali</label>
		<input type="text" id="kembali" name="kembali">
	</form>
</body>
</html>