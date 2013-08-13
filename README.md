phpbareframe
============

Bare framework for PHP - no advanced functionality - almost zero learning curve - just install and start developing

Intent:
Checkout this frame, start writing code in a very basic MVC style structure.

Always keep the frame as light as possible. Idea is to make an extremely lightweight frame only.

No intent to add any helper functionality at all.

Steps:
1. checkout this repo

2. rename folder to your name of choice (eg. yourApp)

2. rm .git folder to disconnet from this repo

3. create a virtualhost (eg. dev.local) to point to yourApp/web
Redirect all requests to web/index.php
Here is an example apache config:
NameVirtualHost *:80
<VirtualHost *:80>
  DocumentRoot /var/www/bareframe/web
  ServerName dev.local
  DirectoryIndex index.php
  Options -Indexes
  RewriteEngine On
  RewriteCond %{REQUEST_URI} !^/index.php
  RewriteRule .* /index.php [QSA,L]
</VirtualHost>

you will also have to add an entry in your hosts file.

4. point your browser to dev.local/home and a "hello" message should be showing up

5. To make a new endpoint like dev.local/trial work, you have to add these files:
yourApp/pages/actions/Trial.php
yourApp/pages/templates/trial.tpl

This framework will look for a class Trial in Trial.php having method execute,
and once that is done, will look for trial.tpl template for HTML content

6. Check Home.php under actions to figure out how to pass variables to templates

7. dev.local/ will render Home action. This is done via default action specified in config/defaults.php

8. config/env.php is envisioned to be used for configurations that are likely to vary with various deployments.
For now, it holds only the build key and for dev env, errors are turned on.

9. Everything else you have to handle on your own.
