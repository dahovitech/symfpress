<?php

namespace App\Service;

class SlugService
{
    public function generate(string $text): string
    {
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
        
        return $slug;
    }
    
    public function makeUnique(string $baseSlug, callable $existsCallback): string
    {
        $slug = $baseSlug;
        $counter = 1;
        
        while ($existsCallback($slug)) {
            $slug = $baseSlug . '-' . $counter;
            $counter++;
        }
        
        return $slug;
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