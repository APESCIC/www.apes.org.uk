export function initRouteFinder() {
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
}
