# Laravel sailを使う
- 開発環境
    - Laravel Sail
    - Docker
    - Laravel10.0
    - PHP8.0

[参考になりそうなサイト](https://reffect.co.jp/laravel/laravel-sail#Breeze)

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

## 認証パッケージBreezeのインストール
コンテナの中に入っていればそのままコマンド実行できるので、公式ドキュメントのものをそのまま実行する。
[公式のサイトのコマンドを参照](https://laravel.com/docs/10.x/starter-kits)

## モデルとテーブルの作成
[モデル](https://readouble.com/laravel/10.x/ja/eloquent.html)
[テーブル](https://readouble.com/laravel/10.x/ja/migrations.html)

モデルを定義する。これをやっておかないと、tinkerが使えない。
```bash
php artisan make:model Flight
```

テーブルを定義したらマイグレーションするコマンドを実行するとテーブルが作成される。
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
        Schema::create('flights', function (Blueprint $table) {
            $table->id();
            $table->string('text');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flights');
    }
};
```

以下のコマンドを実行:
```bash
php artisan migrate
```

## tinkerの使い方
[公式サイト](https://laravel.com/docs/10.x/artisan#tinker)

LaravelのTinkerは、Laravelアプリケーションの対話型REPLです。Eloquent ORMを使用してデータベースのCRUD操作を行うことができます。

以下に、一般的なCRUD操作のためのTinkerコマンドの一覧を示します。ここでは、Userモデルを例にしています。

|操作	|コマンド|
|---|---|
|Create|	User::create(['name' => 'John', 'email' => 'john@example.com', 'password' => bcrypt|('password')]);
|Read|	User::all();|
|Update|	$user = User::find(1); $user->name = 'Jane'; $user->save();|
|Delete|	User::find(1)->delete();|

これらのコマンドは、Tinkerセッションを開始した後に実行します。Tinkerセッションを開始するには、プロジェクトのルートディレクトリで以下のコマンドを実行します：

```bash
php artisan tinker
```

### インスタンス化をする
新しいFlightインスタンスを作成し、そのインスタンスに対して操作を行うには、以下のようにします：
```bash
$flight = new \App\Models\Flight;
```

この$flight変数は、新しいFlightインスタンスを参照しています。このインスタンスに対して、属性の設定や保存などの操作を行うことができます。例えば：
```bash
$flight->text = 'Sample flight text';
$flight->save();
```

例えば、flightsテーブルの全てのデータを取得するには、以下のようにします：
```bash
$flights = \App\Models\Flight::all();
```

特定のレコードを取得するには、findメソッドを使用します。例えば、idが1のレコードを取得するには、以下のようにします：
```bash
$flight = \App\Models\Flight::find(1);
```

## コントローラーを使う
[公式サイト](https://readouble.com/laravel/10.x/ja/controllers.html)

テスト用のコントローラー
```bash
php artisan make:controller HelloController
```

Flightを作成:
```bash
php artisan make:controller FlightController
```

## REST APIを作る
1. モデルを作成
2. テーブルを作成
3. コントローラーを作成

モデルを作成:
```bash
php artisan make:model Hoge
```

テーブルを作成:
```bash
php artisan make:migration create_hoge_table
```

マイグレーションを実行する:
```bash
php artisan migrate
```

シーダーファイルの作成:
```bash
php artisan make:seed HogeSeeder
```

seedersディレクトリにあるファイルを編集する
```php
<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;// 追加

class HogeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // ダミーのデータをDBに５件追加
        DB::table('hoge')->insert([
            'name' => 'Jboy',
            'age' => 35,
            'birthday' => '2000-01-01',
        ]);
        DB::table('hoge')->insert([
            'name' => 'icchy',
            'age' => 28,
            'birthday' => '2000-01-02',
        ]);
        DB::table('hoge')->insert([
            'name' => 'yuiyui',
            'age' => 30,
            'birthday' => '2000-01-03',
        ]);
        DB::table('hoge')->insert([
            'name' => 'taisei',
            'age' => 25,
            'birthday' => '2000-01-04',
        ]);
        DB::table('hoge')->insert([
            'name' => 'minnminn',
            'age' => 23,
            'birthday' => '2000-01-05',
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
        // HogeのSeederを呼び出す
        $this->call(HogeSeeder::class);
    }
}
```

以下のコマンドを実行する
```bash
php artisan db:seed
```

tinkerで確認してみる。

```bash
php artisan tinker
```

インスタンス化する
```bash
$hoge = new \App\Models\Hoge;
```

データを全件取得する
```bash
$hoge = \App\Models\Hoge::all();
```

## JSONを返すコントローラーを作成する
GitHub Copilot
まず、HogeControllerという名前の新しいコントローラを作成します。ターミナルで以下のコマンドを実行します：
```bash
php artisan make:controller HogeController
```
次に、HogeControllerにindexメソッドを追加します。このメソッドでは、Hogeモデルを使用してデータベースからデータを取得し、そのデータをJSON形式で返します：

```php
<?php

namespace App\Http\Controllers;

use App\Models\Hoge;
use Illuminate\Http\Request;

class HogeController extends Controller
{
    public function index()
    {
        $hoge = Hoge::all();
        return response()->json($hoge);
    }
}
```

最後に、この新しいメソッドにルートを作成します。routes/web.phpまたはroutes/api.phpファイルに以下のコードを追加します:
```php
use App\Http\Controllers\HogeController;

Route::get('/hoge', [HogeController::class, 'index']);
```