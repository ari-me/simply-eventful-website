//Text Jumps and Becomes Visible When it comes to View in User's Screen
function checkForVisibility() {
  var paragraphs = document.querySelectorAll(".visible");
  paragraphs.forEach(function(visible) {
    if (isElementInViewport(visible)) {
      visible.classList.add("pVisible");
    } else {
      visible.classList.remove("pVisible");
    }
  });
}
function isElementInViewport(el) {
    var rect = el.getBoundingClientRect();
    return (
      rect.top >= 0 &&
      rect.left >= 0 &&
      rect.bottom <=
        (window.innerHeight || document.documentElement.clientHeight) &&
      rect.right <= (window.innerWidth || document.documentElement.clientWidth)
    );
}
if (window.addEventListener) {
    addEventListener("DOMContentLoaded", checkForVisibility, false);
    addEventListener("load", checkForVisibility, false);
    addEventListener("scroll", checkForVisibility, false);
}