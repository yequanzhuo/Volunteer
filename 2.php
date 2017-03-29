<?php
header('Content-Type:text/html;charset=utf-8');
//error_reporting(0);
mysql_connect('localhost','root','');
mysql_select_db('users');
mysql_query('set names utf8');
function uploadFile($fileInfo,$uploadPath='uploads',$allowExt=array('jpeg','jpg','gif','png'),$maxSize=2097152){
		if($fileInfo['error']>0){
			switch($fileInfo['error']){
				case 1:
					$mes = '上传文件超过php配置文件中upload_max_filesize';
					break;
				case 2:
					$mes = '超过表单MAX_FILE_SIZE大的限制大小';
					break;
				case 3:
					$mes = '文件部分被上传';
					break;
				case 4:
					$mes = '没有选择上传文件';
					break;
				case 6:
					$mes ='没有找到临时目录';
					break;
				case 7:
				case 8:
					$mes = '系统错误';
				break;
			}
			exit ($mes);
			return false;
		}
		$ext = pathinfo($fileInfo['name'],PATHINFO_EXTENSION);
		if(!is_array($allowExt)){
			exit('系统错误');
		}
		//检测文件上传的类型
		if(!in_array($ext,$allowExt)){
			exit('非法文件类型');
		}
		//检测上传文件大小是否符合规范
		if($fileInfo['size']>$maxSize){
			exit('上传文件过大');
		}
		$uploadPath='image';//传到哪个目录下
		if(!file_exists($uploadPath)){
			mkdir($uploadPath,0777,true);
			chmod($uploadPath,0777);
		}
		$uniName=md5(uniqid(microtime(true),true)).'.'.$ext;
		$destination=$uploadPath.'/'.$uniName;	
		if(!move_uploaded_file($fileInfo['tmp_name'],$destination)){
			exit('文件移动失败');
		}
		//echo '文件上传成功';	
		return $destination;
		
	}	
	$fileInfo=$_FILES['myFile'];
	$newName=uploadFile($fileInfo);
	
	//判断重复的姓名
	$username=$_POST['username'];
	
	$sqlx = "select *from user ";
	$res = mysql_query($sqlx);
	while($row=mysql_fetch_assoc($res)){
		if($row['username'] == $username){
			exit("用户名已存在,请在姓名一栏后加入学号，形式如:某某某-xxxxxxxx。<a href='facing.php'>填写</a>");
		}
	}
	//判断重复的学号
	$username1=$_POST['username1'];
	
	$sql0 = "select *from teaching ";
	$res = mysql_query($sql0);
	while($row=mysql_fetch_assoc($res)){
		if($row['username1'] == $username1){
			exit("学号已存在,请重新<a href='facing.php'>填写</a>");
		}
	}
	
//1
	$username=$_POST['username'];
	$sex=$_POST['sex'];
	$nation=$_POST['nation'];
	$height=$_POST['height'];
	$weight=$_POST['weight'];
	$birth= $_POST['birth'];
	$birth1=implode(".",$birth);
	
	$face=$_POST['face'];
	$address=$_POST['address'];
	$love=$_POST['love'];
	$have=$_POST['have'];
	
	$sql="insert into user(username,sex,height,weight,nation,birth,face,address,love,have,myFile) values('$username','$sex','$height','$weight','$nation','$birth1','$face','$address','$love','$have','$newName')";
	$query =  mysql_query($sql);

	if($query==true){ 
		//2
		$grade=$_POST['grade'];
		$username1=$_POST['username1'];
		$academy=$_POST['academy'];
		$profession=$_POST['profession'];

		$sql1="insert into teaching(grade,username1,academy,profession) values('$grade','$username1','$academy','$profession')";
		$query1 =  mysql_query($sql1);
		if($query1==true){ 
			//3
			$phone=$_POST['phone'];
			$qq=$_POST['qq'];
			$email=$_POST['email'];
			$weixin=$_POST['weixin'];

			$sql2="insert into details(phone,qq,email,weixin) values('$phone','$qq','$email','$weixin')";
			$query2 =  mysql_query($sql2);
			if($query2==true){ 
				//4
				$service=$_POST['service'];
				$service1=implode(",",$service);
				
				$sql3="insert into volunteering(service) values('$service1')";
				$query3 =  mysql_query($sql3);

				if($query3==true){ 
									//5
					$first = $_POST['first'];
					$f1=implode(",",$first);
					
					$second = $_POST['second'];
					$s1=implode(",",$second);
					
					$third = $_POST['third'];
					$t1=implode(",",$third);
					
					$forth = $_POST['forth'];
					$f2=implode(",",$forth);
					
					$firth = $_POST['firth'];
					$f3=implode(",",$firth);
					
					$sql4="insert into record(f1,s1,t1,f2,f3) values('$f1','$s1','$t1','$f2','$f3')";
					$query4 =  mysql_query($sql4);

					if($query4==true){ 
						echo "添加成功";
					}else{
						echo "<script>alert('添加失败！');location='facing.php';</script>";
					}	
				}else{
					echo "<script>alert('添加失败！');location='facing.php';</script>";
				}	
			}else{
				echo "<script>alert('添加失败！');location='facing.php';</script>";
			}
		}else{
			echo "<script>alert('添加失败！');location='facing.php';</script>";
		}		
	}else{
		echo "<script>alert('添加失败！');location='facing.php';</script>";
	}	

	
	
	
	

	

?>







