<!-- -- contributed by:
	-- Name: Ishan Bhatia
	-- Banner Number: B00835259
	-- Implemented the front end layout for the main feed and the micro-blogs  -->

<?php

	session_start();
	require_once "includes/header.php";
	require_once "includes/db.php";

?>

<main class="main-page-body">

<div class="container">
	<div class="row row-content">

		<!-- 
				-- contributed by:
				-- Name: Dhairy Raval
				-- Banner Number: B00845519
				-- Implemented the functionality to see the tweets and retweets from the people you follow 
				-- User Story: 4

				-- Name: Arjun Banga
				-- Banner Number: B00852696
				--  Implemented the functionality to display a list of all the users that follow the active user
				-- User Story: 7

				-- Name: Miftahul Kashfy
				-- Banner Number: B00850212
				-- Implemented the functionality to search the tweets and retweets based on person's name or twitter handle 
				-- Implemented the functionality of posting a tweet
				-- User Story: 5
				-- User Story: 8

			-->


		<div class="col-md-2 left-col-content">
			<div class="upper-content text-center">	
				<img src="https://images.pexels.com/photos/1081685/pexels-photo-1081685.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="">
				<h5 class="text-center pt-3">
					<?php
						echo $_SESSION['firstname'] . " " . $_SESSION['lastname'];
					?>
				</h5>
				<p class="text-muted text-center">
					@<?php
						echo $_SESSION['handle'];
					?>
				</p>

				<hr>

				<div class="text-center">
					<a href="" class="font-weight-bold text-decoration-none text-center">
						Visit My Profile
					</a>
				</div>

				<hr>
				
			</div>

			<div class="left-list">
				<h3 class="text-center">Quick Links</h3>
				
				<ul class="list-group list-group-flush">
				  <li class="list-group-item"><a href="#" class="text-decoration-none text-dark">Friends</a></li>
				  <li class="list-group-item"><a href="#" class="text-decoration-none text-dark">Groups</a></li>
				  <li class="list-group-item"><a href="#" class="text-decoration-none text-dark">Events</a></li>
				  <li class="list-group-item"><a href="#" class="text-decoration-none text-dark">Saved</a></li>
				  <li class="list-group-item"><a href="#" class="text-decoration-none text-dark">See More</a></li>
				</ul>
			</div>


		</div>


		<div class="col-md-7 scroll-overflow">
			<?php
			/*
				This code to implement posting a tweet and showing appropriate message
				modification from my submission for Assignment 3 in CSCI 2170 (Winter 2021).
					
				Miftahul Kashfy Assignment 3: CSCI 2170 (Winter 2021), Faculty of Computer Science,
				Dalhousie University. Available online on Gitlab at [URL]:
				https://git.cs.dal.ca/courses/2021-winter/csci-2170/a3/kashfy
				Date accessed: April 1st 2021
			*/
				// if post is posted successfully, give a message to the user, that it was posted successfully
				if (isset($_GET['tweep-success'])) {
					echo "<h4 style='color:MediumSlateBlue; padding: 10px 50px;'>Your tweep was posted successfully!<br></h4>";
				}
			?>


			<div class="mainfeedcenter">


				<div class="d-flex justify-content-around">
					<div class="uploadSection">
						
						<a href="#" class="text-dark text-decoration-none"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> &nbsp; Write a tweep</a>
					</div>

					<div class="uploadSection">
						
						<a href="#" class="text-dark text-decoration-none"><i class="fa fa-long-arrow-up" aria-hidden="true"></i> &nbsp; Upload a photo</a>
					</div>


					<div class="uploadSection">
						
						<a href="#" class="text-dark text-decoration-none"><i class="fa fa-book" aria-hidden="true"></i>&nbsp;  Share</a>
					</div>
				</div>

				<hr>
				<form method="post" action="includes/process-tweep.php">
				    <textarea name="tweepText" id="" cols="3" rows="3" class="form-control" placeholder="Write A Tweep...." ></textarea>
				    <input class="btn btn-primary post-button" value = "Submit" type="submit" name="">
			    </form>

			</div>

			<div class="main-post-container" id = "posts">

			<!-- 
				-- contributed by:
				-- Name: Dhairy Raval
				-- Banner Number: B00845519
				-- Implemented the functionality to see the tweets and retweets from the people you follow 
				-- User Story: 4

				-- Name: Miftahul Kashfy
				-- Banner Number: B00850212
				-- Implemented the functionality to search the tweets and retweets based on person's name or twitter handle 
				-- Implemented the functionality of posting a tweet
				-- User Story: 5
				-- User Story: 8

			-->

			
	        <?php 
	        /*
				Searching tweets based on person's name or twitter handle
				modification from my submission for Assignment 3 in CSCI 2170 (Winter 2021).
					
				Miftahul Kashfy Assignment 3: CSCI 2170 (Winter 2021), Faculty of Computer Science,
				Dalhousie University. Available online on Gitlab at [URL]:
				https://git.cs.dal.ca/courses/2021-winter/csci-2170/a3/kashfy 
				Date accessed: April 1st 2021
			*/
	        	// Session variable for search that was set is retrieved and unset after database is searched for tweets  
	        	if (isset($_SESSION['search'])){
	        		$value = $_SESSION['search'];
	        		unset($_SESSION['search']);

	        		$querySQL = "SELECT Users.firstname, Users.lastname, Users.handle, Tweets.text FROM `Users`
							JOIN `Tweets` ON `Users`.`id` = `Tweets`.`author_id`
							JOIN `Follows` ON `Users`.`id` = `Follows`.`following_id`
							WHERE Users.firstname LIKE '%{$value}%' OR Users.lastname LIKE '%{$value}%' OR Users.handle LIKE '%{$value}%'
							ORDER BY `Tweets`.`dateCreated` DESC";
					$result = $dbconnection->query($querySQL);
					$row = mysqli_num_rows($result);

					if($row > 0){
						for($i=1; $i <= $row; $i++){
						$tempData = $result->fetch_assoc();

						$heredoc = <<<END
						<div class="feedContent" id = "tweep$i">
								
						<div class="d-flex image-container">

						<div class="user-image">
							<img src="https://images.pexels.com/photos/1081685/pexels-photo-1081685.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260">
						</div>

						<div class="pl-2 pt-1">
							<h6>&nbsp; &nbsp; {$tempData['firstname']} {$tempData['lastname']} <span class = "text-muted">@{$tempData['handle']}</h6>
						</div>
											
						</div>
							<hr>
							<div class = "tweepText" style = "height:3em; overflow: hidden">
							<p class="text-muted">
									{$tempData['text']}
							</p>					
							</div>
							<hr>

							<div class="d-flex justify-content-around">
								<a href="#" class="text-dark text-decoration-none"><i class="fa fa-heart"></i> Like</a>
								<a href="#" class="text-dark text-decoration-none"><i class="fa fa-comment"></i> Comment</a>
								<a href="#" class="text-dark text-decoration-none"><i class="fa fa-share"></i> Share</a>
							</div>
						</div>	

						END;

						//if user found
						echo $heredoc;
						}

					}else{
						//if user not found
						echo "<h4 style='color:DarkSlateBlue;'>Sorry, no tweeps found based on your searched user. <br><br> Try searching with another user!</h4>";
					}
				}else{
					$querySQL = "SELECT Users.firstname, Users.lastname, Users.handle, Tweets.text FROM `Users`
							JOIN `Tweets` ON `Users`.`id` = `Tweets`.`author_id`
							JOIN `Follows` ON `Users`.`id` = `Follows`.`following_id`
							WHERE Follows.follower_id = ".$_SESSION['userid']."
							ORDER BY `Tweets`.`dateCreated` DESC";
					$result = $dbconnection->query($querySQL);
					$row = mysqli_num_rows($result);

					if($row > 0){
						for($i=1; $i <= $row; $i++){
						$tempData = $result->fetch_assoc();

						$heredoc = <<<END
						<div class="feedContent" id = "tweep$i">
								
						<div class="d-flex image-container">

						<div class="user-image">
							<img src="https://images.pexels.com/photos/1081685/pexels-photo-1081685.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260">
						</div>

						<div class="pl-2 pt-1">
							<h6>&nbsp; &nbsp; {$tempData['firstname']} {$tempData['lastname']} <span class = "text-muted">@{$tempData['handle']}</h6>
						</div>
											
						</div>
							<hr>
							<div class = "tweepText" style = "height:3em; overflow: hidden">
							<p class="text-muted">
									{$tempData['text']}
							</p>					
							</div>
							<hr>

							<div class="d-flex justify-content-around">
								<a href="#" class="text-dark text-decoration-none"><i class="fa fa-heart"></i> Like</a>
								<a href="#" class="text-dark text-decoration-none"><i class="fa fa-comment"></i> Comment</a>
								<a href="#" class="text-dark text-decoration-none"><i class="fa fa-share"></i> Share</a>
							</div>
						</div>	

						END;

						echo $heredoc;

						}
					}
					else{
						echo "<div class = 'px-3'><h3>Not following anyone yet?<br><br> What are you waiting for?<br> Follow other people to look at their tweets!</h3></div>";
					}

				}

	        	
			?>

			</div>




		</div>		<!-- mid column content closed-->


		<div class="col-md-3">
			<div class="left-section">
				<div class="right-list">
					<h3 class="text-center">Your Followers</h3>
					<ul class="list-group list-group-flush ">
			<!-- 
				-- contributed by:
				-- Name: Arjun Banga
				-- Banner Number: B00852696
				--  Implemented the functionality to display a list of all the users that follow the active user
				-- User Story: 7
			-->
			<?php
				$sql = "SELECT Users.handle, Users.firstname, Users.lastname FROM Follows JOIN Users ON Follows.follower_id = Users.id
				WHERE Follows.following_id = ".$_SESSION['userid']."
				ORDER BY Follows.dateFollowed DESC";
				$result = $dbconnection->query($sql);
				$row = mysqli_num_rows($result);
				if($row>0) {
					for($i=1; $i <= $row; $i++){
						$res = $result->fetch_assoc();
						$hdoc = <<<END
								<li class="list-group-item"><a href="#" class="text-decoration-none text-dark">{$res['firstname']} {$res['lastname']} <span class = "text-muted">@{$res['handle']}</span></a></li>
						END;
						echo $hdoc;
					}
				}
				else {
					echo "<div class = 'text-muted text-center'>You have no followers.</div";
				}

			?>
					  </ul>
				</div>
			


				<!-- follower list ends here -->

			</div>


			<div class="left-section mt-3">
		        <div class="right-list-2">
					<h3 class="text-center">Sponsored</h3>
					
					<ul class="list-group list-group-flush ">
					  <li class="list-group-item"><a href="#" class="text-decoration-none text-dark">Sponsor Link</a></li>
					  <li class="list-group-item"><a href="#" class="text-decoration-none text-dark">Sponsor Link</a></li>
					  <li class="list-group-item"><a href="#" class="text-decoration-none text-dark">Sponsor Link</a></li>
					  <li class="list-group-item"><a href="#" class="text-decoration-none text-dark">Sponsor Link</a></li>
					  <li class="list-group-item"><a href="#" class="text-decoration-none text-dark">Sponsor Link</a></li>
					</ul>
					
				</div>
		    </div>

		</div>



	</div>
</div>

</main>
<script type="text/javascript" src="js/tweepExpand.js"></script>
<?php 
	require_once "includes/footer.php";
	
?>
