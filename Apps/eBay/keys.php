<?php
    //show all errors - useful whilst developing
    error_reporting(E_ALL);

    // these keys can be obtained by registering at http://developer.ebay.com
    
    $production         = false;   // toggle to true if going against production
    $compatabilityLevel = 551;    // eBay API version
    
    if ($production) {
        $devID = '5376e1b3-02e9-4a55-81b2-1812946bb718';   // these prod keys are different from sandbox keys
        $appID = 'CoreyHer-d279-4762-928c-790d35f0b8a3';
        $certID = '5f468cc0-f54b-4f3f-9131-1f3e12f38d6b';
        //set the Server to use (Sandbox or Production)
        $serverUrl = 'https://api.ebay.com/ws/api.dll';      // server URL different for prod and sandbox
        //the token representing the eBay user to assign the call with
        $userToken = 'YOUR_PROD_TOKEN';          
    } else {  
        // sandbox (test) environment
        $devID = '5376e1b3-02e9-4a55-81b2-1812946bb718';         // insert your devID for sandbox
        $appID = 'CoreyHer-419b-4e19-baa9-373809ecbbd0';   // different from prod keys
        $certID = '99084be5-416a-4337-8062-c4ce163e56d0';  // need three 'keys' and one token
        //set the Server to use (Sandbox or Production)
        $serverUrl = 'https://api.sandbox.ebay.com/ws/api.dll';
        // the token representing the eBay user to assign the call with
        // this token is a long string - don't insert new lines - different from prod token
        $userToken = 'AgAAAA**AQAAAA**aAAAAA**NN64Ug**nY+sHZ2PrBmdj6wVnY+sEZ2PrA2dj6wFk4GhC5aKpQqdj6x9nY+seQ**bwwCAA**AAMAAA**uWh6c5v3Z24AwQeo4AmcA3i1/w9IYhjE/m+wSVNHY5hABH0zmz4M7h08E22BOPIGPg11MkvV/2RT3H0fAXO1IYKhVmOJoOVInk6bAOG8Y/NI51gRxwi3voQWsJKlwXwBfIlZeeGEUmHWN37sE+6Zw9LmyAx+K5wWxpaSr7TWsMPEPIo/UiUFkoqHtDcLyM+Mxeb2R/3j2O202TDOJoKXxDvvMLXV0KS8L4BRkjGTV9mgFIYEYFFIRjPKfLr7QP/7I3P4nV5+YsmgmRhoSU1f0RDabtxL+AUUAu/xCmaJMqrgxSCPNtee3XSH/XkAdo9mRSmqvL1idXkDOPTGrCAad0S980cCNqqbf2qumoougZoSxa87U00N2oGy08PPrJKrWnKSYANqTK7AffZ2KF6edheIhcKRlKUGZUhvggvvQxrIuN/kwIHUOgPVDOHzTbcHO+E1qv827jYsdoikQZyR6mInKU+2ZcaFvbbXwXh0oFF1Wawlq5ykqI5VyYbr57dMhNflwsfBf8B9SkxYi6zglFVtBbI55a3CzTqyLHLb7RpcT2VC3j4KK1QbvkMsDLGX3L8ObtwJ0w+NV5u81uibYv3b4ejSi+rZZcQpKNr27U+fJxJ+mBKq5Xy3z9m74UgLtY9kZObvHtDtCq6bTEQ0FehZ+7MMe0vIFtlE3Q7AodEtCyfNfGPBBswXpKH09gZ2ViXBT121zOMpmS+FQC4x1c3UwDFQwy9sACwwRsnM4Aqw/0E2ZbJeaGMC1wmIL03d';                 
    }
    
    
?>
