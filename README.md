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

## Publishing

You need a docker hub account to publish your image.

`docker push myhubid/plugin:0.1.2`