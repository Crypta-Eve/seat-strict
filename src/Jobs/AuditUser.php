<?php

namespace CryptaEve\Seat\Strict\Jobs;

use Seat\Eveapi\Jobs\AbstractJob;
use Seat\Web\Events\UserRoleRemoved;
use Seat\Web\Models\User;

/**
 * Class AuditUser.
 * @package CryptaEve\Seat\Strict\Jobs
 */
class AuditUser extends AbstractJob
{
    /**
     * {@inheritdoc}
     */
    public $queue = 'high';

    /**
     * @var array
     */
    protected $tags = ['user', 'audit'];

    /**
     * @var Seat\Web\Models\User
     */
    protected $user;

    /**
     * AbstractCharacterJob constructor.
     *
     * @param \Seat\Web\Models\User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @return void
     * @throws \Exception
     */
    public function handle()
    {

        $user = $this->user;

        logger()->error('Auditing ' . $user->name);

        if (setting('crypta_strict_enable', true) != "1") {
            return;
        }

        $shouldStrip = false;

        if (setting('crypta_strict_reasons_token', true) == "1") {
            $hasTrashed = ($user->all_characters()->count() - $user->characters->count()) > 0;
            if ($hasTrashed)
                $shouldStrip = true;

        }

        if ($shouldStrip){

            if (setting('crypta_strict_remove_squads', true) == "1") {
                logger()->error('Stripping squads from ' . $user->name);
                
                // Remove this person from any squads they are a member of
                $user->squads()->each(function ($squad) use ($user){
                    $squad->members()->detach($user->id);
                });
            }

            if (setting('crypta_strict_remove_mods', true) == "1") {
                logger()->error('Stripping mod roles from ' . $user->name);
                
                // Remove this person from any squads they are a member of
                $user->moderators()->each(function ($squad) use ($user){
                    $squad->moderators()->detach($user->id);
                });
            }

            if (setting('crypta_strict_remove_perms', true) == "1") {
                logger()->error('Stripping perms from ' . $user->name);
                
                // Remove this person from any squads they are a member of
                $user->roles()->each(function ($role) use ($user){
                    if ($role->users()->detach($user->id) > 0)
                        event(new UserRoleRemoved($user->id, $role));
                });
            }
        }
        
        return;
        
    }


}