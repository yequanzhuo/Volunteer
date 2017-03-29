<?php

$dir=dirname(__FILE__);//查找当前脚本所在路径
require $dir."/PHPExcel/PHPExcel.php";//引入PHPExcel
$objPHPExcel=new PHPExcel();//实例化PHPExcel类

$conn = mysql_connect("localhost","root","");
mysql_select_db("users",$conn);
mysql_query("set names utf8");
//1
$sql = mysql_query("select username,sex,nation,height,weight,birth,face,address,love,have from user order by id  limit 2,5");
$objPHPExcel->setActiveSheetIndex(0)
		->setCellValue('A1','姓名')
		->setCellValue('B1','性别')
		->setCellValue('C1','民族')
		->setCellValue('D1','身高')
		->setCellValue('E1','体重')
		->setCellValue('F1','出生日期')
		->setCellValue('G1','政治面貌')
		->setCellValue('H1','家庭所在城市')
		->setCellValue('I1','个人爱好')
		->setCellValue('J1','是否有志愿者手册');
		
$i=2;
while($rs=mysql_fetch_array($sql)){
	$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue('A'.$i,$rs[0])
			->setCellValue('B'.$i,$rs[1])
			->setCellValue('C'.$i,$rs[2])
			->setCellValue('D'.$i,$rs[3])
			->setCellValue('E'.$i,$rs[4])
			->setCellValue('F'.$i,$rs[5])
			->setCellValue('G'.$i,$rs[6])
			->setCellValue('H'.$i,$rs[7])
			->setCellValue('I'.$i,$rs[8])
			->setCellValue('J'.$i,$rs[9]);
			$i++;
			
}
//2
$sql = mysql_query("select grade,username1,academy,profession from teaching order by id  limit 2,5");
$objPHPExcel->setActiveSheetIndex(0)
		->setCellValue('K1','年级')
		->setCellValue('L1','学号')
		->setCellValue('M1','学院')
		->setCellValue('N1','专业');


$i=2;
while($rs=mysql_fetch_array($sql)){
	$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue('K'.$i,$rs[0])
			->setCellValue('L'.$i,$rs[1])
			->setCellValue('M'.$i,$rs[2])
			->setCellValue('N'.$i,$rs[3]);
			$i++;
}			
//3	
$sql = mysql_query("select phone,qq,email,weixin from details order by id  limit 2,5");
$objPHPExcel->setActiveSheetIndex(0)
		->setCellValue('O1','手机号码')
		->setCellValue('P1','qq号码')
		->setCellValue('Q1','email')
		->setCellValue('R1','微信号');


$i=2;
while($rs=mysql_fetch_array($sql)){
	$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue('O'.$i,$rs[0])
			->setCellValue('P'.$i,$rs[1])
			->setCellValue('Q'.$i,$rs[2])
			->setCellValue('R'.$i,$rs[3]);
			$i++;
			
}
//4
$sql = mysql_query("select service from volunteering order by id  limit 2,5");
$objPHPExcel->setActiveSheetIndex(0)
		->setCellValue('S1','志愿服务分类');


$i=2;
while($rs=mysql_fetch_array($sql)){
	$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue('S'.$i,$rs[0]);
			$i++;
			
}
//5
$sql = mysql_query("select f1,s1,t1,f2,f3 from record order by id  limit 2,5");
$objPHPExcel->setActiveSheetIndex(0)
		->setCellValue('T1','志愿者诚信档案');


$i=2;
while($rs=mysql_fetch_array($sql)){
	$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue('T'.$i,$rs[0]);
			$i++;
			
}
						
			
$objPHPExcel->getActiveSheet()->setTitle('志愿者注册信息');
$objPHPExcel->setActiveSheetIndex(0);
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel5');
$objWriter->save(str_replace('.php','.xls',__FILE__));

	
?>