<?php
declare(strict_types=1);
/**
 * MIT License
 *
 * Copyright (c) 2020 Dogan Ucar, <dogan@dogan-ucar.de>
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
 */

namespace doganoo\DataObject\String;

use doganoo\DataObject\Core\Common\IDataObject;

/**
 * Class StringClass
 * @package doganoo\DataObject\String
 */
class StringClass implements IDataObject {

    /** @var string $value */
    private $value;

    /**
     * StringClass constructor.
     * @param string|null $value
     */
    public function __construct(string $value = "") {
        $this->setValue($value);
    }

    /**
     * checks whether the given string/StringClass equals to the value
     *
     * @param $value
     * @return bool
     */
    public function equals($value): bool {
        if ($value instanceof StringClass) {
            $value = $value->getValue();
        }
        if (!is_string($value)) return false;
        return strcmp($this->value, $value) === 0;
    }

    /**
     * returns the string
     *
     * @return string
     */
    public function getValue(): string {
        return $this->value;
    }

    /**
     * sets the value
     *
     * @param string $value
     */
    public function setValue(string $value): void {
        $this->value = $value;
    }

    /**
     * checks whether the given string/StringClass equals to the value and is case insensitive
     *
     * @param $value
     * @return bool
     */
    public function equalsIgnoreCase($value): bool {
        if ($value instanceof StringClass) {
            $value = $value->getValue();
        }
        if (!is_string($value)) return false;
        return strcasecmp($this->value, $value) === 0;
    }

    /**
     * string representation of this class
     *
     * @return string
     */
    public function __toString() {
        return $this->value;
    }

    /**
     * checks whether $value is in the string
     *
     * @param $value
     * @return bool
     */
    public function contains($value): bool {
        return false !== strpos($this->value, $value);
    }

    /**
     * checks whether $value is in the string and is case insensitive
     *
     * @param $value
     * @return bool
     */
    public function containsIgnoreCase($value): bool {
        return false !== stripos($this->value, $value);
    }

    /**
     * replaces search by value
     *
     * @param $search
     * @param $value
     */
    public function replace($search, $value): void {
        $this->value = str_replace($search, $value, $this->value);
    }

    /**
     * replaces search by value and is case insensitive
     *
     * @param $search
     * @param $value
     */
    public function replaceIgnoreCase($search, $value): void {
        $this->value = str_ireplace($search, $value, $this->value);
    }

    /**
     * performs a regular expression pattern matching
     *
     * @param       $pattern
     * @param array $matches
     * @return bool
     */
    public function match($pattern, &$matches = []): bool {
        return preg_match($pattern, $this->value, $matches) === 1;
    }

    /**
     * performs a regular expression pattern matching replacement
     *
     * @param $pattern
     * @param $replace
     * @return string
     */
    public function pregReplace($pattern, $replace): string {
        return preg_replace($pattern, $replace, $this->value);
    }

    /**
     * returns the string with lower case letters
     *
     * @return string
     */
    public function toLowerCase(): string {
        return strtolower($this->value);
    }

    /**
     * returns a substring
     *
     * @param int $count
     * @return bool|string
     */
    public function getSubstring(int $count): ?string {
        $result = substr($this->value, 0, $count);
        if (false === $result) return null;
        return $result;
    }

    public function getLength(): int {
        return strlen($this->getValue());
    }

    /**
     * checks a prefix
     *
     * have a look here: https://stackoverflow.com/a/2790919
     *
     * @param string $prefix
     * @return bool
     */
    public function hasPrefix(string $prefix): bool {
        if (0 !== $this->getLength() && "" === $prefix) return false;
        return true === (substr($this->getValue(), 0, strlen($prefix)) === $prefix);
    }

    /**
     * checks a suffix
     *
     * @param string $suffix
     * @return bool
     */
    public function hasSuffix(string $suffix): bool {
        if (0 !== $this->getLength() && "" === $suffix) return false;
        return (substr($this->getValue(), -1 * strlen($suffix), strlen($suffix)) === $suffix);
    }

}