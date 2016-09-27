var slideShowSpeed =5000


var crossFadeDuration = 1 


var Pic = new Array() 

Pic[0] = 'images/Marina/Picture 005.jpg'
Pic[1] = 'images/Marina/Picture 007.jpg'
Pic[2] = 'images/Marina/Picture 008.jpg'
Pic[3] = 'images/Marina/Picture 009.jpg'
 
 
 

var t
var j = 0
var p = Pic.length

var preLoad = new Array()
for (i = 0; i < p; i++){
   preLoad[i] = new Image()
   preLoad[i].src = Pic[i]
}

function runSlideShow(){
   if (document.all){
      document.images.SlideShow.style.filter="blendTrans(duration=1)"
      document.images.SlideShow.style.filter="blendTrans(duration=crossFadeDuration)"
      document.images.SlideShow.filters.blendTrans.Apply()      
   }
   document.images.SlideShow.src = preLoad[j].src
   if (document.all){
      document.images.SlideShow.filters.blendTrans.Play()
   }
   j = j + 1
   if (j > (p-1)) j=0
   t = setTimeout('runSlideShow()', slideShowSpeed)
}

