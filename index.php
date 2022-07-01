<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="author" content="colorlib.com">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,700" rel="stylesheet" />
    <link href="css/main.css" rel="stylesheet" />
  </head>
  <body>
    <div class="s013">
		
      <form action="" method="POST" > 
        <fieldset>
          <legend>GET YOUR PVC, FIND A CENTER NEAR YOU</legend>
        </fieldset>
        <div class="inner-form">
          <div class="left">
            <div class="input-wrap first">
              <div class="input-field first">
                <label>LOCATION</label>
                <input type="text" name= "location" placeholder="ex: Mainland, Island" />
              </div>
            </div>
            <div class="input-wrap second">
              <div class="input-field second">
                <label>CENTER TYPE</label>
                <div class="input-select">
                  <select data-trigger="" name="centertype">
                    <option value="Registration"> New Registration</option>
                    <option value = "UpdatePVC"> Update PVC </option>
                  </select>
                </div>
              </div>
            </div>
          </div>
          <input class="btn-search" type="submit" name="sbtn" value="SEARCH">
        </div>

	<?php
		 
		
	    if(isset($_POST['sbtn'])){ 
		    include_once 'db.php';
		    $location = $_POST['location'];
		    $centertype = $_POST['centertype'];
	    
			if($centertype = 'Registration'){


       			# Start form processing if test center

			$sqlquery = "SELECT * FROM dbo.ineccenters WHERE centerlocation = '$location' ";
			$sqlquery = sqlsrv_query($conn, $sqlquery);
			?>

			<table>
			<thead>
				<th>Search Results for <?php $location." centers" ; ?> </th>
			</thead>
			<tbody> 
			<tr>
					<td>Id</td>
					<td>Center Name </td>
					<td>Center Address </td>
					<td>Center Type</td>
					
			</tr>
				<?php
				while ($data = sqlsrv_fetch_array($sqlquery)
				){
					$x = 0;
					$x++
					?>
				<tr>
					<td><?php echo $x; ?></td>
					<td><?php echo $data['centername'] ?></td>
					<td><?php echo $data['centerlocation']. "<br>" . $data['centeraddress'] ?></td>
					<td><?php echo $data['centertype'] ?></td>
				</tr>
					<?php }?>
				
			</tbody>
		</table>
	<?php } #close if of testcenter
			else{
				echo "<h3> Update and Pick up locations are not available yet! </h3>";
			 }
	}
	      
	      ?>	
</form>
      
	  </div>
	  <footer> 
		<div align="Center">
		  <marquee behavior="" direction="left">
			<h4>Design  By Chisom Jude for SCA Project <small>Frontend template by Colorlib, Contents extracted from 
				<a href="https://locator.inecnigeria.org/locator/browse" title=" Inec Website">INEC Website</a></small></h4>
		  </marquee>
		</div>
	  </footer>
	 
	</body>
  </html>
  
