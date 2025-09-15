<?php

namespace App\Service;

use App\Exception\ValidationException;

class SlugService
{
    public function generate(string $text): string
    {
        // Validation du texte d'entrée
        if (empty($text)) {
            throw ValidationException::requiredFieldMissing('text');
        }

        if (strlen($text) > 255) {
            throw ValidationException::invalidLength('text', strlen($text), null, 255);
        }

        // Vérifier que le texte contient au moins un caractère alphanumérique
        if (!preg_match('/[a-zA-Z0-9]/', $text)) {
            throw ValidationException::invalidFormat('text', $text, 'Le texte doit contenir au moins un caractère alphanumérique');
        }

        // Convertir en minuscules
        $slug = mb_strtolower($text, 'UTF-8');
        
        // Remplacer les caractères accentués
        $slug = $this->removeAccents($slug);
        
        // Remplacer les caractères non alphanumériques par des tirets
        $slug = preg_replace('/[^a-z0-9]+/i', '-', $slug);
        
        // Supprimer les tirets en début et fin
        $slug = trim($slug, '-');
        
        // Supprimer les tirets multiples
        $slug = preg_replace('/-+/', '-', $slug);
        
        // Validation du slug généré
        if (empty($slug)) {
            throw ValidationException::customConstraintViolation('text', 'Le texte ne peut pas être converti en slug valide');
        }
        
        return $slug;
    }
    
    public function makeUnique(string $baseSlug, callable $existsCallback): string
    {
        // Validation du slug de base
        if (empty($baseSlug)) {
            throw ValidationException::requiredFieldMissing('baseSlug');
        }

        if (!is_callable($existsCallback)) {
            throw ValidationException::invalidDataType('existsCallback', 'unknown', 'callable');
        }

        $slug = $baseSlug;
        $counter = 1;
        $maxAttempts = 1000; // Limite de sécurité pour éviter les boucles infinies
        
        while ($existsCallback($slug)) {
            if ($counter > $maxAttempts) {
                throw ValidationException::customConstraintViolation('baseSlug', "Impossible de générer un slug unique après {$maxAttempts} tentatives");
            }
            
            $slug = $baseSlug . '-' . $counter;
            $counter++;
        }
        
        return $slug;
    }
    
    /**
     * Valide qu'un slug respecte le format attendu
     *
     * @param string $slug Le slug à valider
     * @throws ValidationException Si le slug n'est pas valide
     */
    public function validateSlug(string $slug): void
    {
        if (empty($slug)) {
            throw ValidationException::requiredFieldMissing('slug');
        }

        if (strlen($slug) > 255) {
            throw ValidationException::invalidLength('slug', strlen($slug), null, 255);
        }

        // Le slug doit contenir seulement des lettres minuscules, chiffres et tirets
        if (!preg_match('/^[a-z0-9-]+$/', $slug)) {
            throw ValidationException::invalidFormat('slug', $slug, 'lettres minuscules, chiffres et tirets uniquement');
        }

        // Ne peut pas commencer ou finir par un tiret
        if (str_starts_with($slug, '-') || str_ends_with($slug, '-')) {
            throw ValidationException::invalidFormat('slug', $slug, 'ne peut pas commencer ou finir par un tiret');
        }

        // Ne peut pas contenir des tirets multiples
        if (strpos($slug, '--') !== false) {
            throw ValidationException::invalidFormat('slug', $slug, 'ne peut pas contenir des tirets multiples consécutifs');
        }
    }
    
    private function removeAccents(string $text): string
    {
        $accents = [
            'À' => 'A', 'Á' => 'A', 'Â' => 'A', 'Ã' => 'A', 'Ä' => 'A', 'Å' => 'A',
            'à' => 'a', 'á' => 'a', 'â' => 'a', 'ã' => 'a', 'ä' => 'a', 'å' => 'a',
            'È' => 'E', 'É' => 'E', 'Ê' => 'E', 'Ë' => 'E',
            'è' => 'e', 'é' => 'e', 'ê' => 'e', 'ë' => 'e',
            'Ì' => 'I', 'Í' => 'I', 'Î' => 'I', 'Ï' => 'I',
            'ì' => 'i', 'í' => 'i', 'î' => 'i', 'ï' => 'i',
            'Ò' => 'O', 'Ó' => 'O', 'Ô' => 'O', 'Õ' => 'O', 'Ö' => 'O',
            'ò' => 'o', 'ó' => 'o', 'ô' => 'o', 'õ' => 'o', 'ö' => 'o',
            'Ù' => 'U', 'Ú' => 'U', 'Û' => 'U', 'Ü' => 'U',
            'ù' => 'u', 'ú' => 'u', 'û' => 'u', 'ü' => 'u',
            'Ç' => 'C', 'ç' => 'c',
            'Ñ' => 'N', 'ñ' => 'n',
            'Ÿ' => 'Y', 'ÿ' => 'y', 'ý' => 'y',
            'Œ' => 'OE', 'œ' => 'oe',
            'Æ' => 'AE', 'æ' => 'ae'
        ];
        
        return strtr($text, $accents);
    }
}