<script type="text/javascript">
	$(document).ready(function() {
		getTotal();
		function getTotal() {
			$.ajax({
				url: '<?= site_url('Dashboard/getTotal') ?>',
				type: 'GET',
				dataType: 'JSON',
				success:function (data) {
					console.log(data);
					$('.totalJurnal').html(data.totalJurnal);
					$('.totalTransaksi').html(data.totalTransaksi);
					$('.totalUsers').html(data.totalUsers);
					$('.totalAccount').html(data.totalAccount);
				}
			});
			
		}
	});
</script>
<script src="<?= site_url('assets/assets/js/argon.js?v=1.1.0') ?>"></script>
</body>
</html>