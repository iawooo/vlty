<?php

/**
 * 反互联网垃圾扫描爬虫
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
(function () {
	if (Helper::options()->JProtect == 'off') return;

	//应该禁止的UA
	$blockSpiders = [

		//脚本
		"Apache-HttpClient",
		"colly",
		"curl",
		"okhttp",
		"Go-http-client",
		"python-requests",
		"Python-urllib",
		"python-httpx",
		"Scrapy",
		"aiohttp",
		"Nmap Scripting Engine",
		"Java",
		"fasthttp",
		"Wget",

		//探测爬虫
		"CensysInspect",
		"intelx.io_bot",
		"InternetMeasurement",
		"ips-agent",
		"MJ12Bot",
		"NetcraftSurveyAgent",
		"SemrushBot",
		"l9scan",
		"SEOlyt",
		"kirkland-signature",
		"ZoominfoBot",
		"Expanse",
		"CheckMarkNetwork",
		"dotbot",
		"Pandalytics",
		"Screaming Frog SEO Spider",
		"W3C_CSS_Validator_JFouffa",

		//虚假UA
		"Dalvik/2.1.0 (Linux; U; Android 9.0; ZTE BA520 Build/MRA58K)",
		"msnbot",//bing弃用爬虫
		"Gregarius",
		"Mozilla/4.0",//低版本Mozilla,
		"SonyEricsson",
		"Nokia",
		"BlackBerry"

	];

	//搜索引擎ua
	$spiders = [
		"Googlebot-Image",
		"Googlebot",
		"Baiduspider",
		"baiduboxapp",
		"YisouSpider",
		"Quark",
		"360Spider",
		"bingbot",
		"GPTBot",
		
		//自身访问应允许
		"WordPress",
		"Typecho",
	];
	if(empty($_SERVER['HTTP_USER_AGENT'])){
		exit;
	}else{
		//先允许搜索引擎ua，防止误杀
		foreach ($spiders as $spider) {
			if (strpos($_SERVER['HTTP_USER_AGENT'], $spider) !== false)	return;
		}
		//再屏蔽禁止ua
		foreach ($blockSpiders as $spider) {
			if (strpos($_SERVER['HTTP_USER_AGENT'], $spider) !== false)	exit;
		}
	}
	
})();