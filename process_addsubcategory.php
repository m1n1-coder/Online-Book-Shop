<?php

	if(!empty($_POST))
	{
		$msg=array();
		if(empty($_POST['subcat']) || empty($_POST['parent']))
		{
			$msg[]="Please full fill all requirement";
		}
		
		if(!empty($msg))
		{
			echo '<b>Error:-</b><br>';
			
			foreach($msg as $k)
			{
				echo '<li>'.$k;
			}
		}
		else
		{
		
			$link=mysql_connect("localhost","root","1604089","book_store")or die("Can't Connect...");
			
			mysql_select_db("shop",$link) or die("Can't Connect to Database...");
		
			$parent = $_POST['parent'];
			$subcat=$_POST['subcat'];
			
			$query="insert into subcat(parent_id, subcat_nm) values('$parent','$subcat')";
			
			mysql_query($query,$link) or die("can't Execute...");
			
			mysql_close($link);
			header("location:category.php");
		}
	}
	else
	{
		header("location:index.php");
	}
?>
	
	