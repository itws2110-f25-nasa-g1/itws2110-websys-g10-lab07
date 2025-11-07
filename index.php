<!DOCTYPE html>

<html>

<head>
    <title>Group 10 Lab 6</title>
    <link rel="stylesheet" type="text/css" href="resources/style.css">
    <link rel="icon" type="image/x-icon" href="resources/images/favicon.png">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <!-- <script src="resources/scripts/populateCourseData.js"></script> -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Creepster&display=swap" rel="stylesheet">
</head>

<body>
    <header id="main-page-header">
        <div id="header">
            <div class="header_container">
                <div id="header_left">
                    <a href="/"><img src="/resources/images/JOB.png" alt="cynosure" class="logo-img"></a>
                    <p class="brand-link">Not LMS</p>
                </div>
                <ul class="nav-list">
                    <li>
                        <button id="reload-button-object">Reload</button>
                    </li>
                </ul>
            </div>
        </div>
    </header>

    <container-container>
        <flex-container>
            <!-- Navigation bar -->
            <nav>
							<h2>WebSys Content</h2>
							<ul id="nav-list">
								<?php
									$str = file_get_contents("./resources/jsons/websys_content.json");
									$json = json_decode($str, true);
									echo "<form action=\"\" method=\"GET\"><ul>";
									for ($i = 0; $i < 14; $i++) {
										echo "<li><button type=\"submit\" name=\"";
										echo "lecture_num";				//submit button's GET variable
										echo "\" value=\"";
										echo $i;						//value of that GET variable
										echo "\">";
										echo $json['Websys_course']['Lectures'][$i]['Title'];		//text within button
										echo "</button></li>";
									}
									echo "</ul></form>";
								?>
							</ul>
            </nav>

            <!-- Main content -->
            <course-content>
                <?php
									if($_SERVER['REQUEST_METHOD'] == "POST") {
										//archiving logic
									}
									//print out the data of the nth lecture, where n is the value of "lecture_num"
									elseif($_SERVER['REQUEST_METHOD'] == 'GET') {
										echo "<h1>";
										echo $json['Websys_course']['Lectures'][$_GET["lecture_num"]]['Title'];
										echo "</h1><p>";
										echo $json['Websys_course']['Lectures'][$_GET["lecture_num"]]['Description'];
										echo "</p>";
										//archive button
										echo "<form action=\"\" method=\"POST\">";
										echo "<button type=\"submit\" name=\"archive\" value=\"";
										echo $_GET["lecture_num"];
										echo "\">Archive</button>";
										echo "</form>";
									} else {
										echo "please select a lab or lecture to display";
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