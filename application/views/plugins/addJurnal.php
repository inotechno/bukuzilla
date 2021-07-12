

<script type="text/javascript">

	$(document).ready(function() {
		selectAccount();

		valueBalance()
		function selectAccount() {
			var accountField = $('#no_account')
			$.ajax({
				url: '<?= base_url("Account/getSelectAccount") ?>',
				type: 'GET',
				dataType: 'JSON',
				success:function (data) {
					var status = '';
					for (var i = 0; i < data.length; i++) {
						if (data[i].status_akun == 'T') {
							status = 'disabled';
						}

						accountField.append('<option class="font-weight-bold" '+status+' data-nama="'+data[i].nama_akun+'" data-no-akun="'+data[i].no_akun+'.'+data[i].sub_no_akun+'" value="'+data[i].id+'">'+data[i].no_akun+'.'+data[i].sub_no_akun+' | '+data[i].nama_akun+'</option>');
					}
				}
			});
		}

		$('#no_account').select2({
			placeholder: "Pilih Akun",
		})

		function reset_form() {
            $('#no_account').val('').trigger('change');
            $('#account_name').val('');
            $('#debit').val('');
            $('#credit').val('');
            $('#description').val('');
        }

        function valueBalance() {
            var total = 0;
            var totaldebit = 0;
            var totalkredit = 0;
            $('#table-list-transaksi tr').each(function() {
                var debit = parseInt($('td', this).eq(2).text());
                if (!isNaN(debit)) {
                    totaldebit += debit;
                }
            });

            $('#table-list-transaksi tr').each(function() {
                var kredit = parseInt($('td', this).eq(3).text());
                if (!isNaN(kredit)) {
                    totalkredit += kredit;
                }
            });

            total = totaldebit - totalkredit;    

            if (totaldebit == totalkredit) {
                if (totaldebit != 0 && totalkredit != 0) {
                    $('#jumlahDebit').removeClass('text-danger');
                    $('#jumlahDebit').addClass('text-success');
                    $('#jumlahKredit').removeClass('text-danger');
                    $('#jumlahKredit').addClass('text-success');
                }
            }else{
                $('#jumlahDebit').removeClass('text-success');
                $('#jumlahDebit').addClass('text-danger');
                $('#jumlahKredit').removeClass('text-success');
                $('#jumlahKredit').addClass('text-danger');
            }

            $('#jumlahDebit').html(totaldebit);
            $('#jumlahKredit').html(totalkredit);

            return false;   
        }

        function validasiNoVoucher(no_voucher) {
        	$.ajax({
        		url: '<?= base_url('TransaksiJurnal/validasiNoVoucher') ?>',
        		type: 'POST',
        		dataType: 'JSON',
        		data:{no_voucher:no_voucher},
        		success:function (response) {
        			$.notify({
	                    icon: 'ni ni-bell-55',
	                    message:response.message
	                },{
	                    type:response.type,
	                    z_index:2000,
	                    placement: {
	                      from: "top",
	                      align: "right"
	                },
	                    animate: {
	                      enter: 'animated fadeInDown',
	                      exit: 'animated fadeOutUp'
	                 	}
	                });

	                if (response.type == 'danger') {
	                	$('[name="no_voucher"]').val('');
	                }
        		}
        	});
        	
        	return false;
        }

        $('[name="no_voucher"]').change(function() {
        	validasiNoVoucher($(this).val());
        });

		$('#no_account').on('change', function() {
			$('#account_name').val($('#no_account option:selected').attr('data-nama'));
		});

		$('#credit').on('change',function() {
			if ($('#debit').val() != 0) {
				$('#debit').val('');
			}
		});

		$('#debit').on('change',function() {
			if ($('#credit').val() != 0) {
				$('#credit').val('');
			}
		});

		$('#btn-addRowTransaksi').on('click', function() {
			var jumlahRow = parseInt($('[name="jumlah"]').val());
            jumlahRow = isNaN(jumlahRow) ? 0 : jumlahRow;
            var nextData = jumlahRow + 1;

            var no_akun = $('#no_account').val();
            var no_akun_text = $('#no_account option:selected').attr('data-no-akun');
            var nama_akun = $('#account_name').val();
            var debit = $('#debit').val();
            var kredit = $('#credit').val();
            var deskripsi = $('#description').val();

            if ($('#no_account').val() == '') {
                return false;
            }else if ($('#account_name').val() == '') {
                return false;
            }else if ($('#debit').val() == '' && $('#credit').val() == '') {
                $(this).focus();
                return false;
            }else if ($('#description').val() == '') {
                $(this).focus();
                return false;
            }else{
                $('#table-list-transaksi').append(
                    '<tr id="data'+nextData+'">'+
                        '<td class="text-center">'+
                            no_akun_text+
                            '<input type="hidden" name="trx_id_account[]" placeholder="Nomor Akun" value="'+no_akun+'">'+
                        '</td>'+
                        '<td class="text-center">'+
                            nama_akun +
                            '<input type="hidden" name="nama_akun[]" value="'+nama_akun+'">'+
                        '</td>'+
                        '<td class="text-center">'+
                            debit +
                            '<input type="hidden" name="trx_debit[]" value="'+debit+'" class="valueDebit">'+
                        '</td>'+
                        '<td class="text-center">'+
                            kredit + 
                            '<input type="hidden" name="trx_kredit[]" value="'+kredit+'" class="valueKredit">'+
                        '</td>'+
                        '<td class="text-center">'+
                            deskripsi +
                            '<input type="hidden" name="trx_description[]" value="'+deskripsi+'">'+
                        '</td>'+
                        '<td class="text-center">'+
                            '<div class="btn-group btn-group">'+
                                '<a href="#" class="btn btn-sm btn-info btn-edit-trx" data-row="data'+nextData+'" data-no-akun="'+no_akun+'" data-nama="'+nama_akun+'" data-debit="'+debit+'" data-kredit="'+kredit+'" data-deskripsi="'+deskripsi+'"><i class="ni ni-settings"></i></a>'+
                                '<a href="#" data-row="data'+nextData+'"" class="btn btn-sm btn-danger btn-delete-trx"><span class="fa fa-times"></span></a>'+
                            '</div>'+
                        '</td>'+
                    '</tr>');

                $('[name="jumlah"]').val(nextData);

                reset_form(); 
                valueBalance(); 
            }

            return false;
		});

		$('#table-input-jurnal').on('click', '.edit-trx', function() {

            var data_ke = $(this).attr('data_ke');
            var no_akun = $(this).attr('data-akun');
            var no_akun_text = $('#no_account option:selected').attr('data-no-akun');
            var nama = $(this).attr('data-nama');
            var debit = $(this).attr('data-debit');
            var kredit = $(this).attr('data-kredit');
            var deskripsi = $(this).attr('data-deskripsi');

            if ($('#no_account').val() == '') {
                return false;
            }else if ($('#account_name').val() == '') {
                return false;
            }else if ($('#debit').val() == '' && $('#credit').val() == '') {
                $(this).focus();
                return false;
            }else if ($('#description').val() == '') {
                $(this).focus();
                return false;
            }else{
                $('#table-list-transaksi').append(
                    '<tr id="'+data_ke+'">'+
                        '<td class="text-center">'+
                            no_akun+
                            '<input type="hidden" name="trx_id_account[]" placeholder="Nomor Akun" value="'+no_akun+'">'+
                        '</td>'+
                        '<td class="text-center">'+
                            nama +
                            '<input type="hidden" name="nama_akun[]" value="'+nama+'">'+
                        '</td>'+
                        '<td class="text-center">'+
                            debit +
                            '<input type="hidden" name="trx_debit[]" value="'+debit+'" class="valueDebit">'+
                        '</td>'+
                        '<td class="text-center">'+
                            kredit + 
                            '<input type="hidden" name="trx_kredit[]" value="'+kredit+'" class="valueKredit">'+
                        '</td>'+
                        '<td class="text-center">'+
                            deskripsi +
                            '<input type="hidden" name="trx_description[]" value="'+deskripsi+'">'+
                        '</td>'+
                        '<td class="text-center">'+
                            '<div class="btn-group btn-group">'+
                                '<a href="#" class="btn btn-sm btn-info btn-edit-trx" data-row="'+data_ke+'" data-no-akun="'+no_akun+'" data-nama="'+nama+'" data-debit="'+debit+'" data-kredit="'+kredit+'" data-deskripsi="'+deskripsi+'"><i class="fa fa-pencil"></i></a>'+
                                '<a href="#" data-row="data'+nextData+'" class="btn btn-sm btn-danger btn-delete-trx"><span class="fa fa-times"></span></a>'+
                            '</div>'+
                        '</td>'+
                    '</tr>');

                $(this).removeAttr('data_ke');

                reset_form();  
            }

            return false;
        });

        $('#table-list-transaksi').on('click', '.btn-edit-trx', function() {
            var data_ke = $(this).attr('data-row');
            var no_akun = $(this).attr('data-no-akun');
            var nama = $(this).attr('data-nama');
            var debit = $(this).attr('data-debit');
            var kredit = $(this).attr('data-kredit');
            var deskripsi = $(this).attr('data-deskripsi');

            $('#no_account').val(no_akun).trigger('change');
            $('#account_name').val(nama);
            $('#debit').val(debit);
            $('#credit').val(kredit);
            $('#description').val(deskripsi);

            $('#addRowTransaksi').removeProp('id');
            $('#addRowTransaksi').attr('id', 'updateRowTransaksi');

            $('#'+data_ke).remove();
            return false;
        });

        $('#table-list-transaksi').on('click', '.btn-delete-trx', function() {
            var id_row = $(this).attr('data-row');
            $('#'+id_row).remove();
            valueBalance();
        });

        $('#form-addTransaksi').submit(function() {
            var data = $(this).serialize();
            $.ajax({
                url: '<?= base_url('TransaksiJurnal/addTransaksi') ?>',
                type: 'POST',
                dataType: 'JSON',
                data: data,
                success:function (response) {
                    $.notify({
	                    icon: 'ni ni-bell-55',
	                    message:response.message
	                },{
	                    type:response.type,
	                    z_index:2000,
	                    placement: {
	                      from: "top",
	                      align: "right"
	                },
	                    animate: {
	                      enter: 'animated fadeInDown',
	                      exit: 'animated fadeOutUp'
	                 	}
	                });

	                window.location.reload();
                }

            });

            return false;
            
        });

	});			
</script>
<script src="<?= site_url('assets/assets/vendor/datatables.net/js/jquery.dataTables.min.js') ?>"></script>
<script src="<?= site_url('assets/assets/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js') ?>"></script>
<script src="<?= site_url('assets/assets/vendor/datatables.net-responsive-bs4/js/dataTables.responsive.min.js') ?>"></script>
<script src="<?= site_url('assets/assets/vendor/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') ?>"></script>
<script src="<?= site_url('assets/assets/vendor/select2/dist/js/select2.min.js') ?>"></script>
<script src="https://cdn.datatables.net/fixedcolumns/3.3.3/js/dataTables.fixedColumns.min.js"></script>
<script src="<?= site_url('assets/assets/vendor/select2/dist/js/select2.min.js') ?>"></script>
<script src="<?= site_url('assets/assets/vendor/maskedinput/jquery.maskedinput.min.js') ?>"></script>
<script src="<?= site_url('assets/assets/js/argon.js?v=1.1.0') ?>"></script>

</body>
</html>