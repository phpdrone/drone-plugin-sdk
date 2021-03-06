<?php
namespace DronePluginSdk {

    /**
     * Build - A running build
     *
     * This class represents a running Drone build and facilitates access to various
     * exposed environment variables and plugin settings.
     *
     * The following reference YAML will be used a reference for the following examples :
     *
     * ### drone.example.yml
     *
     * ```yaml
     * pipeline:
     *   test:
     *     image: phpdrone-example
     *     secrets: [ my_secret, other_secret ]
     *     my_simple_parameter: World
     *     my_parameter:
     *       something: yes
     *       something_else: probably
     *       another_level:
     *         - item1
     *         - item2
     *       a_boolean: true
     *       also_a_bool: yes
     *     my_array: [ an, array ]
     *     another_array:
     *       - machin
     *       - bidule
     *       - truc
     * ```
     *
     * @TODO: Should be completed with http: https://docs.drone.io/environment-reference/
     * @package DronePluginSdk
     */
    class Build
    {
        /**
         * Gets a plugin parameter from Drone
         *
         * *The plugin can return an object if the key is complex ( eg: nested )*
         *
         * ## Getting a simple value :
         *
         * ```php
         * // Get the build :
         * $build = new \DronePluginSdk\Build();
         *
         * // Get some settings :
         * var_dump($build->getPluginParameter('my_simple_parameter'));
         * ```
         *
         * ### Result
         *
         * ```sh
         * [test:L0:0s] string(8) "World"
         * ```
         *
         * ## Getting a complex value :
         *
         * ```php
         * // Get the build :
         * $build = new \DronePluginSdk\Build();
         *
         * // Get some settings :
         * var_dump($build->getPluginParameter('my_parameter'));
         * ```
         *
         * ### Result
         *
         * ```sh
         * [test:L0:0s] object(stdClass)#2 (5) {
         * [test:L1:0s]   ["a_boolean"]=>
         * [test:L2:0s]   bool(true)
         * [test:L3:0s]   ["also_a_bool"]=>
         * [test:L4:0s]   bool(true)
         * [test:L5:0s]   ["another_level"]=>
         * [test:L6:0s]   array(2) {
         * [test:L7:0s]     [0]=>
         * [test:L8:0s]     string(5) "item1"
         * [test:L9:0s]     [1]=>
         * [test:L10:0s]     string(5) "item2"
         * [test:L11:0s]   }
         * [test:L12:0s]   ["something"]=>
         * [test:L13:0s]   bool(true)
         * [test:L14:0s]   ["something_else"]=>
         * [test:L15:0s]   string(8) "probably"
         * [test:L16:0s] }
         * ```
         *
         * @param string $parameter The parameter name as passed in the .drone.yml
         * @param bool $parseArray If set to false, `,` won't be exploded as array
         * @return array|bool|string|\stdClass Parameter value, `false` if not found
         */
        public function getPluginParameter($parameter, $parseArray = true)
        {
            $env = strtoupper("plugin_".$parameter);
            $value = getenv($env);
            if (!empty($value)) {
                if ($this->isJson($value)) {
                    return json_decode($value);
                }

                if (preg_match('/,/', $value) && $parseArray) {
                    return explode(',', $value);
                }
            }
            return $value;
        }

        /**
         * Retrieves a secret from Drone's secrets.
         *
         * @param string $secretName Secret to retrieve
         * @return false|string Secret value, `false` if not fount
         */
        public function getSecret($secretName)
        {
            return getenv(strtoupper($secretName));
        }

        /**
         * Gets current commit informations.
         * @return Commit The current commit informations
         */
        public function getCommit()
        {
            return new Commit();
        }

        /**
         * Gets current repository informations.
         * @return Repo The current repository informations
         */
        public function getRepo()
        {
            return new Repo();
        }

        /**
         * Tries to detect a json string by parsing it.
         * @param string $string String to analyse
         * @return bool
         */
        private function isJson($string)
        {
            json_decode($string);
            return (json_last_error() == JSON_ERROR_NONE);
        }

        /**
         * Gets the current build number.
         * @return false|string
         */
        public function getNumber()
        {
            return getenv('DRONE_BUILD_NUMBER');
        }

        /**
         * Gets the current build event.
         * @return false|string
         */
        public function getEvent()
        {
            return getenv('DRONE_BUILD_EVENT');
        }

        /**
         * Gets the current build status ( `success` or `failure` ).
         * @return false|string
         */
        public function getStatus()
        {
            return getenv('DRONE_BUILD_STATUS');
        }

        /**
         * Gets the current build job link.
         * @return false|string
         */
        public function getLink()
        {
            return getenv('DRONE_BUILD_LINK');
        }
    }
}
