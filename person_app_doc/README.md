# 名簿登録アプリを作成する

起動するコマンド:
```bash
./vendor/bin/sail up
```

停止するコマンド:
```bash
valet stop
```

Laravel Sailを使用している場合、以下のコマンドでLaravelのコンテナに入ることができます：
```bash
./vendor/bin/sail shell
```

## モデルとテーブルの作成
[モデル](https://readouble.com/laravel/10.x/ja/eloquent.html)
[テーブル](https://readouble.com/laravel/10.x/ja/migrations.html)

モデルを定義する。これをやっておかないと、tinkerが使えない。
```bash
php artisan make:model Person
```

テーブルを作成する。
```bash
php artisan make:migration create_persons_table
```

`persons`テーブルを定義する。
```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('persons', function (Blueprint $table) {
            $table->id();// 自動連番のIDを作成
            $table->string('name');// 名前を保存するカラム
            // emailは、往復しないようし&@と.が含まれているかどうかをチェックする
            $table->string('email')->unique();// メールアドレスを保存するカラム
            $table->timestamps();// created_atとupdated_atカラムを作成
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('persons');
    }
};
```

テーブルが定義できたらマイグレーションする。
```bash
php artisan migrate
```

シーダーファイルの作成:
```bash
php artisan make:seed PersonSeeder
```

seedersディレクトリにあるファイルを編集する
```php
<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PersonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // personsテーブルにデータを挿入
        DB::table('persons')->insert([
            'name' => 'Taro',
            'email' => 'taro@co.jp',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('persons')->insert([
            'name' => 'Hanako',
            'email' => 'hoge@co.jp',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
```

DatabaseSeeder.phpで呼び出す。
```php
<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // PersonSeederを呼び出す
        $this->call(PersonSeeder::class);
    }
}
```

以下のコマンドを実行する
```bash
php artisan db:seed
```

## Viewを作成する
personsディレクトリを作成してその中に、person.blade.phpを作成する。

## Controllerを作成する
Viewを表示するコントローラーを作成する。
```bash
php artisan make:controller PersonController
```

Viewの場所を指定する。
```php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PersonController extends Controller
{
    public function index()
    {
        return view('persons.person');
    }
}
```

`web.php`にコントローラーのルートを指定する。
```php
// personsのpageを表示する
Route::get('/persons', [PersonController::class, 'index']);
```

コントローラーのコードを修正する。
```php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PersonController extends Controller
{
    public function index()
    {
        return view('persons.person');
    }
}
```