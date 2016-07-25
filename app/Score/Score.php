<?php
namespace App\Score;
use App\Post;
class Score
{
    private $post;
    /**
     * Score constructor.
     */
    public function __construct(Post $post)
    {
        $this->post = $post;
    }
    public function get()
    {
        $best = $this->post->whereRaw("score=(SELECT MAX(score) as score FROM posts WHERE status='opened')")->get();
        if (is_null($best)) return false;
        return $best[0];
    }
}