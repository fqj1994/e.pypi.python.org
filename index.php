<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
<title>Mirror of Python Package Index at Tsinghua University</title>
</head>
<body>
<h1>Welcome to mirror of Python Package Index at Tsinghua University</title>
<h2>URL: http://pypi.tuna.tsinghua.edu.cn/ </h2>
<h2>URL: http://e.pypi.python.org/ </h2>
<hr/>
Network Connection:<br/>
IPv6 : 1 Gbps<br/>
IPv4 : 1 Gbps (Inside Tsinghua), &gt;= 100 Mbps (Outside Tsinghua)
<hr/>
Notifications to Users Inside Tsinghua University:<br/>
Please use <i>pypi.tuna.tsinghua.edu.cn</i> instead of <i>e.pypi.python.org</i>
because <i>pypi.tuna.tsinghua.edu.cn</i> will resolve a TUNET IP address for you, but 
<i>e.pypi.python.org</i> won&#039;t.
<hr/>
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
Synchronization Status:<br/>
Last successful synchronization took place <b><i><?php echo formatSeconds(time() - strtotime(file_get_contents("last-modified")));?></i></b>  ago.<br/>
There are <?php echo (int)(exec("sed -n '$=' simple/index.html")) - 2; ?> packages in our mirrors.<br/>
Current Status: <b><?php
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
}
?></b>.<br/>
<hr/>
<a href="simple/">simple</a><br/>
<a href="packages/">packages</a><br/>
<a href="local-stats/">local-stats</a><br/>
<a href="serversig/">serversig</a><br/>
<hr/>
Configuation:<br/>
<pre>
Set your index-url of easy_install or pip to:
http://e.pypi.python.org/simple
or
http://pypi.tuna.tsinghua.edu.cn/simple
</pre>
<hr/>
Opensource mirror at Tsinghua University. <a href="http://mirrors.tuna.tsinghua.edu.cn/">http://mirrors.tuna.tsinghua.edu.cn/</a><br/>
We provide mirrors of apache, archlinux, centos, CPAN, CRAN, CTAN, debian, deepin, fedora, gentoo, gnu, kernel, linuxmint, opensuse, macports, pypi, ubuntu and more.<br/>
If you have any questions or suggestions on this mirror, please contact the maintainer Qijiang Fan (responsible for pypi.tuna) at fqj1994 [prevent-spam] gmail [dot] com, or email to our mailing list thu-opensource-mirror-admin [prevent-spam] googlegroups [dot] com directly.
</body>
</head>
</html>
