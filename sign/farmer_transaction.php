<html>
    <title>Transaction form</title>
    <head>
    <style>
        
        .outer{
            border:5px solid red;
            border-left-width: 2px;
            border-right-width: 2px;
            border-spacing: 10px;
            background-color: cornsilk;
            border-radius: 10px 25px 10px 25px;
            
        }
        .next{
            padding:10px 10px 10px 10px;
        }
        
        h1 {
            text-shadow: 0 0 3px #FF0000;
            }
        .error{
            color: red;
        }
        #checkbox{
            border: 2px solid gray;
            
        }
        ol{
            color: black;
            text-shadow:-1px 0px 8px rgba(0, 232, 80, 1);
            font-size: 18px;
        }
        .blink {
      animation: blinker 0.6s linear infinite;
      text-shadow: 2px 2px 5px red;
      font-size: 20px;
      font-weight: bold;
      font-family: sans-serif;
      }
        .blink1 {
      animation: blinker 0.6s linear infinite;
      text-shadow: 1px 1px 2px pink;
      font-size: 20px;
      font-weight: bold;
      font-family: sans-serif;
      }
      @keyframes blinker {  
      50% { opacity: 0; }
      }
        .transaction{
             text-shadow: 0 0 0.2em #F87, 0 0 0.2em #F87;
            
        }
        .serif {
  font-family:  Arial, Helvetica, sans-serif;
}

.column {
  float: left;
  width: 20%;
  padding: 5px;
}

/* Clearfix (clear floats) */
.row::after {
  content: "";
  clear: both;
  display: table;
}
    </style>
    <link href="style2.css" rel="stylesheet" type="text/css">
        <script src="main.js"></script>
        <script type="text/javascript">
        $(function(){
            $("#checkbox").change(function(){
                               var st=this.checked;
                               if(st){
                $("#but_submit").prop("disabled",false);
            }
            else{
                $("#but_submit").prop("disabled",true);
             }
            });
            
            
        });
        </script>
        </head>
    <body>
    

<?php
	session_start();
    $result = false;

    $dbhost = 'localhost';
    $username = 'root';
    $password = '';
    $db = 'transactions';

    if( $_SERVER['REQUEST_METHOD']=='POST' ){

        $conn = new mysqli ( $dbhost,$username, $password, $db );
        if( $conn )
		{
			if ($_POST['uname']!="" && $_POST['password']!="")
            $sql='insert into `tran` ( `username`,`crop_name`, `crop_type`, `quintal`, `duration`,`phoneno`,`img1`,`img2`,`img3`,`vehicle`) values (?,?,?,?,?,?,?,?,?,?);';
            $stmt=$conn->prepare( $sql );
            $stmt->bind_param('ssssssssss',$_POST['uname'],  $_POST['cropname'], $_POST['croptype'], $_POST['quintal'] ,$_POST['duration'],$_POST['phno'],$_POST['filename1'],$_POST['filename2'],$_POST['filename3'],$_POST['vehicle']);
            $result = $stmt->execute();
			
			
			echo "New record created successfully. Last inserted ID is: " . $last_id;
			header("Location:thanks.php");

        }
        $conn->close();
    }
?>
        <div class="outer">
            <div class="next">
        <h1 class="serif">
            Read all instructions carefully and enter the appropriate information.<span class="error">*</span></h1>
            <div >
            <!-- all instructions and conditions follow by farmer-->
                <b><span style="color: crimson;font-size:25px;">Note:</span></b>
                <ol>
                    <li>
                        All information should be fill correctly.
                    </li>
                    <li>
                        If any incorrect information found then may result into blacklisting your account.
                    </li>
                    <li>
                        Government giving you ability to decide youself cost of your product as per standards define by Indian Governement.
                    </li>
                    <li>
                        As per following standards rate your (crop) product and decide quality.
                    </li>
                    <li>
                        If your (Crop) product not found as per expectation or your rate is more than your quality of product as per Government Standards then Distributor /Dealer have ability to abort your transaction .
                        
                    </li>
                    <li>
                        All information is monitored by Indian Government.
                    </li>
                    <li>
                        For blocking your account Indian government is not responsible.
                    </li>
                    <li>
                        If you take objection on blocking your account, if found guilty then the   5000/- rupees penalty with 2 weeks of jail will be announced.
                    </li>
                        2&#37; Government tax will be applied to any transaction.
                    </li>
					<li>Select Quality as per given instructions
					<div class="row">
					<div class="column">
					<img src="Q1.png" alt="" style="width:100%">
				  </div>
				  <div class="column">
					<img src="Q2.png" alt="" style="width:100%">
				  </div>
				  <div class="column">
					<img src="Q3.png" alt="" style="width:100%">
				  </div>
				  <div class="column">
					<img src="Q4.png" alt="" style="width:100%">
				  </div>
				</div>
					</li>
                    <li>
                        Fill below transaction form to proceed .
            &nbsp;&nbsp;(Remainder : <span class="error">* required field</span>)
                    </li>
                </ol>
            
                
            </div>
                
                    <!-- Contents of form is listed below -->
            <div class="container">
			
            <form method="post" action="">
                <div id="div_login">
                   
                    <p><span class="error">* required field</span></p>
                
					<div>
                        Username:<span class="error">* </span><br>
                        <input type="text" class="textbox" id="uname" name="uname" placeholder="Username" title="Enter Your username " required />
                        
                    </div>
					<div>
                        Password:<span class="error">* </span><br>
                        <input type="password" class="textbox" id="pwd" name="password" placeholder="Password" title="Enter Your Password " required />
                        
                    </div>
                    <div>
                        Crop:<span class="error">*</span><br>
                        <input type="text" class="textbox" id="crop" name="cropname" placeholder="Crop Name" title="Enter Your Crop Name " required />
                        
                    </div>
                    <div>
                        Crop Type:<span class="error">* </span><br>
                        <select id="crop_type" name="croptype" class="textbox" placeholder= "Select Crop Type " title="which crop type do you have?" required >
							<option class="textbox" name="" selected><span>-------------</span></option>
							<option class="textbox" name="">XXX</option>
                            <option class="textbox" name="">XXX</option>
                            <option class="textbox" name="">XXX</option>
                            <option class="textbox" name="">XXX</option>
                        
                        </select>
                        
                    </div>
                    <div>
                        Quintal:<span class="error">* </span><br>
                        <input type="number" class="textbox" id="quintal" name="quintal" placeholder="Quintal product" title="Enter crop quantity you have" required />
                        
                    </div>
                    <div>
                     Quality:<span class="error">* </span><br>
                        <select id="quality" name="quality" class="textbox" placeholder= "Select Quality" title="Select Quality as per Governement Rules" required >
							<option class="textbox" name="" selected><span>-------------</span></option>
							<option class="textbox" name="">Q1</option>
                            <option class="textbox" name="">Q2</option>
                            <option class="textbox" name="">Q3</option>
                            <option class="textbox" name="">Q4</option>
                        
                        </select>
                        
                    </div>
					<div>
                        Duration:(/month):<span class="error">*</span><br>
                        <input type="number" maxlength="10" minlength="1" size="10" class="textbox" id="adharcard"
                               name="duration" placeholder="Duration required" title="how long your product sustain in environment?" required />
                        
                        
                    </div>
                     <div>
                        Phone Number: <span class="error">* </span><br>  
                        <input name="phno"  class="textbox" size="10" placeholder="Phone number" required />
                        
                    </div>
                    <div>
                        Images: <span class="error">* </span><br>(<b><span style="color: red;">Note:</span></b> capture 3 different images of your product)
                        <pre>
                        1. <input type="file"  name="filename1" required><br>
                        2. <input type="file"  name="filename2" required><br>
                        3. <input type="file"  name="filename3" required><br>
                        </pre>
                        
                       
                    </div>
                     <div>
                         
                        Transportation vehicle:<br><br>
                         
                         (<b><span style="color: crimson;font-size: 25px;">Note:</span> &#8220;</b> Transportation services are monitored by the Indian Government with as minimum as possible cost, only for farmers.<b>&#8221;</b>)<br>
                       <select title="select future transaportation mode" class="textbox" placeholder="Transaportation Mode" name="vehicle">
                           <option value="" selected>--------------------</option>
                           <option name="motor cycle">Motor Cycle</option>
                           <option name="mdeium truck">Any Medium Truck</option>
                                <optgroup label="Heavy open Body Trucks">
                                    <option name="">22 Feet 10 wheeler truck with 16 ton to 20 ton capacity</option>
                                    <option name="">27 feet 14 wheeler truck with 26 ton to 31 ton capacity</option>
                                    <option name="">24 Feet 12 wheeler truck with 21 ton to 25 ton capacity</option>
                                </optgroup>
                               <optgroup label="Closed body trucks">
                                   <option name="" >20 feet Single axel (Sxl) Truck with 7.5 ton capacity</option>
                                    <option name="" >20 feet Multi axel (Mxl) Truck with 16 ton capacity</option>
                                    <option name="">24 feet Single axel (Sxl) Truck with 7.5 ton capacity</option>
                                    <option name="" >24 feet Multi axel (Mxl) Truck with 16 ton capacity</option>
                                    <option name="">32 feet Single axel (Sxl) Truck with 7.5 ton capacity</option>
                                    <option name="">32 feet Multi axel (Mxl) Truck with 16 ton capacity</option>
                               </optgroup>
                           
                         </select>
                        
                       
                    </div>
                    
                    
                    
                  
                </div>
            
			
        </div>
                <div style="align-content: center;text-align: center;">
                        <input type="checkbox" id="checkbox"/>I agree to <span style="color: crimson">terms of service</span>
                        <p style="color: black">Check here to indicate that you have read and agree to the terms of the 
                        <span  style="color: crimson">Indian Government.</span></p>     
							
							<input type="submit" value="START" name="but_submit" id="but_submit" disabled/>
			
                </div>
             </form>  
                <div>
                    <p class="blink1">IMPORTANT:</p>
                <p class="transaction">When a product will be bought by a Distributor/Dealer then you will be notified.</p>
                <p class="transaction">Transaction services will show to you after confirming product.</p>
                 <p class="blink ">NOW!! You can use our app to BOOK transportation service.</p>   
                </div>
                
                
                <!--next END-->
                
            </div>
            <!-- outer End-->
        </div>

    </body>
    
</html>