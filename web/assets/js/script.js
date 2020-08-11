const video = document.getElementById('video')


Promise.all([
  faceapi.nets.tinyFaceDetector.loadFromUri('models'),
  
  faceapi.nets.faceRecognitionNet.loadFromUri('models'),
  faceapi.nets.faceExpressionNet.loadFromUri('models')
]).then(startVideo)



function startVideo() {
  navigator.getUserMedia(
    { video: {} },
    stream => video.srcObject = stream,
    err => console.error(err)
  )
}


video.addEventListener('play', () => {
  const canvas = faceapi.createCanvasFromMedia(video)
  document.body.append(canvas)
  const displaySize = { width: video.width, height: video.height }
  faceapi.matchDimensions(canvas, displaySize)
  setInterval(async () => {
    const detections = await faceapi.detectAllFaces(video, new faceapi.TinyFaceDetectorOptions()).withFaceExpressions()
    const resizedDetections = faceapi.resizeResults(detections, displaySize)
    canvas.getContext('2d').clearRect(0, 0, canvas.width, canvas.height)
    var emotion = resizedDetections[0];
    
    
    

   const labels = Object.keys(emotion.expressions);

  
  const values = Object.values(emotion.expressions);
  var temp;  var temp2;
  var j;
  var i;
  for(i=0;i<7;i++)
  {
    for(j=i+1;j<7;j++)
    {
        if(values[i]>values[j])
        {
           temp = values[i];
           values[i] = values[j];
           values[j] = temp;

           temp2 = labels[i];
           labels[i] = labels[j];
           labels[j] = temp2;



        }
    }
  }


if (count==20)
  {
 var temp4; var temp5;

arr1.push("angry", "disgusted","fearful","happy","neutral","sad");
arr2.push(angercount, disgustedcount,fearfulcount,happycount,neutralcount,sadcount);
 for(i=0;i<7;i++)
  {
    for(j=i+1;j<7;j++)
    {
        if(arr2[i]<arr2[j])
        {
           temp4 = arr2[i];
           arr2[i] = arr2[j];
           arr2[j] = temp4;

           temp5 = arr1[i];
           arr1[i] = arr1[j];
           arr1[j] = temp5;



        }
    }
  }

  console.log(arr2[0]);
  console.log(arr1[0]);
  console.log("Hela aaau Gote khushi aau");

  var w= arr1[0];

  if (w=="angry")
  {
    
         $(".audio_tra").attr("src", "One Step Closer (Official Video) - Linkin Park.mp3");
        $(".sound_t").trigger('load');
        $(".sound_t").trigger('play');
        console.log("Coming");
  }
  else if(w=="disgusted")
  {
    
          $(".audio_tra").attr("src", "Sunn Raha Hai.mp3");
        $(".sound_t").trigger('load');
        $(".sound_t").trigger('play');
        console.log("Coming");

  }
  else if(w=="fearful")
  {
   
          $(".audio_tra").attr("src", "Michael Jackson - Thriller.mp3");
        $(".sound_t").trigger('load');
        $(".sound_t").trigger('play');
        console.log("Coming");
  }
  else if(w=="happy")
  {

        $(".audio_tra").attr("src", "Coca_cola.mp3");
        $(".sound_t").trigger('load');
        $(".sound_t").trigger('play');
        console.log("Coming");



  }
  else if(w=="neutral")
  {
   
        $(".audio_tra").attr("src", "Dheeme.mp3");
        $(".sound_t").trigger('load');
        $(".sound_t").trigger('play');
        console.log("Coming");
        // console.log;
  }
  
  else 
  {
  
       $(".audio_tra").attr("src", "Godzilla (feat. Juice WRLD) [Official Audio].mp3");
        $(".sound_t").trigger('load');
        $(".sound_t").trigger('play');
        console.log("Coming");
  }

  while(arr2.length > 0)
  {
    arr2.pop();
    arr1.pop();
}




  }

const x = labels[6];
console.log(counter());
console.log(labels[6]);
console.log(values[6]);

console.log(emotioncounter(x));



    
  }, 400)
})

var count = 0; 
var angercount = 0;
var disgustedcount = 0;
var fearfulcount = 0;
var happycount = 0;
var neutralcount = 0;
var sadcount = 0;
var arr2=[];
var arr1=[];


function counter()
{
  if (count==20)
  {
     count = -100 ;
    
     angercount = 0;
     disgustedcount = 0;
     fearfulcount = 0;
     happycount = 0;
     neutralcount = 0;
     sadcount = 0;
  }
  count = count+1; 
  return count ;

}

function emotioncounter(y)
{

  
  if (y=="angry")
  {
    angercount = angercount+1;
    return angercount ; 
  }
  else if(y=="disgusted")
  {
    disgustedcount = disgustedcount+1;
    return disgustedcount ;

  }
  else if(y=="fearful")
  {
    fearfulcount = fearfulcount+1;
    return fearfulcount;
  }
  else if(y=="happy")
  {
    happycount = happycount+1;
    return happycount ;

  }
  else if(y=="neutral")
  {
    neutralcount = neutralcount+1;
    return neutralcount ;

  }
  
  else 
  {
   sadcount =sadcount+1;
   return sadcount;
  }
  

  
}

