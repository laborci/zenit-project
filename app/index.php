<?php (function ($classLoader){
	new Zenit\Core\StartupSequence\Component\StartupSequence(
		__DIR__ . "/..",
		"etc/ini/env",
		"var/env.php",
		$classLoader
	);
})(include __DIR__ . '/../vendor/autoload.php');