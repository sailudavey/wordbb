<?php

// DO NOT CALL THIS. use $wordbb->forums instead
function _wordbb_get_forums()
{
	global $wpdb, $wordbb;

	$results=$wordbb->mybbdb->get_results("SELECT fid, name, type FROM {$wordbb->table_forums} WHERE type='f'");
	$forums=array();
	foreach($results as $result)
	{
		$forums[$result->fid]=$result->name;
	}
	return $forums;
}

// DO NOT CALL THIS. use $wordbb->users instead
function _wordbb_get_users()
{
	global $wpdb, $wordbb;

	$results=$wordbb->mybbdb->get_results("SELECT * FROM {$wordbb->table_users}");
	$users=array();
	foreach($results as $result)
	{
		$users[$result->uid]=$result->username;
		$usersinfo[$result->uid]=$result;
	}
	return array('usernames'=>$users,'usersinfo'=>$usersinfo);
}

// DO NOT CALL THIS. use $wordbb->postcounts[tid] instead
function _wordbb_get_threads_postcounts($tids)
{
	global $wpdb, $wordbb;

	$in='';
	foreach($tids as $tid)
	{
		$in.=$tid.',';
	}
	$in=rtrim($in,',');

	$results=$wordbb->mybbdb->get_results("SELECT COUNT(*) AS count, tid FROM {$wordbb->table_posts} WHERE tid IN({$in}) GROUP BY(tid)");
	$counts=array();
	foreach($results as $result)
	{
		$counts[$result->tid]=$result->count-1;
	}
	return $counts;
}

// DO NOT CALL THIS. use $wordbb->posts[tid] instead
function _wordbb_get_threads_posts($tids)
{
	global $wpdb, $wordbb;

	$in='';
	foreach($tids as $tid)
	{
		$in.=$tid.',';
	}
	$in=rtrim($in,',');

	// get posts
	$results=$wordbb->mybbdb->get_results("SELECT * FROM {$wordbb->table_posts} WHERE tid IN({$in}) AND visible=1 ORDER BY dateline ASC LIMIT 1,18446744073709551615");

	$threads=array();
	foreach($results as $result)
	{
		$thread=&$threads[$result->tid];
		$thread[]=$result;
	}
	return $threads;
}

// DO NOT CALL THIS. use $wordbb->mybbsettings instead
function _wordbb_get_mybb_settings()
{
	global $wpdb, $wordbb;

	$results=$wordbb->mybbdb->get_results("SELECT name,value FROM {$wordbb->table_settings}");

	$settings=array();
	foreach($results as $result)
	{
		$settings[$result->name]=$result->value;
	}

	return $settings;
}

// DO NOT CALL THIS. use $wordbb->lastposters instead
function _wordbb_get_threads_lastposters($tids)
{
	global $wpdb, $wordbb;

	$in='';
	foreach($tids as $tid)
	{
		$in.=$tid.',';
	}
	$in=rtrim($in,',');

	$results=$wordbb->mybbdb->get_results("SELECT lastposter, tid FROM {$wordbb->table_threads} WHERE tid IN({$in}) GROUP BY(tid)");
	$lastposters=array();
	foreach($results as $result)
	{
		$lastposters[$result->tid]=$result->lastposter;
	}
	return $lastposters;
}

function wordbb_get_latest_threads($n=10,$exclude='')
{
	global $wpdb, $wordbb;

	$where='';
	if(!empty($exclude))
	{
		$where="fid NOT IN ({$exclude}) AND";
	}
	
	// get latest threads
	$results=$wordbb->mybbdb->get_results("SELECT * FROM {$wordbb->table_threads} WHERE $where visible=1 ORDER BY dateline DESC LIMIT {$n}");

	return $results;
}

function wordbb_get_latest_posts($n=10,$exclude='')
{
	global $wpdb, $wordbb;

	$where='';
	if(!empty($exclude))
	{
		$where="fid NOT IN ({$exclude}) AND";
	}

	// get latest posts
	$results=$wordbb->mybbdb->get_results("SELECT * FROM {$wordbb->table_posts} WHERE $where visible=1 ORDER BY dateline DESC LIMIT {$n}");

	return $results;
}

?>