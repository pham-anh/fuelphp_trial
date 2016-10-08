# Payment System

### Project overview

Please checkout [readme.md](https://gitlab.com/pham-anh/payment_system/blob/develop/README.md)

### Coding rules

Please follows [Fuel Coding Standards](http://fuelphp.com/docs/general/coding_standards.html)

### Branches

* `develop`: for development. Please create new branch from this. Every code into this branch requires a merge request.

* `master`: the branch for mature code that is decided to be released.

### How to set up this project locally (in your PC)

Suppose that you are using XAMPP, the followings will show you how to setup this project on your PC via `git bash`

#### Create an ssh key

* Firstly, you should create an ssh key to make the connection from your `git bash` to `gitlab` more convenient and secure
 * Checkout this link for instruction about SSH key: https://docs.gitlab.com/ee/gitlab-basics/create-your-ssh-keys.html
          
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

You can start right away with the following default information.

* Database: `payment_system`
* Db user for app: `web_user` and password: `web_user`   
 * For security reason, it is supposed that `web_user` just has very basic previlleges to the database like: `select`, `insert`, `delete`, `update`
* Db user for migrations: `system_user` and password: `system_user`
 * You should grant all previlliges for `system_user` on db `payment_system`

#### Install dependencies

Access the project via the browser via the URL `localhost/payment_system/public`, if you see the message    
`No composer autoloader found. Please run composer to install the FuelPHP framework dependencies first!`    
then go to shell of your XAMPP and run the following line

```shell
$ cd <to_the_project>
$ php composer.phar install # This will install the dependencies of FuelPHP so the project will run after that
```

#### Run migration to create/ update tables/ columns

Open XAMPP shell, change directory to `payment_system` project, run this command:

```shell
php oil refine migrate
```

Then you will have the latest database for this system.

#### Access the system via browser

* `http://localhost/payment_system/public/account/index`

* `http://localhost/payment_system/public/account/index`
---

_(To be edited anytime...)_