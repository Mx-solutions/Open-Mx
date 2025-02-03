<?php

/**
 * File: Generate.php
 *
 * Description: This file contain the Generate interface
 *
 * PHP version Dev v8.4.3
 *
 * @category  Generator
 * @package   Security\Tools
 * @author    Xavier M. <dev.mit-section@mx-solutions.net>
 * @copyright 2017 (c) Mx Solutions
 * @license   MIT https://opensource.org/license/mit
 * @link      https://mx-solutions.net/security-tools
 */

declare(strict_types=1);

namespace MxSolutions\SecurityTools\Interfaces;

/**
 * Interface: Generate
 *
 * Description: To define the methods that the linked classes will have to implement
 *
 * @category  Generator
 * @package   Security\Tools
 * @author    Xavier M. <dev.mit-section@mx-solutions.net>
 * @copyright 2017 (c) Mx Solutions
 * @license   MIT https://opensource.org/license/mit
 * @link      https://mx-solutions.net/security-tools
 */
interface Generate
{
    /**
     * Method: generate
     *
     * Description: static function implemented by all extended classes
     *
     * @return string with genarated (password, key, number, ...)
     */
    public static function generate(): string;
}
