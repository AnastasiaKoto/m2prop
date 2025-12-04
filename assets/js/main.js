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