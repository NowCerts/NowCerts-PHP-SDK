<?php

namespace NowCerts;

/**
 * Contains useful utilities for other NowCerts classes.
 */
class Util {

  /**
   * Converts an array to an array of camel case properties.
   *
   * Returns an array conaining all the non-null keys of the given array renamed
   * to use camel case.
   *
   * @param array $array
   *   The array to convert.
   *
   * @return array
   *   An array with all the keys in camel case.
   */
  public static function snakeToCamel(array $array) {
    $values = array();
    foreach ($array as $field_name => $value) {
      if (!is_null($value)) {
        $values[static::snakeToCamelString($field_name)] = $value;
      }
    }
    return $values;
  }

  /**
   * Converts a string from snake_case to camelCase.
   *
   * @param string $string
   *   The string to convert.
   *
   * @return string
   *   The modified string.
   */
  public static function snakeToCamelString($string) {
    $parts = explode("_", $string);
    foreach ($parts as $i => $part) {
      if ($i) {
        $parts[$i] = ucfirst($part);
      }
    }
    return implode("", $parts);
  }

  /**
   * Converts an array to an array of snake case properties.
   *
   * Returns an array conaining all the non-null properties of the given array
   * renamed to use snake case.
   *
   * @param array $array
   *   The array to convert.
   *
   * @return array
   *   An array with all the keys in snake case.
   */
  public static function camelToSnake(array $array) {
    $values = array();
    foreach ($array as $field_name => $value) {
      if (!is_null($value)) {
        $values[static::cameltoSnakeString($field_name)] = $value;
      }
    }
    return $values;
  }

  /**
   * Converts a string from camelCase to snake_case.
   *
   * @param string $string
   *   The string to convert.
   *
   * @return string
   *   The modified string.
   *
   * @see https://stackoverflow.com/a/1993772/559466
   */
  public static function camelToSnakeString($string) {
    // Special cases.
    if ($string == 'addressLine1') {
      return 'address_line_1';
    }
    if ($string == 'addressLine2') {
      return 'address_line_2';
    }

    preg_match_all('!([A-Z][A-Z0-9]*(?=$|[A-Z][a-z0-9])|[A-Za-z][a-z0-9]+)!', $string, $matches);
    $ret = $matches[0];
    foreach ($ret as &$match) {
      $match = $match == strtoupper($match) ? strtolower($match) : lcfirst($match);
    }
    return implode('_', $ret);
  }

}
