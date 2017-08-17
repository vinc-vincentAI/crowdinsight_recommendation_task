<?php 


function probability($person_data)
{

	//各个商品被购买的次数总和
	$combination1_array = array();
	foreach( $person_data as $person_data_each )
	{
		$person_data_each_count = 0;
		$person_data_each_count_max = count($person_data_each);
		for( $person_data_each_count=0;$person_data_each_count<($person_data_each_count_max);$person_data_each_count=$person_data_each_count+1)
		{
			$combination1_array_str = "";
	
			$combination1_array_str_key_array = array();
			$combination1_array_str_key_array[] = $person_data_each[$person_data_each_count]['2'];
	
			$combination1_array_str = $combination1_array_str_key_array['0'];
	
			if( isset($combination1_array[$combination1_array_str]) )
			{
				$combination1_array[$combination1_array_str] = $combination1_array[$combination1_array_str] + 1;
			}
			else
			{
				$combination1_array[$combination1_array_str] = 1;
			}
		}
	}
	arsort($combination1_array);
	// var_dump($combination1_array);
	
	
	//组合二
	$combination2_array = array();
	foreach( $person_data as $person_data_each )
	{
		$person_data_each_count = 0;
		$person_data_each_count_max = count($person_data_each);
		// 	var_dump($person_data_each);
		for( $person_data_each_count=0;$person_data_each_count<($person_data_each_count_max-1);$person_data_each_count=$person_data_each_count+1)
		{
			$combination2_array_str = "";
			$person_data_each_count2 = $person_data_each_count + 1;
	
			$combination2_array_str_key_array = array();
			$combination2_array_str_key_array[] = $person_data_each[$person_data_each_count]['2'];
			$combination2_array_str_key_array[] = $person_data_each[$person_data_each_count2]['2'];
	
			sort($combination2_array_str_key_array);
			$combination2_array_str = $combination2_array_str_key_array['0']."-".$combination2_array_str_key_array['1'];
	
			if( isset($combination2_array[$combination2_array_str]) )
			{
				$combination2_array[$combination2_array_str] = $combination2_array[$combination2_array_str] + 1;
			}
			else
			{
				$combination2_array[$combination2_array_str] = 1;
			}
		}
	}
	arsort($combination2_array);
	// var_dump($combination2_array);
	
	
	//组合三
	$combination3_array = array();
	foreach( $person_data as $person_data_each )
	{
		$person_data_each_count = 0;
		$person_data_each_count_max = count($person_data_each);
		// 	var_dump($person_data_each);
		for( $person_data_each_count=0;$person_data_each_count<($person_data_each_count_max-2);$person_data_each_count=$person_data_each_count+1)
		{
			$combination3_array_str = "";
			$person_data_each_count2 = $person_data_each_count + 1;
			$person_data_each_count3 = $person_data_each_count + 2;
	
			$combination3_array_str_key_array = array();
			$combination3_array_str_key_array[] = $person_data_each[$person_data_each_count]['2'];
			$combination3_array_str_key_array[] = $person_data_each[$person_data_each_count2]['2'];
			$combination3_array_str_key_array[] = $person_data_each[$person_data_each_count3]['2'];
	
			sort($combination3_array_str_key_array);
			$combination3_array_str = $combination3_array_str_key_array['0']."-".$combination3_array_str_key_array['1']."-".$combination3_array_str_key_array['2'];
	
			if( isset($combination3_array[$combination3_array_str]) )
			{
				$combination3_array[$combination3_array_str] = $combination3_array[$combination3_array_str] + 1;
			}
			else
			{
				$combination3_array[$combination3_array_str] = 1;
			}
		}
	}
	arsort($combination3_array);
	// var_dump($combination3_array);
	
	//组合四
	$combination4_array = array();
	foreach( $person_data as $person_data_each )
	{
		$person_data_each_count = 0;
		$person_data_each_count_max = count($person_data_each);
		// 	var_dump($person_data_each);
		for( $person_data_each_count=0;$person_data_each_count<($person_data_each_count_max-3);$person_data_each_count=$person_data_each_count+1)
		{
			$combination4_array_str = "";
			$person_data_each_count2 = $person_data_each_count + 1;
			$person_data_each_count3 = $person_data_each_count + 2;
			$person_data_each_count4 = $person_data_each_count + 3;
	
			$combination4_array_str_key_array = array();
			$combination4_array_str_key_array[] = $person_data_each[$person_data_each_count]['2'];
			$combination4_array_str_key_array[] = $person_data_each[$person_data_each_count2]['2'];
			$combination4_array_str_key_array[] = $person_data_each[$person_data_each_count3]['2'];
			$combination4_array_str_key_array[] = $person_data_each[$person_data_each_count4]['2'];
	
			sort($combination4_array_str_key_array);
			$combination4_array_str = $combination4_array_str_key_array['0']."-".$combination4_array_str_key_array['1']."-".$combination4_array_str_key_array['2']."-".$combination4_array_str_key_array['3'];
	
			if( isset($combination4_array[$combination4_array_str]) )
			{
				$combination4_array[$combination4_array_str] = $combination4_array[$combination4_array_str] + 1;
			}
			else
			{
				$combination4_array[$combination4_array_str] = 1;
			}
		}
	}
	arsort($combination4_array);
	// var_dump($combination4_array);
	
	
	//	id user	item	qty	datetime
	
	
	$combination2_ratio_array = array();
	$combination2_array_keys = array_keys($combination2_array);
	foreach( $combination2_array_keys as $combination2_array_key )
	{
		$product_itemname_temp_array = explode("-", $combination2_array_key);
	
		$combination2_ratio_array[$product_itemname_temp_array['0']][$product_itemname_temp_array['1']] = $combination2_array[$combination2_array_key]/$combination1_array[$product_itemname_temp_array['0']];
		$combination2_ratio_array[$product_itemname_temp_array['1']][$product_itemname_temp_array['0']] = $combination2_array[$combination2_array_key]/$combination1_array[$product_itemname_temp_array['1']];
	
	}
	
	
	$combination3_ratio_array = array();
	$combination3_array_keys = array_keys($combination3_array);
	foreach( $combination3_array_keys as $combination3_array_key )
	{
		$product_itemname_temp_array = explode("-", $combination3_array_key);
	
		$combination3_ratio_temp_key = $product_itemname_temp_array['1']."-".$product_itemname_temp_array['2'];
		if(isset($combination2_array[$combination3_ratio_temp_key]))
		{
			$ratio_temp = $combination3_array[$combination3_array_key]/$combination2_array[$combination3_ratio_temp_key];
			if($ratio_temp > 0.01)
			{
				$combination3_ratio_array[$combination3_ratio_temp_key][$product_itemname_temp_array['0']] = $ratio_temp;
			}
		}
	
	
		$combination3_ratio_temp_key = $product_itemname_temp_array['0']."-".$product_itemname_temp_array['2'];
		if(isset($combination2_array[$combination3_ratio_temp_key]))
		{
			$ratio_temp = $combination3_array[$combination3_array_key]/$combination2_array[$combination3_ratio_temp_key];
			if($ratio_temp > 0.01)
			{
				$combination3_ratio_array[$combination3_ratio_temp_key][$product_itemname_temp_array['1']] = $ratio_temp;
			}
		}
	
		$combination3_ratio_temp_key = $product_itemname_temp_array['0']."-".$product_itemname_temp_array['1'];
		if(isset($combination2_array[$combination3_ratio_temp_key]))
		{
			$ratio_temp = $combination3_array[$combination3_array_key]/$combination2_array[$combination3_ratio_temp_key];
			if($ratio_temp > 0.01)
			{
				$combination3_ratio_array[$combination3_ratio_temp_key][$product_itemname_temp_array['2']] = $ratio_temp;
			}
		}
	
	}
	
	// var_dump($combination3_ratio_array);
	
	
	$combination4_ratio_array = array();
	$combination4_array_keys = array_keys($combination4_array);
	foreach( $combination4_array_keys as $combination4_array_key )
	{
		if($combination4_array[$combination4_array_key] < 10)
		{
			break;
		}
	
		$product_itemname_temp_array = explode("-", $combination4_array_key);
	
		$combination4_ratio_temp_key = $product_itemname_temp_array['1']."-".$product_itemname_temp_array['2']."-".$product_itemname_temp_array['3'];
		if(isset($combination3_array[$combination4_ratio_temp_key]))
		{
			$ratio_temp = $combination4_array[$combination4_array_key]/$combination3_array[$combination4_ratio_temp_key];
			if($ratio_temp > 0.01)
			{
				$combination4_ratio_array[$combination4_ratio_temp_key][$product_itemname_temp_array['0']] = $ratio_temp;
			}
		}
	
		$combination4_ratio_temp_key = $product_itemname_temp_array['0']."-".$product_itemname_temp_array['2']."-".$product_itemname_temp_array['3'];
		if(isset($combination3_array[$combination4_ratio_temp_key]))
		{
			$ratio_temp = $combination4_array[$combination4_array_key]/$combination3_array[$combination4_ratio_temp_key];
			if($ratio_temp > 0.01)
			{
				$combination4_ratio_array[$combination4_ratio_temp_key][$product_itemname_temp_array['1']] = $ratio_temp;
			}
		}
	
		$combination4_ratio_temp_key = $product_itemname_temp_array['0']."-".$product_itemname_temp_array['1']."-".$product_itemname_temp_array['3'];
		if(isset($combination3_array[$combination4_ratio_temp_key]))
		{
			$ratio_temp = $combination4_array[$combination4_array_key]/$combination3_array[$combination4_ratio_temp_key];
			if($ratio_temp > 0.01)
			{
				$combination4_ratio_array[$combination4_ratio_temp_key][$product_itemname_temp_array['2']] = $ratio_temp;
			}
		}
	
		$combination4_ratio_temp_key = $product_itemname_temp_array['0']."-".$product_itemname_temp_array['1']."-".$product_itemname_temp_array['2'];
		if(isset($combination3_array[$combination4_ratio_temp_key]))
		{
			$ratio_temp = $combination4_array[$combination4_array_key]/$combination3_array[$combination4_ratio_temp_key];
			if($ratio_temp > 0.01)
			{
				$combination4_ratio_array[$combination4_ratio_temp_key][$product_itemname_temp_array['3']] = $ratio_temp;
			}
		}
	}
	
// 	var_dump($combination4_ratio_array);
	
	return $combination4_ratio_array;
}

?>



