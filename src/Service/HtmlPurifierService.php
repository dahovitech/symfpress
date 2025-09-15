<?php

namespace App\Service;

use HTMLPurifier;
use HTMLPurifier_Config;

/**
 * Service de purification HTML pour prévenir les attaques XSS
 */
class HtmlPurifierService
{
    private HTMLPurifier $purifier;

    public function __construct()
    {
        $config = HTMLPurifier_Config::createDefault();
        
        // Configuration de sécurité
        $config->set('HTML.Allowed', 'p,br,strong,b,em,i,u,a[href|title|target],ul,ol,li,h1,h2,h3,h4,h5,h6,img[src|alt|width|height],blockquote,code,pre,hr,table,thead,tbody,tr,th,td,div[class],span[class]');
        $config->set('HTML.AllowedAttributes', 'href,title,target,src,alt,width,height,class');
        $config->set('Attr.AllowedRel', 'nofollow,noopener,noreferrer');
        $config->set('Attr.AllowedFrameTargets', ['_blank', '_self', '_parent', '_top']);
        
        // Empêcher les liens JavaScript
        $config->set('URI.DisableExternalResources', false);
        $config->set('URI.DisableResources', false);
        $config->set('Attr.EnableID', false);
        
        // Configuration pour les images
        $config->set('HTML.SafeIframe', true);
        $config->set('URI.SafeIframeRegexp', '%^(https?:)?//(www\.youtube\.com/embed/|player\.vimeo\.com/video/)%');
        
        $this->purifier = new HTMLPurifier($config);
    }

    /**
     * Purifie le contenu HTML pour prévenir les attaques XSS
     */
    public function purify(string $html): string
    {
        return $this->purifier->purify($html);
    }

    /**
     * Version stricte qui ne permet que le texte basique avec formatage minimal
     */
    public function purifyStrict(string $html): string
    {
        $config = HTMLPurifier_Config::createDefault();
        $config->set('HTML.Allowed', 'p,br,strong,b,em,i,u');
        
        $strictPurifier = new HTMLPurifier($config);
        return $strictPurifier->purify($html);
    }
}