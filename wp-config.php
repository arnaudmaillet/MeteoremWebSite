<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en « wp-config.php » et remplir les
 * valeurs.
 *
 * Ce fichier contient les réglages de configuration suivants :
 *
 * Réglages MySQL
 * Préfixe de table
 * Clés secrètes
 * Langue utilisée
 * ABSPATH
 *
 * @link https://fr.wordpress.org/support/article/editing-wp-config-php/.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define( 'DB_NAME', 'meteorem' );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', 'root' );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', '' );

/** Adresse de l’hébergement MySQL. */
define( 'DB_HOST', 'localhost' );

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/**
 * Type de collation de la base de données.
 * N’y touchez que si vous savez ce que vous faites.
 */
define( 'DB_COLLATE', '' );

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clés secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         ' L%?8, loVWJ>[uF.EG2TZ&W,<COW!aT?lQe]p|pb(Y9*bXG{)P]Zqbjv[|1rZz_' );
define( 'SECURE_AUTH_KEY',  'vy1;xqVVQcXL@>r?AMs J2ypg)J0S[94Ov[3JrMB14)7I6pG&Lk+BlmKk*%1.yOV' );
define( 'LOGGED_IN_KEY',    ' `=%%ow^X(u#>|u278bL&*|JMCB!= .kQR;!mU$I+&e4Q0s!qSI*fk5;r#wh+nG6' );
define( 'NONCE_KEY',        'SGf[ss$7vAEXQY]w25N9z39!@Pb$e{bqjG.@Z?qKP/gi&fvjEkwks0-~*/{miqI#' );
define( 'AUTH_SALT',        'puRiU}[,6mbt0It,n3PO0H+c;cG&AWWmv TB=dLfuq-I.TB).NdoZs<f?bR7@ze_' );
define( 'SECURE_AUTH_SALT', '4r}kTvK{o`IU><eLqxWA$;<m`k2co;aB7g%n!)hOVS*9Hg1yF`HaY%J;ykFcT[EV' );
define( 'LOGGED_IN_SALT',   '^M)e,Hu.gpi}t})&YW8~2={L{;5~Mi[iM,C_H#!xRIIbr%Y<Z6Dv+D!P:TMr* =s' );
define( 'NONCE_SALT',       'N@3TM-+7`^1~grg}j_4Yco$kDjSRWkD>KF=r3ZJQ$3f;vnefJhh}2}S+(:E0(8OW' );
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix = 'wp_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortement recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://fr.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( ! defined( 'ABSPATH' ) )
  define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once( ABSPATH . 'wp-settings.php' );
