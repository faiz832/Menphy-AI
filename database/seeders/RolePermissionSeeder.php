<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Article;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::create([
            'name' => 'admin'
        ]);

        $userRole = Role::create([
            'name' => 'user'
        ]);

        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password')
        ]);

        $admin->assignRole($adminRole);

        $user = User::create([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'password' => bcrypt('password')
        ]);

        $user->assignRole($userRole);

        $articles = [
            [
                'title' => 'Understanding Mental Health',
                'content' => 'Mental health is an essential part of overall well-being...',
                'image' => 'articles/mental-health.jpg',
            ],
            [
                'title' => 'Coping with Anxiety',
                'content' => 'Anxiety is a common mental health concern that many people face...',
                'image' => 'articles/anxiety.jpg',
            ],
            [
                'title' => 'The Importance of Self-Care',
                'content' => 'Self-care is crucial for maintaining good mental health...',
                'image' => 'articles/self-care.jpg',
            ],
            [
                'title' => 'Recognizing Depression Symptoms',
                'content' => 'Depression is more than just feeling sad. It is important to recognize the symptoms...',
                'image' => 'articles/depression.jpg',
            ],
        ];

        foreach ($articles as $index => $article) {
            Article::create([
                'user_id' => $admin->id,
                'title' => $article['title'],
                'content' => $article['content'],
                'image' => $article['image'],
                'created_at' => now()->subDays($index * 2), // This will create articles with different creation dates
            ]);
        }
    }
}
