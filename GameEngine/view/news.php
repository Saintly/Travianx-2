<?php
echo '<h1>'.text_snews_lang.'</h1>
<form method="post" action="news.php">
	<div id="block">
		<textarea name="news" id="notice">'.$this->siteNews.'</textarea>
		<p class="btn"><input id="btn_save" type="image" value="" name="s1" src="assets/x.gif" class="dynamic_img" alt="'.text_save_lang.'"><br />'.(($this->saved)?text_newssaved_lang : '').'</p>
	</div>
</form>';