export function initDevelopmentNotice() {
  const developmentPopup = document.querySelector("[data-development-popup]");
  const developmentPopupDialog = developmentPopup?.querySelector("[data-development-popup-dialog]") ?? null;
  const developmentPopupCloseButtons = [...document.querySelectorAll("[data-development-popup-close]")];
  const liveChatButtons = [...document.querySelectorAll("[data-live-chat-open]")];
  const developmentPopupStorageKey = developmentPopup?.dataset.storageKey ?? "apesDevelopmentNoticeDismissed";
  let developmentPopupLastFocused = null;
  let developmentPopupDismissedInMemory = false;
  
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
        localStorage.setItem(developmentPopupStorageKey, "true");
      } catch {
        developmentPopupDismissedInMemory = true;
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
      return localStorage.getItem(developmentPopupStorageKey) !== "true";
    } catch {
      return !developmentPopupDismissedInMemory;
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
}
