<?php
namespace DronePluginSdk {
    /**
     * Class Commit
     * Should be complted with http://docs.drone.io/environment-reference/
     * @package DronePluginSdk
     */
    class Commit {

        /**
         * @return false|string
         */
        public function getBranch() {
            return getenv('DRONE_COMMIT_BRANCH');
        }

        /**
         * @return false|string
         */
        public function getTag() {
            return getenv('DRONE_TAG');
        }

        /**
         * @return false|string
         */
        public function getSha() {
            return getenv('DRONE_COMMIT_SHA');
        }
    }
}