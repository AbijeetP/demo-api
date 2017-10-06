<?php

namespace App\Shell;

use Cake\Console\Shell;
use Cake\Http\Client;
use Cake\Core\Configure;
use Cake\Filesystem\File;

class BootstrapContributorDtlsShell extends Shell {

    /**
     * Shell executes starts from here
     */
    public function main() {
        $arrUsersList = $this->getBootstrapContributorsList();
        if ($arrUsersList) {
            $userDtls = $this->bildUserDtlsData($arrUsersList);
            $file = new File('webroot/uploads/contributors.json');
            $file->write(json_encode($userDtls));
            $file->close();
        }
    }

    /**
     * Returns user details of the Bootstrap contributors
     */
    private function getBootstrapContributorsList() {
        try {
            $http = new Client();
            $response = $http->get(Configure::read('GET_CONTRIBUTORS_LIST_URL'), [
                    'client_id' => Configure::read('GITHUB_CLIENT_ID'),
                    'client_secret' => Configure::read('GITHUB_CLIENT_SECRET'),
                ], [
                'headers' => ['Accept' => 'application/vnd.github.v3+json']
            ]);
            if ($response->isOk()) {
                return $response->json;
            }
            return false;
        } catch (Exception $ex) {
            $this->log($ex);
        }
    }

    /**
     * Returns user related information
     * @param type $arrUsersList
     */
    private function bildUserDtlsData($arrUsersList) {
        $arrFinalDtls = [];
        $http = new Client();

        foreach ($arrUsersList as $userDtls) {
            $user['username'] = $userDtls['login'];
            $user['profile_pic'] = $userDtls['avatar_url'];
            $user['name'] = '';
            $user['email'] = '';
            $user['bio'] = '';
            $user['location'] = '';

            // 1. Get contributor details
            $userDtlsURL = Configure::read('GET_USER_DTLS') . $user['username'];
            $response = $http->get($userDtlsURL, [
                'client_id' => Configure::read('GITHUB_CLIENT_ID'),
                'client_secret' => Configure::read('GITHUB_CLIENT_SECRET'),
                    ], [
                'headers' => ['Accept' => 'application/vnd.github.v3+json']
            ]);

            if ($response->isOk()) {
                $userFullDtls = $response->json;
                $user['name'] = $userFullDtls['name'];
                $user['email'] = $userFullDtls['email'];
                $user['bio'] = $userFullDtls['bio'];
                $user['location'] = $userFullDtls['location'];
            }

            // 2. Get location lat & long details
            if (!empty($user['location'])) {
                $locationAPI = Configure::read('GOOGLE_MAP_API_URL') . rawurlencode($user['location']) . Configure::read('GOOGLE_MAP_API_KEY');
                $response = $http->get($locationAPI);
                $locationDtls = $response->json;
                $user['location'] = $locationDtls['results'][0]['geometry']['location'];
            }

            array_push($arrFinalDtls, $user);
        }

        return $arrFinalDtls;
    }

}
