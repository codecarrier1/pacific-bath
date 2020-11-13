#!/bin/bash
url=`lando info -s appserver_nginx | grep http://localhost`
pattern='([[:digit:]]{5})'
[[ $url =~ $pattern ]]
port=${BASH_REMATCH[1]}
username=`lando info | grep appserver\.\*\.internal -m 1 | grep -oP '(?<=[.])\w+(?=[.])'`
ssh -R 80:localhost:$port $username@ssh.localhost.run
