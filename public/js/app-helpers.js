/**
 * ModernGrosir Global Helper Utilities
 */

window.ModernGrosir = {
    /**
     * Parse currency string to integer
     * @param {string} str 
     * @returns {number}
     */
    parseMoney: function(str) {
        if (!str) return 0;
        return parseInt(str.toString().replace(/[^0-9]/g, '')) || 0;
    },

    /**
     * Format number to IDR currency
     * @param {number} amount 
     * @returns {string}
     */
    formatMoney: function(amount) {
        return 'Rp ' + new Intl.NumberFormat('id-ID').format(amount || 0);
    },

    /**
     * Get SweetAlert target container (for fullscreen support)
     * @param {string} selector 
     * @returns {string|HTMLElement}
     */
    getSwalTarget: function(selector = 'body') {
        return document.fullscreenElement ? selector : 'body';
    },

    /**
     * Global Toast Notification
     * @param {string} message 
     * @param {string} type - success, error, warning, info
     */
    showToast: function(message, type = 'success') {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        });

        Toast.fire({
            icon: type,
            title: message,
            target: this.getSwalTarget()
        });
    },

    /**
     * General Select2 Master Data Loader via FetchController
     * Reads configuration from element attributes (t, s, link, data-w, data-j, data-g)
     * or from explicit config object. No hardcoded master tables.
     *
     * @param {string|HTMLElement|jQuery} target
     * @param {Object} [config]       - Optional config object { t, s, w, j, group }
     * @param {Object} [options]      - Select2 options (placeholder, dropdownParent, allowClear, etc.)
     */
    getDataFromSelect2: function(target, config = {}, options = {}) {
        if (!$.fn.select2) return;

        const $el = $(target);
        if (!$el.length) return;

        // If config passed as 2nd arg is just options, normalize
        if (config && typeof config === 'object' && !config.t && !config.s && Object.keys(options).length === 0) {
            options = config;
            config = {};
        }

        const t = (config && config.t) || $el.attr('t');
        const s = (config && config.s) || $el.attr('s');

        const dropdownParent = options.dropdownParent || ($el.closest('.modal').length ? $el.closest('.modal') : $(document.body));
        const placeholder    = options.placeholder || $el.attr('placeholder') || $el.data('placeholder') || 'Pilih...';

        if ($el.hasClass('select2-hidden-accessible')) {
            $el.select2('destroy');
        }

        // If encrypted table (t) and columns (s) are present, configure FetchController AJAX
        if (t && s) {
            const fetchUrl = (typeof base_url !== 'undefined' ? base_url : '') + '/fetch/globalfetch';

            let w = (config && config.w) || [];
            if (!w.length) {
                w = [{ field: 'select-index-1', operator: 'LIKE', value: '-NMSearch-' }];
            }

            const dataW = $el.data('w');
            if (dataW) {
                try {
                    const parsedW = Array.isArray(dataW) ? dataW : JSON.parse(dataW);
                    w = w.concat(parsedW);
                } catch (e) {}
            }

            let j = (config && config.j) || [];
            const dataJ = $el.data('j');
            if (dataJ) {
                try {
                    const parsedJ = Array.isArray(dataJ) ? dataJ : JSON.parse(dataJ);
                    j = j.concat(parsedJ);
                } catch (e) {}
            }

            const group = (config && config.group) || $el.data('g') || '';
            const parameters = { t: t, s: s, w: w, j: j, group: group };

            $el.select2({
                theme: 'bootstrap-5',
                width: '100%',
                dropdownParent: dropdownParent,
                placeholder: placeholder,
                allowClear: options.allowClear !== undefined ? options.allowClear : !$el.prop('required'),
                minimumInputLength: options.minimumInputLength ?? 0,
                language: {
                    searching: function() { return 'Mencari...'; },
                    noResults:  function() { return 'Data tidak ditemukan'; }
                },
                ajax: {
                    url: fetchUrl,
                    dataType: 'json',
                    type: 'post',
                    delay: options.delay || 250,
                    data: function(params) {
                        const extraParams = typeof options.extraParams === 'function'
                            ? options.extraParams() : (options.extraParams || {});
                        return Object.assign({
                            _token:    $('meta[name="csrf-token"]').attr('content'),
                            q:         params.term || '',
                            page:      params.page || 1,
                            parameter: parameters,
                            except:    $el.attr('exception') ? $('#' + $el.attr('exception')).val() : '',
                            onlyin:    $el.attr('onlyin') ? $('#' + $el.attr('onlyin')).val() : ''
                        }, extraParams);
                    },
                    processResults: function(data) {
                        return { results: data.item || [] };
                    },
                    cache: true
                },
                escapeMarkup: function(m) { return m; },
                templateResult: function(res) {
                    if (res.loading) return res.text;
                    return '<div class="select2-result__title fw-semibold">' + (res.text || '') + '</div>';
                },
                templateSelection: function(res) {
                    return res.text || res.placeholder || '';
                }
            });
            return;
        }

        // Plain select2 (no AJAX / static options)
        $el.select2({
            theme: 'bootstrap-5',
            width: '100%',
            dropdownParent: dropdownParent,
            placeholder: placeholder,
            allowClear: options.allowClear !== undefined ? options.allowClear : Boolean($el.data('allow-clear')),
        });
    },

    /**
     * General Select2 Initializer for standard select elements across the app
     */
    initGlobalSelect2: function(context = document) {
        if (!$.fn.select2) return;

        const $context = $(context);
        const $selects = $context.is('select') ? $context : $context.find('select');

        $selects.each(function() {
            const $this = $(this);

            if (
                $this.hasClass('no-select2') ||
                $this.is('[data-no-select2]') ||
                $this.closest('.dataTables_length').length ||
                ($this.attr('name') && $this.attr('name').indexOf('_length') !== -1) ||
                $this.hasClass('swal2-select')
            ) {
                return;
            }

            // Skip .global-select2 (already handled by custom-select2.js)
            if ($this.hasClass('global-select2')) {
                return;
            }

            const $modal = $this.closest('.modal');
            const isModalVisible = $modal.length && $modal.hasClass('show');

            if ($modal.length && !isModalVisible) {
                return;
            }

            if ($this.hasClass('select2-hidden-accessible')) {
                return;
            }

            const dropdownParent = $modal.length ? $modal : undefined;

            // If it has t and s attributes, delegate to getDataFromSelect2
            if ($this.attr('t') && $this.attr('s')) {
                window.ModernGrosir.getDataFromSelect2($this, {}, {
                    dropdownParent: dropdownParent
                });
            } else {
                $this.select2({
                    theme: 'bootstrap-5',
                    width: '100%',
                    dropdownParent: dropdownParent,
                    placeholder: $this.attr('placeholder') || $this.data('placeholder') || undefined,
                    allowClear: Boolean($this.data('allow-clear'))
                });
            }
        });
    }
};

window.parseMoney = window.ModernGrosir.parseMoney;
window.formatMoney = window.ModernGrosir.formatMoney;
window.getDataFromSelect2 = window.ModernGrosir.getDataFromSelect2;
window.initSelect2 = window.ModernGrosir.initGlobalSelect2;
