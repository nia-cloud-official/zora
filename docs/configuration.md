# Configuration File Guide

The configuration file is a crucial part of the Zora App, as it stores essential settings and parameters that control the app's behavior. This file is named `config.zoraConfig` and is located in the root directory of your container.

## File Format

The configuration file is a plain text file with a simple key-value format. Each line represents a single configuration setting, with the key and value separated by an equals sign (=).

### Example

```code
database_host=localhost
database_username=root
database_password=password
```

<h5>Configuration Settings</h5>

Here is a brief explanation of each configuration setting:

- <b>database_host</b>
  > The hostname or IP address of your database server.
- database_username:
  > The username to use for database authentication.
- <b>database_password</b>
  > The password to use for database authentication.
- <b>database_name</b>
  > The name of the database to use.
- <b>api_key</b>
  > A unique API key for authenticating API requests.
- <b>api_secret</b>
  >A secret key for encrypting API data.
- <b>app_name</b>
  >The name of your Zora App instance.
- <b>app_version</b>
  >The version number of your Zora App instance.
- <b>app_description</b>
  >A brief description of your Zora App instance.
- <b>debug_mode</b>
  >A boolean flag to enable or disable debug mode.
- <b>debug_level</b>
  >An integer value representing the debug level (1-5).
