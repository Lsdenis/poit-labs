<?php
session_start();
ini_set('display_errors', 'on');
ini_set('memory_limit', '2048M');
ini_set('max_execution_time', 600);

require_once "fksistagram.php";

$worker = new Fksistagram($_COOKIE['image']);

switch ($_GET['method']) {
	case 'histogram':
		$worker->histogram();
		break;

	case 'gammaCorrect':
		$worker->gammaCorrect($_GET['q'], $_GET['c']);
		break;

	case 'lineContrastCorrect':
		$worker->lineContrastCorrect($_GET['gmin'], $_GET['gmax']);
		break;

	case 'logCorrect':
		$worker->logCorrect($_GET['cLog']);
		break;

	case 'src':
		$worker->src();
		break;

	case 'hfFilter':
		$worker->hfFilter();
		break;

	case 'lfFilter':
		$worker->lfFilter();
		break;

	case 'robertsFilter':
		$worker->robertsFilter();
		break;

	case 'klaster':
		$worker->klaster($_GET['c'], $_GET['grey']);
		break;

	case 'gaussian':
		$worker->gaussian($_GET['minMax']);
		break;

	default:
		$worker->src();
		break;
}

$worker->out();
