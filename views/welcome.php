<?php
   include('../session.php');
   include("../controller/ProjectController.php");

   $result = getAllDatas();
?>
<html lang="en">

<head>
  <title>Welcome</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/jquery-3.6.0.min.js"></script>
  <script type="text/javascript"></script>
</head>
<body>
<style type="text/css">
   .row{
      padding: 10px;
      -webkit-box-shadow: 0 0 5px 0px rgb(0 0 0 / 20%);
      border: 1px solid #d4d4d4;
      border-radius: 6px;
   }
   table{
      text-align: center;
   }
   tr:nth-child(odd) {
  background-color: #eee；
   }  
   thead{
      background-color: #eee;
   }
   label{
      cursor:pointer;
      /*background-color: #184db3;*/
      color: #fff;
      border: none;
      border-radius: 5px;
      width: 90px;
      height: 30px;
      margin-left: 10px;
      font-size:17px;
   }
   button{
      background-color:#184db3;
      color: #fff;
      border: none;
      border-radius: 5px;
      width: 90px;
      height: 30px;
      font-size: .725rem;
      margin-left:10px;
   }

   .nav-link{
      transition: all .2s ease-in-out;
   }
   .nav-link:hover{
      -webkit-box-shadow: 4px 4px 5px 0px rgb(0 0 0 / 20%);
   }
   .nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active{
      height:100%;
      background-color: #eee;
      -webkit-box-shadow: 4px 4px 5px 0px rgb(0 0 0 / 20%);
   }
   .nav-fill .nav-item .nav-link, .nav-justified .nav-item .nav-link {
      height:100%;
      display: flex;
    align-items: center;
   }
   tr:hover{
      -webkit-box-shadow: 0 0 5px 0px rgb(0 0 0 / 20%);
   }
   #tab-tbl_approved{
      padding:0px;
   }
   .tab-content, #tab-tbl_voval, #tab-tbl_claims, #tab-tbl_certificate, #tab-tbl_subcon, #tab-tbl_levy, #tab-tbl_carinsurance, #tab-tbl_manpower, #tab-tbl_remarks{
      padding:0px;
   }
</style>
<div class="container-fluid mt-3">
  <!-- Nav tabs -->
  <ul class="nav nav-tabs nav-justified" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" data-bs-toggle="tab" href="#home">Project Summary</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="tab" href="#menu1">Project details</a>
    </li>
  </ul>

  <!-- Tab panes -->
<div class="tab-content">
   <div id="home" class="container-fluid tab-pane active">
     
      <div class="row" style="height: 300px;overflow-x: auto;">
         <table class="table table-hover">
            <thead>
               <tr>
                  <th>P.Code</th>
                  <th>Date</th>
                  <th>P.Name</th>
                  <th>CompanyName</th>
                  <th>CompanyValue</th>
                  <th>P.status</th>
                  <th>P.Type</th>
                  <th>P.Work</th>
                  <th>PIC</th>
                  <th>Include Materials</th>
                  <th>Date Start Work</th>
                  <th>Date Completion</th>
                  <th>P.Award</th>
               </tr>
               
            </thead>
            <tbody id="mainPro">
               <?php
                  for ($i=0; $i < count($result); $i++) { ?>
                     <tr id = '<?php echo $result[$i]['p_code']?>'  onclick="get_vals('<?php echo $result[$i]['p_code']?>')">
                        <td><?php echo $result[$i]['p_code'];?></td>
                        <td><?php echo $result[$i]['date'];?></td>
                        <td><?php echo $result[$i]['p_name'];?></td>
                        <td><?php echo $result[$i]['company_name'];?></td>
                        <td><?php echo $result[$i]['company_value'];?></td>
                        <td><?php echo $result[$i]['status'] ;?></td>
                        <td><?php echo $result[$i]['p_type'];?></td>
                        <td><?php echo $result[$i]['p_work'];?></td>
                        <td><?php echo $result[$i]['p_ic'];?></td>
                        <td><?php echo $result[$i]['include_material'];?></td>
                        <td><?php echo $result[$i]['start_date'];?></td>
                        <td><?php echo $result[$i]['complete_date'];?></td>
                        <td><?php echo $result[$i]['p_award'];?></td>

                     </tr>
               <?php
                     
                  }
               ?>
            </tbody>
         </table>
      </div>

      <div class="row" style="margin-top: 20px;">
         <div class="col-md-8">
            <table class="table table-hover">
               <thead>
                  <tr>
                     <th>Approved P.Value</th>
                     <th>Approved V.O Value</th>
                     <th>Total Work Done</th>
                     <th>Amount Due To Claim</th>
                     <th>Payment Certificate</th>
                     <th>Invoice Billed</th>
                     <th>Collections</th>
                     <th>Retention Sum</th>
                  </tr>
               </thead>
               <tbody id="valuePro">
                  <tr>
                     <td>NA</td>
                     <td>NA</td>
                     <td>NA</td>
                     <td>NA</td>
                     <td>NA</td>
                     <td>NA</td>
                     <td>NA</td>
                     <td>NA</td>
                  </tr>
               </tbody>
            </table>
         </div>
         <div class="col-md-4">
            <table class="table table-hover">
               <thead>
                  <tr>
                     <th>Balance P. Value</th>
                     <th>Balance Collectible</th>
                     <th>Balance To Bill</th>
                  </tr>
               </thead>
               <tbody id="balancePro">
                  <tr>
                     <td>NA</td>
                     <td>NA</td>
                     <td>NA</td>
                  </tr>
               </tbody>
            </table>
         </div>
         
      </div>
      <div class="row">
         <table class="table table-hover">
            <thead>
               <tr>
                  <th>Sub Con Claims</th>
                  <th>CIDB LEVY</th>
                  <th>CAR Insurance</th>
                  <th>Man Power Hours</th>
               </tr>
            </thead>
            <tbody id="subPro">
               <tr>
                  <td>NA</td>
                  <td>NA</td>
                  <td>NA</td>
                  <td>NA</td>

               </tr>
            </tbody>
         </table>
      </div>
      <div class="row">
         <table class="table table-hover">
            <thead>
               <tr>
                  <th>Remarks</th>
               </tr>
            </thead>
            <tbody id="remarks">
               <tr>
                  <td>Non</td>
               </tr>
            </tbody>
         </table>
      </div>
      
   </div>
   <div id="menu1" class="container-fluid tab-pane fade">
       <div class="row">
         <button class="show_btn_project" id="edit_btn_project" style="width:120px;float: right;" onclick="editshow(1)">Edit</button>
         <button class="btn_project" id="insert_btn_project" style="width:120px;float: right;display: none;" onclick="insertdata(1)">Insert</button>
         <button class="btn_project" id="update_btn_project" style="width:120px;float: right;display: none;" onclick="updatedata(1)">Update</button>
         <button class="btn_project" id="delete_btn_project" style="width:120px;float: right;display: none;" onclick="deletedata(1)">Delete</button>
         
      </div>
      <div class="row" style="height: 500px;overflow-x: auto;">
         <table class="table table-hover">
            <thead>
               <tr>
                  <th>P.Code</th>
                  <th>Date</th>
                  <th>P.Name</th>
                  <th>CompanyName</th>
                  <th>CompanyValue</th>
                  <th>P.status</th>
                  <th>P.Type</th>
                  <th>P.Work</th>
                  <th>PIC</th>
                  <th>Include Materials</th>
                  <th>Date Start Work</th>
                  <th>Date Completion</th>
                  <th>P.Award</th>
               </tr>
               <tr id="tbl_summary_hide" style="display:none;">
                  
               </tr>

            </thead>
            <tbody id="de_mainPro">
               <?php
                  for ($i=0; $i < count($result); $i++) { ?>
                     <tr id="tbl_summary_<?php echo $result[$i]['p_code']?>" onclick="get_details('<?php echo $result[$i]['p_code']?>')">
                        <td><?php echo $result[$i]['p_code'];?></td>
                        <td><?php echo $result[$i]['date'];?></td>
                        <td><?php echo $result[$i]['p_name'];?></td>
                        <td><?php echo $result[$i]['company_name'];?></td>
                        <td><?php echo $result[$i]['company_value'];?></td>
                        <td><?php echo $result[$i]['status'] ;?></td>
                        <td><?php echo $result[$i]['p_type'];?></td>
                        <td><?php echo $result[$i]['p_work'];?></td>
                        <td><?php echo $result[$i]['p_ic'];?></td>
                        <td><?php echo $result[$i]['include_material'];?></td>
                        <td><?php echo $result[$i]['start_date'];?></td>
                        <td><?php echo $result[$i]['complete_date'];?></td>
                        <td><?php echo $result[$i]['p_award'];?></td>

                     </tr>
               <?php
                     
                  }
               ?>
            </tbody>
         </table>
      </div>

      <div class="row">
         <button style="width:120px;float: right;" onclick="editshow()">Edit</button>
         <button class="btn_detail" style="width:120px;float: right;display: none;" onclick="insertdata()">Insert</button>
         <button class="btn_detail" style="width:120px;float: right;display: none;" onclick="updatedata()">Update</button>
         <button class="btn_detail" style="width:120px;float: right;display: none;" onclick="deletedata()">Delete</button>
      </div>

      <div class="row">
         <ul class="nav nav-tabs nav-justified" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" data-bs-toggle="tab" href="#tab-tbl_approved">Approved P.value</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#tab-tbl_voval">Approved V.O.Value</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#tab-tbl_claims">Progress Claims</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#tab-tbl_certificate">Payment Certificate</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#tab-tbl_invoice">Invoice Billed</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#tab-tbl_subcon">SubCon</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#tab-tbl_levy">CIDB Levy</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#tab-tbl_carinsurance">Car Insurance</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#tab-tbl_manpower">Man Power Job Sheet</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#tab-tbl_notes">Remarks</a>
          </li>

        </ul>
        <div class="tab-content">
           <div id="tab-tbl_approved" class="container-fluid tab-pane active">
              <table class="table table-hover">
                  <thead>
                     <tr>
                        <th>P.Code</th>
                        <th>Date</th>
                        <th>Que/P.O/L.O.A</th>
                        <th>Amount(RM)</th>
                        <th>Upload Doc</th>
                        <th>View Doc</th>

                     </tr>
                     <tr id="tbl_approved_hide" class="edit_hide" style="display: none;">
                        
                     </tr>
                  </thead>
                  <tbody id="tbl_approved">
                     <tr>
                        <td colspan="6">NA</td>
                     </tr>
                  </tbody>
               </table>
           </div>
           <div id="tab-tbl_voval" class="container-fluid tab-pane fade">
               <table class="table table-hover">
                  <thead>
                     <tr>
                        <th>P.Code</th>
                        <th>Date</th>
                        <th>Que/P.O/L.O.A</th>
                        <th>Amount(RM)</th>
                        <th>Upload Doc</th>
                        <th>View Doc</th>

                     </tr>
                     <tr id="tbl_voval_hide" class="edit_hide" style="display:none;">
                        
                     </tr>
                  </thead>
                  <tbody id="tbl_voval">
                     <tr>
                        <td colspan="6">NA</td>
                     </tr>
                  </tbody>
               </table>
           </div>

           <div id="tab-tbl_claims" class="container-fluid tab-pane fade">
               <table class="table table-hover">
                  <thead>
                     <tr>
                        <th>P.Code</th>
                        <th>P.C.Date</th>
                        <th>P.C.NO</th>
                        <th>P.C Ref</th>
                        <th>Contract Value</th>
                        <th>V.O Value</th>
                        <th>Total Contract Value</th>
                        <th>Gross Work Done</th>
                        <th>V.O Done</th>
                        <th>Total Work Done</th>
                        <th>Less Retention</th>
                        <th>Less Payment</th>

                        <th>Amount Due to Clain</th>
                        <th>Upload Doc</th>
                        <th>View Doc</th>
                     </tr>
                     <tr id="tbl_claims_hide" class="edit_hide" style="display : none;">
                        
                     </tr>
                  </thead>
                  <tbody id="tbl_claims">
                     <tr>
                        <td colspan="15">NA</td>
                     </tr>
                  </tbody>
               </table>
           </div>

           <div id="tab-tbl_certificate" class="container-fluid tab-pane fade">
               <table class="table table-hover">
                  <thead>
                     <tr>
                        <th>P.Code</th>
                        <th>Date</th>
                        <th>Certificate NO.</th>
                        <th>Amount(RM)</th>
                        <th>Upload Doc</th>
                        <th>View Doc</th>

                     </tr>
                     <tr id="tbl_certificate_hide" class="edit_hide" style="display : none;">
                        
                     </tr>
                  </thead>
                  <tbody id="tbl_certificate">
                     
                     <tr>
                        <td colspan="6">NA</td>
                     </tr>
                  </tbody>
               </table>
           </div>
           <div id="tab-tbl_invoice" class="container-fluid tab-pane fade">
               <table class="table table-hover">
                  <thead>
                     <tr>
                        <th>P.Code</th>
                        <th>Date</th>
                        <th>Invoice NO.</th>
                        <th>Invoice Amount</th>
                        <th>Upload </th>
                        <th>View</th>
                        <th>PaymentDate</th>
                        <th>Folio</th>
                        <th>Payment Made</th>
                        <th>Upload</th>
                        <th>View</th>

                     </tr>
                     <tr id="tbl_invoice_hide" class="edit_hide" style="display : none;">
                        
                     </tr>
                  </thead>
                  <tbody id="tbl_invoice">
                     <tr>
                        <td colspan="12   ">NA</td>
                     </tr>
                  </tbody>
               </table>
           </div>
           <div id="tab-tbl_subcon" class="container-fluid tab-pane fade">
               <table class="table table-hover">
                  <thead>
                     <tr>
                        <th>P.Code</th>
                        <th>Date</th>
                        <th>Invoice No</th>
                        <th>Description</th>
                        <th>Amount(RM)</th>
                        <th>Upload Doc</th>
                        <th>View Doc</th>

                     </tr>
                     <tr id="tbl_subcon_hide" class="edit_hide" style="display : none;">
                        
                     </tr>
                  </thead>
                  <tbody id="tbl_subcon">
                     <tr>
                        <td colspan="7">NA</td>
                     </tr>
                  </tbody>
               </table>
           </div>
           <div id="tab-tbl_levy" class="container-fluid tab-pane fade">
               <table class="table table-hover">
                  <thead>
                     <tr>
                        <th>P.Code</th>
                        <th>Date</th>
                        <th>Invoice No</th>
                        <th>Amount(RM)</th>
                        <th>Upload Doc</th>
                        <th>View Doc</th>

                     </tr>
                     <tr id="tbl_levy_hide" class="edit_hide" style="display:none;">
                        
                     </tr>
                  </thead>
                  <tbody id="tbl_levy">
                     <tr>
                        <td colspan="6">NA</td>
                     </tr>
                  </tbody>
               </table>
           </div>
           <div id="tab-tbl_carinsurance" class="container-fluid tab-pane fade">
              <table class="table table-hover">
                  <thead>
                     <tr>
                        <th>P.Code</th>
                        <th>Date</th>
                        <th>Policy No</th>
                        <th>Date Due</th>
                        <th>Amount</th>
                        <th>Upload Doc</th>
                        <th>View Doc</th>

                     </tr>
                     <tr id="tbl_carinsurance_hide" class="edit_hide" style="display : none;">
                        
                     </tr>
                  </thead>
                  <tbody id="tbl_carinsurance">
                     <tr>
                        <td colspan="7">NA</td>
                     </tr>
                  </tbody>
               </table>
           </div>

           <div id="tab-tbl_manpower" class="container-fluid tab-pane fade">
              <table class="table table-hover">
                  <thead>
                     <tr>
                        <th>P.Code</th>
                        <th>Date</th>
                        <th>Worker Name</th>
                        <th>Worker ID</th>
                        <th>Hours</th>
                        <th>Upload Doc</th>
                        <th>View Doc</th>

                     </tr>
                     <tr id="tbl_manpower_hide" class="edit_hide" style="display : none;">
                        
                     </tr>
                  </thead>
                  <tbody id="tbl_manpower">
                     <tr>
                        <td colspan="7">NA</td>
                     </tr>
                  </tbody>
               </table>
           </div>
           <div id="tab-tbl_notes" class="container-fluid tab-pane fade">
               <table class="table table-hover">
                  <thead>
                     <tr>
                        <th>P.Code</th>
                        <th>Remarks</th>
                     </tr>
                     <tr id="tbl_notes_hide" class="edit_hide" style="display : none;">
                     </tr>
                  </thead>
                  <tbody id="tbl_notes">
                     <tr>
                        <td>NA</td>
                     </tr>
                  </tbody>
               </table>
           </div>

        </div>
         
      </div>

    </div>
  </div>
</div>

</body>
<script type="text/javascript">
   $(document).ready(function (argument) {
      $("#mainPro tr").filter(function(){
         $(this).children("td").filter(function(){
            if ($(this).text() == "active") {
               $(this).parent().css("background-color","green")
            }
            if ($(this).text() == "complete") {
               $(this).parent().css("background-color","orange")
            }
         })
      })
      $("#de_mainPro tr").filter(function(){
         $(this).children("td").filter(function(){
            if ($(this).text() == "active") {
               $(this).parent().css("background-color","green")
            }
            if ($(this).text() == "complete") {
               $(this).parent().css("background-color","orange")
            }
         })
      })

      var xx = numberWithCommas("werwrwwrr");
      $("table tr").filter(function(){
         $(this).children("td").filter(function(){
            var txt = $(this).text();
            if (txt * 1 > 0) {
               $(this).text(numberWithCommas(txt));

            }
         })
      })
   })
   var clickRow = "";
   var global_p_code = '';
   var global_tbl_name = 'tbl_approved';

   function numberWithCommas(x) {
       return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
   }
   var detail_options = {
      'tbl_summary' : ['p_code','date','p_name','company_name','company_value','status','p_type','p_work','p_ic','include_material','start_date','complete_date','p_award'],
      'tbl_approved':['p_code','app_date','app_sel','app_amount','upload','app_doc_url'],
      'tbl_voval':['p_code',"vo_date","vo_sel","vo_amount","upload","vo_doc_url"],
      'tbl_claims':['p_code',"cl_date","cl_no","cl_ref","cl_contractval","cl_voval","total","cl_gross","cl_vo","total_work_done","cl_retention","cl_payment","amount_due","upload","cl_uploadurl"],
      'tbl_certificate':['p_code','cer_date','cer_no','cer_amount',"upload",'cer_uploadurl'],
      'tbl_invoice':['p_code','in_date','in_no','in_amount','upload','in_uploadurl','payment_date','folio','paymentmade','upload','payment_uploadurl'],
      'tbl_subcon':['p_code','sub_date','sub_invoice','sub_description','sub_amount',"upload",'sub_uploadurl'],
      'tbl_levy':['p_code','le_date','le_invoice','le_amount',"upload",'le_uploadurl'],
      'tbl_carinsurance' : ['p_code','car_date','car_policy','car_date_due','car_amount',"upload",'car_uploadurl'],
      'tbl_manpower':['p_code','m_date','m_worker','m_workerid','m_hours',"upload",'m_uploadurl'],
      'tbl_notes':['p_code','note_note']};

   var an_ids = {'tbl_approved':"app_id",
      'tbl_voval':"vo_id",
      'tbl_claims':"cl_id",
      'tbl_certificate':"cer_id",
      'tbl_invoice':"in_id",
      'tbl_subcon':"sub_id",
      'tbl_levy':"le_id",
      'tbl_carinsurance' : "car_id",
      'tbl_manpower':"m_id",
      'tbl_notes':"note_id"};

   function get_vals(p_code) {
      $.post("../controller/ProjectController.php",{post_option : "get_vals",p_code : p_code},function (data,status) {
         console.log(data)
         var arr_val = JSON.parse(data);
         console.log(arr_val)
         var tmpstr = '';
         tmpstr += "<tr>";
         tmpstr += "<td>"+arr_val["app_amount"]*1+"</td>";
         tmpstr += "<td>"+arr_val["vo_val"]*1+"</td>";
         tmpstr += "<td>"+arr_val["total_work_done"]*1+"</td>";
         tmpstr += "<td>"+arr_val["cl_Amount_due"]*1+"</td>";
         tmpstr += "<td>"+arr_val["cer_amount"]*1+"</td>";
         tmpstr += "<td>"+arr_val["in_amount"]*1+"</td>";
         tmpstr += "<td>"+arr_val["collections"]+"</td>";
         tmpstr += "<td>"+arr_val["cl_retention"]*1+"</td>";
         tmpstr += "</tr>";
         $("#valuePro").html(tmpstr);

         var balpValue = parseFloat(arr_val["app_val"]*1)+parseFloat(arr_val["vo_val"]*1)-parseFloat(arr_val["total_work_done"]*1);
         var balCollect = parseFloat(arr_val["collections"]*1)-parseFloat(arr_val['cer_amount']*1);
         var balBill = parseFloat(arr_val["cl_Amount_due"]*1) - parseFloat(arr_val['in_amount']*1);

         var balhtml = "";
         balhtml += "<tr>";
         balhtml += "<td>"+balpValue+"</td>";
         balhtml += "<td>"+balCollect+"</td>";
         balhtml += "<td>"+balBill+"</td>";
         balhtml += "</tr>";
         $("#balancePro").html(balhtml);

         var subhtml = "";
         subhtml += "<tr>";
         subhtml += "<td>"+arr_val['sub_amount']+"</td>";
         subhtml += "<td>"+arr_val['le_amount']+"</td>";
         subhtml += "<td>"+arr_val['car_amount']+"</td>";
         subhtml += "<td>"+arr_val['m_hours']+"</td>";

         subhtml += "</tr>";
         $("#subPro").html(subhtml);

         var remarkhtml = "";
         remarkhtml += "<tr>";
         remarkhtml += "<td>"+arr_val['note_note']+"</td>";
         remarkhtml += "</tr>";
         $("#remarks").html(remarkhtml);
         $("table tbody tr").filter(function(){
            $(this).children("td").filter(function(){
               var txt = $(this).text();
               if (txt * 1 > 0) {
                  $(this).text(numberWithCommas(txt));

               }
            })
         })
      })
   }

   function get_details(p_code){
      $.post("../controller/ProjectController.php",{post_option : "get_details",p_code : p_code},function (data,status) {
         // console.log(data)
      var alldata = JSON.parse(data);
      // console.log(alldata);
      var uploadbtn = '';
      uploadbtn += '<input class="sortpicture" type="file" name="sortpic" />';
      uploadbtn += '<button class="upload">Upload</button>';

      global_p_code = p_code;
      
      var uploadfile = ""

      for (tmp in alldata){
         var total = 0;
         var tmpstr = '';
         for (var i = 0; i < alldata[tmp].length; i++) {
           tmpstr += "<tr onClick = 'editDet(id)' id = 'detail__"+tmp+"__"+p_code+"__"+alldata[tmp][i][an_ids[tmp]]+"'>";
           // tmpstr += "<td>"+p_code+"</td>";
            var invoiceinit = 0;

           for (var j = 0; j < detail_options[tmp].length; j++) {
            if (detail_options[tmp][j] == "upload") {
               if (tmp == "tbl_invoice") {

               tmpstr += '<td style="display: flex;flex-direction: column;gap: 10px;align-items: center;">'+'<label for="inputTag"><input style="" class="file_'+tmp+"-"+alldata[tmp][i][an_ids[tmp]]+"_"+invoiceinit+'" type="file" name="sortpic" /></label><button onClick = "uploadExcel(\''+tmp+"-"+alldata[tmp][i][an_ids[tmp]]+"_"+invoiceinit +'\')">Upload</button>'+"</td>"
               invoiceinit ++;
               }else{
                tmpstr += '<td style="display: flex;flex-direction: column;gap: 10px;align-items: center;">'+'<label for="inputTag"><input style="" class="file_'+tmp+"-"+alldata[tmp][i][an_ids[tmp]]+'" type="file" name="sortpic" /></label><button onClick = "uploadExcel(\''+tmp+"-"+alldata[tmp][i][an_ids[tmp]] +'\')">Upload</button>'+"</td>";                  
               }
             }else if(detail_options[tmp][j].search("url") >= 0){
               tmpstr += "<td class='"+detail_options[tmp][j]+"'>"+"<a href = '../uploads/"+alldata[tmp][i][detail_options[tmp][j]]+"'>"+alldata[tmp][i][detail_options[tmp][j]]+"</a></td>";
             }

             else{
              tmpstr += "<td class='"+detail_options[tmp][j]+"'>"+alldata[tmp][i][detail_options[tmp][j]]+"</td>";
             }
           }
          
           tmpstr += "</tr>";
         }
         tmpstr += "<tr>";
         tmpstr += "<td style='text-align:center;color:red' class='tot_amount' colspan='"+(detail_options[tmp].length+2)+"'>"+"</td>";
         tmpstr += "</tr>";
         $("#"+tmp).html(tmpstr);
      }
      editValue('tbl_summary',p_code);

      calctotal();
      $("table tr").filter(function(){
         $(this).children("td").filter(function(tmp){

            var txt = $(this).html();
            console.log(txt)
            if (txt * 1 > 0 ) {
               $(this).text(numberWithCommas(txt));

            }
         })
      })

      });
      
   }

   function calctotal(){
      var simplecalcAmount = {'tbl_approved':'app_amount','tbl_voval':'vo_amount','tbl_invoice':'in_amount','tbl_certificate':'cer_amount','tbl_subcon':'sub_amount','tbl_levy':"le_amount",'tbl_carinsurance':"car_amount",'tbl_manpower':"m_hours"};
      for(x in simplecalcAmount){
         var total = 0;
         for (var j = 0; j < $("."+simplecalcAmount[x]).length; j++) {
            total += $("."+simplecalcAmount[x])[j].innerText*1;
         }
         $("#"+x+" .tot_amount").html("Total : "+total);
      }

      var complexCalc = {'tbl_claims':['total_work_done','cl_retention','amount_due']};
      var total = {};

      for(tbl_name in complexCalc){
         for (var i = 0; i < complexCalc[tbl_name].length; i++) {
            total[complexCalc[tbl_name][i]] = 0;

            for (var j = 0; j < $("."+complexCalc[tbl_name][i]).length; j++) {
               total[complexCalc[tbl_name][i]] += $("."+complexCalc[tbl_name][i])[j].innerText*1;   
            }
         }
         
      }
      $("#tbl_claims .tot_amount").html("Total Work Done : " + total['total_work_done'] + " Retension Sum : "+ total['cl_retention'] + " Amount Due To Cliam : "+total['amount_due'])

   }

   function uploadExcel(tmp){
      console.log($('.file_'+tmp));
      var file_data = $('.file_'+tmp).prop('files')[0];
       var form_data = new FormData();                  
       form_data.append('file', file_data);
       form_data.append("option",tmp);                            
       $.ajax({
           url: '../excelUpload.php', // <-- point to server-side PHP script 
           cache: false,
           contentType: false,
           processData: false,
           data: form_data,                         
           type: 'post',
           success: function(php_script_response){
               alert(php_script_response); // <-- display response from the PHP script, if any
           }
        });
   }





   function editshow(page = 0) {
      
      var selects = {'company_value' : [1,2,3,4,5,6,7,8],'status':['active','complete'],'p_type':['Main cone','Sub-con'],'p_work':['Steel Trusses','Steel Trusses & Roofing','Fbarication Only','Fbarication & Install','Others'],'p_ic':['WYF','WKL','WkM','CMH','Other'],'include_material':['YES','NO'],'p_award':['Letter of Award','Approved Quotation','Purchase Order','Verbally','None']}
      if (page == 1) {
         var id = "tbl_summary";
         var btnclass = "edit_project"
         $("#"+id+"_hide").toggle();
         $(".btn_project").toggle();
         var hidehtml = "";

      }else{
         var btnclass = 'edit_detail'
         var id = $(".container-fluid .tab-pane .active tbody").attr("id");
         $("#"+id+"_hide").toggle();
         $(".btn_detail").toggle();
         var hidehtml = "<td></td>";

      }

      for (var i = 1 - page; i < detail_options[id].length; i++) {
         if (detail_options[id][i] == "upload" || detail_options[id][i].search("url") >= 0 || detail_options[id][i].search('total') >= 0 || detail_options[id][i].search("amount_due") >= 0) {
            hidehtml += "<td></td>"
         }
         else{
            console.log(detail_options[id][i])
            if (selects[detail_options[id][i]] != undefined) {
               hidehtml += "<td>";
               hidehtml += "<select class='form-control "+btnclass+"' id = '"+detail_options[id][i]+"' >";
               for (var j = 0; j < selects[detail_options[id][i]].length; j++) {
                  hidehtml += "<option>"+selects[detail_options[id][i]][j]+"</option>"
               }
               hidehtml += "</select>";
            }else{
               var inputtype = "text"
               console.log(detail_options[id][i].search("date"))
               if (detail_options[id][i].search("date") >= 0) {
                  inputtype = "date"
               }
               hidehtml += "<td>"+"<input id = '"+detail_options[id][i]+"'  class='form-control "+btnclass+"' type = '"+inputtype+"'>"+"</td>";
            }
         }
      }
      $("#"+id+"_hide").html(hidehtml);
      

   }

   var data_Index = 1;

   $("#menu1 .nav-link").click(function(){
      global_tbl_name = $(this).attr("href").split("-")[1];
      $(".btn_detail").hide();
      $(".edit_hide").hide();
   })
   function editValue(tablename,p_code,check = 1){
      if (check == 1) {
         // $(".file_")
         console.log("koko",tablename,p_code)
         $("#"+tablename+"_"+p_code + " td").filter(function (temp) {
            $("#"+detail_options[tablename][temp]).val($(this).text())
         })
         $(".edit_detail").hide()
      }else{
         console.log($("#"+tablename+"_"+p_code))
         $("#"+tablename+"_"+p_code + " td").filter(function (temp) {
            console.log("editvalue",temp,tablename,p_code)
            $("#detail_"+detail_options[tablename][temp]).val($(this).text())
         })
      }
      
   }

   function editDet(complex){
      console.log(complex)
      var tablename = complex.split("__")[1];
      var p_code = complex.split("__")[2];
      data_Index = complex.split("__")[3];
      console.log(tablename,data_Index)
      global_tbl_name = tablename;
         // console.log($("#detail/"+tablename+"/"+p_code))
         $("#"+complex + " td").filter(function (temp) {
            $("#"+detail_options[tablename][temp]).val($(this).text())
         })
      
   }

   function insertdata(page = 0) {
      if (page == 1) {
         var editcom = $(".edit_project");
         var datas = {};
         $(".edit_project").filter(function(temp){
            var id = $(this).attr("id");
            datas[id] = $(this).val();
         })
         // datas['p_code'] = global_p_code;
         $.post("../controller/ProjectController.php",{post_option : "insert_project",data : datas,p_code : global_p_code},function (data,status) 
         {
            console.log(data)
            if (data == 'exist') {
               alert("Data is already existed!")
            }else{
               alert("Success!")
            }

         })
      }else{
         var editcom = $(".edit_detail");
         var datas = {};
         $("#"+global_tbl_name+"_hide "+".edit_detail").filter(function(temp){
            var id = $(this).attr("id");
            console.log($(this).val())
            if ($(this).val() != '' ||  $(this).val() != undefined) {
               datas[id] = $(this).val()
            }
         })
         datas['p_code'] = global_p_code;
         $.post("../controller/ProjectController.php",{post_option : "insert_data",data : datas,tblID : global_tbl_name},function (data,status) 
         {
            console.log(data)
            if (data == 'exist') {
               alert("Data is already existed!")
            }else{
               alert("Success!")
            }

         })
      }
      
   }
   function updatedata(page = 0) {
      if (page == 1) {
         var editcom = $(".edit_project");
         var datas = {};
         $(".edit_project").filter(function(temp){
            var id = $(this).attr("id");
            datas[id] = $(this).val()
         })
         datas['p_code'] = global_p_code;

         $.post("../controller/ProjectController.php",{post_option : "update_project",data : datas},function (data,status) 
         {
            console.log(data)
            alert("Success!")

         })
      }else{
         var editcom = $(".edit_detail");
         var datas = {};

         $("#"+global_tbl_name+"_hide "+".edit_detail").filter(function(temp){
            var id = $(this).attr("id");
            datas[id] = $(this).val()
         })
         datas['p_code'] = global_p_code;

         console.log(datas,data_Index,global_tbl_name,an_ids[global_tbl_name]);
         $.post("../controller/ProjectController.php",{post_option : "update_data",data : datas,data_Index : data_Index,tblID : global_tbl_name,index : an_ids[global_tbl_name]},function (data,status) 
         {
            console.log(data)
            if (data == 'exist') {
               alert("Data is already existed!")
            }else{
               alert("Success!")
            }

         })
      }
      
   }
   function deletedata(page = 0) {
      if (page == 1) {
         var editcom = $(".edit_project");
      var datas = {};
      $(".edit_detail").filter(function(temp){
         var id = $(this).attr("id");
         datas[id] = $(this).val()
      })
         $.post("../controller/ProjectController.php",{post_option : "delete_project",data : datas},function (data,status) 
         {
            console.log(data)
            alert("Success!")

         }) 
      }else{
         $.post("../controller/ProjectController.php",{post_option : "delete_data",data_Index : data_Index,tblID : global_tbl_name,index : an_ids[global_tbl_name]},function (data,status) 
         {
            console.log(data)
            alert("Success!")

         })
      }
      
   }
</script>
</html>