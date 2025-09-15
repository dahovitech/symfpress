<?php

namespace App\Exception;

/**
 * Exception spécialisée pour les erreurs de validation
 * 
 * Cette exception est levée lorsque des données ne respectent pas
 * les règles de validation définies dans l'application.
 */
class ValidationException extends \Exception
{
    /**
     * Code d'erreur pour champ requis manquant
     */
    public const REQUIRED_FIELD_MISSING = 6001;

    /**
     * Code d'erreur pour format invalide
     */
    public const INVALID_FORMAT = 6002;

    /**
     * Code d'erreur pour valeur hors limites
     */
    public const OUT_OF_RANGE = 6003;

    /**
     * Code d'erreur pour valeur dupliquée
     */
    public const DUPLICATE_VALUE = 6004;

    /**
     * Code d'erreur pour contrainte de longueur
     */
    public const INVALID_LENGTH = 6005;

    /**
     * Code d'erreur pour type de données invalide
     */
    public const INVALID_DATA_TYPE = 6006;

    /**
     * Code d'erreur pour contrainte personnalisée
     */
    public const CUSTOM_CONSTRAINT_VIOLATION = 6007;

    /**
     * Code d'erreur pour référence invalide
     */
    public const INVALID_REFERENCE = 6008;

    /**
     * Liste des erreurs de validation
     *
     * @var array
     */
    private array $errors = [];

    /**
     * Constructeur de l'exception de validation
     *
     * @param string $message Message d'erreur
     * @param int $code Code d'erreur (utiliser les constantes de classe)
     * @param array $errors Liste des erreurs de validation
     * @param \Throwable|null $previous Exception précédente pour le chaînage
     */
    public function __construct(string $message = "", int $code = 0, array $errors = [], \Throwable $previous = null)
    {
        $this->errors = $errors;
        parent::__construct($message, $code, $previous);
    }

    /**
     * Obtient la liste des erreurs de validation
     *
     * @return array
     */
    public function getErrors(): array
    {
        return $this->errors;
    }

    /**
     * Ajoute une erreur de validation
     *
     * @param string $field Champ concerné
     * @param string $message Message d'erreur
     * @return self
     */
    public function addError(string $field, string $message): self
    {
        $this->errors[$field][] = $message;
        return $this;
    }

    /**
     * Vérifie s'il y a des erreurs de validation
     *
     * @return bool
     */
    public function hasErrors(): bool
    {
        return !empty($this->errors);
    }

    /**
     * Crée une exception pour champ requis manquant
     *
     * @param string $field Nom du champ
     * @param \Throwable|null $previous Exception précédente
     * @return static
     */
    public static function requiredFieldMissing(string $field, \Throwable $previous = null): self
    {
        $message = "Le champ '{$field}' est requis";
        $errors = [$field => [$message]];
        return new static($message, self::REQUIRED_FIELD_MISSING, $errors, $previous);
    }

    /**
     * Crée une exception pour format invalide
     *
     * @param string $field Nom du champ
     * @param string $value Valeur fournie
     * @param string $expectedFormat Format attendu
     * @param \Throwable|null $previous Exception précédente
     * @return static
     */
    public static function invalidFormat(string $field, string $value, string $expectedFormat = '', \Throwable $previous = null): self
    {
        $message = "Le champ '{$field}' a un format invalide : '{$value}'";
        if ($expectedFormat) {
            $message .= ". Format attendu : {$expectedFormat}";
        }
        $errors = [$field => [$message]];
        return new static($message, self::INVALID_FORMAT, $errors, $previous);
    }

    /**
     * Crée une exception pour valeur hors limites
     *
     * @param string $field Nom du champ
     * @param mixed $value Valeur fournie
     * @param mixed $min Valeur minimum
     * @param mixed $max Valeur maximum
     * @param \Throwable|null $previous Exception précédente
     * @return static
     */
    public static function outOfRange(string $field, $value, $min = null, $max = null, \Throwable $previous = null): self
    {
        $message = "Le champ '{$field}' a une valeur hors limites : {$value}";
        if ($min !== null && $max !== null) {
            $message .= ". Valeur attendue entre {$min} et {$max}";
        } elseif ($min !== null) {
            $message .= ". Valeur minimum : {$min}";
        } elseif ($max !== null) {
            $message .= ". Valeur maximum : {$max}";
        }
        $errors = [$field => [$message]];
        return new static($message, self::OUT_OF_RANGE, $errors, $previous);
    }

    /**
     * Crée une exception pour valeur dupliquée
     *
     * @param string $field Nom du champ
     * @param mixed $value Valeur dupliquée
     * @param \Throwable|null $previous Exception précédente
     * @return static
     */
    public static function duplicateValue(string $field, $value, \Throwable $previous = null): self
    {
        $message = "Le champ '{$field}' contient une valeur déjà existante : {$value}";
        $errors = [$field => [$message]];
        return new static($message, self::DUPLICATE_VALUE, $errors, $previous);
    }

    /**
     * Crée une exception pour contrainte de longueur
     *
     * @param string $field Nom du champ
     * @param int $actualLength Longueur actuelle
     * @param int $minLength Longueur minimum
     * @param int $maxLength Longueur maximum
     * @param \Throwable|null $previous Exception précédente
     * @return static
     */
    public static function invalidLength(string $field, int $actualLength, int $minLength = null, int $maxLength = null, \Throwable $previous = null): self
    {
        $message = "Le champ '{$field}' a une longueur invalide ({$actualLength} caractères)";
        if ($minLength !== null && $maxLength !== null) {
            $message .= ". Longueur attendue entre {$minLength} et {$maxLength} caractères";
        } elseif ($minLength !== null) {
            $message .= ". Longueur minimum : {$minLength} caractères";
        } elseif ($maxLength !== null) {
            $message .= ". Longueur maximum : {$maxLength} caractères";
        }
        $errors = [$field => [$message]];
        return new static($message, self::INVALID_LENGTH, $errors, $previous);
    }

    /**
     * Crée une exception pour type de données invalide
     *
     * @param string $field Nom du champ
     * @param string $actualType Type actuel
     * @param string $expectedType Type attendu
     * @param \Throwable|null $previous Exception précédente
     * @return static
     */
    public static function invalidDataType(string $field, string $actualType, string $expectedType, \Throwable $previous = null): self
    {
        $message = "Le champ '{$field}' a un type invalide ({$actualType}). Type attendu : {$expectedType}";
        $errors = [$field => [$message]];
        return new static($message, self::INVALID_DATA_TYPE, $errors, $previous);
    }

    /**
     * Crée une exception pour contrainte personnalisée
     *
     * @param string $field Nom du champ
     * @param string $constraint Description de la contrainte
     * @param \Throwable|null $previous Exception précédente
     * @return static
     */
    public static function customConstraintViolation(string $field, string $constraint, \Throwable $previous = null): self
    {
        $message = "Le champ '{$field}' ne respecte pas la contrainte : {$constraint}";
        $errors = [$field => [$message]];
        return new static($message, self::CUSTOM_CONSTRAINT_VIOLATION, $errors, $previous);
    }

    /**
     * Crée une exception pour référence invalide
     *
     * @param string $field Nom du champ
     * @param mixed $reference Référence invalide
     * @param string $entityType Type d'entité référencée
     * @param \Throwable|null $previous Exception précédente
     * @return static
     */
    public static function invalidReference(string $field, $reference, string $entityType = '', \Throwable $previous = null): self
    {
        $message = "Le champ '{$field}' contient une référence invalide : {$reference}";
        if ($entityType) {
            $message .= " (type : {$entityType})";
        }
        $errors = [$field => [$message]];
        return new static($message, self::INVALID_REFERENCE, $errors, $previous);
    }

    /**
     * Crée une exception avec plusieurs erreurs
     *
     * @param array $errors Tableau associatif des erreurs (champ => messages)
     * @param \Throwable|null $previous Exception précédente
     * @return static
     */
    public static function multipleErrors(array $errors, \Throwable $previous = null): self
    {
        $fieldCount = count($errors);
        $totalErrors = array_sum(array_map('count', $errors));
        $message = "Erreurs de validation détectées sur {$fieldCount} champ(s) ({$totalErrors} erreur(s) au total)";
        return new static($message, 0, $errors, $previous);
    }

    /**
     * Retourne une représentation JSON des erreurs
     *
     * @return string
     */
    public function toJson(): string
    {
        return json_encode([
            'message' => $this->getMessage(),
            'code' => $this->getCode(),
            'errors' => $this->errors
        ], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }
}
