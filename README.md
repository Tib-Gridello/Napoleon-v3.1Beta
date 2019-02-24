Napoleon-v3.1Beta






The topology of the game is simple :

-Raspberry pi running DV pi3 in 192.168.0.23 (local) and using no-ip.com with the address : http://victimwebserver.ddns.net

-Attacker using kali on hotspot from iphone (VPN Russia).

Running a small "wpscan --url http://victimwebserver.ddns.net  --enumerate --plugins-detection aggressive"

That showed us a vulnerability that allow us to use arbitary file upload on the plugin wp-mobile-detector 3.5.

![2019-02-24 13_48_35-napoleonjusthackedyou_getwifi_ the quieter you are](https://user-images.githubusercontent.com/34336452/53300145-0636ee80-383b-11e9-8f89-497cbed543d2.png)



![2019-02-24 13_50_58-getwifi_wifi-cred php at master napoleonjusthackedyou_getwifi](https://user-images.githubusercontent.com/34336452/53300157-41d1b880-383b-11e9-87d0-33e300b8016c.png)

(edit: creation of new Github in order to keep safe my github)

That code was uploaded on github in order to be used to exploit the mobile-detector vulnerability in the Dv pi3.
It will allow us to get access to Wifi-credential.txt located in the folder /home/pi

The goal will then be to upload that file (game.php) in the /var/www/html/wordpress/wp-content/plugins/wp-mobile-detector/cache in order to call it later directly from the website.

To do so, we will use a small python code that will upload game.php in the wordpress folder.

![hack py pcap1](https://user-images.githubusercontent.com/34336452/53043449-649d4f00-3480-11e9-988e-f21717171579.png)

Once that is done, just call it "python hack.py".

Then go to http://victimwebserver.ddns.net/wp-content/plugins/wp-mobile-detector/cache/Game.php

you will see :

![afterex](https://user-images.githubusercontent.com/34336452/53300174-7c3b5580-383b-11e9-85e6-83f9a52d8c98.png)

which is the content of Wifi-credentials.txt

![wifi-crendentials txt](https://user-images.githubusercontent.com/34336452/53044071-e2158f00-3481-11e9-9ca9-455e88a04f7f.png)



The capture of the pcap is made directly on the raspberry pi with tcpdump.



-----------------------------------------------------------------------------------------------------------------------

Part 2 :


For the pcap 2, the attacker is going to scan the network with nmap 

![nmap](https://github.com/Tib-Gridello/Napoleon-v3.1Beta/blob/master/images/nmap.png?raw=true)


discover that 192.168.0.32 (Victim pc) is having port 445 open (smb)

He is later going to bruteforce it :

![s](https://github.com/Tib-Gridello/Napoleon-v3.1Beta/blob/master/images/scanner-smb-login.png)

with two small lists (provisionnary) :

![](https://github.com/Tib-Gridello/Napoleon-v3.1Beta/blob/master/images/bruteforce-list.png)


![](https://github.com/Tib-Gridello/Napoleon-v3.1Beta/blob/master/images/bruteforcelist2.png)

And find the username : "dsfdsfdfssdfdsfdsf" and password : "lol"
