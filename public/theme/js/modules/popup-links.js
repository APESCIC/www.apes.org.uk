export function initPopupLinks() {
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
}
