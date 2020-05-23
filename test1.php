<!DOCTYPE html>
<html lang="en">
    <head>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <main class="view">
                    <div class="detail">
                        <div class="description1">                        
                        <?php
 			  $s="SELECT student.SID,student.sname,student.rollno,student.ldate,
               (student.cfees+student.hfees+student.bfees) as fees from student";
 			  $re=$db ->query($s);
 			 if($re->num_rows>0)
 			 {
 				echo"<table>
                 <tr> 
 				<th>SNO</th>                                 
 				<th>NAME</th>
 				<th>ROLLNO</th>
 				<th>LDATE</th>
 				<th>FEES</th>
                <th>EDIT</th>
                <th>DELETE</th>
 				</tr>";
 				$i=0;
 				while($row=$re->fetch_assoc())
 				{
 					$i++;
 					echo"<tr>";
                     echo	"<td>{$i}</td>";
                     echo	"<td>{$row["sname"]}</td>";
                     echo	"<td>{$row["rollno"]}</td>";
                     echo	"<td>{$row["ldate"]}</td>";
                     echo	"<td>{$row["fees"]}</td>"; 
                     echo	"<td> <a href='reports.php?id={$row["SID"]}#popup' class='success'>Edit</a></td>";
                     echo	"<td> <a href='delete1.php?id={$row["SID"]}' class='error'>Delete</a></td>";
                     echo	"</tr>";
 				}
 				echo"</table>";
 			 }
 			 else
 			 {
 				 echo"<p class='error'>No Students </p>";
 			 }
 			 ?>         <div class="recommend">Lucy and 3 other friends recommend this hotel.</div>  
              </div>                   
                </main>
<div class="popup" id="popup" style="margin-left:20rem;margin-top:30rem;">
<div class="popup__content">
<div class="popup__right">
<a href="#description" class="popup__close">&times;</a>
<h2 class="heading-secondary u-margin-bottom-small" style="color:$color-primary-1;">Edit Student Details</h2>
<div class="popup__text">
<?php                                          
if(isset($_POST["submit"])) {
$sql1="UPDATE student SET student.SID='{$_POST["sid"]}',SNAME='{$_POST["sname"]}', ROLLNO ='{$_POST["rollno"]}',SEM = '{$_POST["sem"]}',LDATE = '{$_POST["ldate"]}',
CFEES = '{$_POST["cfees"]}',BFEES = '{$_POST["bfees"]}',HFEES = '{$_POST["hfees"]}',EFEES = '{$_POST["efees"]}'
WHERE student.SID='{$_POST["sid"]}'";
echo $sql1;
$db ->query($sql1);
}
$s="SELECT student.sid,student.sname,student.rollno,student.sem,student.ldate,student.cfees,student.bfees,student.hfees,student.efees
from student WHERE student.SID='{$_GET["id"]}'";
$re=$db ->query($s);
if($re->num_rows>0)
{
while($row=$re->fetch_assoc()){
?>
<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" enctype="multipart/form-data" class="form" autocomplete="off">

<div class="form__group">
<label>NAME </label>
<input type="hidden" name="sid" value="<?php echo $row['sid']; ?>">                   
<input type="text" name="sname" value="<?php echo $row['sname']; ?>" class="form__input" placeholder="Name">
</div>

<div class="form__group">
<label>ROLLNO </label>
<input type="text" name="rollno" value="<?php echo $row['rollno']; ?>" class="form__input" placeholder="Roll Number">
</div>

<div class="form__group">
<label>SEMESTER </label>
<select name="sem" class="form__input">
<option><?php echo $row['sem']; ?></option>
<option value="1st">1st</option>
<option value="2nd">2nd</option>
<option value="3rd">3rd</option>
<option value="4th">4th</option>
<option value="5th">5th</option>
<option value="6th">6th</option>
<option value="7th">7th</option>
<option value="8th">8th</option>
<option value="passout">PassOut</option>
</select>
<div>

<div class="form__group">
<label>PERMISSION DATE </label>
<input type="date" name="ldate" value="<?php echo $row['ldate']; ?>" class="form__input" placeholder="Permission Date">
</div>

<div class="form__group"><br><br><br>
<label>CFEES </label>
<input type="text" name="cfees" value="<?php echo $row['cfees']; ?>" class="form__input" placeholder="College Fees">
</diiv>

<div class="form__group">
<label>BFEES </label>
<input type="text" name="bfees" value="<?php echo $row['bfees']; ?>" class="form__input" placeholder="Bus Fees">  
</div>

<div class="form__group">
<label>HFEES</label>
<input type="text" name="hfees" value="<?php echo $row['hfees']; ?>" class="form__input" placeholder="Hostal Fees">
</div>

<div class="form__group">
<label>EFEES</label>
<select name="efees" class="form__input">
<option><?php echo $row['efees']; ?></option>
<option value="paid">Paid</option>
<option value="unpaid">Un Piad</option>
</select>
</div>

<div class="form__group">
<button type="submit" name="submit" class="btn1 btn1--primary">update</button> 
</div>

</form>
<?php
}
}
?>
</div>
</div>
</div>
</div>


</div>
        </div>
    </body>
</html>