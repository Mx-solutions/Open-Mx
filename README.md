# Mx-Solutions

## Security Tools

### table of contents
1. General Description
2. Code Quality
3. Main Features
4. Installation
5. Usage
6. Advanced Configuration
7. Contributions
8. License

#### General Description
This package is designed to simplify the safe and customizable generation of random elements in PHP projects.

#### Code Quality
PHP 8.4+ Compatibility:  
 => Fully compatible with PHP 8.4 and later versions.
  
PSR Compliance:  
 => The codebase adheres to PHP Standards Recommendations (PSRs) including:  
    - PSR-1 (Basic Coding Standard)  https://www.php-fig.org/psr/psr-1/  
    - PSR-4 (Autoloading Standard)   https://www.php-fig.org/psr/psr-4/  
    - PSR-12 (Extended Coding Style) https://www.php-fig.org/psr/psr-12/  
  
Static Analysis:  
 => Validated at the highest level of PHPStan analysis, ensuring code reliability and reducing potential runtime errors.  
  
Extensive Testing:  
 => Comprehensive unit and integration tests to ensure reliability and prevent regressions.  
  
Modern PHP Features:  
 => Utilizes named arguments (introduced in PHP 8.0), enhancing code readability and reducing errors from argument order.  
  
Secure By Design:  
 => Security considerations are built into the core architecture and design of the software.  
  
SOLID Principles:  
 => Structured following SOLID principles to ensure maintainability and scalability.  
  
YAGNI (You Ain't Gonna Need It):  
 => Implement features only when they are necessary, not when you anticipate needing them.  
  
DRY (Don't Repeat Yourself):  
 => Eliminates redundancy by abstracting common functionalities.  
  
KISS (Keep It Simple, Stupid):  
 => Maintains simplicity and avoids unnecessary complexity.  
  
By adhering to these principles and practices, the goal is to provide a robust, maintainable, and secure package for our users.

#### Main Features
 - Random strong and secure password generation
 - Random number generation
 - Random key generation
 - Customization of characters used (lowercase, uppercase, numbers, special characters)

#### Installation

The easiest way to get started with Mx-Solutions Security Tools is to go through composer to install or require the PHP package.  

```bash
composer require mx-solutions/mx-security-tools
```

N.B.: Due to security vulnerabilities identified in previous versions of PHP, this package requires PHP version 8.4.3

### Git Clone
You can also download the Mx-Solutions Security Tools source code directly from the Git clone:  

```bash
git clone https://github.com/mx-solutions/mx-security-tools
```

#### Usage

Generate random password (Quick Use):  
```php
// Require Composer PSR Classes Autoloader
require_once 'vendor/autoload.php';

use MxSolutions\MxSecurityTools\Password;

echo 'Mx-Solution Security Tools Package' . "\n";
echo '[DEMO MODE]' . "\n\n";

echo 'Generate random 16 characters strong password' . "\n";
$password = Password::generate();
echo 'Password: ' . $password . "\n\n";
```

#### Advanced Configuration

Generate random password with additionnal options:  
```php
echo 'Generate random 64 characters strong password' . "\n";
$password = Password::generate(
    length: 64,
    useUpper: true,
    useLower: true,
    useDigits: true,
    useSymbols: true
);
echo 'Password: ' . $password . "\n\n";
```

#### Contributions
Interested in participating in this project?  
At the moment, you can:  
 - report bugs
 - request new features to be added
 - propose a translation of all or part of the documentation
 - make a donation to support the project.

#### License
This project is licensed under the MIT License  
2017 (c) Mx Solutions  
See the LICENSE file for details
