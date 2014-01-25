<?
$resultPosts = mysql_query("Select * from posts order by createdDate desc");
while($rowPosts = mysql_fetch_array($resultPosts))
{
?>
<li><a href="blogDetail.php?id=<?=$rowPosts["id"]?>"><?=stripslashes($rowPosts["heading"])?></a></li>
<?
}
?>