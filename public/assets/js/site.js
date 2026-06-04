const navButton = document.querySelector(".menu-toggle");
const primaryNav = document.querySelector(".primary-nav");
const navOverlay = document.querySelector("[data-nav-overlay]");
const navCloseButton = document.querySelector("[data-menu-close]");
const siteHeader = document.querySelector(".site-header");
const megaMenus = [...document.querySelectorAll(".mega-menu")];
const desktopNavigationQuery = window.matchMedia("(min-width: 981px)");

function isDesktopNavigation() {
  return desktopNavigationQuery.matches;
}

function syncMobileNavigationOffset() {
  const headerBottom = siteHeader ? siteHeader.getBoundingClientRect().bottom : 0;
  document.documentElement.style.setProperty("--mobile-nav-top", `${Math.max(Math.round(headerBottom), 0)}px`);
}

function closeMegaMenus() {
  megaMenus.forEach((menu) => {
    const panel = menu.querySelector(".mega-panel");
    menu.open = false;

    if (panel) {
      panel.style.removeProperty("--mega-panel-top");
    }
  });
}

function setMainNavigationState(open) {
  if (navButton) {
    navButton.setAttribute("aria-expanded", String(open));
    navButton.setAttribute("aria-label", open ? "Close menu" : "Open menu");
  }

  if (primaryNav) {
    primaryNav.classList.toggle("is-open", open);
  }

  if (document.body) {
    document.body.classList.toggle("nav-open", open);
  }

  if (navOverlay) {
    navOverlay.hidden = !open;
  }
}

function syncMegaMenuPositions() {
  syncMobileNavigationOffset();

  if (!isDesktopNavigation()) {
    megaMenus.forEach((menu) => {
      const panel = menu.querySelector(".mega-panel");

      if (panel) {
        panel.style.removeProperty("--mega-panel-top");
      }
    });

    return;
  }

  const headerBottom = siteHeader ? siteHeader.getBoundingClientRect().bottom : 0;
  const panelTop = Math.max(Math.round(headerBottom + 12), 92);

  megaMenus.forEach((menu) => {
    if (!menu.open) {
      return;
    }

    const panel = menu.querySelector(".mega-panel");
    if (panel) {
      panel.style.setProperty("--mega-panel-top", `${panelTop}px`);
    }
  });
}

function closeMainNavigation() {
  setMainNavigationState(false);
  closeMegaMenus();
}

if (navButton && primaryNav) {
  navButton.addEventListener("click", () => {
    syncMobileNavigationOffset();
    const open = !primaryNav.classList.contains("is-open");
    setMainNavigationState(open);

    if (!open) {
      closeMegaMenus();
    }
  });
}

if (navCloseButton) {
  navCloseButton.addEventListener("click", () => {
    closeMainNavigation();
    navButton?.focus();
  });
}

if (navOverlay) {
  navOverlay.addEventListener("click", () => {
    closeMainNavigation();
    navButton?.focus();
  });
}

megaMenus.forEach((menu) => {
  menu.addEventListener("toggle", () => {
    if (!menu.open) {
      const panel = menu.querySelector(".mega-panel");

      if (panel) {
        panel.style.removeProperty("--mega-panel-top");
      }

      return;
    }

    megaMenus.forEach((otherMenu) => {
      if (otherMenu !== menu) {
        otherMenu.open = false;
        const otherPanel = otherMenu.querySelector(".mega-panel");
        if (otherPanel) {
          otherPanel.style.removeProperty("--mega-panel-top");
        }
      }
    });

    if (isDesktopNavigation()) {
      syncMegaMenuPositions();
    }
  });
});

if (primaryNav) {
  primaryNav.addEventListener("click", (event) => {
    const link = event.target.closest("a");

    if (!link) {
      return;
    }

    window.setTimeout(() => {
      closeMainNavigation();
    }, 0);
  });
}

window.addEventListener("pagehide", closeMainNavigation);
window.addEventListener("beforeunload", closeMainNavigation);

document.addEventListener("click", (event) => {
  if (!isDesktopNavigation()) {
    return;
  }

  if (event.target.closest(".primary-nav")) {
    return;
  }

  closeMegaMenus();
});

document.addEventListener("keydown", (event) => {
  if (event.key !== "Escape") {
    return;
  }

  if (document.body.classList.contains("nav-open")) {
    closeMainNavigation();
    navButton?.focus();
    return;
  }

  if (isDesktopNavigation()) {
    closeMegaMenus();
  }
});

window.addEventListener("resize", () => {
  syncMegaMenuPositions();

  if (isDesktopNavigation()) {
    setMainNavigationState(false);
  }
});
window.addEventListener("scroll", syncMegaMenuPositions, { passive: true });
window.addEventListener("pageshow", (event) => {
  if (event.persisted) {
    closeMainNavigation();
  }
});
window.addEventListener("load", () => {
  syncMobileNavigationOffset();
  syncMegaMenuPositions();
});

function openPopupWindow(link) {
  const href = link.getAttribute("href");

  if (!href) {
    return null;
  }

  const width = Number.parseInt(link.dataset.popupWidth ?? "900", 10);
  const height = Number.parseInt(link.dataset.popupHeight ?? "760", 10);
  const popupName = link.dataset.popupName ?? "apes-booking-popup";
  const screenLeft = window.screenLeft ?? window.screenX ?? 0;
  const screenTop = window.screenTop ?? window.screenY ?? 0;
  const outerWidth = window.outerWidth ?? document.documentElement.clientWidth ?? width;
  const outerHeight = window.outerHeight ?? document.documentElement.clientHeight ?? height;
  const left = Math.max(screenLeft + Math.round((outerWidth - width) / 2), 0);
  const top = Math.max(screenTop + Math.round((outerHeight - height) / 2), 0);
  const features = [
    `width=${width}`,
    `height=${height}`,
    `left=${left}`,
    `top=${top}`,
    "resizable=yes",
    "scrollbars=yes",
    "noopener=yes",
    "noreferrer=yes",
  ].join(",");

  return window.open(href, popupName, features);
}

document.addEventListener("click", (event) => {
  const popupLink = event.target.closest("[data-popup-link]");

  if (!popupLink) {
    return;
  }

  if (event.defaultPrevented || event.button !== 0 || event.metaKey || event.ctrlKey || event.shiftKey || event.altKey) {
    return;
  }

  const popupWindow = openPopupWindow(popupLink);

  if (!popupWindow) {
    return;
  }

  event.preventDefault();
  popupWindow.focus();
});

const developmentPopup = document.querySelector("[data-development-popup]");
const developmentPopupDialog = developmentPopup?.querySelector("[data-development-popup-dialog]") ?? null;
const developmentPopupCloseButtons = [...document.querySelectorAll("[data-development-popup-close]")];
const liveChatButtons = [...document.querySelectorAll("[data-live-chat-open]")];
const developmentPopupSessionKey = developmentPopup?.dataset.sessionKey ?? "apesDevelopmentNoticeDismissed";
let developmentPopupLastFocused = null;

function openChatwootWidget() {
  const chatwootApi = window.$chatwoot;

  if (!chatwootApi) {
    return false;
  }

  if (typeof chatwootApi.toggle === "function") {
    chatwootApi.toggle("open");
    return true;
  }

  if (typeof chatwootApi.open === "function") {
    chatwootApi.open();
    return true;
  }

  return false;
}

function getDevelopmentPopupFocusableElements() {
  if (!developmentPopupDialog) {
    return [];
  }

  return [...developmentPopupDialog.querySelectorAll(
    'a[href], button:not([disabled]), textarea, input, select, [tabindex]:not([tabindex="-1"])',
  )].filter((element) => !element.hasAttribute("hidden"));
}

function closeDevelopmentPopup({ persist = true } = {}) {
  if (!developmentPopup) {
    return;
  }

  developmentPopup.hidden = true;
  document.body.style.removeProperty("overflow");

  if (persist) {
    try {
      sessionStorage.setItem(developmentPopupSessionKey, "true");
    } catch {
      // Ignore storage errors and continue with dismissal for this page view.
    }
  }

  if (developmentPopupLastFocused instanceof HTMLElement) {
    developmentPopupLastFocused.focus();
  }
}

function openDevelopmentPopup() {
  if (!developmentPopup || !developmentPopupDialog) {
    return;
  }

  developmentPopupLastFocused = document.activeElement instanceof HTMLElement ? document.activeElement : null;
  developmentPopup.hidden = false;
  document.body.style.overflow = "hidden";

  const firstFocusable = getDevelopmentPopupFocusableElements()[0] ?? developmentPopupDialog;
  firstFocusable.focus();
}

function shouldOpenDevelopmentPopup() {
  if (!developmentPopup) {
    return false;
  }

  try {
    return sessionStorage.getItem(developmentPopupSessionKey) !== "true";
  } catch {
    return true;
  }
}

liveChatButtons.forEach((button) => {
  button.addEventListener("click", (event) => {
    if (openChatwootWidget()) {
      event.preventDefault();
      closeDevelopmentPopup();
    }
  });
});

developmentPopupCloseButtons.forEach((button) => {
  button.addEventListener("click", () => {
    closeDevelopmentPopup();
  });
});

if (developmentPopupDialog) {
  developmentPopupDialog.addEventListener("keydown", (event) => {
    if (event.key === "Escape") {
      event.preventDefault();
      closeDevelopmentPopup();
      return;
    }

    if (event.key !== "Tab") {
      return;
    }

    const focusableElements = getDevelopmentPopupFocusableElements();

    if (!focusableElements.length) {
      event.preventDefault();
      developmentPopupDialog.focus();
      return;
    }

    const firstFocusable = focusableElements[0];
    const lastFocusable = focusableElements[focusableElements.length - 1];

    if (event.shiftKey && document.activeElement === firstFocusable) {
      event.preventDefault();
      lastFocusable.focus();
    } else if (!event.shiftKey && document.activeElement === lastFocusable) {
      event.preventDefault();
      firstFocusable.focus();
    }
  });
}

window.addEventListener("load", () => {
  if (shouldOpenDevelopmentPopup()) {
    openDevelopmentPopup();
  }
});

const releaseCards = [...document.querySelectorAll("[data-release-card]")];
const releaseSearch = document.querySelector("[data-release-search]");
const filterButtons = [...document.querySelectorAll("[data-release-filter]")];
const expandAllButton = document.querySelector("[data-expand-all]");
const collapseAllButton = document.querySelector("[data-collapse-all]");

function filterReleaseCards() {
  if (!releaseCards.length) {
    return;
  }

  const activeFilter =
    document.querySelector("[data-release-filter].is-active")?.dataset.releaseFilter ?? "all";
  const searchValue = releaseSearch ? releaseSearch.value.trim().toLowerCase() : "";

  releaseCards.forEach((card) => {
    const tags = (card.dataset.tags ?? "").toLowerCase();
    const text = card.textContent.toLowerCase();
    const matchesFilter = activeFilter === "all" || tags.includes(activeFilter);
    const matchesSearch = searchValue === "" || text.includes(searchValue);
    card.hidden = !(matchesFilter && matchesSearch);
  });
}

filterButtons.forEach((button) => {
  button.addEventListener("click", () => {
    filterButtons.forEach((entry) => entry.classList.remove("is-active"));
    button.classList.add("is-active");
    filterReleaseCards();
  });
});

if (releaseSearch) {
  releaseSearch.addEventListener("input", filterReleaseCards);
}

if (expandAllButton) {
  expandAllButton.addEventListener("click", () => {
    releaseCards.forEach((card) => {
      if (!card.hidden) {
        card.open = true;
      }
    });
  });
}

if (collapseAllButton) {
  collapseAllButton.addEventListener("click", () => {
    releaseCards.forEach((card) => {
      card.open = false;
    });
  });
}

const routeFinders = [...document.querySelectorAll("[data-route-finder]")];

routeFinders.forEach((finder) => {
  const optionButtons = [...finder.querySelectorAll("[data-route-option]")];
  const searchInput = finder.querySelector("[data-route-search]");
  const filterButtons = [...finder.querySelectorAll("[data-route-filter]")];
  const resultTitle = finder.querySelector("[data-route-result-title]");
  const resultDescription = finder.querySelector("[data-route-result-description]");
  const resultActions = finder.querySelector("[data-route-result-actions]");
  const resultAlternatives = finder.querySelector("[data-route-result-alternatives]");
  const resultNote = finder.querySelector("[data-route-result-note]");
  const routeCards = [...finder.querySelectorAll("[data-route-card]")];

  function renderRouteResult(button) {
    if (!button || !resultTitle || !resultDescription || !resultActions || !resultAlternatives || !resultNote) {
      return;
    }

    optionButtons.forEach((entry) => entry.classList.remove("is-active"));
    button.classList.add("is-active");

    resultTitle.textContent = button.dataset.routeTitle ?? "";
    resultDescription.textContent = button.dataset.routeDescription ?? "";
    resultNote.textContent = button.dataset.routeNote ?? "";

    const primaryLabel = button.dataset.routePrimaryLabel ?? "";
    const primaryHref = button.dataset.routePrimaryHref ?? "#";
    const primaryExternal = button.dataset.routePrimaryExternal === "true";
    const secondaryLabel = button.dataset.routeSecondaryLabel ?? "";
    const secondaryHref = button.dataset.routeSecondaryHref ?? "#";
    const secondaryExternal = button.dataset.routeSecondaryExternal === "true";

    resultActions.innerHTML = `
      <a class="button button-primary" href="${primaryHref}"${primaryExternal ? ' target="_blank" rel="noopener noreferrer"' : ""}>${primaryLabel}</a>
      <a class="button button-secondary" href="${secondaryHref}"${secondaryExternal ? ' target="_blank" rel="noopener noreferrer"' : ""}>${secondaryLabel}</a>
    `;

    let alternatives = [];

    try {
      alternatives = JSON.parse(button.dataset.routeAlternatives ?? "[]");
    } catch {
      alternatives = [];
    }

    resultAlternatives.innerHTML = alternatives
      .map((alternative) => {
        const target = alternative.external ? ' target="_blank" rel="noopener noreferrer"' : "";
        return `<li><a class="text-link" href="${alternative.href}"${target}>${alternative.label}</a></li>`;
      })
      .join("");
  }

  function filterRouteFinder() {
    const activeFilter =
      finder.querySelector("[data-route-filter].is-active")?.dataset.routeFilter ?? "all";
    const searchValue = searchInput ? searchInput.value.trim().toLowerCase() : "";

    optionButtons.forEach((button) => {
      const filters = (button.dataset.routeFilters ?? "").toLowerCase();
      const haystack = (button.dataset.routeSearch ?? "").toLowerCase();
      const matchesFilter = activeFilter === "all" || filters.includes(activeFilter);
      const matchesSearch = searchValue === "" || haystack.includes(searchValue);
      button.hidden = !(matchesFilter && matchesSearch);
    });

    routeCards.forEach((card) => {
      const filters = (card.dataset.routeFilters ?? "").toLowerCase();
      const haystack = (card.dataset.routeSearch ?? "").toLowerCase();
      const matchesFilter = activeFilter === "all" || filters.includes(activeFilter);
      const matchesSearch = searchValue === "" || haystack.includes(searchValue);
      card.hidden = !(matchesFilter && matchesSearch);
    });

    const currentActive = finder.querySelector("[data-route-option].is-active:not([hidden])");
    const nextVisible = optionButtons.find((button) => !button.hidden);

    if (!currentActive && nextVisible) {
      renderRouteResult(nextVisible);
    }
  }

  optionButtons.forEach((button) => {
    button.addEventListener("click", () => renderRouteResult(button));
  });

  filterButtons.forEach((button) => {
    button.addEventListener("click", () => {
      filterButtons.forEach((entry) => entry.classList.remove("is-active"));
      button.classList.add("is-active");
      filterRouteFinder();
    });
  });

  if (searchInput) {
    searchInput.addEventListener("input", filterRouteFinder);
  }

  if (optionButtons.length) {
    renderRouteResult(optionButtons[0]);
  }
});
