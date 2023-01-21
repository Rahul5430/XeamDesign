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
		if ($('.view-account').is(':visible')) {
			$('#view_account').addClass('glyphicon-chevron-up');
			$('#view_account').removeClass('glyphicon-chevron-down');
		} else {
			$('#view_account').addClass('glyphicon-chevron-down');
			$('#view_account').removeClass('glyphicon-chevron-up');
		}
	});
});

(async function () {
	const data = [
		{ month: 'Jan', value: 280 },
		{ month: 'Feb', value: 170 },
		{ month: 'Mar', value: 650 },
		{ month: 'Apr', value: 850 },
		{ month: 'May', value: 650 },
		{ month: 'Jun', value: 280 },
		{ month: 'Jul', value: 100 },
		{ month: 'Aug', value: 230 },
		{ month: 'Sep', value: 950 },
		{ month: 'Oct', value: 250 },
		{ month: 'Nov', value: 450 },
		{ month: 'Dec', value: 300 },
	];

	new Chart(document.getElementById('myfirstchart'), {
		type: 'bar',
		data: {
			labels: data.map((row) => row.month),
			datasets: [
				{
					label: 'Months',
					data: data.map((row) => row.value),
					backgroundColor: '#1976d2',
					borderColor: '#1976d2',
				},
			],
		},
		options: {
			scales: {
				yAxes: [{
					ticks: {
						beginAtZero: true,
						callback: (value, index, values) => {
							return `${value}`;
						},
					},
				}],
			},
			title: {
				display: true,
				text: 'Pre Approval Amount',
				position: 'left',
			},
			legend: {
				position: 'bottom',
			},
		},
	});
})();

(async function () {
	const data = [
		{ month: 'Jan', value: 280 },
		{ month: 'Feb', value: 170 },
		{ month: 'Mar', value: 650 },
		{ month: 'Apr', value: 850 },
		{ month: 'May', value: 650 },
		{ month: 'Jun', value: 280 },
		{ month: 'Jul', value: 100 },
		{ month: 'Aug', value: 230 },
		{ month: 'Sep', value: 950 },
		{ month: 'Oct', value: 250 },
		{ month: 'Nov', value: 450 },
		{ month: 'Dec', value: 300 },
	];

	new Chart(document.getElementById('mysecondchart'), {
		type: 'bar',
		data: {
			labels: data.map((row) => row.month),
			datasets: [
				{
					label: 'Months',
					data: data.map((row) => row.value),
					backgroundColor: '#1976d2',
					borderColor: '#1976d2',
				},
			],
		},
		options: {
			scales: {
				yAxes: [{
					ticks: {
						beginAtZero: true,
						callback: (value, index, values) => {
							return `${value}`;
						},
					},
				}],
			},
			title: {
				display: true,
				text: 'Claim Amount',
				position: 'left',
			},
			legend: {
				position: 'bottom',
			},
		},
	});
})();
