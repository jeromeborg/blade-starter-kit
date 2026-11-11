/**
 * Appearance (light / dark / system)
 *
 * The <html> element receives the `dark` class as early as possible via the
 * inline script in resources/views/partials/head.blade.php so pages never
 * flash. This module keeps the class in sync when the user changes the
 * preference or when the OS color scheme changes.
 */
const APPEARANCE_KEY = 'appearance';
const mediaQuery = window.matchMedia('(prefers-color-scheme: dark)');

function currentAppearance() {
    return localStorage.getItem(APPEARANCE_KEY) || 'system';
}

function applyAppearance(appearance) {
    const isDark = appearance === 'dark' || (appearance === 'system' && mediaQuery.matches);

    document.documentElement.classList.toggle('dark', isDark);

    document.querySelectorAll('[data-appearance]').forEach((button) => {
        const isActive = button.dataset.appearance === appearance;

        button.setAttribute('aria-pressed', isActive ? 'true' : 'false');
    });
}

document.querySelectorAll('[data-appearance]').forEach((button) => {
    button.addEventListener('click', () => {
        localStorage.setItem(APPEARANCE_KEY, button.dataset.appearance);
        applyAppearance(button.dataset.appearance);
    });
});

mediaQuery.addEventListener('change', () => applyAppearance(currentAppearance()));

applyAppearance(currentAppearance());

/**
 * Dropdowns
 *
 * <div data-dropdown>
 *     <button data-dropdown-trigger>…</button>
 *     <div data-dropdown-menu hidden>…</div>
 * </div>
 */
function closeAllDropdowns(except = null) {
    document.querySelectorAll('[data-dropdown]').forEach((dropdown) => {
        if (dropdown === except) {
            return;
        }

        dropdown.querySelector('[data-dropdown-menu]')?.setAttribute('hidden', '');
        dropdown.querySelector('[data-dropdown-trigger]')?.setAttribute('aria-expanded', 'false');
    });
}

document.querySelectorAll('[data-dropdown]').forEach((dropdown) => {
    const trigger = dropdown.querySelector('[data-dropdown-trigger]');
    const menu = dropdown.querySelector('[data-dropdown-menu]');

    if (!trigger || !menu) {
        return;
    }

    trigger.addEventListener('click', (event) => {
        event.stopPropagation();

        const willOpen = menu.hasAttribute('hidden');

        closeAllDropdowns(dropdown);

        menu.toggleAttribute('hidden', !willOpen);
        trigger.setAttribute('aria-expanded', willOpen ? 'true' : 'false');
    });
});

document.addEventListener('click', () => closeAllDropdowns());
document.addEventListener('keydown', (event) => {
    if (event.key === 'Escape') {
        closeAllDropdowns();
    }
});

/**
 * Generic toggles, used by the responsive navigation menu.
 *
 * <button data-toggle="#target">…</button>
 */
document.querySelectorAll('[data-toggle]').forEach((button) => {
    const target = document.querySelector(button.dataset.toggle);

    if (!target) {
        return;
    }

    button.addEventListener('click', () => {
        const willOpen = target.hasAttribute('hidden');

        target.toggleAttribute('hidden', !willOpen);
        button.setAttribute('aria-expanded', willOpen ? 'true' : 'false');
    });
});

/**
 * Native <dialog> modals.
 *
 * <button data-dialog-open="#dialog-id">…</button>
 * <dialog id="dialog-id"> … <button data-dialog-close>…</button> </dialog>
 */
document.querySelectorAll('[data-dialog-open]').forEach((button) => {
    const dialog = document.querySelector(button.dataset.dialogOpen);

    if (!dialog) {
        return;
    }

    button.addEventListener('click', () => dialog.showModal());
});

document.querySelectorAll('dialog').forEach((dialog) => {
    dialog.querySelectorAll('[data-dialog-close]').forEach((button) => {
        button.addEventListener('click', () => dialog.close());
    });

    // Close when the backdrop (the dialog element itself) is clicked.
    dialog.addEventListener('click', (event) => {
        if (event.target === dialog) {
            dialog.close();
        }
    });

    // Re-open dialogs that should stay visible after a failed form submission.
    if (dialog.dataset.open === 'true') {
        dialog.showModal();
    }
});
