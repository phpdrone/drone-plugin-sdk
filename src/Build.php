<?php
namespace DronePluginSdk {
    class Build {

        /**
         * @param $env
         * @param bool $parseArray
         * @return array|bool|string|\stdClass
         */
        private function getEnv($env, $parseArray=true) {
            $env = strtoupper($env);
            $value = getenv($env);
            if(!empty($value)) {
                if($this->isJson($value)) {
                    return json_decode($value);
                }

                if(preg_match('/,/', $value) && $parseArray) {
                    return explode(',', $value);
                }
            }
            return $value;
        }


        /**
         * @param $parameterName
         * @return array|bool|\stdClass|string
         */
        public function getPluginParameter($parameterName) {
            return $this->getEnv('plugin_'.$parameterName);
        }

        /**
         * @param $secretName
         * @return array|false|string
         */
        public function getSecret($secretName) {
            return getenv(strtoupper($secretName));
        }

        /**
         * @return Commit
         */
        public function getCommit() {
            return new Commit($this);
        }

        /**
         * @param $string
         * @return bool
         */
        function isJson($string) {
            json_decode($string);
            return (json_last_error() == JSON_ERROR_NONE);
        }

    }
}