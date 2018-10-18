#!/bin/sh

rootPath=$(cd `dirname $0`; cd ../../../../; pwd)
logFile="$rootPath/MyAnviz/protected/runtime/log/git"

while true
do
    if [ -f "$logFile" ]; then
        `cd $rootPath; git pull; rm -rf $logFile`
    fi

    sleep 3s
done