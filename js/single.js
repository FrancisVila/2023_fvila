jQuery(document).ready(function($) {
  // Code that uses jQuery's $ can follow here.



let touchstartX = 0
let touchendX = 0
const next = document.getElementById("nextUrl").value; 
const prev = document.getElementById("prevUrl").value; 
console.log("prev 111111111111111", prev)
function checkDirection() {
  touchDistance = Math.abs(touchendX - touchstartX)
  if (touchendX < touchstartX && touchDistance > 100) {
    window.location = prev;
  }
  if (touchendX > touchstartX && touchDistance > 100) {
    window.location = next;
  }
}

document.addEventListener('touchstart', e => {
  touchstartX = e.changedTouches[0].screenX
})

document.addEventListener('touchend', e => {
  touchendX = e.changedTouches[0].screenX
  checkDirection()
})




});
