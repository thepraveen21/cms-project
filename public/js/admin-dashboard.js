// Admin Dashboard JavaScript

document.addEventListener('DOMContentLoaded', function() {
    // Initialize Dashboard
    initDashboard();
    
    // Stats Counter Animation
    animateStatsCounters();
    
    // Setup Event Listeners
    setupEventListeners();
    
    // Update Last Updated Time
    updateLastUpdatedTime();
    
    // Handle Window Resize
    handleResponsiveDesign();
});

/**
 * Initialize Dashboard Components
 */
function initDashboard() {
    console.log('Dashboard initialized');
    
    // Add loading state to cards
    const cards = document.querySelectorAll('.dashboard-card');
    cards.forEach(card => {
        card.classList.add('loading-skeleton');
        setTimeout(() => {
            card.classList.remove('loading-skeleton');
            card.style.opacity = '1';
        }, 500);
    });
    
    // Set current date in summary
    const dateElement = document.getElementById('current-date');
    if (dateElement) {
        const now = new Date();
        const options = { 
            weekday: 'long', 
            year: 'numeric', 
            month: 'long', 
            day: 'numeric' 
        };
        dateElement.textContent = now.toLocaleDateString('en-US', options);
    }
}

/**
 * Animate Stats Counters (if numbers are static)
 */
function animateStatsCounters() {
    const statElements = document.querySelectorAll('.stat-number');
    
    statElements.forEach(element => {
        const finalValue = parseInt(element.textContent);
        if (!isNaN(finalValue)) {
            // Simple counter animation
            animateCounter(element, 0, finalValue, 1000);
        }
    });
}

/**
 * Animate counter from start to end
 */
function animateCounter(element, start, end, duration) {
    let startTimestamp = null;
    
    const step = (timestamp) => {
        if (!startTimestamp) startTimestamp = timestamp;
        const progress = Math.min((timestamp - startTimestamp) / duration, 1);
        const value = Math.floor(progress * (end - start) + start);
        element.textContent = value;
        
        if (progress < 1) {
            window.requestAnimationFrame(step);
        }
    };
    
    window.requestAnimationFrame(step);
}

/**
 * Setup Event Listeners
 */
function setupEventListeners() {
    // Card Click Enhancement
    const cards = document.querySelectorAll('.dashboard-card');
    cards.forEach(card => {
        card.addEventListener('click', function(e) {
            // Don't trigger if clicking on link
            if (e.target.tagName === 'A' || e.target.closest('a')) {
                return;
            }
            
            // Find the manage link and trigger it
            const link = this.querySelector('a');
            if (link) {
                link.style.transform = 'scale(0.95)';
                setTimeout(() => {
                    link.style.transform = '';
                    window.location.href = link.href;
                }, 150);
            }
        });
        
        // Keyboard navigation
        card.addEventListener('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                const link = this.querySelector('a');
                if (link) {
                    window.location.href = link.href;
                }
            }
        });
    });
    
    // Quick Action Buttons
    const quickActions = document.querySelectorAll('[data-quick-action]');
    quickActions.forEach(button => {
        button.addEventListener('click', function() {
            const action = this.getAttribute('data-quick-action');
            handleQuickAction(action);
        });
    });
    
    // Refresh Stats Button
    const refreshBtn = document.getElementById('refresh-stats');
    if (refreshBtn) {
        refreshBtn.addEventListener('click', refreshDashboardStats);
    }
    
    // Print Dashboard
    const printBtn = document.getElementById('print-dashboard');
    if (printBtn) {
        printBtn.addEventListener('click', printDashboard);
    }
}

/**
 * Handle Quick Actions
 */
function handleQuickAction(action) {
    const actions = {
        'export': () => exportDashboardData(),
        'refresh': () => refreshDashboardStats(),
        'settings': () => openDashboardSettings(),
        'help': () => showHelpModal()
    };
    
    if (actions[action]) {
        actions[action]();
    }
}

/**
 * Update Last Updated Time
 */
function updateLastUpdatedTime() {
    const lastUpdatedElement = document.querySelector('.last-updated');
    if (lastUpdatedElement) {
        const now = new Date();
        const timeString = now.toLocaleTimeString('en-US', { 
            hour: '2-digit', 
            minute: '2-digit' 
        });
        lastUpdatedElement.textContent = `Last updated: ${timeString}`;
    }
}

/**
 * Refresh Dashboard Stats
 */
function refreshDashboardStats() {
    const refreshBtn = document.getElementById('refresh-stats');
    if (refreshBtn) {
        refreshBtn.disabled = true;
        refreshBtn.innerHTML = '<span class="loading-spinner"></span> Refreshing...';
    }
    
    // Simulate API call
    setTimeout(() => {
        // In a real application, this would be an API call
        console.log('Stats refreshed');
        
        // Update last updated time
        updateLastUpdatedTime();
        
        // Re-animate counters
        animateStatsCounters();
        
        // Show success message
        showNotification('Dashboard stats updated successfully', 'success');
        
        // Reset button
        if (refreshBtn) {
            setTimeout(() => {
                refreshBtn.disabled = false;
                refreshBtn.textContent = 'Refresh Stats';
            }, 1000);
        }
    }, 1500);
}

/**
 * Export Dashboard Data
 */
function exportDashboardData() {
    const stats = {};
    document.querySelectorAll('.stat-number').forEach(element => {
        const label = element.closest('.dashboard-card').querySelector('.card-title').textContent;
        stats[label] = element.textContent;
    });
    
    // Create CSV content
    let csvContent = "data:text/csv;charset=utf-8,";
    csvContent += "Category,Count\n";
    
    Object.keys(stats).forEach(key => {
        csvContent += `${key},${stats[key]}\n`;
    });
    
    // Create download link
    const encodedUri = encodeURI(csvContent);
    const link = document.createElement("a");
    link.setAttribute("href", encodedUri);
    link.setAttribute("download", `dashboard_stats_${new Date().toISOString().split('T')[0]}.csv`);
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
    
    showNotification('Data exported successfully', 'success');
}

/**
 * Show Notification
 */
function showNotification(message, type = 'info') {
    const notification = document.createElement('div');
    notification.className = `notification notification-${type}`;
    notification.innerHTML = `
        <span>${message}</span>
        <button class="close-notification">&times;</button>
    `;
    
    document.body.appendChild(notification);
    
    // Add styles
    notification.style.cssText = `
        position: fixed;
        top: 20px;
        right: 20px;
        padding: 12px 20px;
        background: ${type === 'success' ? '#10b981' : type === 'error' ? '#ef4444' : '#3b82f6'};
        color: white;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        z-index: 1000;
        display: flex;
        align-items: center;
        justify-content: space-between;
        min-width: 300px;
        animation: slideIn 0.3s ease;
    `;
    
    // Add animation
    const style = document.createElement('style');
    style.textContent = `
        @keyframes slideIn {
            from { transform: translateX(100%); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }
        .close-notification {
            background: none;
            border: none;
            color: white;
            font-size: 20px;
            cursor: pointer;
            margin-left: 10px;
        }
    `;
    document.head.appendChild(style);
    
    // Close button
    notification.querySelector('.close-notification').addEventListener('click', () => {
        notification.style.animation = 'slideOut 0.3s ease';
        notification.style.transform = 'translateX(100%)';
        notification.style.opacity = '0';
        setTimeout(() => notification.remove(), 300);
    });
    
    // Auto remove after 5 seconds
    setTimeout(() => {
        if (notification.parentNode) {
            notification.style.animation = 'slideOut 0.3s ease';
            notification.style.transform = 'translateX(100%)';
            notification.style.opacity = '0';
            setTimeout(() => notification.remove(), 300);
        }
    }, 5000);
}

/**
 * Handle Responsive Design
 */
function handleResponsiveDesign() {
    let resizeTimer;
    
    window.addEventListener('resize', function() {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(function() {
            adjustCardLayout();
        }, 250);
    });
    
    // Initial adjustment
    adjustCardLayout();
}

/**
 * Adjust Card Layout Based on Screen Size
 */
function adjustCardLayout() {
    const cards = document.querySelectorAll('.dashboard-card');
    const screenWidth = window.innerWidth;
    
    cards.forEach(card => {
        if (screenWidth < 640) {
            card.style.marginBottom = '16px';
        } else {
            card.style.marginBottom = '';
        }
    });
}

/**
 * Print Dashboard
 */
function printDashboard() {
    const originalStyles = document.querySelectorAll('style, link[rel="stylesheet"]');
    const printStyles = Array.from(originalStyles).map(style => style.cloneNode(true));
    
    // Temporarily hide non-essential elements
    const elementsToHide = document.querySelectorAll('nav, footer, .no-print');
    elementsToHide.forEach(el => el.style.display = 'none');
    
    // Print
    window.print();
    
    // Restore
    elementsToHide.forEach(el => el.style.display = '');
    
    showNotification('Printing dashboard...', 'info');
}

/**
 * Dashboard Settings Modal
 */
function openDashboardSettings() {
    // Create modal
    const modal = document.createElement('div');
    modal.className = 'dashboard-settings-modal';
    modal.innerHTML = `
        <div class="modal-content">
            <div class="modal-header">
                <h3>Dashboard Settings</h3>
                <button class="close-modal">&times;</button>
            </div>
            <div class="modal-body">
                <p>Settings feature coming soon!</p>
            </div>
        </div>
    `;
    
    // Add styles
    modal.style.cssText = `
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0,0,0,0.5);
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 1000;
    `;
    
    modal.querySelector('.modal-content').style.cssText = `
        background: white;
        padding: 24px;
        border-radius: 12px;
        max-width: 500px;
        width: 90%;
    `;
    
    document.body.appendChild(modal);
    
    // Close modal
    modal.querySelector('.close-modal').addEventListener('click', () => {
        modal.remove();
    });
    
    // Close on outside click
    modal.addEventListener('click', (e) => {
        if (e.target === modal) {
            modal.remove();
        }
    });
}

/**
 * Show Help Modal
 */
function showHelpModal() {
    alert('Dashboard Help:\n\n• Click on any card to manage that section\n• Use Refresh Stats button to update counts\n• Export data using the Export button\n• Click print icon to print dashboard');
}

// Utility Functions
function debounce(func, wait) {
    let timeout;
    return function executedFunction(...args) {
        const later = () => {
            clearTimeout(timeout);
            func(...args);
        };
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
    };
}

// Make functions available globally
window.Dashboard = {
    refreshStats: refreshDashboardStats,
    exportData: exportDashboardData,
    print: printDashboard,
    showNotification: showNotification
};