<?php 

    require_once "inc/conn.php";
    if(isset($_POST['submit']))
    {
        $meeting_id = $_POST['meeting_id'];
        // $emp_id = $_POST['emp_id'];

        // echo $emp_id; die;
        // $email = $_POST['email'];
        // $emp_name = $_POST['emp_name'];
        // $booking_with = $_POST['booking_with'];
        // $subject=$_POST['subject'];

       $sql="update appointments SET waiting_area='Yes' WHERE id='$meeting_id' ";
        // echo $sql; die;
        $run=mysqli_query($conn,$sql);
        // echo "$run";
        if($run)
        {   
                // echo '<script type="text/javascript"> alert("Profile Updated")</script>';

            // echo "<script>window.open('employee_appointment_status.php','_self')</script>";
                
                ?> 

                <script>
            window.onload = function() {
            // similar behavior as an HTTP redirect
            window.history.back();
            }
             </script>
             <?php
        }
        else
        {
            echo '<script type="text/javascript"> alert("Data Not Updated")</script>';
        }
    }

?>


<?php 

    require_once "inc/conn.php";
    if(isset($_POST['group_submit']))
    {
        $meeting_id = $_POST['grp_id'];
        $emp_id = $_POST['emp_id'];


// EXPERIMETAL START

        //Get Employee Email using emp_id
        $sql1="select * from authorities where id='$emp_id'";
            $run1=mysqli_query($conn,$sql1);
            $t=0;
            while($row=mysqli_fetch_array($run1))
            {
                $emp_name = $row['name'];
                $email = $row['email'];
            }

           if (empty($email)) {
               echo "<script>alert('Your id is incorrect please try again');</script>";
                    ?> 
                    <script>
                    window.onload = function() {
                    window.history.back();
                        }
                    </script>
                    <?php
           }

        //To check emloyee is present in meeting or not
        $sql2="select * from appointments where id='$meeting_id' and meeting_partner LIKE '%$email%'";

            $run2=mysqli_query($conn,$sql2);
            $t=0;
            while($row=mysqli_fetch_array($run2))
            {
                $meeting_partner = $row['meeting_partner'];
            }            

           if (empty($meeting_partner)) {
               echo "<script>alert('Sorry You are not in this meeting');</script>";
                      ?> 
                    <script>
                        window.onload = function() {
                        window.history.back();
                            }
                    </script>
                    <?php
                }

        //To check employee is already in waiting list
            $sql3="select * from group_appointments where meeting_id='$meeting_id' and email ='$email'";
            $run3=mysqli_query($conn,$sql3);
            $number = mysqli_num_rows($run3);
            $t=0;
            while($row=mysqli_fetch_array($run3))
            {
                $email11 = $row['email'];
            }            

           if ($number != 0) {
               echo "<script>alert('You are already in waiting list');</script>";
                      ?> 
                    <script>
                    window.onload = function() {
                    window.history.back();
                        }
                    </script>
                    <?php
                } 
                else{

                $status = "Yes";



            // email
            // status
            // emp_name

                    echo $email;
                    echo "<br>";
                    echo $meeting_id;
                    echo "<br>";
                    echo $status;
                    echo "<br>";
                    echo $emp_name;
                    // die;


            $query = $sql="INSERT INTO `group_appointments` (`meeting_id`,`email`,`waiting_area`,`emp_name`)VALUES ('$meeting_id','$email','$status','$emp_name');";

            // echo $query; die; 
            mysqli_query($conn,$query);
            // echo 1;
    
                ?> 
        echo "<script>alert('Success..!! You are now in the waiting list');</script>";
                <script>
            window.onload = function() {
            // similar behavior as an HTTP redirect
            window.history.back();
            }
             </script>
             <?php
             
            // EXPERIMETAL END

}   
}
?>