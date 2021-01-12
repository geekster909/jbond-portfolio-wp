<p align="center">
  <a href="https://roots.io/bedrock/">
    <img alt="Bedrock" src="https://cdn.roots.io/app/uploads/logo-bedrock.svg" height="100">
  </a>
</p>

<h1 align="center">
  Justin Bond Portfolio Headless WordPress
</h1>

## Overview

Justin Bond Portfolio WordPress Headless CMS. Using Bedrock WordPress Boilerplate.

Bedrock is a modern WordPress stack that helps you get started with the best development tools and project structure.

Learn more at [Roots.io/bedrock](https://roots.io/bedrock/).

## Features

- Better folder structure
- Dependency management with [Composer](https://getcomposer.org)
- Easy WordPress configuration with environment specific files
- Environment variables with [Dotenv](https://github.com/vlucas/phpdotenv)
- Autoloader for mu-plugins (use regular plugins as mu-plugins)
- Enhanced security (separated web root and secure passwords with [wp-password-bcrypt](https://github.com/roots/wp-password-bcrypt))

## Requirements

- PHP >= 7.1
- Composer - [Install](https://getcomposer.org/doc/00-intro.md#installation-linux-unix-osx)

## Setup Instructions

1. Clone the repo.

```shell
git clone git@github.com:geekster909/jbond-portfolio-wp.git
```

OR

```shell
git clone https://github.com/geekster909/jbond-portfolio-wp.git
```

2. Change to the project root directory.

```shell
cd jbond-portfolio-wp
```

3. Run composer install.

```shell
composer install
```

4. Copy `.env.example` and create file `.env` and update environment variables. Wrap values that may contain non-alphanumeric characters with quotes, or they may be incorrectly parsed.

- Database variables
  - `DB_NAME` - Database name
  - `DB_USER` - Database user
  - `DB_PASSWORD` - Database password
  - `DB_HOST` - Database host
  - Optionally, you can define `DATABASE_URL` for using a DSN instead of using the variables above (e.g. `mysql://user:password@127.0.0.1:3306/db_name`)
- `WP_ENV` - Set to environment (`development`, `staging`, `production`)
- `WP_HOME` - Full URL to WordPress home (https://example.com)
- `WP_SITEURL` - Full URL to WordPress including subdirectory (https://example.com/wp)
- `AUTH_KEY`, `SECURE_AUTH_KEY`, `LOGGED_IN_KEY`, `NONCE_KEY`, `AUTH_SALT`, `SECURE_AUTH_SALT`, `LOGGED_IN_SALT`, `NONCE_SALT`
  - Generate with [wp-cli-dotenv-command](https://github.com/aaemnnosttv/wp-cli-dotenv-command)
  - Generate with [our WordPress salts generator](https://roots.io/salts.html)

5. Set the document root on your webserver to Bedrock's `web` folder: `/path/to/site/web/`
6. Access WordPress admin at `https://example.com/wp/wp-admin/`

## Documentation

Bedrock documentation is available at [https://roots.io/docs/bedrock/master/installation/](https://roots.io/docs/bedrock/master/installation/).
