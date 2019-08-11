#!/bin/bash
su gald

KEY=$1
OWNER=$2
echo "params $KEY - $OWNER"
#PASSWD=$(cat /home/gald/.my.cnf | grep password | awk -F "=" {'print $2'})
#USER=$(cat /home/gald/.my.cnf | grep user | awk -F "=" {'print $2'})
PASSWD="Kockopes01"
# -e "SELECT JSON_ARRAYAGG(JSON_OBJECT(*)) FROM users_requests.request_by_user WHERE done = 'waiting' AND request_string = 'smzOeMSC7JTDaA==' LIMIT 1;
#git clone https://github.com/GaldCZ/hosting.git
echo "git"
git -C hosting/ pull

CONN="mysql -h database-main.cycq0z9urb9l.eu-west-2.rds.amazonaws.com -P 3307 -u admin -p${PASSWD}"
echo "row"
ROW=$(${CONN} -s -N -e "SELECT * FROM users_requests.request_by_user WHERE done = 'waiting' AND request_string = '${KEY}' AND request_type = 'create' LIMIT 1;")
echo $?
if [ -z "${ROW}" ];then
      echo "No MySQL data"
      exit 1
fi

echo $ROW
IMAGE=$(echo ${ROW} | awk {'print $9'})
NAME=$(echo ${ROW} | awk {'print $5'})
SIZE=$(echo ${ROW} | awk {'print $8'})
REGION=$(echo ${ROW} | awk {'print $7'})
echo "aws"
aws ec2 run-instances --image-id ${IMAGE} --count 1 --instance-type ${SIZE} --key-name id_rsa --security-group-ids puppet-sc --user-data file://hosting/boot.sh --region ${REGION} --tag-specifications 'ResourceType=instance,Tags=[{Key=owner,Value=${OWNER}]'

###FINISH###
${CONN} -e "UPDATE users_requests.request_by_user SET done='done' WHERE request_string = '${KEY}' AND request_type = 'create' LIMIT 1;"


### MAKE SIGN IN MASTER   mysql -h database-main.cycq0z9urb9l.eu-west-2.rds.amazonaws.com -P 3307 -u admin -pKockopes01 -s -N -e "SELECT * FROM users_requests.request_by_user WHERE done = 'waiting' AND request_string = 'yDaHz52pKCPT6Q==' AND request_type = 'create' LIMIT 1;"