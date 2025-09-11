<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\CoreExtension;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;
use Twig\TemplateWrapper;

/* admin/media/selector.html.twig */
class __TwigTemplate_685769cbe1f07a97c2e6988d0cd2f20a extends Template
{
    private Source $source;
    /**
     * @var array<string, Template>
     */
    private array $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 1
        return "admin/base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/media/selector.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/media/selector.html.twig"));

        $this->parent = $this->load("admin/base.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 3
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        yield "Sélecteur de Médias";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 5
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 6
        yield "<div class=\"container-fluid\">
    <div class=\"d-flex justify-content-between align-items-center mb-4\">
        <h1 class=\"h4 mb-0\">📁 Sélecteur de Médias</h1>
        <div class=\"d-flex gap-2\">
            <button type=\"button\" class=\"btn btn-success btn-sm\" data-bs-toggle=\"modal\" data-bs-target=\"#uploadModal\">
                <i class=\"fas fa-plus me-1\"></i>Ajouter
            </button>
            ";
        // line 13
        if ((($tmp = (isset($context["multiple"]) || array_key_exists("multiple", $context) ? $context["multiple"] : (function () { throw new RuntimeError('Variable "multiple" does not exist.', 13, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 14
            yield "                <button type=\"button\" class=\"btn btn-primary\" id=\"confirm-selection\" style=\"display: none;\">
                    <i class=\"fas fa-check me-1\"></i>Valider la sélection
                </button>
            ";
        }
        // line 18
        yield "        </div>
    </div>

    <!-- Filtres rapides -->
    <div class=\"mb-3\">
        <div class=\"btn-group\" role=\"group\">
            <input type=\"radio\" class=\"btn-check\" name=\"typeFilter\" id=\"type-all\" value=\"all\" ";
        // line 24
        yield ((((isset($context["type"]) || array_key_exists("type", $context) ? $context["type"] : (function () { throw new RuntimeError('Variable "type" does not exist.', 24, $this->source); })()) == "all")) ? ("checked") : (""));
        yield ">
            <label class=\"btn btn-outline-primary\" for=\"type-all\">Tous</label>
            
            <input type=\"radio\" class=\"btn-check\" name=\"typeFilter\" id=\"type-images\" value=\"images\" ";
        // line 27
        yield ((((isset($context["type"]) || array_key_exists("type", $context) ? $context["type"] : (function () { throw new RuntimeError('Variable "type" does not exist.', 27, $this->source); })()) == "images")) ? ("checked") : (""));
        yield ">
            <label class=\"btn btn-outline-primary\" for=\"type-images\">Images</label>
            
            <input type=\"radio\" class=\"btn-check\" name=\"typeFilter\" id=\"type-documents\" value=\"documents\" ";
        // line 30
        yield ((((isset($context["type"]) || array_key_exists("type", $context) ? $context["type"] : (function () { throw new RuntimeError('Variable "type" does not exist.', 30, $this->source); })()) == "documents")) ? ("checked") : (""));
        yield ">
            <label class=\"btn btn-outline-primary\" for=\"type-documents\">Documents</label>
        </div>
    </div>

    ";
        // line 35
        if (Twig\Extension\CoreExtension::testEmpty((isset($context["medias"]) || array_key_exists("medias", $context) ? $context["medias"] : (function () { throw new RuntimeError('Variable "medias" does not exist.', 35, $this->source); })()))) {
            // line 36
            yield "        <div class=\"text-center py-5\">
            <i class=\"fas fa-folder-open text-muted mb-3\" style=\"font-size: 3rem;\"></i>
            <h5 class=\"text-muted\">Aucun média disponible</h5>
            <p class=\"text-muted mb-3\">Commencez par uploader des fichiers.</p>
            <button type=\"button\" class=\"btn btn-primary\" data-bs-toggle=\"modal\" data-bs-target=\"#uploadModal\">
                <i class=\"fas fa-cloud-upload-alt me-2\"></i>Uploader des fichiers
            </button>
        </div>
    ";
        } else {
            // line 45
            yield "        <!-- Grille de sélection -->
        <div class=\"row g-3\" id=\"media-selector-grid\">
            ";
            // line 47
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["medias"]) || array_key_exists("medias", $context) ? $context["medias"] : (function () { throw new RuntimeError('Variable "medias" does not exist.', 47, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["media"]) {
                // line 48
                yield "            <div class=\"col-lg-2 col-md-3 col-sm-4 col-6\">
                <div class=\"media-selector-item card h-100 ";
                // line 49
                yield (((($tmp = (isset($context["multiple"]) || array_key_exists("multiple", $context) ? $context["multiple"] : (function () { throw new RuntimeError('Variable "multiple" does not exist.', 49, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("selectable-multiple") : ("selectable-single"));
                yield "\" 
                     data-media-id=\"";
                // line 50
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["media"], "id", [], "any", false, false, false, 50), "html", null, true);
                yield "\"
                     data-media-url=\"";
                // line 51
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["media"], "url", [], "any", false, false, false, 51), "html", null, true);
                yield "\"
                     data-media-name=\"";
                // line 52
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["media"], "originalName", [], "any", false, false, false, 52), "html", null, true);
                yield "\"
                     data-media-alt=\"";
                // line 53
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["media"], "alt", [], "any", false, false, false, 53), "html", null, true);
                yield "\"
                     data-media-width=\"";
                // line 54
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["media"], "width", [], "any", false, false, false, 54), "html", null, true);
                yield "\"
                     data-media-height=\"";
                // line 55
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["media"], "height", [], "any", false, false, false, 55), "html", null, true);
                yield "\"
                     data-media-type=\"";
                // line 56
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["media"], "mimeType", [], "any", false, false, false, 56), "html", null, true);
                yield "\">
                    
                    <div class=\"position-relative\">
                        ";
                // line 59
                if ((($tmp = (isset($context["multiple"]) || array_key_exists("multiple", $context) ? $context["multiple"] : (function () { throw new RuntimeError('Variable "multiple" does not exist.', 59, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 60
                    yield "                        <!-- Checkbox pour sélection multiple -->
                        <div class=\"position-absolute top-0 start-0 p-2\">
                            <input class=\"form-check-input media-selector-checkbox\" type=\"checkbox\" 
                                   value=\"";
                    // line 63
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["media"], "id", [], "any", false, false, false, 63), "html", null, true);
                    yield "\">
                        </div>
                        ";
                }
                // line 66
                yield "                        
                        <!-- Indicateur de sélection -->
                        <div class=\"position-absolute top-0 end-0 p-2\">
                            <div class=\"selection-indicator\" style=\"display: none;\">
                                <i class=\"fas fa-check-circle text-success bg-white rounded-circle\"></i>
                            </div>
                        </div>
                        
                        <!-- Aperçu -->
                        <div class=\"media-preview\" style=\"height: 120px; overflow: hidden; cursor: pointer;\">
                            ";
                // line 76
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["media"], "isImage", [], "any", false, false, false, 76)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 77
                    yield "                                <img src=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["media"], "url", [], "any", false, false, false, 77), "html", null, true);
                    yield "\" 
                                     alt=\"";
                    // line 78
                    yield (((CoreExtension::getAttribute($this->env, $this->source, $context["media"], "alt", [], "any", true, true, false, 78) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, $context["media"], "alt", [], "any", false, false, false, 78)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["media"], "alt", [], "any", false, false, false, 78), "html", null, true)) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["media"], "originalName", [], "any", false, false, false, 78), "html", null, true)));
                    yield "\" 
                                     class=\"w-100 h-100\" 
                                     style=\"object-fit: cover;\">
                            ";
                } else {
                    // line 82
                    yield "                                <div class=\"d-flex align-items-center justify-content-center h-100 bg-light\">
                                    ";
                    // line 83
                    if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["media"], "isPdf", [], "any", false, false, false, 83)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                        // line 84
                        yield "                                        <i class=\"fas fa-file-pdf text-danger\" style=\"font-size: 2rem;\"></i>
                                    ";
                    } elseif ((($tmp = CoreExtension::getAttribute($this->env, $this->source,                     // line 85
$context["media"], "isVideo", [], "any", false, false, false, 85)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                        // line 86
                        yield "                                        <i class=\"fas fa-file-video text-primary\" style=\"font-size: 2rem;\"></i>
                                    ";
                    } elseif ((($tmp = CoreExtension::getAttribute($this->env, $this->source,                     // line 87
$context["media"], "isAudio", [], "any", false, false, false, 87)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                        // line 88
                        yield "                                        <i class=\"fas fa-file-audio text-success\" style=\"font-size: 2rem;\"></i>
                                    ";
                    } else {
                        // line 90
                        yield "                                        <i class=\"fas fa-file text-secondary\" style=\"font-size: 2rem;\"></i>
                                    ";
                    }
                    // line 92
                    yield "                                </div>
                            ";
                }
                // line 94
                yield "                        </div>
                    </div>
                    
                    <!-- Informations -->
                    <div class=\"card-body p-2\">
                        <h6 class=\"card-title mb-1 small\" title=\"";
                // line 99
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["media"], "originalName", [], "any", false, false, false, 99), "html", null, true);
                yield "\">
                            ";
                // line 100
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["media"], "originalName", [], "any", false, false, false, 100), 0, 15), "html", null, true);
                if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["media"], "originalName", [], "any", false, false, false, 100)) > 15)) {
                    yield "...";
                }
                // line 101
                yield "                        </h6>
                        <small class=\"text-muted\">";
                // line 102
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["media"], "formattedFileSize", [], "any", false, false, false, 102), "html", null, true);
                yield "</small>
                        ";
                // line 103
                if ((CoreExtension::getAttribute($this->env, $this->source, $context["media"], "width", [], "any", false, false, false, 103) && CoreExtension::getAttribute($this->env, $this->source, $context["media"], "height", [], "any", false, false, false, 103))) {
                    // line 104
                    yield "                            <small class=\"text-muted d-block\">";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["media"], "width", [], "any", false, false, false, 104), "html", null, true);
                    yield "x";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["media"], "height", [], "any", false, false, false, 104), "html", null, true);
                    yield "</small>
                        ";
                }
                // line 106
                yield "                    </div>
                </div>
            </div>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['media'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 110
            yield "        </div>
    ";
        }
        // line 112
        yield "</div>

<!-- Modal d'upload -->
<div class=\"modal fade\" id=\"uploadModal\" tabindex=\"-1\">
    <div class=\"modal-dialog\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <h5 class=\"modal-title\">Uploader des fichiers</h5>
                <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\"></button>
            </div>
            <div class=\"modal-body\">
                <div id=\"quick-dropzone\" class=\"border border-dashed border-2 rounded p-4 text-center\">
                    <i class=\"fas fa-cloud-upload-alt text-primary mb-2\" style=\"font-size: 2rem;\"></i>
                    <p class=\"mb-2\">Glissez-déposez vos fichiers ici</p>
                    <button type=\"button\" class=\"btn btn-primary btn-sm\" id=\"quick-browse\">Parcourir</button>
                    <input type=\"file\" id=\"quick-file-input\" multiple style=\"display: none;\">
                </div>
                <div id=\"quick-upload-results\" class=\"mt-3\" style=\"display: none;\"></div>
            </div>
        </div>
    </div>
</div>

<!-- CSS personnalisé -->
<style>
.media-selector-item {
    cursor: pointer;
    transition: all 0.2s;
    border: 2px solid transparent;
}

.media-selector-item:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
}

.media-selector-item.selected {
    border-color: #0d6efd;
    background-color: #f8f9ff;
}

.media-preview img {
    transition: transform 0.2s;
}

.media-selector-item:hover .media-preview img {
    transform: scale(1.05);
}

.selection-indicator {
    font-size: 1.2rem;
}
</style>

<!-- JavaScript -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const isMultiple = ";
        // line 169
        yield (((($tmp = (isset($context["multiple"]) || array_key_exists("multiple", $context) ? $context["multiple"] : (function () { throw new RuntimeError('Variable "multiple" does not exist.', 169, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("true") : ("false"));
        yield ";
    const selectedItems = new Set();
    const confirmBtn = document.getElementById('confirm-selection');
    
    // Gestion de la sélection
    document.querySelectorAll('.media-selector-item').forEach(item => {
        item.addEventListener('click', function(e) {
            const mediaId = this.dataset.mediaId;
            
            if (isMultiple) {
                // Sélection multiple
                const checkbox = this.querySelector('.media-selector-checkbox');
                const indicator = this.querySelector('.selection-indicator');
                
                if (this.classList.contains('selected')) {
                    // Désélectionner
                    this.classList.remove('selected');
                    checkbox.checked = false;
                    indicator.style.display = 'none';
                    selectedItems.delete(mediaId);
                } else {
                    // Sélectionner
                    this.classList.add('selected');
                    checkbox.checked = true;
                    indicator.style.display = 'block';
                    selectedItems.add(mediaId);
                }
                
                // Afficher/masquer le bouton de confirmation
                confirmBtn.style.display = selectedItems.size > 0 ? 'block' : 'none';
                confirmBtn.textContent = `Valider (\${selectedItems.size})`;
                
            } else {
                // Sélection simple - retourner immédiatement
                selectSingleMedia(this);
            }
        });
    });
    
    // Gestion des checkboxes
    if (isMultiple) {
        document.querySelectorAll('.media-selector-checkbox').forEach(checkbox => {
            checkbox.addEventListener('change', function(e) {
                e.stopPropagation();
                const item = this.closest('.media-selector-item');
                item.click();
            });
        });
        
        // Bouton de confirmation pour sélection multiple
        if (confirmBtn) {
            confirmBtn.addEventListener('click', function() {
                const selectedMedias = [];
                selectedItems.forEach(mediaId => {
                    const item = document.querySelector(`[data-media-id=\"\${mediaId}\"]`);
                    selectedMedias.push(getMediaData(item));
                });
                
                // Envoyer les données au parent
                if (window.parent && window.parent.receiveSelectedMedias) {
                    window.parent.receiveSelectedMedias(selectedMedias);
                } else {
                    console.log('Medias sélectionnés:', selectedMedias);
                }
            });
        }
    }
    
    function selectSingleMedia(item) {
        const mediaData = getMediaData(item);
        
        // Envoyer au parent
        if (window.parent && window.parent.receiveSelectedMedia) {
            window.parent.receiveSelectedMedia(mediaData);
        } else {
            console.log('Media sélectionné:', mediaData);
        }
    }
    
    function getMediaData(item) {
        return {
            id: item.dataset.mediaId,
            url: item.dataset.mediaUrl,
            name: item.dataset.mediaName,
            alt: item.dataset.mediaAlt,
            width: item.dataset.mediaWidth,
            height: item.dataset.mediaHeight,
            type: item.dataset.mediaType
        };
    }
    
    // Filtres de type
    document.querySelectorAll('input[name=\"typeFilter\"]').forEach(radio => {
        radio.addEventListener('change', function() {
            const currentUrl = new URL(window.location);
            currentUrl.searchParams.set('type', this.value);
            window.location.href = currentUrl.toString();
        });
    });
    
    // Upload rapide
    const quickDropzone = document.getElementById('quick-dropzone');
    const quickFileInput = document.getElementById('quick-file-input');
    const quickBrowse = document.getElementById('quick-browse');
    const quickResults = document.getElementById('quick-upload-results');
    
    quickBrowse.addEventListener('click', () => quickFileInput.click());
    
    quickFileInput.addEventListener('change', function() {
        uploadFiles(this.files);
    });
    
    quickDropzone.addEventListener('dragover', function(e) {
        e.preventDefault();
        this.classList.add('border-primary');
    });
    
    quickDropzone.addEventListener('dragleave', function(e) {
        e.preventDefault();
        this.classList.remove('border-primary');
    });
    
    quickDropzone.addEventListener('drop', function(e) {
        e.preventDefault();
        this.classList.remove('border-primary');
        uploadFiles(e.dataTransfer.files);
    });
    
    function uploadFiles(files) {
        const formData = new FormData();
        Array.from(files).forEach(file => formData.append('files[]', file));
        
        quickResults.innerHTML = '<div class=\"text-center\"><div class=\"spinner-border spinner-border-sm\"></div> Upload en cours...</div>';
        quickResults.style.display = 'block';
        
        fetch('";
        // line 304
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_media_upload");
        yield "', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.uploaded_count > 0) {
                quickResults.innerHTML = `<div class=\"alert alert-success\">\${data.uploaded_count} fichier(s) uploadé(s)</div>`;
                setTimeout(() => {
                    location.reload();
                }, 1000);
            } else {
                quickResults.innerHTML = '<div class=\"alert alert-danger\">Erreur d\\'upload</div>';
            }
        })
        .catch(error => {
            quickResults.innerHTML = '<div class=\"alert alert-danger\">Erreur réseau</div>';
        });
    }
});
</script>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "admin/media/selector.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable(): bool
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  512 => 304,  374 => 169,  315 => 112,  311 => 110,  302 => 106,  294 => 104,  292 => 103,  288 => 102,  285 => 101,  280 => 100,  276 => 99,  269 => 94,  265 => 92,  261 => 90,  257 => 88,  255 => 87,  252 => 86,  250 => 85,  247 => 84,  245 => 83,  242 => 82,  235 => 78,  230 => 77,  228 => 76,  216 => 66,  210 => 63,  205 => 60,  203 => 59,  197 => 56,  193 => 55,  189 => 54,  185 => 53,  181 => 52,  177 => 51,  173 => 50,  169 => 49,  166 => 48,  162 => 47,  158 => 45,  147 => 36,  145 => 35,  137 => 30,  131 => 27,  125 => 24,  117 => 18,  111 => 14,  109 => 13,  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'admin/base.html.twig' %}

{% block title %}Sélecteur de Médias{% endblock %}

{% block body %}
<div class=\"container-fluid\">
    <div class=\"d-flex justify-content-between align-items-center mb-4\">
        <h1 class=\"h4 mb-0\">📁 Sélecteur de Médias</h1>
        <div class=\"d-flex gap-2\">
            <button type=\"button\" class=\"btn btn-success btn-sm\" data-bs-toggle=\"modal\" data-bs-target=\"#uploadModal\">
                <i class=\"fas fa-plus me-1\"></i>Ajouter
            </button>
            {% if multiple %}
                <button type=\"button\" class=\"btn btn-primary\" id=\"confirm-selection\" style=\"display: none;\">
                    <i class=\"fas fa-check me-1\"></i>Valider la sélection
                </button>
            {% endif %}
        </div>
    </div>

    <!-- Filtres rapides -->
    <div class=\"mb-3\">
        <div class=\"btn-group\" role=\"group\">
            <input type=\"radio\" class=\"btn-check\" name=\"typeFilter\" id=\"type-all\" value=\"all\" {{ type == 'all' ? 'checked' : '' }}>
            <label class=\"btn btn-outline-primary\" for=\"type-all\">Tous</label>
            
            <input type=\"radio\" class=\"btn-check\" name=\"typeFilter\" id=\"type-images\" value=\"images\" {{ type == 'images' ? 'checked' : '' }}>
            <label class=\"btn btn-outline-primary\" for=\"type-images\">Images</label>
            
            <input type=\"radio\" class=\"btn-check\" name=\"typeFilter\" id=\"type-documents\" value=\"documents\" {{ type == 'documents' ? 'checked' : '' }}>
            <label class=\"btn btn-outline-primary\" for=\"type-documents\">Documents</label>
        </div>
    </div>

    {% if medias is empty %}
        <div class=\"text-center py-5\">
            <i class=\"fas fa-folder-open text-muted mb-3\" style=\"font-size: 3rem;\"></i>
            <h5 class=\"text-muted\">Aucun média disponible</h5>
            <p class=\"text-muted mb-3\">Commencez par uploader des fichiers.</p>
            <button type=\"button\" class=\"btn btn-primary\" data-bs-toggle=\"modal\" data-bs-target=\"#uploadModal\">
                <i class=\"fas fa-cloud-upload-alt me-2\"></i>Uploader des fichiers
            </button>
        </div>
    {% else %}
        <!-- Grille de sélection -->
        <div class=\"row g-3\" id=\"media-selector-grid\">
            {% for media in medias %}
            <div class=\"col-lg-2 col-md-3 col-sm-4 col-6\">
                <div class=\"media-selector-item card h-100 {{ multiple ? 'selectable-multiple' : 'selectable-single' }}\" 
                     data-media-id=\"{{ media.id }}\"
                     data-media-url=\"{{ media.url }}\"
                     data-media-name=\"{{ media.originalName }}\"
                     data-media-alt=\"{{ media.alt }}\"
                     data-media-width=\"{{ media.width }}\"
                     data-media-height=\"{{ media.height }}\"
                     data-media-type=\"{{ media.mimeType }}\">
                    
                    <div class=\"position-relative\">
                        {% if multiple %}
                        <!-- Checkbox pour sélection multiple -->
                        <div class=\"position-absolute top-0 start-0 p-2\">
                            <input class=\"form-check-input media-selector-checkbox\" type=\"checkbox\" 
                                   value=\"{{ media.id }}\">
                        </div>
                        {% endif %}
                        
                        <!-- Indicateur de sélection -->
                        <div class=\"position-absolute top-0 end-0 p-2\">
                            <div class=\"selection-indicator\" style=\"display: none;\">
                                <i class=\"fas fa-check-circle text-success bg-white rounded-circle\"></i>
                            </div>
                        </div>
                        
                        <!-- Aperçu -->
                        <div class=\"media-preview\" style=\"height: 120px; overflow: hidden; cursor: pointer;\">
                            {% if media.isImage %}
                                <img src=\"{{ media.url }}\" 
                                     alt=\"{{ media.alt ?? media.originalName }}\" 
                                     class=\"w-100 h-100\" 
                                     style=\"object-fit: cover;\">
                            {% else %}
                                <div class=\"d-flex align-items-center justify-content-center h-100 bg-light\">
                                    {% if media.isPdf %}
                                        <i class=\"fas fa-file-pdf text-danger\" style=\"font-size: 2rem;\"></i>
                                    {% elseif media.isVideo %}
                                        <i class=\"fas fa-file-video text-primary\" style=\"font-size: 2rem;\"></i>
                                    {% elseif media.isAudio %}
                                        <i class=\"fas fa-file-audio text-success\" style=\"font-size: 2rem;\"></i>
                                    {% else %}
                                        <i class=\"fas fa-file text-secondary\" style=\"font-size: 2rem;\"></i>
                                    {% endif %}
                                </div>
                            {% endif %}
                        </div>
                    </div>
                    
                    <!-- Informations -->
                    <div class=\"card-body p-2\">
                        <h6 class=\"card-title mb-1 small\" title=\"{{ media.originalName }}\">
                            {{ media.originalName|slice(0, 15) }}{% if media.originalName|length > 15 %}...{% endif %}
                        </h6>
                        <small class=\"text-muted\">{{ media.formattedFileSize }}</small>
                        {% if media.width and media.height %}
                            <small class=\"text-muted d-block\">{{ media.width }}x{{ media.height }}</small>
                        {% endif %}
                    </div>
                </div>
            </div>
            {% endfor %}
        </div>
    {% endif %}
</div>

<!-- Modal d'upload -->
<div class=\"modal fade\" id=\"uploadModal\" tabindex=\"-1\">
    <div class=\"modal-dialog\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <h5 class=\"modal-title\">Uploader des fichiers</h5>
                <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\"></button>
            </div>
            <div class=\"modal-body\">
                <div id=\"quick-dropzone\" class=\"border border-dashed border-2 rounded p-4 text-center\">
                    <i class=\"fas fa-cloud-upload-alt text-primary mb-2\" style=\"font-size: 2rem;\"></i>
                    <p class=\"mb-2\">Glissez-déposez vos fichiers ici</p>
                    <button type=\"button\" class=\"btn btn-primary btn-sm\" id=\"quick-browse\">Parcourir</button>
                    <input type=\"file\" id=\"quick-file-input\" multiple style=\"display: none;\">
                </div>
                <div id=\"quick-upload-results\" class=\"mt-3\" style=\"display: none;\"></div>
            </div>
        </div>
    </div>
</div>

<!-- CSS personnalisé -->
<style>
.media-selector-item {
    cursor: pointer;
    transition: all 0.2s;
    border: 2px solid transparent;
}

.media-selector-item:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
}

.media-selector-item.selected {
    border-color: #0d6efd;
    background-color: #f8f9ff;
}

.media-preview img {
    transition: transform 0.2s;
}

.media-selector-item:hover .media-preview img {
    transform: scale(1.05);
}

.selection-indicator {
    font-size: 1.2rem;
}
</style>

<!-- JavaScript -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const isMultiple = {{ multiple ? 'true' : 'false' }};
    const selectedItems = new Set();
    const confirmBtn = document.getElementById('confirm-selection');
    
    // Gestion de la sélection
    document.querySelectorAll('.media-selector-item').forEach(item => {
        item.addEventListener('click', function(e) {
            const mediaId = this.dataset.mediaId;
            
            if (isMultiple) {
                // Sélection multiple
                const checkbox = this.querySelector('.media-selector-checkbox');
                const indicator = this.querySelector('.selection-indicator');
                
                if (this.classList.contains('selected')) {
                    // Désélectionner
                    this.classList.remove('selected');
                    checkbox.checked = false;
                    indicator.style.display = 'none';
                    selectedItems.delete(mediaId);
                } else {
                    // Sélectionner
                    this.classList.add('selected');
                    checkbox.checked = true;
                    indicator.style.display = 'block';
                    selectedItems.add(mediaId);
                }
                
                // Afficher/masquer le bouton de confirmation
                confirmBtn.style.display = selectedItems.size > 0 ? 'block' : 'none';
                confirmBtn.textContent = `Valider (\${selectedItems.size})`;
                
            } else {
                // Sélection simple - retourner immédiatement
                selectSingleMedia(this);
            }
        });
    });
    
    // Gestion des checkboxes
    if (isMultiple) {
        document.querySelectorAll('.media-selector-checkbox').forEach(checkbox => {
            checkbox.addEventListener('change', function(e) {
                e.stopPropagation();
                const item = this.closest('.media-selector-item');
                item.click();
            });
        });
        
        // Bouton de confirmation pour sélection multiple
        if (confirmBtn) {
            confirmBtn.addEventListener('click', function() {
                const selectedMedias = [];
                selectedItems.forEach(mediaId => {
                    const item = document.querySelector(`[data-media-id=\"\${mediaId}\"]`);
                    selectedMedias.push(getMediaData(item));
                });
                
                // Envoyer les données au parent
                if (window.parent && window.parent.receiveSelectedMedias) {
                    window.parent.receiveSelectedMedias(selectedMedias);
                } else {
                    console.log('Medias sélectionnés:', selectedMedias);
                }
            });
        }
    }
    
    function selectSingleMedia(item) {
        const mediaData = getMediaData(item);
        
        // Envoyer au parent
        if (window.parent && window.parent.receiveSelectedMedia) {
            window.parent.receiveSelectedMedia(mediaData);
        } else {
            console.log('Media sélectionné:', mediaData);
        }
    }
    
    function getMediaData(item) {
        return {
            id: item.dataset.mediaId,
            url: item.dataset.mediaUrl,
            name: item.dataset.mediaName,
            alt: item.dataset.mediaAlt,
            width: item.dataset.mediaWidth,
            height: item.dataset.mediaHeight,
            type: item.dataset.mediaType
        };
    }
    
    // Filtres de type
    document.querySelectorAll('input[name=\"typeFilter\"]').forEach(radio => {
        radio.addEventListener('change', function() {
            const currentUrl = new URL(window.location);
            currentUrl.searchParams.set('type', this.value);
            window.location.href = currentUrl.toString();
        });
    });
    
    // Upload rapide
    const quickDropzone = document.getElementById('quick-dropzone');
    const quickFileInput = document.getElementById('quick-file-input');
    const quickBrowse = document.getElementById('quick-browse');
    const quickResults = document.getElementById('quick-upload-results');
    
    quickBrowse.addEventListener('click', () => quickFileInput.click());
    
    quickFileInput.addEventListener('change', function() {
        uploadFiles(this.files);
    });
    
    quickDropzone.addEventListener('dragover', function(e) {
        e.preventDefault();
        this.classList.add('border-primary');
    });
    
    quickDropzone.addEventListener('dragleave', function(e) {
        e.preventDefault();
        this.classList.remove('border-primary');
    });
    
    quickDropzone.addEventListener('drop', function(e) {
        e.preventDefault();
        this.classList.remove('border-primary');
        uploadFiles(e.dataTransfer.files);
    });
    
    function uploadFiles(files) {
        const formData = new FormData();
        Array.from(files).forEach(file => formData.append('files[]', file));
        
        quickResults.innerHTML = '<div class=\"text-center\"><div class=\"spinner-border spinner-border-sm\"></div> Upload en cours...</div>';
        quickResults.style.display = 'block';
        
        fetch('{{ path('admin_media_upload') }}', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.uploaded_count > 0) {
                quickResults.innerHTML = `<div class=\"alert alert-success\">\${data.uploaded_count} fichier(s) uploadé(s)</div>`;
                setTimeout(() => {
                    location.reload();
                }, 1000);
            } else {
                quickResults.innerHTML = '<div class=\"alert alert-danger\">Erreur d\\'upload</div>';
            }
        })
        .catch(error => {
            quickResults.innerHTML = '<div class=\"alert alert-danger\">Erreur réseau</div>';
        });
    }
});
</script>
{% endblock %}", "admin/media/selector.html.twig", "/workspace/symfpress/templates/admin/media/selector.html.twig");
    }
}
