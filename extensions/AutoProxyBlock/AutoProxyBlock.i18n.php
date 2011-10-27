<?php
$messages = array();

$messages['en'] = array(
	'autoproxyblock-desc' => 'Allows to block open proxies from performing actions in wiki',
	'proxy-blocked' => 'Your IP address is listed as proxy, performed action aborted.',
	'abusefilter-edit-builder-vars-is-proxy' => 'True if this action was performed through a proxy',
	'tag-proxy' => 'action through proxy',
	'right-notagproxychanges' => 'protect from tagging edits through proxies as "proxy"',
	'right-autoproxyblock-log' => 'view log of automatically blocked changes through proxies',
	'proxyblock-log-name' => 'Auto proxy block log',
	'proxyblock-log-header' => 'List of automatically blocked changes through proxies',
	'proxyblock-logentry' => '',
	'proxyblock-logentry-blocked' => 'User [[User:$3|$3]]\'s action "$2" on page [[$1]] automatically blocked.',
);

$messages['ru'] = array(
	'autoproxyblock-desc' => 'Позволяет запрещать совершать действия в вики c открытых прокси',
	'proxy-blocked' => 'Ваш IP-адрес находится в списках прокси, действие отменено.',
	'abusefilter-edit-builder-vars-is-proxy' => 'Истинно, если действие совершено через прокси',
	'tag-proxy' => 'совершено через прокси',
	'right-notagproxychanges' => 'правки через прокси не отмечаются меткой',	
);