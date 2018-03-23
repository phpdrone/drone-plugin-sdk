<?php
namespace DronePluginSdk {

    /**
     * Class Commit
     * TODO: Should be completed with http://docs.drone.io/environment-reference/
     * @package DronePluginSdk
     */
    class Commit
    {

        /**
         * @return false|string
         */
        public function getBranch()
        {
            return getenv('DRONE_COMMIT_BRANCH');
        }

        /**
         * @return false|string
         */
        public function getTag()
        {
            return getenv('DRONE_TAG');
        }

        /**
         * @return false|string
         */
        public function getSha()
        {
            return getenv('DRONE_COMMIT_SHA');
        }

        /**
         * @return false|string
         */
        public function getMessage()
        {
            return getenv('DRONE_COMMIT_MESSAGE');
        }

        /**
         * @return false|string
         */
        public function getAuthorName()
        {
            return getenv('DRONE_COMMIT_AUTHOR');
        }

        /**
         * @return false|string
         */
        public function getAuthorEmail()
        {
            return getenv('DRONE_COMMIT_AUTHOR_EMAIL');
        }

        /**
         * @return false|string
         */
        public function getRef()
        {
            return getenv('DRONE_COMMIT_REF');
        }
    }
}
