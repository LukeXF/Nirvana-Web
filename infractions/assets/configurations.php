<?php

// Please edit the below database settings
// Please note you must select the table in index.php
$db_username      =  'root';
$db_password    =  '8CFNpC8LJlNznfson4L4HjjrzsCyjVxEhpbRYwkJ0QCJkMjbEl';
$db_server    =  '192.99.201.204';
$db_name        =  'nirvanamc';

    
    
    




// Selects the table from the database
$params['sql_query']   = "SELECT `Name`, `UUID`, `Rank`, `Check`, `Gametype`, `Level`, `Bans`, `Kicks`, `Importance`, `Timestamp` FROM `Infractions`";

// Tells the table what to call the headers
$params['header']                   = 'Face, Username,Rank,Infraction,Server,Level,Bans,Kicks, Counter,Time';

// Defines the width of each column, but this is mainly done in css.
$params['width']                    = '5% , 5%     ,5%  ,10%       ,20%   ,5%   ,4%  ,4%   ,4%         , 17% ';

//  Players shown per page. It will not show more than is physically in the DB
//  For example, if you have 48 players and you set below to 10,25,50 it would
//  Display 10,25,48 and not anything above - it will show the limit.
$params['items_per_page_init']      = '25,50,100';




/*  That is all, if this connects then all is well.
    You will not need to edit the below but I have
    left it there in case quick fixes need to be made.

    ***********************************************
*/












// Connects to the mysql server
mysql_connect($db_server, $db_username, $db_password) or die("Could not connect: " . mysql_error());
// Connects to the mysql database
mysql_select_db($db_name);

// Nice shortened variable
$link = mysql_connect($db_server, $db_username, $db_password) or die("Could not connect: " . mysql_error());














// Debug stuff incase I need to change common stuff
function theSexyLoadingSystem($id,$page,$total_items,$items_per_page,$info1=true){

    include_once('Lite.php');

    $cp=new LukesDBPager();

    // Data Gathering
    $params['selected_page']    = $page;
    $params['total_items']      = $total_items;
    $params['items_per_page']   = $items_per_page=='all' ? $total_items : $items_per_page;
    $params['url']              = 'javascript: ctPager(\''.$id.'\',\'#NUM_PAGE#\');';

    // Layout Configurations
    $params['id']               = $id.'_pager';
    $params['type']             = 'centered';
    $params['nav_pages']        = 5;
    $params['info1']            = $info1;

    $cp->pager($params);
    $out_pager=$cp->display();

    return $out_pager;
}

// Returns the select amount array that has been calculated from the database
function filled_array($arr){

    for($i=0; $i<count($arr); $i++){
        if($arr[$i]!='')
            return true;
    }

    return false;

}

?>