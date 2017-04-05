<?php

class RequestValidatorModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param $email
     * @param array $userCredentials
     * @param $token
     * @return mixed
     */
    public function checkUserCredentials($email, array $userCredentials, $token)
    {
        $result = $this->db->select('*')
            ->from('client_tokens')
            ->join('users', 'users.IdUser = client_tokens.IdUser')
            ->join('stores', 'stores.IdStore = client_tokens.IdStore')
            ->where('users.Email', $email)
            ->where($userCredentials)
            ->where('client_tokens.ClientToken', $token)
            ->get()
            ->row_array();

        return $result;
    }
}
