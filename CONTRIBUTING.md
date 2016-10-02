# Payment System

### You need the followings to get into this project

* Know working with Git
* Have `git bash` (command line interface) or `git GUI` (such as SourceTree) on your PC
* If you want to you ssh connection, you need to setup `ssh keys` to have gitlab and your PC know each other

### How to set up this project locally

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

##### Clone the project

* Now clone the project to you web directory (`htdocs`)

```shell
$ git clone git@gitlab.com:pham-anh/payment_system.git
```

##### Install dependencies

* Access the project via the browser, if you see this message    
`No composer autoloader found. Please run composer to install the FuelPHP framework dependencies first!`    
then go to shell of your XAMMP and run the following line

```shell
$ cd <to_the_project>
$ php composer.phar install # This will install the dependencies of FuelPHP so the project will run after that
```

##### Set up databse




