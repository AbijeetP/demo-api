<?php

namespace App\Shell;

use Cake\Console\Shell;
use Cake\Http\Client;
use Cake\Core\Configure;
use Cake\Filesystem\File;
use Cake\I18n\Date;

class BootstrapContributorDtlsShell extends Shell {

    /**
     * Shell executes starts from here
     */
    public function main() {
        $arrUsersList = $this->getBootstrapContributorsList();
        if ($arrUsersList) {
            $userDtls = $this->buildUserDtlsData($arrUsersList);
            $file = new File($this->getFileName());
            $file->write(json_encode($userDtls));
            $file->close();
        }
    }
    
    /**
     * Returns the file name with today's and tomorrow's date.
     */
    private function getFileName(){
        $objDate = new Date();
        $formattedTodaysDate = $objDate->format(Configure::read('DATE_FORMAT'));
        $formattedTomorrowsDate = $objDate->modify('+1 day')->format(Configure::read('DATE_FORMAT'));
         
        $fileName = 'webroot/uploads/contributors_' . $formattedTodaysDate . '-' . $formattedTomorrowsDate . '.json';
        return $fileName;
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
    private function buildUserDtlsData($arrUsersList) {
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
