// assets/app.js
import './styles/app.css';
import './bootstrap';
import './js/menu-manager.js';

// Import Bootstrap JavaScript
import 'bootstrap';

// Administration JavaScript
if (document.body.classList.contains('admin-layout')) {
    // Auto-hide alerts after 5 seconds
    setTimeout(() => {
        const alerts = document.querySelectorAll('.alert:not(.alert-permanent)');
        alerts.forEach(alert => {
            if (alert.classList.contains('show')) {
                alert.classList.remove('show');
                setTimeout(() => alert.remove(), 150);
            }
        });
    }, 5000);
    
    // Confirm delete actions
    document.addEventListener('click', (e) => {
        if (e.target.closest('[data-confirm]')) {
            const message = e.target.closest('[data-confirm]').dataset.confirm;
            if (!confirm(message)) {
                e.preventDefault();
                return false;
            }
        }
    });
    
    // Auto-generate slug from title
    const titleInput = document.getElementById('title');
    const slugInput = document.getElementById('slug');
    
    if (titleInput && slugInput) {
        titleInput.addEventListener('input', function() {
            if (slugInput.value === '' || slugInput.dataset.auto === 'true') {
                const slug = generateSlug(this.value);
                slugInput.value = slug;
                slugInput.dataset.auto = 'true';
            }
        });
        
        slugInput.addEventListener('input', function() {
            this.dataset.auto = 'false';
        });
    }
    
    // Media selection handlers
    initializeMediaSelectors();
}

// Frontend JavaScript
if (!document.body.classList.contains('admin-layout')) {
    // Smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth'
                });
            }
        });
    });
    
    // Back to top button
    const backToTop = document.createElement('button');
    backToTop.innerHTML = '<i class="fas fa-arrow-up"></i>';
    backToTop.className = 'btn btn-primary position-fixed bottom-0 end-0 m-3 rounded-circle';
    backToTop.style.display = 'none';
    backToTop.style.zIndex = '1000';
    backToTop.addEventListener('click', () => {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });
    document.body.appendChild(backToTop);
    
    window.addEventListener('scroll', () => {
        if (window.pageYOffset > 300) {
            backToTop.style.display = 'block';
        } else {
            backToTop.style.display = 'none';
        }
    });
}

// Utility functions
function generateSlug(text) {
    return text
        .toLowerCase()
        .replace(/[àáâãäå]/g, 'a')
        .replace(/[èéêë]/g, 'e')
        .replace(/[ìíîï]/g, 'i')
        .replace(/[òóôõö]/g, 'o')
        .replace(/[ùúûü]/g, 'u')
        .replace(/[ç]/g, 'c')
        .replace(/[ñ]/g, 'n')
        .replace(/[^\w\s-]/g, '') // Remove special characters
        .replace(/[\s_-]+/g, '-') // Replace spaces and underscores with hyphens
        .replace(/^-+|-+$/g, ''); // Remove leading and trailing hyphens
}

// Media selection functionality
function initializeMediaSelectors() {
    // Initialize existing featured image selectors
    document.querySelectorAll('.featured-image-selector').forEach(selector => {
        initializeFeaturedImageSelector(selector);
    });
    
    // Handle "Add Media" buttons in content editors
    document.querySelectorAll('.btn-add-media').forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            const targetField = this.getAttribute('data-target');
            openMediaLibrary((selectedMedia) => {
                insertMediaIntoEditor(selectedMedia, this);
            }, { type: 'images', multiple: false });
        });
    });
}

function initializeFeaturedImageSelector(container) {
    const button = container.querySelector('.btn-select-featured-image');
    const hiddenInput = container.querySelector('input[type="hidden"]');
    const preview = container.querySelector('.featured-image-preview');
    const removeBtn = container.querySelector('.btn-remove-featured-image');
    
    if (!button || !hiddenInput || !preview) return;
    
    // Handle select button click
    button.addEventListener('click', function(e) {
        e.preventDefault();
        openMediaLibrary((selectedMedia) => {
            setFeaturedImage(container, selectedMedia);
        }, { type: 'images', multiple: false });
    });
    
    // Handle remove button click
    if (removeBtn) {
        removeBtn.addEventListener('click', function(e) {
            e.preventDefault();
            clearFeaturedImage(container);
        });
    }
    
    // Initialize display based on current value
    if (hiddenInput.value) {
        // Load existing image data
        fetch(`/admin/media/${hiddenInput.value}/info`)
            .then(response => response.json())
            .then(media => {
                displayFeaturedImage(container, media);
            })
            .catch(error => {
                console.error('Error loading featured image:', error);
                clearFeaturedImage(container);
            });
    }
}

function setFeaturedImage(container, media) {
    const hiddenInput = container.querySelector('input[type="hidden"]');
    hiddenInput.value = media.id;
    displayFeaturedImage(container, media);
}

function displayFeaturedImage(container, media) {
    const preview = container.querySelector('.featured-image-preview');
    const button = container.querySelector('.btn-select-featured-image');
    const removeBtn = container.querySelector('.btn-remove-featured-image');
    
    if (media.isImage) {
        preview.innerHTML = `
            <div class="position-relative">
                <img src="${media.thumbnailUrl || media.url}" 
                     alt="${media.originalName}" 
                     class="img-fluid rounded shadow-sm" 
                     style="max-width: 200px; max-height: 150px; object-fit: cover;">
                <div class="mt-2">
                    <small class="text-muted d-block">${media.originalName}</small>
                    <small class="text-muted">${media.fileSize || ''}</small>
                </div>
            </div>
        `;
    } else {
        preview.innerHTML = `
            <div class="d-flex align-items-center p-3 border rounded bg-light">
                <i class="fas fa-file fa-2x text-muted me-3"></i>
                <div>
                    <div class="fw-semibold">${media.originalName}</div>
                    <small class="text-muted">${media.fileSize || ''}</small>
                </div>
            </div>
        `;
    }
    
    preview.style.display = 'block';
    button.textContent = 'Changer l\'image mise en avant';
    button.classList.remove('btn-primary');
    button.classList.add('btn-outline-primary');
    
    if (removeBtn) {
        removeBtn.style.display = 'inline-block';
    }
}

function clearFeaturedImage(container) {
    const hiddenInput = container.querySelector('input[type="hidden"]');
    const preview = container.querySelector('.featured-image-preview');
    const button = container.querySelector('.btn-select-featured-image');
    const removeBtn = container.querySelector('.btn-remove-featured-image');
    
    hiddenInput.value = '';
    preview.innerHTML = '';
    preview.style.display = 'none';
    
    button.textContent = 'Sélectionner une image mise en avant';
    button.classList.remove('btn-outline-primary');
    button.classList.add('btn-primary');
    
    if (removeBtn) {
        removeBtn.style.display = 'none';
    }
}

function insertMediaIntoEditor(media, button) {
    const targetField = button.getAttribute('data-target');
    
    // Find the target textarea by data-target or fallback to closest content editor
    let contentTextarea = null;
    
    if (targetField) {
        // Try to find by ID or name attribute
        contentTextarea = document.getElementById(targetField) || 
                         document.querySelector(`textarea[name="${targetField}"]`) ||
                         document.querySelector(`textarea[name*="${targetField}"]`);
    }
    
    // Fallback to finding the closest textarea
    if (!contentTextarea) {
        const form = button.closest('form');
        contentTextarea = form.querySelector('textarea[name*="content"], textarea[id*="content"]');
    }
    
    if (!contentTextarea) {
        console.warn('No content editor found for target:', targetField);
        return;
    }
    
    let insertText = '';
    if (media.isImage) {
        insertText = `![${media.originalName}](${media.url})`;
    } else {
        insertText = `[${media.originalName}](${media.url})`;
    }
    
    // Insert at cursor position or append at end
    const cursorPosition = contentTextarea.selectionStart;
    const textBefore = contentTextarea.value.substring(0, cursorPosition);
    const textAfter = contentTextarea.value.substring(contentTextarea.selectionEnd);
    
    contentTextarea.value = textBefore + insertText + textAfter;
    
    // Place cursor after inserted text
    const newPosition = cursorPosition + insertText.length;
    contentTextarea.setSelectionRange(newPosition, newPosition);
    contentTextarea.focus();
    
    // Trigger change event
    contentTextarea.dispatchEvent(new Event('change', { bubbles: true }));
}

// Media library modal (for admin)
window.openMediaLibrary = function(callback, options = {}) {
    // Create modal
    const modal = document.createElement('div');
    modal.className = 'modal fade';
    modal.innerHTML = `
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <iframe src="/admin/media/selector?type=${options.type || 'all'}&multiple=${options.multiple || false}" 
                            width="100%" height="600" frameborder="0"></iframe>
                </div>
            </div>
        </div>
    `;
    
    document.body.appendChild(modal);
    const bootstrapModal = new bootstrap.Modal(modal);
    
    // Définir les fonctions de callback pour l'iframe
    window.receiveSelectedMedia = function(media) {
        if (callback) callback(media);
        bootstrapModal.hide();
    };
    
    window.receiveSelectedMedias = function(medias) {
        if (callback) callback(medias);
        bootstrapModal.hide();
    };
    
    bootstrapModal.show();
    
    // Nettoyage
    modal.addEventListener('hidden.bs.modal', () => {
        delete window.receiveSelectedMedia;
        delete window.receiveSelectedMedias;
        document.body.removeChild(modal);
    });
};

console.log('SymfPress initialized successfully');