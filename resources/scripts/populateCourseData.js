$(document).ready(function () {
	$.ajax({
		type: 'GET',
		url: 'resources/jsons/course_content.json',
		dataType: 'json',
		// crawls json file for menu to place on project page
		// note that this requires jQuery
		success: function (responseData) {
			$('#nav-list').append(
					"<h4>Lectures</h4>"
			);

			$.each(responseData.Websys_course.Lectures, function () {
				$('#nav-list').append(
					"<li><a href=''>" + this.Title + "</a></li>"
				);
			});

			$('#nav-list').append(
					"<h4>Labs</h4>"
			);

			$.each(responseData.Websys_course.Labs, function () {
				$('#nav-list').append(
					"<li><a href=''>" + this.Title + "</a></li>"
				);
			});

		}, error: function (msg) {
			alert('There was a problem: ' + msg.status + ' ' + msg.statusText);
		}
	});
});