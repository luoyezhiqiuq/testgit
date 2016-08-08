<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kpi extends CI_Controller {

	public function index()
	{
	 	$this->load->view('common/header');
	 	$this->load->view('lily/kpi/index');
	}	
	public function cc()
	{
			header("Content-type: text/html; charset=gbk");
		 require_once '/excal/Classes/PHPExcel.php';     //修改为自己的目录

		/**对excel里的日期进行格式转化*/
		// function GetData($val){
		// 	$jd = GregorianToJD(1, 1, 1970);
		// 	$gregorian = JDToGregorian($jd+intval($val)-25569);
		// 	return $gregorian;/**显示格式为 “月/日/年” */
		// }

			$filePath = 'teacherkpi.xlsx';

			$PHPExcel = new PHPExcel();

			/**默认用excel2007读取excel，若格式不对，则用之前的版本进行读取*/
			$PHPReader = new PHPExcel_Reader_Excel2007();
			if(!$PHPReader->canRead($filePath)){
			$PHPReader = new PHPExcel_Reader_Excel5();
			if(!$PHPReader->canRead($filePath)){
			echo 'no Excel';
			return ;
			}
		}

			$PHPExcel = $PHPReader->load($filePath);
			/**读取excel文件中的第一个工作表*/
			$currentSheet = $PHPExcel->getSheet(0);
			/**取得最大的列号*/
			$allColumn = $currentSheet->getHighestColumn();
			/**取得一共有多少行*/
			$allRow = $currentSheet->getHighestRow();
			/**从第二行开始输出，因为excel表中第一行为列名*/
			$data = array();
			for($currentRow = 2;$currentRow <= $allRow;$currentRow++){
			/**从第A列开始输出*/
				for($currentColumn= 'A';$currentColumn<= $allColumn; $currentColumn++){
					$val = $currentSheet->getCellByColumnAndRow(ord($currentColumn) - 65,$currentRow)->getValue();/**ord()将字符转为十进制数*/
					/**如果输出汉字有乱码，则需将输出内容用iconv函数进行编码转换，如下将gb2312编码转为utf-8编码输出*/
					$v = iconv('utf-8','gbk', $val)."\t";
					// }
					$data[$currentRow][] = $v;
				}
				
			}
			$dataarray = array();
				foreach($data as $key=>$val)
				{
					$dataarray[$key]['username'] = trim(iconv('gbk','utf-8',$val[0]));
					$dataarray[$key]['author'] =  trim(iconv('gbk','utf-8',$val[2]));
					$dataarray[$key]['authorid'] = '769';
					$dataarray[$key]['type'] = '2';
					$dataarray[$key]['time'] = time();
					$dataarray[$key]['month'] = '2016年05月';
					$dataarray[$key]['kpi'] =  substr($val[1],0,5);
					print("<pre>");
				}
				$this->load->model('KpiModel');
				$this->load->model('TeacherDetaiModel');
				foreach($dataarray as $key=>$val)
				{
					$retid = $this->TeacherDetaiModel->whereIdData(trim($val['username']));
					foreach($retid as $k=>$v)
					{
						$val['uid'] = $v->id;

					}
					$this->KpiModel->insert($val);
				}

			}

			public function sqlkpi()
			{
				$this->load->model('KpiModel');
				$date = $this->KpiModel->dataAll();
				$this->load->model('TeacherDetaiModel');
				$error = array();
				foreach($date as $key=>$val)
				{
					$ret = $this->TeacherDetaiModel->whereDataAll(trim($val->username));
					foreach($ret as $v)
					{
						$rets = $this->KpiModel->update($val->id,$v->id);
						if($rets)
						{
							$error[] = $v;
						}
					}
			
				}
				print_r($error);
				
			}
			public function upload()
			{

				$tmp = $_FILES['file']['tmp_name']; 
				if (empty ($tmp)) { 
				    echo '请选择要导入的Excel文件！'; 
				    exit; 
				} 
				// echo $tmp;
				$save_path = "xls/"; 
				$file_name = $save_path.date('Ymdhis') . ".xls"; //上传后的文件保存路径和名称 
				if (copy($tmp, $file_name)) { 
				    $xls = new Spreadsheet_Excel_Reader(); 
				    $xls->setOutputEncoding('utf-8');  //设置编码 
				    $xls->read($file_name);  //解析文件 
				    for ($i=2; $i<=$xls->sheets[0]['numRows']; $i++) { 
				        $name = $xls->sheets[0]['cells'][$i][0]; 
				        $sex = $xls->sheets[0]['cells'][$i][1]; 
				        $age = $xls->sheets[0]['cells'][$i][2]; 
				        $data_values .= "('$name','$sex','$age'),"; 
				    } 
				    $data_values = substr($data_values,0,-1); //去掉最后一个逗号 
				    $query = mysql_query("insert into student (name,sex,age) values $data_values");//批量插入数据表中 
				    if($query){ 
				        echo '导入成功！'; 
				    }else{ 
				        echo '导入失败！'; 
				    } 
				} 
			}
			//只能导入excel表格
			public function doupload()
			{
				$author = $this->input->post('author');
				$authorid = $this->input->post('authorid');
				$month = $this->input->post('month');
				$type = $this->input->post('type');
				$repeatarray = array();
				$existarray = array();
				$failtarray = array();
				if($author && $authorid && $month && $type)
				{
					require_once '/excal/Reader.php';
					$file=$_FILES['excel']['tmp_name'];
					$data = new Spreadsheet_Excel_Reader();
					$data->setOutputEncoding('utf-8');
					$data->read($file);
					$where = '';
					$info=array();
					$this->load->model("StaffModel");
					$this->load->model("KpiModel");
					for($i = 2; $i <= $data->sheets[0]['numRows']; $i++) {
						$cnname=trim($data->sheets[0]['cells'][$i][1]);
						$info['name']=trim($data->sheets[0]['cells'][$i][1]);
						$info['kpi']=trim($data->sheets[0]['cells'][$i][2]);
						$ret = $this->StaffModel->whereIdData($info['name']);
						if($ret==300)
						{
							$repeatarray[] = $info;
						}else
						{
							foreach($ret as $k=>$v)
							{
								$rets = $this->KpiModel->whereDataAll($v->cnname,$month);
								if(!$rets)
								{
									$v->username= $v->cnname;
									$v->uid= $v->staffid;
									unset($v->cnname);
									unset($v->staffid);
									$v->author = $author;
									$v->authorid = $authorid;
									$v->type = $type;
									$v->month = $month;
									$v->time = time();
									$lastret = $this->KpiModel->insert($v);
									if(!$lastret)
									{
										$failtarray[] = $v;
									}
								}
								else{
									$v->kpi = $info['kpi'];
									$existarray[] = $v;
								}
							}
						}
						
						
					}
				}
			//查询所有重复的姓名
			//SELECT * FROM lily_staff WHERE cnname IN (SELECT cnname FROM lily_staff GROUP BY cnname HAVING COUNT(cnname) > 1);
				$this->load->view('common/header');
				$this->load->view('lily/kpi/doupload',array('repeat'=>$repeatarray,'exits'=>$existarray,'fail'=>$failtarray));
			}
			public function uploadmulu()
			{
				$author = $this->input->post('author');
				$authorid = intval($this->input->post('authorid'));
				$type = intval($this->input->post('type'));
				$month = $this->input->post('month');

				$config['upload_path']      = './upload/';
		        $config['allowed_types']    = 'gif|jpg|png|xlsx';
		      

		        $this->load->library('upload', $config);
		       

		        if ( ! $this->upload->do_upload('userfile'))
		        {
		            $error = array('error' => $this->upload->display_errors());
		        }
		        else
		        {
		            $data = array('upload_data' => $this->upload->data());
		        }
		          $filePath = $this->upload->data('full_path');
		       header("Content-type: text/html; charset=gbk");
		 		require_once '/excal/Classes/PHPExcel.php';     //修改为自己的目录
				$PHPExcel = new PHPExcel();
				/**默认用excel2007读取excel，若格式不对，则用之前的版本进行读取*/
				$PHPReader = new PHPExcel_Reader_Excel2007();
				if(!$PHPReader->canRead($filePath)){
						$PHPReader = new PHPExcel_Reader_Excel5();
						if(!$PHPReader->canRead($filePath)){
						echo 'no Excel';
						return ;
						}
					}

			$PHPExcel = $PHPReader->load($filePath);
			/**读取excel文件中的第一个工作表*/
			$currentSheet = $PHPExcel->getSheet(0);
			/**取得最大的列号*/
			$allColumn = $currentSheet->getHighestColumn();
			/**取得一共有多少行*/
			$allRow = $currentSheet->getHighestRow();
			/**从第二行开始输出，因为excel表中第一行为列名*/
			$data = array();
			for($currentRow = 2;$currentRow <= $allRow;$currentRow++){
			/**从第A列开始输出*/
				for($currentColumn= 'A';$currentColumn<= $allColumn; $currentColumn++){
					$val = $currentSheet->getCellByColumnAndRow(ord($currentColumn) - 65,$currentRow)->getValue();/**ord()将字符转为十进制数*/
					/**如果输出汉字有乱码，则需将输出内容用iconv函数进行编码转换，如下将gb2312编码转为utf-8编码输出*/
					$v = iconv('utf-8','gbk', $val)."\t";
					$data[$currentRow][] = $v;
				}
			}
			$dataarray = array();
				foreach($data as $key=>$val)
				{
					print_r($val);
					// $dataarray[$key]['username'] = trim(iconv('gbk','utf-8',$val[0]));
					// $dataarray[$key]['author'] =  $author;
					// $dataarray[$key]['authorid'] = $authorid;
					// $dataarray[$key]['type'] = $type;
					// $dataarray[$key]['time'] = time();
					// $dataarray[$key]['month'] = $month;
					// $dataarray[$key]['kpi'] =  substr($val[1],0,5);
					print("<pre>");
				}
			// 	$this->load->model('KpiModel');
			// 	$this->load->model('TeacherDetaiModel');
			// 	$error = array();
			// 	$sss = array();
			// 	foreach($dataarray as $key=>$val)
			// 	{
			// 		$retid = $this->TeacherDetaiModel->whereIdData(trim($val['username']));
			// 		$val['uid'] = '';
			// 		foreach($retid as $k=>$v)
			// 		{
			// 			$val['uid'] = $v->id;

			// 		}
			// 		if($val['uid'])
			// 		{
			// 			$error[$key][] = $this->KpiModel->insert($val);
			// 		}else
			// 		{
			// 			$sss[] = iconv('utf-8','gbk',$val['username']);
			// 		}
			// 	}
			// 	echo iconv('utf-8','gbk','这些教师请您手动录入');print("<br>");
			// 	print_r($sss);
				
			}
			public function staffkpi()
			{
			
				$this->load->view('common/header');
				$this->load->view('lily/kpi/staffkpi');
			}
			public function staffoff()
			{
				$this->load->view('common/header');
				$this->load->view('lily/kpi/staffoff');
			}
			public function staffdooff()
			{
				require_once '/excal/Reader.php';
					$file=$_FILES['excel']['tmp_name'];
					$data = new Spreadsheet_Excel_Reader();
					$data->setOutputEncoding('utf-8');
					$data->read($file);
					$where = '';
					$info=array();
					$loasarray = array();
					$noarray = array();
					$this->load->model("StaffModel");
					// $this->load->model("KpiModel");
					for($i = 2; $i < $data->sheets[0]['numRows']; $i++) {
						
							$info['name']=trim($data->sheets[0]['cells'][$i][1]);
							$info['turnover']=trim($data->sheets[0]['cells'][$i][2]);
							if($info['turnover']!=='未知')
							{
								$turnarray = explode('/',$info['turnover']);
								if(strlen($turnarray[0])==1)
								{
									$month = '0'.$turnarray[0];
								}else{
									$month = $turnarray[0];
								}
								if(strlen($turnarray[1])==1)
								{
									$ri = '0'.$turnarray[1];
								}else
								{
									$ri = $turnarray[1];
								}
								$datestr = $turnarray[2].$month.$ri;
								// echo date('Ymd', strtotime($datestr));
								$info['turnover_time'] = strtotime($datestr);
								$chongming = $this->StaffModel->whereIdDataTurn($info['name']);
								if($chongming)
								{
									if($chongming==300)
									{
										print("<pre>");
										print_r($info);
									}else
									{
										foreach($chongming as $v)
										{
												$ret = $this->StaffModel->getNameTurnOver($v->cnname,$v->staffid);
												if(!$ret)
												{
													$chongming[0]->turnover_time = $info['turnover_time'];
													$wu = array();
													$noarray[] = $chongming;
												}
												if($ret==300)
												{
													$repeatarray[] = $info;
												}else
												{
													if($ret)
													{
														foreach($ret as $val)
														{
															$ids = $val->id;
														}
														$ps = array(
															'uid'=>$v->staffid,
															'username'=>$v->cnname,
															'turnover_time'=>$info['turnover_time']
															);
														print_r($ps);echo $ids;
														$this->StaffModel->turnoverUpdate($ps,$ids);
														// print("<pre>");
														// if(date("Y-m-d",$ret[0]->turnover_time)==date('Y-m-d',$info['turnover_time']))
														// {
														// }else
														// {
														// 	echo date("Y-m-d",$ret[0]->turnover_time);
														// 	echo '<br>';
														// 	echo date('Y-m-d',$info['turnover_time']);
														// 	print_r($info);
														// 	print_r($ret);

														// }
													}
											}
										}
									
									}

								}
								
								// die;



							
								
								

							}
					}
							// print_r($noarray);
							// print_r($repeatarray);
									// if($noarray)
									// {
									// 	header("Content-type:application/vnd.ms-excel");
									// 	header( "Content-Disposition:attachment;filename=test.csv");
									// 	print iconv('utf-8','gb2312','姓名');
									// 	print ",";
									// 	print iconv('utf-8','gb2312','日期');
									// 	print "\n";
									// 	foreach($noarray as $line)
									// 	{
									// 		print $line['staffid'];
									// 		print ",";
									// 		print  iconv('utf-8','gb2312',$line['cnname']);
									// 		print ",";
									// 		print iconv('utf-8','gb2312',date("Y-m-d",$line['turnover_time']));
									// 		print ",";
									// 		print iconv('utf-8','gb2312',date("Y-m-d",$line['turnover_time']));
									// 		print "\n";
									// 	}				
									// 	exit;
									// }
									// die;
										
			} 
			
}