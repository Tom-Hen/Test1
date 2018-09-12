<?php
require __DIR__ . '/../google-cloud-translate/translate/vendor/autoload.php';

# Imports the Google Cloud client library
use Google\Cloud\Translate\TranslateClient;

# Your Google Cloud Platform project ID
$projectId = 'l3-translate';
# Instantiates a client
$translate = new TranslateClient([
    'projectId' => $projectId
]);
# The text to translate
# The target language
$target = 'en';
$mode =  (@$_GET['mode']);
if($mode !== null){
	if ($mode == 'sent' && isset($_POST['text'])){//this just checks something was actually sent, that may still be a null val tho
		//see do the ting
		$text = $_POST['text'];
		# Translates some text into Russian
		$translation = $translate->translate($text, [
		    'target' => $target
		]);
		echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />Text: ' . $text . ' (' . $translate->detectLanguage($text)['languageCode'] . ')<br/>Translation: ' . $translation['text'];
		# [END translate_quickstart]
		//return $translation;
	}else{
		print 'nothing';
	}
}else{
	print $mode.' is null.';
}
?>
<form action="<?php print '?mode=sent'; ?>" method="post">
	<input name="text" type="text"></input>
	<button>Submit</button>
</form>
<p>This is just to change the branch</p>