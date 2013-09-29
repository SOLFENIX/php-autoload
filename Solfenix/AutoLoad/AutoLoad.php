<?php

/*
 *  PHP AutoLoad v1.0
 *  https://github.com/SOLFENIX/php-autoload
 *
 *  Copyright (c) 2013 James Watts (SOLFENIX)
 *  http://www.solfenix.com
 *
 *  This is FREE software, licensed under the GPL
 *  http://www.gnu.org/licenses/gpl.html
 */

/*
 * @package     Solfenix
 * @subpackage  AutoLoad
 * @author      James Watts <contact@jameswatts.info>
 * @copyright   2012 James Watts (SOLFENIX)
 * @license     http://www.gnu.org/licenses/gpl.html
 * @link        http://www.solfenix.com
 * @version     1.0
 */

namespace Solfenix\AutoLoad;

/* AutoLoad
 * 
 * Class to provide autoloading funcionality
 * 
 * @author James Watts
 * @version 1.0
 */

abstract class AutoLoad {

	/* 
	 * Array of directory names as path to classes
	 */

	protected static $path = array();

	/* 
	 * The default filename extension
	 */

	protected static $extension = 'php';

	/* 
	 * The currently loaded classes
	 */

	protected static $classes = array();

	/* getPath
	 * 
	 * Gets the root path for the class files
	 */

	public static function getPath()
	{
		return static::$path;
	}

	/* setPath
	 * 
	 * Sets the root path for the class files
	 * 
	 * @param Array $path The path as an array of directories
	 */

	public static function setPath( array $path )
	{
		static::$path = (array) $path;
	}

	/* getExtension
	 * 
	 * Gets the extension for the class filenames
	 */

	public static function getExtension()
	{
		return static::$extension;
	}

	/* setExtension
	 * 
	 * Sets the extension for the class filenames
	 * 
	 * @param String $extension The extension to use
	 */

	public static function setExtension( $extension )
	{
		static::$extension = (string) $extension;
	}

	/* getClasses
	 * 
	 * Gets the currently loaded classes
	 */

	public static function getClasses()
	{
		return static::$classes;
	}

	/* run
	 * 
	 * Resolves a file by class name and optional namespace
	 * 
	 * @param String $class The class name
	 * @return String
	 */

	public static function run( $class )
	{
		$file = static::resolveFile( $class );
		static::$classes[] = $file;
		require_once $file;
	}

	/* resolveFile
	 * 
	 * Resolves the file path for the class
	 * 
	 * @param String $class The class name
	 * @return String
	 */

	public static function resolveFile( $class )
	{
		$class = ltrim( $class, '\\' );
		return static::resolvePath() . static::resolveNamespace( $class ) . static::resolveClass( $class );
	}

	/* resolvePath
	 * 
	 * Resolves the root path for the file
	 * 
	 * @return String
	 */

	public static function resolvePath()
	{
		return ( count( static::$path ) > 0 ) ? implode( DIRECTORY_SEPARATOR, static::$path ) . DIRECTORY_SEPARATOR : '';
	}

	/* resolveNamespace
	 * 
	 * Resolves the directory structure for the namespace
	 * 
	 * @param String $class The class name
	 * @return String
	 */

	public static function resolveNamespace( $class )
	{
		if ( $last = strripos( $class, '\\' ) ) return str_replace( '\\', DIRECTORY_SEPARATOR, substr( $class, 0, $last ) ) . DIRECTORY_SEPARATOR;
		return '';
	}

	/* resolveClass
	 * 
	 * Resolves the filename for the class
	 * 
	 * @param String $class The class name
	 * @return String
	 */

	public static function resolveClass( $class )
	{
		if ( $last = strripos( $class, '\\' ) ) $class = substr( $class, $last+1 );
		return str_replace( '_', DIRECTORY_SEPARATOR, $class ) . '.' . static::$extension;
	}
}

