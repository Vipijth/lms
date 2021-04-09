<?php

include ('connection.php');

$email=$_POST['email'];
$csid =$_POST['csid'];
$hours=$_POST['hours'];
$certid=$_POST['certid'];
$coursename =$_POST['course'];
$sid =$_POST['sid'];
$faculty='';
$s='';
$newformat='';
$student='';
$ucsql= "SELECT * FROM faculty   INNER JOIN instructor
     ON instructor.instructorId = faculty.id  where instructor.resourceid = '$csid' and instructor.type='course' ";
$ucresults = $conn->query($ucsql);
if ($ucresults->num_rows > 0) {

    while ($row = $ucresults->fetch_assoc()) {
$faculty=ucfirst($row['fname']).' '.ucfirst($row['lname']);

    }

}

$cssql="SELECT * FROM course where id='$csid'";
$ucresults2 = $conn->query($cssql);
if ($ucresults2->num_rows > 0) {

    while ($row = $ucresults2->fetch_assoc()) {
     $s=strtotime($row['enddate']);
        $newformat = date('F',$s);

    }

}

$cssql1="SELECT * FROM users where id=$sid";
$ucresults21 = $conn->query($cssql1);
if ($ucresults21->num_rows > 0) {

    while ($row = $ucresults21->fetch_assoc()) {
        $student=ucfirst($row['firstname']).' '.ucfirst($row['lastname']);

    }

}





        $name =$student;
		$month=$newformat;
		$hours=$hours;
        $name_len = strlen($student);
        $occupation = $coursename;
		   $name_lenn = strlen($coursename);
		   $faclen=strlen($faculty);

        if ($occupation) {
          $font_size_occupation = 48;
        }

        if ($name == "" || $occupation == "") {
       
        }else{
 

          //designed certificate picture
          $image = "assets/admin/certificate/certi.png";

          $createimage = imagecreatefrompng($image);

          //this is going to be created once the generate button is clicked
            $filename=$csid.$sid."certificate.png";
          $output =  'assets/admin/certificate/'.$csid.$sid."certificate.png";

          //then we make use of the imagecolorallocate inbuilt php function which i used to set color to the text we are displaying on the image in RGB format
          $white = imagecolorallocate($createimage, 135, 137, 138);
          $black = imagecolorallocate($createimage,102, 147, 186);
    $blacks = imagecolorallocate($createimage,5, 5, 6);
          //Then we make use of the angle since we will also make use of it when calling the imagettftext function below
          $rotation = 0;

          //we then set the x and y axis to fix the position of our text name
          $origin_x = 460;
          $origin_y=650;

          //we then set the x and y axis to fix the position of our text occupation
          $origin1_x = 770;
          $origin1_y=860;



          $origin1l_y=785;
          //we then set the differnet size range based on the lenght of the text which we have declared when we called values from the form
          if($name_len<=7){
            $font_size = 110;
            $origin_x = 860;
          }
          elseif($name_len<=12){
            $font_size = 110;
			$origin_x = 740;
          }
          elseif($name_len<=15){
			  	$origin_x = 450;
            $font_size = 110;
          }
          elseif($name_len<=20){
			  			$origin_x = 420;
                   $font_size = 110;
          }
          elseif($name_len<=22){
			  	$origin_x =300;
              $font_size = 110;
          }
          elseif($name_len<=33){
                    $font_size = 90;
			    $origin_x = 320;
          }
          else {
            $font_size =60;
          }



		            if($name_lenn<=7){

             $origin1_x = 890;
          }
          elseif($name_lenn<=12){

			  $origin1_x = 780;
          }
          elseif($name_lenn<=15){
			  	  $origin1_x  = 730;

          }
          elseif($name_lenn<=20){
			  			$origin1_x  = 620;

          }
          elseif($name_lenn<=23){
			  	     $origin1_x =600;

          }
          elseif($name_lenn<=33){

		    $origin1_x =525;
          }
          else {
          $origin1_x =370;
          }




    if($faclen<=7){
        $c=  1390;
       $v=1200;
     }

            elseif($faclen<=10){
                $c=  1370;
                $v=1200;
            }

            elseif($faclen<=16){
                $c=  1350;
                $v=1200;
            }

            elseif($faclen<=23){
                $c=  1310;
                $v=1200;
            }

           else{
                $c=  1250;
                $v=1200;
            }
          $certificate_text = $name;

          //font directory for name
          $drFont = dirname(__FILE__)."/PinyonScript-Regular.ttf";

          // font directory for occupation name
          $drFont1 = dirname(__FILE__)."/Lora-Regular.ttf";

          //function to display name on certificate picture
          $text1 = imagettftext($createimage, $font_size, $rotation, $origin_x, $origin_y, $black,$drFont, $certificate_text);

          //function to display occupation name on certificate picture
          $text2 = imagettftext($createimage, $font_size_occupation, $rotation, $origin1_x+2, $origin1_y, $white, $drFont1, $occupation);
   $text3 = imagettftext($createimage, '24', $rotation, '870', $origin1l_y, $blacks, $drFont1, $month);
      $text4 = imagettftext($createimage, '26', $rotation, '1210', '950', $blacks, $drFont1, $hours);
        

            $text5 = imagettftext($createimage, '26', $rotation, $c, $v, $blacks, $drFont1, strtoupper($faculty));
            
         $text6 = imagettftext($createimage, '76', $rotation, $c, '1100', $blacks, $drFont, strtoupper($faculty));
            imagepng($createimage,$output,3);


            if($output!=null){
          
                $sqls = "UPDATE ecert SET status='1' ,  certificate='$filename' , student='$student'  WHERE id='$certid'";
                if ($conn->query($sqls) === TRUE) {
                    header('Location: ecert.php');
                }
                else{

                }
            }
 ?>
        <!-- this displays the image below -->


        <!-- this provides a download button -->

<?php
        }


     ?>



