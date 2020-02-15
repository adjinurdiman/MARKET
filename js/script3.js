$(document).ready(function(){
	$('#keyword').on('keyup',function(){
		$.get('ajax/databarang.php?keyword='+ $('#keyword').val(),function(data){
			$('#container').html(data);
			$('#tbl1').hide();
			$('#tbl2').hide();
		});
	});
});