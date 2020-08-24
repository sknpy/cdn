# coding=utf-8
'''
Created on Apr 23, 2018
Desc: Webp convertor
@author: Mashiro https://2heng.xin
'''
import os
import sys
import hashlib
from PIL import Image

class Single(object):
  def __init__(self, file, manifest):
    self.file = file
    self.mani = manifest

  def hash(self):
    hasher = hashlib.md5()
    with open('gallary/' + self.file, 'rb') as afile:
      buf = afile.read()
      hasher.update(buf)
    self.hash = hasher.hexdigest()
    self.jpeg = 'jpeg/' + self.hash + '.jpeg'
    # print(self.file + '->' + self.hash + '.jpeg')

  def optimize(self):
    im = Image.open('gallary/' + self.file).convert('RGB')
    im.save(self.jpeg, 'JPEG') # todo: TinyPNG API
    print(self.file + '->' + self.hash + '.jpeg')


  def main(self):
    self.hash()
    if not os.path.exists(self.jpeg):
	    self.optimize()
    return self.mani

def gen_manifest_json():
  onlyfiles = [f for f in os.listdir('gallary') if os.path.isfile(os.path.join('gallary', f))]
  id = 1
  Manifest = {}
  for f in onlyfiles:
    try:
      worker = Single(f, Manifest)
      Manifest = worker.main()
      print(str(id) + '/' + str(len(onlyfiles)))
      id += 1
    except OSError:
      print("Falied to optimize the picture: " + f)


def main():
  gen_manifest_json()


if __name__ == '__main__':
  main()
  # key = input('`manifest.json` saved. Press any key to quit.')
  print('`all done\n')
  quit()
