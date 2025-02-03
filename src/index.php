<?php

/**
 * Mx [Phar] Default Stub Index
 *
 * Default PHP Phar archive index file (compressed via GZip)
 *
 * PHP version Dev v8.4.3
 *
 * @category  Index
 * @package   Phar\Index
 * @author    Xavier M. <dev.mit-section@mx-solutions.net>
 * @copyright 2017 (c) Mx Solutions
 * @license   MIT https://opensource.org/license/mit
 * @link      https://mx-solutions.net/security-tools
 */

declare(strict_types=1);

// Require Composer Autoloader
require_once __DIR__ . '/vendor/autoload.php';

// Utilisation des classes
use MxSolutions\SecurityTools\Password;

echo Password::generate() . "\n";
