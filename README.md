# Mail-IP-On-Reboot
For servers which running dynamic IP, can use this set of scripts to report new IP to specific owner email.

## File placing
1. Client instance: Put /script/ into the server which you wish to report its new IP when reboot.
2. Service instance: put /php/ into any server which allowed PHP Web access.

### Configurations - Service instance
1. customize the params that use to trigger your mailing action.
2. do remember to change the `$emailAddress` and `$emailTitle` as you wish.
3. make sure your php mail command is usable.

### Configurations - Client instance
1. execute the command: ```chmod +x /etc/rc.local```
2. add following code into last new row of rc.local: <br>```sh /script/mailOnReboot.sh &```
3. amend `URL`, `KEY` and `PARAM_KEY` in the script file as your desired.  Must match with the param configured in PHP script.

## Testing
- perform restart with command line, an email should received: 
```
shutdown -r now
```
