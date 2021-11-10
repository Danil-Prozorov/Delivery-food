// Here i just made a simple slider
let slideIndex = 0;
slider();

function slider()
{
  let slides = Array.from(document.getElementsByClassName("slider__slides"));

  slides.forEach(slide => {
    slide.style.display = 'none';
  });

  slideIndex++;
  if(slideIndex > slides.length){
    slideIndex = 1;
  }
  if(slides.length != 0){
    slides[slideIndex-1].style.display = "block";
  }else{
    return false;
  }

  setTimeout(slider,5000);
}
