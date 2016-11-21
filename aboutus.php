<?php
include_once 'header.php';
require_once"inc/confing.php";

require_once"inc/mas.php";

if(isset($_GET['name'])){
$name=$_GET['name'];
$email=$_GET['email'];
$msg=$_GET['msg'];
mail("DS.EMS2015@GMAIL.COM","MySystem-Contact",$name.$email.$msg);
echo "<script>alert('Thank You.');</script>";
}


?>
<html><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="generator" content="Script Eden ( http://scripteden.net/ ) Template Builder v2.0.0">  
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="css/flat-ui.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style.complete.css" rel="stylesheet">
<style type="text/css"></style></head>
<body>
    
    <div id="page" class="page">
        
    <!-- Start Content Block 1-2 -->
    
    <!--// END Content Block 1-2 --><!-- /.item --><!-- /.footerWrapper --><!-- Start Contact 1 -->
    <!-- /.content-block -->
    <!--// END Contact 1 -->
    <div class="item contact" id="contact2">
                
            <div class="container">
            
                <div class="col-md-4 col-md-offset-2 " style="margin-left:800px; margin-bottom:40px; margin-top:-10px;  background-color: rgba(172, 175, 179, 0.3); ">

                
                    <h4 style="margin-top:5px; color:#EE6759;"><strong>What is DS-EMS ?</strong></h4>
                    
                    <p style="font-size:13px;   padding:1.5em  margin:12px; text-align: left;"><strong>
                                      Dynamic  System  for  Electronic  Medicine  Supplier  (DS-EMS)  is  an 
electronic  interchange  information  system  by  using a standard  format.  The process  of  this  system  allows interchanging information  between  supplier  and Healthcare providers electronically rather than manually. Furthermore, DS-EMS  support Radio   Frequency Identification (RFID) technology for tracking purpose.
                  </strong>  </p>    
     
                    <h4 style="margin-top:20px; color:#006E75"> <strong> Who develop DS-EMS system?</strong></h4>
                     <p style="font-size:13px;   padding:1.5em  margin:12px; text-align: left;"><strong>

Bachelor students form Information Technology Department in Computer College of Qassim University, their names as follow:
<ul> 
<li> Aseel Alawadh </li>
<li> Adeem Alwaneen </li>
<li> Bayan Albunyan </li></strong>
</ul>
                </p>
                     </p>
                     <p> 

                    <h4 style="margin-top:20px; margin-right:100px; color:#EE6759"> <strong> Why you should use DS-EMS system !</strong></h4>
                    <p> <ol> <strong style="font-size:13px;   padding:1.5em  margin:12px; text-align: left;">
                   <!-- <li> Online products ordering .</li>-->
                    <li> Direct communication between healthcare providers and suppliers .</li>
                   <!-- <li> Automatic inventory . </li> if we appliy surplus -->
                    <li> Automatic products tracking using RFID technology . </li>
                    </strong>
                    </ol>
</p>
                </p>    
                
                     </div>
                    </div><!-- /.container -->
                    
        </div><!-- /.item --></div><!-- /#page -->












    <!-- Load JS here for greater good =============================-->
    <script src="js/jquery-1.8.3.min.js"></script>
    <script src="js/jquery-ui-1.10.3.custom.min.js"></script>
    <script src="js/jquery.ui.touch-punch.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap-select.js"></script>
    <script src="js/bootstrap-switch.js"></script>
    <script src="js/flatui-checkbox.js"></script>
    <script src="js/flatui-radio.js"></script>
    <script src="js/jquery.tagsinput.js"></script>
    <script src="js/jquery.placeholder.js"></script>
    <script src="js/jquery.nivo.slider.pack.js"></script>
    <script src="js/application.js"></script>
    <script src="js/over.js"></script>
  


</body></html>
<?php
include "footer.php";
?>