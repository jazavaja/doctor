<?php

namespace App\Console\Commands;

use App\Models\Category;
use Illuminate\Console\Command;

class CreateCategory extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'category:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $title = $this->ask('title');
        $name = $this->ask('name');

        // Add your code here to create the category with the provided title and name
        // For example, you can use Eloquent ORM to save the category to the database

        // Sample code (replace with your actual implementation)
        try {
            Category::create([
                'title' => $title,
                'name' => $name,
            ]);
            $this->info('Category created successfully.');

        }catch (\Exception $exception)
        {
            $this->info('Duplicate category NAME unique');

        }



        return 0;
    }

}
