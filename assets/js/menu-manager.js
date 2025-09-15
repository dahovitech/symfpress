// Menu Management JavaScript
class MenuManager {
    constructor() {
        this.init();
    }

    init() {
        this.initializeSortable();
        this.bindEvents();
    }

    initializeSortable() {
        const sortableElement = document.getElementById('menu-sortable');
        if (!sortableElement) return;

        // Importer SortableJS dynamiquement si nécessaire
        if (typeof Sortable === 'undefined') {
            this.loadSortableJS(() => {
                this.setupSortable(sortableElement);
            });
        } else {
            this.setupSortable(sortableElement);
        }
    }

    loadSortableJS(callback) {
        const script = document.createElement('script');
        script.src = 'https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js';
        script.onload = callback;
        document.head.appendChild(script);
    }

    setupSortable(element) {
        new Sortable(element, {
            group: 'menu-items',
            handle: '.fa-grip-vertical',
            ghostClass: 'sortable-ghost',
            chosenClass: 'sortable-chosen',
            dragClass: 'sortable-drag',
            animation: 150,
            fallbackOnBody: true,
            swapThreshold: 0.65,
            onUpdate: (evt) => {
                this.handleSortUpdate(evt);
            }
        });

        // Ajouter les styles CSS nécessaires
        this.addSortableStyles();
    }

    addSortableStyles() {
        const style = document.createElement('style');
        style.textContent = `
            .sortable-ghost {
                opacity: 0.4;
                background-color: #f8f9fa;
            }
            .sortable-chosen {
                background-color: #e9ecef;
            }
            .sortable-drag {
                transform: rotate(2deg);
                box-shadow: 0 5px 15px rgba(0,0,0,0.2);
            }
            #menu-sortable .fa-grip-vertical {
                cursor: grab;
                color: #6c757d;
                transition: color 0.2s ease;
            }
            #menu-sortable .fa-grip-vertical:hover {
                color: #495057;
            }
            #menu-sortable .fa-grip-vertical:active {
                cursor: grabbing;
            }
            .menu-item-dragging {
                z-index: 9999;
            }
        `;
        document.head.appendChild(style);
    }

    handleSortUpdate(evt) {
        const items = this.collectMenuItems();
        this.saveMenuOrder(items);
    }

    collectMenuItems() {
        const items = [];
        const rows = document.querySelectorAll('#menu-sortable tr[data-menu-id]');
        
        rows.forEach((row, index) => {
            const menuId = row.getAttribute('data-menu-id');
            if (menuId) {
                items.push({
                    id: parseInt(menuId),
                    order: index,
                    parent: null // Pour l'instant, on ne gère que le niveau principal
                });
            }
        });

        return items;
    }

    saveMenuOrder(items) {
        fetch(this.getReorderUrl(), {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-Requested-With': 'XMLHttpRequest'
            },
            body: JSON.stringify({
                items: items
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                this.showSuccessMessage('Ordre du menu mis à jour avec succès !');
                // Mettre à jour les numéros d'ordre dans l'interface
                this.updateOrderNumbers();
            } else {
                this.showErrorMessage('Erreur lors de la mise à jour de l\'ordre du menu');
                console.error('Erreur:', data.message);
            }
        })
        .catch(error => {
            console.error('Erreur:', error);
            this.showErrorMessage('Erreur de connexion lors de la mise à jour');
        });
    }

    updateOrderNumbers() {
        const rows = document.querySelectorAll('#menu-sortable tr[data-menu-id]');
        rows.forEach((row, index) => {
            const orderCell = row.cells[5]; // La colonne "Ordre" est la 6ème (index 5)
            if (orderCell) {
                orderCell.textContent = index;
            }
        });
    }

    getReorderUrl() {
        // Chercher l'URL dans les données de la page ou utiliser une URL par défaut
        const metaUrl = document.querySelector('meta[name="menu-reorder-url"]');
        if (metaUrl) {
            return metaUrl.content;
        }
        
        // URL de fallback basée sur la route Symfony
        return '/admin/menus/reorder';
    }

    bindEvents() {
        // Ajouter des événements pour améliorer l'UX
        document.addEventListener('dragstart', (e) => {
            if (e.target.closest('#menu-sortable')) {
                e.target.closest('tr').classList.add('menu-item-dragging');
            }
        });

        document.addEventListener('dragend', (e) => {
            if (e.target.closest('#menu-sortable')) {
                e.target.closest('tr').classList.remove('menu-item-dragging');
            }
        });
    }

    showSuccessMessage(message) {
        this.showMessage(message, 'success');
    }

    showErrorMessage(message) {
        this.showMessage(message, 'danger');
    }

    showMessage(message, type) {
        // Supprimer les anciens messages
        const existingMessages = document.querySelectorAll('.menu-manager-alert');
        existingMessages.forEach(msg => msg.remove());

        // Créer le nouveau message
        const alert = document.createElement('div');
        alert.className = `alert alert-${type} alert-dismissible fade show menu-manager-alert`;
        alert.innerHTML = `
            ${message}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        `;

        // Insérer le message au début du contenu
        const contentArea = document.querySelector('.admin-content') || document.querySelector('.card');
        if (contentArea) {
            contentArea.insertBefore(alert, contentArea.firstChild);
        }

        // Masquer automatiquement après 5 secondes
        setTimeout(() => {
            if (alert.parentNode) {
                alert.classList.remove('show');
                setTimeout(() => alert.remove(), 150);
            }
        }, 5000);
    }
}

// Initialiser le gestionnaire de menus quand le DOM est prêt
document.addEventListener('DOMContentLoaded', () => {
    const menuTable = document.getElementById('menu-sortable');
    if (menuTable) {
        new MenuManager();
    }
});

// Export pour utilisation dans d'autres scripts
window.MenuManager = MenuManager;
