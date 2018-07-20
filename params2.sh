#! /bin/bash
p[0]=`free | grep Mem |awk '{print $3/$2 * 100}'`
p[1]=`uptime | awk '{print $3}' `
p[2]=`date`
p[3]=`mpstat | grep -A 5 "%idle"  | awk '{print $13}'| tail -n 1`
p[4]=`netstat -a | awk '{print $6}'| grep CONNECTED | wc -l`
p[5]=`ps aux | sort -k 3,3 | head -n 1 | awk '{print $1}'`
p[6]=`df -h --total | tail -n 1 | awk '{print $4}'`

curl --data "mfree=${p[0]}&utime=${p[1]}&tstamp=${p[2]}&cusage=${p[3]}&nwcons=${p[4]}&pmax=${p[5]}&dspace=${p[6]}" http://127.0.0.1/postpage2.php 
