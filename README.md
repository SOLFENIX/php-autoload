PHP AutoLoad
============

The **AutoLoad** class provides a [PSR-0](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-0.md) compatible method to load required classes using namespaces for *PHP 5.3+*. For a class to the comply with the standard the following criteria must be met:

* A fully-qualified namespace and class must have the following structure ```\<Vendor Name>\(<Namespace>\)*<Class Name>```
* Each namespace must have a top-level namespace ("Vendor Name").
* Each namespace can have as many sub-namespaces as it wishes.
* Each namespace separator is converted to a DIRECTORY_SEPARATOR when loading from the file system.
* Each "_" character in the CLASS NAME is converted to a DIRECTORY_SEPARATOR. The "_" character has no special meaning in the namespace.
* The fully-qualified namespace and class is suffixed with ".php" when loading from the file system.
* Alphabetic characters in vendor names, namespaces, and class names may be of any combination of lower case and upper case.

To use the autoloader first include the class:

```php
require 'Solfenix/AutoLoad/AutoLoad.php';
```

Once the class is available the autoloader needs to be registered, for example:

```php
spl_autoload_register( 'Solfenix\AutoLoad\AutoLoad::run' );
```

The base path where your classes are located can be set if needed, for example:

```php
AutoLoad::setPath( array( 'path', 'to', 'files' ) );
```

This would resolve to ```path/to/files/<Vendor Name>/(<Namespace>/)*<Class Name>```, however, the namespace would remain the same:

```
use <Vendor Name>\(<Namespace>\)*<Class Name>;
```

The extension used for your classes can also be set, for example:

```php
AutoLoad::setExtension( 'class.php' );
```

This would search for files ending in **.class.php**, for example:

```
path/to/files/Solfenix/AutoLoad/AutoLoad.class.php
```

Requirements
------------

* PHP 5.3+

Documentation
-------------

Additional information regarding the PSR-0 specification can be found [here](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-0.md).

Support
-------

For support, bugs and feature requests, please use the [issues](https://github.com/SOLFENIX/php-autoload/issues) section of this repository.

Contributing
------------

If you'd like to contribute new features, enhancements or bug fixes to the code base just follow these steps:

* Create a [GitHub](https://github.com/signup/free) account, if you don't own one already
* Then, [fork](https://help.github.com/articles/fork-a-repo) the [PHP AutoLoad](https://github.com/SOLFENIX/php-autoload) repository to your account
* Create a new [branch](https://help.github.com/articles/creating-and-deleting-branches-within-your-repository) from the *develop* branch in your forked repository
* Modify the existing code, or add new code to your branch
* When ready, make a [pull request](http://help.github.com/send-pull-requests/) to the main repository

There may be some discussion reagrding your contribution to the repository before any code is merged in, so be prepared to provide feedback on your contribution if required.

A list of contributors to **PHP AutoLoad** can be found [here](https://github.com/SOLFENIX/php-autoload/contributors).

License
-------

Copyright 2012-2013 James Watts (SOLFENIX). All rights reserved.

Licensed under the GPL. Redistributions of the source code included in this repository must retain the copyright notice found in each file.

