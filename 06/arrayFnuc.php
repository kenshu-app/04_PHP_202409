<?php
$domain = 'http://example.com?';
$text = 'PHP　MySQL　Laravel';


echo $domain . http_build_query(explode('　', $text));
