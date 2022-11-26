
const fromSlider = document.querySelector('#fromSlider');
const toSlider = document.querySelector('#toSlider');
const fromInput = document.getElementById('fromInput');
const toInput = document.getElementById('toInput');
var bubbleflag = 1;

function controlFromSlider(fromSlider, toSlider, fromInput) {
  const [from, to] = getParsed(fromSlider, toSlider);
  fillSlider(fromSlider, toSlider, '#C6C6C6', '#00BFB4', toSlider);
  fromInput.style.visibility = "visible";
  if (from > to) {
    fromSlider.value = to;
    fromInput.innerHTML = to;
    bubbleflag = 0;
  } else {
    fromInput.innerHTML = from;
    bubbleflag = 1;
  }
}

function controlToSlider(fromSlider, toSlider, toInput) {
  const [from, to] = getParsed(fromSlider, toSlider);
  fillSlider(fromSlider, toSlider, '#C6C6C6', '#00BFB4', toSlider);
  setToggleAccessible(toSlider);
  toInput.style.visibility = "visible";
  if (from <= to) {
    toSlider.value = to;
    toInput.innerHTML = to;
    bubbleflag = 1;
  } else {
    bubbleflag = 0;
    toInput.innerHTML = from;
    toSlider.value = from;
  }
}

function getParsed(currentFrom, currentTo) {
  const from = parseInt(currentFrom.value, 10);
  const to = parseInt(currentTo.value, 10);
  return [from, to];
}

function fillSlider(from, to, sliderColor, rangeColor, controlSlider) {
    const rangeDistance = to.max-to.min;
    const fromPosition = from.value - to.min;
    const toPosition = to.value - to.min;
    controlSlider.style.background = `linear-gradient(
      to right,
      ${sliderColor} 0%,
      ${sliderColor} ${(fromPosition)/(rangeDistance)*100}%,
      ${rangeColor} ${((fromPosition)/(rangeDistance))*100}%,
      ${rangeColor} ${(toPosition)/(rangeDistance)*100}%, 
      ${sliderColor} ${(toPosition)/(rangeDistance)*100}%, 
      ${sliderColor} 100%)`;

      if(bubbleflag == 1){
        toInput.style.left = `calc(${toPosition}% + (${15 + toPosition * 1.08}px))`;
        fromInput.style.left = `calc(${fromPosition}% + (${33 + fromPosition * 1.08}px))`;
      }
    
    
}

function setToggleAccessible(currentTarget) {
  const toSlider = document.querySelector('#toSlider');
  if (Number(currentTarget.value) <= 0 ) {
    toSlider.style.zIndex = 2;
  } else {
    toSlider.style.zIndex = 0;
  }
}


fillSlider(fromSlider, toSlider, '#C6C6C6', '#25daa5', toSlider);
setToggleAccessible(toSlider);

fromSlider.oninput = () => controlFromSlider(fromSlider, toSlider, fromInput);
toSlider.oninput = () => controlToSlider(fromSlider, toSlider, toInput);