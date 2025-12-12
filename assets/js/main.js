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
        speed: 600,
        drag: true,
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

  if (width <= 600) visibleCount = 3;      
  else if (width <= 768) visibleCount = 5; 
  else visibleCount = 7;                  

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
  if (!pagination) return;
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




class ProductGallery {
  constructor(options) {
    this.mainSelector = options.mainSelector;       
    this.thumbsSelector = options.thumbsSelector;   
    this.prevButton = options.prevButton;           
    this.nextButton = options.nextButton;          
    this.showGalleryBtn = options.showGalleryBtn;   
    this.mainSplide = null;
    this.thumbsSplide = null;
    this.init();
  }

  init() {
    const mainEl = document.querySelector(this.mainSelector);
    const thumbsEl = document.querySelector(this.thumbsSelector);

    if (!mainEl || !thumbsEl) return;

 
    this.mainSplide = new Splide(mainEl, {
      type: 'slide',
      perPage: 1,
      pagination: true,
      arrows: false,
      rewind: true,
      gap: 10,
      easing: 'ease',
      speed: 600
    });

 
    this.thumbsSplide = new Splide(thumbsEl, {
      type: 'slide',
      direction: 'ttb',
      height: '694px',
      perPage: 3,
      gap: 10,
      pagination: false,
      arrows: false,
      focus: 'center',
      updateOnMove: true,
      drag: false,
      isNavigation: false,
      breakpoints: {
        1600: {
          destroy: true
        }
      }
    });


    this.mainSplide.sync(this.thumbsSplide);
    this.mainSplide.mount();
    this.thumbsSplide.mount();

  
    if (this.prevButton) this.prevButton.addEventListener('click', () => this.mainSplide.go('<'));
    if (this.nextButton) this.nextButton.addEventListener('click', () => this.mainSplide.go('>'));


    mainEl.querySelectorAll('.splide__slide a').forEach((link, index) => {
      link.addEventListener('click', (e) => {
        e.preventDefault();
        this.openGallery(index);
      });
    });

 
    thumbsEl.querySelectorAll('.splide__slide').forEach((thumb, index) => {
      thumb.addEventListener('click', (e) => {
        e.preventDefault();
        this.openGallery(index);
      });
    });


    if (this.showGalleryBtn) {
      this.showGalleryBtn.addEventListener('click', () => this.openGallery(0));
    }
  }

  openGallery(startIndex = 0) {
    const items = [...document.querySelectorAll(`${this.mainSelector} a[data-fancybox="product"]`)]
      .map(a => ({ src: a.href, type: 'image' }));

    Fancybox.show(items, { startIndex });
  }
}

// Пример инициализации для Насти
document.addEventListener('DOMContentLoaded', () => {
  const gallery = new ProductGallery({
    mainSelector: '#main-slider',
    thumbsSelector: '#thumbs-slider',
    prevButton: document.querySelector('.custom-detail__prev'),
    nextButton: document.querySelector('.custom-detail__next'),
    showGalleryBtn: document.querySelector('.show-gallery')
  });
});



class CustomSplide {
  constructor(options) {
    this.slider = options.slider;
    if (!this.slider) return; // Проверка

    this.perPage = options.perPage || 4;
    this.breakpoints = options.breakpoints || {};
    this.gap = options.gap || '20px';
    this.padding = options.padding || { right: 0 };
    this.autoplay = options.autoplay || false;
    this.splide = null;

    this.init();
  }

  init() {
    if (!this.slider || typeof Splide === 'undefined') return; // Проверка наличия через библиотеку

    this.splide = new Splide(this.slider, {
      type: 'slide',
      perPage: this.perPage,
      perMove: 1,
      gap: this.gap,
      pagination: false,
      arrows: false,
      padding: this.padding,
      breakpoints: this.breakpoints,
      autoplay: this.autoplay
    });

    this.splide.mount();
  }

  refresh() {
    if (this.splide?.refresh) this.splide.refresh();
  }

  goPrev() {
    if (this.splide?.go) this.splide.go('<');
  }

  goNext() {
    if (this.splide?.go) this.splide.go('>');
  }

  updateArrows(prevButton, nextButton) {
    if (!this.splide || !prevButton || !nextButton) return;
    prevButton.disabled = this.splide.index === 0;
    nextButton.disabled = this.splide.index >= this.splide.length - this.splide.options.perPage;
  }
}

class Tabs {
  constructor(options) {
    this.tabSelector = options.tabSelector;
    this.contentSelector = options.contentSelector;
    this.activeClass = options.activeClass || 'active';
    this.sliderOptions = options.sliderOptions || {};


    this.prevButton = document.querySelector(this.sliderOptions.prevSelector ?? null);
    this.nextButton = document.querySelector(this.sliderOptions.nextSelector ?? null);

    this.sliders = {};
    this.activeSlider = null;

    this.init();
  }

  init() {
    this.tabs = document.querySelectorAll(this.tabSelector);
    this.contents = document.querySelectorAll(this.contentSelector);

    if (!this.tabs.length || !this.contents.length) return; 

    this.tabs.forEach(tab => {
      tab.addEventListener('click', () => this.onTabClick(tab));
    });


    if (this.prevButton) {
      this.prevButton.addEventListener('click', () => {
        this.activeSlider?.goPrev();
        this.updateArrowState();
      });
    }

    if (this.nextButton) {
      this.nextButton.addEventListener('click', () => {
        this.activeSlider?.goNext();
        this.updateArrowState();
      });
    }

    const activeTab =
      Array.from(this.tabs).find(t => t.classList.contains(this.activeClass)) ||
      this.tabs[0];

    if (activeTab) this.onTabClick(activeTab);
  }

  onTabClick(tab) {
    const target = tab.dataset.tab;
    if (!target) return; 

    this.tabs.forEach(t => t.classList.remove(this.activeClass));
    tab.classList.add(this.activeClass);

    this.contents.forEach(c => {
      const isTarget = c.dataset.tab === target;

      c.style.display = isTarget ? '' : 'none';

      if (isTarget) {
        const sliderElement = c.querySelector(this.sliderOptions.sliderSelector);
        if (sliderElement && !this.sliders[target]) {
          this.sliders[target] = new CustomSplide({
            slider: sliderElement,
            perPage: this.sliderOptions.perPage,
            breakpoints: this.sliderOptions.breakpoints,
            gap: this.sliderOptions.gap,
            padding: this.sliderOptions.padding,
            autoplay: this.sliderOptions.autoplay
          });
        } else if (this.sliders[target]) {
          this.sliders[target].refresh();
        }

        this.activeSlider = this.sliders[target];
        this.updateArrowState();
      }
    });
  }

  updateArrowState() {
    if (this.activeSlider && this.prevButton && this.nextButton) {
      this.activeSlider.updateArrows(this.prevButton, this.nextButton);
    }
  }
}


// Инициализация для Насти
document.addEventListener('DOMContentLoaded', () => {
  const tabsExist = document.querySelector('.tab-content__similar-link');

  if (!tabsExist) return; 

  new Tabs({
    tabSelector: '.tab-content__similar-link',
    contentSelector: '.tab-content__similar-content',
    activeClass: 'active',
    sliderOptions: {
      sliderSelector: '.similar-slider',
      prevSelector: '.similar-arrow__prev',
      nextSelector: '.similar-arrow__next',
      perPage: 4,
      breakpoints: {
        1024: { perPage: 2 },
        700: { gap: '4px', right: 10 }
      },
      gap: '20px',
      padding: { right: 25 },
      autoplay: false
    }
  });
});

document.addEventListener("DOMContentLoaded", () => {
  const buttons = document.querySelectorAll(".detail-product_sm-price__currency");
  const curPrice = document.querySelector(".detail-product_sm-price__num-cur");
  const oldPrice = document.querySelector(".detail-product_sm-price__num-old");

  if (!buttons.length || !curPrice || !oldPrice) return;

  const formatNumber = (num) =>
    num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ");

  const symbols = {
    rub: "₽",
    usd: "$",
    eur: "€",
  };

  buttons.forEach(btn => {
    btn.addEventListener("click", () => {
      const currency = btn.dataset.currency;

      buttons.forEach(b => b.classList.remove("active"));
      btn.classList.add("active");

      const cur = curPrice.dataset[`price${currency.charAt(0).toUpperCase() + currency.slice(1)}`];
      const old = oldPrice.dataset[`price${currency.charAt(0).toUpperCase() + currency.slice(1)}`];

      curPrice.innerHTML = `${formatNumber(cur)} ${symbols[currency]}`;
      oldPrice.innerHTML = `${formatNumber(old)} ${symbols[currency]}/м²`;
    });
  });
});


