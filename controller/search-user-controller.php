<?php
require_once('../model/user-info-model.php');
$username=$_REQUEST['name'];
$result=searchuser($username);
if(mysqli_num_rows($result) > 0) {
    echo"<table align=\"center\" width=\"60%\" border=\"1\" cellpadding=\"15\" cellspacing=\"0\" bgcolor=\"white\" >
        <tr><td align=\"center\">Name</td>
            <td align=\"center\">Blood Group</td>
            <td align=\"center\">Date Of Birth</td>
            <td align=\"center\">Email</td>
            <td align=\"center\">Action</td>
            </tr>";
    while($row = mysqli_fetch_assoc($result)) {
        $uid=$row['UserID'];
        $name=$row['FirstName']." ".$row['LastName'];
        $email=$row['Email'];
        $dob=$row['DOB'];
        $BG=$row['BloodGroup'];
        echo"
        <tr><td align=\"center\">$name</td>
        <td align=\"center\">$BG</td>
        <td align=\"center\">$dob</td>
        <td align=\"center\">$email</td>
        <td align=\"center\"><a href=\"../view/view-information.php?id=$uid\">View Information</a></td>
    </tr>";
    }
    echo"</table>";
}else{
    echo "<center><h2>No User Found<h2></center>";
}
?>