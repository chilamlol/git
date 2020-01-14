<?php
session_start();

if(!empty($_SESSION["M"]) && empty($_SESSION["N"]))
{
$_SESSION["totalSubj"]=$_SESSION["M"];
$_SESSION["fees"]=$_SESSION["M"]*800;

}
elseif(!empty($_SESSION["N"]) && empty($_SESSION["M"]))
{
    $_SESSION["totalSubj"]=$_SESSION["N"];
    $_SESSION["fees"]=$_SESSION["N"]*1500;
}
else {
    $_SESSION["totalSubj"]=$_SESSION["M"]+$_SESSION["N"];
    $_SESSION["fees"]=($_SESSION["M"]*800)+($_SESSION["N"]*1500);
}

$_SESSION["gst"]=$_SESSION["fees"]*0.06;
$_SESSION["totalFees"]=$_SESSION["fees"]*1.06;

?>
<html>
    <body style="font-family:Arial;">
        <style>
            table{
               margin-left:-50%;
            }
            td{
                padding-top: 7px;
                padding-bottom: 7px;
                font-size: 14px;
            }
            table.t2{
                border:solid black 1px;
                border-collapse: collapse;
                margin-left:0%;
            }
            table.t2 th{
                border:solid black 1px;
                border-collapse: collapse;
                padding-left:19px;
                padding-right:19px;
                padding-top:7px;
                padding-bottom:7px;
                font-size:13px;
                color: white;
                background-color: rgb(49, 49, 49);
            }
            table.t2 td{
                border:solid rgb(175, 175, 175) 1px;
                border-collapse: collapse;
                text-align: center;
                font-size:13px;
                color:blue;
            }
            table.t3{
                margin-left:0%;
            }
            table.t3 td{
                text-align:center;
                width:3%;
            }
        </style>
        <center>
        <div style="border:solid black 1px;width:60%;height:100%;padding-top:1%;padding-bottom:0%;">
        <img src="logo.jpg" style="width:245px;height:40px;">
        <br><br>
        <p style="color:#5C5C5C;font-size:24px;text-align:left;padding-left:7%;"><b>Payment</b></p>
        <hr style="width:86%;border:solid 1px;color:#D8D8D8;margin-top:-2%;">
        <br>
        <table class="t1">
            <tr>
                <td class="td1"><b>Student Name</b></td>
                <td class="td2">&nbsp;&nbsp;<b>:</b>&nbsp;&nbsp;&nbsp;</td>
                <td><?php echo $_SESSION["name"]?></td>
            </tr>
            <tr>
                    <td><b>Matriculation No.</b></td>
                    <td>&nbsp;&nbsp;<b>:</b>&nbsp;&nbsp;&nbsp;</td>
                    <td><?php echo $_SESSION["id"]?></td>
                </tr>
                <tr>
                        <td><b>Program</b></td>
                        <td>&nbsp;&nbsp;<b>:</b>&nbsp;&nbsp;&nbsp;</td>
                        <td><?php echo $_SESSION["prog"]?></td>
                    </tr>
                    <tr>
                            <td><b>Session</b></td>
                            <td>&nbsp;&nbsp;<b>:</b>&nbsp;&nbsp;&nbsp;</td>
                            <td><?php echo $_SESSION["ses"]?></td>
                        </tr>
                        <tr>
                                <td><b>Semester</b></td>
                                <td>&nbsp;&nbsp;<b>:</b>&nbsp;&nbsp;&nbsp;</td>
                                <td><?php echo $_SESSION["sem"]?></td>
                            </tr>
        </table>
        <br><br>
        <table class="t2">
            <tr>
                <th>Total Subjects</th>
                <th>Payment Date</th>
                <th>GST(6%)</th>
                <th>Amount(RM)</th>
                <th>Amount after tax(RM)</th>
            </tr>
            <tr>
                <td><b><?php echo $_SESSION["totalSubj"]?></b></td>
                <td><b><?php date_default_timezone_set("Asia/Kuala_Lumpur"); echo date("d/m/Y")?> </b></td>
                <td><b><?php echo $_SESSION["gst"]?></b></td>
                <td><b><?php echo $_SESSION["fees"]?></b></td>
                <td><b><?php echo $_SESSION["totalFees"]?></b></td>
            </tr>
        </table>
        <br><br><br>
        <table class="t3">
<tr>
    <td>
        <form action="enroll.php">
            <button style="border:0;background-color:rgb(145, 145, 145);color:white;font-size:13px;height:31px;width:127px;">Back</button>
            </form>
        </td>
        <td> 
                <form action="invoice.php">
                    <button style="border:0;background-color:#E50000;color:white;font-size:13px;height:31px;width:127px;">Comfirm Payment</button>
                    </form>
                </td>
</tr>
        </table>
        <br><br>
        <p style="color:rgb(19, 19, 19);font-size:14px;margin-left:7%;" align="left"><i>***For further clarification please visit Finance Office at your respective campus.</i></p>
    <br>
        <p style="font-size:10px;color:darkgray;margin-top:-0.6%;">&copy; Copyright 2019 INTI International University & Colleges. All Rights Reserved.</p>
    </div>
</body>
</center>
</html>