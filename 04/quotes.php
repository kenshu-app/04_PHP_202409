<?php
$quotes = 'よくわかるPHPの教科書';
?>
<!-- 代入した変数を組み合わせ以下と同じように出力：
"先週'よくわかるPHPの教科書'を読み始めた。" 
-->
<?='"先週\'' . $quotes . '\'を読み始めた。"<br>'?>
<?="\"先週'" . $quotes . "'を読み始めた。\""?>
<p>"先週'<?=$quotes?>'を読み始めた。" </p>
