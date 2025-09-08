<?php
        /**
     * Chiffre une chaîne de caractères en utilisant AES-256-CBC
     * @param string $data La chaîne à chiffrer
     * @param string $key La clé secrète de chiffrement
     * @return string Les données chiffrées encodées en base64
     */
    function encrypt($data, $key) {
        // Génère un Vecteur d'Initialisation (IV) aléatoire et sécurisé
        $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
        
        // Chiffre les données
        $encrypted = openssl_encrypt(
            $data, 
            'aes-256-cbc', 
            $key, 
            OPENSSL_RAW_DATA, 
            $iv
        );
        
        // Combine le IV et les données chiffrées, puis encode en base64 pour le stockage
        return base64_encode($iv . $encrypted);
    }

    /**
     * Déchiffre une chaîne chiffrée par la fonction encrypt()
     * @param string $data Les données chiffrées encodées en base64
     * @param string $key La clé secrète de chiffrement
     * @return string|false La chaîne déchiffrée ou false en cas d'échec
     */
    function decrypt($data, $key) {
        // Décode les données base64
        $decoded = base64_decode($data);
        
        // Extrait le IV (les 16 premiers octets pour AES-256-CBC)
        $iv_length = openssl_cipher_iv_length('aes-256-cbc');
        $iv = substr($decoded, 0, $iv_length);
        $encrypted = substr($decoded, $iv_length);
        
        // Déchiffre les données
        return openssl_decrypt(
            $encrypted, 
            'aes-256-cbc', 
            $key, 
            OPENSSL_RAW_DATA, 
            $iv
        );
    }
