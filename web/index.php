<?php
date_default_timezone_set('UTC');
function in_tsinghua() {
    $ip = $_SERVER['REMOTE_ADDR'];
    if (strpos($ip, '::ffff:166.111.') === 0 || strpos($ip, '::ffff:59.66.') === 0 
        || strpos($ip, '2402:f000') === 0 || strpos($ip, '2001:0da8:0200') === 0)
        return TRUE;
    else
        return FALSE;
}
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
<?php if (in_tsinghua()) {?>
<section>
<h2>致清华大学校内用户</h2>
<p>
如果你在清华大学校内，请使用pypi.tuna.tsinghua.edu.cn而不是e.pypi.python.org。因为pypi.tuna.tsinghua.edu.cn将解析出TUNET的IP地址，而e.pypi.python.org不会。<br/>
同时请<span title="架设在清华大学校园网中的过渡方案除外，如isatap.tsinghua.edu.cn" style="text-decoration: underline;">关闭teredo等IPv6的过渡方案</span>，否则可能会导致通过过渡方案访问IPv6，使用IPv4传输数据，计算不必要的IPv4流量。</p>
</section>
<?php }?>
<section>
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
<h2>How to use it 如何使用</h2>
<p>
Please set your index-url to one of the following:<br/>
请将你的index-url设置成下面两个之一
</p>
<hr/>
<ul>
<li>http://e.pypi.python.org/simple&nbsp;&nbsp;&nbsp;&nbsp;(Recommended for users from <strong>Outside</strong> Tsinghua University. 推荐清华大学<strong>以外</strong>的用户使用，始终解析出赛尔的IPv4和清华大学校园网的IPv6。校内用户若使用此域名解析出的IPv4地址，将计算校园网流量，使用IPv6不计。)</li>
<hr/>
<li>http://pypi.tuna.tsinghua.edu.cn/simple&nbsp;&nbsp;&nbsp;&nbsp;(推荐清华大学<strong>校内</strong>用户使用，根据来源解析出赛尔或者清华大学校园网的IPv4和IPv6。请务必设置你的运营商（或网络中心）<span title="清华大学用户应使用166.111.8.28作为自己的DNS服务器" style="text-decoration: underline;">推荐的DNS服务器</span>，否则可能会解析出错误的地址，导致计算不必要的流量。校内用户请<span title="架设在清华大学校园网中的过渡方案除外，如isatap.tsinghua.edu.cn" style="text-decoration: underline;">关闭teredo等IPv6过渡方案</span>，否则可能计算不必要的IPv4流量。)</li>
</ul>
</section>
<section>
<h2>Network connection</h2>
<ul>
<li>IPv6 : 1 Gbps</li>
<li>IPv4 : 1 Gbps (Inside Tsinghua), &gt;= 100 Mbps (Outside Tsinghua)</li>
</ul>
</section>
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
