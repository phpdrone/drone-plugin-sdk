<?php
namespace DronePluginSdk {

    /**
     * Class Commit
     * Should be complted with http://docs.drone.io/environment-reference/
     * @package DronePluginSdk
     */
    class Repo
    {

        /**
         * @return false|string
         */
        public function getOwner()
        {
            return getenv('DRONE_REPO_OWNER');
        }

        /**
         * @return false|string
         */
        public function getName()
        {
            return getenv('DRONE_REPO_NAME');
        }


        /**
         * @return false|string
         */
        public function getLink()
        {
            return getenv('DRONE_REPO_LINK');
        }

        /**
         * @return false|string
         */
        public function getDefaultBranch()
        {
            return getenv('DRONE_REPO_BRANCH');
        }

        /**
         * @return false|string
         */
        public function isPrivate()
        {
            return getenv('DRONE_REPO_PRIVATE') == "true";
        }

        /**
         * @return false|string
         */
        public function isTrusted()
        {
            return getenv('DRONE_REPO_TRUSTED') == "true";
        }
    }
}
