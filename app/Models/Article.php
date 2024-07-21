<?php

namespace App\Models;

use DateTime;
use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

/**
 * @method static where(string $string, $article)
 */
class Article extends Model
{
    use HasFactory;

    /**
     * Creates a new Article
     * @param string $identifier
     * @param string $content
     * @param bool $hide_from_posts
     * @param DateTime $created_at
     * @return bool
     */
    static function new(string   $identifier,
                        string   $content,
                        bool     $hide_from_posts,
                        DateTime $created_at): bool
    {
        return DB::table('articles')->insert(
            ['identifier' => $identifier,
                'content' => $content,
                'hide_from_posts' => $hide_from_posts,
                'created_at' => $created_at]
        );
    }

    /**
     * Creates a bunch of new articles based on an [[Art], [Art]] array
     * @param array $articles
     * @return bool
     */
    static function seed(array $articles): bool
    {
        return DB::table('articles')->insert($articles);
    }


    /**
     * @throws Exception
     */
    static public function importFromStorage(): void
    {
        // Get file from directory
        $file = Storage::disk('local')->get("import/articles/articles.csv");

        // If file dont exists, panic
        if (empty($file)) {
            throw new Exception("Article file is empty. Please copy storage/app/import/article/example.csv to articles.csv");
        }

        // Get array from csv
        $arr = CommonFunctions::read_csv($file)->toArray();

        // Process each arcticle
        foreach ($arr as $key => $value) {
            // Get arcticle from storage
            $article = Storage::disk('local')->get("import/articles/{$value['content']}");
            if (empty($article)) {
                throw new Exception("Article {$value['identifier']} dont exist or is empty");
            }

            // Update article content
            $arr[$key]['content'] = $article;

            // Copy article folder to public
            File::copyDirectory('storage/app/import/articles/'. $value['identifier'], 'storage/app/public/articles/' . $value['identifier']);
        }

        // Add to database
        self::seed($arr);
    }
}
