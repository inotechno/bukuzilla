

<script type="text/javascript">
$(document).ready(function() {
	var dataID = [];
	getData();
	function getData() {
		$.ajax({
			url: '<?= site_url('PostingTransaksi/getTransaksi') ?>',
			type: 'POST',
			dataType: 'JSON',
			success:function (data) {
				$('#jumlahData').html(data.length);
				$('#sampai').html(data.length);
				for (let i = 0; i < data.length; i++) {
					dataID[i+1] = data[i].trx_id;
				}
			}
		});
	}

});			
</script>
<script src="<?= site_url('assets/assets/js/argon.js?v=1.1.0') ?>"></script>

</body>
</html>
