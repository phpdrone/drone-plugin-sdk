<?php
namespace DronePluginSdk {

    /**
     * Class Build
     * TODO: Should be completed with http://docs.drone.io/environment-reference/
     * @package DronePluginSdk
     */
    class Build
    {

        /**
         * @param $env
         * @param bool $parseArray
         * @return array|bool|string|\stdClass
         */
        public function getPluginParameter($env, $parseArray = true)
        {
            $env = strtoupper("plugin_".$env);
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
         * @param $secretName
         * @return array|false|string
         */
        public function getSecret($secretName)
        {
            return getenv(strtoupper($secretName));
        }

        /**
         * @return Commit
         */
        public function getCommit()
        {
            return new Commit();
        }

        /**
         * @return Repo
         */
        public function getRepo()
        {
            return new Repo();
        }

        /**
         * @param $string
         * @return bool
         */
        private function isJson($string)
        {
            json_decode($string);
            return (json_last_error() == JSON_ERROR_NONE);
        }

        /**
         * @return false|string
         */
        public function getNumber()
        {
            return getenv('DRONE_BUILD_NUMBER');
        }

        /**
         * @return false|string
         */
        public function getEvent()
        {
            return getenv('DRONE_BUILD_EVENT');
        }

        /**
         * @return false|string
         */
        public function getStatus()
        {
            return getenv('DRONE_BUILD_STATUS');
        }

        /**
         * @return false|string
         */
        public function getLink()
        {
            return getenv('DRONE_BUILD_LINK');
        }
    }
}
