const navButton = document.querySelector(".menu-toggle");
const primaryNav = document.querySelector(".primary-nav");
const megaMenus = [...document.querySelectorAll(".mega-menu")];

if (navButton && primaryNav) {
  navButton.addEventListener("click", () => {
    const open = primaryNav.classList.toggle("is-open");
    navButton.setAttribute("aria-expanded", String(open));
  });
}

megaMenus.forEach((menu) => {
  menu.addEventListener("toggle", () => {
    if (!menu.open || window.innerWidth <= 980) {
      return;
    }

    megaMenus.forEach((otherMenu) => {
      if (otherMenu !== menu) {
        otherMenu.open = false;
      }
    });
  });
});

document.addEventListener("click", (event) => {
  if (window.innerWidth <= 980) {
    return;
  }

  megaMenus.forEach((menu) => {
    if (!menu.contains(event.target)) {
      menu.open = false;
    }
  });
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
