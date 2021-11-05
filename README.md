# Codeigniter-3-Image-Resize-Crop-Controller
Resizing images with a simple Controller

## Installation
Just copy Image.php into your application's controllers directory.

## Usage
You can use `http://www.yoursite.com/image/resize` url to resize your image with query strings.
src: your file url relative to assets folder in your Codeigniter installations root folder (FCPATH)
w: width of your resized image
h: height of your resized image

### Example:
Your file: `http://www.yoursite.com/assets/folder/another-folder/myimage.jpg`

Resize this image W:320px and H:240px

Resize URL: `http://www.yoursite.com/image/resize?src=folder/another-folder/myimage.jpg&w=320&h=240`

Usage: `<img src="http://www.yoursite.com/image/resize?src=folder/another-folder/myimage.jpg&w=320&h=240">`

This will cache your file into `http://www.yoursite.com/assets/folder/another-folder/thumb/thumb_320_240_myimage.jpg` and displays it.

if you want to change assets path change this line: `public $assets_path = 'assets';`

---

So if you like my works feel free to buy me a coffee: https://www.patreon.com/mrtakdnz

![Stats Counter](https://webfikirleri.com/counter?url=https://github.com/WebFikirleri/Codeigniter-3-Image-Resize-Crop-Controller)
