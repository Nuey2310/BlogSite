<!-- -- contributed by:
	-- Name: Arjun Banga
	-- Banner Number: B00852696
	-- If on pressing share, a record for share already exists, delete it. Else add a record for a share/retweet -->
	
<?php
    session_start();
    require_once "db.php";
    $sql = "SELECT id FROM Retweets WHERE tweet_id = $_GET[tweet] AND retweeter_id = $_SESSION[userid]";
    $rows = $dbconnection->query($sql);
    //If retweet not present insert into table
    if($rows->num_rows == 0) {
        $sql = "INSERT INTO Retweets (tweet_id,retweeter_id) VALUES ($_GET[tweet],$_SESSION[userid])";
    }
    //else delete
    else {
        $sql = "DELETE FROM Retweets WHERE tweet_id = $_GET[tweet] AND retweeter_id = $_SESSION[userid]";
    }
    if (!$dbconnection->query($sql)) {
        echo "<p>ERROR.</p>";
    }
    header("Location: ../mainFeed.php");
?>