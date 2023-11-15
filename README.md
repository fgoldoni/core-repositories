# SellFirst Repositories

🍅 Laravel Repositories is used to abstract the data layer, making our application more flexible to maintain.



## Installation

```bash
composer require sellfirstphp/sell-first-repositories
```

who to use it
```php
<?php

namespace Modules\Users\Repositories\Contracts;

use App\Models\User;
use App\Processes\Contracts\ModelPayloadInterface;

interface UsersRepository
{
    public function createTeam(User $user, string $team = null);
}
```

```bash
<?php

namespace Modules\Users\Repositories\Eloquent;

use App\Models\User;
use App\Processes\Contracts\ModelPayloadInterface;
use App\Repositories\Criteria\Where;
use App\Repositories\RepositoryAbstract;
use Modules\Users\Repositories\Contracts\UsersRepository;

/**
 * Class EloquentPostsRepository.
 */
class EloquentUsersRepository extends RepositoryAbstract implements UsersRepository
{
    public function model()
    {
        return User::class;
    }
    
    public function isExist(string $email): bool
    {
        return $this->withCriteria([
            new Where('email', $email),
        ])->exists();
    }
}
```


**You should publish** the migration and the config file with:

```bash
php artisan vendor:publish --provider="SellFirstPHP\SellFirstRepositories\SellFirstRepositoriesServiceProvider"
```

## Credits

- [Goldoni Fouotsa](https://github.com/fgoldoni)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
