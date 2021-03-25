<?php

	session_start();
	require_once "includes/header.php";
	require_once "includes/db.php";

?>

<main class="main-page-body">

<div class="container">
	<div class="row row-content">


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


			<div class="mainfeedcenter">


				<div class="d-flex justify-content-around">
					<div class="uploadSection">
						<!-- accessed from - https://fontawesome.com/v4.7.0/icon/pencil-square-o -->
						
						<a href="#" class="text-dark text-decoration-none"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> &nbsp; Write a tweep</a>
					</div>

					<div class="uploadSection">
						<!-- accessed from - https://fontawesome.com/v4.7.0/icon/long-arrow-up -->
						
						<a href="#" class="text-dark text-decoration-none"><i class="fa fa-long-arrow-up" aria-hidden="true"></i> &nbsp; Upload a photo</a>
					</div>


					<div class="uploadSection">
						<!-- accessed from - https://fontawesome.com/v4.7.0/icon/book -->
						
						<a href="#" class="text-dark text-decoration-none"><i class="fa fa-book" aria-hidden="true"></i>&nbsp;  Share</a>
					</div>
				</div>

				<hr>
				<form>
				    <textarea name="" id="" cols="3" rows="3" class="form-control" placeholder="Write A Tweep...." ></textarea>
				    <input class="btn btn-primary post-button" type="submit" name="">
			    </form>

			</div>

			<div class="main-post-container" id = "posts">

			<!-- 
				-- contributed by:
				-- Name: Dhairy Raval
				-- Banner Number: B00845519
				--  Implemented the functionality to see the tweets and retweets from the people you follow 
			-->
			
	        <?php 

	        	$querySQL = " SELECT users.firstname, users.lastname, tweets.text FROM `users`
							JOIN `tweets` ON `users`.`id` = `tweets`.`author_id`
							JOIN `follows` ON `users`.`id` = `follows`.`following_id`
							WHERE follows.follower_id = ".$_SESSION['userid']."
							ORDER BY `tweets`.`dateCreated` DESC";
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
						<h6>&nbsp; &nbsp; {$tempData['firstname']} {$tempData['lastname']}</h6>
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
					echo "<h3>Not following anyone yet?<br><br>What are you waiting for?<br>Follow other people to look at their tweets!</h3>";
				}

			?>

			</div>




		</div>		<!-- mid column content closed-->


		<div class="col-md-3">
			<div class="left-section">
				

				<div class="right-list">
					<h3 class="text-center">Your Contacts</h3>
					
					<ul class="list-group list-group-flush ">
					  <li class="list-group-item"><a href="#" class="text-decoration-none text-dark">User name</a></li>
					  <li class="list-group-item"><a href="#" class="text-decoration-none text-dark">User name</a></li>
					  <li class="list-group-item"><a href="#" class="text-decoration-none text-dark">User name</a></li>
					  <li class="list-group-item"><a href="#" class="text-decoration-none text-dark">User name</a></li>
					  <li class="list-group-item"><a href="#" class="text-decoration-none text-dark">User name</a></li>
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
