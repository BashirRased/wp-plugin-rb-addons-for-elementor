document.addEventListener('DOMContentLoaded', function () {

	/**
	 * Dashboard selectors.
	 */
	const dashboardSelector = '.rbelad-dashboard';
	const contentSelector   = '#rbelad-content';
	const tabSelector       = '.rbelad-dashboard a.nav-tab';
	const loadingClass      = 'rbelad-dashboard--loading';


	/**
	 * Get dashboard content element.
	 *
	 * @return {HTMLElement|null} Dashboard content.
	 */
	function getDashboardContent() {

		return document.querySelector(
			contentSelector
		);
	}


	/**
	 * Get tab from current URL hash.
	 *
	 * @return {string} Current tab.
	 */
	function getCurrentTab() {

		const hash = window.location.hash.replace(
			'#',
			''
		);

		return hash || 'home';
	}


	/**
	 * Update active dashboard tab.
	 *
	 * @param {string} tab Current tab.
	 */
	function updateActiveTab(tab) {

		document
			.querySelectorAll(tabSelector)
			.forEach(function (tabLink) {

				tabLink.classList.remove(
					'nav-tab-active'
				);
			});

		const activeTab = document.querySelector(
			dashboardSelector +
			' a.nav-tab[data-tab="' +
			CSS.escape(tab) +
			'"]'
		);

		if (activeTab) {

			activeTab.classList.add(
				'nav-tab-active'
			);
		}
	}


	/**
	 * Update browser URL.
	 *
	 * Keeps the existing #hash architecture.
	 *
	 * Example:
	 *
	 * ?page=rbelad-dashboard#free-widgets
	 *
	 * @param {string} tab Dashboard tab.
	 * @param {boolean} pushState Add browser history entry.
	 */
	function updateBrowserUrl(tab, pushState = true) {

		const url = new URL(
			window.location.href
		);

		url.hash = tab;

		if (pushState) {

			window.history.pushState(
				{
					rbeladTab: tab,
				},
				'',
				url.href
			);
		}
	}


	/**
	 * Load dashboard tab through AJAX.
	 *
	 * @param {string} tab Dashboard tab.
	 * @param {boolean} pushState Update browser history.
	 */
	function loadDashboardTab(
		tab,
		pushState = true
	) {

		const dashboardContent =
			getDashboardContent();

		if (!dashboardContent) {
			return;
		}

		/*
		 * Fallback to Home.
		 */
		if (!tab) {
			tab = 'home';
		}

		/*
		 * Prevent duplicate AJAX requests
		 * for the currently loaded tab.
		 */
		if (
			dashboardContent.dataset.currentTab === tab &&
			!dashboardContent.classList.contains(
				loadingClass
			)
		) {

			if (pushState) {
				updateBrowserUrl(
					tab,
					true
				);
			}

			updateActiveTab(tab);

			return;
		}

		/*
		 * Current dashboard URL.
		 */
		const dashboardUrl = new URL(
			window.location.href
		);

		/*
		 * Build AJAX request URL.
		 *
		 * Browser URL:
		 * ?page=rbelad-dashboard#free-widgets
		 *
		 * AJAX URL:
		 * ?page=rbelad-dashboard&rbelad_tab=free-widgets
		 */
		const fetchUrl = new URL(
			dashboardUrl.href
		);

		/*
		 * Hash is not sent to the server.
		 */
		fetchUrl.hash = '';

		/*
		 * Send tab to PHP.
		 */
		fetchUrl.searchParams.set(
			'rbelad_tab',
			tab
		);

		/*
		 * Start loading.
		 */
		dashboardContent.classList.add(
			loadingClass
		);

		/*
		 * Prevent interaction while loading.
		 */
		dashboardContent.setAttribute(
			'aria-busy',
			'true'
		);

		fetch(fetchUrl.href, {
			method: 'GET',
			credentials: 'same-origin',
			headers: {
				'X-Requested-With': 'XMLHttpRequest',
			},
		})
			.then(function (response) {

				if (!response.ok) {

					throw new Error(
						'Request failed with status ' +
						response.status
					);
				}

				return response.text();
			})
			.then(function (html) {

				const parser =
					new DOMParser();

				const doc =
					parser.parseFromString(
						html,
						'text/html'
					);

				const newDashboardContent =
					doc.querySelector(
						contentSelector
					);

				if (!newDashboardContent) {

					throw new Error(
						'Dashboard content was not found in the response.'
					);
				}

				/*
				 * Replace dashboard content.
				 */
				dashboardContent.innerHTML =
					newDashboardContent.innerHTML;

				/*
				 * Store current tab.
				 */
				dashboardContent.dataset.currentTab =
					tab;

				/*
				 * Update active navigation tab.
				 */
				updateActiveTab(tab);

				/*
				 * Update browser URL.
				 */
				updateBrowserUrl(
					tab,
					pushState
				);

				/*
				 * Scroll to dashboard content.
				 */
				window.scrollTo({
					top:
						dashboardContent.offsetTop,
					behavior: 'smooth',
				});
			})
			.catch(function (error) {

				console.error(
					'RBELAD Dashboard AJAX Error:',
					error
				);
			})
			.finally(function () {

				/*
				 * Stop loading.
				 */
				dashboardContent.classList.remove(
					loadingClass
				);

				/*
				 * Reset loading state.
				 */
				dashboardContent.removeAttribute(
					'aria-busy'
				);
			});
	}


	/**
	 * Dashboard tab click.
	 */
	document.addEventListener(
		'click',
		function (e) {

			const link = e.target.closest(
				tabSelector
			);

			if (!link) {
				return;
			}

			/*
			 * Do not intercept modified clicks.
			 *
			 * Ctrl/Cmd:
			 * Open in new tab.
			 *
			 * Shift/Alt:
			 * Keep browser default behavior.
			 */
			if (
				e.ctrlKey ||
				e.metaKey ||
				e.shiftKey ||
				e.altKey
			) {
				return;
			}

			/*
			 * Get tab from data attribute first.
			 */
			const tab =
				link.dataset.tab ||
				new URL(
					link.href,
					window.location.origin
				).hash.replace(
					'#',
					''
				) ||
				'home';

			/*
			 * Prevent normal page navigation.
			 */
			e.preventDefault();

			/*
			 * Load tab through AJAX.
			 */
			loadDashboardTab(
				tab,
				true
			);
		}
	);


	/**
	 * Browser Back / Forward.
	 *
	 * Handles history.pushState().
	 */
	window.addEventListener(
		'popstate',
		function () {

			const tab =
				getCurrentTab();

			loadDashboardTab(
				tab,
				false
			);
		}
	);


	/**
	 * Handle direct hash navigation.
	 *
	 * Example:
	 *
	 * admin.php?page=rbelad-dashboard#pro-widgets
	 */
	window.addEventListener(
		'hashchange',
		function () {

			const tab =
				getCurrentTab();

			const dashboardContent =
				getDashboardContent();

			if (!dashboardContent) {
				return;
			}

			const currentTab =
				dashboardContent.dataset.currentTab;

			/*
			 * Already showing this tab.
			 */
			if (currentTab === tab) {
				updateActiveTab(tab);
				return;
			}

			/*
			 * Load requested tab.
			 */
			loadDashboardTab(
				tab,
				false
			);
		}
	);


	/**
	 * Initialize active tab.
	 *
	 * When the dashboard is opened directly with:
	 *
	 * ?page=rbelad-dashboard#free-widgets
	 *
	 * PHP may already render the correct content.
	 * We only need to make sure the active tab is correct.
	 */
	const dashboardContent =
		getDashboardContent();

	if (dashboardContent) {

		const initialTab =
			dashboardContent.dataset.currentTab ||
			getCurrentTab() ||
			'home';

		dashboardContent.dataset.currentTab =
			initialTab;

		updateActiveTab(
			initialTab
		);
	}

});
