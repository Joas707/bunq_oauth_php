# bunq Configuration file

This is an example of how to get a bunq configuration file with Oauth.
## Get Started
#### Requirements:
- Own webserver with https
- A bunq premium account or a sandbox version

#### Setup
1. Upload everything to the webserver and run composer to get the bunq sdk.
2. Fill the config_example.php file with the right information. The 'redirect_url_for_api_token' is your own url, probably it is https://yourdomainname.com/get_api_token.php. You can get the client_id and client_secret out of the bunq app. Be careful with the client_secret.
3. Add the redirect url in the bunq app, otherwise the program will not work.
4. Go to the next url: https://oauth.bunq.com/auth?response_type=code&client_id=YOUR_CLIENT_ID&redirect_uri=YOUR_REDIRECT_URL
5. Complete the steps, the config file will be saved at the place where you defined it in config.php. Please be sure that it is stored at a secure location and it isn't possible for everyone to access!

If you have any questions or trouble installing this feel free to send me a message!
