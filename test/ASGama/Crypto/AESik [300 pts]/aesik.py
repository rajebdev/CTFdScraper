#!/usr/bin/python
from Crypto.Cipher import AES
import sys

class Unbuffered(object):
  def __init__(self, stream):
    self.stream = stream
  def write(self, data):
    self.stream.write(data)
    self.stream.flush()
  def writelines(self, datas):
    self.stream.writelines(datas)
    self.stream.flush()
  def __getattr__(self, attr):
    return getattr(self.stream, attr)

sys.stdout = Unbuffered(sys.stdout)


def encrypt(key, plain):
    cipher = AES.new( key.decode('hex'), AES.MODE_ECB )
    return cipher.encrypt(plain).encode('hex')

def pad(message):
    if len(message) % 16 != 0:
        message = message + '0'*(16 - len(message)%16 )
    return message


notif = "Selamat datang dan selamat berbelanja"
sys.stdout.write(notif+"\n")
sys.stdout.write("Silahkan masukkan pesanan anda : ")
pesanan = raw_input()

print "===================================================================== pesanan ====================================================================="
sistem = """Oke pesanan sedang dicatat oleh sistem, silahkan menunggu beberapa saat.
Pesanan dengan nama {0} akan segera diantar.
Dimohon untuk menyimpan struk pembayaran ini {1}.
Silahkan lakukan pembayaran ke cashier terlebih dahulu!!.
""".format( pesanan, """REDACTED""" )

sistem = pad(sistem)
sys.stdout.write(encrypt( """KEY""", sistem ))
