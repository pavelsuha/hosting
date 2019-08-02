#!/bin/bash
clientname="clienthumpl"

hostname "${clientname}.pjhosting.org.uk"

echo 172.31.30.16 puppetmaster.pjhosting.org.uk >> /etc/hosts

apt update;
apt upgrade -y;
apt install puppet -y;
systemctl enable puppet;
sed -i '/\[main\]/a server=puppetmaster.pjhosting.org.uk' /etc/puppet/puppet.conf

systemctl restart puppet;
puppet agent -t;
