<?php

/*
 * This file is part of SeAT
 *
 * Copyright (C) 2015 to 2020 Leon Jacobs
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along
 * with this program; if not, write to the Free Software Foundation, Inc.,
 * 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301 USA.
 */

namespace CryptaEve\Seat\Strict\Commands;

use CryptaEve\Seat\Strict\Jobs\AuditUser;
use Illuminate\Console\Command;
use Seat\Web\Models\User;

/**
 * Class Audit.
 *
 * @package CryptaEve\Seat\Strict\Commands
 */
class Audit extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'strict:audit';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run an audit of all registered users';

    /**
     * Execute the console command.
     */
    public function handle()
    {

        $count = 0;

        foreach (User::cursor() as $user) {
             // Fire the job that handles the auditing.
            AuditUser::dispatch($user);
            $count++;
        }

        $this->info(sprintf('Processing user audit for %d users', $count));

    }
}