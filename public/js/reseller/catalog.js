let currentPage = 1;
let isLoading = false;
let selectedWarehouse = "all";
let lastResponseData = [];

$(document).ready(function () {
    fetchProducts();

    // Search & Filter
    let debounceTimer;
    $("#search-input").on("input", function () {
        clearTimeout(debounceTimer);
        debounceTimer = setTimeout(() => {
            currentPage = 1;
            fetchProducts();
        }, 300);
    });

    // Category Pill Click
    $(document).on("click", ".cat-pill", function () {
        $(".cat-pill")
            .removeClass("active btn-primary")
            .addClass("btn-outline-primary");
        $(this)
            .addClass("active btn-primary")
            .removeClass("btn-outline-primary");

        currentPage = 1;
        fetchProducts();
    });

    // Warehouse filter change
    $("#warehouse-filter").on("change", function () {
        selectedWarehouse = $(this).val();
        renderProducts(lastResponseData); // Re-render with new warehouse stock view
    });

    // Pagination click handler
    $(document).on("click", ".pagination a", function (e) {
        e.preventDefault();
        const page = $(this).data("page");
        if (page && page !== currentPage) {
            currentPage = page;
            fetchProducts();
        }
    });
});

function fetchProducts() {
    if (isLoading) return;
    isLoading = true;

    const search = $("#search-input").val();
    const catId = $(".cat-pill.active").data("id");

    renderSkeletons();

    $.ajax({
        url: window.catalogRoutes.products,
        data: {
            page: currentPage,
            search: search,
            category_id: catId,
        },
        success: function (response) {
            lastResponseData = response.data;
            renderProducts(response.data);
            renderPagination(response);
            isLoading = false;
        },
        error: function () {
            $("#product-grid").html(
                '<div class="col-12 text-center text-danger py-5"><i class="ti ti-alert-circle d-block fs-7 mb-2"></i> Failed to load products. Please refresh.</div>',
            );
            isLoading = false;
        },
    });
}

function renderSkeletons() {
    let html = "";
    for (let i = 0; i < 8; i++) {
        html += `
        <div class="col-6 col-md-4 col-lg-3">
            <div class="card border-0 shadow-none skeleton-card">
                <div class="skeleton mb-3" style="aspect-ratio: 1/1; border-radius: 12px;"></div>
                <div class="skeleton mb-2" style="height: 20px; width: 60%;"></div>
                <div class="skeleton mb-3" style="height: 30px; width: 90%;"></div>
                <div class="skeleton mb-2" style="height: 15px; width: 40%;"></div>
                <div class="skeleton" style="height: 40px; border-radius: 25px;"></div>
            </div>
        </div>`;
    }
    $("#product-grid").html(html);
}

function renderProducts(products) {
    let html = "";

    if (products.length === 0) {
        html =
            '<div class="col-12 text-center text-muted py-5"><i class="ti ti-shopping-cart-off fs-8 mb-2 d-block text-secondary"></i><h5 class="fw-semibold">No products found</h5><p>Try adjusting your filters or search terms.</p></div>';
    } else {
        products.forEach((p) => {
            const stockInfo = getStockDisplay(p.stock_by_warehouse);
            const savings = p.base_price - p.your_price;
            const savingsPercent = ((savings / p.base_price) * 100).toFixed(0);
            const imageUrl = p.image
                ? `/${p.image}`
                : "/build/images/products/product-1.jpg";

            let discountBadge = '';
            if (savingsPercent > 0) {
                discountBadge = `<span class="badge bg-danger text-white border border-danger fs-1 position-absolute top-0 end-0 m-1.5 rounded-md px-1.5 py-0.5 fw-bold shadow-xs">-${savingsPercent}% Off</span>`;
            }

            html += `
            <div class="col-6 col-sm-4 col-md-3 col-xl-3">
                <div class="card h-100 pos-product-card reseller-product-card" data-id="${p.id}">
                    ${discountBadge}
                    <div class="product-img-wrapper">
                        <img src="${imageUrl}" class="card-img-top" alt="${p.name}">
                    </div>
                    <div class="p-3 d-flex flex-column justify-content-between flex-grow-1">
                        <div>
                            <div class="d-flex align-items-center justify-content-between mb-2 gap-1">
                                <span class="badge-shadcn-category text-truncate">${p.category.name}</span>
                                <span class="badge-shadcn-sku text-truncate" title="${p.sku}">${p.sku}</span>
                            </div>
                            <h6 class="fw-bold fs-3 text-dark mb-0 text-truncate-2 product-title" title="${p.name}">${p.name}</h6>
                        </div>

                        <div class="product-price-stock-box pt-2 border-top mt-auto mb-3">
                            <div class="d-flex align-items-baseline justify-content-between gap-1 flex-wrap mb-1.5">
                                <div>
                                    <span class="fs-1 text-muted d-block fw-semibold text-uppercase tracking-wider mb-0.5">Harga Reseller</span>
                                    <span class="fs-4 fw-bold text-dark text-nowrap">${p.formatted_your_price}</span>
                                </div>
                                ${savings > 0 ? `<span class="text-muted text-decoration-line-through fs-1 ms-auto">${p.formatted_base_price}</span>` : ''}
                            </div>
                            ${stockInfo}
                        </div>

                        <button class="btn btn-primary btn-sm rounded-2 w-100 btn-add-to-cart py-2 fw-semibold shadow-xs" 
                            data-id="${p.id}" 
                            data-name="${p.name}" 
                            data-price="${p.your_price}"
                            data-image="${imageUrl}">
                            <i class="ti ti-plus me-1"></i> Add to Cart
                        </button>
                    </div>
                </div>
            </div>`;
        });
    }

    $("#product-grid").html(html);
}

function getStockDisplay(stockByWarehouse) {
    const selectedWh = $("#warehouse-filter").val();
    let html = "";

    if (selectedWh !== "all") {
        const whName = $("#warehouse-filter option:selected").text();
        const stock = stockByWarehouse[whName] || 0;
        const stockBadgeClass = stock > 0 ? "badge-shadcn-stock-available" : "badge-shadcn-stock-empty";
        const stockIcon = stock > 0 ? "ti-box" : "ti-box-off";
        const stockText = stock > 0 ? `${stock} unit` : "Habis";
        html = `
            <div class="d-flex justify-content-between align-items-center w-100 mt-2">
                <span class="text-muted fs-1 text-truncate me-1">${whName}:</span>
                <span class="badge ${stockBadgeClass} d-inline-flex align-items-center flex-shrink-0">
                    <i class="ti ${stockIcon} me-1"></i>${stockText}
                </span>
            </div>`;
    }

    return html;
}

function renderPagination(response) {
    // Showing info
    const from = response.from || 0;
    const to = response.to || 0;
    const total = response.total || 0;
    $("#showing-info").html(`Showing ${from} to ${to} of ${total} products`);

    if (response.last_page <= 1) {
        $("#pagination-container").html("");
        return;
    }

    let html = '<nav><ul class="pagination pagination-sm mb-0">';

    // Previous
    const prevDisabled = response.current_page <= 1 ? "disabled" : "";
    html += `<li class="page-item ${prevDisabled}"><a class="page-link" href="#" data-page="${response.current_page - 1}">Previous</a></li>`;

    // Page numbers (show max 5 pages)
    const maxPages = 5;
    let startPage = Math.max(
        1,
        response.current_page - Math.floor(maxPages / 2),
    );
    let endPage = Math.min(response.last_page, startPage + maxPages - 1);

    if (endPage - startPage < maxPages - 1) {
        startPage = Math.max(1, endPage - maxPages + 1);
    }

    for (let i = startPage; i <= endPage; i++) {
        const active = i === response.current_page ? "active" : "";
        html += `<li class="page-item ${active}"><a class="page-link" href="#" data-page="${i}">${i}</a></li>`;
    }

    // Next
    const nextDisabled =
        response.current_page >= response.last_page ? "disabled" : "";
    html += `<li class="page-item ${nextDisabled}"><a class="page-link" href="#" data-page="${response.current_page + 1}">Next</a></li>`;

    html += "</ul></nav>";
    $("#pagination-container").html(html);
}
