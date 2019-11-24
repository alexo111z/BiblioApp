<?php

declare(strict_types=1);

use App\User;
use Faker\Factory;
use Faker\Generator;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    const GENERATION_LIMIT = 200;

    /**
     * @var Generator
     */
    private $faker;

    public function __construct()
    {
        $this->faker = Factory::create('es_ES');
    }

    public function run()
    {
        for ($i=1; $i<=5; $i++) {
            /** @var int $userId */
           $userId = (int) DB::table(User::TABLE_USERS)
                ->insertGetId([
                    'Password' => bin2hex(bcrypt('password')),
                ]);

            $randomUserType = random_int(1, 5);

            $userToCreate = new User($randomUserType);

            $userToCreate->setDataFromParams(
                $this->buildParamsFromType($randomUserType, $userId)
            );

            print_r($userToCreate->getData());

            $this->createUser($userToCreate);
        }
    }

    private function createUser(User $user): void
    {
        switch ($user->getUserType()) {
            case User::TYPE_ADMIN:
                DB::table(User::TABLE_ADMIN)
                    ->insert($user->getData());
                return;
            case User::TYPE_COLLABORATOR:
                DB::table(User::TABLE_COLLABORATOR)
                    ->insert($user->getData());
                return;
            case User::TYPE_TEACHER:
                DB::table(User::TABLE_TEACHER)
                    ->insert($user->getData());
                return;
            case User::TYPE_STUDENT:
                DB::table(User::TABLE_STUDENT)
                    ->insert($user->getData());
                return;
            case User::TYPE_ADMINISTRATIVE:
                DB::table(User::TABLE_ADMINISTRATIVE)
                    ->insert($user->getData());
                return;
        }
    }

    private function buildParamsFromType(int $userType, int $userId): array
    {
        $userParams = $this->buildUserParams($userId);

        $paramsBuilded = [];

        if ($userType === User::TYPE_ADMIN) {
            $paramsBuilded = array_merge($userParams, $this->buildAdminParams());
        } elseif ($userType === User::TYPE_COLLABORATOR) {
            $paramsBuilded = array_merge($userParams, $this->buildCollaboratorParams());
        } elseif ($userType === User::TYPE_TEACHER) {
            $paramsBuilded = array_merge($userParams, $this->buildTeacherParams());
        } elseif ($userType === User::TYPE_STUDENT) {
            $paramsBuilded = array_merge($userParams, $this->buildStudentParams());
        } elseif ($userType === User::TYPE_ADMINISTRATIVE) {
            $paramsBuilded = array_merge($userParams, $this->buildAdministrativeParams());
        }

        return $paramsBuilded;
    }

    private function buildUserParams(int $userId): array
    {
        return [
            'IdUsuario' => $userId,
            'Nombre' => $this->faker->firstName,
            'Apellidos' => $this->faker->lastName,
        ];
    }

    private function buildAdminParams(): array
    {
        return [
            'Tipo' => User::TYPE_ADMIN,
            'Nick' => $this->faker->userName,
        ];
    }

    private function buildCollaboratorParams(): array
    {
        return [
            'Tipo' => User::TYPE_COLLABORATOR,
            'Nick' => $this->faker->userName,
        ];
    }

    private function buildTeacherParams(): array
    {
        return [
            'NoNomina' => $this->faker->numberBetween(1, 500),
            'Telefono' => $this->faker->phoneNumber,
            'Correo' => $this->faker->email,
            'Existe' => 1,
        ];
    }

    private function buildStudentParams(): array
    {
        return [
            'NoControl' => $this->faker->numberBetween(1, 500),
            'Telefono' => $this->faker->phoneNumber,
            'Correo' => $this->faker->email,
            'Existe' => 1,
            'IdCarrera' => 1,
        ];
    }

    private function buildAdministrativeParams(): array
    {
        return [
            'NoNomina' => $this->faker->numberBetween(1, 500),
            'Telefono' => $this->faker->phoneNumber,
            'Correo' => $this->faker->email,
            'Existe' => 1,
            'Puesto' => $this->faker->jobTitle,
        ];
    }
}
