<?



	# ----------------------------------------------------------------------------------------------------
	# * FILE: /article/reviewformpopup.php
	# ----------------------------------------------------------------------------------------------------
	
	# ----------------------------------------------------------------------------------------------------
	# LOAD CONFIG
	# ----------------------------------------------------------------------------------------------------
	include("../conf/loadconfig.inc.php");
	
	@session_start();
	
	header("Content-Type: text/html; charset=".EDIR_CHARSET, TRUE);
	header("Expires: Sat, 01 Jan 2000 00:00:00 GMT");
	header("Cache-Control: no-store, no-cache, must-revalidate");
	header("Cache-Control: post-check=0, pre-check=0", FALSE);
	header("Pragma: no-cache");

	require(EDIRECTORY_ROOT."/frontend/checkregbin.php");
	
	# ----------------------------------------------------------------------------------------------------
	# AUX
	# ----------------------------------------------------------------------------------------------------
	if (!$_GET['review'] && !$_POST['review']) {
		unset($review);
	}
	
	reset($_POST); foreach($_POST as $key=>$value) { $_POST[$key] = utf8_decode(trim($value)); }
	reset($_GET);  foreach($_GET as $key=>$value) { $_GET[$key] = utf8_decode(trim($value)); }
	
	extract($_POST);
	extract($_GET);
	
	$rating = $_POST["rating"];
	include(INCLUDES_DIR."/code/review.php");
	$articleObj = $itemObj;
	
?>

	<script type="text/javascript" language="javascript">
		function setDisplayRatingLevel(level) {
			for(i = 1; i <= 5; i++) {
				var starImg = "img_rate_star_off.gif";
				if( i <= level ) {
					starImg = "img_rate_star_on.gif";
				}
				var imgName = 'star'+i;
				document.images[imgName].src="<?=DEFAULT_URL?>/images/content/"+starImg;
			}
		}
		function resetRatingLevel() {
			setDisplayRatingLevel(document.rate_form.rating.value);
		}
		function setRatingLevel(level) {
			document.rate_form.rating.value = level;
		}
	</script>

	<? if ($error_message) { ?>
		<?="<p class=\"errorMessage\">".$error_message."</p>";?>
	<? } else { ?>

		<h2 class="standardTitle"><?=system_showText(LANG_REVIEWSOF)?> <span><?=$articleObj->getString("title")?></span></h2>

		<? if ($success_review) { ?>
			<br />
			<div class="response-msg success ui-corner-all"><?=$message_review?></div>
			<br />
			<p class="standardButton ratingButton">
				<button type="button" name="bt_close" value="<?=system_showText(LANG_CLOSE)?>" onclick="tb_remove()"><?=system_showText(LANG_CLOSE)?></button>
			</p>
		<? } ?>

		<? if (!$success_review) { ?>
			<form name="rate_form" action="javascript:review_formPost('<?=ARTICLE_DEFAULT_URL.'/reviewformpopup.php'?>')">
				<input type="hidden" id="item_type" name="item_type" value="article" />
				<input type="hidden" id="item_id" name="item_id" value="<?=$item_id?>" />
				<? include(INCLUDES_DIR."/forms/form_review.php"); ?>
				<p class="standardButton ratingButton">
					<button type="submit" name="submit" value="Submit" tabindex="7"><?=system_showText(LANG_BUTTON_SEND)?></button>
				</p>
			</form>
		<? } ?>

	<? } ?>
