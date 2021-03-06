<?



	# ----------------------------------------------------------------------------------------------------
	# * FILE: /membros/faq.php
	# ----------------------------------------------------------------------------------------------------


	# ----------------------------------------------------------------------------------------------------
	# LOAD CONFIG
	# ----------------------------------------------------------------------------------------------------
	include("../conf/loadconfig.inc.php");

	# ----------------------------------------------------------------------------------------------------
	# SESSION
	# ----------------------------------------------------------------------------------------------------
	sess_validateSession();

	# ----------------------------------------------------------------------------------------------------
	# AUX
	# ----------------------------------------------------------------------------------------------------
	$account = new Account(sess_getAccountIdFromSession());
	$contact = db_getFromDB("contact", "account_id", db_formatNumber($account->getNumber("id")), "1");

	# ----------------------------------------------------------------------------------------------------
	# VALIDATION
	# ----------------------------------------------------------------------------------------------------
	include(EDIRECTORY_ROOT."/includes/code/validate_querystring.php");
	include(EDIRECTORY_ROOT."/includes/code/validate_frontrequest.php");

	######################################################################################################
	# SQL
	######################################################################################################
	include(EDIRECTORY_ROOT."/includes/code/faq.php");

	######################################################################################################
	# FORM
	######################################################################################################
	include(EDIRECTORY_ROOT."/includes/forms/form_faq.php");

?>
