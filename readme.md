# Zenit Project

## 1. Initialize project

Create project with composer, and install npm dependencies:

```sh
composer create-project zenit/project yourproject
cd yourproject
npm install
```

## 2. Create the environment

Setup application domain in `etc/ini/env.yml`:

```yaml
...
sys:
  domain: YOUR_DOMAIN
...
```

Add the domain to your dns or hosts file:

```hosts
127.0.0.1 YOUR_DOMAIN admin.YOUR_DOMAIN www.YOUR_DOMAIN
```

Generate apache vhost file with the command:

```sh
./phlex vhost
```

This will generate the neccessary files in the `var` folder. The default settings are for php module. If you use fpm, then you should change the `etc/ini/config/cli-vhost-generator.yml` file.

Now you are ready to copy or include the generated vhost file `var/virtualhost.conf` into your apache config. (we recommend the include method). 

Copy `app/index.php` file into the `public` folder (manually this time)!

Restart apache, and test your application in a browser: www.YOUR_DOMAIN!

## 3. Setup database

Create an empty database, then create first user table:

```sql
CREATE TABLE `user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `password` char(128) COLLATE utf8_hungarian_ci DEFAULT NULL COMMENT 'password',
  `groups` set('visitor','admin') COLLATE utf8_hungarian_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;
```

Add your first user:

```sql
INSERT INTO `user` 
(`id`, `name`, `email`, `password`, `groups`)
VALUES
(1, 'Elvis Presley', 'elvis@presley.com', '$2y$10$7tdLZM0PyNxfS2G8qNGQL.tA7tsLPH/dNs/EN/X16E6L2dTqIotsS', 'admin');
```

Register your database in your project config: `etc/ini/app/databases.yml`:

```yaml
default:
  user: root
  password: root
  database: YOUR_DATABASE
  host: localhost # optional
  port: 3306 # optional
  charset: utf8 # optional
```

# 4. Launch zengular build

```sh
npm run work
```

This will generate, and copy some files into the `public` folder.

# 5. Let's codex

Open `admin.YOUR_DOMAIN` in a browser. The login is: `elvis@presley.com`, the password is: `vegas`. If it's working, you are done with the installation.