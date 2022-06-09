<?php


if ( 0 < $_FILES['file']['error'] ) {
    echo 'Error: ' . $_FILES['file']['error'] . '<br>';
}
else {
    $option = $_POST['option'];
    $tmp = explode("-",$option);
    $tbl_name = $tmp[0];
    $id = $tmp[1];
    $nickname = date("Y-m-d-h-m-s")."_".$_FILES['file']['name'];

    $an_ids = ['tbl_approved'=>["url"=>"app_doc_url","id"=>"app_id"],
      'tbl_voval'=>["url"=>"vo_doc_url","id"=>"vo_id"],
      'tbl_claims'=>["url"=>"cl_uploadurl","id" => "cl_id"],
      'tbl_certificate'=>["url"=>"cer_uploadurl","id" => "cer_id"],
      'tbl_invoice'=>["url" => ["in_uploadurl",'payment_uploadurl'],"id"=>"in_id"],
      'tbl_subcon'=>["url" => "sub_uploadurl","id" => "sub_id"],
      'tbl_levy'=>["url"=>"le_uploadurl","id"=>"le_id"],
      'tbl_carinsurance' => ["url"=>"car_uploadurl","id"=>"car_id"],
      'tbl_manpower'=>["url"=>"m_uploadurl","id"=>"m_id"]];
    move_uploaded_file($_FILES['file']['tmp_name'], 'uploads/' . $nickname);
    $db_server = 'localhost';
    $db_username = "besiconm_project";
    $db_password = 'Abc120303!';
    $db_database = 'besiconm_project';
    $db = mysqli_connect($db_server,$db_username,$db_password,$db_database);
    if ($tbl_name == 'tbl_invoice') {
        $id = explode("_", $tmp[1])[0];
        $cnt = explode("_", $tmp[1])[1];
        $sql = "UPDATE ".$tbl_name." SET ".$an_ids[$tbl_name]['url'][$cnt]." = '".$nickname."' WHERE ".$an_ids[$tbl_name]['id']." = '".$id."'";
    }else{
        $sql = "UPDATE ".$tbl_name." SET ".$an_ids[$tbl_name]['url']." = '".$nickname."' WHERE ".$an_ids[$tbl_name]['id']." = '".$id."'";

    }
    $result = mysqli_query($db,$sql);

}
echo "Success";

?>