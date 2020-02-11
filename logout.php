<?php  
session_start();
ini_set('display_errors',FALSE);
if (isset($_SESSION['admin']) || isset($_SESSION['superadmin'])){
	unset($_SESSION['admin']);
	unset($_SESSION['superadmin']);
	//session_unregister($_SESSION['userlogin']);
	
	//session_destroy();
	?><script language="javascript">
window.location.href="index.php";
</script>
<?php 
	
}else{
	?><script language="javascript">
window.location.href="index.php";
</script>
<?php 
}
?>