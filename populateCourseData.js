$(document).ready(function () {
	$.ajax({
		type: 'GET',
		url: 'resources/jsons/course_content.json',
		dataType: 'json',
		// crawls json file for menu to place on project page
		// note that this requires jQuery
		success: function (responseData) {
			$.each(responseData.Lectures, function () {
				$('#nav-list').append(
					"<li><a href=''>" + this.Title + "</a></li>"
				);
			});

		}, error: function (msg) {
			alert('There was a problem: ' + msg.status + ' ' + msg.statusText);
		}
	});
});