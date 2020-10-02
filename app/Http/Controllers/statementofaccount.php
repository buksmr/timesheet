<!DOCTYPE html>
<html>
<?php 
include("config/header.php"); 

//$audittrail = "INSERT INTO audittables(`application_name`,`functions`, `username`,`date`,`description`,`status`,`ip_address`,`host_name`) VALUES ('User Creation Form','$functions','$username','$date1','$username access User Creation Form at $time on a computer with IP address $ipaddress and Computer name $hostname ','Successful','$ipaddress','$hostname')";
        		
//$auditquiry = mysqli_query($dbc,$audittrail) or mysqli_connect_error("Error");
			global $fieldname;		

?>


  


<?php
						
GLOBAL $id,$dbc,$ACCOUNTSTATUS;
			
						
                          //Accountstatment($CUSTOMERID);
							
							
							?>
                        



  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>INLAKS CRM</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Google fonts - Roboto -->
   <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="css/organicfoodicons.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
  
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/favicon.ico">
    <!-- Font Awesome CDN-->
    <!-- you can replace it by local Font Awesome-->
   <!-- <script src="https://use.fontawesome.com/99347ac47f.js"></script>
    <!-- Font Icons CSS-->
  <!--  <link rel="stylesheet" href="https://file.myfontastic.com/da58YPMQ7U5HY8Rb6UxkNf/icons.css">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		
<style>
hr { 
    display: block;
    margin-top: 1.5em;
    margin-bottom: 1.5em;
    margin-left: auto;
    margin-right: auto;
    border-style: inset;
    border-width: 10px;
} 

table.check {
   
  border-collapse: collapse;
  width: 100%;
  font-size: 13px;
  color: #000000
}

td.border_class, th.border_class1 {
  border: 1px solid #dddddd;
   
  text-align: left;
     
 
}
td:nth-child(5), td:nth-child(6), td:nth-child(7){
	 text-align: right;
	
}
th:nth-child(5), th:nth-child(6), th:nth-child(7){
	 text-align: righ
	
}

td.border_class:nth-child(1), td.border_class:nth-child(4){

}
td.border_class:nth-child(2){
	
}
#forward{
 display:inline;   
}

#last, #credits, #debits{
 display:inline;   
}

</style>


<script language="javascript">
function printdiv(printpage)
{
var headstr = "<html><head><title>andrews</title></head><body>";
var footstr = "</body>";
var newstr = document.all.item(printpage).innerHTML;
var oldstr = document.body.innerHTML;
document.body.innerHTML = headstr+newstr+footstr;
window.print();
document.body.innerHTML = oldstr;

return false;
}


$(".fdate").datepicker( "setDate" , "7/11/2011" );


</script>

		
  </head>
  <body>
    <div class="page home-page">
      <!-- Main Navbar-->
	  
	  <!-- Top Header Navbar-->
      <?php  include("config/topheader.php")  ?>
	  <!--End of Top Header-->
	  
      <div class="page-content d-flex align-items-stretch">
        <!-- Side Navbar -->
        
		<?php// include("config/crmadminmenu.php"); ?>
		<?php include("config/$menu") ?>
		<!-- End Side Navbar -->
		
		<?php

		//SELECT P.Name, P.Playernr, SUM (F.Amount)FROM FINES F INNER JOIN PLAYERS P ON F.Playernr = P.Playernr
//GROUP BY  P.Name,P.Playernr

		//*FIX TO ALLOW BVN DISPLAY-15/11/2018***//



		
		/////echo $custbvn;
		//**END OF FIX**//
		
		 
	//$q = mysqli_query($dbc,"SELECT SUM(`DR_AMT`) as totaldebit, SUM(`CR_AMOUNT`) as totalcredit FROM `t24customerstatement` where  `accountnumber`='$CUSTOMERID'");
		
		$accountinfor = mysqli_query($dbc,"SELECT  * from `heritageaccountviewtable`  where `ID`='$CUSTOMERID'");
		
		//$branchnames = mysqli_query($dbc,"SELECT * FROM `t24customerstatement` where `accountnumber`='$CUSTOMERID'");
		
		
		 
		
		if($_POST){
			
			
			
				$accounttype11=@$_POST['accounttype11'];


				$CUSTOMERID=@$_POST['CUSTOMERID'];

				$CUSTOMERID=@$_POST['CUSTOMERID'];
							

							
				//$cash_collatory=$_POST['cash_collatory'];
				//$accountid=$_POST['accountid'];
				$fdate=@$_POST['fdate'];
				$tdate=@$_POST['tdate'];

				//$fdate1=date_format($fdate,"Y/m/d");
				//$tdate1=date_format($tdate,"Y/m/d");

				$date1 = strtotime($fdate); 
				$date2 = strtotime($tdate); 

				$fdate = strtotime($fdate); 
				$tdate = strtotime($tdate);

				//$fdate = strtoupper(date('d M y', $date1));

				//$tdate = strtoupper(date('d M y', $date2));


				$fdate1 = date('Ymd', $date1);

				$tdate1 = date('Ymd', $date2);

				//echo $tdate1;
				switch($accounttype11)
				{
					case('T24'):
					$fieldname='ACCOUNT';
					break;
					
					
					case('Old'):
					
					$fieldname='ACCOUNT';
					
					break;
					
					case('Num'):
					
					$fieldname='ACCOUNT';
					
					break;
					
					default:
					
					$fieldname='ACCOUNT';
					
				}


								
			
		}
		


 
		
		?>
		
		
        <div class="content-inner">
          <!-- Page Header-->
          <header class="page-header">
            <div class="container-fluid">
              <h2 class="no-margin-bottom">Account Statement</h2>
            </div>
          </header>
          
		  <section class="dashboard-header">
            <div class="container-fluid">
              <div class="row">
                <!-- Statistics -->
                <div class="col-lg-12">
                


				<div class="statistic d-flex align-items-center bg-white has-shadow">
				
				
					
            <form class="form-horizontal" method="POST" enctype="multipart/form-data">
                <div class="row">
                    
                    
					<div class="col-lg-3">
					


<label for="accountid" class="control-label">Account Type <?php  echo "$accounttype11"; ?></label><br>
	
 <select class="form-control" id="accounttype11" placeholder="Enter Account Number" name="accounttype11">

 <option value="T24">T24 Account Number</option>
 <option value="Old">Legacy Account Number</option>
 <option value="Num">Nuban Account Number</option>

</select>			
		
                                       
					</div>
					
					
					
					<div class="col-lg-3">
					


<label for="accountid" class="control-label">Account Number <?php  echo "$CUSTOMERID"; ?></label><br>
	<input type="text" class="form-control" id="CUSTOMERID" placeholder="Enter Account Number" name="CUSTOMERID" value="<?php  echo "$CUSTOMERID"; ?>">
                   				
		
                                       
					</div>
					
		
					
					<div class="ccol-lg-2">
					
	<label for="accountid" class="control-label">Search From: <?php  echo $fromdate=date('d M y', $fdate); //"$fdate"; ?></label><br>
	<input type="date" class="form-control" id="fdate" placeholder="Search From" name="fdate">
                   				
					</div>
					
					
					
					<div class="col-lg-2">
					
	<label for="accountid" class="control-label">Search To: <?php  echo $todate=date('d M y', $tdate); ?></label><br>
	<input type="date" class="form-control" id="tdate" placeholder=" " name="tdate">
              
			 </div>
			  
<div class="col-lg-1">
			  <label for="accountid" class="control-label">Submit:</label><br>
<button type="button" name="add" id="ssubmit" class="btn btn-success btn-sm">Submit</button>					
					</div>
					
					
                </div>
            </form>
       
				<?php  
					
		//$CRMDATA =mysqli_query($dbc,"INSERT INTO `t24customerstatement`(`accountnumber`,`POST`, `REFNO`, `NARRATIVE`, `VALDESC`, `DR_AMT`, `CR_AMOUNT`, `BALANCE`) VALUES('$CUSTOMERID','$cellscrm[1]','$cellscrm[3]','$cellscrm[5]','$cellscrm[7]','$cellscrm[9]','$cellscrm[11]','$cellscrm[13]') ON DUPLICATE KEY UPDATE `status` ='Active',`transactionmode`='Online'");
					
				?>
				
                    
				 </div>
 				  
                </div>
                <!-- Line Chart            -->
                
                
				
				
              </div>
            </div>
          </section>
		  
		  
		  
		  <center>
		 <section class="dashboard-counts no-padding-bottom">
		 
		
		 &nbsp;&nbsp;<button  onClick="printdiv('div_print');">Print Statement</button>
		 
            <div class="container-fluid center" id="div_print">
			
			
			<?php //include("config/dashboardcounts.php"); 

								//$accountid="14378";
//ID,NAME,CONTACT.DATE,CONTACT.STATUS,CONTACT.DESC,CR.ACTION	

$imagereference=mysqli_query($dbc,"Select * from `heritagecustomerimages` where `IMAGE_REFERENCE`='$CUSTOMERID'");
				$imagereferencedata = mysqli_fetch_assoc($imagereference);		
			$imagerefeid=$imagereferencedata['IMAGE'];
										
			$image11 = file_get_contents("$t24imagepath/$imagerefeid");
			$image_codes = base64_encode($image11);	
			
//echo "<br>$t24imagepath - $imagerefeid<br>";


		  ?>
			
              
				 <table border="1" class="table table-bordered" id="datatable-buttons1" width="80%" style="height:10px; overflow:auto;">
				<tr>
				
				
				<td width="10%"> 
				<br>
				<img src="img/idpictures.jpg" alt="..." class="" height="100"> 
				</td>
				
				
				<td colspan="3">
				<center>
				<?php echo "<h4>NPF MICROFINANCE BANK</h4> "; 
							echo "$companyactualname <br>";
							// echo  "Reporting Date: $dat - $todate <br>";
							echo  "<font color='blue'>Account Statement </font><br>";
				?>  
				<label><b><i>Date Printed:<?php //echo date('Y/m/d'); 
				
				
				echo date('Y/m/d h:s'); ?></i></label>
				</center>   
				</td>
				
				
				
				</tr>
				<tr>
				<?php 
					
					
					
					//$npfbranchcode=$data['npfbranchcode']; 
					$ALT_CUST_ID="$CUSTOMERID";
					
					//echo "<br> alt $ALT_CUST_ID <br>";
					$npfbranchcode=substr($ALT_CUST_ID,0,3);; 
					
					$npfaccountcode=substr($ALT_CUST_ID,-6);
					//echo "emage path $npfbranchcode'_'$npfaccountcode'_p.jpg";
					$imagefile=$npfaccountcode.'_'.$npfbranchcode.'_P.';
					//echo "<br>image path $imagefile <br>";
					
					$imagespath2="file:///C:/NPF_Images/PHOTO/$imagefile";
					//$imagespath2="C:/NPF_Images/PHOTO/$imagefile";
					
					
					$extentionsarray=array('jpeg','jpg','bmp','gif','png');
					//echo count($extentionsarray);
					
					for($i=0;$i<=count($extentionsarray);$i++){
						$ext=$extentionsarray[$i];
						if(file_exists($imagespath2.$ext)){
							
							//echo "$imagespath2.$ext";
							$imagespath2=$imagespath2.$ext;
							//echo $imagespath2;
							
						}else{
							
							//echo "No immage<br>";
							$imagespath21=$imagespath2.$ext;
							//echo "$imagespath21.$ext <br>";
						}
						
					}
					
					
					
					
					//$imagespath2="E:/NPFImages/PHOTO/$imagefile";
					//echo "$imagespath2";
					$image11 = file_get_contents("$imagespath2");
					
					$image_codes = base64_encode($image11);
					
					?>
				
				
				
				
<td width="10%"> 
<div class="img">

<br> 

</div>

 </td>  
<td colspan="2" > 


<table width="100%" border="0" style="height: 50px; overflow:auto;">

<tr style="font-size: 15px;">
<td > <font color="black" >Acc / No: </font></td> 		 
 <td > <div id="Account">   </div> </td>
				  
<td > <font color="black" >Currency Code: </font></td> 
 <td >			NGN  </td> 
				  
				  </tr> 
				  
				  <tr style="font-size: 15px;">
<td> <font color="black" >Product: </font></td>  
<td>				  </td> 
				  
<td > <font color="black" >Opening Balance : </font></td> 
 <td >		<div id="last" >    </div>  </td> 
				  
				  
				  </tr> 
				  <tr style="font-size: 15px;">
<td> <font color="black">Statement Period: </font></td>  
<td> <div id="newfdate"></div><div id="newtdate"> </div>   </td> 
				  
				  
<td > <font color="black" >Mobile Number</font></td> 
 <td ><div id="SMS_1">    </div> 			  </td> 				  
				  
				  </tr> 
				  <tr style="font-size: 15px;">
<td > <font color="black" >Account Name: </font></td>  
<td > <div id="accountname">    </div> </td>

<td> <font color="black" >Account Status</font></td>
	<td >  ACTIVE  </div> </td>
				  
				  </tr> 
				  <tr style="font-size: 15px;">
<td> <font color="black" >Address: </font></td>  
<td style='text-align:left'> <div id="custaddress">    </div></td> 
				  
<td> <font color="black" ></font></td>  <td style='text-align:right'><b>
				  </td> 				  
				  
				  </tr> 
				  
				  
				  
				  
			




</table>





</td> 
				  

				  
 </tr> 
				
				
				
				
				
				
				  
				  
				
				 
				 
				 </table>
				 <hr>
				 <p>
<div style="float: left; font-size: 14px; ">
		
<div id="demo" style="width: 100%" ></div>



<label ><b>Balance at End Period: &nbsp; &nbsp; &nbsp;</b></label>
<div id="forward" style=" font-weight: bold"></div>

<br>

<label  ><b>Total Debit: &nbsp; &nbsp; &nbsp;</b></label>
<div  id="debits" style=" font-weight: bold"></div>
<br>
<label  ><b>Total Credit: &nbsp; &nbsp; &nbsp;</b></label>
<div id="credits" style=" font-weight: bold"></div>
</div>
<br>
<br>
<table style="width: 100%; " >
<tbody>
<tr>

<td colspan='3'><center> <b><i>Managers Name:<br><br>---------------</i></b></center></td>
<td> </td>
<td colspan='3'><center><b><i>Signature: <br><br>----------------</i></b> </center></td>
<td> </td>
</tr>
</tbody></table>

<table style="width: 100%; " >
<tbody>
<tr>
<td> </td>
<td><center><b><i>Please examine this statement immediately. If there is any query with above entries, please bring to to the attention of the bank within 15days of dispatch it will be assumed that statement rendered is correct after 15days of no complaint. All correspondence regarding exceptions should be addressed to the Managing Director.</i><br></center></td>

</tr>
</tbody></table>
	
<?php   

// accountstatementsearchnew($CUSTOMERID,$fdate1,$tdate1,$fieldname);






?>


			
				 
				 
                        
                        <!-- /.table-responsive -->
                    </div>
				
				
				
				 <!-- End of New Content-->
				
				
               
            
			

          </section>
		  </center>
		  <!-- End of Dashboard Counts Section-->
		  <?php include("config/javascript.php"); ?>
		  
		
		  
		  
		  
         
		  <!-- Page Footer-->
          <?php include("config/footer.php");?>
        </div>
      </div>
    </div>
    <!-- Javascript files-->
    
    <script src="js/tether.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.cookie.js"> </script>
    <script src="js/jquery.validate.min.js"></script>
	
	<script src="js/datatables/jquery-1.12.4.js"></script>
	<script src="js/datatables/query.dataTables.min.js"></script>
	<script src="js/datatables/dataTables.buttons.min.js"></script>
	<script src="js/datatables/buttons.html5.min.js"></script>
	
	
	
	<script src="js/datatables/pdfmake.js"></script>
	<script src="js/datatables/vfs_fonts.js"></script>
	<script src="js/datatables/buttons.print.min.js"></script>
	<script src="js/datatables/jszip.min.js"></script>
	
   
    <script src="js/charts-home.js"></script>
    <script src="js/front.js"></script>
    <!-- Google Analytics: change UA-XXXXX-X to be your site's ID.-->
    <!---->
    
  </body>
</html>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


<script>





    function statementdetails(y){



        const lines = y.split(',\"');
        const headerline = lines[0];
        const splitHeaderline = headerline.split('/');
        const headers = splitHeaderline.map(x => x.split('::')[1] || x.split(':')[1])

        const records = [];
        records.push(headers);

        for (let i = 1; i < lines.length; i++) {
         records.push(lines[i].split("\"\t\""));
     }

     return records

 }


  

function parseT24Response(data){
  const headerEnd = ',\"\"\t\"\",'
  const end = data .indexOf (headerEnd)
  const rawHeader = data .slice (1, end)
  const headers = rawHeader
    .split ('/')
    .map (s => s.split('::'))
    .map (([name, desc]) => ({name, desc}))
    .concat ({name: '', desc: 'Unknown'})
  const len = headers .length;


  
  const fields = data.slice(end + headerEnd.length)
    .split(/\t|,/).map(s => s.slice(1, -1).trim())

  const body = Array (Math .ceil (fields .length / len))
    .fill ()
    .map ((_, i) => fields. slice (i * len, i * len + len))
    .map (
      fields => headers .reduce (
        (a, {name, desc}, i) => ({...a, [desc]: fields[i]}),
        {}
      )
    )

  
 
  return {headers, body}
}



function customerdetails(response){

    const parser = new DOMParser();
    const xmlDoc = parser.parseFromString(response, "text/xml");
    const data = xmlDoc.getElementsByTagName("responses")[0].innerHTML; 

     const details=statementdetails(data);
    console.table(details);

    var Account = details[1][0];
    var BVN = details[1][2];
    var custaddress = details[1][4].replace(/\"/g, '');
    var SMS_1 = details[1][3];
var accountname = details[1][1];

document.getElementById("accountname").innerHTML=accountname;
document.getElementById("Account").innerHTML=Account;
document.getElementById("SMS_1").innerHTML=SMS_1;

document.getElementById("custaddress").innerHTML=custaddress;
    


 

}

const formatter = new Intl.NumberFormat('en-US', {

  minimumFractionDigits: 2
})


  function updateFields(response) {


    const parser = new DOMParser();
    const xmlDoc = parser.parseFromString(response, "text/xml");
    const data = xmlDoc.getElementsByTagName("responses")[0].innerHTML;    

    const h=parseT24Response(data);
      
  
        // console.log(r)



var r = h.body

var f = h.headers


console.log(r)

var t = f.map(value=> value['desc']);



var Value = r.map(value=> value['Value Date']);

let Debitsum = r.map(value=> {
	if(value['Debit'] == ''){
		 value['Debit'] = '0';
		 return value['Debit'];
	} else{
		return value['Debit'];
	}
})
let Description = r.map(value=> value['Description'] + ' ' + value['Unknown'] )
let Txn_Ref = r.map(value=> value['Txn Ref'])
let Creditsum = r.map(value=>{

if(value['Credit'] == ''){
		 value['Credit'] = '0';
		 return value['Credit'];
	} else{
		return value['Credit'];
	}

})


 
let Narration = r.map(value=> value['Narration'])
let Booking_Date= r.map(value=> value['Booking Date'])
let Debit = r.map(value=> formatter.format(value['Debit']) )
let Credit=r.map(value=> formatter.format(value['Credit']) )
let Closing_Balance=r.map(value=> formatter.format(value['Closing Balance']) )


 
console.log(Debitsum)

var debits = 0;

for(var i=0; i < Debitsum.length-2; i++){

    debits += parseInt(Debitsum[i]);

}

    document.getElementById("debits").innerHTML=formatter.format(debits)
var credits = 0;

for(var i=0; i < Creditsum.length-2; i++){

    credits += parseInt(Creditsum[i]);

}

  document.getElementById("credits").innerHTML=formatter.format(credits)





var statement =[Value, Description, Txn_Ref, Narration, Booking_Date, Debit, Credit, Closing_Balance]

console.log(statement[Debit])



function r2c(arr) {
    var arrC = [], // next get the longest sub-array length
        x = Math.max.apply(Math, arr.map(function (e) {return e.length;})),
        y = arr.length,
        i, j;
    for (i = 0; i < x; ++i) {   // this is the loop "down"
        arrC[i] = [];
        for (j = 0; j < y; ++j) // and this is the loop "across"
            if (i in arr[j])
                arrC[i].push(arr[j][i]);

    }
    return arrC;
}
var arrC = r2c(statement);


console.table(arrC)


  var table = document.createElement("table");
        var tr = document.createElement("tr");
        for(var i = 0; i <8; i++){
          var th = document.createElement("th");
          th.setAttribute("class", "border_class1");
          th.innerHTML = t[i];
          tr.appendChild(th);
        }
        table.appendChild(tr);
        for(var i = 0; i < arrC.length-2; i++){
          var tr = document.createElement("tr");

          for(var j = 0; j < arrC[1].length; j++){
           // console.log("abhisar", arrC[i][j])
            var td = document.createElement("td");
            td.setAttribute("class", "border_class");
       td.innerHTML = arrC[i][j].replace(/^0.00+/, '');
            tr.appendChild(td);
          }
          table.appendChild(tr);
        }

        table.setAttribute("class", "check");
        var see= document.getElementById("demo").appendChild(table);

     const last = data.split('BALANCE B/D"')[1].replace(/\"/g, '');

 document.getElementById("last").innerHTML=last

 document.getElementById("forward").innerHTML = (arrC[arrC.length-2][6]);

 



}

       $('#ssubmit').click(function(){

                 var tdate=$("#tdate").val();
                var fdate=$("#fdate").val();
                var CUSTOMERID=$("#CUSTOMERID").val();
                

               document.getElementById('newfdate').innerHTML=fdate

               document.getElementById('newtdate').innerHTML=tdate
                $.ajax({
                  url: "http://10.10.1.66:81/larticles/public/api/statement",
                  type: 'POST',
                  'content-type':'application/X-WWW-form-urlencoded',
                  'Accept': 'application/json',
                    data: {
                        'tdate': tdate,
                        'fdate': fdate,
                        'CUSTOMERID' : CUSTOMERID,

                    },


                  success: function(response){       
                        //updateFields(response);
                        const r =updateFields(response);
                        console.log(r);

                      }
                    });

                  $.ajax({
                  url: "http://10.10.1.66:81/larticles/public/api/creditaccount_enquiry",
                  type: 'POST',
                  'content-type':'application/X-WWW-form-urlencoded',
                  'Accept': 'application/json',
                   data: {
                      
                        'CREDIT_ACCT_NO' : CUSTOMERID,

                    },



                  success: function(response){       
                        //updateFields(response);
                        const r =customerdetails(response);
                        console.log(r);

                      }
                    });

              });


</script>
