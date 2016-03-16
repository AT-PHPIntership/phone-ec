# Epark Relax API

Epark Relax API built by power Laravel framework. 
The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)

## Install local environment

### Required
- Vagrant >= 1.8
- No need to install Ansible

### Steps to install 

##### Checkout source code
```bash
git clone git@github.com:AsianTechInc/EPark_Relax_API.git
```

##### Vagrant up

```bash
cd vagrant
vagrant up
```
If there is something changed in provisioning folder you have to execute this command to update box
```bash
vagrant provision
```

##### SSH to box

```bash
vagrant ssh
```

##### Create database
Login ssh to the box, then login to mysql and create database

```bash
$ mysql -u root -p 
#empty password
mysql> create database `epark_relax` character set utf8 collate utf8_general_ci;
mysql> exit;
```

##### Install packages by composer

```bash
cd ~/eprk_relax_api
cp .env.sample .env
composer install
#php artisan migrate #if needed
```
##### Directory Permissions (after vagrant ssh)

```bash
cd ~/eprk_relax_api
sudo chmod -R 777 storage
sudo chmod -R 777 bootstrap/cache
```

##### Add hosts

Open `/etc/hosts` file and add this line `192.168.44.11   api.epark_relax.me`



## Coding style

[PHP_CodeSniffer](https://github.com/squizlabs/PHP_CodeSniffer) and [PHPMD](http://phpmd.org/) are used to check the coding style. The `cicle.ci` file is also available in the project root folder, it can help us to check coding style and unit testing when a member try to create a new pull request. The circelci configurations also can help us to make comments on github commit if something is wrong.  

#### PHP_CodeSniffer
Check the coding convention following [PSR-1](http://www.php-fig.org/psr/psr-1/), [PSR-2](http://www.php-fig.org/psr/psr-2/). Beside that function comment must follow some rules bellow:
- All global functions, class methods must have comment to explain the meaning of functions.
- Line 1 : Short description. There is a blank line after line 1
- Next lines: explain for parameters
 - `@param   type $paramName description`
 - Explain for all parameters line by line, there is no blank line bettween parameters description.
- Last line: return description
 - `@return type`
 - There is a blank line before return description line.

Local checking:
```bash
./vendor/bin/phpcs --standard=phpcs.xml
```
#### PHPMD
- [Code Size Rules](http://phpmd.org/rules/codesize.html)
- [Controversial Rules](http://phpmd.org/rules/controversial.html)
- [Design Rules](http://phpmd.org/rules/design.html)
- [Naming Rules](http://phpmd.org/rules/naming.html)
 - ShortVariable except for `$id`, `$e`
- [Unused Code Rules](http://phpmd.org/rules/unusedcode.html)

Local checking:
```bash
./vendor/bin/phpmd app text phpmd.xml
```