document.addEventListener('click', function (e) {
  const select = e.target.closest('[data-select]');

  if (select && e.target.closest('[data-select-current]')) {
    select.classList.toggle('open');
    return;
  }

  if (select && e.target.closest('[data-select-item]')) {
    const item = e.target.closest('[data-select-item]');
    const value = select.querySelector('.select__value');

    const radio = item.querySelector('input[type="radio"]');
    if (radio) {
      const name = radio.name;
      if (name) {
        select.querySelectorAll(`input[type="radio"][name="${CSS.escape(name)}"]`)
          .forEach(r => r.checked = false);
      }
      radio.checked = true;
    }

    const customTextEl = item.querySelector('.custom-radio__text');
    const text = customTextEl
      ? customTextEl.textContent.trim()
      : (item.textContent || '').trim();

    if (value) {
      value.textContent = text;
    }

    select.querySelectorAll('[data-select-item]').forEach(el =>
      el.classList.remove('selected')
    );

    item.classList.add('selected');
    select.classList.remove('open');
    return;
  }

  document.querySelectorAll('[data-select].open').forEach(s => s.classList.remove('open'));
});

document.addEventListener("DOMContentLoaded", () => {
  const movableItems = document.querySelectorAll("[data-move-target]");

  if (!movableItems.length) return;

  const moveElements = () => {
    movableItems.forEach(item => {
      const targetSelector = item.dataset.moveTarget;
      const breakpoint = parseInt(item.dataset.moveBreak) || 700;
      const target = document.querySelector(targetSelector);
      const originalParent = item.parentNode;
      const originalNext = item.nextElementSibling;

      if (!target || !originalParent) return;

      if (window.innerWidth <= breakpoint) {
        if (!item.classList.contains("moved")) {
          target.insertAdjacentElement("afterend", item);
          item.classList.add("moved");
        }
      } else {
        if (item.classList.contains("moved")) {
          if (originalNext) {
            originalParent.insertBefore(item, originalNext);
          } else {
            originalParent.appendChild(item);
          }
          item.classList.remove("moved");
        }
      }
    });
  };

  moveElements();
  window.addEventListener("resize", moveElements);
});

document.addEventListener("DOMContentLoaded", function () {
  const header = document.querySelector("header");
  const headerHeight = header.offsetHeight;

  window.addEventListener("scroll", function () {
    if (window.scrollY > headerHeight) {
      header.classList.add("fixed");
    } else {
      header.classList.remove("fixed");
    }
  });
});



document.addEventListener("DOMContentLoaded", () => {
  const burger = document.querySelector(".burger");
  const navMenu = document.querySelector(".nav-wrapper");
  const overlay = document.querySelector(".overlay");
  const closeBtn = document.querySelector('.close-menu');

  if (burger && navMenu && overlay) {
    burger.addEventListener("click", () => {
      burger.classList.toggle("active");
      navMenu.classList.toggle("active");
      overlay.classList.toggle("active");
    });

    overlay.addEventListener("click", () => {
      burger.classList.remove("active");
      navMenu.classList.remove("active");
      overlay.classList.remove("active");
    });

    closeBtn.addEventListener("click", () => {
      burger.classList.remove("active");
      navMenu.classList.remove("active");
      overlay.classList.remove("active");
    });
  }
});

document.addEventListener("DOMContentLoaded", () => {
  const btn = document.querySelector(".filters-mobile__btn");
  const filters = document.querySelector(".filters-inner");

  if (!btn || !filters) return;

  btn.addEventListener("click", () => {
    filters.classList.toggle("open");
    btn.classList.toggle("open");
  });

});

class CatalogSlider {
  constructor(selector = ".catalog-images__slider") {
    this.selector = selector;
    this.instances = new Map(); 
    this.init();
  }

  init() {
    const sliders = document.querySelectorAll(this.selector);

    sliders.forEach((slider) => {
      if (this.instances.has(slider)) return;

      const splide = new Splide(slider, {
        type: "loop",
        perPage: 1,
        pagination: true,
        arrows: false,
        easing: 'ease',
        speed:600,
        drag:true,
      });

      splide.mount();
      this.instances.set(slider, splide);
    });
  }


  refresh() {
    this.init();
  }


  destroy() {
    this.instances.forEach((splide, slider) => {
      splide.destroy(true);
      this.instances.delete(slider);
    });
  }
}

document.addEventListener("DOMContentLoaded", () => {
  window.catalogSliders = new CatalogSlider();
});

//Хелпер для Насти

// когда карточки добавлены в DOM:
//window.catalogSliders.refresh();

// уничтожить
//window.catalogSliders.destroy();


const totalPages = 50;
let currentPage = 1;

function getVisiblePages(total, current) {
  const width = window.innerWidth;
  let visibleCount;

  if (width <= 600) visibleCount = 3;      // Мобилка: 1 2 3 ... 50
  else if (width <= 768) visibleCount = 5; // Планшет
  else visibleCount = 7;                  // Десктоп

  const pages = [];
  pages.push(1);

  let start = Math.max(2, current - Math.floor(visibleCount / 2));
  let end = Math.min(total - 1, current + Math.floor(visibleCount / 2));

  if (start <= 2) end = visibleCount;
  if (end >= total - 1) start = total - visibleCount + 1;

  start = Math.max(start, 2);
  end = Math.min(end, total - 1);

  if (start > 2) pages.push("...");
  for (let i = start; i <= end; i++) pages.push(i);
  if (end < total - 1) pages.push("...");
  pages.push(total);

  return pages;
}

function renderPagination() {
  const pagination = document.querySelector(".pagination");
  pagination.innerHTML = "";

  const pages = getVisiblePages(totalPages, currentPage);

  pages.forEach(p => {
    const li = document.createElement("li");
    const a = document.createElement("a");
    a.href = "javascript:void(0)";
    a.textContent = p;

    if (p === currentPage) a.classList.add("current");
    if (p === "...") a.classList.add("dots");

    a.addEventListener("click", () => {
      if (p !== "...") {
        currentPage = p;
        renderPagination();
      }
    });

    li.appendChild(a);
    pagination.appendChild(li);
  });
}

renderPagination();
window.addEventListener("resize", () => renderPagination());
