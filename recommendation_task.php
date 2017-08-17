<?php 

declare(strict_types=1);
namespace PhpmlExamples;

include 'vendor/autoload.php';
include 'recommendation_task_function.php';

use Phpml\CrossValidation\StratifiedRandomSplit;
use Phpml\Dataset\Demo\WineDataset;
use Phpml\Metric\Accuracy;
use Phpml\Regression\SVR;
use Phpml\SupportVectorMachine\Kernel;

$myfile = fopen("rs.csv", "r") or die("Unable to open file!");
$raw_data =  fread($myfile,filesize("rs.csv"));
fclose($myfile);

$pieces = explode("\n", $raw_data);
$refine_data 			= array();
$refine_data_count  	= 0;
$samples 					= array();
$targets 					= array();
$person_data 			= array();

$training_array 		= array();
$validation_array 		= array();
$test_array 				= array();

foreach( $pieces as $piece )
{
	$refine_data[$refine_data_count] = explode(",", $piece);
	if( strlen($refine_data[$refine_data_count]['0']) == 0 )
	{
		continue;
	}
	
	$person_data_temp_key = $refine_data[$refine_data_count]['1']."-customer";
	
	if( $refine_data_count < 121062.5 )//     0           ~  121062.5     50%
	{
		$training_array[$person_data_temp_key][] = $refine_data[$refine_data_count];
	}
	elseif( $refine_data_count < 181593.75 )//121062.5   ~ 181593.75    25%
	{
		$validation_array[$person_data_temp_key][] = $refine_data[$refine_data_count];
	}
	else//181593.75 ~ 242125(end) 25%
	{
		$test_array[$person_data_temp_key][] = $refine_data[$refine_data_count];
	}
	
	$refine_data_count++;
}

// var_dump($person_data);

//�Ƽ����ʼ���

$training_probability =  probability($training_array);//������recommendation_task_function.php�еĺ���


$person_data = $validation_array;
$person_data_probability =  probability($person_data);//������recommendation_task_function.php�еĺ���
$diff_count = 0;
$diff = 0;
$person_data_probability_keys = array_keys($person_data_probability);
foreach( $person_data_probability_keys as $person_data_probability_key)
{
	$person_each_data_probability_keys = array_keys($person_data_probability[$person_data_probability_key]);
	
	if( !isset($training_probability[$person_data_probability_key][$person_each_data_probability_keys['0']]) )
	{
		continue;
	}
	
	$diff = $diff + abs($person_data_probability[$person_data_probability_key][$person_each_data_probability_keys['0']] - $training_probability[$person_data_probability_key][$person_each_data_probability_keys['0']]);
	
	$diff_count++;
}


$difference = ($diff/$diff_count);

var_dump($difference);




?>



