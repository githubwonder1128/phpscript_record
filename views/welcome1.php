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
  <link href="../node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/jquery-3.6.0.min.js"></script>
  <script type="text/javascript"></script>
</head>
<body>
<style type="text/css">
   .row{
      margin-top: 30px!important;
      border: 1px solid #a0a6ad;
      padding: 10px;
   }
   label{
      text-align: center;
   }
   table{
      text-align: center;
   }
</style>
<div class="container-fluid mt-3">
  <h2>Welcome!</h2>
  <br>
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
   <div id="home" class="container-fluid tab-pane active"><br>
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
                        <td><?php echo $result[$i]['status'] == 1 ? "Active" : "Completed";?></td>
                        <td><?php echo $result[$i]['p_type'];?></td>
                        <td><?php echo $result[$i]['p_work'];?></td>
                        <td><?php echo $result[$i]['p_ic'];?></td>
                        <td><?php echo $result[$i]['include_material'] == 1 ? "YES" : "NO";?></td>
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
   <div id="menu1" class="container-fluid tab-pane fade"><br>
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
            </thead>
            <tbody id="de_mainPro">
               <?php
                  for ($i=0; $i < count($result); $i++) { ?>
                     <tr  onclick="get_details('<?php echo $result[$i]['p_code']?>')">
                        <td><?php echo $result[$i]['p_code'];?></td>
                        <td><?php echo $result[$i]['date'];?></td>
                        <td><?php echo $result[$i]['p_name'];?></td>
                        <td><?php echo $result[$i]['company_name'];?></td>
                        <td><?php echo $result[$i]['company_value'];?></td>
                        <td><?php echo $result[$i]['status'] == 1 ? "Active" : "Completed";?></td>
                        <td><?php echo $result[$i]['p_type'];?></td>
                        <td><?php echo $result[$i]['p_work'];?></td>
                        <td><?php echo $result[$i]['p_ic'];?></td>
                        <td><?php echo $result[$i]['include_material'] == 1 ? "YES" : "NO";?></td>
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
            <a class="nav-link" data-bs-toggle="tab" href="#tab-tbl_remarks">Remarks</a>
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
                  </thead>
                  <tbody id="tbl_certificate">
                     <tr>
                        <td colspan="6">NA</td>
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
                  </thead>
                  <tbody id="tbl_manpower">
                     <tr>
                        <td colspan="7">NA</td>
                     </tr>
                  </tbody>
               </table>
           </div>
           <div id="tab-tbl_remarks" class="container-fluid tab-pane fade">
               <table class="table table-hover">
                  <thead>
                     <tr>
                        <th>Remarks</th>
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
      console.log(parseInt("123"*12))
   })
   function get_vals(p_code) {
      $.post("../controller/ProjectController.php",{post_option : "get_vals",p_code : p_code},function (data,status) {
         var arr_val = JSON.parse(data);
         console.log(arr_val)
         var tmpstr = '';
         tmpstr += "<tr>";
         tmpstr += "<td>"+arr_val["app_val"]+"</td>";
         tmpstr += "<td>"+arr_val["vo_val"]+"</td>";
         tmpstr += "<td>"+arr_val["total_work_done"]+"</td>";
         tmpstr += "<td>"+arr_val["cl_Amount_due"]+"</td>";
         tmpstr += "<td>"+arr_val["cer_amount"]+"</td>";
         tmpstr += "<td>"+arr_val["in_amount"]+"</td>";
         tmpstr += "<td>NA</td>";
         tmpstr += "<td>"+arr_val["cl_retention"]+"</td>";
         tmpstr += "</tr>";
         $("#valuePro").html(tmpstr);

         var balpValue = parseFloat(arr_val["app_val"]*1)+parseFloat(arr_val["vo_val"]*1)-parseFloat(arr_val["total_work_done"]*1);
         var balCollect = 0-parseFloat(arr_val['cer_amount']*1);
         var balBill = 0 - parseFloat(arr_val["in_amount"]*1);

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

      })
   }

   function get_details(p_code){
      $.post("../controller/ProjectController.php",{post_option : "get_details",p_code : p_code},function (data,status) {
         console.log(data)
      var alldata = JSON.parse(data);
      console.log(alldata);
      var uploadbtn = '';
      uploadbtn += '<input class="sortpicture" type="file" name="sortpic" />';
      uploadbtn += '<button class="upload">Upload</button>';



      var detail_options = {'tbl_approved':['app_date','app_sel','app_amount','upload','app_doc_url'],
      'tbl_voval':["vo_date","vo_sel","vo_amount","upload","vo_doc_url"],
      'tbl_claims':["cl_date","cl_no","cl_ref","cl_contractval","cl_voval","total","cl_gross","cl_vo","total_work_done","cl_retention","cl_payment","amount_due","upload","cl_uploadrul"],
      'tbl_certificate':['cer_date','cer_no','cer_amount',"upload",'cer_uploadurl'],
      'tbl_invoice':[''],
      'tbl_subcon':['sub_date','sub_invoice','sub_description','sub_amount',"upload",'sub_uploadurl'],
      'tbl_levy':['le_date','le_invoice','le_amount',"upload",'le_uploadurl'],
      'tbl_carinsurance' : ['car_date','car_policy','car_date_due','car_amount',"upload",'car_uploadurl'],
      'tbl_manpower':['m_date','m_worker','m_workerid','m_hours',"upload",'m_uploadurl'],
      'tbl_notes':['note_note']};

      var an_ids = {'tbl_approved':"app_id",
      'tbl_voval':"vo_id",
      'tbl_claims':"cl_id",
      'tbl_certificate':"cer_id",
      'tbl_invoice':"in_id",
      'tbl_subcon':"sub_id",
      'tbl_levy':"le_id",
      'tbl_carinsurance' : "car_id",
      'tbl_manpower':"m_id",
      'tbl_notes':"no_id"};
      var uploadfile = ""

      for (tmp in alldata){
         var total = 0;
         var tmpstr = '';
         for (var i = 0; i < alldata[tmp].length; i++) {
           tmpstr += "<tr>";
           tmpstr += "<td>"+p_code+"</td>";
           for (var j = 0; j < detail_options[tmp].length; j++) {
            if (detail_options[tmp][j] == "upload") {
                tmpstr += "<td>"+'<input class="file_'+tmp+"-"+alldata[tmp][i][an_ids[tmp]]+'" type="file" name="sortpic" /><button onClick = "uploadExcel(\''+tmp+"-"+alldata[tmp][i][an_ids[tmp]] +'\')">Upload</button>'+"</td>";
             }else{
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
      calctotal();
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
</script>
</html>