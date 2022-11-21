			<?php
			include_once("../../finishit.php");
			session_start();
			if(x_count("iqgames_type","id='1' AND status='1' LIMIT 1") > 0){
				foreach(x_select("timing,type","iqgames_type","id='1' AND status='1'","1","id") as $leg){
					$time = $leg["timing"];$examtype = $leg["type"];
					}
					
			$seconds = $time * 60;
			$timet = time() + $seconds;
			$_SESSION['timeer'] = $timet;
			$exam_token = sha1(uniqid());
			setcookie("$exam_token" ,"$exam_token" , $timet);
			x_print("Timing system active");
			}else{
				x_print("Invalid timing system");
			}
			
			?>