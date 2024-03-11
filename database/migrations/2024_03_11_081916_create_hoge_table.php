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
        Schema::create('hoge', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('age');
            $table->date('birthday');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hoge');
    }
};

hogesテーブルなるものを探しにいくので、明示的に指定する必要がある。
```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hoge extends Model
{
    use HasFactory;

    // テーブルが複数形のhogesになってしまうので、明示的に指定
    protected $table = 'hoge';
}
```

キャッシュのクリアもする
```bash
php artisan config:clear
php artisan cache:clear
```