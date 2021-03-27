<!-- 
	-- contributed by:
	-- Name: Arjun Banga
	-- Banner Number: B00852696
	--  Implemented the administrative interface which lets an admin create a new account with either microblog author or admin role. The admin interface can only be accessed once a user is logged in AND is an admin
	-- User Story: 6
-->

<?php 

session_start();
if($_POST['verified'] != 1) {
    if (!isset($_SESSION['handle'])) {
        header("Location: ../index.php?noaccess=1");
        die();
    }
    else if($_SESSION['admin'] == 0) {
        header("Location: ../mainFeed.php?noaccess=1");
    }
}

require_once "includes/header.php";
require_once "includes/db.php";
?>

<!-- Create account form created with some modification from my Assignment 1
	Arjun Banga, Assignment 1: CSCI 2170 (Winter 2021), Faculty of Computer Science,
	Dalhousie University, Available online on GitLab at: https://git.cs.dal.ca/courses/2021-winter/csci-2170/a1/banga
	Date Accessed: March 27, 2021.
-->

<main id="pg-main-content">
    <br>
    <div class = "container w-50 py-3">
      <div class = "text-center">
      <h2 class="fw-light">Create account</h2>
      </div>
      <!-- BootStrap Form Control
      https://getbootstrap.com/docs/5.0/forms/form-control/
      Accessed: January 27 2021
      Author: The Bootstrap Team -->
      <form class = "form-horizontal py-2" action = "./includes/create-account.php?verified=1" method = "post">
         
         <div class="form-row py-2">
            <div class = "form-group">
                <label for= "username" class="form-label">Username</label> 
                <input id= "username" name= "username" type="text" class="form-control" placeholder = "Enter username">
            </div>
            <div class = "input-group">
                    <label for= "firstname" class="form-label">Full Name</label>                 
            </div>
            <div class = "input-group">
                    <input id= "firstname" name= "firstname" type="text" class="form-control" placeholder = "Enter first name">
                    <input id= "lastname" name= "lastname" type="text" class="form-control" placeholder = "Enter last name">
            </div>
            <div class = "form-group">
                    <label for= "password" class="form-label">Password</label> 
                    <input id= "password" name= "password" type="text" class="form-control" placeholder = "Enter password..">
            </div>
            <!-- Bootstrap Form Check
            Link:  https://mdbootstrap.com/docs/standard/forms/checkbox/
            Accessed: March 27 2021
            Author: The Bootstrap Team-->
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" name = "admin" id="admin">
                <label class="form-check-label" for="admin">Administrator</label>
            </div>
        </div>
        <br>
         <div class="btn-group d-flex justify-content-right w-25">
                <button name="send" type="submit" class="btn btn-dark">Create</button>
                <button name="discard" type="reset" class="btn btn-secondary">Cancel</button>
         </div>
      </form>
   </div>


</main>
<?php require_once "includes/footer.php";