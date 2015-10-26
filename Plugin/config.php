<?php if (!defined('PLX_ROOT')) exit; 
# Control du token du formulaire
plxToken::validateFormToken($_POST);
	if(!empty($_POST)) {
		$plxPlugin->setParam('data', $_POST['data'], 'cdata');
		$plxPlugin->setParam('select', $_POST['select'], 'cdata');
		$plxPlugin->saveParams();
		header('Location: parametres_plugin.php?p=Plugin');
		exit;
	}
?>

<p>
	<h2><?php echo $plxPlugin->getInfo("description") ?></h2>
</p>

<p><?php $plxPlugin->lang('INFO') ?></p>

<code>&lt;?php eval($plxShow->callHook('Plugin')); ?&gt;</code>

<style>
	input, textarea {border-radius: 5px;width: 40%}
	input.numeric{width: 100px}
	textarea {min-height: 50px}
	label{font-style: italic}
</style>

<?php 

	$select = $plxPlugin->getParam('select');

?>


<form action="parametres_plugin.php?p=Plugin" method="post">

	<p>
		<label for="data">Exemple:</label>
		<input id="data" name="data"  maxlength="255" value="<?php echo $plxPlugin->getParam("data"); ?>">
	</p>

	<p>
		<label for="select"><?php $plxPlugin->lang('LABEL_JQUERY') ?></label>
		<select name="select" id="select">
			<option value="true"  <?php if ($select == 'true') { echo'selected';}?> >Oui</option>
			<option value="false" <?php if ($select == 'false') { echo'selected';}?> >Non</option>
		</select>
	</p>
	
	<p class="in-action-bar">
		<?php echo plxToken::getTokenPostMethod() ?>
		<input type="submit" name="submit" value="<?php $plxPlugin->lang('SUBMIT') ?>" />
	</p>

</form>