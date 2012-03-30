// limit an image widht/height without distorting it
// usage: <img src=bla.gif onLoad='limitImageWH(this,150,50);'> if you want to limit the image to max of 150x50
// liecense: cc-no-by (it means it can be used for anything, anywhere, can be changed, with no limitations except for keeping using the same liecense for this code or variations of it) 
// do not use "tries" parameter, it is only to prevent infinite setTimeout calls when an image is never loaded

// License: GPLv3
// http://softov.org/webdevtools

function limitImageWH(img1,maxw,maxh,tries){
	var rw,rh,w,h,hw,i,dd,img;

	// get out in case of no limitations
	if (maxw=='' && maxh=='') return;

	// two bugs in explorer 6.0:
	// 1. this script executes before the image is fully loaded.
	// 2. the img.complete flag is not set on IMG tags image objects.

	img=new Image();
	img.src=img1.src;

	// this is to fix an IE bug: sometimes IE executes this script before the image is fully loaded or before h/w are set
	// that's so MS thing to do - the three staged binary: True False and Maybe...
	// image is not fully loaded yet - try again later
	if (img.complete==0 || img.width==0 || img.height==0) {
		if (tries>1000) {
			// after a thousand tries (20 seconds), just give up.
		} else {
			setTimeout(function(){limitImageWH(img1,maxw,maxh,tries+1);},20);
		}
	} else {
		rw=img.width;
		rh=img.height;

		if (rh==0 || rw==0){ // image is still not loaded
			// alert(img.src+' rw='+rw+' rh='+rh); // for debug
			if (maxh!='' && maxh<999) img.height=maxh;
			if (maxw!='' && maxw<999) img.width=maxw;

		}else{ // all ok - start the normal method

			if (maxw=='') maxw=9999; // no limit
			if (maxh=='') maxh=9999; // no limit
			hw = rh/rw;  // height/width
			h=rh;        // height
			w=rw;        // width
			if (h>maxh){ // limit height?
				h=maxh;
				w=h/hw;
			}
			if (w>maxw){ // limit width?
				w=maxw;
				h=w*hw;
			}
			img.width=w;
			img.height=h;
			img1.width=w;
			img1.height=h;
		}
	}
}

