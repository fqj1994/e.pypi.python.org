e.pypi.python.org
=================

This respository includes scripts used in e.pypi.python.org.

This is splited from mirrors.tuna.tsinghua.edu.cn.

This aims to help others to build a private or public pypi mirror, or include
pypi to their current opensource mirrors.

CONTENT OF THE REPOSITORY
-------------------------

1. thirdparty/pep381client-1.5, a pypi mirroring tool published in pypi, under the terms of Academic Free License, Version 3.

2. pypistat and pypistat.py, scripts to generate a daily csv statistics file.

3. mkstatus.pypi, a shell script to generate status file, which provides information to the tablesheet on mirrors.tuna.tsinghua.edu.cn.

4. sync.pypi, a shell script to call pep381client, mkstatus.pypi, and save logs.

5. web/, homepage used in http://e.pypi.python.org/ 

LICENSE ISSUES
--------------------------
1. Content in thirdparty/ are published under different kinds of License, SEE 'CONTENT OF THE REPOSITORY' for more information.

2. Content in web/ are written by [Ray Song](http://github.com/maskray) (canonical to Fangrui Song), and me. Published under the terms of Apache License, Version 2.

3. Other content are written by me, and are published under the terms of Apache License, Version 2.

I CAN NOT RUN YOUR SCRIPTS
--------------------------
The scripts are splited from mirrors.tuna.tsinghua.edu.cn, some scripts, like mkstatus.pypi depends on the infrastructure of mirrors.tuna, you can go to http://git.tuna.tsinghua.edu.cn/?p=mirror/scripts.git;a=summary to see complete scripts of out mirrors.tuna.tsinghua.edu.cn.

I WANT A DOCUMENTATION ON YOUR SCRIPTS
--------------------------------------
Sorry, I DON'T have documentations on these scripts. If you want to understand the infrastructure of e.pypi.python.org, a.k.a mirrors.tuna.tsinghua.edu.cn, you can refer to http://wiki.tuna.tsinghua.edu.cn/MirrorMaintenance and http://wiki.tuna.tsinghua.edu.cn/MirrorsArch with the help of google translate.
