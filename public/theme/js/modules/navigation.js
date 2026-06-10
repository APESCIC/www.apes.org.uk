export function initNavigation() {
  const navButton = document.querySelector(".menu-toggle");
  const primaryNav = document.querySelector(".primary-nav");
  const navOverlay = document.querySelector("[data-nav-overlay]");
  const navCloseButton = document.querySelector("[data-menu-close]");
  const siteHeader = document.querySelector(".site-header");
  const megaMenus = [...document.querySelectorAll(".mega-menu")];
  const desktopNavigationQuery = window.matchMedia("(min-width: 981px)");
  const compactHeaderClass = "site-header--compact";
  
  function isDesktopNavigation() {
    return desktopNavigationQuery.matches;
  }
  
  function syncHeaderScrollState() {
    if (!siteHeader) {
      return false;
    }
  
    const shouldCompact = (window.scrollY ?? window.pageYOffset ?? 0) > 0;
    const isCompact = siteHeader.classList.contains(compactHeaderClass);
  
    if (shouldCompact === isCompact) {
      return false;
    }
  
    siteHeader.classList.toggle(compactHeaderClass, shouldCompact);
  
    return true;
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
  
  function syncHeaderLayout() {
    syncHeaderScrollState();
    syncMegaMenuPositions();
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
    syncHeaderLayout();
  
    if (isDesktopNavigation()) {
      setMainNavigationState(false);
    }
  });
  window.addEventListener("scroll", syncHeaderLayout, { passive: true });
  window.addEventListener("pageshow", (event) => {
    if (event.persisted) {
      closeMainNavigation();
    }
    syncHeaderLayout();
  });
  window.addEventListener("load", () => {
    syncHeaderLayout();
  });
}
