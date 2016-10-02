# Payment System

### Project overview

Please checkout [readme.md](https://gitlab.com/pham-anh/payment_system/blob/develop/README.md)

### Coding rules

Please follows [Fuel Coding Standards](http://fuelphp.com/docs/general/coding_standards.html)

### Branches

* `develop`: for development. Please create new branch from this. Every code into this branch requires a merge request.

* `master`: the branch for mature code that is decided to be released.

### You need the followings

* Know working with Git
* Have `git bash` (command line interface) or `git GUI` (such as SourceTree) on your PC

### How to set up this project locally (in your PC)

Suppose that you are using XAMPP, the followings will show you how to setup this project on your PC via `git bash`

#### Create an ssh key

* Firstly, you should create an ssh key to make the connection from your `git bash` to `gitlab` more convenient and secure
 * Checkout this link for instruction about SSH key: https://docs.gitlab.com/ee/gitlab-basics/create-your-ssh-keys.html
          
_(You can also use HTTPS instead of SSH if you like, but it seems that you will need to enter your `gitlab` password everytime you want to interact with remote repo)_

* After you add the public ssh key to gitlab, add the private key to your git bash

```shell
$ eval $(ssh-agent -s)
$ ssh-add ~/.ssh/<your_private_key>
git clone git@gitlab.com:pham-anh/payment_system.git
# Output: Identity added: link/to/your/ssh_private_key
```

#### Clone the project

* Now clone the project to you web directory (`htdocs`)

```shell
$ git clone git@gitlab.com:pham-anh/payment_system.git
```

#### Set up database

The development database information is logged in this file
 * fuel/app/config/development/db.php

The file is set with the following information:
* Database: `payment_system`
* Database user: `web_user` and password: `web_user`

You can set up a database and user like that to use.    
_(For security reason, it is supposed that `web_user` just has very basic previlleges to the database like: `select`, `insert`, `delete`, `update`)_

#### Install dependencies

Access the project via the browser, if you see the message    
`No composer autoloader found. Please run composer to install the FuelPHP framework dependencies first!`    
then go to shell of your XAMMP and run the following line

```shell
$ cd <to_the_project>
$ php composer.phar install # This will install the dependencies of FuelPHP so the project will run after that
```

#### Run migration to create/ update tables/ columns