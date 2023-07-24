let landing = document.getElementById("landing");
landing.addEventListener("mousemove", parallax);

function parallax(e) {
  document.querySelectorAll('.layer').forEach(layer => {
    const speed = layer.getAttribute('data-speed');
    const x = (window.innerWidth - e.pageX * speed) / 100;
    const y = (window.innerHeight - e.pageY * speed) / 100;
    layer.style.transform = `translateX(${x}px) translateY(${y}px)`;
  });
}



let btn = document.getElementById("top");

window.addEventListener("scroll", function () {
  if (this.window.scrollY > 150) {
    btn.classList.add("show");
    btn.addEventListener("click", function () {
      window.scrollTo(0, 0);
    });
  } else {
    btn.classList.remove("show");
  }
});


