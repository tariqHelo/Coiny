<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       // \App\Models\User::factory(10)->create();
       // \App\Models\Category::factory(10)->create();
       //  \App\Models\Expenses::factory(10)->create();
       //   \App\Models\Revenues::factory(10)->create();
       //  \App\Models\Assets::factory(10)->create();
         // \App\Models\Banks::factory(10)->create();
         //\App\Models\Rules::factory(10)->create();
           //\App\Models\ChartOfAccounts::factory(10)->create();
        //  \App\Models\Budget::factory(10)->create();
         //  \App\Models\Transaction::factory(10)->create();
          //  \App\Models\Debts::factory(10)->create();
          //   \App\Models\DebtsPayments::factory(10)->create();
           \App\Models\BankAccounts::factory(15)->create();
    }
}
