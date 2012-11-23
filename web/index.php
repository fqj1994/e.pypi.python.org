<?php
date_default_timezone_set('UTC');
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>Welcome to mirror of Python Package Index at Tsinghua University</title>
<meta name="description" content="Welcome to mirror of Python Package Index at Tsinghua University">
<meta name="keywords" content="tuna, pypi, mirror">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/highlight/default.css">
<script type="text/javascript" src="js/highlight.pack.js"></script>
</head>
<body>
<div class="container clearfix">
<h1>Welcome to mirror of Python Package Index at Tsinghua University</h1>
<section>
<section>
<h2>Quick links</h2>
<nav>
<ul>
<li><a href="simple/">simple</a></li>
<li><a href="packages/">packages</a></li>
<li><a href="local-stats/">local-stats</a></li>
<li><a href="serversig/">serversig</a></li>
</ul>
</nav>
</section>
<section>
<h2>Network connection</h2>
<ul>
<li>IPv6 : 1 Gbps</li>
<li>IPv4 : 1 Gbps (Inside Tsinghua), &gt;= 100 Mbps (Outside Tsinghua)</li>
</ul>
</section>
<?php
function formatSeconds($secs) {
    $secs = (int)$secs;
    if ( $secs === 0 ) {
        return '0 second';
    }
    $mins  = 0;
    $hours = 0;
    $days  = 0;
    $weeks = 0;
    if ( $secs >= 60 ) {
        $mins = (int)($secs / 60);
        $secs = $secs % 60;
    }
    if ( $mins >= 60 ) {
        $hours = (int)($mins / 60);
        $mins = $mins % 60;
    }
    if ( $hours >= 24 ) {
        $days = (int)($hours / 24);
        $hours = $hours % 24;
    }
    if ( $days >= 7 ) {
        $weeks = (int)($days / 7);
        $days = $days % 7;
    }
    $result = '';
    if ( $weeks ) {
        if ( $weeks > 1 )
            $result .= "{$weeks} weeks ";
        else
            $result .= "{$weeks} week ";
    }
    if ( $days ) {
        if ( $days > 1 )
            $result .= "{$days} days ";
        else
            $result .= "{$days} day ";
    }
    if ( $hours ) {
        if ( $hours > 1 )
            $result .= "{$hours} hours ";
        else
            $result .= "{$hours} hour ";
    }
    if ( $mins ) {
        if ( $mins > 1 )
            $result .= "{$mins} minutes ";
        else
            $result .= "{$mins} minute ";
    }
    if ( $secs ) {
        if ( $secs > 1 )
            $result .= "{$secs} seconds ";
        else
            $result .= "{$secs} second ";
    }
    $result = rtrim($result);
    return $result;
}
?>
<section>
<h2>Synchronization status</h2>
<p>Last successful synchronization took place <strong><?php echo formatSeconds(time() - strtotime(file_get_contents("last-modified")));?> ago</strong></p>
<p>There are <?php echo (int)(exec("sed -n '$=' simple/index.html")) - 2; ?> packages in our mirrors.</p>
<p>Current status: <?php 
$s = file_get_contents("/home/mirror/log/pypi/status.txt");
$x = explode(',', $s);
switch ($x[0]) {
    case 'checking':
        echo 'In maintainance';
        break;
    case 'success':
        echo 'Work normally';
        break;
    case 'failed':
        echo 'Last synchronization failed';
        break;
    case 'syncing':
        echo 'Synchronizing';
        break;
    default:
        echo 'Unknown';
}?></p>
</section>
</section>
</div>
<footer>
<p>This service is provided by <a href="http://tuna.tsinghua.edu.cn/about">Tsinghua University Network Administrators</a>.</p>
<p>Please mail to <a href="mailto:thu-opensource-mirror-admin@googlegroups.com">thu-opensource-mirror-admin@googlegroups.com</a> if you have any suggestions.</p>
<p>© 2012 <a href="http://fqj.me">Qijiang Fan</a>, <a href="http://maskray.me">Ray Song</a></p></footer>
<script src="js/highlight.pack.js"></script>
<script>hljs.initHighlightingOnLoad();</script>
</body>
</html>
