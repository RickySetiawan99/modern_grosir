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
    }
};

// Global shortcuts for backward compatibility or easier access
window.parseMoney = window.ModernGrosir.parseMoney;
window.formatMoney = window.ModernGrosir.formatMoney;
