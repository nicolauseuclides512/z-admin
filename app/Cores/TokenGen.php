<?php
/**
 * @author Jehan Afwazi Ahmad <jee.archer@gmail.com>.
 */


namespace App\Cores;


use Firebase\JWT\JWT;
use Illuminate\Support\Facades\Auth;
use Laravel\Passport\Passport;
use Lcobucci\JWT\Parser;

class TokenGen
{

    public static function inst()
    {
        return new self();
    }

    /**
     * @return string
     * @throws \Exception
     */
    public static function createToken()
    {
        try {
            $user = Auth::user();
            $parser = (new Parser())
                ->parse(
                    $user->createToken('ZuraganAdminApp')
                        ->accessToken
                );

            /*
             * Create the token as an array
             */
            $data = [
                'iat' => $parser->getClaim('iat'),          // Issued at: time when the token was generated
                'jti' => $parser->getHeader('jti'),         // Json Token Id: an unique identifier for the token
                'iss' => url('/'),                           // Issuer
                'nbf' => $parser->getClaim('nbf'),          // Not before
                'exp' => $parser->getClaim('exp'),            // Expire
                'data' => [                                         // Data related to the signer user
                    'userId' => Auth::Id(),                         // userid from the users table
                    'username' => Auth::User()->name,               // User name
                    'email' => Auth::User()->email,
                    'application' => 'zuragan-admin',
                    'fullName' => Auth::User()->name,
                    'organizationId' => '',
                    'organizationName' => '',
                    'organizationPortal' => '',
                    'organizationLogo' => '',
                    'address' => '',
                    'phone' => '',
                    'countryId' => '',
                    'provinceId' => '',
                    'districtId' => '',
                    'regionId' => '',
                    'zip' => '',
                ],
                'scopes' => $parser->getClaim('scopes')
            ];

            $secretKey = file_get_contents(
                Passport::keyPath('oauth-private.key')
            );

            /*
             * Encode the array to a JWT string.
             * Second parameter is the key to encode the token.
             *
             * The output string can be validated at http://jwt.io/
             */
            $jwt = JWT::encode(
                $data,      //Data to be encoded in the JWT
                $secretKey, // The signing key
                'HS256'     // Algorithm used to sign the token, see https://tools.ietf.org/html/draft-ietf-jose-json-web-algorithms-40#section-3
            );

            return $jwt;

        } catch (\Exception $e) {
            throw $e;
        }
    }

}
