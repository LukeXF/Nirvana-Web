<?php 

// get latest x forum posts from xenforo by liamdawe

// edit this to whatever folder your forum is in
$forum_url = 'http://nirvanamc.com';

// change to the amount of posts you want displayed
$limit = 3;

// edit this to the directory your forum is in
$forum_directory = '../forum/';

$startTime = microtime(true);

require($forum_directory. '/library/XenForo/Autoloader.php');
XenForo_Autoloader::getInstance()->setupAutoloader($forum_directory . '/library');

GeekPoint_Symfony::initializeXenforo($forum_directory, $startTime);

$nodeModel = XenForo_Model::create('XenForo_Model_Node');
$nodes = $nodeModel->getViewableNodeList();

$nodes_get = array_keys($nodes);

$node_id_list = implode($nodes_get, ',');

$sql_forum = "SELECT `title`, `thread_id`, `view_count`, `reply_count` FROM `xf_thread` WHERE `node_id` IN ($node_id_list) ORDER BY `last_post_date` DESC LIMIT {$limit}";

$topics_query = XenForo_Application::get('db')->fetchAll($sql_forum);


?>
<!DOCTYPE html>

<html lang="en">
<head>
    <title>NirvanaMC Minecraft Minigames Network</title>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="The NirvanaMC website for news, stats and more surround the minecraft server" name="description">
    <meta content="Nirvana, NirvanaMC, Minecraft, Server, Multiplayer, Network, Gaming, Cubed Chaos, NMC, Servers, Fun" name="keywords">
    <meta content="Luke Brown" name="author">
    <link href= 'http://fonts.googleapis.com/css?family=Dosis:400,700|Lato:300,400|Lobster'rel='stylesheet' type='text/css'>
    <script data-rocketsrc="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js" type="text/rocketscript"></script>
    <script data-rocketsrc= "http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js" type= "text/rocketscript"></script>
    <script data-rocketsrc="assets/js/app.js" type="text/rocketscript"></script>
    <script src="//use.typekit.net/gez8hbc.js"></script>
    <script>try{Typekit.load();}catch(e){}</script>
    <link href="assets/img/favicon.ico" rel="icon">
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet" type="text/css">
        <script>
$(document).ready(function(){
var width = $(window).width();
var aspect = 1065/width;
$(".navbar").css("zoom", aspect);
});
</script>
</head>

<body data-spy="scroll" data-target="#myScrollspy">
    <div class="wrapper">
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-collapse collapse" id="myScrollspy">
                    <ul class="nav navbar-nav affix" data-offset-top="125">
                        <li class="active"><a href="#intro" style="margin-left: 7px;">Home<i id="texthere"></i></a></li>
                        <li><a href="#news" style="margin-left: 5px;">News</a></li>
                        <li><a href="#store" style="margin-left: 3px;">Store</a></li> 
                        <li class="ip">  <!--<a onclick="prompt('Connect to the server with this IP','play.nirvanamc.com')">play.nirvanamc.com</a>--></li>
                        <li><a data-toggle="" href="http://forum.nirvanamc.com/" id="forums" style="margin-left: 4px;">Forum</a></li>
                        <li><a href="#spotlight" style="margin-left: 8px;">Light</a></li>
                        <li><a href="#stats" style="margin-left: 7px;">Stats</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <section id="intro" style="margin-bottom: 600px;">
            <div id="container"><img alt="Intro Background" class=
            "intro-img part-assets" id="image" src=
            "assets/img/top-marker.png"></div>

            <div class="content-lock" style="padding-top: 324px;">
                <div class="front-tile">
                    <h1 class="ip">Nirvana Stats</h1>

                    <?php




                        include_once 'assets/status.class.php';
                        $status = new MinecraftServerStatus();
                        $response = $status->getStatus('play.nirvanamc.com');                

                        $dbname = 'nirvanamc';
                        $servername = '192.99.201.204';
                        $username = 'root';
                        $password = '8CFNpC8LJlNznfson4L4HjjrzsCyjVxEhpbRYwkJ0QCJkMjbEl';
                        




                        date_default_timezone_set('UTC');

                        $link = mysql_connect($servername, $username, $password);
                        mysql_select_db($dbname, $link);
                        $result = mysql_query("SELECT * FROM Players", $link);
                        $num_rows = mysql_num_rows($result);


                        $conn = mysqli_connect($servername, $username, $password, $dbname);

                        $sql = "SELECT COUNT(*), SUM(`Nuggets Earned`) AS `total_money` FROM `Stats Global`";
                        $result = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($result) > 0) {
                            // output data of each row
                            while($row = mysqli_fetch_assoc($result)) {
                                $money = $row["total_money"];
                            }                        
                        }

                        mysqli_close($conn);






                        $conn2 = mysqli_connect($servername, $username, $password, $dbname);

                        $sql = "SELECT COUNT(*), SUM(`Nuggets Earned`) AS `total_money` FROM `Stats Global` WHERE `UUID` IN ('c12d7ad1-4a2a-469c-9046-c9820eb878b0','26a2b8b4-e3c8-4bb8-9640-b30ddaba3620','0b10c3aa6-5b84-31fb-512b-ed361b7a81c','8f65bf20-b3e6-45ff-b67b-a14a9a54e7b6')";
                        $result3 = mysqli_query($conn2, $sql);

                        if (mysqli_num_rows($result3) > 0) {
                            // output data of each row
                            while($row2 = mysqli_fetch_assoc($result3)) {
                                $moneyelite = $row2["total_money"];
                            }
                        }

                        mysqli_close($conn2);











                        

                        $time = strtotime('2014-10-28 17:25:43');
                        $totaltimeswag = humanTiming($time) * $num_rows;


                        if ($totaltimeswag > 1000 && $totaltimeswag < 999999) {
                            $totaltimeswag2 = round($totaltimeswag / 1000) / 100;
                        } else {
                            $totaltimeswag2 = "none";
                        }



                        function humanTiming ($time)
                        {

                            $time = time() - $time;

                            $tokens = array (
                                3600 => 'hour'
                            );

                            foreach ($tokens as $unit => $text) {
                                if ($time < $unit) continue;
                                $numberOfUnits = floor($time / $unit);
                                return $numberOfUnits.' '.$text.(($numberOfUnits>1)?'s':'');
                            }

                        }



                    ?>

                    <div class="row online-stats">
                        <div class="col-md-6 tile">
                            <h5 class=".playercount"><?php echo $response['players']; ?></h5>Currently Online
                        </div>

                        <div class="col-md-6 tile">
                            <h5><?php echo round($num_rows / 1000); ?></h5>Thousands Players Joined<br>
                        </div>
                    </div>

                    <div class="row online-stats">
                        <div class="col-md-6 tile">
                            <h5 class=".playercount"><?php echo round($money / 1000) - round($moneyelite / 1000); ?></h5> Thousands Nuggets Earned
                        </div>

                        <div class="col-md-6 tile">
                            <h5><?php echo $totaltimeswag2; ?></h5>Thousand Hours Played
                        </div>
                    </div>

                    <div class="row online-stats">
                        <div class="col-md-12">
                            <br>
                           - <?php echo $response['motd']; ?> -
                        </div>
                    </div>
                </div>


                <script type="text/javascript">
                    var options = {
                      useEasing : true, 
                      useGrouping : true, 
                      separator : ',', 
                      decimal : '.' 
                      prefix : '' 
                      suffix : '' 
                    }
                    var demo = new countUp("myTargetElement", 0, 222222, 0, 2.5, options);
                    demo.start();
                </script>




                <div class="front-tile front-right">



                    <h2 class="ip">Featured Item<h1 class="jumbo" id="myTargetElement"></h1></h2>
                    <div class="row featured-store tile2">

                        <div class="col-md-7">
                            <p>>MVP+ [LIFETIME]</p>
                            <h5>75.00 USD</h5><a href="http://store.nirvanamc.com/package/663644" target="_onblank">purchase...</a>
                        </div>

                        <div class="col-md-offset-1 col-md-4">
                            <img class="text-center" src="//dunb17ur4ymx4.cloudfront.net/packages/images/162544-a9af1f6c2572600666f4b92d0d0d832adf270682.png" style="width:100px;">
                        </div>
                    </div>
                    <h2 class="ip">Latest Posts</h2>

                    <div class="latest-forum-post row">
                    <?php
                        foreach ($topics_query as $thread)
                        {
                            // The absolute thread url is constructed for you
                            $threadUrl = XenForo_Link::buildPublicLink('full:threads', $thread);

                            // Trimmed and properly escaped
                            $threadTitle = XenForo_Template_Helper_Core::helperWordTrim($thread['title'], 50);

                            echo "<a href=\"$threadUrl\">$threadTitle</a><br> Views: {$thread['view_count']}, Comments: {$thread['reply_count']}<br />";
                        }
                    ?>
                    <div class="latest-forum-post row">
                        <div class="col-md-12 forum-link">
                            <a class="forum-link" href=
                            "//dev.nirvanamc.com/forums" target="_onblank">view
                            all forum posts...</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="intrastuff" id="news">
            <div id="container"><img alt="Intro Background" class="part-assets"
            src="assets/img/news-part.png"></div>

            <div class="content-lock">
                <div class="front-tile">
                    <h1 class="ip">Featured News</h1>

                    <div class="row news-module">
                        <div class="news-titles">
                            <h4>A Toast to the Future</h4>

                            <h5>24th September</h5>
                        </div>

                        <div class="col-md-12">
                            <p>It all started January 11th 2014, as all great
                            ideas do, with a dazed outreach to a best
                            friend..."NirvanaMC.com?" at 2:11 AM to
                            @Gonzoman10.</p>

                            <p>After 257 days, dozens of people, and more
                            mistakes than we can count, a feeling of
                            accomplishment washes over us. Our journey is far
                            from over, but we are far from where we started.
                            From the base of a mountain the peak is distant,
                            seemingly unreachable, but with drive and
                            determination you can achieve anything you put your
                            heart, soul, and blood into. Looking down, its easy
                            to see better routes, hard to fathom why you never
                            quit. We gain strength, courage, and confidence in
                            every moment, of every day.</p>

                            <p>Success is continuing when you could stop,
                            accomplishment is the total of your victories, and
                            confidence is the scar of your failures. I truly
                            hope, from the bottom of my heart, that one day we
                            will look back on this journey, and know that it
                            has forever shaped our character. Failure isn't an
                            option... simply because we have already won.</p>
                        </div>

                        <div class="col-md-11 col-md-offset-1"><a class=
                        "read-more" href=
                        "http://forum.nirvanamc.com/index.php?threads/a-toast-to-the-future.3/">
                        Read More</a> - By MrSuperSweet <img src=
                        "http://nirvanamc.com/forum/data/avatars/m/0/1.jpg?1411580532"
                        style="border-radius: 25%;" width="40"></div>
                    </div>
                </div>

                <div class="front-tile front-right">
                    <h1 class="ip">Twitter Feed</h1>

                    <div class="row">
                        <div class="col-md-10 col-md-offset-1 twitter-feed">
                            <p>Going to start streaming at 7pm for
                            @NirvanaNetwork on
                            http://twitch.tv/mrsupersweet</p>

                            <h5>29th September</h5>
                            <hr>
                        </div>

                        <div class="col-md-10 col-md-offset-1 twitter-feed">
                            <p>First video on the #NirvanaMC youtube channel!
                            Checkout our awesome new trailer commentated by
                            Morgan Freeman! http://youtu.be/ks3tJZPKg4I?a</p>

                            <h5>25th September</h5>
                            <hr>
                        </div>

                        <div class="col-md-10 col-md-offset-1 twitter-feed">
                            <p>We fixed http://Play.CubedChaos.Com IP! Now you
                            can join CubedChaos directly!</p>

                            <h5>23rd September</h5>
                            <hr>
                        </div>

                        <div class="col-md-10 col-md-offset-1 twitter-feed">
                            <p>Welp...Everyone Fell Asleep after 23 hours or
                            work...still going to launch today tho 12pm Eastern
                            Standard Time!</p>

                            <h5>1st September</h5>
                            <hr>
                        </div>

                        <div class="col-md-10 col-md-offset-1 twitter-feed">
                            <p>In under 12 Hours we will be launching! Prepare
                            for awesomeness!</p>

                            <h5>1st September</h5>
                            <hr>
                        </div>

                        <div class="col-md-10 twitter-feed bottom">
                            <h5><b>Follow us</b> today to stay up to date with
                            all the latest news and more</h5>
                            <hr>
                        </div>

                        <div class="twitter-module">
                            <a href="https://twitter.com/NirvanaNetwork"
                            target="_blank">Follow Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="intrastuff" id="store">
            <div id="container"><img alt="Intro Background" class=
            "part-assets store-img" src="assets/img/store-part.png"></div>

            <div class="content-lock">
                <div class="front-tile">
                    <h1 class="ip">NirvanaMC Shop</h1>

                    <div class="row shop-module">
                        <div class="col-md-8 col-md-offset-2">
                            <script data-rocketsrc="ajax/ajaxtabs/shop.js"
                            type="text/rocketscript"></script>

                            <div class="indentmenu" id="pettabs">
                                <ul>
                                    <li>
                                        <a class="selected" href=
                                        "ajax/main.php" rel="#iframe"></a>
                                    </li>
                                </ul><br style="clear: left">
                            </div>

                            <div id="petsdivcontainer" style=
                            "border:0px solid gray; width:100%; height: 750px;">
                            </div><script type="text/rocketscript">

                            var mypets=new ddajaxtabs("pettabs", "petsdivcontainer")
                            mypets.setpersist(false)
                            mypets.setselectedClassTarget("link")
                            mypets.init()

                            </script>
                        </div>

                        <div class="shop-disclaimer">
                            <a data-target="#myModal" data-toggle="modal"
                            target="_blank">Terms &amp; conditions</a> (Opens
                            in modal)
                        </div>

                        <div class="shop-disclaimer2">
                            Support for our store purchases can be contacted at
                            <a href="" target="_blank"><span class=
                            "__cf_email__" data-cfemail=
                            "394a4c4949564b4d7957504b4f585758545a175a5654">contact@nirvanamc.com</span></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="myModal" tabindex="-1">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button class="close" data-dismiss="modal" type=
                            "button"><span>&times;</span><span class=
                            "sr-only">Close</span></button>
                        </div>

                        <div class="modal-body">
                            <p><?php include './terms.php'; ?></p>
                        </div>

                        <div class="modal-footer">
                            <button class="btn btn-default close-terms"
                            data-dismiss="modal" type="button">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="intrastuff" id="spotlight">
            <div id="container"><img alt="Intro Background" class=
            "part-assets help-img" src="assets/img/help-part.png"></div>

            <div class="youtube-spotlight">
                <h3>YouTube Spotlight</h3>

                <div class="row">
                    <div class="col-md-6">
                        <a data-target="#youtube" data-toggle="modal" target=
                        "_blank"><img src=
                        "https://i.ytimg.com/vi_webp/ks3tJZPKg4I/mqdefault.webp"
                        width="100%"></a>
                    </div>

                    <div class="col-md-6">
                        <h1>Cubed Chaos Server Trailer</h1>

                        <p>✔Join Now Play.CubedChaos.Com ✔ Join Our Server
                        Play.NirvanaMC.Com for awesome Minigames! ✔ Subscribe
                        http://goo.gl/6b7UJU ✔ Checkout our website
                        http://nirvanamc.com/ ✔ Follow us @NirvanaNetwork for
                        Giveaways and updates! ✔Cinematic Production -
                        https://www.youtube.com/user/EnderWor... For every like
                        we get across all videos, NirvanaNetwork will donate 1¢
                        to http://www.humanesociety.org/ NirvanaMC is a
                        family...</p>
                    </div>
                </div>
            </div>
        </section>

        <div class="modal fade" id="youtube" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button class="close" data-dismiss="modal" type=
                        "button"><span>&times;</span><span class=
                        "sr-only">Close</span></button>
                    </div>

                    <div class="modal-body">
                        <iframe frameborder="0" height="315" src=
                        "//www.youtube.com/embed/ks3tJZPKg4I&amp;iv_load_policy=3&amp;modestbranding=1&amp;rel=0&amp;showinfo=0"
                        width="560"></iframe>
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-default close-terms"
                        data-dismiss="modal" type="button">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <section class="intrastuff" id="stats" style=
        "margin-bottom: -441px !important;">
            <div id="container"><img alt="Intro Background" class=
            "part-assets stats-img" src="assets/img/stats-part.png"></div>

            <div class="stats-magic">
                <?php 

                                //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                                //      GENERATE WEB LISTING
                                //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                    
                /* function uuidFromString($string) {
                    $val = md5($string, true);
                    $byte = array_values(unpack('C16', $val));

                    $tLo = ($byte[0] << 24) | ($byte[1] << 16) | ($byte[2] << 8) | $byte[3];
                    $tMi = ($byte[4] << 8) | $byte[5];
                    $tHi = ($byte[6] << 8) | $byte[7];
                    $csLo = $byte[9];
                    $csHi = $byte[8] & 0x3f | (1 << 7);

                    if (pack('L', 0x6162797A) == pack('N', 0x6162797A)) {
                        $tLo = (($tLo & 0x000000ff) << 24) | (($tLo & 0x0000ff00) << 8) | (($tLo & 0x00ff0000) >> 8) | (($tLo & 0xff000000) >> 24);
                        $tMi = (($tMi & 0x00ff) << 8) | (($tMi & 0xff00) >> 8);
                        $tHi = (($tHi & 0x00ff) << 8) | (($tHi & 0xff00) >> 8);
                    }

                    $tHi &= 0x0fff;
                    $tHi |= (3 << 12);
                   
                    $uuid = sprintf(
                        '%08x-%04x-%04x-%02x%02x-%02x%02x%02x%02x%02x%02x',
                        $tLo, $tMi, $tHi, $csHi, $csLo,
                        $byte[10], $byte[11], $byte[12], $byte[13], $byte[14], $byte[15]
                    );
                    return $uuid;
                }

                function uuidConvert($string)
                {
                    $string = uuidFromString("OfflinePlayer:".$string);
                    return $string;
                }

                 echo uuidConvert("Spawl"); */


                            /*    $dbname = 'nirvanamc';
                                $servername = 'spawl.ca';
                                  $username = 'Lucas';
                                  $password = 'puppy'; 
                            */

                                // Configurations
                                $per_page = 20;
                                $userid2 = $_SESSION['user_id'];

                                // connect to the database & PDO Query
                                $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                                $sth = $dbh->prepare("SELECT * FROM `Stats SG` LIMIT 0, 1000");
                                $sth->execute();
                                
                                echo "

                <ul class='nav nav-tabs' role='tablist' id='myTab'>
                  <li class='active'><a href='#home' role='tab' data-toggle='tab'>SG</a></li>
                  <li><a href='#profile' role='tab' data-toggle='tab'>no one</a></li>
                  <li><a href='#messages' role='tab' data-toggle='tab'>love</a></li>
                  <li><a href='#settings' role='tab' data-toggle='tab'>Kyle</a></li>
                </ul>

                <div class='tab-content'>
                  <div class='tab-pane active' id='home'><table style='width:100%'>
                                ";
                                // Fetch all of the remaining rows in the result set
                                $result = $sth->fetchAll();
                                if ( !$result['0']['website_user'] == $userid2 ) {
                                    echo "- you currently have no website associated with your account -";
                                } else {    
                                    // echo "<pre>";
                                    // print_r($result);
                                    // echo "</pre>";

                                    /*
                                        Count through PDO all the results that are returned from the original query
                                        Then set the total amount of pages to equal the total count divided by the
                                        predefined results per page above.
                                    */
                                    $count = $sth->rowCount();
                                    $total_pages = ceil($count / $per_page);
                                    $show_page = $_GET['page'];

                                    /* 
                                        Checks if the page variable has been set in the URL. 
                                        If the GET variable exists and is a number then set $show_page to equal that. 
                                    */
                                    if (isset($_GET['page']) && is_numeric($_GET['page'])) {

                                        
                                        /* 
                                            Checks to see if the page number from the URL is sensible.
                                            If it is more than 0 and less than the total amount of pages.                           
                                        */
                                        if ($show_page > 0 && $show_page <= $total_pages) {
                                            /*
                                                Set $start to the page number -1 then times by the amount
                                                of results per page that has been defied above.
                                                Then $end is the $start plus defined results per page.
                                            */
                                            $start = ($show_page -1) * $per_page;
                                            $end = $start + $per_page; 
                                        } else {
                                            // Assuming there is an error then only return the first set of results.                            
                                            $start = 0;
                                            $end = $per_page; 
                                        }       
                                    } else {
                                        // if page isn't set, show first set of results
                                        $start = 0;
                                        $end = $per_page; 
                                    }
                                    
                                    
                                    // Setting the pagination options above the page before the results                 
                                    echo "<p class='pageno'><b>View Page:</b> ";
                                    for ($i = 1; $i <= $total_pages; $i++)
                                    {
                                        echo "<a href='?page=$i#stats'>$i</a> ";
                                    }
                                    echo "</p>";

                                    $ticketsToShow = count($result);
                                        $TTSCounter = 0;

                                            
                                            // loop through results of database query, displaying them in the table 
                                            for ($i = $start; $i < $end; $i++)
                                            {
                                                // make sure that PHP doesn't try to show results that don't exist
                                                if ($i == $count) { break; }
                                            
                                                // echo out the contents of each row into a table
                                                // counts tickets for user
                                                $result[$i]['UUID'];
                                                $username = $result[$i]['UUID'];


                                                $json = file_get_contents('https://minespy.net/api/uuid/' . $result[$i]['UUID'] . '/json');
                                                
                                                $data = json_decode($json,true);
                                                $image = $data['name'];
                                                    echo "
                                                        
                                                        <tr>
                                                            <td width='20%'><img style='border-radius: 25%;' src='//mcapi.ca/v2/avatar/2d/?player=" . $image . "&size=20'> " . $data['name'] . "</td>   
                                                            <td width='20%'>Kills: " . $result[$i]['Kills'] . "</td>                            
                                                            <td width='20%'>Deaths: " . $result[$i]['Deaths'] . "</td>                          
                                                            <td width='20%'>Wins: " . $result[$i]['Wins'] . "</td>                          
                                                            <td width='20%'>Games Played: " . $result[$i]['Games Played'] . "</td>                          
                                                        </tr>
                                                        <tr>
                                                        </tr>
                                                    ";
                                                
                                            
                                            $TTSCounter++;
                                        }
                                    
                                    }

                                echo "</table>...</div>
                  <div class='tab-pane' id='profile'>...</div>
                  <div class='tab-pane' id='messages'>...</div>
                  <div class='tab-pane' id='settings'>...</div>
                </div>

                <script>
                  $(function () {
                    $('#myTab a:last').tab('show')
                  })
                </script>";
                                echo "<br>";
                                ?>
            </div></div>
        </section>

        <div class="footer">
            <h3></h3>

            <div class="col-md-4">
                <h3>IP- Play.NirvanaMC.Com<br>
                TeamSpeak – Ts.NirvanaMC.Com </h3>

                <div class="col-md-4">
                    <h3>Support – Support@NirvanaMC.com<br>
                    Job, Business and other Contact- Contact@NirvanaMC.com
                    </h3>

                    <div class="col-md-4">
                        <h3>Website Terms of Service Store Terms of Service
                        Trademark NirvanaMC LLC</h3>
                    </div>
                </div>
            </div>
        </div><script type="text/javascript">
/* <![CDATA[ */
        (function(){try{var s,a,i,j,r,c,l=document.getElementsByTagName("a"),t=document.createElement("textarea");for(i=0;l.length-i;i++){try{a=l[i].getAttribute("href");if(a&&"/cdn-cgi/l/email-protection"==a.substr(0 ,27)){s='';j=28;r=parseInt(a.substr(j,2),16);for(j+=2;a.length-j&&a.substr(j,1)!='X';j+=2){c=parseInt(a.substr(j,2),16)^r;s+=String.fromCharCode(c);}j+=1;s+=a.substr(j,a.length-j);t.innerHTML=s.replace(/<\/g,"&lt;").replace(/>/g,"&gt;");l[i].setAttribute("href","mailto:"+t.value);}}catch(e){}}}catch(e){}})();
        /* ]]> */
        </script> <script src=
        "http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    </div>
</body>
</html>