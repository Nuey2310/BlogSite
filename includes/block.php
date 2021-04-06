<?php
require_once "header.php";
require_once "db.php";
if (isset($_GET['block'])) {
    $userHandel = $_SESSION['userid'];
    $Query = "SELECT*FROM `Users` WHERE `id` LIKE $userHandel";
    $blockResult = $dbconnection->query($Query);
    $userListQuery = "SELECT handle FROM Users";
    $userList = $dbconnection->query($userListQuery);
    $userListString = "";
    while ($row1 = $userList->fetch_assoc()) {
        $thisUser = $row1['handle'];
        $userListString = $userListString . ";" . $thisUser;
    }
    echo "$userListString";
    $userListArray = explode(";", $userListString);


//      if this user has not been blocked
    if ($_GET['block'] == 1) {
        if (mysqli_num_rows($blockResult) == 0) {
            $blockArray = null;
        } else {
            $row = $blockResult->fetch_assoc();
            $blockString = $row['blocks'];
            $blockArray = explode(";", $blockString);
//        print_r($blockArray);
        }
        $blockUser = $_POST['block'];
        if (in_array($blockUser, $userListArray)) {
            echo "this will block a user" . "$blockUser" . " <br>";
            $queryEd = "SELECT*FROM `Users` WHERE `handle` LIKE '$blockUser'";
            $blockResultEd = $dbconnection->query($queryEd);
            $rowEd = $blockResultEd->fetch_assoc();
            $blockedString = $rowEd['blocked'];
            $blockedArray = explode(";", $blockedString);

            if (!in_array($blockUser, $blockArray)) {
                if ($blockArray[0] == null) {
                    $blockString = $blockUser;
                } else {
                    $blockString = $blockString . ";" . $blockUser;
                }

                if ($blockedArray[0] == null) {
                    $blockedString = $_SESSION['handle'];
                } else {
                    $blockedString = $blockedString . ";" . $_SESSION['handle'];
                }
                echo "blockS String " . "$blockString" . "<br>";
                echo "blockED String" . " $blockedString";

                $uId = $_SESSION['userid'];
                $uHandle = $_SESSION['handle'];
                $blockQuery = "UPDATE `Users` SET `blocks` = '$blockString' WHERE `Users`.`id` = $uId";
                $blockedQurey = "UPDATE `Users` SET `blocked` = '$blockedString' WHERE `Users`.`handle` = '$blockUser'";
                $dbconnection->query($blockQuery);
                $dbconnection->query($blockedQurey);
                header("Location: ../profile.php");
            } else {
                // iF the user has been blocked, do nothing
                header("Location: ../profile.php?blockstate=1");
            }
        } else {
            // iF the user has been blocked, do nothing
            header("Location: ../profile.php?blockstate=1");
        }

    } elseif ($_GET['block'] == 0) {
        echo "this will un-block a user";
        // Check if this user is in user list
        $unblockUser = $_POST['unblock'];
        if (in_array($unblockUser, $userListArray)) {
            //If the user have blocked this user
            $uId = $_SESSION['userid'];
            $getBlocks = "SELECT `blocks` FROM Users WHERE id = $uId";
            $blocksResult2 = $dbconnection->query($getBlocks);
            $blocksRow = $blocksResult2->fetch_assoc();
            $blockString2 = $blocksRow['blocks'];
            $blockArray2 = explode(";", $blockString2);
            if (in_array($unblockUser, $blockArray2)) {
                $unblockUserIndex = array_search($unblockUser, $blockArray2);
                echo "<br> the index of the user is " . "$unblockUserIndex";
                echo "<br>";
                $unblockString = "";
                print_r($blockArray2);
                //Set the blocks String
                if (sizeof($blockArray2) == 1) {
                } elseif (sizeof($blockArray2) == 2) {
                    if ($unblockUserIndex == 0) {
                        $unblockString = $blockArray2[1];
                    } else {
                        $unblockString = $blockArray2[0];
                    }
                } else {
                    if ($unblockUserIndex == 0) {
                        $unblockString = $unblockString . $blockArray2[1];
                        for ($i = 2; $i < count($blockArray2); $i++) {
                            if ($i != $unblockUserIndex) {
                                $unblockString = $unblockString . ";" . $blockArray2[$i];
                            }
                        }
                    } else {
                        $unblockString = $unblockString . $blockArray2[0];
                        for ($i = 1; $i < count($blockArray2); $i++) {
                            if ($i != $unblockUserIndex) {
                                $unblockString = $unblockString . ";" . $blockArray2[$i];
                            }
                        }
                    }
                }
                echo "<h1> $unblockString</h1>";
                // Set the blocked String
                $unblockEDQuery = "SELECT*FROM Users WHERE handle = '$unblockUser' ";
                $unblockEDResult = $dbconnection->query($unblockEDQuery);
                $unblockEdRow = $unblockEDResult->fetch_assoc();
                $unblockEdArray = explode(";", $unblockEdRow['blocked']);
                $uHandle = $_SESSION['handle'];
                $unblockEdUserIndex = array_search($uHandle, $unblockEdArray);
                echo "<br> index is $uHandle " . "$unblockEdUserIndex";
                echo "<br>";
                $unblockEdString = "";
                print_r($unblockEdArray);
                //Set the blocks String
                if (sizeof($unblockEdArray) == 1) {
                } elseif (sizeof($unblockEdArray) == 2) {
                    if ($unblockEdUserIndex == 0) {
                        $unblockEdString = $unblockEdArray[1];
                    } else {
                        $unblockEdString = $unblockEdArray[0];
                    }
                } else {
                    if ($unblockEdUserIndex == 0) {
                        $unblockEdString = $unblockEdString . $unblockEdArray[1];
                        for ($i = 2; $i < count($unblockEdArray); $i++) {
                            if ($i != $unblockEdUserIndex) {
                                $unblockEdString = $unblockEdString . ";" . $unblockEdArray[$i];
                            }
                        }
                    } else {
                        $unblockEdString = $unblockEdString . $unblockEdArray[0];
                        for ($i = 1; $i < count($unblockEdArray); $i++) {
                            if ($i != $unblockEdUserIndex) {
                                $unblockEdString = $unblockEdString . ";" . $unblockEdArray[$i];
                            }
                        }
                    }
                }
                echo "<h1> $unblockEdString</h1>";
                $unblockQuery = "UPDATE `Users` SET `blocks` = '$unblockString' WHERE `Users`.`id` = $uId";
                $unblockedQurey = "UPDATE `Users` SET `blocked` = '$unblockEdString' WHERE `Users`.`handle` = '$unblockUser'";
                $dbconnection->query($unblockQuery);
                $dbconnection->query($unblockedQurey);
                header("Location: ../profile.php");
            }
        } else {
            // iF the user has been blocked, do nothing
            header("Location: ../profile.php?unblockstate=1");
        }
    }
}
require_once "footer.php";
?>