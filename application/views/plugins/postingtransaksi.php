
<script src="https://js.pusher.com/4.4/pusher.min.js"></script>

<script type="text/javascript">
$(document).ready(function() {
	$('#progress').hide();
	$('.selesai').hide();
	var percentBar = 0;
	$('.progress-bar').css('width', percentBar+'%'); 
	// Pusher
	
	Pusher.logToConsole = true;

	var pusher = new Pusher('77dcc346fc9dd134feb0', {
		cluster: 'ap1',
		forceTLS: true
	});

	var channel = pusher.subscribe('GeneralLedger');
	channel.bind('postTransaksi', function(data) {
		if(data.message === 'success'){
			percentage(data.dataKe);
		}
	});	

	function percentage(dataKe) {
		var percentage = 100 / parseInt($('#sampai').html());
		percentBar = percentBar + percentage;
		$('.progress-bar').css('width', percentBar+'%');

		$('#dari').html(parseInt(dataKe));

		$('.totalPost').html(parseInt(dataKe));
	}
	
	function postTransaksi() {
		$.ajax({
			type: "POST",
			url: "<?= site_url('PostingTransaksi/postTransaksi') ?>",
		});
	}

	$('#btnPosting').click(function () {
		$('#progress').show();
		$('.selesai').show();

		postTransaksi();
		$(this).hide();
	})

	getData();
	function getData() {
		$.ajax({
			url: '<?= site_url('PostingTransaksi/getTransaksi') ?>',
			type: 'POST',
			dataType: 'JSON',
			success:function (data) {
				$('#jumlahData').html(data.length);
				$('#sampai').html(data.length);
			}
		});
	}

});			
</script>
<script src="<?= site_url('assets/assets/js/argon.js?v=1.1.0') ?>"></script>
</body>
</html>
