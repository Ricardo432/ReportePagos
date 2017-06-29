sudo pigpiod
#http://www.stuffaboutcode.com/2012/06/raspberry-pi-run-program-at-start-up.html
#! /usr/bin/python
case "$1" in
  start)
    echo "Starting noip"
    # run application you want to start
    /home/pi/Jonatan/main1
    ;;
  stop)
    echo "Stopping noip"
    # kill application you want to stop
    killall main1
    ;;
  *)
    echo "Usage: /etc/init.d/noip {start|stop}"
    exit 1
    ;;
esac

exit 0
