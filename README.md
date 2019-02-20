Napoleon-v3.1Beta






The topology of the game is simple :

-Raspberry pi running DV pi3 in 192.168.0.23 (local) and using no-ip.com with the address : http://victimwebserver.ddns.net

-Attacker using kali on hotspot from iphone.

Running a small "wpscan --url http://victimwebserver.ddns.net  --enumerate --plugins-detection aggressive"

That showed us a vulnerability that allow us to use arbitary file upload on the plugin wp-mobile-detector 3.5.


![getcredential php](https://user-images.githubusercontent.com/34336452/53041233-5dc00d80-347b-11e9-9d1f-8ade17cf8f8d.png)

That code was uploaded on github in order to be used to exploit the mobile-detector vulnerability in the Dv pi3.
It will allow us to get access to Wifi-credential.txt located in the folder /home/pi

The goal will then be to upload that file (game.php) in the /var/www/html/wordpress/wp-content/plugins/wp-mobile-detector/cache in order to call it later directly from the website.

To do so, we will use a small python code that will upload game.php in the wordpress folder.

![hack py pcap1](https://user-images.githubusercontent.com/34336452/53043449-649d4f00-3480-11e9-988e-f21717171579.png)

Once that is done, just call it "python hack.py".

Then go to http://victimwebserver.ddns.net/wp-content/plugins/wp-mobile-detector/cache/Game.php

you will see :

![game php on the server pcap1](https://user-images.githubusercontent.com/34336452/53043959-94992200-3481-11e9-8818-4209b945ce9b.png)


which is the content of Wifi-credentials.txt

![wifi-crendentials txt](https://user-images.githubusercontent.com/34336452/53044071-e2158f00-3481-11e9-9ca9-455e88a04f7f.png)



The capture of the pcap is made directly on the raspberry pi with tcpdump.
