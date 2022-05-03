<?php

$c = 0;
$host = $_GET['hostname'];
$blacklist = array("file", "ftp", "php", "zlib", "data", "glob", "phar", "ssh2", "rar", "ogg", "expect","127.0.0.1","127.0.1", "127.1", "0000::1:80", "[::]:80", "localhost", "2130706433", "0x7f000001", "0x7f000001", "0177.00.00.01");

for($i = 0; $i <= 20; $i++) {
  if ((strpos($host, $blacklist[$i]) === false)) {
    $c = $c + 1;
  }
}
if ($c == 21) {
  if (filter_var($host, FILTER_VALIDATE_URL)) {
    echo "<pre>"; echo shell_exec(escapeshellcmd("curl $host")); echo "</pre>"; # This can be replaced with backticks (``).
    # escapeshellcmd() is used to escape shell metacharacter
  } else {
    echo "This is not a valid URL!";
  }
} else {
  echo "What are you doing H4CK3R! Try harder :v";
}

?>
