<?php

include("inc/conn.php");
$delete_id=$_GET['del'];
$delete_query="delete  from authorities WHERE id='$delete_id'";//delete query

$run=mysqli_query($conn,$delete_query);
if($run)
{
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


?>