<?php
namespace DronePluginSdk {
    class Commit {

        /**
         * @var Build
         */
        protected $build;

        /**
         * Commit constructor.
         * @param Build $build
         */
        public function __construct(Build $build)
        {
            $this->build = $build;
        }

        /**
         * @return false|string
         */
        public function getBranch() {
            return $this->build->getEnv('DRONE_COMMIT_BRANCH');
        }

        /**
         * @return false|string
         */
        public function getTag() {
            return $this->build->getEnv('DRONE_TAG');
        }

        /**
         * @return false|string
         */
        public function getSha() {
            return $this->build->getEnv('DRONE_COMMIT_SHA');
        }
    }
}