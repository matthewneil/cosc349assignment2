# -*- mode: ruby -*-
# vi: set ft=ruby :

Vagrant.configure("2") do |config|

  config.vm.box = "dummy"

  config.vm.provider :aws do |aws, override|

    # aws.access_key_id = "YOUR KEY"
    # aws.secret_access_key = "YOUR SECRET KEY"
    # aws.session_token = "SESSION TOKEN"

    aws.region = "us-east-1"

    override.nfs.functional = false
    override.vm.allowed_synced_folder_types = :rsync

    aws.keypair_name = "cosc349assignment2"

    override.ssh.private_key_path = "~/.ssh/cosc349assignment2.pem"

    aws.instance_type = "t2.micro"

    aws.security_groups = ["sg-0a8b3b0e56b6fba40"]

    aws.availability_zone = "us-east-1a"
    aws.subnet_id = "subnet-007d235c"

    aws.ami = "ami-04763b3055de4860b"

    override.ssh.username = "ubuntu"
  end

  config.vm.provision "shell", inline: <<-SHELL
    apt-get update
    apt-get install -y apache2
  SHELL
end
