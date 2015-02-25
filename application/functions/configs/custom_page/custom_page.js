jQuery(document).ready(function($) {
	$('.custom-page__upload-button').click(function(e) {
		e.preventDefault();

		var box = $(this).parent('.custom-page__images-box');
		var boxCrops = $(this).parent('.custom-page__images-box').find('.custom-page__images-box-crops');
		var input = $(this).parent('.custom-page__images-box').find('input');
		var multiple = box.attr('data-multiple');

		var custom_uploader = wp.media({
			title: 'Imagens',
			button: {
				text: 'Carregar'
			},
			multiple: multiple  // Set this to true to allow multiple files to be selected
		}).on('select', function() {
			var attachments = custom_uploader.state().get('selection').toJSON();
			boxCrops.html('');
			if (multiple) {
				input.val('');
				for (i = 0; i < attachments.length; i++){
					var url = attachments[i].url;
					boxCrops.append( '<img src='+ url +' width="300">' );
					input.val( input.val() + ',' + url );
				}
			} else {
				input.val( attachments[0].url );
			}
		}).open();
	});
});
