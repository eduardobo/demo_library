<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \DB;

class BooksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('books')
            ->insert([
                'name' => 'The Way of Kings', 
                'author' => 'Brandon Sanderson', 
                'publication_date' => now(),
                'category_id' => 1]);
        
        DB::table('books')
            ->insert([
                'name' => 'Words of Radiance', 
                'author' => 'Brandon Sanderson', 
                'publication_date' => now(),
                'category_id' => 1]);

        DB::table('books')
            ->insert([
                'name' => 'Oathbringer', 
                'author' => 'Brandon Sanderson', 
                'publication_date' => now(),
                'category_id' => 1]);

        DB::table('books')
            ->insert([
                'name' => 'Rhythm of War', 
                'author' => 'Brandon Sanderson', 
                'publication_date' => now(),
                'category_id' => 1]);

        DB::table('books')
            ->insert([
                'name' => 'Mistborn: the Final Empire', 
                'author' => 'Brandon Sanderson', 
                'publication_date' => now(),
                'category_id' => 1]);

        DB::table('books')
            ->insert([
                'name' => 'Mistborn: The Well of Ascension', 
                'author' => 'Brandon Sanderson', 
                'publication_date' => now(),
                'category_id' => 1]);

        DB::table('books')
            ->insert([
                'name' => 'Mistborn: The Hero of Ages', 
                'author' => 'Brandon Sanderson', 
                'publication_date' => now(),
                'category_id' => 1]);

        DB::table('books')
            ->insert([
                'name' => 'Mistborn: The Alloy of Law', 
                'author' => 'Brandon Sanderson', 
                'publication_date' => now(),
                'category_id' => 1]);

        DB::table('books')
            ->insert([
                'name' => 'Mistborn: Shadows of self', 
                'author' => 'Brandon Sanderson', 
                'publication_date' => now(),
                'category_id' => 1]);

        DB::table('books')
            ->insert([
                'name' => 'Mistborn: The Bands of Mourning', 
                'author' => 'Brandon Sanderson', 
                'publication_date' => now(),
                'category_id' => 1]);
        
        DB::table('books')
            ->insert([
                'name' => 'Mistborn: Secret history', 
                'author' => 'Brandon Sanderson', 
                'publication_date' => now(),
                'category_id' => 1]);

        DB::table('books')
            ->insert([
                'name' => 'Mistborn: The Lost Metal', 
                'author' => 'Brandon Sanderson', 
                'publication_date' => now(),
                'category_id' => 1]);

        DB::table('books')
            ->insert([
                'name' => 'Elantris', 
                'author' => 'Brandon Sanderson', 
                'publication_date' => now(),
                'category_id' => 1]);

        DB::table('books')
            ->insert([
                'name' => 'Warbreaker', 
                'author' => 'Brandon Sanderson', 
                'publication_date' => now(),
                'category_id' => 1]);

        DB::table('books')
            ->insert([
                'name' => 'White Sand', 
                'author' => 'Brandon Sanderson', 
                'publication_date' => now(),
                'category_id' => 1]);

        DB::table('books')
            ->insert([
                'name' => 'White Skyward', 
                'author' => 'Brandon Sanderson', 
                'publication_date' => now(),
                'category_id' => 1]);

        DB::table('books')
            ->insert([
                'name' => 'Starsight', 
                'author' => 'Brandon Sanderson', 
                'publication_date' => now(),
                'category_id' => 1]);

        DB::table('books')
            ->insert([
                'name' => 'Cytonic', 
                'author' => 'Brandon Sanderson', 
                'publication_date' => now(),
                'category_id' => 1]);

        DB::table('books')
            ->insert([
                'name' => 'Sun Reach', 
                'author' => 'Brandon Sanderson', 
                'publication_date' => now(),
                'category_id' => 1]);

        DB::table('books')
            ->insert([
                'name' => 'ReDawn', 
                'author' => 'Brandon Sanderson', 
                'publication_date' => now(),
                'category_id' => 1]);

        DB::table('books')
            ->insert([
                'name' => 'Defending Elysium', 
                'author' => 'Brandon Sanderson', 
                'publication_date' => now(),
                'category_id' => 1]);

        DB::table('books')
            ->insert([
                'name' => 'Steelheart', 
                'author' => 'Brandon Sanderson', 
                'publication_date' => now(),
                'category_id' => 1]);

        DB::table('books')
            ->insert([
                'name' => 'Firefight', 
                'author' => 'Brandon Sanderson', 
                'publication_date' => now(),
                'category_id' => 1]);

        DB::table('books')
            ->insert([
                'name' => 'Calamity', 
                'author' => 'Brandon Sanderson', 
                'publication_date' => now(),
                'category_id' => 1]);

        DB::table('books')
            ->insert([
                'name' => 'The Rithmatist', 
                'author' => 'Brandon Sanderson', 
                'publication_date' => now(),
                'category_id' => 1]);
    }
}
