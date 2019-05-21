<!DOCTYPE html>
<html>
<head>
    <title>Documents</title>
    <!-- Bootstrap core JavaScript-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<script type="text/javascript">
		function timeout()
		{
			var hours=Math.floor(timeLeft/3600);
			var minute=Math.floor((timeLeft-(hours*60*60)-30)/60);
			var second=timeLeft%60;
			var hrs=checktime(hours);
			var mint=checktime(minute);
			var sec=checktime(second);
			if(timeLeft<=0)
			{
				clearTimeout(tm);
				document.getElementById("form1").submit();
			} else {
				document.getElementById("time").innerHTML=hrs+":"+mint+":"+sec;
			}
			timeLeft--;
			var tm= setTimeout(function(){timeout()},1000);
		}

		function checktime(msg)
		{
			if(msg<10)
			{
				msg="0"+msg;
			}
			return msg;
		}

		$(function() {
		    var canSubmit = localStorage.getItem("can_submit");
		    if(!canSubmit) {
		       // first time loaded!
		       document.forms['form1'].submit();
		       localStorage.setItem("can_submit","1");
		       window.location.reload();
		    }else{
		       //You can remove it if needed
		        localStorage.removeItem("can_submit");
		    }
		});

	</script>

	<style type="text/css">
		/* Hide all steps by default: */
		.tab {
		  display: none;
		}

		button {
		  background-color: #4CAF50;
		  color: #ffffff;
		  border: none;
		  padding: 10px 20px;
		  font-size: 17px;
		  font-family: Raleway;
		  cursor: pointer;
		}

		button:hover {
		  opacity: 0.8;
		}

		#prevBtn {
		  background-color: #bbbbbb;
		}

		/* Make circles that indicate the steps of the form: */
		.step {
		  height: 20px;
		  width: 20px;
		  margin: 0 2px;
		  background-color: #bbbbbb;
		  border: none;  
		  display: inline-block;
		  	}

		.step.active {
		  opacity: 1;
		  background-color: yellow;

		}

/*		 Mark the steps that are finished and valid: 
		.step.finish {
		  background-color: #4CAF50;
		}
*/	</style>	
</head>
<body onload="timeout()">
	<div id="tabel_soal">
		<div class="row">
			<div class="col-md-6">
				<div class="container">
					<div class="card card-body"><h2>Question</h2></div>
					<?php
					include "koneksi.php";
					$hasil=mysql_query("select * from t_soal WHERE aktif='Y' ORDER BY RAND ()");
					$jumlah=mysql_num_rows($hasil);
					$urut=1;
					?>
					<form id="form1" method="post" action="jawaban.php">
						<input type="hidden" name="submission" value="ok">
						<?php
						while($row =mysql_fetch_array($hasil))
						{
							$id=$row["id_soal"];
							$pertanyaan=$row["soal"];
							$pilihan_a=$row["a"];
							$pilihan_b=$row["b"];
							$pilihan_c=$row["c"];
							$pilihan_d=$row["d"]; 
							$pilihan_e=$row["e"];
							?>
							<div class="tab">
								<table style="width: 100%;" border="1">
									<input type="hidden" name="id[]" value=<?php echo $id; ?>>
									<input type="hidden" name="jumlah" value=<?php echo $jumlah; ?>>
									<thead>
									  <tr class="alert alert-primary">
										<th><?php echo $urut++;?> . <?php echo $pertanyaan;?>  </th>
									  </tr>
									</thead>
									<tbody>
									  <tr class="info">
										<td>
											<input name="pilihan[<?php echo $id; ?>]" id="r1" type="radio" value="A">&nbsp;A. <?php echo "$pilihan_a";?>
										</td>
									  </tr>
									  <tr class="info">
									  	<td>
									  		<input name="pilihan[<?php echo $id; ?>]" id="r1" type="radio" value="B">&nbsp;B. <?php echo "$pilihan_b";?>
										</td>
									  </tr>
									  <tr class="info">
										<td>
											<input name="pilihan[<?php echo $id; ?>]" id="r1" type="radio" value="C">&nbsp;C. <?php echo "$pilihan_c";?>										
										</td>
									  </tr>
									  <tr class="info">
									  	<td>
									  		<input name="pilihan[<?php echo $id; ?>]" id="r1" type="radio" value="D">&nbsp;D. <?php echo "$pilihan_d";?>
									  	</td>
									  </tr>
									  <tr class="info">
										<td>
											<input type="radio" checked="checked" style="display:none" value="no_attempt" name="<?php echo $qust['id']; ?>" />
										</td>
									  </tr>
									</tbody>
								</table>
							</div>
							<?php
						}
						?>
					</form>
	        	</div>
	    	</div>

	    	<div class="col-md-2">
	    		<div class="card card-body"><h2>Timer</h2></div>
					<div class="alert alert-danger">
		    		<?php
		    		$val = 3600; //Waktu dalam detik
		    		?>
					<script type="text/javascript">
						var timeLeft= "<?php echo $val ?>"
					</script>
				  	<h2>
				  		<div id="time">timeout</div>
				  	</h2>
					</div>

		  	</div>
	    	<div class="col-md-4">
	    		<div class="container">
					<div class="card card-body"><h2>Number</h2></div>
					<div class="alert alert-primary">
					<div style="overflow:auto;">
					    <div style="float:left;">
					      <button type="button" style="align-left" id="prevBtn" onclick="nextPrev(-1)">Previous
					      </button>
					    </div>
					    <div style="float:right;">
					      <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
					      <button type="button" id="submitBtn" onclick="nextPrev(1)">Submit</button>
					    </div>
					  </div>
					  <?php 
					  echo  "<div style='text-align:center;margin-top:40px;'>"; 
					  for ($i=1;$i<=$jumlah;$i++){
					  	 echo "<span class='step' onclick='stepClick(".$i.");' type='button'>".$i."</span>";
					  	}
					  	echo "</div>";
					  	?>
				</div>
			</div>
    	</div>
    </div>

<script type="text/javascript">
	
	var currentTab = 0; // Current tab is set to be the first tab (0)
	showTab(currentTab); // Display the current tab

	var x, y;
	x = document.getElementsByClassName("tab");
	y = x[currentTab].getElementsByTagName("input");
    // document.getElementsByClassName("step")[currentTab].className += " active";


	function showTab(n) {
	  // This function will display the specified tab of the form...
	  var currentTab = n;
	  var x = document.getElementsByClassName("tab");
	  x[n].style.display = "block";
	  //... and fix the Previous/Next buttons:
	  if (n == 0) {
	    document.getElementById("prevBtn").style.display = "none";
	    document.getElementById("submitBtn").style.display = "none";
	    // document.getElementById("nextBtn").style.display = "inline";
	  } else {
	    document.getElementById("prevBtn").style.display = "inline";
	  }
	  if (n == (x.length - 1)) {
	  	document.getElementById("nextBtn").style.display = "none";
	    document.getElementById("submitBtn").style.display = "inline";
	  } else {
	    document.getElementById("nextBtn").innerHTML = "Next";
	    document.getElementById("nextBtn").style.display = "inline";
	    document.getElementById("submitBtn").style.display = "none";

	  }
	  //... and run a function that will display the correct step indicator:
	  fixStepIndicator(n)
	}

	function stepClick(n){
	  var x = document.getElementsByClassName("tab");
	  var z = +1;
	  var ab = n-z;
	  x[currentTab].style. display = "none";
	  currentTab = ab;
	  return showTab(currentTab);
	}

	function nextPrev(n) {
	  // This function will figure out which tab to display
	  var x = document.getElementsByClassName("tab");
	  // Exit the function if any field in the current tab is invalid:
	  if (n == 1 && !validateForm()) return false;
	  // Hide the current tab:
	  console.log(x)
	  x[currentTab].style.display = "none";
	  console.log(currentTab)
	  // document.getElementById("prevBtn").style.display = "none";
	  // Increase or decrease the current tab by 1:
	  currentTab = currentTab + n;
	  // if you have reached the end of the form...
	  if (currentTab >= x.length) {
	    // ... the form gets submitted:
	    var ok = confirm("Apakah Anda yakin dengan jawaban Anda?");
	    if(ok == true){
	    	document.getElementById("form1").submit();	
	    }
	    
	    else {
	    	currentTab = currentTab -1
	    	return showTab(currentTab);

	    } 
	  }
	  // Otherwise, display the correct tab:
	  return showTab(currentTab);
	}

	function validateForm() {
	  // This function deals with validation of the form fields
	  var x, y, i, valid = true;
	  x = document.getElementsByClassName("tab");
	  y = x[currentTab].getElementsByTagName("input");
	  // if (document.getElementById(r1).checked){
	  // 	valid = true;
	  // }
	  // // A loop that checks every input field in the current tab:
	  // for (i = 0; i < y.length; i++) {
	  //   // If a field is empty...
	  //   if (y[i].value == "") {
	  //   	// valid=false;
	  //     // add an "invalid" class to the field:
	  //    // y[i].className += " invalid";
	  //     // and set the current valid status to false
	  //    // valid = false;
	  //   }
	  // }
	  // If the valid status is true, mark the step as finished and valid:
	  if (valid) {
	    document.getElementsByClassName("step")[currentTab].className += " finish";
	  }
	  return valid; // return the valid status
	}

	function fixStepIndicator(n) {
	  // This function removes the "active" class of all steps...
	  var i, x = document.getElementsByClassName("step");
	  for (i = 0; i < x.length; i++) {
	    x[i].className = x[i].className.replace(" active", "");
	  }
	  //... and adds the "active" class on the current step:
	  x[n].className += " active";
	}

	</script>

</body>
</html>



