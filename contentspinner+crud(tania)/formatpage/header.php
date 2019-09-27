<!DOCTYPE html>
<html lang="en">
  <head>

    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    
    <title>Web-Studios Content Spinner </title>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css\style.css" />
  
  </head>

  <body>
    <div class="container-fluid">
        <div class="titre offset-3 col-7">
          <h1 class="ml1">
            <span class="text-wrapper">
            <span class="line line1"></span>
            <span class="letters">Web-Studios Content Spinner</span>
            <span class="line line2"></span>
            </span>
          </h1>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
          
          <script>
            // title animation
            var textWrapper = document.querySelector('.ml1 .letters');
            textWrapper.innerHTML = textWrapper.textContent.replace(/\S/g, "<span class='letter'>$&</span>");
            anime.timeline({
              loop: true
              })
            .add({
                  targets: '.ml1 .letter',
                  scale: [0.3,1],
                  opacity: [0,1],
                  translateZ: 0,
                  easing: "easeOutExpo",
                  duration: 600,
                  delay: (el, i) => 70 * (i+1)
              })
            .add({
                  targets: '.ml1 .line',
                  scaleX: [0,1],
                  opacity: [0.5,1],
                  easing: "easeOutExpo",
                  duration: 700,
                  offset: '-=875',
                  delay: (el, i, l) => 80 * (l - i)
              })
            .add({
                  targets: '.ml1',
                  opacity: 0,
                  duration: 1000,
                  easing: "easeOutExpo",
                  delay: 1000
              }); 
          </script>
        </div>
    </div>
  </body>
</html>
