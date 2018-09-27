<?php

final class PhabricatorGitlabAuthProvider extends PhabricatorOAuth2AuthProvider {

    public function getProviderName()
    {
        return 'Gitlab';
    }

    protected function newOAuthAdapter()
    {

        // TODO: Implement newOAuthAdapter() method.
    }

    protected function getProviderConfigurationHelp() {
        $uri = PhabricatorEnv::getProductionURI('/');
        $callback_uri = PhabricatorEnv::getURI($this->getLoginURI());

        return pht(
            "To configure GitHub OAuth, create a new GitHub Application here:".
            "\n\n".
            "https://mangoweb.org/admin/applications/12".
            "\n\n".
            "You should use these settings in your application:".
            "\n\n".
            "  - **URL:** Set this to your full domain with protocol. For this ".
            "    Phabricator install, the correct value is: `%s`\n".
            "  - **Callback URL**: Set this to: `%s`\n".
            "\n\n".
            "Once you've created an application, copy the **Client ID** and ".
            "**Client Secret** into the fields above.",
            $uri,
            $callback_uri);
    }


    public function getLoginURI() {
        return '/oauth/gitlab/login/';
    }

}
