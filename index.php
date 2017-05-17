<?php
//database details for connection
$servername = "213.171.200.80";
$username = "admin_website";
$password = "K632j@fa&fq221";
$dbname = "website";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
//Query to get all comments and order them by date
$sql = "SELECT * FROM comments ORDER BY comment_date DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

		$comment_id = $row["comment_id"];
		$section_id = $row["section_id"];
		$name = $row["name"];
		$comment = nl2br($row["comment"]);
		//Add each comment to a variable specific to each section
		switch ($section_id) {
		    case 1:
				$section_1_comments .= '<div id="comment_'.$comment_id.'" class="comment">
											<h4>'.$name.'</h4>
											<p>'.$comment.'</p>
											<div class="edit">
												<button data-commentid="'.$comment_id.'" type="button" class="editOpenModal rounded">EDIT</button>
												<button data-commentid="'.$comment_id.'" type="button" class="delete rounded">DELETE</button>
											</div>
										</div>';
		        break;
		    case 2:
				$section_2_comments .= '<div id="comment_'.$comment_id.'" class="comment">
											<h4>'.$name.'</h4>
											<p>'.$comment.'</p>
											<div class="edit">
												<button data-commentid="'.$comment_id.'" type="button" class="editOpenModal rounded">EDIT</button>
												<button data-commentid="'.$comment_id.'" type="button" class="delete rounded">DELETE</button>
											</div>
										</div>';
		        break;
		    case 3:
				$section_3_comments .= '<div id="comment_'.$comment_id.'" class="comment">
											<h4>'.$name.'</h4>
											<p>'.$comment.'</p>
											<div class="edit">
												<button data-commentid="'.$comment_id.'" type="button" class="editOpenModal rounded">EDIT</button>
												<button data-commentid="'.$comment_id.'" type="button" class="delete rounded">DELETE</button>
											</div>
										</div>';
		        break;
			case 4:
				$section_4_comments .= '<div id="comment_'.$comment_id.'" class="comment">
											<h4>'.$name.'</h4>
											<p>'.$comment.'</p>
											<div class="edit">
												<button data-commentid="'.$comment_id.'" type="button" class="editOpenModal rounded">EDIT</button>
												<button data-commentid="'.$comment_id.'" type="button" class="delete rounded">DELETE</button>
											</div>
										</div>';
		        break;
		}
    }
} else {
    echo "0 results";
}
//Query to get the thumbs up data for each section
$sql_thumbs = "SELECT * FROM sections";
$result_thumbs = $conn->query($sql_thumbs);

if ($result_thumbs->num_rows > 0) {
    // output data of each row
    while($row = $result_thumbs->fetch_assoc()) {

		$section_id = $row['section_id'];
		//Add the thumbs count to a variable specific for each section
		switch ($section_id) {
			case 1:
				$section_1_thumbs = $row['thumbs'];
				break;
			case 2:
				$section_2_thumbs = $row['thumbs'];
				break;
			case 3:
				$section_3_thumbs = $row['thumbs'];
				break;
			case 4:
				$section_4_thumbs = $row['thumbs'];
				break;
		}
	}
}else {
    echo "0 results";
}
$conn->close();

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="Victor Alexandru">
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		<header>
			<div class="wrapper">
				<div class="logo">
					<div class="col-20">
						<img src="images/logo.png" alt="logo">
					</div>
					<div class="col-80">
						<h1>WEB<br> DESIGN<br> BLOG</h1>
					</div>
				</div>
				<div class="logo_mobile">
					<img src="images/logo_mob.jpg" alt="logo">
				</div>
			</div>
		</header>
		<!-- Section 1 -->
		<div id="section_1" class="section_grey">
			<div class="wrapper">
				<div class="col-20">
					<div class="thumbs_wrapper">
						<div class="thumbs up white"></div>
						<div class="counter">
							<span data-thumbs="1" class="thumbs_counter"> <?=$section_1_thumbs?> </span>
						</div>
						<div class="thumbs down white"></div>
					</div>
				</div>
				<div class="col-80">
					<h3>Heading One</h3>
					<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.
					<br>Lorem ipsum dolor sit amet, cons ectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.
					<br>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio digniss </P>
					<button data-sectionid="1" type="button" class="openModal rounded">COMMENT</button>
					<div class="comments">
						<?=$section_1_comments?>
					</div>
				</div>
			</div>
		</div>
		<!-- Section 1 end -->

		<!-- Section 2 -->
		<div id="section_2" class="section_red">
			<div class="wrapper">
				<div class="col-20">
					<div class="thumbs_wrapper">
						<div class="thumbs up red"></div>
						<div class="counter">
							<span data-thumbs="2" class="thumbs_counter"> <?=$section_2_thumbs?> </span>
						</div>
						<div class="thumbs down red"></div>
					</div>
				</div>
				<div class="col-80">
					<h3>Heading Two</h3>
					<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.
					<br>Lorem ipsum dolor sit amet, cons ectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.
					<br>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio digniss </P>
					<button data-sectionid="2" type="button" class="openModal rounded">COMMENT</button>
					<div class="comments">
						<?=$section_2_comments?>
					</div>
				</div>
			</div>
		</div>
		<!-- Section 2 end -->

		<!-- Section 3 -->
		<div id="section_3" class="section_grey">
			<div class="wrapper">
				<div class="col-20">
					<div class="thumbs_wrapper">
						<div class="thumbs up white"></div>
						<div class="counter">
							<span data-thumbs="3" class="thumbs_counter"> <?=$section_3_thumbs?> </span>
						</div>
						<div class="thumbs down white"></div>
					</div>
				</div>
				<div class="col-80">
					<h3>Heading Three</h3>
					<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.
					<br>Lorem ipsum dolor sit amet, cons ectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.
					<br>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio digniss </P>
					<button data-sectionid="3" type="button" class="openModal rounded">COMMENT</button>
					<div class="comments">
						<?=$section_3_comments?>
					</div>
				</div>
			</div>
		</div>
		<!-- Section 3 end -->

		<!-- Section 4 -->
		<div id="section_4" class="section_red">
			<div class="wrapper">
				<div class="col-20">
					<div class="thumbs_wrapper">
						<div class="thumbs up red"></div>
						<div class="counter">
							<span data-thumbs="4" class="thumbs_counter"> <?=$section_4_thumbs?> </span>
						</div>
						<div class="thumbs down red"></div>
					</div>
				</div>
				<div class="col-80">
					<h3>Heading Four</h3>
					<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.
					<br>Lorem ipsum dolor sit amet, cons ectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.
					<br>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio digniss </P>
					<button data-sectionid="4" type="button" class="openModal rounded">COMMENT</button>
					<div class="comments">
						<?=$section_4_comments?>
					</div>
				</div>
			</div>
		</div>
		<!-- Section 4 end -->

		<!-- Modal -->
		<div id="myModal" class="modal">

			<!-- Modal content -->
			<div class="modal-content">
			<!-- Close button -->
			<span class="close">&times;</span>
				<form id="comment_form">
					<div id="required_warning" class="warning" style="display:none;">Please fill in the required fields.</div>
					<h2>Add comment</h2>
					<input type="hidden" id="comment_id" name="comment_id">
					<input type="hidden" id="section" name="section">
					<label for="name">Your name*</label><br>
					<input type="text" class="required" id="name" name="name"><br>
					<label for="comment">Your comment*</label><br>
					<textarea id="comment" class="required" name="comment"></textarea>
					<div id="count"></div>
					<input id="save" type="submit" value="Save">
				</form>
			</div>

		</div>

		<footer>
			<div class="wrapper">
				<div class="col-20"></div>
				<div class="col-80">
					<p>Copyright <?= date('Y'); ?></p>
				</div>
			</div>
		</footer>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script type='text/javascript' src="scripts.js"></script>
		<script>

		</script>
    </body>
</html>
