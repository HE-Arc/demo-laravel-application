#!/bin/sh

if [ "$USER" != root ]; then
    PS1='\e[33;1m\u@\h: \e[31m\W\e[0m\$ '
fi
