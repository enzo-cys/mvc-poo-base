<?php

/**
 * Fichier de configuration
 * -------------------------
 * Définit les constantes globales de l'application.
 * Ce fichier doit être chargé après l'initialisation de l'environnement (.env).
 */

// Définit le chemin de base de l'application (pour gérer les sous-dossiers)
// Par défaut "/" en local, "/nom-sous-dossier/" sur Plesk
define('BASE_PATH', rtrim($_ENV['BASE_PATH'] ?? '/', '/'));

// Définit la racine du projet (chemin absolu du serveur)
define('ROOT_PATH', dirname(__DIR__));

// Définit le chemin du dossier public
define('PUBLIC_PATH', ROOT_PATH . '/public');

/**
 * Génère une URL absolue en tenant compte du BASE_PATH
 *
 * @param string $path Chemin relatif (ex: "/articles", "/about")
 * @return string URL complète avec BASE_PATH
 */
function url(string $path = ''): string
{
    $path = ltrim($path, '/');

    // Si BASE_PATH est vide ou "/", retourner directement le chemin
    if (BASE_PATH === '' || BASE_PATH === '/') {
        return '/' . $path;
    }

    // Sinon ajouter le BASE_PATH
    return BASE_PATH . ($path ? '/' . $path : '');
}

/**
 * Génère un chemin vers un asset (CSS, JS, images)
 *
 * @param string $path Chemin relatif vers l'asset (ex: "css/global.css")
 * @return string URL complète vers l'asset
 */
function asset(string $path): string
{
    $path = ltrim($path, '/');

    // Si BASE_PATH est vide ou "/", retourner directement le chemin
    if (BASE_PATH === '' || BASE_PATH === '/') {
        return '/assets/' . $path;
    }

    // Sinon ajouter le BASE_PATH
    return BASE_PATH . '/assets/' . $path;
}
