$(document).ready(function(){
	$('#keyword').on('keyup',function(){
		$.get('ajax/databarang.php?keyword='+ $('#keyword').val(),function(data){
			$('#container').html(data);

		});
	});
});
//kesalahan di output tabel Tentang