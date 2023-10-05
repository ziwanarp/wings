const progress = document.getElementById("progress");
  const prev = document.getElementById("prev");
  const next = document.getElementById("next");
  const submit = document.getElementById("submit");
  const circles = document.querySelectorAll(".circle");
  const forms = document.querySelectorAll("form");

  let currentActive = 1;

  next.addEventListener("click", () => {
    currentActive++;
    if (currentActive > circles.length) currentActive = circles.length;
    update();
  });

  prev.addEventListener("click", () => {
    currentActive--;
    if (currentActive < 1) currentActive = 1;
    update();
  });

  const update = () => {
    circles.forEach((circle, index) => {
      if (index < currentActive) circle.classList.add("active");
      else circle.classList.remove("active");
    });

    forms.forEach((form, index) => {
      if (index + 1 === currentActive) form.style.display = "block";
      else form.style.display = "none";
    });

    const actives = document.querySelectorAll(".active");
    progress.style.width = ((actives.length - 1) / (circles.length - 1)) * 100 + "%";

    if (currentActive === 1) {
        next.style.display = "block";
        prev.style.display = "none";
    } else if (currentActive === circles.length) {
        prev.disabled = false;
        submit.style.display = "block";
        next.style.display = "none";
    } else {
        next.style.display = "block";
        prev.style.display = "block";
        submit.style.display = "none";
    }
  };

  // Initial update to show the first step
  update();
