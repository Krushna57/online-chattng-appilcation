<?php
    $msgFrom = $_GET["msgFrom"];
    $msgTo = $_GET["msgTo"];
    include "conn.php";   
    static $count=0;

    $q = "SELECT * FROM `messages` WHERE `MSGFROM` LIKE '$msgFrom' AND `MSGTO` LIKE '$msgTo' OR `MSGFROM` LIKE '$msgTo' AND `MSGTO` LIKE '$msgFrom'";
    $run = mysqli_query($conn,$q);
    if(mysqli_num_rows($run)>0){
        if(mysqli_num_rows($run)!=$count)
        while($row = mysqli_fetch_array($run)){
            $count = $count+1;
            if($msgFrom == $row["MSGFROM"]){
                ?>
                    <div class="square1">
                        <div class="outmsg"><?php echo base64_decode($row["MESSAGE"]);?></div>
                    </div>
                <?php
            }else{
                ?>
                    <div class="square2">
                        <div class="inmsg"><?php echo base64_decode($row["MESSAGE"]);?></div>
                    </div>
                <?php
            }
        }
    }
?>