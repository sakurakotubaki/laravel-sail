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
