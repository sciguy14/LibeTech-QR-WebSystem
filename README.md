LibeTech QR Code-Based Entry System
===================================
This Repo contains the Web Interface.  Find the embedded code for the BeagleBone in this repo: https://github.com/sciguy14/LibeTech-QR-Entry  
  
The LibeTech QR-Code Based Entry system is a unique way to do away with traditional keys and swipe cards.  Using a simple web interface, approved users are added to the system via their email addresses.  Once added, these users are sent a QR code via Email, that when held up to the system, allows them to unlock the door.

Notes on the Website Code in this Repo
--------------------------------------
* In submit.php, you'll need to change your host and port settings for your SMTP server
* You should use .htaccess and .htpassword to put the contents of this repo on a password-protected folder on your server
* The valid QR code hash is generated and put in a text file one level up from wherever you place this repo.  That is where the Beaglebone will look for it.  You'll need to tell the python script running on the beaglebone where it should be looking for the valid hash file.  See the embedded code repo for more info.

How it Works (Demo)
-------------------
* User enters email into Website
* Unique QR code is generated and emailed to user's smartphone
* Hash of code embedded in QR is sent to the door module
* User holds their phone up to the camera on the door module
* Door module scans QR code, hashes it, and compares it to stored allowed code
* If hash is a match, door is opened
* If not, door remains locked
* QR code remains valid until new user signs up, and old code is invalidated

The Team
--------
* Jeremy Blum - B.S. Electrical and Computer Engineering '12, MEng '13 (Developed the Hardware, Software, and Web Backend)
* Lindsey Brous - School of Hotel Administration '12 (Market Research and Development)
* Harris Nord - B.S. Industrial and Labor Relations '12 (Strategy)
* Kaitlin Uebele - School of Hotel Administration '12 (Finances and Business Development)

Project History
---------------
The project was conceived and developed by the above team as an entry to Cornell University's Hospitality Business Plan Competition in 2012.  We made it to the final round of 5 teams from the original 31, but alas, we did not win. We did, however, win both the GE Imagination Award and the Verizon Wirelss Innovation Award at Cornell's annual "Bits on Our Minds" technology demo fair. 
  