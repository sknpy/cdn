# coding=utf-8
# pyinstaller -F manifest.py
'''
Created on Feb 21, 2021
Desc: Webp convertor
@author: sknye
@From: Mashiro
'''
import os
import sys
import json
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
        self.webp = 'webp/' + self.hash + '.webp'
        self.jpeg_th = 'jpeg/' + self.hash + '.th.jpeg'
        self.webp_th = 'webp/' + self.hash + '.th.webp'

    def optimize(self):
        im = Image.open('gallary/' + self.file).convert('RGB')
        im.save(self.jpeg, 'JPEG')  # todo: TinyPNG API
        im.save(self.webp, 'WEBP')
        im.thumbnail((450, 300))
        im.save(self.jpeg_th, 'JPEG')  # todo: TinyPNG API
        im.save(self.webp_th, 'WEBP')

    def update_name(self):
        filename = self.file
        try:
            if self.file[:self.file.rindex('.')] != self.hash:
                filename = self.hash + self.file[self.file.index('.'):]
        except ValueError:
            filename = self.hash + self.file[self.file.index('.'):]
        if self.file != filename:
            os.rename('gallary/' + self.file, 'gallary/' + filename)
            if os.path.exists('gallary/' + filename):
                self.file = filename

    def manifest(self):
        self.mani[self.hash] = {
            'source': self.file,
            'jpeg': [self.jpeg, self.jpeg_th],
            'webp': [self.webp, self.webp_th]
        }

    def main(self):
        self.hash()
        if not (os.path.exists(self.jpeg) and os.path.exists(self.webp)):
            self.optimize()
        self.update_name()
        self.manifest()
        return self.mani


def deduplication(reservedfiles):
    jpegfiles = [f for f in os.listdir('jpeg') if os.path.isfile(os.path.join('jpeg', f))]
    for f in jpegfiles:
        try:
            if f[:f.index('.')] not in reservedfiles:
                os.remove(os.path.join('jpeg', f))
        except ValueError:
            os.remove(os.path.join('jpeg', f))
    webpfiles = [f for f in os.listdir('webp') if os.path.isfile(os.path.join('webp', f))]
    for f in webpfiles:
        try:
            if f[:f.index('.')] not in reservedfiles:
                os.remove(os.path.join('webp', f))
        except ValueError:
            os.remove(os.path.join('webp', f))


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
    deduplication(Manifest.keys())
    with open('manifest.json', 'w+') as json_file:
        json.dump(Manifest, json_file)
    with open('manifest_see.json', 'w+') as json_file_see:
        json.dump(Manifest, json_file_see, indent=2)


def main():
    gen_manifest_json()


if __name__ == '__main__':
    os.chdir(os.path.dirname(__file__))
    main()
    print('`manifest.json` saved. Press any key to quit.')
    quit()
