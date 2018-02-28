# Drone PHP plugin SDK

This library faciliates the use of PHP to write drone plugins.

## Example

An example plugin can be found and looked at in the [example](example) directory.

### Building the example

Go to the example directory and run with :

`docker build -t myhubid/plugin .`

### Creating a drone.example.yaml file 

After building in can be tested with a pipeline :

```yaml
pipeline:
  test:
    image: myhubid/plugin
    secrets: [ my_secret, other_secret ]
    my_parameter:
      something: yes
      something_else: probably
      another_level:
        - item1
        - item2
      a_boolean: true
      also_a_bool: yes
    my_array: [ an, array ]
    another_array:
      - machin
      - bidule
      - truc
```

### Testing locally

You can now run a test with the drone cli :

`drone exec --commit-branch master drone.example.yaml`

### Publishing

You need a docker hub account to publish your image.

`docker push myhubid/plugin:0.1.2`


### PHP example

```php
<?php
require __DIR__."/vendor/autoload.php";

// Get the build :
$build = new \DronePluginSdk\Build();

// Get some settings :
var_dump($build->getPluginParameter('my_parameter'));

```

### Output

```
[test:L0:0s] object(stdClass)#2 (5) {
[test:L1:0s]   ["a_boolean"]=>
[test:L2:0s]   bool(true)
[test:L3:0s]   ["also_a_bool"]=>
[test:L4:0s]   bool(true)
[test:L5:0s]   ["another_level"]=>
[test:L6:0s]   array(2) {
[test:L7:0s]     [0]=>
[test:L8:0s]     string(5) "item1"
[test:L9:0s]     [1]=>
[test:L10:0s]     string(5) "item2"
[test:L11:0s]   }
[test:L12:0s]   ["something"]=>
[test:L13:0s]   bool(true)
[test:L14:0s]   ["something_else"]=>
[test:L15:0s]   string(8) "probably"
[test:L16:0s] }
```