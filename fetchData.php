<?php 

		$con = mysqli_connect("localhost","root","","dlh_project");
		if (isset($_POST['lid'])) {
			if(!empty($_POST['lid'])){
			$lid = $_POST['lid'];

			
			$query = "select * from labour where lid=$lid ORDER BY lid DESC";
			
			
			$result= mysqli_query($con, $query);
			

			foreach($result as $row){
				$rows[] = $row;
			}
			$abc = json_encode($rows);
			print_r($abc);


		}else{
			$rows =  array("foo" => "false",);
			$abc = json_encode($rows);
			print_r($abc);
		}
	}
		

 ?>