<?php

/**
 * File: Generator.php
 *
 * Description: This file contain the Generator abstracted class
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

namespace MxSolutions\SecurityTools\Abstracts;

use InvalidArgumentException;

/**
 * Class: Generator
 *
 * Description: Parent class for random generated password, key, number, ...
 *
 * @category  Generator
 * @package   Security\Tools
 * @author    Xavier M. <dev.mit-section@mx-solutions.net>
 * @copyright 2017 (c) Mx Solutions
 * @license   MIT https://opensource.org/license/mit
 * @link      https://mx-solutions.net/security-tools
 */
abstract class Generator
{
    /**
     * Method: generate
     *
     * Description: abstracted static function implemented by all extended classes
     *
     * @return string with genarated (password, key, number, ...)
     */
    abstract public static function generate(): string;

    /**
     * Method: prepChars
     *
     * Description: prepare and return chars for the generation process
     *
     * @param bool $useLower   to test lowercase setting
     * @param bool $useUpper   to test uppercase setting
     * @param bool $useDigits  to test digits setting
     * @param bool $useSymbols to test symbols setting
     *
     * @return array<string> with expected chars
     */
    final protected static function prepChars(
        bool $useLower = true,
        bool $useUpper = true,
        bool $useDigits = true,
        bool $useSymbols = true
    ): array {
        // Checking included characters
        $checkIncludedChars = false;
        try {
            $checkIncludedChars = self::checkCriteria(
                $useLower,
                $useUpper,
                $useDigits,
                $useSymbols
            );
        } catch (InvalidArgumentException $e) {
            // Manage exception
            echo "ERROR: " . $e->getMessage() . "\n";
        }

        // Generate character sets using ASCII ranges
        // From 'a' to 'z'
        $lowercase = [];
        if ($useLower) {
            $lowercase = self::prepLowerChars();
        }
        // From 'A' to 'Z'
        $uppercase = [];
        if ($useUpper) {
            $uppercase = self::prepUpperChars();
        }
        // From '0' to '9'
        $digits = [];
        if ($useDigits) {
            $digits = self::prepDigits();
        }
        // Special characters
        $symbols = [];
        if ($useSymbols) {
            $symbols = self::prepSymbols();
        }

        // Merge all character sets into one array
        $chars = array_merge($lowercase, $uppercase, $digits, $symbols);

        return $chars;
    }

    /**
     * Method: prepLowerChars
     *
     * Description: prepare and return lower chars
     *
     * @return array<string> from 'a' to 'z'
     */
    final protected static function prepLowerChars(): array
    {
        return range('a', 'z');
    }

    /**
     * Method: prepUpperChars
     *
     * Description: prepare and return upper chars
     *
     * @return array<string> from 'A' to 'Z'
     */
    final protected static function prepUpperChars(): array
    {
        return range('A', 'Z');
    }

    /**
     * Method: prepDigits
     *
     * Description: prepare and return digits
     *
     * @return array<string> from '0' to '9'
     */
    final protected static function prepDigits(): array
    {
        return range('0', '9');
    }

    /**
     * Method: prepSymbols
     *
     * Description: prepare and return special chars
     *
     * @return array<string> '!', '#', '$', '*', '-', '_'
     */
    final protected static function prepSymbols(): array
    {
        return str_split('!#$*-_');
    }

    /**
     * Method: checkCriteria
     *
     * Description: check the included characters
     *
     * @param bool $useLower   to test lowercase setting
     * @param bool $useUpper   to test uppercase setting
     * @param bool $useDigits  to test digits setting
     * @param bool $useSymbols to test symbols setting
     *
     * @return bool
     */
    final protected static function checkCriteria(
        bool $useLower,
        bool $useUpper,
        bool $useDigits,
        bool $useSymbols
    ):bool {
        if (($useLower || $useUpper || $useDigits || $useSymbols) === false) {
            $msg = 'Minimum 1 character type expected.';
            throw new InvalidArgumentException($msg);
        }

        return true;
    }

    /**
     * Method: checkRange
     *
     * Description: check if valid range
     *
     * @param int $length to check
     * @param int $min    to specify the minimum value
     * @param int $max    to specify the maximal value
     *
     * @return bool
     */
    final protected static function checkRange(
        int $length,
        int $min,
        int $max
    ):bool {
        if ($length < $min || $length > $max) {
            $msg = 'Expected length must be between ' . $min
                . ' and ' . $max . ' characters.';
            throw new InvalidArgumentException($msg);
        }

        return true;
    }
}
