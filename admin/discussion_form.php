<?php
session_start();
if($_SESSION["adminemail"]==null){


    header('Location: error.php?errors=Please Log In');
}
include ("connection.php");
include ("header_1.php");


$id=$_POST['disid'];
$topic=$_POST['topic'];
$uname=$_POST['uname'];	$courseid=$_POST['subid'];



if(isset($_POST["Delete"])) {
    $cartid = $_POST["oid"];
    $sql = "delete from discussionchat  WHERE id='$cartid'";
    $conn->query($sql);
}



if(isset($_POST["send"])) {
	
	  // set the timezone first
if(function_exists('date_default_timezone_set')) {
    date_default_timezone_set("Asia/Kolkata");
}

 $date = date("F d Y");
$date1 =  date("H:i a");
	$id=$_POST['disid'];
	$username='Admin <br> Chrysaellect India';
	$userid='0';
	$courseid=$_POST['subid'];
	$time=$date.' '.$date1;
	$utype='faculty';
	$question=$conn->real_escape_string($_POST['message']);
	

		    $sql = 'INSERT INTO discussionchat(discussionid, userid,username,message,utype,senddate) VALUES 
   ("'.$id.'","'.$userid.'","'.$username.'","'.$question.'","'.$utype.'","'.$time.'")';

    if ($conn->query($sql) === TRUE) {
        echo "<script>
alert('Answer Updated successfully');
</script>";
    
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
	
	
}

?>


            <div class="main-content">
               <section class="section">
				   <div class="row">
                     <!--   <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                           <div class="card">
                              <div class="body">
                                 <div id="plist" class="people-list">
                                    <div class="chat-search">
                                       <input type="text" class="form-control" placeholder="Search..." />
                                    </div>
                                    <div class="m-b-20">
                                       <div id="chat-scroll">
                                          <ul class="chat-list list-unstyled m-b-0">
                                             <li class="clearfix active">
                                                <div class="about">
                                                   <div class="name">William Smith</div>
                                                   <div class="status">
                                                      <i class="material-icons offline">fiber_manual_record</i>
                                                      left 7 mins ago 
                                                   </div>
                                                </div>
												<div class="float-left dropdown">
												  <a href="#" data-toggle="dropdown">
													  <i class="fas fa-ellipsis-h"></i>
												  </a>
												  <div class="dropdown-menu">
													<div class="dropdown-title">Options</div>
													<a href="#" class="dropdown-item has-icon text-danger" data-confirm="Wait, wait, wait...|This action can't be undone. Want to take risks?" data-confirm-text-yes="Yes, IDC">
														<i class="fas fa-trash-alt"></i> Remove
													</a>
												  </div>
												</div> 
                                             </li>
                                             <li class="clearfix ">
                                                <div class="about">
                                                   <div class="name">Martha Williams</div>
                                                   <div class="status">
                                                      <i class="material-icons offline">fiber_manual_record</i>
                                                      online 
                                                   </div>
                                                </div>
                                             </li>
                                             <li class="clearfix">
                                                <div class="about">
                                                   <div class="name">Joseph Clark</div>
                                                   <div class="status">
                                                      <i class="material-icons online">fiber_manual_record</i>
                                                      online 
                                                   </div>
                                                </div>
                                             </li>
                                             <li class="clearfix">
                                                <div class="about">
                                                   <div class="name">Nancy Taylor</div>
                                                   <div class="status">
                                                      <i class="material-icons online">fiber_manual_record</i>
                                                      online 
                                                   </div>
                                                </div>
                                             </li>
                                             <li class="clearfix">
                                                <div class="about">
                                                   <div class="name">Margaret Wilson</div>
                                                   <div class="status">
                                                      <i class="material-icons online">fiber_manual_record</i>
                                                      online 
                                                   </div>
                                                </div>
                                             </li>
                                             <li class="clearfix">
                                                <div class="about">
                                                   <div class="name">Joseph Jones</div>
                                                   <div class="status">
                                                      <i class="material-icons offline">fiber_manual_record</i>
                                                      left 30 mins ago 
                                                   </div>
                                                </div>
                                             </li>
                                             <li class="clearfix">
                                                <div class="about">
                                                   <div class="name">Jane Brown</div>
                                                   <div class="status">
                                                      <i class="material-icons offline">fiber_manual_record</i>
                                                      left 10 hours ago 
                                                   </div>
                                                </div>
                                             </li>
                                             <li class="clearfix">
                                                <div class="about">
                                                   <div class="name">Eliza Johnson</div>
                                                   <div class="status">
                                                      <i class="material-icons online">fiber_manual_record</i>
                                                      online 
                                                   </div>
                                                </div>
                                             </li>
                                          </ul>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>-->
					
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                           <div class="card">
                              <div class="chat">
                                 <div class="chat-header clearfix">
                                    <div class="chat-about">
                                       <div class="chat-with" style="font-size: 20px">
										   <?php echo $topic ?></div>
                                       <div class="chat-num-messages" style="text-align: left;color:green;font-size:12px"> <?php echo $uname  ?><br><br> </div>
                                    </div>
                                 </div>
                              </div>   
                              <div class="chat-box" id="mychatbox">
				
                                 <div style="padding:10px 10px;"> 
												  <?php
        $slidersql= "SELECT * FROM discussionchat where  discussionid  = '$id' ";
        $sliderresult = $conn->query($slidersql);
        if ($sliderresult->num_rows > 0) {

         while($row = $sliderresult->fetch_assoc()) { ?> 
									 
									 
									 <?php  if($row['userid']=='0'){   ?>
									 <span style="color:green"> 
									  <?php echo $row['message'] ?></span>
									 <br> <br>
									
										 <span style="color:brown">
									  You	</span>								<br>
										  <span style="color:mediumvioletred">
									   <?php echo $row['senddate'] ?>	</span>
									 
									 <br>
									 
                                                        <form action="" method="post">
                                                            <input type="hidden" name="oid" value="<?php echo $row['id'] ?>">
                                                         
                                                              <input type="hidden" name="disid" value="<?php echo $id ?>">
															
															  <input type="hidden" name="topic" value="<?php echo $topic ?>">
															
															
															  <input type="hidden" name="uname" value="<?php echo $uname ?>">
                                                        <button class="btn btn-danger btn-action mr-1" name="Delete" data-toggle="tooltip" title="Delete"  onclick="return confirm('Do you want to delete?');" >
                                                            Delete&nbsp;&nbsp;<i data-feather="trash-2"></i>
                                                        </button>
                                                        </form>
									 
									 <hr/>
									 
									 <?php } else{  ?>
		   <?php echo $row['message'] ?>
									 <br> <br>
									
										 <span style="color:brown">
									   <?php echo $row['username'] ?>	</span>								<br>
										  <span style="color:mediumvioletred">
									   <?php echo $row['senddate'] ?>	</span>	
									 <br>
									 
                                                        <form action="" method="post">
                                                            <input type="hidden" name="oid" value="<?php echo $row['id'] ?>">
                                                         
                                                               <input type="hidden" name="disid" value="<?php echo $id ?>">
															
															  <input type="hidden" name="topic" value="<?php echo $topic ?>">
															
															
															  <input type="hidden" name="uname" value="<?php echo $uname ?>">
                                                        <button class="btn btn-danger btn-action mr-1" name="Delete" data-toggle="tooltip" title="Delete"  onclick="return confirm('Do you want to delete?');" >
                                                            Delete&nbsp;&nbsp;<i data-feather="trash-2"></i>
                                                        </button>
                                                        </form>
									 <hr/>
								<?php } } } ?>
                                 </div> <br><br>
                                 <div class="card-footer chat-form">
                                    <form id="chat-form" action="" method="post">
											<input type="hidden" value="<?php echo $uname ?>" name="uname">
											<input type="hidden" value="<?php echo $topic ?>" name="topic">
										<input type="hidden" value="<?php echo $id ?>" name="disid">
										<input type="hidden" value="<?php echo $courseid ?>" name="subid">
                                       <input type="text" class="form-control" placeholder="Type a message" name="message">
									
										   <button class="btn btn-primary" name="send">
											   <i class="far fa-paper-plane"></i>
										   </button>
                                    </form>
                                 </div>
                              </div>
                           </div>
                        </div>
					   
					  
                     </div>
               </section>
            </div>
	  <script src="assets/admin/js/page/chat.js"></script> 
<?php
include ("footer_2.php");
?>