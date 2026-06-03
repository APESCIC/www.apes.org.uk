const navButton = document.querySelector(".menu-toggle");
const primaryNav = document.querySelector(".primary-nav");
const megaMenus = [...document.querySelectorAll(".mega-menu")];

function closeMegaMenus() {
  megaMenus.forEach((menu) => {
    const panel = menu.querySelector(".mega-panel");
    menu.open = false;

    if (panel) {
      panel.style.removeProperty("--mega-panel-top");
    }
  });
}

function syncMegaMenuPositions() {
  if (window.innerWidth <= 980) {
    closeMegaMenus();
    return;
  }

  const header = document.querySelector(".site-header");
  const headerBottom = header ? header.getBoundingClientRect().bottom : 0;
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
  if (navButton) {
    navButton.setAttribute("aria-expanded", "false");
  }

  if (primaryNav) {
    primaryNav.classList.remove("is-open");
  }

  closeMegaMenus();
}

if (navButton && primaryNav) {
  navButton.addEventListener("click", () => {
    const open = primaryNav.classList.toggle("is-open");
    navButton.setAttribute("aria-expanded", String(open));

    if (!open) {
      closeMegaMenus();
    }
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

    syncMegaMenuPositions();
  });
});

if (primaryNav) {
  primaryNav.addEventListener("click", (event) => {
    const link = event.target.closest("a");

    if (!link) {
      return;
    }

    closeMainNavigation();
  });
}

window.addEventListener("pagehide", closeMainNavigation);
window.addEventListener("beforeunload", closeMainNavigation);

document.addEventListener("click", (event) => {
  if (window.innerWidth <= 980) {
    return;
  }

  if (event.target.closest(".primary-nav")) {
    return;
  }

  closeMegaMenus();
});

window.addEventListener("resize", syncMegaMenuPositions);
window.addEventListener("scroll", syncMegaMenuPositions, { passive: true });
window.addEventListener("pageshow", (event) => {
  if (event.persisted) {
    closeMainNavigation();
  }
});
window.addEventListener("load", syncMegaMenuPositions);

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
