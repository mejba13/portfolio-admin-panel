#!/bin/bash

# selinux
sudo setsebool -P httpd_can_network_connect on
sudo setsebool httpd_can_network_connect_db 1
sudo setsebool -P selinuxuser_mysql_connect_enabled 1

