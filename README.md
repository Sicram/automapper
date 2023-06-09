# Automapper

# Introduction 
TODO: A simple library to map objects. 

# Getting Started

1. Install the library using composer:

`composer require sicram/automapper`

2. Register the library in your provider:

```php
use Sicram\Automapper\Automapper;
use Sicram\Automapper\IAutomapper;

$this->app->bind(IAutomapper::class, Automapper::class);
```

3. Example of usage:

```php
use Sicram\Automapper\IAutomapper;	

class ExampleController extends Controller
{
    public function __construct(private IAutomapper $_automapper)
    {
    }

    public function index()
    {
        $source = new Source();
        $source->name = 'John';
        $source->age = 20;

        $destination = $this->_automapper->map($source, Destination::class);

        return $destination;
    }
}

# Build and Test
You can use the following class to build a test with doubles:

```php
use Sicram\Automapper\Tests\Supports\Doubles\Automapper\StubAutomapper;
```

# Contribute
TODO: Explain how other users and developers can contribute to make your code better. 
