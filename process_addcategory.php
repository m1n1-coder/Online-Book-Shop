<?php

	if(!empty($_POST))
	{
		$msg=array();
		if(empty($_POST['cat']))
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
		
			$cat=$_POST['cat'];
			
			$query="insert into category(cat_nm) values('$cat')";
			
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
	
	