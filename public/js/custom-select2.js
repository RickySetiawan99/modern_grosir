/**
 * ModernGrosir — Global Select2 via FetchController
 *
 * Usage on select elements:
 *   class="global-select2"
 *   link="globalfetch"
 *   t="{{ encrypt('table_name') }}"
 *   s="{{ encrypt('id,name') }}"
 *   placeholder="Pilih ..."
 *
 * Data attributes:
 *   data-w='[{"field":"encrypt(col)","operator":"LIKE","value":"-NMSearch-"}]'   extra where
 *   data-j='[{"type":"left","t":"other","fieldA":"a.id","operator":"=","fieldB":"b.a_id"}]' joins
 *   data-g="encrypt(col)"   group-by
 *   data-parent-id="other_select_id"   cascading parent
 *   data-parent-field="encrypt(col)"   field to filter by parent value
 *   exception="other_select_id"        exclude ids from that element's value
 *   onlyin="other_select_id"           include only ids from that element's value
 */

function globalSelect2(context) {
    var $scope = context ? $(context) : $(document);
    var $targets = $scope.is('.global-select2') ? $scope : $scope.find('.global-select2');
    $targets.each(function () {
        var $this = $(this);

        if ($this.hasClass('select2-hidden-accessible')) {
            return;
        }

        var fetchUrl = (typeof base_url !== 'undefined')
            ? base_url + '/fetch/globalfetch'
            : '/fetch/globalfetch';

        var link = $this.attr('link') === 'globalfetch' ? fetchUrl : ($this.attr('link') || fetchUrl);
        var t    = $this.attr('t');  // encrypted table
        var s    = $this.attr('s');  // encrypted select columns

        if (!t || !s) {
            // No fetch params — init as plain select2
            $this.select2({
                theme: 'bootstrap-5',
                width: '100%',
                placeholder: $this.attr('placeholder') || 'Pilih...',
                allowClear: !$this.prop('required'),
                dropdownParent: $this.closest('.modal').length ? $this.closest('.modal') : $(document.body)
            });
            return;
        }

        var placeholder   = $this.attr('placeholder') || 'Pilih...';
        var allowClear    = !$this.prop('required');
        var tags          = $this.attr('tags') === 'true';
        var maxSelect     = parseInt($this.attr('maxs')) || 1000;
        var exception     = $this.attr('exception') || '';
        var onlyin        = $this.attr('onlyin') || '';

        // Auto-build search where on the second select column
        var autoWhere = [];
        try {
            var cols = s.split(',');
            if (cols.length > 1) {
                var secondCol = cols[1].trim();
                autoWhere = [{ field: 'select-index-1', operator: 'LIKE', value: '-NMSearch-' }];
            }
        } catch (e) { /* skip */ }

        // Extra where from data-w attribute
        var dataW = $this.data('w');
        if (dataW) {
            var parsedW = Array.isArray(dataW) ? dataW : JSON.parse(dataW);
            autoWhere = autoWhere.concat(parsedW);
        }

        // Joins from data-j attribute
        var j = [];
        var dataJ = $this.data('j');
        if (dataJ) {
            j = Array.isArray(dataJ) ? dataJ : JSON.parse(dataJ);
        }

        var g = $this.data('g') || '';

        var baseParameters = { t: t, s: s, w: autoWhere, j: j, group: g };

        var dropdownParent = $this.closest('.modal').length
            ? $this.closest('.modal')
            : $(document.body);

        $this.select2({
            theme: 'bootstrap-5',
            placeholder: placeholder,
            allowClear: allowClear,
            maximumSelectionLength: maxSelect,
            tags: tags,
            dropdownParent: dropdownParent,
            width: '100%',
            minimumInputLength: 0,
            language: {
                searching: function () { return 'Mencari...'; },
                noResults:  function () { return 'Data tidak ditemukan'; }
            },
            ajax: {
                url: link,
                dataType: 'json',
                type: 'post',
                delay: 250,
                data: function (params) {
                    var currentParameters = $.extend(true, {}, baseParameters);

                    // Cascading parent filter
                    var parentId    = $this.data('parent-id');
                    var parentField = $this.data('parent-field');
                    if (parentId && parentField) {
                        var parentValue = $('#' + parentId).val();
                        if (parentValue) {
                            currentParameters.w = currentParameters.w.concat([{
                                field: parentField, operator: '=', value: parentValue
                            }]);
                        }
                    }

                    return {
                        _token:    $('meta[name="csrf-token"]').attr('content'),
                        q:         params.term || '',
                        page:      params.page || 1,
                        parameter: currentParameters,
                        except:    exception ? _getInputVal(exception) : '',
                        onlyin:    onlyin    ? _getInputVal(onlyin)    : ''
                    };
                },
                processResults: function (data) {
                    return { results: data.item || [] };
                },
                cache: true
            },
            escapeMarkup: function (m) { return m; },
            templateResult:    _formatResult,
            templateSelection: _formatSelection
        });

        // Cascading: reset child when parent changes
        var parentId = $this.data('parent-id');
        if (parentId) {
            $('#' + parentId).on('change.select2cascade_' + ($this.attr('id') || Math.random()), function () {
                $this.val(null).trigger('change');
            });
        }
    });
}

function _formatResult(result) {
    if (result.loading) return result.text;
    return '<div class="select2-result__title fw-semibold">' + (result.text || '') + '</div>';
}

function _formatSelection(result) {
    return result.text || result.placeholder || '';
}

function _getInputVal(id) {
    var $el = $('#' + id);
    return $el.length ? ($el.val() || '') : '';
}

// Auto-initialize Select2 for any new elements injected into DOM (e.g. AJAX modals / tables)
var observer = new MutationObserver(function () {
    globalSelect2();
});

$(document).ready(function () {
    globalSelect2(document);

    observer.observe(document.body, {
        childList: true,
        subtree: true
    });

    $(document).on('shown.bs.modal', '.modal', function () {
        globalSelect2(this);
    });
});

