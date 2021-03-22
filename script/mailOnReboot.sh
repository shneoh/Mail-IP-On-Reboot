#!/bin/bash

URL="https://myurl.com/checkmyip.php"
KEY="verifyKey"
PARAM_IP="ip"

IP=$(curl -s "$URL?$KEY")
REPORT=$(curl -s "$URL?$KEY&$PARAM_IP=$IP")

exit 0
