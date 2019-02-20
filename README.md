Napoleon-v3.1Beta


The topology of the game is simple :

-Raspberry pi running DV pi3 in 192.168.0.23 (local) and using no-ip.com with the address : http://victimwebserver.ddns.net

-Attacker using kali on hotspot from iphone.

That code was uploaded on github in order to be used to exploit the mobile-detector vulnerability in the Dv pi3. It will allow us to get access to Wifi-credential.txt located in the folder /home/pi

getcredential php

The goal will then be to upload that file (game.php) in the /var/www/html/wordpress/wp-content/plugins/wp-mobile-detector/cache in order to call it later directly from the website.

To do so, we will use a small python code that will upload game.php in the wordpress folder.

hack py pcap1

Once that is done, just call it "python hack.py".

Then go to http://victimwebserver.ddns.net/wp-content/plugins/wp-mobile-detector/cache/Game.php

you will see :

game php on the server pcap1

which is the content of Wifi-credentials.txt

wifi-crendentials txt

The capture of the pcap is made directly on the raspberry pi with tcpdump.
