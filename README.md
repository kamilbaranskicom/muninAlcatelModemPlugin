# Plugin for monitoring Alcatel MW40 with Munin

## Info:
* Should also work with other Alcatel WiFi / MiFi routers / modems.

## Requirements:
* PHP (with curl extension)

## Usage:
* copy `alcatelConfig_default.php` to `alcatelConfig.php`
* check instructions in `alcatelConfig.php` file (fill the IP and secret key)
* install in <a href="http://munin-monitoring.org/">munin</a> (and remember to restart munin-node -HUP afterwards), wait for munin to regenerate png/htmls.
* have fun! (Use munin's Limit low/high for better visuality.)

## Sample screenshots:
<img src="screenshot.png">
<img src="screenshot2.png">
