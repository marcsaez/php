# Pasar archivos necesarios
resource "null_resource" "archive" {
  triggers = {
    instance_id = aws_instance.php.id
    }
  connection {
    type     = "ssh"
    user     = "ubuntu"
    host     = "${aws_instance.php.public_ip}"
    private_key = "${file("~/.ssh/id_rsa")}"
  }
  provisioner "file" {
    source = "./definitivo"
    destination = "/home/ubuntu/"
  }
  provisioner "remote-exec" {
    inline = [
      "sleep 60",
      "sudo apt-get update"
    ]
  }
  depends_on = [
    aws_instance.php
  ]
}

resource "null_resource" "install" {
  triggers = {
    instance_id = aws_instance.php.id
    }
  connection {
    type     = "ssh"
    user     = "ubuntu"
    host     = "${aws_instance.php.public_ip}"
    private_key = "${file("~/.ssh/id_rsa")}"
  }
  provisioner "remote-exec" {
    inline = [
      "chmod +x ~/definitivo/packages.sh",
      "bash ~/definitivo/packages.sh"
    ]
  }

  depends_on = [
    null_resource.archive
  ]
}

resource "null_resource" "move" {
  triggers = {
    instance_id = aws_instance.php.id
    }
  connection {
    type     = "ssh"
    user     = "ubuntu"
    host     = "${aws_instance.php.public_ip}"
    private_key = "${file("~/.ssh/id_rsa")}"
  }
  provisioner "remote-exec" {
    inline = [
      "sudo rm /var/www/html/index.html",
      "sudo cp ~/definitivo/web/* /var/www/html/.",
      "bash ~/definitivo/mysql.sh",
      "sudo systemctl reload apache2"
    ]
  }

  depends_on = [
    null_resource.install
  ]
}

