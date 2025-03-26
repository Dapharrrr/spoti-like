<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\Request;
use Authorization\IdentityInterface;

class RequestsPolicy
{
    /**
     * Seuls les admins peuvent valider ou rejeter les demandes
     */
    public function canValidateOrReject(IdentityInterface $user, Request $request)
    {
        return $user->role === 'admin';
    }

    /**
     * Tout utilisateur connecté peut ajouter une demande
     */
    public function canAdd(IdentityInterface $user, Request $request)
    {
        return true;
    }
}
