/**
 * Gestionnaire de sélection de médias pour SymfPress
 * Intégration dans les formulaires d'articles et de pages
 */

class MediaSelector {
    constructor() {
        this.init();
    }

    init() {
        this.createModalHTML();
        this.bindEvents();
        this.loadMedias();
    }

    createModalHTML() {
        const modalHTML = `
            <div class="modal fade" id="mediaModal" tabindex="-1">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">
                                <i class="fas fa-images me-2"></i>Sélecteur de médias
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row mb-3">
                                <div class="col-md-8">
                                    <input type="file" id="mediaUpload" class="form-control" accept="image/*" multiple>
                                </div>
                                <div class="col-md-4">
                                    <button type="button" class="btn btn-primary" id="uploadBtn">
                                        <i class="fas fa-upload"></i> Uploader
                                    </button>
                                </div>
                            </div>
                            <div id="mediaGrid" class="row g-3">
                                <!-- Médias chargés dynamiquement -->
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                            <button type="button" class="btn btn-primary" id="selectMediaBtn" disabled>Sélectionner</button>
                        </div>
                    </div>
                </div>
            </div>
        `;
        
        // Ajouter le modal au DOM s'il n'existe pas déjà
        if (!document.getElementById('mediaModal')) {
            document.body.insertAdjacentHTML('beforeend', modalHTML);
        }
    }

    bindEvents() {
        // Ouvrir le sélecteur depuis les boutons "Ajouter un média"
        document.addEventListener('click', (e) => {
            if (e.target.matches('.btn-add-media')) {
                e.preventDefault();
                this.currentTarget = e.target.dataset.target;
                this.openModal();
            }
        });

        // Sélection d'un média
        document.addEventListener('click', (e) => {
            if (e.target.matches('.media-item') || e.target.closest('.media-item')) {
                const mediaItem = e.target.closest('.media-item');
                this.selectMedia(mediaItem);
            }
        });

        // Bouton de sélection finale
        document.getElementById('selectMediaBtn')?.addEventListener('click', () => {
            this.confirmSelection();
        });

        // Upload de nouveaux médias
        document.getElementById('uploadBtn')?.addEventListener('click', () => {
            this.uploadMedia();
        });
    }

    openModal() {
        const modal = new bootstrap.Modal(document.getElementById('mediaModal'));
        modal.show();
        this.loadMedias();
    }

    async loadMedias() {
        try {
            // Simuler le chargement des médias depuis l'API
            const medias = await this.fetchMedias();
            this.renderMediaGrid(medias);
        } catch (error) {
            console.error('Erreur lors du chargement des médias:', error);
            this.showError('Impossible de charger les médias');
        }
    }

    async fetchMedias() {
        // En attendant l'API réelle, utiliser des médias de test
        return [
            {
                id: 1,
                filename: 'Beautiful-Landscape-Stone-Bridge-Lake-Temple.jpg',
                url: '/uploads/Beautiful-Landscape-Stone-Bridge-Lake-Temple.jpg',
                type: 'image',
                size: '645 KB'
            },
            {
                id: 2,
                filename: 'dramatic-sunset-mountain-valley-landscape.jpg',
                url: '/uploads/dramatic-sunset-mountain-valley-landscape.jpg',
                type: 'image',
                size: '239 KB'
            },
            {
                id: 3,
                filename: 'generic_male_placeholder_avatar_icon.jpg',
                url: '/uploads/generic_male_placeholder_avatar_icon.jpg',
                type: 'image',
                size: '17 KB'
            }
        ];
    }

    renderMediaGrid(medias) {
        const grid = document.getElementById('mediaGrid');
        if (!grid) return;

        grid.innerHTML = medias.map(media => `
            <div class="col-md-3">
                <div class="media-item card h-100" data-media-id="${media.id}" data-media-url="${media.url}" data-media-name="${media.filename}">
                    <div class="card-body p-2">
                        ${media.type === 'image' ? 
                            `<img src="${media.url}" class="img-fluid rounded mb-2" alt="${media.filename}" style="height: 120px; object-fit: cover; width: 100%;">` : 
                            `<div class="d-flex align-items-center justify-content-center bg-light rounded mb-2" style="height: 120px;">
                                <i class="fas fa-file fa-3x text-muted"></i>
                            </div>`
                        }
                        <h6 class="card-title small mb-1">${media.filename}</h6>
                        <small class="text-muted">${media.size}</small>
                    </div>
                </div>
            </div>
        `).join('');
    }

    selectMedia(mediaItem) {
        // Désélectionner tous les autres
        document.querySelectorAll('.media-item').forEach(item => {
            item.classList.remove('border-primary', 'bg-light');
        });

        // Sélectionner l'élément actuel
        mediaItem.classList.add('border-primary', 'bg-light');
        
        // Activer le bouton de sélection
        document.getElementById('selectMediaBtn').disabled = false;
        
        // Stocker les informations du média sélectionné
        this.selectedMedia = {
            id: mediaItem.dataset.mediaId,
            url: mediaItem.dataset.mediaUrl,
            name: mediaItem.dataset.mediaName
        };
    }

    confirmSelection() {
        if (!this.selectedMedia || !this.currentTarget) return;

        const targetElement = document.getElementById(this.currentTarget);
        if (!targetElement) return;

        // Mettre à jour le champ cible selon son type
        if (targetElement.tagName === 'INPUT') {
            targetElement.value = this.selectedMedia.url;
        } else if (targetElement.tagName === 'IMG') {
            targetElement.src = this.selectedMedia.url;
            targetElement.alt = this.selectedMedia.name;
        } else if (targetElement.tagName === 'TEXTAREA' && this.currentTarget === 'content') {
            // Insertion d'image dans le contenu
            const cursorPos = targetElement.selectionStart;
            const textBefore = targetElement.value.substring(0, cursorPos);
            const textAfter = targetElement.value.substring(cursorPos);
            const imageTag = `\n![${this.selectedMedia.name}](${this.selectedMedia.url})\n`;
            
            targetElement.value = textBefore + imageTag + textAfter;
            targetElement.focus();
            targetElement.setSelectionRange(cursorPos + imageTag.length, cursorPos + imageTag.length);
        }

        // Mettre à jour l'aperçu s'il existe
        const preview = document.querySelector(`[data-preview="${this.currentTarget}"]`);
        if (preview) {
            if (preview.tagName === 'IMG') {
                preview.src = this.selectedMedia.url;
                preview.style.display = 'block';
            } else {
                preview.innerHTML = `<img src="${this.selectedMedia.url}" class="img-fluid rounded" alt="${this.selectedMedia.name}">`;
            }
        }

        // Fermer le modal
        const modal = bootstrap.Modal.getInstance(document.getElementById('mediaModal'));
        modal.hide();

        // Réinitialiser
        this.selectedMedia = null;
        this.currentTarget = null;
    }

    async uploadMedia() {
        const fileInput = document.getElementById('mediaUpload');
        const files = fileInput.files;
        
        if (files.length === 0) {
            this.showError('Veuillez sélectionner au moins un fichier');
            return;
        }

        // Simuler l'upload (en réalité, envoyer vers l'API Symfony)
        for (const file of files) {
            if (file.type.startsWith('image/')) {
                // Créer un aperçu temporaire
                const reader = new FileReader();
                reader.onload = (e) => {
                    this.addTemporaryMedia({
                        id: Date.now(),
                        filename: file.name,
                        url: e.target.result,
                        type: 'image',
                        size: this.formatFileSize(file.size)
                    });
                };
                reader.readAsDataURL(file);
            }
        }

        // Réinitialiser l'input
        fileInput.value = '';
        this.showSuccess('Fichier(s) uploadé(s) avec succès');
    }

    addTemporaryMedia(media) {
        const grid = document.getElementById('mediaGrid');
        const mediaHTML = `
            <div class="col-md-3">
                <div class="media-item card h-100" data-media-id="${media.id}" data-media-url="${media.url}" data-media-name="${media.filename}">
                    <div class="card-body p-2">
                        <img src="${media.url}" class="img-fluid rounded mb-2" alt="${media.filename}" style="height: 120px; object-fit: cover; width: 100%;">
                        <h6 class="card-title small mb-1">${media.filename}</h6>
                        <small class="text-muted">${media.size}</small>
                    </div>
                </div>
            </div>
        `;
        grid.insertAdjacentHTML('afterbegin', mediaHTML);
    }

    formatFileSize(bytes) {
        if (bytes === 0) return '0 B';
        const k = 1024;
        const sizes = ['B', 'KB', 'MB', 'GB'];
        const i = Math.floor(Math.log(bytes) / Math.log(k));
        return parseFloat((bytes / Math.pow(k, i)).toFixed(1)) + ' ' + sizes[i];
    }

    showError(message) {
        this.showToast(message, 'danger');
    }

    showSuccess(message) {
        this.showToast(message, 'success');
    }

    showToast(message, type) {
        const toast = document.createElement('div');
        toast.className = `toast align-items-center text-white bg-${type} border-0`;
        toast.setAttribute('role', 'alert');
        toast.innerHTML = `
            <div class="d-flex">
                <div class="toast-body">${message}</div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
            </div>
        `;
        
        let toastContainer = document.querySelector('.toast-container');
        if (!toastContainer) {
            toastContainer = document.createElement('div');
            toastContainer.className = 'toast-container position-fixed top-0 end-0 p-3';
            document.body.appendChild(toastContainer);
        }
        
        toastContainer.appendChild(toast);
        const bsToast = new bootstrap.Toast(toast);
        bsToast.show();
        
        toast.addEventListener('hidden.bs.toast', () => {
            toast.remove();
        });
    }
}

// Initialiser le sélecteur de médias quand le DOM est prêt
document.addEventListener('DOMContentLoaded', () => {
    new MediaSelector();
});