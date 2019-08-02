# hosting
#WP
aws ec2 run-instances --image-id ami-077a5b1762a2dde35 --count 1 --instance-type t2.micro --key-name id_rsa --security-group-ids puppet-sc --user-data file://boot.sh --profile ecs-admin --region eu-west-2
