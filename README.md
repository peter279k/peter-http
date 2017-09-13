# wp-http

## Introduction

The object-oriented style helper class helps you accessing the WordPress HTTP API easily.

## Usage

- ```git clone https://github.com/peter279k/wp-http.git```
- Please see the more details about the ```main.php```.

## Sample code

- Create the ```api-key.ini``` in this project root path and the ini file contents are as follows:

```
[Facebook]
access_token=define_your_access_token
[Rebrandly]
api_key=define_your_api_key
```

- We use the [Facebook graph API](https://developers.facebook.com/) and [Rebrandly](https://developers.rebrandly.com/docs) API to complete the ```GET``` and ```POST``` examples.

- Please see the ```main.php``` to get the more details about ```GET``` and ```POST``` examples.

## References

Here is the references about the WordPress HTTP API.
- [wp_remote_get](https://codex.wordpress.org/Function_Reference/wp_remote_get)
- [wp_remote_post](https://codex.wordpress.org/Function_Reference/wp_remote_post)
- [wp_remote_request](https://developer.wordpress.org/reference/functions/wp_remote_request)

And in our helper class, we use the ```wp_remote_get``` and ```wp_remote_post``` to complete this project.

