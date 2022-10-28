<?php
	// $script = "";
	// // $script .= "let deletingAll = browser.history.deleteAll()";
	// $script .= "<script>";

	// $script .= "function deleteAllHistory() {";
	// $script .= "let deletingAll = browser.history.deleteAll();";
	// $script .= "deletingAll.then(onDeleteAll);";
	// $script .= "}";
	// $script .= "deleteAllHistory();";

	// $script .= "</script>";
	
	session_destroy();
	// echo $script;
	header("location:../../index.php");
?>