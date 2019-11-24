<?php

declare(strict_types=1);

namespace App;

use \DomainException;

class User
{
    const TYPE_ADMIN = 1;
    const TYPE_COLLABORATOR = 2;
    const TYPE_TEACHER = 3;
    const TYPE_STUDENT = 4;
    const TYPE_ADMINISTRATIVE = 5;
    const TYPES_ALLOWED = [
        self::TYPE_ADMIN,
        self::TYPE_COLLABORATOR,
        self::TYPE_TEACHER,
        self::TYPE_STUDENT,
        self::TYPE_ADMINISTRATIVE,
    ];
    const TABLE_USERS = 'tblusuarios';
    const TABLE_ADMIN = 'tblbibliotecarios';
    const TABLE_COLLABORATOR = 'tblbibliotecarios';
    const TABLE_TEACHER = 'tbldocentes';
    const TABLE_STUDENT = 'tblalumnos';
    const TABLE_ADMINISTRATIVE = 'tbladministrativos';
    /** @var array */
    private $data;
    /** @var int */
    public $userType;

    public function __construct(int $userType)
    {
        $this->data = [];

        $this->setUserType($userType);
    }

    /**
     * @throws DomainException when user is not valid
     */
    public function setUserType(int $userType): void
    {
        if (in_array($userType, self::TYPES_ALLOWED)) {
            $this->userType = $userType;

            return;
        }

        throw new DomainException(
            sprintf(
                'Given user type %d is invalid',
                $userType
            )
        );
    }

    public function getUserType(): int
    {
        return $this->userType;
    }

    public function getData(): array
    {
        return $this->data;
    }

    public function setDataFromParams(array $params): void
    {
        $paramsToFilter = [
            'IdUsuario' => $params['IdUsuario'],
            'Nombre' => $params['Nombre'],
            'Apellidos' => $params['Apellidos'],
            'IdCarrera' => $params['IdCarrera'] ?? null,
            'Telefono' => $params['Telefono'] ?? null,
            'Correo' => $params['Correo'] ?? null,
            'Existe' => $params['Existe'] ?? null,
            'Nick' => $params['Nick'] ?? null,
            'Tipo' => $params['Tipo'] ?? null,
            'NoControl' => $params['NoControl'] ?? null,
            'Puesto' => $params['Puesto'] ?? null,
            'NoNomina' => $params['NoNomina'] ?? null,
        ];

        $this->data = array_filter($paramsToFilter);
    }
}
