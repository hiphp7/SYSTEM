<?php
function Upload($file_name,$path,$pub,$size=1048576){
	$type        = implode(",",$pub);
	$root        = $_SERVER['DOCUMENT_ROOT'];                //����վ���·��
	$image       = $_FILES[$file_name];                      //�����ļ����ֵ��һ�����飩
	if($image['name']=="")
	{
		return "";
	}
	$upload_path = $root.$path;                              //�����ϴ��ļ�λ��
	$leixing     = strtolower(strrchr($image['name'],"."));  //���ϴ����ļ�����.���Ժ�Ĳ���ȫ��Сд��ȡ���ļ�����չ����
	$suijishu    = rand(100,999);                            //ȡһ��100--999���������
	$server_file = time().$suijishu.$leixing;                //ȡ���ϴ��ļ���(ʱ��������������չ��)
	if (in_array($leixing,$pub))
	{                           //�ж���չ�����������ϴ����ͣ�
		 if ($image['size'] > $size){                            //�Ƚ��ϴ��ļ���С�������Ĵ�С
			echo "<script language='javascript'>";
			echo "alert(\"���ϴ����ļ�̫���벻Ҫ����50K\");";
			echo "window.history.go(-1);";
			echo "</script>";
			exit;
		 }
		$wenjia = 0;               
		 if (file_exists($upload_path.$server_file) && !$wenjia){  //�ж��ļ����Ƿ����
			echo "<script language='javascript'>";
			echo "alert(\"������ͬ�ļ������ļ�\");";
			echo "window.history.go(-1);";
			echo "</script>";
			exit; 
		 }
		 if (!move_uploaded_file($image['tmp_name'],$upload_path.$server_file)){//�ϴ��ļ�
			echo "<script language='javascript'>";
			echo "alert('�ϴ��ļ�ʧ�ܣ�������ϴ�');";
			echo "window.history.go(-1);";
			echo "</script>";
			exit; 
		 }
	}else{
		echo "<script language='javascript'>";
		echo "alert(\"�ϴ��ļ����Ͳ�֧�֣����ϴ�'".$type."'���͵��ļ�\");";
		echo "window.history.go(-1);";
		echo "</script>";
		exit; 
	}
	return  $path.$server_file;                 //�����ļ���(��·��)
}
?>