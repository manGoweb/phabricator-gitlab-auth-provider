<?php

final class PhutilGitlabAuthAdapter extends PhutilOAuthAuthAdapter {

    public function getAdapterType()
    {
        return 'gitlab';
    }

    /**
     * Get a unique identifier associated with the identity. For most providers,
     * this is an account ID.
     *
     * The account ID needs to be unique within this adapter's configuration, such
     * that `<adapterKey, accountID>` is globally unique and always identifies the
     * same identity.
     *
     * If the adapter was unable to authenticate an identity, it should return
     * `null`.
     *
     * @return string|null Unique account identifier, or `null` if authentication
     *                     failed.
     */
    public function getAccountID()
    {
        return $this->getOAuthAccountData('id');
    }

    public function getAccountName() {
        return $this->getOAuthAccountData('username');
    }

    public function getAccountImageURI() {
        return $this->getOAuthAccountData('avatar_url');
    }

    /**
     * Get a string identifying the domain this adapter is acting on. This allows
     * an adapter (like LDAP) to act against different identity domains without
     * conflating credentials. For providers like Facebook or Google, the adapters
     * just return the relevant domain name.
     *
     * @return string Domain the adapter is associated with.
     */
    public function getAdapterDomain()
    {
        return 'mangoweb.org';
    }

    protected function getAuthenticateBaseURI()
    {
        return 'https://mangoweb.org/oauth/authorize';
    }

    protected function getTokenBaseURI()
    {
        return 'https://mangoweb.org/oauth/token';
    }

    protected function loadOAuthAccountData()
    {
        return 'https://mangoweb.org/api/v4/user';
    }

}
