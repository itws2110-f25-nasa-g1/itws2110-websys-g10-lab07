<!DOCTYPE html>

<html>

<head>
    <title>Group 10 Lab 7</title>
    <link rel="stylesheet" type="text/css" href="resources/style.css">
    <link rel="icon" type="image/x-icon" href="resources/images/favicon.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Creepster&display=swap" rel="stylesheet">
</head>

<body>
    <header id="main-page-header">
        <div id="header">
            <div class="header_container">
                <div id="header_left">
                    <img src="/resources/images/JOB.png" alt="cynosure" class="logo-img">
                    <a href="/index.php" class="brand-link">Not LMS</a>
                </div>
                <div class="top-nav-list">
                     <button id="reload-button-object">Reload</button>
					</div>
            </div>
        </div>
    </header>

    <container-container>
        <flex-container>
            <!-- Navigation bar -->
            <nav>
							<h2>WebSys Content</h2>
							<ul class="nav-list">
								<?php
									//TO DO: MOVE JSON TO DB AND RETRIEVE FROM THERE
									$str = file_get_contents("./resources/jsons/websys_content.json");
									$json = json_decode($str, true);

									//lecture buttons
									echo "<form action=\"\" method=\"GET\"><ul>";
									for ($i = 0; $i < 14; $i++) {
										if($json['Websys_course']['Lectures'][$i]['Archived']) {
											continue;
										}
										echo "<li><button type=\"submit\" name=\"";
										echo "lecture_num";			//submit button's GET variable
										echo "\" value=\"";
										echo $i;								//value of that GET variable
										echo "\">";
										echo $json['Websys_course']['Lectures'][$i]['Title'];		//text within button
										echo "</button></li>";
									}
									echo "</ul></form>";
									//lab buttons
									echo "<form action=\"\" method=\"GET\"><ul>";
									for ($i = 0; $i < 7; $i++) {
										if($json['Websys_course']['Labs'][$i]['Archived']) {
											continue;
										}
										echo "<li><button type=\"submit\" name=\"";
										echo "lab_num";			//submit button's GET variable
										echo "\" value=\"";
										echo $i;						//value of that GET variable
										echo "\">";
										echo $json['Websys_course']['Labs'][$i]['Title'];		//text within button
										echo "</button></li>";
									}
									echo "</ul></form>";
								?>
							</ul>
            </nav>

            <!-- Main content -->
            <course-content>
                <?php
									if($_SERVER['REQUEST_METHOD'] == 'POST') {
										//archiving logic
										//TO DO: USE JSON_MODIFY TO SET ARCHIVED = TRUE FOR THIS CONTENT
										//OR ALTER $json OBJECT AND THEN RESET THE JSON WITHIN THE DB? WHICHEVER IS EASIER

										echo "\"";
										if(isset($_POST['archive_lecture'])) {
											echo $json['Websys_course']['Lectures'][$_POST["archive_lecture"]]['Title'];
										}
										elseif(isset($_POST['archive_lab'])) {
											echo $json['Websys_course']['Lectures'][$_POST["archive_lab"]]['Title'];
										}
										echo "\" has been successfully archived.";
										// echo "<script>
										// if ( window.history.replaceState ) {
										// 	window.history.replaceState( null, null, window.location.href );
										// }
										// </script>";
									}
									//print out the data of the nth lecture, where n is the value of "lecture_num"
									elseif($_SERVER['REQUEST_METHOD'] == 'GET') {
										//display lecture data if we clicked on a lecture button
										if(isset($_GET['lecture_num'])) {
											echo "<h1>";
											echo $json['Websys_course']['Lectures'][$_GET["lecture_num"]]['Title'];
											echo "</h1><p>";
											echo $json['Websys_course']['Lectures'][$_GET["lecture_num"]]['Description'];
											echo "</p>";

											//archive button
											echo "<form action=\"\" method=\"POST\">";
											echo "<button type=\"submit\" name=\"archive_lecture\" value=\"";
											echo $_GET["lecture_num"];
											echo "\">Archive Lecture</button>";
											echo "</form>";
										}
										//display lab data if we clicked on a lab button
										elseif(isset($_GET['lab_num'])) {
											echo "<h1>";
											echo $json['Websys_course']['Labs'][$_GET["lab_num"]]['Title'];
											echo "</h1><p>";
											echo $json['Websys_course']['Labs'][$_GET["lab_num"]]['Description'];
											echo "</p>";

											//archive button
											echo "<form action=\"\" method=\"POST\">";
											echo "<button type=\"submit\" name=\"archive_lab\" value=\"";
											echo $_GET["lab_num"];
											echo "\">Archive Lab</button>";
											echo "</form>";
										}
										//empty state
										else {
											echo "please select a lab or lecture!";
										}
									}
									// if(isset($_GET["value"])) {
									// 	echo $_GET["value"];
									// }
								?>
            </course-content>
        </flex-container>
    </container-container>

</body>

</html>