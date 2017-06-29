from wiegandxx import decoder
from conect import comparacion

import time
import pigpio
import wiegand

if __name__ == "__main__":

   def callback(bits, value):
      print("bits={} value={}".format(bits, value))
      if(comparacion(value)):
         pi.write(6,1)
         time.sleep(2)
         pi.write(6,0)
         print("s")

   pi = pigpio.pi()

   w = wiegand.decoder(pi, 13, 26, callback)

   time.sleep(300)

   w.cancel()

   pi.stop()
