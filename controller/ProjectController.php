<?php
if (isset($_REQUEST['post_option'])) {
	$post_option = $_REQUEST['post_option'];
	switch ($post_option) {
		case 'get_vals':
			$p_code = $_REQUEST["p_code"];
			return getValue($p_code);
			// break;
		case 'get_details':
			$p_code = $_REQUEST['p_code'];
			return get_details($p_code);
		case 'insert_project':
			$datas = $_REQUEST['data'];
			return insert_project($datas);
		case 'update_project':
			$datas = $_REQUEST['data'];
			return update_project($datas);
		case 'delete_project':
			$datas = $_REQUEST['data'];
			return delete_project($datas);
		case 'insert_data':
			$tblID = $_REQUEST['tblID'];
			$datas = $_REQUEST['data'];
			return insert_data($datas,$tblID);
		case 'update_data':
			$tblID = $_REQUEST['tblID'];
			$data_Index = $_REQUEST['data_Index'];
			$datas = $_REQUEST['data'];
			$index = $_REQUEST['index'];
			return update_data($datas,$tblID,$data_Index,$index);
		case 'delete_data':
			$tblID = $_REQUEST['tblID'];
			$data_Index = $_REQUEST['data_Index'];
			$index = $_REQUEST['index'];
			return delete_data($tblID,$data_Index,$index);
		default:
			// code...
			break;
	}

}


function getAllDatas(){
   	$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

	$sql = "SELECT * FROM tbl_projects GROUP BY p_code";

    $result = mysqli_query($db, $sql);


    $datas = [];
    if ($result->num_rows > 0) {
	  while($row = $result->fetch_assoc()) {
	    array_push($datas, $row);
	  }
	} 
	return $datas;
}

function getValue($p_code){
	// 	$db_server = 'localhost';
	// $db_username = "besiconm_project";
	// $db_password = '';
	// $db_database = 'besiconm_project';
	// $datas = ["app_val" => 0,"vo_val" => 0,"total_work_done" => 0,"cer_amount" => 0,"in_amount"=>0,"cl_retention"=>0,'sub_amount'=>0,'le_amount'=>0,'car_amount'=>0,'m_hours'=>0,'note_note' => ''];

	// Approved P.value
   	// $db = mysqli_connect($db_server,$db_username,$db_password,$db_database);
   	$db = dbconnection();
	$sql = "SELECT A.p_code,B.app_amount,C.vo_val,D.total_work_done,E.cer_amount,F.in_amount,D.cl_retention,G.note_note,D.cl_Amount_due,F.collections FROM tbl_projects A
	LEFT JOIN (SELECT SUM(app_amount) AS app_amount,p_code,app_id FROM tbl_approved WHERE p_code = '$p_code') B ON A.p_code = B.p_code
	LEFT JOIN (SELECT p_code,SUM(vo_amount) AS vo_val,vo_id FROM tbl_voval WHERE p_code = '$p_code') C ON A.p_code = C.p_code
	LEFT JOIN (SELECT p_code,(SUM(cl_vo)+SUM(cl_gross)) AS total_work_done,SUM(cl_retention) AS cl_retention,SUM(cl_vo)+SUM(cl_gross)-SUM(cl_retention)-SUM(cl_payment) AS cl_Amount_due,cl_id FROM tbl_claims WHERE p_code = '$p_code') D ON A.p_code = D.p_code
	LEFT JOIN (SELECT p_code,SUM(cer_amount) AS cer_amount,cer_id FROM tbl_certificate WHERE p_code = '$p_code') E ON A.p_code = E.p_code
	LEFT JOIN (SELECT p_code,SUM(in_amount) AS in_amount,in_id,SUM(paymentmade) AS collections FROM tbl_invoice WHERE p_code = '$p_code') F ON A.p_code = F.p_code
	LEFT JOIN (SELECT p_code,note_note  FROM tbl_notes  WHERE p_code = '$p_code') G ON A.p_code = G.p_code
	WHERE A.p_code = '$p_code' GROUP BY A.p_code";
	$result = mysqli_query($db,$sql);
	// print_r($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()){
			foreach($row as $key=>$val){
				$datas[$key] = $val;
			}
			
		}
	}

	$sql = "SELECT A.sub_amount,B.le_amount,C.car_amount,D.m_hours FROM (SELECT p_code,SUM(sub_amount) AS sub_amount FROM tbl_subcon WHERE p_code = '$p_code') A
LEFT JOIN (SELECT p_code,SUM(le_amount) AS le_amount FROM tbl_levy WHERE p_code = '$p_code') B ON A.p_code = B.p_code
LEFT JOIN (SELECT p_code,SUM(car_amount) AS car_amount FROM tbl_carinsurance WHERE p_code = '$p_code') C ON A.p_code = C.p_code
LEFT JOIN (SELECT p_code,SUM(m_hours) AS m_hours FROM tbl_manpower WHERE p_code = '$p_code') D ON A.p_code = D.p_code";

	$result = mysqli_query($db,$sql);

	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()){
			foreach($row as $key=>$val){
				$datas[$key] = $val;
			}
			
		}
	}



	echo json_encode($datas);
}


function get_details($p_code){
	
	$datas = [];
	$db_names = ['tbl_approved','tbl_voval','tbl_claims','tbl_certificate','tbl_invoice','tbl_subcon','tbl_levy','tbl_carinsurance','tbl_manpower','tbl_notes'];
	$db = dbconnection();

	for ($i=0; $i < count($db_names); $i++) { 
		$datas[$db_names[$i]] = [];

		if ($db_names[$i] == 'tbl_claims') {
			$sql = "SELECT *,(cl_gross+cl_vo) AS total_work_done,(cl_gross+cl_vo-cl_retention-cl_payment) AS amount_due,(cl_contractval+cl_voval) AS total,cl_id FROM tbl_claims WHERE p_code = '$p_code'";
		}else{
			$sql = "SELECT * FROM ".$db_names[$i]." WHERE p_code = '$p_code'";
		}
		
		$result = mysqli_query($db,$sql);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()){
				array_push($datas[$db_names[$i]],$row);
			}
		}
	}

	echo json_encode($datas);
}

function insert_project($data){
	$datas = [];
	$db_names = ['tbl_approved','tbl_voval','tbl_claims','tbl_certificate','tbl_invoice','tbl_subcon','tbl_levy','tbl_carinsurance','tbl_manpower','tbl_notes'];
	$db = dbconnection();

	//Check value
	$sql = "SELECT * FROM tbl_projects WHERE p_code = '".$data['p_code']."' AND company_value = '".$data['company_value']."' ";
    $result = mysqli_query($db, $sql);
    if ($result->num_rows > 0) {
    	echo "exist";
    	return;
    }

	$insertsql = "";
	$sql = "INSERT INTO tbl_projects(p_code,`date`,p_name,company_name,company_value,status,p_type,p_work,p_ic,include_material,p_award,start_date,complete_date) VALUES('".$data['p_code']."', '".$data['date']."', '".$data['p_name']."', '".$data['company_name']."', '".$data['company_value']."' , '".$data['status']."' , '".$data['p_type']."', '".$data['p_work']."', '".$data['p_ic']."', '".$data['include_material']."' , '".$data['p_award']."' , '".$data['start_date']."' , '".$data['complete_date']."')";
	$result = mysqli_query($db,$sql);
	// print_r($sql);
	echo "ok";
}


function update_project($data)
{
	
	$p_code = $data['p_code'];
	$db = dbconnection();

	//Check value
	$sql = "UPDATE tbl_projects SET p_code = '".$data['p_code']."' , `date`= '".$data['date']."' , p_name = '".$data['p_name']."' , company_name = '".$data['company_name']."' ,company_value = '".$data['company_value']."' , status= '".$data['status']."' , p_type = '".$data['p_type']."' , p_work = '".$data['p_work']."' , p_ic = '".$data['p_ic']."' , include_material = '".$data['include_material']."', p_award = '".$data['p_award']."' , start_date = '".$data['start_date']."' , complete_date = '".$data['complete_date']."' WHERE p_code = '".$p_code."'" ;
    $result = mysqli_query($db, $sql);
    echo "ok" ;
}

function delete_project($data)
{
	$db = dbconnection();
	$p_code = $data['p_code'];

	//Check value
	$sql = "DELETE FROM tbl_projects WHERE p_code = '".$p_code."'";
    $result = mysqli_query($db, $sql);
    echo "ok" ;
}

function insert_data($data,$tblID){
	$db = dbconnection();

	$keys = [];
	$values = [];
	foreach ($data as $key => $value) {
		array_push($keys,$key);
		array_push($values,$value);
	}
	$key_str = implode(",", $keys);
	$value_str = implode("','", $values);
	$sql = "INSERT INTO ".$tblID." ( ".$key_str." ) "." VALUE ( '".$value_str."' ) ";
	mysqli_query($db,$sql);
	echo "ok";


}

function update_data($datas,$tblID,$data_Index,$index)
{
	$db = dbconnection();

	$keys = [];
	foreach ($datas as $key => $value) {
		$tkey = $key."= '".$value."'";
		array_push($keys,$tkey);
	}
	$key_str = implode(",", $keys);
	$sql = "UPDATE ".$tblID." SET ".$key_str." WHERE ".$index." = '".$data_Index."'";
	mysqli_query($db,$sql);
	echo "ok";
}

function delete_data($tblID, $data_Index,$index)
{
	$db = dbconnection();

	$sql = "DELETE FROM ". $tblID." WHERE ".$index." = '".$data_Index."'";
	print_r($sql);
	mysqli_query($db,$sql);
	echo 'ok' ;
}

function dbconnection()
{
	$db_server = 'localhost';
	$db_username = "root";
	$db_password = '';
	$db_database = 'phpwork';
	$db = mysqli_connect($db_server,$db_username,$db_password,$db_database);
	return $db;
}

?>