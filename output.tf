output "ip_ec2" {
  value = aws_instance.php.public_ip
}