document.addEventListener('click', function (e) {
    const select = e.target.closest('[data-select]');

    // Открыть селект
    if (select && e.target.closest('[data-select-current]')) {
        select.classList.toggle('open');
        return;
    }

    // Клик по пункту
    if (select && e.target.closest('[data-select-item]')) {
        const item = e.target.closest('[data-select-item]');
        const value = select.querySelector('.select__value');

        // Находим радио в пункте (если есть) и ставим checked
        const radio = item.querySelector('input[type="radio"]');
        if (radio) {
            // если радио принадлежат одной группе, можно дополнительно снять checked у других:
            const name = radio.name;
            if (name) {
                // снять checked у всех радиокнопок с таким name внутри этого select
                select.querySelectorAll(`input[type="radio"][name="${CSS.escape(name)}"]`)
                    .forEach(r => r.checked = false);
            }
            radio.checked = true;
        }

        // Берём текст для отображения в current:
        const customTextEl = item.querySelector('.custom-radio__text');
        const text = customTextEl
            ? customTextEl.textContent.trim()
            : (item.textContent || '').trim();

        // Пишем текст в current
        if (value) {
            value.textContent = text;
        }

        // Снимаем selected со всех
        select.querySelectorAll('[data-select-item]').forEach(el =>
            el.classList.remove('selected')
        );

        // Добавляем selected выбранному
        item.classList.add('selected');

        // Закрываем селект
        select.classList.remove('open');
        return;
    }

    // Клик вне — закрыть все селекты
    document.querySelectorAll('[data-select].open').forEach(s => s.classList.remove('open'));
});
