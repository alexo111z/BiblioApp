<?php

declare(strict_types=1);

namespace App;

use \DomainException;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Request;
use Illuminate\Support\Facades\Session;

class User implements Authenticatable
{
    const PAGINATION_OFFSET = 5;

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

    const SESSION_DATA_KEY = 'userData';

    const TABLE_CAREERS = 'tblcarreras';

    const FIELD_NAME = 'Nombre';
    const FIELD_LAST_NAME = 'Apellidos';
    const FIELD_USER_ID = 'IdUsuario';
    const FIELD_EMAIL = 'Correo';
    const FIELD_PHONE = 'Telefono';
    const FIELD_EXISTS = 'Existe';

    const TABLE_USERS = 'tblusuarios';
    const USERS_FIELD_ID = 'Id';
    const USERS_FIELD_PASSWORD = 'Password';

    const TABLE_ADMIN = 'tblbibliotecarios';
    const TABLE_COLLABORATOR = 'tblbibliotecarios';
    const ADMINS_FIELD_NICK = 'Nick';
    const ADMINS_FIELD_TYPE = 'Tipo';

    const TABLE_TEACHER = 'tbldocentes';
    const TEACHERS_FIELD_PAYROLL = 'NoNomina';

    const TABLE_STUDENT = 'tblalumnos';
    const STUDENTS_CONTROL_NUMBER = 'NoControl';
    const STUDENTS_FIELD_CAREER = 'IdCarrera';

    const TABLE_ADMINISTRATIVE = 'tbladministrativos';
    const ADMINISTRATIVES_FIELD_JOB = 'Puesto';
    const ADMINISTRATIVES_FIELD_PAYROLL = 'NoNomina';

    /**
     * @var array
     */
    private $data;

    /**
     * @var int
     */
    public $userType;

    public function __construct(int $userType = 1)
    {
        $this->data = [];

        $this->setUserType($userType);
    }

    public static function getDbField(string $tableName, string $fieldName): string
    {
        return sprintf('%s.%s', $tableName, $fieldName);
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

    public static function getSession(): array
    {
        return Session::get(self::SESSION_DATA_KEY, []);
    }

    public static function isAdmin(): bool
    {
        $sessionData = static::getSession();

        if (!empty($sessionData)) {
            return ($sessionData[static::ADMINS_FIELD_TYPE] == static::TYPE_ADMIN);
        }

        return false;
    }

    public static function isCollaborator(): bool
    {
        $sessionData = static::getSession();

        if (!empty($sessionData)) {
            return ($sessionData[static::ADMINS_FIELD_TYPE] == static::TYPE_COLLABORATOR);
        }

        return false;
    }

    public static function getAdministrators(int $adminType = 1): LengthAwarePaginator
    {
        /** @var LengthAwarePaginator $users */
        $users = DB::table(self::TABLE_ADMIN)
            ->select([
                self::FIELD_USER_ID,
                self::ADMINS_FIELD_NICK,
                self::FIELD_NAME,
                self::FIELD_LAST_NAME,
            ])
            ->where('Tipo', $adminType)
            ->orderBy(self::FIELD_USER_ID, 'DESC')
            ->paginate(self::PAGINATION_OFFSET);

        return $users;
    }

    public static function getTeachers(): LengthAwarePaginator
    {
        /** @var LengthAwarePaginator $teachers */
        $teachers = DB::table(self::TABLE_TEACHER)
            ->select([
                self::FIELD_USER_ID,
                self::TEACHERS_FIELD_PAYROLL,
                self::FIELD_NAME,
                self::FIELD_LAST_NAME,
                self::FIELD_PHONE,
                self::FIELD_EMAIL,
                self::FIELD_USER_ID
            ])
            ->where(self::FIELD_EXISTS, 1)
            ->orderBy(self::FIELD_USER_ID, 'desc')
            ->paginate(self::PAGINATION_OFFSET);

        return $teachers;
    }

    public static function getStudents(): LengthAwarePaginator
    {
        /** @var LengthAwarePaginator $students */
        $students = DB::table(self::TABLE_STUDENT)
            ->select([
                self::FIELD_USER_ID,
                self::STUDENTS_CONTROL_NUMBER,
                static::getDbField(self::TABLE_STUDENT, self::FIELD_NAME),
                self::FIELD_LAST_NAME,
                self::FIELD_PHONE,
                self::FIELD_EMAIL,
                self::STUDENTS_FIELD_CAREER,
                sprintf(
                    '%s AS NombreCarrera',
                    static::getDbField(self::TABLE_CAREERS, self::FIELD_NAME)
                )
            ])
            ->join(
                self::TABLE_CAREERS,
                self::STUDENTS_FIELD_CAREER,
                '=',
                'Clave'
            )
            ->where(
                self::getDbField(self::TABLE_STUDENT, self::FIELD_EXISTS),
                1
            )
            ->orderBy(self::FIELD_USER_ID, 'desc')
            ->paginate(self::PAGINATION_OFFSET);

        return $students;
    }

    public static function getAdministratives(): LengthAwarePaginator
    {
        /** @var LengthAwarePaginator $administratives */
        $administratives = DB::table(self::TABLE_ADMINISTRATIVE)
            ->select([
                self::FIELD_USER_ID,
                self::ADMINISTRATIVES_FIELD_PAYROLL,
                self::FIELD_NAME,
                self::FIELD_LAST_NAME,
                self::FIELD_PHONE,
                self::FIELD_EMAIL,
                self::ADMINISTRATIVES_FIELD_JOB,
            ])
            ->where(self::FIELD_EXISTS, 1)
            ->orderBy(self::FIELD_USER_ID, 'desc')
            ->paginate(self::PAGINATION_OFFSET);

        return $administratives;
    }

    public function create(): bool
    {
        /** @var int $userId */
        $userId = (int) DB::table(User::TABLE_USERS)
            ->insertGetId([
                'Password' => $this->data[User::USERS_FIELD_PASSWORD],
            ]);

        if ($userId <= 0) {
            return false;
        }

        $this->data[self::FIELD_USER_ID] = $userId;
        unset($this->data[self::USERS_FIELD_PASSWORD]);

        $wasCreated = false;

        if ($this->userType === User::TYPE_ADMIN
            || $this->userType === User::TYPE_COLLABORATOR) {
            unset($this->data[self::FIELD_EXISTS]);

            $wasCreated = DB::table(User::TABLE_ADMIN)
                ->insert($this->data);
        } else if ($this->userType === User::TYPE_TEACHER) {
            unset($this->data[self::ADMINS_FIELD_TYPE]);

            $wasCreated = DB::table(User::TABLE_TEACHER)
                ->insert($this->data);
        } else if ($this->userType === User::TYPE_STUDENT) {
            unset($this->data[self::ADMINS_FIELD_TYPE]);

            $wasCreated = DB::table(User::TABLE_STUDENT)
                ->insert($this->data);
        } else if ($this->userType === User::TYPE_ADMINISTRATIVE) {
            unset($this->data[self::ADMINS_FIELD_TYPE]);

            $wasCreated = DB::table(User::TABLE_ADMINISTRATIVE)
                ->insert($this->data);
        }

        return $wasCreated;
    }

    public function update(): bool
    {
        $rowsUpdated = false;

        if ($this->userType === User::TYPE_ADMIN
            || $this->userType === User::TYPE_COLLABORATOR) {
            unset($this->data[self::FIELD_EXISTS]);

            $rowsUpdated = DB::table(User::TABLE_ADMIN)
                ->where(
                    self::FIELD_USER_ID,
                    (int) $this->data[self::FIELD_USER_ID]
                )
                ->update($this->data);
        } else if ($this->userType === User::TYPE_TEACHER) {
            unset($this->data[self::ADMINS_FIELD_TYPE]);

            $rowsUpdated = DB::table(User::TABLE_TEACHER)
                ->where(
                    self::FIELD_USER_ID,
                    (int) $this->data[self::FIELD_USER_ID]
                )
                ->update($this->data);
        } else if ($this->userType === User::TYPE_STUDENT) {
            unset($this->data[self::ADMINS_FIELD_TYPE]);

            $rowsUpdated = DB::table(User::TABLE_STUDENT)
                ->where(
                    self::FIELD_USER_ID,
                    (int) $this->data[self::FIELD_USER_ID]
                )
                ->update($this->data);
        } else if ($this->userType === User::TYPE_ADMINISTRATIVE) {
            unset($this->data[self::ADMINS_FIELD_TYPE]);

            $rowsUpdated = DB::table(User::TABLE_ADMINISTRATIVE)
                ->where(
                    self::FIELD_USER_ID,
                    (int) $this->data[self::FIELD_USER_ID]
                )
                ->update($this->data);
        }

        return $rowsUpdated > 0;
    }

    public function delete(): bool
    {
        $rowsDeleted = false;

        if ($this->userType === User::TYPE_ADMIN
            || $this->userType === User::TYPE_COLLABORATOR) {
            $rowsDeleted = DB::table(User::TABLE_ADMIN)
                ->where(
                    self::FIELD_USER_ID,
                    (int) $this->data[self::FIELD_USER_ID]
                )
                ->delete();
        } else if ($this->userType === User::TYPE_TEACHER) {
            $rowsDeleted = DB::table(User::TABLE_TEACHER)
                ->where(
                    self::FIELD_USER_ID,
                    (int) $this->data[self::FIELD_USER_ID]
                )
                ->update([
                    'Existe' => 0,
                ]);
        } else if ($this->userType === User::TYPE_STUDENT) {
            $rowsDeleted = DB::table(User::TABLE_STUDENT)
                ->where(
                    self::FIELD_USER_ID,
                    (int) $this->data[self::FIELD_USER_ID]
                )
                ->update([
                    'Existe' => 0,
                ]);
        } else if ($this->userType === User::TYPE_ADMINISTRATIVE) {
            $rowsDeleted = DB::table(User::TABLE_ADMINISTRATIVE)
                ->where(
                    self::FIELD_USER_ID,
                    (int) $this->data[self::FIELD_USER_ID]
                )
                ->update([
                    'Existe' => 0,
                ]);
        }

        return $rowsDeleted > 0;
    }

    public function fromRequest(Request $request): void
    {
        $data = [
            'Nombre' => $request->get('Nombre'),
            'Apellidos' => $request->get('Apellidos'),
            'Password' => $request->get('Password', null),
            'IdUsuario' => $request->get('IdUsuario', null),
            'IdCarrera' => $request->get('IdCarrera', null),
            'Telefono' => $request->get('Telefono', null),
            'Correo' => $request->get('Correo', null),
            'Existe' => $request->get('Existe', null),
            'Nick' => $request->get('Nick', null),
            'Tipo' => $request->get('Tipo', null),
            'NoControl' => $request->get('NoControl', null),
            'Puesto' => $request->get('Puesto', null),
            'NoNomina' => $request->get('NoNomina', null),
        ];

        $this->data = array_filter($data);
    }

    public static function buildResponseFromPaginator(LengthAwarePaginator $paginator): array
    {
        return [
            'pagination' => [
                'total' => $paginator->total(),
                'current_page' => $paginator->currentPage(),
                'per_page' => $paginator->perPage(),
                'last_page' => $paginator->lastPage(),
                'from' => $paginator->firstItem(),
                'to' => $paginator->lastItem(),
            ],
            'users' => $paginator,
        ];
    }

    public function fetchUserByCredentials(array $credentials): ?Authenticatable
    {
        if (empty($credentials)) {
            return null;
        }

        $user = DB::table(User::TABLE_ADMIN)
            ->join(
                User::TABLE_USERS,
                static::getDbField(User::TABLE_USERS, self::USERS_FIELD_ID),
                '=',
                static::getDbField(User::TABLE_ADMIN ,self::FIELD_USER_ID)
            )
            ->select(
                [
                    static::getDbField(User::TABLE_ADMIN, self::FIELD_USER_ID),
                    static::getDbField(User::TABLE_ADMIN, self::FIELD_NAME),
                    static::getDbField(User::TABLE_ADMIN, self::FIELD_LAST_NAME),
                    static::getDbField(User::TABLE_ADMIN, self::ADMINS_FIELD_NICK),
                    static::getDbField(User::TABLE_ADMIN, self::ADMINS_FIELD_TYPE),
                ]
            )
            ->where(
                static::getDbField(User::TABLE_USERS, self::USERS_FIELD_PASSWORD),
                $credentials['Password']
            )
            ->where(
                static::getDbField(User::TABLE_ADMIN, self::ADMINS_FIELD_NICK),
                $credentials['Nick']
            )
            ->first();

        if ($user !== null) {
            $this->data[User::FIELD_USER_ID] = $user->IdUsuario;
            $this->data[User::FIELD_NAME] = $user->Nombre;
            $this->data[User::FIELD_LAST_NAME] = $user->Apellidos;
            $this->data[User::ADMINS_FIELD_NICK] = $user->Nick;
            $this->data[User::ADMINS_FIELD_TYPE] = $user->Tipo;
            $this->userType = (int) $user->Tipo;
        }

        return ($user === null)
            ? null
            : $this;
    }

    /**
     * Get the name of the unique identifier for the user.
     *
     * @return string
     */
    public function getAuthIdentifierName()
    {
        return self::ADMINS_FIELD_NICK;
    }

    /**
     * Get the unique identifier for the user.
     *
     * @return mixed
     */
    public function getAuthIdentifier()
    {
        return $this->data[$this->getAuthIdentifierName()];
    }

    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->data[self::USERS_FIELD_PASSWORD];
    }

    /**
     * Get the token value for the "remember me" session.
     *
     * @return string
     */
    public function getRememberToken()
    {
        return '';
    }

    /**
     * Set the token value for the "remember me" session.
     *
     * @param string $value
     *
     * @return void
     */
    public function setRememberToken($value)
    {
        return;
    }

    /**
     * Get the column name for the "remember me" token.
     *
     * @return string
     */
    public function getRememberTokenName()
    {
        return '';
    }
}
