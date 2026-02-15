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
            '<div class="col-12 text-center text-muted py-5"><img src="/build/images/svgs/empty-shopping-bag.svg" width="100" class="mb-3 opacity-50"><h5 class="fw-semibold">No products found</h5><p>Try adjusting your filters or search terms.</p></div>';
    } else {
        products.forEach((p) => {
            const stockInfo = getStockDisplay(p.stock_by_warehouse);
            const savings = p.base_price - p.your_price;
            const savingsPercent = ((savings / p.base_price) * 100).toFixed(0);
            const imageUrl = p.image
                ? `/${p.image}`
                : "/build/images/products/product-1.jpg";

            html += `
            <div class="col-6 col-md-4 col-lg-3">
                <div class="card h-100 shadow-sm border-0 reseller-product-card">
                    <div class="product-image-container">
                        ${savingsPercent > 0 ? `<div class="discount-badge">-${savingsPercent}% Off</div>` : ""}
                        <img src="${imageUrl}" class="card-img-top" alt="${p.name}">
                    </div>
                    <div class="card-body px-3 pb-3 pt-0">
                        <p class="text-primary fw-bold fs-2 mb-0">${p.category.name}</p>
                        <h6 class="fw-bold mb-2 text-dark product-title" style="height: 2.5rem; overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">${p.name}</h6>
                        
                        <div class="price-info mb-2">
                            <div class="d-flex align-items-center gap-2">
                                <h5 class="fw-bolder text-dark mb-0">${p.formatted_your_price}</h5>
                            </div>
                            <div class="d-flex align-items-center gap-1 mt-1">
                                <span class="text-muted text-decoration-line-through fs-1">${p.formatted_base_price}</span>
                                <span class="save-label">Save ${ModernGrosir.formatMoney(savings)}</span>
                            </div>
                        </div>

                        ${stockInfo}
                        
                        <button class="btn btn-primary rounded-pill w-100 btn-add-to-cart mt-3 shadow-sm" 
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
        // Show only selected warehouse
        const whName = $("#warehouse-filter option:selected").text();
        const stock = stockByWarehouse[whName] || 0;
        const stockClass = stock > 0 ? "text-success" : "text-danger";
        html = `
            <div class="border-top pt-2 mt-1">
                <div class="d-flex justify-content-between align-items-center">
                    <span class="text-muted fs-1 mt-1">Stock at ${whName}:</span>
                    <span class="${stockClass} fs-2 fw-bold">${stock}</span>
                </div>
            </div>`;
    }
    // If 'all' selected, don't show stock section

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
