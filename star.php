<?php
session_start ();

include('connect.php');
$id = $_REQUEST ["Pid"];
$sql = "SELECT sum(Score),count(Pid) FROM rate  where Pid like '$id' group by Pid ";
$objQuery = mysqli_query ( $objConnect, $sql );

 if(($row = mysqli_fetch_array($objQuery,MYSQLI_ASSOC))) { 
			
				$star1=0;$star2=0;$star3=0;$star4=0;$star5=0;
				$star05=0;$star15=0;$star25=0;$star35=0;$star45=0;$star55=0;
				if($row["count(Pid)"]==0) $point=$row["sum(Score)"]/1;
				else $point=$row["sum(Score)"]/$row["count(Pid)"];
				
				if(4.75<=$point&&$point<=5){
					$star1=1;$star2=1;$star3=1;$star4=1;$star5=1;
					$star05=0;$star15=0;$star25=0;$star35=0;$star45=0;$star55=0;
					
				}
				elseif (3.75<=$point&&$point <4.75){
					$star1=1;$star2=1;$star3=1;$star4=1;$star5=0;
					$star05=0;$star15=0;$star25=0;$star35=0;$star45=0;$star55=0;
					if($point-4>=0.25) $star45=1;
					
				}
				elseif (2.75<=$point&&$point <3.75){
					$star1=1;$star2=1;$star3=1;$star4=0;$star5=0;
					$star05=0;$star15=0;$star25=0;$star35=0;$star45=0;$star55=0;
					if($point-3>=0.25) $star35=1;
					
				}
				elseif (1.75<=$point&&$point <2.75){
					$star1=1;$star2=1;$star3=0;$star4=0;$star5=0;
					$star05=0;$star15=0;$star25=0;$star35=0;$star45=0;$star55=0;
					if($point-2>=0.25) $star25=1;
					
				}
				elseif (0.75<=$point&&$point <1.75){
					$star1=1;$star2=0;$star3=0;$star4=0;$star0=1;
					$star05=0;$star15=0;$star25=0;$star35=0;$star45=0;$star55=0;
					if($point-1>=0.5) $star15=1;
					
				}
				elseif (0<=$point&&$point <0.75){
					$star1=0;$star2=0;$star3=0;$star4=0;$star5=0;
					$star05=0;$star15=0;$star25=0;$star35=0;$star45=0;$star55=0;
					if($point-0>=0.25) $star05=1;
					
				}
 }
			?>
<div  >
									
									<a onclick="calRating(1,'<?=$objResult["Pid"]?>')"  >
									<?php if($star1==1) {?><img  id="star1" src="img/starnew.png"> 
									<?php  }elseif ($star05==1){?><img  id="star1" src="img/starhalf.png">
									<?php }else {?> <img  id="star1" src="img/star.png"><?php }?>
									</a> 
									<a onclick="calRating(2,'<?=$objResult["Pid"]?>')"  >
									<?php if($star2==1) {?><img id="star2" src="img/starnew.png"> 
									<?php  }elseif ($star15==1){?><img id="star2" src="img/starhalf.png">
									<?php  }else {?> <img id="star2" src="img/star.png"><?php }?>
									</a> 
									<a onclick="calRating(3,'<?=$objResult["Pid"]?>')"  >
									<?php if($star3==1) {?><img id="star3" src="img/starnew.png"> 
									<?php  }elseif ($star25==1){?><img id="star3" src="img/starhalf.png">
									<?php  }else {?> <img id="star3" src="img/star.png"><?php }?>
									</a>  
									<a onclick="calRating(4,'<?=$objResult["Pid"]?>')"  >
									<?php if($star4==1) {?><img id="star4" src="img/starnew.png"> 
									<?php  }elseif ($star35==1){?><img id="star4" src="img/starhalf.png">
									<?php  }else {?> <img id="star4" src="img/star.png"><?php }?>
									</a> 
									<a onclick="calRating(5,'<?=$objResult["Pid"]?>')" >
									<?php if($star5==1) {?><img id="star5" src="img/starnew.png"> 
									<?php  }elseif ($star45==1){?><img id="star5" src="img/starhalf.png">
									<?php  }else {?> <img id="star5" src="img/star.png"  ><?php }?>
									</a>
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									<span id="showText" style="color: yellow;font-size: 18px;border: 2;"></span>
						</div>

