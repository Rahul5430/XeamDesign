var originalLength = 3;

$('table#view-more-table tr:lt(' + originalLength + ')').addClass(
	'visible-row'
);
var rowCount = $('table tr').length;

var hidden = true;
var $table = $('table').find('tbody');
$('.view-more-btn').on('click', function (e) {
	e.preventDefault();
	if (hidden) {
		// first on click, it is hidden, so expand
		$table.find('tr:lt(' + rowCount + ')').hide();
		$table.find('tr:lt(' + rowCount + ')').show();
		$(this).html('View less'); //change html
	} else {
		$table.find('tr:lt(' + rowCount + ')').hide();
		$table.find('tr:lt(' + (originalLength - 1) + ')').show();
		$(this).html('View More'); //change html
	}
	hidden = !hidden;
});

$('#view_account').click(() => {
	$('.view-account').toggle(() => {
		console.log($('#view_account').is(':visible'));
		if ($('#view_account').is(':visible')) {
			$('#view_account').addClass('glyphicon-chevron-up');
			$('#view_account').removeClass('glyphicon-chevron-down');
		} else {
			$('#view_account').addClass('glyphicon-chevron-down');
			$('#view_account').removeClass('glyphicon-chevron-up');
		}
	});
});
