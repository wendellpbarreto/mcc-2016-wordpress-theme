$(function() {
	$(document).on('click', '[data-toggle=modal]', function(event) {
		event.preventDefault();

		var $this = $(this);
		var $target = $($this.attr('data-target'));

		if ($target.length) {
			$target.show();
		}
	});

	$(document).on('click', '.close-modal', function(event) {
		event.preventDefault();

		var $this = $(this);
		var $target = $this.closest('.modal');

		if ($target.length) {
			$target.hide();
		}
	});
});
