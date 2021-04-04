<?php

	$pattern="";
	$text="";
	$replaceText="";
	$replacedText="";

	$match="Not checked yet.";

	$spaceString = "";
	$spacePattern = "/\s+/";
	$noSpaceString = "";

	$nonNumericString = "";
	$numericReg = "/[^0-9,.]/";
	$numericString = "";

	$newLineString = "";
	$noNewLineString = "";
	$newLineReg = "/[\n]/";

if ($_SERVER["REQUEST_METHOD"]=="POST") {
	$pattern=$_POST["pattern"];
	$text=$_POST["text"];
	$replaceText=$_POST["replaceText"];

	$replacedText=preg_replace($pattern, $replaceText, $text);

	if(preg_match($pattern, $text)) {
						$match="Match!";
					} else {
						$match="Does not match!";
					}
	$spaceString = $_POST["spaceString"];
    $noSpaceString = preg_replace($spacePattern, "", $spaceString);

    $nonNumericString = $_POST["nonNumericString"];
    $numericString = preg_replace($numericReg, "", $nonNumericString);

    $newLineString = $_POST["newLineString"];
    $noNewLineString = preg_replace($newLineReg, "", $newLineString);
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Valid Form</title>
</head>
<body>
	<form action="regex_valid_form.php" method="post">
		<dl>
			<dt>Pattern</dt>
			<dd><input type="text" name="pattern" value="<?= $pattern ?>"></dd>

			<dt>Text</dt>
			<dd><input type="text" name="text" value="<?= $text ?>"></dd>

			<dt>Replace Text</dt>
			<dd><input type="text" name="replaceText" value="<?= $replaceText ?>"></dd>

			<dt>Output Text</dt>
			<dd><?=	$match ?></dd>

			<dt>Replaced Text</dt>
			<dd> <code><?=	$replacedText ?></code></dd>

			<dt>&nbsp;</dt>
			<dd><input type="submit" value="Check"></dd>
		</dl>
        <dl>
            <dt>Enter text to remove white space from:</dt>
            <dd><input type="text" name="spaceString" value="<?= $spaceString ?>"></dd>

            <dt>Output Text</dt>
            <dd><?=	$noSpaceString ?></dd>

            <dt>&nbsp;</dt>
            <dd><input type="submit" value="Check"></dd>
        </dl>
        <dl>
            <dt>Enter text to remove nonnumeric chars from:</dt>
            <dd><input type="text" name="nonNumericString" value="<?= $nonNumericString ?>"></dd>

            <dt>Output Text</dt>
            <dd><?=	$numericString ?></dd>

            <dt>&nbsp;</dt>
            <dd><input type="submit" value="Check"></dd>
        </dl>
        <dl>
            <dt>Enter text to remove newline chars from:</dt>
            <dd><textarea name="newLineString" rows="10" cols="50"> </textarea></dd>

            <dt>Output Text</dt>
            <dd><?=	$noNewLineString ?></dd>
            <dt>&nbsp;</dt>
            <dd><input type="submit" value="Check"></dd>
        </dl>
	</form>
</body>
</html>
