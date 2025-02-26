<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
      Permission::create(['name' => 'send message']);
      Permission::create(['name' => 'kick member']);
      Permission::create(['name' => 'delete message']);
      Permission::create(['name' => 'manage channel']);
      Permission::create(['name' => 'manage server']);

      $adminRole = Role::create(['name' => 'admin']);
      $moderatorRole = Role::create(['name' => 'moderator']);
      $userRole = Role::create(['name' => 'user']);

      $adminRole->givePermissionTo([Permission::all()]);
      $moderatorRole->givePermissionTo(['send message', 'kick member', 'delete message', 'manage channel']);
      $userRole->givePermissionTo(['send message']);
    }
}
