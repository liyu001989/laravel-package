<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Faker\Generator as Faker;
use PhpSchool\CliMenu\CliMenu;

class CreateUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'package:create-user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'create a user';

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
     * @return mixed
     */
    public function handle(Faker $faker)
    {
        // $name = $this->ask('姓名？') ?: $faker->name;
        // $email = $this->ask('邮箱？') ?: $faker->email;
        // $password = $this->ask('密码？') ?: 'secret';
        $menu = $this->menu();
        $menu->addOption('normal', '普通用户');
        $menu->addItem('管理员（需要密码）', function(CliMenu $cliMenu) use ($menu) {
            $cliMenu->askPassword()
                ->setValidator(function($password) {
                    return $password === 'secret';
                })
                ->setPromptText('Secret Password')
                ->ask();

            $menu->setResult('admin');

            $cliMenu->close();
        });

        $role = $menu->open();


        $option = $this->menu('选择方式', [
            'manual' => '手动输入',
            'random' => '随机生成'
        ])->open();

        if ($option == 'manual') {
            $name = $this->ask('姓名？');
            $email = $this->ask('邮箱？');
            $password = $this->secret('密码？');

            if (!$name || !$email || !$password) {
                return $this->erorr('信息不完整');
            }
        } else {
            $name = $faker->name;
            $email = $faker->email;
            $password = 'secret';
        }


        // User::create([]);
        $this->info("创建了用户 \n name: {$name} \n email: {$email} \n role: {$role}");
    }
}
