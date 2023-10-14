function myapp() {
    const buttons = document.querySelectorAll(".button");
    const cards = document.querySelectorAll(".game-card");
  
    function filter(category, items) {
      items.forEach((item) => {
        const isItemFiltered = !item.classList.contains(category);
        const isShowAll = category.toLowerCase() === "all";
        if (isItemFiltered && !isShowAll) {
          item.classList.add("hide");
        } else {
          item.classList.remove("hide");
          item.classList.add("anime");
          setTimeout(() => {
          item.classList.remove("anime");
          }, 500); // Задержка равная времени анимации (0.5 секунды)
        }
      });
    }
  
      buttons.forEach((button) => {
      button.addEventListener("click", () => {
        const currentCategory = button.dataset.filter;
        filter(currentCategory, cards);
      });
    });
  }

myapp();