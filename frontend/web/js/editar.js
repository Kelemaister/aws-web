$(function(){
	$(document).on('click', '.muestraModal', function(e){
		if ($('#modal').data('bs.modal').isShown) {
			$('#modal').find('#modalContent')
				.load($(this).attr('value'));
		}else{
			$('#modal').modal('show')
				.find('#modalContent')
				.load($(this).attr('value'));
		}
	});
});