#!/bin/sh

# Fixes the file ownership to match the local user.
# Then starts php-fpm for you.

set -xe

username=john
statfile=/var/www/html/docker-compose.yml

uid=`stat -c %u ${statfile}`
gid=`stat -c %g ${statfile}`
my_uid=`id -u $username`
my_gid=`id -g $username`

if [ "${my_uid}" != "${uid}" ]; then
    sed -i "s/\(${username}:x:\)${my_uid}/\\1${uid}/" /etc/passwd
    find / -not \( -path /proc -prune \) -user ${my_uid} -exec chown -h ${uid} {} \;
fi

if [ "${my_gid}" != "${gid}" ]; then
    sed -i "s/\(${username}:x:${uid}:\)${my_gid}/\\1${gid}/" /etc/passwd

    groupname=`getent group ${gid} | cut -d: -f1`
    if [ "${groupname}" == "" ]; then
        groupname = ${username}_group
        addgroup -g ${gid} ${groupname}
    fi
    adduser $username $groupname

    find / -not \( -path /proc -prune \) -group ${my_gid} -exec chgrp -h ${gid} {} \;
fi

# run php-fpm
php-fpm
