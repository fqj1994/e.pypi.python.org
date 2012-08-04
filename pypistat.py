#!/usr/bin/env python
import time
import sys
from collections import defaultdict
gdict = defaultdict(int)
def process(fpath, date):
    global gdict
    try:
        ff = open(fpath, 'rb')
    except:
        return None
    f = ff.read().split('\n')
    for i in f:
        j =  i.split('"')
        if not len(j) > 6:
            continue
        ip, request, ua = (j[0], j[1], j[5])
        if request[0:14] != 'GET /packages/':
            continue
        request = request.split(' ')[1]
        reqtime = ip.split('[')[1][:-8]
        reqdate = time.strptime(reqtime, '%d/%b/%Y:%H:%M:%S')
        if reqdate.tm_year != date.tm_year or reqdate.tm_mon != date.tm_mon or reqdate.tm_mday != date.tm_mday:
            continue
        if request[-1] == '/':
            continue
        project, filename = request.split('/')[-2:]
        gdict['%s,%s,%s' % (project, filename, ua)] += 1
for i in range(len(sys.argv)):
    if i == 0:
        continue 
    process(sys.argv[i], time.localtime(time.time() - 3600 * 24))

s = ''
for i in gdict:
    s += '%s,%s\n' % (i, gdict[i])

dt = time.localtime(time.time() - 3600 * 24)
print '/mirror/_pypi/web/local-stats/days/%d-%02d-%02d' % (dt.tm_year, dt.tm_mon, dt.tm_mday)

f = open('/mirror/_pypi/web/local-stats/days/%d-%02d-%02d' % (dt.tm_year, dt.tm_mon, dt.tm_mday), 'w')
f.write(s)
f.close()
