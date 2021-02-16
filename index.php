<?php
include_once 'db.php';
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<style>

	/*.container-fluid{
      border-style: outset;
      height: 100%;
    }*/

.column {
  float: left;
  width: 50%;
  padding: 10px;
 
}

.row:after {
  content: "";
  display: table;
  clear: both;
}

</style>
<body>
	<h3 class="text-center" style="margin-top: 30px;"><u> Employee Management</u></h3>
	<center style="margin-top: 30px;"><a href="employee.php" class="btn btn-primary" >&#43;&nbsp; Add Employee</a></center><br><br><br>
<div class="row">
<div class="column">	
<?php
$sql="select * from employee ";
$row=mysqli_query($conn,$sql);
?>
	<form>	
		<table class="table table-bordered table-responsive">
			<thead>
				<tr class="text-center">
                 	<th>Name</th>
					<th>Email</th>
					<th>Address</th>
					<th>Workplace</th>
					<th>Mobile</th>
					<th>Image</th>
				</tr>
			</thead>
			<?php
			while($result=mysqli_fetch_assoc($row)){
				?>
				<tbody>
					<tr class="text-center">
						<td><?php echo $result['name']; ?></td>
						<td><?php echo $result['email']; ?></td>
						<td><?php echo $result['address']; ?></td>
						<?php 
						if($result['workplace']==1)
						{
							?>
							<td> Home</td>
							<?php
						}
						else{
					?>
							<td> Office</td>
							<?php

					}
					?>

						
						<td><?php echo $result['mobile']; ?></td>
						<td><img  src="<?php echo 'uploads/'.$result['image'];?>" alt="Card image" style="height: 50px;width: 50px;"></td>	
					</tr>
				</tbody>
				<?php
			}

			?>		
		</table>
	</div>
</form>

<div class="column" style="margin-top: 10px; background-color:#bbb;">
<?php
if(isset($_POST['workplace']))
{
	if(!empty($_POST['workplace']))
	{
		$workplace=$_POST["workplace"];
		$sql="select count(*) as xyz from employee where workplace='$workplace'";
		$query=mysqli_query($conn,$sql);
		if($query->num_rows==0)
		{
			echo "no records found";
		}
		else
		{
			while($row=$query->fetch_assoc())
			{
				?>
			 <center><?php echo "<h4>Number of Employees are:" ." ".$row['xyz']."</h4>";?></center><br>

			  <?php

			}
		}
	}
}
?>
<form method="post">	
<div class="form-group">
	<div class="container" style="height: 100%; width: 100%;">		
	<h4> Count Number of employee:-&nbsp;&nbsp;</h4>
		<select class="selectpicker form-control" data-style="btn-info" name="workplace">
			<option>Select</option>
			<option value="1">Home</option>
			<option value="2">Office</option>
		</select></br>
		<button type="submit" name="submit" class="btn btn-success form-control">Go</button>
	</div>
</div>
</form>
</div>
</div>
</div>
</body>
</html>
			