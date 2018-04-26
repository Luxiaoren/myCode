<?php
header("content-type:text/html;charset=utf-8");
$host="localhost:3306";
$name="root";
$pass="root";
$link=mysql_connect($host,$name,$pass);
if(!$link){
    echo "connect filed!";
}
mysql_select_db("kangyong");
mysql_query("set names utf8");

$sql="select *from myclass";
$res=mysql_query($sql);
if(!$res){
	echo "显示错误";
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<table width="400" cellpadding="1" cellspacing="0" border="1">
	<tr>
		<th>id</th>
		<th>姓名</th>
		<th>性别</th>
		<th>机试成绩</th>
		<th>笔试成绩</th>
		<th>操作</th>
	</tr>

	<?php
		while($arr=mysql_fetch_assoc($res)){


	?>
	<tr>
		<td><?php echo $arr['id']?></td>
		<td><?php echo $arr['name']?></td>
		<td><?php echo $arr['sex']?></td>
		<td><?php echo $arr['comp']?></td>
		<td><?php echo $arr['pen']?></td>
		<td><a href="delete.php?id=<?php echo $arr['id']?>">删除</a></td>
	</tr>
	<?php
		}
	?>
</table>
</body>
</html>