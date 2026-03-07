<?php declare(strict_types=1);

namespace Shopware\Core\Framework\Sso\Exceptions;

use Shopware\Core\Framework\Log\Package;
use Shopware\Core\Framework\Sso\SsoException;
use Symfony\Component\HttpFoundation\Response;

/**
 * @internal
 */
#[Package('framework')]
class SsoUserNotFoundException extends SsoException
{
    public const SSO_LOGIN_USER_NOT_FOUND = 'SSO_LOGIN__USER_NOT_FOUND';

    public function __construct(
        private readonly ?string $email = null,
    ) {
        parent::__construct(
            Response::HTTP_UNAUTHORIZED,
            self::SSO_LOGIN_USER_NOT_FOUND,
            'User not found',
        );
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }
}
